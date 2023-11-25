@extends('layouts.dashboard')

@section('title', 'Tujuan Pemilu')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pemilu.css') }}">
@endsection

@section('content')
<div class="overlay">
    <!-- Overlay inner wrapper -->
    <div class="overlay-inner">
        <!-- Title -->
        <h1 class="overlay-title">
            TUJUAN PEMILU
        </h1>
        <!-- Description -->
        <p class="overlay-description">
            Tujuan Pemilu <br>
        </p>
        <ul>
            <li>
                Pemilu sebagai implementasi kedaulatan rakyat Kedaulatan terletak di tangan rakyat.
            </li>
            <li>
                Pemilu sebagai sarana membentuk perwakilan politik
            </li>
            <li>
                Pemilu sebagai sarana penggantian pemimpin secara konstitusional Pemilu bisa mengukuhkan pemerintahan yang sedang berjalan atau untuk mewujudkan reformasi pemerintahan.
            </li>
            <li>
                Pemilu sebagai sarana pemimpin politik memperoleh legitimasi
            </li>
            <li>
                Pemilu sebagai sarana partisipasi politik masyarakat.
            </li>
        </ul>
    </div>
</div>
@endsection
