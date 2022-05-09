@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'My Profile')

@section('content')

<div class="container">
    <h1 class="mt-4 display-3">My Profile</h1>
    <div class="card shadow-lg mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2">
                    <img src="{{ asset('img/pp.jpg') }}" alt="profile" class="rounded-circle img-thumbnail" width="155px" height="155px">
                </div>
        
                <div class="col-lg-10">
                    <a href="" class="btn btn-primary float-end">Edit Profile</a>
                    <h1>Name</h1>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" value="name@example.com" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="email" class="form-control" id="email" value="name@example.com" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Gender</label>
                                <input type="email" class="form-control" id="email" value="name@example.com" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Birthday</label>
                                <input type="email" class="form-control" id="email" value="name@example.com" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <small class="mb-2" style="color: red">Let this field blank if there is nothing to change</small>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Password</label>
                                <input type="email" class="form-control" id="email" value="name@example.com" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Confirm Password</label>
                                <input type="email" class="form-control" id="email" value="name@example.com" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection