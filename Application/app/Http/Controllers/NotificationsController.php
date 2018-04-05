<?php

namespace App\Http\Controllers;

use App\Notifications\AnyNotification;
use App\User;
use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();

        $notifications=Notifications::where('notifiable_id',$user->id)->get();
        $context=array(
            'notifications'=>$notifications,
        );
        return view('notifications.notifications-index')->with($context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(count(auth()->user()->hr->employees)>0) {
            return view('notifications.notification-send');
        }
        return back()->with('warning','Employees required');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=auth()->user();
        $hr=$user->hr;
        $employees=$hr->employees;
        #$notification=$request->input('notification');
        $notification=NotificationsController::message($request);
        $users=[];
#
        foreach($employees as $employee){
            $users[]=$employee->user;
            #$users[]=$employee->user_id;
        }
        Notification::send($users,new AnyNotification());

        return redirect(route('notifications.create'))->with('success','Notification sent to Employees');
    }

    public static function message(Request $request){
        $notification=$request->input('notification');
        return $notification;
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
}
