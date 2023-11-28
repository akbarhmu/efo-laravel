@extends('layouts.admin-dashboard')

@section('title', 'User Management')

@section('styles')
    <link rel="stylesheet"
        href="{{ asset('assets-dashboard/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('assets-dashboard/compiled/css/table-datatable-jquery.css') }}">
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengguna</h3>
                    <p class="text-subtitle text-muted">Kelola pengguna yang terdaftar di aplikasi ini.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h4 class="card-title">Semua Pengguna</h4>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="{{ route('admin.dashboard.users.create') }}"
                                class="btn icon icon-left btn-primary float-end"><span class="bi bi-plus-lg"></span>
                                Tambah Pengguna</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>NIK</th>
                                    <th>Email</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hak Akses</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->birth_date }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>
                                            @if ($user->role == 'admin')
                                                <span class="badge bg-primary">Admin</span>
                                            @elseif ($user->role == 'user')
                                                <span class="badge bg-secondary">User</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->email_verified_at != '')
                                                <span class="badge bg-success">Aktif</span>
                                            @elseif ($user->status == 'inactive')
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="d-flex d-inline">
                                            <a href="{{ route('admin.dashboard.users.edit', $user->id) }}"
                                                class="btn icon icon-left btn-warning btn-sm me-2"><span
                                                    class="bi bi-pencil-fill"></span> Edit</a>
                                            @if ($user->role != 'admin' && $user->id != auth()->user()->id)
                                                <form action="{{ route('admin.dashboard.users.destroy', $user->id) }}"
                                                    class="form-delete-user" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn icon icon-left btn-danger btn-sm"><span
                                                            class="bi bi-trash-fill"></span> Hapus</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets-dashboard/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/static/js/pages/datatables.js') }}"></script>
    <script src="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
        "></script>

    @if (session()->has('swal'))
        <script>
            swal.fire({
                icon: "{{ session('swal.icon') }}",
                title: "{{ session('swal.title') }}",
                text: "{{ session('swal.text') }}",
            });
        </script>
    @endif
    <script>
        $('.form-delete-user').submit(function() {
            event.preventDefault();

            Swal.fire({
                title: "Peringatan!",
                text: "Apakah anda yakin ingin menghapus pengguna ini?",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonColor: 'red',
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
@endsection
