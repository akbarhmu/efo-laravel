@extends('layouts.admin-dashboard')

@section('title', 'Tambah Pengguna')

@section('styles')
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
                    <h4 class="card-title">Edit Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <h4 class="alert-heading">Terdapat Kesalahan</h4>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="form form-horizontal" method="POST" action="{{ route('admin.dashboard.users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                                                        id="first-name-horizontal-icon" value="{{ old('name', $user->name) }}" required />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                @error('name')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">NIK</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan"
                                                        id="first-name-horizontal-icon" value="{{ old('nik', $user->nik) }}" required />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-vcard"></i>
                                                    </div>
                                                </div>
                                                @error('nik')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" name="email" class="form-control" placeholder="Alamat Email"
                                                        id="first-name-horizontal-icon" value="{{ old('email', $user->email) }}" required />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                                @error('email')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="date" name="birth_date" class="form-control" placeholder="Tanggal Lahir"
                                                        id="first-name-horizontal-icon" value="{{ old('birth_date', $user->birth_date) }}" required />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar"></i>
                                                    </div>
                                                </div>
                                                @error('birth_date')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <select name="gender" id="gender" class="form-control" required>
                                                        <option class="disabled" value="">Pilih Jenis Kelamin</option>
                                                        <option value="Laki-Laki" @if(old('gender', $user->gender) == 'Laki-Laki') @selected(true) @endif>Laki-Laki</option>
                                                        <option value="Perempuan" @if(old('gender', $user->gender) == 'Perempuan') @selected(true) @endif>Perempuan</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-gender-male"></i>
                                                    </div>
                                                </div>
                                                @error('gender')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Role</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <select name="role" id="role" class="form-control" required>
                                                        <option value="user" @if(old('role', $user->role) == 'user') @selected(true) @endif>User</option>
                                                        <option value="admin" @if(old('admin', $user->role) == 'admin') @selected(true) @endif>Admin</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-gender-male"></i>
                                                    </div>
                                                </div>
                                                @error('role')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Alamat KTP</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <textarea name="address" class="form-control" placeholder="Alamat Sesuai KTP"
                                                        id="first-name-horizontal-icon">{{ old('address', $user->address) }}</textarea>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-compass"></i>
                                                    </div>
                                                </div>
                                                @error('address')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Alamat TPS</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <textarea name="tps_address" class="form-control" placeholder="Alamat TPS"
                                                        id="first-name-horizontal-icon">{{ old('tps_address', $user->tps_address) }}</textarea>
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
                                                        id="first-name-horizontal-icon" value="{{ old('tps_number', $user->tps_number) }}" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-eyedropper"></i>
                                                    </div>
                                                </div>
                                                @error('tps_number')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Password Baru</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="password" name="password" class="form-control" placeholder="Password Baru"
                                                        id="first-name-horizontal-icon" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                                @error('password')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal-icon">Konfirmasi Password Baru</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru"
                                                        id="first-name-horizontal-icon" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                                @error('password_confirmation')
                                                    <p class="text text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
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
@endsection
