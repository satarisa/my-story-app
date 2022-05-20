<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function register(Request $request) {
        $request->validate([
            'user_name' => ['required', 'unique:users,user_name'],
            'name'      => ['required'],
            'email'     => ['required', 'email:rfc,dns'],
            'password'  => ['required', 'size:6', 'confirmed'],
            'password_confirmation' => ['required']
        ],[ 
            'required'  => "This field can't be empty!",
            'user_name.unique'  => "Username already exist!",
            'email'     => "Email address not valid!",
            'confirmed' => "Password didn't match!",
            'size'      => "Password must be at least 6 characters!"
        ]);

        $user = new User;
        $user->user_name = $request->user_name;
        $user->name = $request->name;
        $user->role = 'guest';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->profile()->create();

        Auth::attempt([
            'user_name' => $user->user_name,
            'password' => $user->password
        ]);

        $user_login = Login::where(["user_name" => $user->user_name])->first();
        Session::put('user', $user_login);
        $profile = Profile::where(["user_id" => $user->id])->first();
        Session::put('profile', $profile);
        return redirect('/');
    }
}
