@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'About Us: MSA')

@section('content')
    <div class="container text-center">
        <h1 class="display-4 mt-3">About Us</h1>
        <center class="py-3"><hr width="25%"></center>
        <p class="fw-light">
            My Story App is a place to share impressions and reviews of various stories that have existed.
        </p>
        <center class="py-3"><hr width="25%"></center>
        <h3 class="display-5 mb-5">Discover Us</h3>
        <div class="row">
            <div class="col">
                <img src="{{ asset('img/about-1.png') }}" alt="about-1" width="150px">
                <p class="fs-5 pt-3">Look any recommendations?</p>
                <p>
                    Explore My Story App and find various 
                    <br>
                    interesting stories that suit your preferences
                </p>
            </div>
            <div class="col">
                <img src="{{ asset('img/about-2.png') }}" alt="about-1" width="150px">
                <p class="fs-5 pt-3">Which stories do you like?</p>
                <p class="mb-4">
                    Give reviews and recommend your
                    <br>
                    favorite stories on our forums
                </p>
            </div>
        </div>
        <center class="py-3"><hr width="25%"></center>
        <h3 class="display-5 mb-5">Discover More</h3>
        @if (!empty(session('user')))
            <a href="/" class="btn btn-lg btn-user-1 px-5 mb-5">Explore Now</a>
        @else
            <a href="/register" class="btn btn-lg btn-user-1 px-5 mb-5">Join Now</a>
        @endif
    </div>
@endsection