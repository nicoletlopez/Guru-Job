<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfile;
use App\Http\Requests\EditProfile;
use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->profile){
            return redirect()->route('profile');
        }
        return view('profile.profile-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProfile $request)
    {
        $user=auth()->user();
        $profile=$user->profile;
        $dob=$request->input('dob');
        $address=$request->input('address');
        $city=$request->input('city');
        $contact=$request->input('contact');
        $description=$request->input('description');

        $profile = new Profile;
        $profile->user_id=$user->id;
        $profile->picture='https://lorempixel.com/640/480/?81236';
        $profile->dob=$dob;
        $profile->street_address=$address;
        $profile->city=$city;
        $profile->contact_number=$contact;
        $profile->description=$description;

        $profile->save();

        return redirect()->route('resumes.create');
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

    public function updatePersonal(EditProfile $request){
        $user=auth()->user();
        $profile=auth()->user()->profile;
        $name = $request->input('name');
        $dob=$request->input('dob');
        $address=$request->input('address');
        $city=$request->input('city');
        $contact=$request->input('contact');



        $user->name = $name;
        $profile->dob=$dob;
        $profile->street_address=$address;
        $profile->city=$city;
        $profile->contact_number=$contact;

        $user->save();
        $profile->save();

        return back();
    }
    public function updateDescription(EditProfile $request){
        $profile=auth()->user()->profile;

        $description=$request->input('description');
        $profile->description=$description;
        $profile->save();

        return back();
    }
}
