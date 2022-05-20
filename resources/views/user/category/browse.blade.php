@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'MSA | Browse All Stories')

@section('content')
<div class="container">
    <h1 class="display-4 mt-3 mb-3">All Stories</h1>
    <hr>

    @foreach ($books->chunk(2) as $chunk)
        <div class="row">
            @foreach ($chunk as $book)
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <a href="/show-book/{{ $book->id }}">{{ $book->title }}</a>
                        </li>
                    </ul>
                </div>    
            @endforeach    
        </div>    
    @endforeach
</div>

{{-- @foreach ($books as $book)
    <p>{{ $book->title }}</p>
@endforeach --}}
@endsection