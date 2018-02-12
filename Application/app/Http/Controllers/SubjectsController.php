<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubject;
use App\Skill;
use App\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $subjects = Subject::orderBy('created_at','desc')->paginate(10);
        $context =
            [
                'subjects'=>$subjects,
            ];
        return view('subjects.subject-listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $skills = Skill::all();
        $context = ['skills'=>$skills];
        return view('hr.create-subject')->with($context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubject $request)
    {
        //
        $user_id = auth()->user()->id;
        $name = $request ->input('name');
        $desc = $request->input('description');
        $start_time = $request->input('time-from');
        $end_time = $request->input('time-to');
        $skills = $request->input('skills');
        $days = $request->input('days');

        $subject = new Subject();
        $subject->user_id = auth()->user()->id;
        $subject->name = $name;
        $subject->desc = $desc;
        $subject->start_time = $start_time;
        $subject->end_time = $end_time;
        $subject->days = $days;

        $subject->save();

        foreach($skills as $skill)
        {
            $subject->attach($skill->id);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $subjects = Auth()->user()->subjects;
        $context =
            [
                'subjects'=>$subjects,
            ];
        return view('subject.subject-details')->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
