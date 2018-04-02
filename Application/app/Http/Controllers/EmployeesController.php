<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->type === 'HR'){
            //list all of an HR's employees
            $employees = Faculty::whereEmployerIs(auth()->user()->id)->paginate(5);

            $context = [
                'key' => 0,
                'employees' => $employees,
            ];

            return view('employee.employee-index')->with($context);
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ideally the screen where you can confirm an applicant as the official employee
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $faculty = $request->input('faculty_id');
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

    public function profile($faculty_id)
    {
        $hr_id = auth()->user()->id;
        $is_employee = Subject::where(['hr_id'=>$hr_id,'faculty_id'=>$faculty_id])->get()->isNotEmpty();
        if($is_employee){
            $faculty = User::find($faculty_id);
            $profile = $faculty->profile;

            $context = [
                'user' => $faculty,
                'profile' => $profile,
            ];

            return view('employee.employee-profile')->with($context);
        }else{
            return redirect('/employees');
        }
    }
}
