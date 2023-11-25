@extends('layouts.dashboard')

@section('title', 'Urgensi Pindah Memilih')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pemilu.css') }}">
@endsection

@section('content')
<div class="overlay">
    <!-- Overlay inner wrapper -->
    <div class="overlay-inner">
        <!-- Title -->
        <h1 class="overlay-title">
            URGENSI PINDAH MEMILIH
        </h1>
        <!-- Description -->
        <p class="overlay-description">
            Dalam Pemilihan Umum, pindah memilih merupakan mekanisme bagi
            seseorang yang sudah masuk Daftar Pemilih Tetap (DPT), tetapi
            tidak bisa mencoblos di TPS dia terdaftar pada hari pemungutan
            suara. Kemudian ingin mencoblos di TPS wilayah saat ini ditinggali.
            Adapun urgensi pindah pemilih sebagai berikut:
            <br>
        </p>
        <ul>
            <li>
                Mengurangi angka golput dalam Pemilihan Umum
            </li>
            <li>
                Penggunaan hak suara oleh pemilih secara maksimal
            </li>
            <li>
                Meningkatkan partisipasi politik dalam Pemilihan Umum
            </li>
        </ul>
    </div>
</div>
@endsection
