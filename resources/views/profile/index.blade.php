@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'My Profile')

@section('content')

<div class="container">
    @if (session('status'))
    <div class="mt-3 mx-auto d-grid gap-2 col-4">
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class='bx bxs-check-circle bx-md me-2'></i>
            <div>
                {{ session('status') }}
            </div>
          </div>
    </div>
    @endif

    <h1 class="mt-4 display-3">My Profile</h1>
    <div class="card shadow-lg mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2">
                    @if ($profile->picture != null)
                        <img src="{{ asset('/assets/profile_picture/'.$profile->picture) }}" alt="profile" class="rounded-circle img-thumbnail" style="width: 155px; height: 155px;">
                    @else
                        <img src="{{ asset('/img/user.png') }}" alt="profile" class="rounded-circle img-thumbnail" width="155px" height="155px">    
                    @endif
                </div>
        
                <div class="col-lg-10">
                    <a href="/profile/{{ $profile->id }}/edit" class="btn btn-primary float-end">Edit Profile</a>
                    <h1>{{ $profile->user->name }}</h1>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" value="{{ $profile->user->email }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="user_name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="user_name" value="{{ $profile->user->user_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="gender" value="{{ $profile->gender }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthday" value="{{ $profile->birthday }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection