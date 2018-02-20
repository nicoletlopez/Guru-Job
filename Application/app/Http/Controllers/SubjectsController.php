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
        $user=auth()->user()->id;
        $subjects = Subject::where('user_id',$user)->orderBy('created_at','desc')->paginate(10);
        $context =
            [
                'subjects'=>$subjects,
            ];
        return view('hr.manage-subjects')->with($context);
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
        return view('subjects.subject-create')->with($context);
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
        return redirect('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skills = Skill::all();
        $context = ['skills'=>$skills];
        return view('subjects.subject-edit')->with($context);
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
        $subject=Subject::find($id);
        $subject->delete();
        return back();
    }
}
