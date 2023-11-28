@extends('layouts.dashboard')

@section('title', 'Data Diri')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/data-diri.css') }}">
@endsection

@section('content')
<div class="overlay">
    <!-- Overlay inner wrapper -->
    <div class="overlay-inner">
        <!-- Title -->
        <div class="dot-row">
            <div class="dot"></div>
            <h1 class="overlay-title">
                DATA DIRI
            </h1>
        </div>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="{{ route('data-diri') }}" class="sign-in-form" method="POST">
                        @csrf
                        <div class="left-row">
                            <p>Nama Lengkap</p>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name', auth()->user()->name) }}" required />
                            </div>

                            <p>NIK</p>
                            <div class="input-field">
                                <i class="fas fa-id-card"></i>
                                <input type="text" name="nik" placeholder="NIK" value="{{ old('nik', auth()->user()->nik) }}" required />
                            </div>

                            <p>Tempat/Tanggal Lahir</p>
                            <div class="input-field">
                                <i class="fas fa-calendar-days"></i>
                                <input type="date" name="birth_date" placeholder="Tempat/Tanggal Lahir"  value="{{ old('birth_date', auth()->user()->birth_date) }}" required />
                            </div>

                            <p>Jenis Kelamin</p>
                            <div class="input-field">
                                <i class="fas fa-solid fa-venus-mars"></i>
                                <input type="text" name="gender" placeholder="Jenis Kelamin" value="{{ old('gender', auth()->user()->gender) }}" required />
                            </div>

                            <p>Alamat KTP</p>
                            <div class="input-field">
                                <i class="fas fa-solid fa-location-dot"></i>
                                <input type="text" name="address" placeholder="Alamat KTP" value="{{ old('address', auth()->user()->address) }}" required />
                            </div>

                            <p>Email</p>
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Email" value="{{ old('email', auth()->user()->email) }}" required />
                            </div>
                        </div>

                        <div class="right-row">
                            <p>Alamat TPS</p>
                            <div class="input-field">
                                <i class="fas fa-solid fa-map-location-dot"></i>
                                <input type="text" name="tps_address" placeholder="Alamat TPS" value="{{ old('tps_address', auth()->user()->tps_address) }}" required />
                            </div>

                            <p>Nomor TPS</p>
                            <div class="input-field">
                                <i class="fas fa-solid fa-list-ol"></i>
                                <input type="text" name="tps_number" placeholder="Nomor TPS" value="{{ old('tps_number', auth()->user()->tps_number) }}" required />
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <input type="submit" value="Simpan" class="btn solid" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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
