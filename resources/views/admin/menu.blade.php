@extends('layouts.main-admin')
@include('layouts.sidebar-admin')

@section('title', 'Admin Page')

@section('content')
<div class="container">
    <div class="row pt-5">

        <div class="col-lg-3">
            <div class="card text-white bg-one mb-3">
                <div class="card-header">Books</div>
                <div class="card-body">
                    <i class='bx bxs-book bx-tada-hover bx-pull-left bx-lg'></i>
                    <h5 class="card-title">107</h5>
                    <p class="card-text">stories stored</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card text-white bg-two mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <i class='bx bxs-group bx-tada-hover bx-pull-left bx-lg'></i>
                    <h5 class="card-title">117</h5>
                    <p class="card-text">users join</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card text-white bg-three mb-3">
                <div class="card-header">Reviews</div>
                <div class="card-body">
                    <i class='bx bxs-message-dots bx-tada-hover bx-pull-left bx-lg'></i>
                    <h5 class="card-title">97</h5>
                    <p class="card-text">users review</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card text-white bg-four mb-3">
                <div class="card-header">???</div>
                <div class="card-body">
                    <i class='bx bxs-book bx-tada-hover bx-pull-left bx-lg'></i>
                    <h5 class="card-title">107</h5>
                    <p class="card-text">stories stored</p>
                </div>
            </div>
        </div>

    </div>

    <hr>

    <div>
        <h1 class="display-5">Latest Added</h1>

        <div class="card mb-3" style="max-height: 200px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection