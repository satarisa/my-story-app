<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {   
        $profile  = Profile::find($id);
        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile  = Profile::find($id);
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_name' => ['required', 'unique:users,user_name,'.$id], //table,column,except,id
            'name'      => ['required'],
            'email'     => ['required', 'email:rfc,dns'],
            'password'  => ['nullable', 'min:6', 'confirmed'],
        ],[ 
            'required'  => "This field can't be empty!",
            'user_name.unique'  => "Username already exist!",
            'email'     => "Email address not valid!",
            'confirmed' => "Password didn't match!",
            'min'      => "Password must be at least 6 characters!"
        ]);

        $user = User::find($id);
        $user->user_name = $request->user_name;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $profile = Profile::find($id);
        $profile->gender = $request->gender;
        $profile->birthday = $request->birthday;

        Session::flash('add', [$user->save(), $profile->save()]);
        return redirect('/profile/'.$id)->with('status', 'Profile successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
