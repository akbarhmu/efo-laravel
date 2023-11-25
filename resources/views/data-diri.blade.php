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
                            <div class="input-field">
                                <!-- <p>Nama Lengkap</p> -->
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Nama Lengkap" value="{{ auth()->user()->name }}" />
                            </div>
                            <div class="input-field">
                                <!-- <p>NIK</p> -->
                                <i class="fas fa-id-card"></i>
                                <input type="text" placeholder="NIK" value="{{ auth()->user()->nik }}" />
                            </div>
                            <div class="input-field">
                                <!-- <p>Tempat/Tanggal Lahir</p> -->
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Email" value="{{ auth()->user()->email }}" />
                            </div>
                            <div class="input-field">
                                <!-- <p>Jenis Kelamin</p> -->
                                <i class="fas fa-calendar-days"></i>
                                <input type="text" placeholder="Tanggal Lahir" value="{{ auth()->user()->birth_date }}" />
                            </div>
                            <div class="input-field">
                                <!-- <p>Alamat KTP</p> -->
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Kata Sandi" />
                            </div>
                            <div class="input-field">
                                <!-- <p>Email</p> -->
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Kata Sandi" />
                            </div>
                        </div>

                        <div class="right-row">
                            <div class="input-field">
                                <!-- <p>Alamat TPS</p> -->
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Nama Lengkap" />
                            </div>
                            <div class="input-field">
                                <!-- <p>Nomor TPS</p> -->
                                <i class="fas fa-id-card"></i>
                                <input type="text" placeholder="NIK" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
