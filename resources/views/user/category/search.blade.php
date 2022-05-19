@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'Search')

@section('content')
    <div class="container">
        <div class="pt-3">
            <h1>Search: {{ $keyword }}</h1>

            @if (count($books) != 0)
                @foreach ($books as $book)
                    
                <a href="/show-book/{{ $book->book_id }}" class="text-decoration-none" style="color: black">
                    <div class="card mt-3">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <img src="{{ asset('assets/cover/'.$book->book->cover) }}" style="width: 100px;" class="img-fluid" alt="">
                            </div>
                            <div class="col">
                                <div class="card-block">
                                    <h4 class="card-title">{{ $book->book->title }}</h4>
                                    <p class="card-subtitle text-muted">{{ $book->book->author }} - {{ $book->type }}</p>
                                    <br>
                                    <p class="card-text"><small>{!! substr($book->description, 0, 300).(strlen($book->description) > 300 ? '...' : '') !!}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                
                @endforeach

                <div class="pagination justify-content-center mt-3">
                    {{ $books->render() }}
                </div>
                
            @else

                <div class="alert alert-secondary" role="alert">
                    <em>Stories not found. Try another keyword!</em>
                    <br>
                    <a href="/">Back home</a>
                </div>

            @endif


        </div>
    </div>
@endsection