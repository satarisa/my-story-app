@extends('layouts.login')

@section('title', 'Register Page: Join Us!')

@section('content')
<div class="d-flex min-vh-100 justify-content-center align-items-center">

    <div class="card px-4 py-5 shadow-lg">
        <div class="card-body">
            <div class="mx-auto">
                <center><img src="{{ asset('img/msa-logo.png') }}" alt="logo" width="350px" class="img-fluid"></center>
                <hr>
                <form action="/register" method="post">
                    @csrf
                    
                    <div class="mb-2 row">
                        <label for="user_name" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name') }}">
                            @error('user_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="name" class="col-sm-4 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="password_confirmation" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password">
                            @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn btn-one btn-block mt-2">REGISTER</button>
                    </div>

                </form>
        
                <p class="fs-6 fw-lighter text-center mt-2">Already have account? <a href="/login">Login</a> here.</p>
            </div>
        </div>
    </div>
</div>
@endsection