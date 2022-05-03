@extends('layouts.main-admin')
@include('layouts.sidebar-admin')

@section('title', 'Book Details')

@section('content')
<div class="container">
    <h2 class="pt-4 fs-1">
        {{ $book_detail->book->title }}
        <span><a href="/book/{{ $book_detail->book_id }}/edit" class="badge bg-one rounded-pill fs-6"><i class="bi bi-pencil"></i> Edit</a></span>
    </h2>

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
    
    <div class="card shadow-sm col-lg-8 mx-auto mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/cover/'.$book_detail->book->cover) }}" width="150px" class="img-thumbnail">
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Type</th>
                            <td>{{ $book_detail->type }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $book_detail->country }}</td>
                        </tr>
                        <tr>
                            <th>Genre</th>
                            <td>{{ $book_detail->genre }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                <h4 class="fw-bold">Description</h4>
                <p>{!! $book_detail->description !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection