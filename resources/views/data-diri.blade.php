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
                    <form action="#" class="sign-in-form">
                        <div class="left-row">
                            <p>Nama Lengkap</p>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Nama Lengkap" />
                            </div>

                            <p>NIK</p>
                            <div class="input-field">
                                <i class="fas fa-id-card"></i>
                                <input type="text" placeholder="NIK" />
                            </div>

                            <p>Tempat/Tanggal Lahir</p>
                            <div class="input-field">
                                <i class="fas fa-calendar-days"></i>
                                <input type="email" placeholder="Tempat/Tanggal Lahir" />
                            </div>

                            <p>Jenis Kelamin</p>
                            <div class="input-field">
                                <i class="fas fa-solid fa-venus-mars"></i>
                                <input type="text" placeholder="Jenis Kelamin" />
                            </div>

                            <p>Alamat KTP</p>
                            <div class="input-field">
                                <i class="fas fa-solid fa-location-dot"></i>
                                <input type="email" placeholder="Alamat KTP" />
                            </div>

                            <p>Email</p>
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Email" />
                            </div>
                        </div>

                        <div class="right-row">
                            <p>Alamat TPS</p>
                            <div class="input-field">
                                <i class="fas fa-solid fa-map-location-dot"></i>
                                <input type="text" placeholder="Alamat TPS" />
                            </div>

                            <p>Nomor TPS</p>
                            <div class="input-field">
                                <i class="fas fa-solid fa-list-ol"></i>
                                <input type="text" placeholder="Nomor TPS" />
                            </div>

                            <input type="submit" value="Simpan" class="btn solid" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
