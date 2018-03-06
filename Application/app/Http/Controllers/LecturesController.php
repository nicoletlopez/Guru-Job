<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLecture;
use Illuminate\Http\Request;
use App\Lecture;

class LecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()){
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
        $owner = auth()->user()->id;
        $title = $request->input('title');
        $overview = $request->input('overview');
        $objectives = $request->input('objectives');

        $lecture = new Lecture();
        $lecture->owner_id = $owner;
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
        if (!auth()->user()) {
            return redirect()->route('login');
        }elseif(!$lecture) {
            return redirect()->route('lectures.index');
        }
        $context = array(
            'lecture' => $lecture,
            'files'=>$lecture->files,
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
        $lecture = Lecture::find($id);
        $lecture->delete();
        return back()->with('success', 'Lecture Deleted');
    }

    public function share()
    {

    }
}
