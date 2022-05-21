@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'Welcome!')

@section('content') 
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-9">
            <div class="card shadow">
                <div class="card-body">
                    @if (!empty($webcomics))
                        <a href="/type/webcomic" class="float-end mt-3 badge bg-dark"><em>More Webcomics</em></a>
                    @endif
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
                    @if (!empty($novels))
                        <a href="/type/novel" class="float-end mt-3 badge bg-dark"><em>More Novels</em></a>
                    @endif
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
                    <h5 class="card-title">Search here</h5>

                    <form action="/search" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Search title or author here">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                <i class="bi bi-search-heart-fill"></i>
                            </button>
                        </div>
                    </form>

                    <hr>

                    <h5 class="card-title">Recent reviews</h5>
                    @if (!empty($recents))
                        <ul class="list-group">
                            @foreach ($recents as $recent)
                                <li class="list-group-item">
                                    <strong>{{ $recent->user->name }}</strong> in <a href="/show-book/{{ $recent->book->id }}">{{ $recent->book->title }}</a>  :
                                    <p class="ps-3">"<small>{{ $recent->comment }}</small>"</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <em>There's nothing reviews</em>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
@endsection