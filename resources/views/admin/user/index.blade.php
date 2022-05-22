@extends('layouts.main-admin')
@include('layouts.sidebar-admin')

@section('title', 'All Users')

@section('content')
<div class="container-fluid">
    @if (session('status'))
    <div class="pt-5 mx-auto d-grid gap-2 col-4">
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class='bx bxs-check-circle bx-md me-2'></i>
            <div>
                {{ session('status') }}
            </div>
          </div>
    </div>
    @endif

    <div class="row pt-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <a href="/user/create" class="btn btn-sm btn-one mt-3 float-end">Add Admin</a>
                    <h3 class="fw-bold mt-3">Admin</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td style="width: 30px; text-align: center">{{ $loop->iteration }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->user_name }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy',['user'=>$admin->id]) }}" method="POST" class="d-inline sa-form">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" onclick="return false" class="btn btn-outline-danger btn-sm sa-confirm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="fw-bold mt-3">Guest</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guests as $guest)
                                <tr>
                                    <td style="width: 30px; text-align: center">{{ $loop->iteration }}</td>
                                    <td>{{ $guest->name }}</td>
                                    <td>{{ $guest->user_name }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy',['user'=>$guest->id]) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" onclick="return false" class="btn btn-outline-danger btn-sm sa-confirm"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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