@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'My Profile')

@section('content')

<div class="container">
    <h1 class="mt-4 display-5">Edit Profile</h1>
    <div class="card shadow-lg mt-4 mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2">
                    <img src="{{ asset('img/pp.jpg') }}" alt="profile" class="rounded-circle img-thumbnail" width="155px" height="155px">
                    <center><button class="btn btn-outline-dark btn-sm mt-2"><i class="bi bi-upload"></i> Upload Picture</button></center>
                </div>
        
                <div class="col-lg-10">
                    <form action="{{ route('profile.update', ['profile' => $profile->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <h1>
                            <input type="text" class="form-control-plaintext @error('name') is-invalid @enderror" id="name" name="name" value="{{ $profile->user->name }}">
                            @error('name')<div class="invalid-feedback fs-6">{{ $message }}</div>@enderror
                        </h1>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $profile->user->email }}" name="email">
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="user_name" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ $profile->user->user_name }}">
                                    @error('user_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Female" {{ $profile->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Male" {{ $profile->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    </select>
                                    @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ $profile->birthday }}">
                                    @error('birthday')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <small class="mb-2" style="color: red">Let this field blank if there is nothing to change</small>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                    @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-user-1 float-end px-4">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection