@extends('layouts.main-admin')
@include('layouts.sidebar-admin')

@section('title', 'Add Books')

@section('content')

<h1 class="pt-4">Add Books</h1>

<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-3">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cover" class="col-sm-3 col-form-label">Cover</label>
                        <div class="col-sm-9">
                            <input type="file" accept="img/png, image/jpeg" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" value="{{ old('cover') }}">
                            @error('cover')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="author" class="col-sm-3 col-form-label">Author</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
                            @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}"></textarea>
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
                                <option value="Novel">Novel</option>
                                <option value="Webcomic">Webcomic</option>
                            </select>
                            @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                        <div class="col-sm-9">
                            <select class="form-select @error('genre') is-invalid @enderror" id="genre" name="genre">
                                <option value="">Select Genre</option>
                                <option value="Fantasy">Fantasy</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Romance">Romance</option>
                                <option value="Action">Action</option>
                                <option value="Horror">Horror</option>
                            </select>
                            @error('genre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="country" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9">
                            <select class="form-select @error('country') is-invalid @enderror" id="country" name="country">
                                <option value="">Select Country</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea</option>
                                <option value="China">China</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="link" class="col-sm-3 col-form-label">Link</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}">
                            @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 col-1 float-end">
            <button type="submit" class="btn btn-one float-end">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection