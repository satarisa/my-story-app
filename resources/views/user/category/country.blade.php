@extends('layouts.main')
@include('layouts.navbar')

@section('title', 'Category: Country')

@section('content')
    <div class="container">
        <div class="pt-3">
            <h1>All from {{ $country_name }}</h1>

            <div class="card mb-3" style="">
                <div class="row g-0">
                  <div class="col-md-2">
                        <img src="{{ asset('assets/cover/2022-05-07_A') }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-9">
                    <div class="card-body">
                        <h5 class="card-title display-6">Judul</h5>
                        {{-- <p class="card-text">{!! substr($latest->description, 0, 500).(strlen($latest->description) > 500 ? '...' : '') !!}</p> --}}
                    </div>
                  </div>
                  <div class="col-md-1 text-center my-auto">
                        <a href="/book/" class="text-muted">
                            <i class="bi bi-chevron-right" style="font-size: 32px;"></i>
                        </a>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection