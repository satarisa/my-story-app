@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'Welcome!')

@section('content') 
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-9">
            <div class="card shadow">
                <div class="card-body">
                    <p class="display-6">Webcomic For You</p>
                    
                    <div class="row">
                        @foreach ($webcomics as $webcomic)
                            <div class="col">
                                <a href="/show-book/{{ $webcomic->id }}" class="text-muted text-decoration-none">
            
                                    <div class="card" style="width: 140px;">
                                        <img src="{{ asset('assets/cover/'.$webcomic->cover) }}" class="card-img-top" width="140px" height="200px"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $webcomic->title }}">
                                        <div class="card-body">
                                            <p class="card-title">{{ $webcomic->author }}</p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>


                </div>
            </div>

            <div class="card shadow mt-4">
                <div class="card-body">
                    <p class="display-6">Novel For You</p>
                    <div class="row">
                        @foreach ($novels as $novel)
                            <div class="col">
                                <a href="/show-book/{{ $novel->id }}" class="text-muted text-decoration-none">
            
                                    <div class="card" style="width: 140px;">
                                        <img src="{{ asset('assets/cover/'.$novel->cover) }}" class="card-img-top" width="140px" height="200px"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $novel->title }}">
                                        <div class="card-body">
                                            <p class="card-title">{{ $novel->author }}</p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach
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