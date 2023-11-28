@extends('layouts.dashboard')

@section('title', 'Tata Cara')

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
                PENGAJUAN
            </h1>
        </div>

        <p class="overlay-description">
            Melengkapi dokumen-dokumen di bawah ini
        </p>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="{{ route('pengajuan') }}" class="sign-in-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="left-row">
                            <p>Alamat KTP</p>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="text" name="address" placeholder="Alamat KTP" value="{{ old('address', auth()->user()->address) }}" required />
                            </div>

                            <p>Alamat Domisili Saat Ini</p>
                            <div class="input-field">
                                <i class="fas fa-id-card"></i>
                                <input type="text" name="domicile_address" placeholder="Alamat Domisili Saat Ini" value="{{ old('domicile_address') }}" required />
                            </div>

                            <p>RT/RW Domisili Saat Ini</p>
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="domicile_rt_rw" placeholder="RT/RW Domisili Saat Ini" value="{{ old('domicile_rt_rw') }}" required />
                            </div>

                            <p>Unggah Scan KTP</p>
                            <div class="input-field">
                                <i class="fas fa-calendar-days"></i>
                                <input type="file" id="myFile" name="file_scan_ktp" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                        </div>

                        <div class="right-row">
                            <p>Unggah scan terdaftar dalam DPT (Cara cek melalui <a href="https://cekdptonline.kpu.go.id/">cekdptonline.kpu.go.id</a> )</p>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="file" id="myFile" name="file_scan_dpt" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>

                            <p>Unggah scan surat rekomendasi </p>
                            <div class="input-field">
                                <i class="fas fa-id-card"></i>
                                <input type="file" id="myFile" name="file_recommendation_letter" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>

                            <input type="submit" value="Submit" class="btn solid" />
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
