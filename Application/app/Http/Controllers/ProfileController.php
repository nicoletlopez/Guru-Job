<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfile;
use Illuminate\Http\Request;
use App\User;


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
        //
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
