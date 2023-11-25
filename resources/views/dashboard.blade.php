@extends('layouts.dashboard')

@section('title', 'Tentang Kami')

@section('css')
    <link rel="stylesheet" href="assets/css/beranda.css">
@endsection

@section('content')
<div class="overlay container">
    <!-- Overlay inner wrapper -->
    <div class="overlay-inner">
        <!-- Title -->
        <div class="">
            <div class="dot"></div>
            <h1 class="overlay-title">
                TENTANG KAMI
            </h1>
        </div>
        <div class="overlay-row">
            <ul class="overlay-list">
                <li>
                    “Tagline”
                </li>
                <li>
                    Mudah
                </li>
                <li>
                    Murah
                </li>
                <li>
                    Accessible
                </li> <br>
                <p>
                    Election for everyone merupakan prototipe yang bertujuan agar masyarakat rantau  dapat
                    lebih mudah untuk mendapatkan hak pilihnya melalui platform digital yang mudah.
                </p>
            </ul>
            <div>
                <p class="overlay-description">
                    Election For Everyone merupakan prototipe awal sebagai bentuk mendukung digital civics di indonesia.
                    prototipe ini  memberikan desain kemudahan akses  pemilih perantau untuk pindah memilih secara online
                    tanpa perlu kembali ke domisili asal yang memerlukan waktu dan biaya lebih. kami berinovasi untuk
                    melakukan digitalisasi persyaratan pindah memilih melalui platform election for everyone mulai dari
                    syarat dan tata cara pengajuan. kami mendukung penuh pemilu dengan mengatasi permasalahan golput
                    akibat faktor kesulitan pindah memilih oleh masyarakat perantau.
                </p>
            </div>
        </div>
        <!-- Description -->

    </div>
</div>
@endsection
