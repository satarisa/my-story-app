<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        $guests = User::where('role', 'guest')->get();
        return view('admin.user.index', compact('admins', 'guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => ['required', 'unique:users,user_name'],
            'name'      => ['required'],
            'email'     => ['required', 'email:rfc,dns'],
            'password'  => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required']
        ],[ 
            'required'  => "This field can't be empty!",
            'user_name.unique'  => "Username already exist!",
            'email'     => "Email address not valid!",
            'confirmed' => "Password didn't match!",
            'min'      => "Password must be at least 6 characters!"
        ]);

        $user = new User;
        $user->user_name = $request->user_name;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        Session::flash('add', [$user->save(), $user->profile()->create()]);
        return redirect('/user')->with('status', 'Admin has been added!');
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
        User::find($id)->delete();
        return redirect()->route('user.index')->with('status','User has been deleted!');
    }
}
