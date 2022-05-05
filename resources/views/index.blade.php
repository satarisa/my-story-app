@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'Welcome!')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <p class="display-6">Recommended For You</p>
                    
                    @foreach ($book as $b)
                        
                    <a href="/show-book/{{ $b->book_id }}" class="text-muted text-decoration-none">

                        <div class="card shadow" style="width: 140px;">
                            <img src="{{ asset('assets/cover/'.$b->book->cover) }}" class="card-img-top" width="140px" height="200px"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $b->book->title }}">
                            <div class="card-body">
                                <p class="card-title">{{ $b->book->author }}</p>
                            </div>
                        </div>
                    </a>

                    @endforeach

                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <p class="display-6">Popular in Fantasy</p>
                    <div class="card" style="width: 140px;">
                        <img src="{{ asset('img/pp.jpg') }}" class="card-img-top" width="140px" height="200px"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Heaven Offiicial's Blessing">
                        <div class="card-body">
                            <p class="card-title">Author</p>
                            <a href="#" class="badge rounded-pill bg-dark text-muted text-decoration-none">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search here">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                            <i class="bi bi-search-heart-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection