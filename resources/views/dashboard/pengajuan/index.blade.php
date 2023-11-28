@extends('layouts.admin-dashboard')

@section('title', 'Pengajuan')

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
                    <h3>Pengajuan</h3>
                    <p class="text-subtitle text-muted">Kelola pengajuan yang diajukan di aplikasi ini.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pengajuan</li>
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
                            <h4 class="card-title">Semua Pengajuan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuans as $pengajuan)
                                    <tr>
                                        <td>{{ $pengajuan->user->name }}</td>
                                        <td>{{ $pengajuan->user->nik }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pengajuan->created_at)->format('d-M-Y') }}</td>
                                        <td>
                                            @if ($pengajuan->status == 'unchecked')
                                                <span class="badge bg-danger text-white">Belum Diperiksa</span>
                                            @elseif ($pengajuan->status == 'approved')
                                                <span class="badge bg-success text-white">Sudah Diperiksa</span>
                                            @elseif ($pengajuan->status == 'rejected')
                                                <span class="badge bg-secondary text-white">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pengajuan->status == 'unchecked')
                                                <a class="btn icon icon-left btn-warning" href="{{ route('admin.dashboard.pengajuans.edit', $pengajuan->id) }}">
                                                    <span class="bi bi-pencil"></span> Konfirmasi Pengajuan
                                                </a>
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
