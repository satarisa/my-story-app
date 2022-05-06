@extends('layouts.login')

@section('title', 'Login Page')

@section('content')
<div class="d-flex min-vh-100 justify-content-center align-items-center">

    <div class="card card-pd shadow-lg">
        <div class="card-body">
            <div class="mx-auto">
                <center><img src="{{ asset('img/msa-logo.png') }}" alt="logo" width="350px"></center>
                <hr>
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-2">
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username"
                        required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                    </div>
                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn btn-one btn-block">LOGIN</button>
                    </div>
                    @if(session('gagal_login') == TRUE)
                        <center>
                            <small style="color:red">Username or Password is wrong!</small>
                        </center> 
                    @endif
                </form>
        
                <p class="fs-6 fw-lighter text-center mt-2">Don't have account? <a href="/register">Register</a> here.</p>
            </div>
        </div>
    </div>
</div>
@endsection