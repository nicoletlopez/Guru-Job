<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubject;
use App\Specialization;
use App\Subject;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $user = auth()->user()->id;
        $subjects = Subject::where('user_id', $user)->orderBy('created_at', 'desc')->paginate(10);
        $context =
            [
                'subjects' => $subjects,
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
        $specializations = Specialization::all();
        $context = ['specializations' => $specializations];
        return view('subjects.subject-create')->with($context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubject $request)
    {

        $user_id = auth()->user()->id;
        $name = $request->input('name');
        $desc = $request->input('description');

        $specializations = $request->input('specializations');

        $days = $request->input('days');
        $start_time = $request->input('times-from');
        $end_time = $request->input('times-to');

        //Insert subject row
        $subject = new Subject();
        $subject->user_id = $user_id;
        $subject->name = $name;
        $subject->desc = $desc;
        $subject->save();

        //insert specializations

        foreach($specializations as $specialization) {
            $subject->specializations()->attach($specialization);
        }

        foreach ($days as $key => $day) {
            $schedule = new Schedule();
            $schedule->subject_id = $subject->id;
            $schedule->day = $day;
            $schedule->start = $start_time[$key];
            $schedule->end = $end_time[$key];
            $schedule->save();
        }

        return redirect('/subjects/' . $subject->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        $schedules = $subject->schedules;
        $specializations=$subject->specializations;
        $context = array(
            'subject' => $subject,
            'schedules' => $schedules,
            'specializations'=>$specializations,
        );
        return view('subjects.subject-details')->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specializations = Specialization::all();
        $subject = Subject::find($id);
        $daysSelected = $subject->schedule()->day;
        $daysData = array();
        foreach ($daysSelected as $daySelected) {
            $daysData[] = $daySelected->id;
        }
        $context = [
            'specializations' => $specializations,
            'subject' => $subject,
            'daysData' => $daysData,
        ];
        return view('subjects.subject-edit')->with($context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return back();
    }
}
