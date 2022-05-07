@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'Book Details')

@section('content')
<div class="container">
    <h2 class="pt-4 fs-1">
        {{ $book_detail->book->title }}
    </h2>

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
                                <tr>
                                    <th>Ratings</th>
                                    <td>
                                        ({{ number_format($rate_avg,1) }})
                                        @while($rate_avg>0)
                                            @if($rate_avg >0.5)
                                                <i class="bi bi-star-fill" style="color: yellow; border; text-shadow: 0 0 3px #000;"></i>
                                            @else
                                                <i class="bi bi-star-half" style="color: yellow; border; text-shadow: 0 0 3px #000;"></i>
                                            @endif
                                            @php $rate_avg--; @endphp
                                        @endwhile
                                    </td>
                                </tr>
                            </table>

                            <a href="{{ $book_detail->link }}" target="_blank" class="btn btn-user-1"><i class="bi bi-book-half"></i> Read Now</a>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="fw-bold">Description</h4>
                        @if ($book_detail->description != null)
                            <p>{!! $book_detail->description !!}</p>
                        @else
                            <p><em>There is no description yet</em></p>
                        @endif
                    </div>
                    <div class="mt-2">
                        <h4 class="fw-bold">Reviews ({{ $reviews->count() }})</h4>
                        
                        @foreach ($reviews as $review)
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-1">
                                        @if (empty($review->user->profile->picture))
                                            <img src="{{ asset('/img/user.png') }}" alt="user" width="40px" height="40px" class="rounded-circle">
                                        @else
                                            <img src="{{ asset($review->user->profile->picture) }}" alt="user" width="40px" height="40px" class="rounded-circle">    
                                        @endif
                                    </div>
                                    <div class="col">
                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <i class="bi bi-star-fill" style="color: rgb(229, 229, 0); font-size: 12px;"></i>
                                        @endfor
                                        <p><strong>{{ $review->user->name }}</strong> says:
                                            <br>
                                        <em class="ps-4">"{{ $review->comment }}"</em></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            @if (session('status'))
                <div class="toast show bg-success mb-4" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="bi bi-check-circle-fill me-3"></i>
                        <strong class="me-auto">Success!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-white">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <div class="card shadow-sm mb-5">
                <div class="card-header fs-3">Your Review</div>

                <div class="card-body">
                    @if (!empty(session('user')))
                        @if (!empty($your_review))
                            <form action="{{ route('review.update', $your_review->id) }}" method="POST">
                                @csrf
                                @method('put')

                                <input type="hidden" name="book_id" id="book_id" value="{{ $book_detail->book_id }}">
                                <input type="hidden" name="user_id" id="user_id" value="{{ session('user')->id }}">
                                
                                <div class="stars">
                                    <div>
                                        <input class="star star-5" id="star-5" type="radio" name="star" value="5" {{ $your_review->rating == 5 ? 'checked' : '' }} />
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" id="star-4" type="radio" name="star" value="4" {{ $your_review->rating == 4 ? 'checked' : '' }} />
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" id="star-3" type="radio" name="star" value="3" {{ $your_review->rating == 3 ? 'checked' : '' }} />
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" id="star-2" type="radio" name="star" value="2" {{ $your_review->rating == 2 ? 'checked' : '' }} />
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" id="star-1" type="radio" name="star" value="1" {{ $your_review->rating == 1 ? 'checked' : '' }} />
                                        <label class="star star-1" for="star-1"></label>
                                    </div>
                                </div>

                                <div>
                                    <textarea class="form-control @error('comment') is-invalid @enderror" maxlength="250" id="comment"
                                        name="comment" placeholder="Insert your review here...">{{ $your_review->comment }}</textarea>
                                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <button type="submit" class="btn btn-info btn-sm mt-2 float-end">CHANGE</button>
                            </form>
                        @else
                            <form action="{{ route('book.review') }}" method="POST">
                                @csrf

                                <input type="hidden" name="book_id" id="book_id" value="{{ $book_detail->book_id }}">
                                <input type="hidden" name="user_id" id="user_id" value="{{ session('user')->id }}">
                                
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
                            
                        @endif
                    @else
                        Please <a href="/login">Login</a> First!
                    @endif


                </div>
            </div>

            
        </div>

    </div>

    

</div>
@endsection