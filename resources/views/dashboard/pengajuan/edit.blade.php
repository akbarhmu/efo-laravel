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
                    <h3>Konfirmasi Pengajuan</h3>
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
                            <h4 class="card-title">Detail Pengajuan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>{{ $pengajuan->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td>{{ $pengajuan->user->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat KTP</th>
                                    <td>{{ $pengajuan->address }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Domisili Saat Ini</th>
                                    <td>{{ $pengajuan->domicile_address }}</td>
                                </tr>
                                <tr>
                                    <th>RT/RW Domisili Saat Ini</th>
                                    <td>{{ $pengajuan->domicile_rt_rw }}</td>
                                </tr>
                                <tr>
                                    <th>Scan KTP</th>
                                    <td>
                                        <a class="btn btn-icon btn-primary icon icon-left" href="{{ route('get.file', $pengajuan->file_scan_ktp) }}">
                                            <span class="bi bi-download"></span> Download
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Scan Terdaftar dalam DPT</th>
                                    <td>
                                        <a class="btn btn-icon btn-primary icon icon-left" href="{{ route('get.file', $pengajuan->file_scan_dpt) }}">
                                            <span class="bi bi-download"></span> Download
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Scan Surat Rekomendasi</th>
                                    <td>
                                        <a class="btn btn-icon btn-primary icon icon-left" href="{{ route('get.file', $pengajuan->file_recommendation_letter) }}">
                                            <span class="bi bi-download"></span> Download
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h4 class="card-title">Rubah Data Pemilih</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.dashboard.pengajuans.approve', $pengajuan->id) }}" class="form form-horizontal" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-horizontal-icon">Alamat TPS</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <textarea name="tps_address" class="form-control" placeholder="Alamat TPS"
                                                id="first-name-horizontal-icon">{{ old('tps_address', $pengajuan->user->tps_address) }}</textarea>
                                            <div class="form-control-icon">
                                                <i class="bi bi-compass"></i>
                                            </div>
                                        </div>
                                        @error('tps_address')
                                            <p class="text text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal-icon">Nomor TPS</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="tps_number" class="form-control" placeholder="Nomor TPS"
                                                id="first-name-horizontal-icon" value="{{ old('tps_number', $pengajuan->user->tps_number) }}" />
                                            <div class="form-control-icon">
                                                <i class="bi bi-eyedropper"></i>
                                            </div>
                                        </div>
                                        @error('tps_number')
                                            <p class="text text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <a href="{{ route('admin.dashboard.pengajuans.reject', $pengajuan->id) }}"
                                        class="btn btn-danger me-1 mb-1">Tolak</a>
                                </div>
                            </div>
                        </div>
                    </form>
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
