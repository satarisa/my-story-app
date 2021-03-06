<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user_name = $request->user_name;
        $password = $request->password;

        $attempted = Auth::attempt([
            'user_name' => $user_name,
            'password' => $password
        ]);

        if ($attempted) {
            $user = Login::where(["user_name" => $user_name])->first();
            Session::put('user', $user);
            $profile = Profile::where(["user_id" => $user->id])->first();
            Session::put('profile', $profile);
            return redirect('/');
        } else {
            Session::flash('gagal_login', TRUE);
            return redirect('/login');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
