@extends('layouts.main-admin')
@include('layouts.sidebar-admin')

@section('title', 'All Books')

@section('content')

<a href="book/create" class="btn btn-one float-end mt-4">Add New Story</a>
<h1 class="pt-4">All Books</h1>

<div class="card">
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

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Type</th>
                        <th>Genre</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book_details as $book_detail)
                    <tr>
                        <td style="width: 30px; text-align: center">{{ $loop->iteration }}</td>
                        <td>{{ $book_detail->book->title }}</td>
                        <td>{{ $book_detail->book->author }}</td>
                        <td>{{ $book_detail->type }}</td>
                        <td>{{ $book_detail->genre }}</td>
                        <td>{{ $book_detail->country }}</td>
                        <td>
                            <a href="/book/{{ $book_detail->book_id}}" class="btn btn-warning btn-sm"><i class="bi bi-info-lg"></i></a>
                            <form action="{{ route('book.destroy',['book'=>$book_detail->book_id]) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return false" class="btn btn-danger btn-sm sa-confirm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('script')
<script type="text/javascript">
    $('.sa-confirm').on('click', function (e) {
        e.preventDefault();
        var form = $(this).closest("form");
        Swal.fire({
            title: 'Are you sure?',
            text: "This action can't be undo!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#9323d9',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
 
</script>
@endpush

@endsection