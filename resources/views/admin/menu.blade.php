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
                    <h5 class="card-title">{{ $total_book }}</h5>
                    <p class="card-text">stories stored</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card text-white bg-two mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <i class='bx bxs-group bx-tada-hover bx-pull-left bx-lg'></i>
                    <h5 class="card-title">{{ $total_user }}</h5>
                    <p class="card-text">users joined</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card text-white bg-three mb-3">
                <div class="card-header">Reviews</div>
                <div class="card-body">
                    <i class='bx bxs-message-dots bx-tada-hover bx-pull-left bx-lg'></i>
                    <h5 class="card-title">{{ $total_review }}</h5>
                    <p class="card-text">reviews given</p>
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

    @if ($latest != null)
    <div>
        <h1 class="display-5 fw-bold my-3">Latest Added</h1>
        <div class="card mb-3" style="">
            <div class="row g-0">
              <div class="col-md-2">
                    <img src="{{ asset('assets/cover/'.$latest->book->cover) }}" height="200px" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title display-6">{{ $latest->book->title }}</h5>
                    <p class="card-text">{!! substr($latest->description, 0, 500).(strlen($latest->description) > 500 ? '...' : '') !!}</p>
                    <p class="card-text"><small class="text-muted">Updated {{ $latest->updated_at->diffForHumans() }}</small></p>
                </div>
              </div>
              <div class="col-md-1 text-center my-auto">
                    <a href="/book/{{ $latest->book_id }}" class="text-muted">
                        <i class="bi bi-chevron-right" style="font-size: 32px;"></i>
                    </a>
              </div>
            </div>
          </div>
    </div>
    @endif
    
</div>
@endsection