@extends('layouts.main-admin')
@include('layouts.sidebar-admin')

@section('title', 'Add New Admin')

@section('content')

<h1 class="pt-4">Add Admin</h1>

<div class="col-md-6 mx-auto">
    <div class="card shadow p-3">
        <div class="card-body">
            <form method="post" action="{{ route('user.store') }}">
                @csrf
                <input type="hidden" value="admin" name="role" id="role">
                <div class="row mb-3">
                    <label for="user_name" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name"
                            name="user_name" value="{{ old('user_name') }}">
                        @error('user_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ old('password') }}">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_confirmation" class="col-sm-3 col-form-label">Re-Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                            name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-one float-end px-4">Save</button>
        </div>
        </form>
    </div>
</div>

@endsection