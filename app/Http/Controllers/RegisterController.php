<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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

    public function register(RegisterRequest $request) {
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
