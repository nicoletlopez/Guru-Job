<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLecture;
use Illuminate\Http\Request;
use App\Lecture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user())
        {
            return redirect()->route('login');
        }
        $lectures = auth()->user()->faculty->ownedLectures;
        $context =
            [
                'lectures' => $lectures,
            ];
        return view('faculty.manage-lectures')->with($context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lectures.lecture-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLecture $request)
    {
        $user = auth()->user();
        $user_name = str_replace('', '_', $user->name);
        $owner_id = $user->id;
        $title = $request->input('title');
        $overview = $request->input('overview');
        $objectives = $request->input('objectives');

        if (DB::table('lecture')->where('title', $title)->where('owner_id', $owner_id)->exists())
        {
            return back()->with('error', 'A lecture of the same name already exists!');
        }

        //create a directory in storage
        Storage::makeDirectory('public/' . $user->name . '/lectures/' . $title);

        //store the directory as a record
        $lecture = new Lecture();
        $lecture->owner_id = $owner_id;
        $lecture->title = $title;
        $lecture->overview = $overview;
        $lecture->objectives = $objectives;
        $lecture->save();

        return redirect('/lectures/' . $lecture->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecture = Lecture::find($id);
        if (!auth()->user())
        {
            return redirect()->route('login');
        } elseif (!$lecture)
        {
            return redirect()->route('lectures.index');
        }

        $fileExts = [];
        foreach ($lecture->files as $file)
        {
            preg_match("/\.(\w+)(?!.*\.(\w+))/", $file->name, $ext);
            preg_match("/([^\/]+)(?=\.\w+$)/", $file->name, $name);
            $fileExts[] = array($name[0], strtolower($ext[1]));
        }

        $image = ['jpg', 'jpeg', 'png', 'bmp', 'gif'];
        $video = ['mp4', 'flv', 'wmv', '3gp'];
        $audio = ['mp3', 'm4a', 'm4p', 'ogg', 'wav'];
        $word = ['doc', 'docx'];
        $pdf = ['pdf'];
        $context = array(
            'lecture' => $lecture,
            'files' => $lecture->files,
            'fileExts' => $fileExts,
            'image' => $image,
            'video' => $video,
            'audio' => $audio,
            'word' => $word,
            'pdf' => $pdf,
        );
        return view('lectures.lecture-details')->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecture = Lecture::find($id);
        $context = array(
            'lecture' => $lecture,
        );
        return view('lectures.lecture-edit')->with($context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateLecture $request, $id)
    {
        $lecture = Lecture::find($id);

        $title = $request->input('title');
        $overview = $request->input('overview');
        $objectives = $request->input('objectives');

        $lecture->title = $title;
        $lecture->overview = $overview;
        $lecture->objectives = $objectives;
        $lecture->save();

        return redirect('lectures/' . $lecture->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $username = str_replace(' ', '_', auth()->user()->name);
        $lecture = Lecture::find($id);
        $files = $lecture->files;

        //loop through each file
        foreach ($files as $file)
        {
            //remove the file from directory
            Storage::delete('public/' . $username . '/lectures/' . $lecture->name . '/' . $file->name);
            //remove the file as a record
            $file->delete();
        }

        //delete th directory from storage
        Storage::deleteDirectory('public/' . $username . '/lectures/' . $lecture->name);
        $lecture->delete();


        return back()->with('success', 'Lecture Deleted');
    }

    public function share()
    {

    }
}
