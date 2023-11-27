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
                    <form action="#" class="sign-in-form">
                        <div class="left-row">
                            <p>Alamat KTP</p>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Alamat KTP" />
                            </div>

                            <p>Alamat Domisili Saat Ini</p>
                            <div class="input-field">
                                <i class="fas fa-id-card"></i>
                                <input type="text" placeholder="Alamat Domisili Saat Ini" />
                            </div>

                            <p>RT/RW Domisili Saat Ini</p>
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="RT/RW Domisili Saat Ini" />
                            </div>

                            <p>Unggah Scan KTP</p>
                            <div class="input-field">
                                <i class="fas fa-calendar-days"></i>
                                <input type="file" id="myFile" name="filename">
                            </div>
                        </div>

                        <div class="right-row">
                            <p>Unggah scan terdaftar dalam DPT (Cara cek melalui <a href="https://cekdptonline.kpu.go.id/">cekdptonline.kpu.go.id</a> )</p>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="file" id="myFile" name="filename">
                            </div>

                            <p>Unggah scan surat rekomendasi </p>
                            <div class="input-field">
                                <i class="fas fa-id-card"></i>
                                <input type="file" id="myFile" name="filename">
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
