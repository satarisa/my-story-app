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
                    
                    <a href="{{ $book_detail->link }}" target="_blank" class="btn btn-outline-dark btn-sm me-3"><i class="bi bi-book-half"></i> Read Now</a>
                    
                
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
                                <img src="{{ asset('assets/profile_picture/'.$review->user->profile->picture) }}" alt="user" width="40px" height="40px" class="rounded-circle">    
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
@endsection