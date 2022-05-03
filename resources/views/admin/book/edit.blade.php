@extends('layouts.main-admin')
@include('layouts.sidebar-admin')

@section('title', 'Edit Books')

@section('content')

<h1 class="pt-4">Edit Book: {{ $book_detail->book->title }}</h1>

<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('book.update', ['book' => $book_detail->book_id]) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $book_detail->book->title }}">
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cover" class="col-sm-3 col-form-label">Cover</label>
                        <div class="col-sm-9">
                            <input type="file" accept="img/png, image/jpeg" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" value="{{ $book_detail->book->cover }}">
                            @error('cover')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <small class="text-warning fw-bold">Leave this field blank if there is no change!</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{!! $book_detail->description !!}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="type" class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                <option value="">Select Type</option>
                                <option value="Novel" {{ $book_detail->type == 'Novel' ? 'selected' : '' }}>Novel</option>
                                <option value="Webcomic" {{ $book_detail->type == 'Webcomic' ? 'selected' : '' }}>Webcomic</option>
                            </select>
                            @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                        <div class="col-sm-9">
                            <select class="form-select @error('genre') is-invalid @enderror" id="genre" name="genre">
                                <option value="">Select Genre</option>
                                <option value="Fantasy" {{ $book_detail->genre == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                                <option value="Comedy" {{ $book_detail->genre == 'Comedy' ? 'selected' : '' }}>Comedy</option>
                                <option value="Romance" {{ $book_detail->genre == 'Romance' ? 'selected' : '' }}>Romance</option>
                                <option value="Action" {{ $book_detail->genre == 'Action' ? 'selected' : '' }}>Action</option>
                                <option value="Horror" {{ $book_detail->genre == 'Horror' ? 'selected' : '' }}>Horror</option>
                            </select>
                            @error('genre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="country" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9">
                            <select class="form-select @error('country') is-invalid @enderror" id="country" name="country">
                                <option value="">Select Country</option>
                                <option value="Japan" {{ $book_detail->country == 'Japan' ? 'selected' : '' }}>Japan</option>
                                <option value="Korea" {{ $book_detail->country == 'Korea' ? 'selected' : '' }}>Korea</option>
                                <option value="China" {{ $book_detail->country == 'China' ? 'selected' : '' }}>China</option>
                                <option value="Indonesia" {{ $book_detail->country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                <option value="Other" {{ $book_detail->country == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="link" class="col-sm-3 col-form-label">Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ $book_detail->link }}">
                            @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <a href="/book/{{ $book_detail->book_id }}" class="btn btn-secondary float-start px-3">Cancel</a>
            <button type="submit" class="btn btn-one float-end px-4">Save</button>
        </form>
    </div>
</div>

@endsection