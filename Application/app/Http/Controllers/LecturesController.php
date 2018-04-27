<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Hr;
use App\Http\Requests\CreateLecture;
use Illuminate\Http\Request;
use App\Lecture;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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
        $lectures = auth()->user()->faculty->lectures;
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
        $user_name = str_replace('', '_', strtolower($user->name));
        $faculty_id = $user->id;
        $title = str_replace(' ','_',strtolower($request->input('title')));
        $lectureTitle=$request->input('title');
        $overview = $request->input('overview');
        $objectives = $request->input('objectives');



        if (DB::table('lecture')->where('faculty_id', $faculty_id)->where(strtolower('title'), strtolower($lectureTitle))->exists())
        {
            return back()->with('error', 'A lecture of the same name already exists!');
        }

        //create a directory in storage
        Storage::makeDirectory('public/' . $user_name . '/lectures/' . $title);

        //store the directory as a record
        $lecture = new Lecture();
        $lecture->faculty_id = $faculty_id;
        $lecture->title = $lectureTitle;
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

        $context = array(
            'lecture' => $lecture,
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

    public function files($id){
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
        $excel = ['xls', 'xlsx'];
        $ppt = ['ppt', 'pptx'];
        $pdf = ['pdf'];

        $context = array(
            'lecture' => $lecture,
            'files' => $lecture->files,
            'fileExts' => $fileExts,
            'image' => $image,
            'video' => $video,
            'audio' => $audio,
            'word' => $word,
            'excel' => $excel,
            'ppt' => $ppt,
            'pdf' => $pdf,
        );
        return view('lectures.lecture-files')->with($context);
    }

    public function assign($id)
    {
        $lecture = Lecture::find($id);
        if (!auth()->user())
        {
            return redirect()->route('login');
        } elseif (!$lecture)
        {
            return redirect()->route('lectures.index');
        }

        $faculty_id = auth()->user()->id;
        $faculty = Faculty::find($faculty_id);
        $employers = $faculty->employers()->paginate(5);

        $context = array(
            'key' => 0,
            'employers' => $employers,
            'lecture' => $lecture,
        );
        return view('lectures.lecture-assign')->with($context);
    }

    public function assignLecture($lecture_id, $hr_id)
    {
        $lecture = Lecture::find($lecture_id);
        $lecture->users()->attach($hr_id);
        return redirect('/lectures/'.$lecture_id.'/assign');
    }

    public function unassignLecture($lecture_id, $hr_id)
    {
        $lecture = Lecture::find($lecture_id);
        $lecture->users()->detach($hr_id);
        return redirect('/lectures/'.$lecture_id.'/assign');
    }

    public function share($id)
    {
        $lecture = Lecture::find($id);
        if (!auth()->user())
        {
            return redirect()->route('login');
        } elseif (!$lecture)
        {
            return redirect()->route('lectures.index');
        }

        $faculty_id = auth()->user()->id;
        //collects all employers of a faculty into a collection
        $employers = Hr::employersOf($faculty_id)->get();
        //creates coworkers collection to be passed to method
        $coworkers = New Collection();

        //collects all employees of all employers of faculty, a.k.a coworkers
        foreach ($employers as $employer){
            $coworkers = $coworkers->concat($employer->employees);
        }

        //filters collection to get unique values and remove the faculty who is logged in
        $coworkers = $coworkers->unique()->filter(function ($coworker) use ($faculty_id) {
            return $coworker->user_id != $faculty_id;
        })->values();

        $context = array(
            'coworkers' => $this->paginate($coworkers)->withPath('/lectures/'.$lecture->id.'/share'),
            'lecture' => $lecture,
        );
//        return $coworkers;
        return view('lectures.lecture-share')->with($context);
    }

    public function shareLecture($lecture_id, $faculty_id)
    {
        $lecture = Lecture::find($lecture_id);
        $lecture->users()->attach($faculty_id);
        return redirect('/lectures/'.$lecture_id.'/share');
    }

    public function unshareLecture($lecture_id, $faculty_id)
    {
        $lecture = Lecture::find($lecture_id);
        $lecture->users()->detach($faculty_id);
        return redirect('/lectures/'.$lecture_id.'/share');
    }

    //function for paginating Collections that didn't use Laravel ORM
    private function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
