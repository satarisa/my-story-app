@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'Book Details')

@section('content')
<div class="container">
    <h2 class="pt-4 fs-1">
        {{ $book_detail->book->title }}
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

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/cover/'.$book_detail->book->cover) }}" width="150px"
                                class="img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Author</th>
                                    <td>{{ $book_detail->book->author }}</td>
                                </tr>
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

        <div class="col-lg-4">
            <div class="card shadow-sm mb-5">
                <div class="card-header">Reviews (2)</div>

                <div class="card-body">
                    <form action="{{ route('book.review') }}" method="POST">
                        @csrf

                        <input type="hidden" name="book_id" id="book_id" value="{{ $book_detail->book_id }}">
                        
                        <div class="stars">
                            <div>
                                <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star" value="4" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star" value="2" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="star" value="1" />
                                <label class="star star-1" for="star-1"></label>
                            </div>
                        </div>

                        <div>
                            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment"
                                name="comment" placeholder="Insert your review here..." value="{{ old('comment') }}"></textarea>
                            @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-info btn-sm mt-2 float-end">POST</button>
                    </form>

                </div>
            </div>

        </div>

    </div>


</div>
@endsection