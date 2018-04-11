<?php

namespace App\Http\Controllers;

use App\Notifications\NewNotification;
use App\Profile;
use App\User;
use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Nexmo\Laravel\Facade\Nexmo;

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

        if(!($user->faculty)){
            return redirect(route('home'));
        }

        #$notifications=Notifications::where('notifiable_id',$user->id)->get();
        $notifications=$user->notifications;
        $images=[];
        foreach($notifications as $notification){
            $images[]=Profile::find($notification->data['hr']['id'])->picture;
        }
        $context=array(
            'notifications'=>$notifications,
            'images'=>$images,
        );
        $user->unreadNotifications->markAsRead();
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
        $notification=$request->input('notification');
        #$notification=NotificationsController::message($request);

        $users=[];
        foreach($employees as $employee){
            $users[]=$employee->user;
        }
        Notification::send($users,new NewNotification($user,$notification));

        return redirect(route('notifications.create'))->with('success','Notification sent to Employees');
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
