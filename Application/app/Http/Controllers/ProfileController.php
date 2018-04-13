<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfile;
use App\Http\Requests\EditProfile;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Storage;

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
        #$profile=$user->profile;
        $dob=$request->input('dob');
        $address=$request->input('address');
        $city=$request->input('city');
        $contact=$request->input('contact');
        $description=$request->input('description');

        $profile = new Profile;
        $profile->user_id=$user->id;
        #$profile->picture='default-user.png';
        $profile->dob=$dob;
        $profile->street_address=$address;
        $profile->city=$city;
        $profile->contact_number='63'.$contact;
        $profile->description=$description;

        $profile->save();

        $userObj = User::find($profile->user_id);
        $userObj->phone_number='63'.$contact;
        $userObj->save();
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
        $user=auth()->user();
        $profile=Profile::find($id);

        $context=[
            'profile'=>$profile,
            'user'=>$user,
        ];

        return view('profile.profile-edit')->with($context);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProfile $request, $id)
    {
        $profile=Profile::find($id);
        $user=auth()->user();
        $userName = $user->name;
        $name = str_replace(' ','_',strtolower($userName));
        if($request->hasFile('picture')){
            //Get filename with the extension
                Storage::delete(preg_replace("/storage/",'public',$profile->picture));
                $fileNameWithExt=$request->file('picture')->getClientOriginalName();
                $path=$request->file('picture')->storeAs('/public/'.$name,$fileNameWithExt);
                $imagePath= '/storage/'.$name.'/'.$fileNameWithExt;
        }

        #$profile=$user->profile;
        $dob=$request->input('dob');
        $name = $request->input('name');
        $address=$request->input('address');
        $city=$request->input('city');
        $contact=$request->input('contact');
        $description=$request->input('description');


        if($request->hasFile('picture')) {
            $profile->picture = $imagePath;
        }
        $profile->dob=$dob;
        $profile->street_address=$address;
        $profile->city=$city;
        $profile->contact_number='63'.$contact;
        $profile->description=$description;

        $profile->save();

        $userObj = User::find($profile->user_id);
        $userObj->name = $name;
        $userObj->phone_number='63'.$contact;
        $userObj->save();

        return redirect()->route('profile')->with('success','Profile updated');
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
        $user->phone_number=$contact;

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
