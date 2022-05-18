@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'Category: Country')

@section('content')
    <div class="container">
        <div class="pt-3">
            <h1>All from {{ $country_name }}</h1>

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

        </div>
    </div>
@endsection