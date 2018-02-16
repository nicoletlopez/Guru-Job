<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(ChangePassword $request)
    {
        //check if current password input is correct
        if (!(Hash::check($request->post('current-password'), Auth()->user()->password))) {
            return redirect()->back();
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->post('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully!");
    }

    public function apply(Request $job)
    {
        $user = auth()->user();
        //get the JOB object from a form submission
    }

}
