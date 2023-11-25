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
                DATA DIRI
            </h1>
        </div>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="#" class="sign-in-form">
                        <div class="left-row">
                            <div class="input-field">
                                <!-- <p>Nama Lengkap</p> -->
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Alamat KTP" />
                            </div>
                            <div class="input-field">
                                <!-- <p>NIK</p> -->
                                <i class="fas fa-id-card"></i>
                                <input type="text" placeholder="Alamat Domisili Saat Ini" />
                            </div>
                            <div class="input-field">
                                <!-- <p>Tempat/Tanggal Lahir</p> -->
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="RT/RW Domisili Saat Ini" />
                            </div>
                            <div class="input-field">
                                <!-- <p>Jenis Kelamin</p> -->
                                <i class="fas fa-calendar-days"></i>
                                <input type="file" id="myFile" name="filename">
                            </div>
                        </div>

                        <div class="right-row">
                            <div class="input-field">
                                <!-- <p>UNGGAH scan terdaftar dalam DPT (Cara cek melalui  cekdptonline.kpu.go.id)</p> -->
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Nama Lengkap" />
                            </div>
                            <div class="input-field">
                                <!-- <p>unggah scan surat rekomendasi </p> -->
                                <i class="fas fa-id-card"></i>
                                <input type="text" placeholder="NIK" />
                            </div>
                        </div>

                        <input type="submit" value="Daftar" class="btn solid" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
