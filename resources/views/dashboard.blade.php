@extends('layouts.dashboard')

@section('title', 'Tentang Kami')

@section('css')
    <link rel="stylesheet" href="assets/css/beranda.css">
@endsection

@section('content')
<div class="overlay">
    <!-- Overlay inner wrapper -->
    <div class="overlay-inner">
        <!-- Title -->
        <div class="dot-row">
            <div class="dot"></div>
            <h1 class="overlay-title">
                TENTANG PEMILU
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
        <!-- News -->
        <div class="dot-row">
            <div class="dot"></div>
            <h1 class="overlay-title">
                KUMPULAN BERITA TERKAIT PEMILU
            </h1>
        </div>

        <div class="overlay-news">
            <div class="news-1">
                <img src="assets/img/bumn.png" alt="">
                <h1 class="news-title">
                    Ramai-ramai Timses Mundur dari Komisaris BUMN Jelang Pilpres
                </h1>
                <p>
                    Jakarta - Sejumlah timses paslon mundur dari jabatan Komisaris
                    BUMN jelang Pemilu 2024. Mereka mundur lantaran menjadi bagian
                    dari tim yang akan mengkampanyekan paslon dukungannya.
                </p>
                <a class="news-link" href="https://news.detik.com/pemilu/d-7055555/ramai-ramai-timses-mundur-dari-komisaris-bumn-jelang-pilpres">
                    Lebih lengkap..
                </a>
            </div>

            <div class="news-2">
                <img src="assets/img/kampanye.png" alt="">
                <h1 class="news-title">
                    Elektabilitas Terbaru Capres-Cawapres Sepekan Jelang Masa Kampanye
                </h1>
                <p>
                    Jakarta, CNN Indonesia -- Komisi Pemilihan Umum (KPU) sudah
                    menetapkan tiga capres-cawapres yang akan bertarung di Pilpres
                    2024 mendatang. Para calon pun sudah mendapat nomor urut.
                </p>
                <a class="news-link" href="https://www.cnnindonesia.com/nasional/20231117131924-617-1025557/elektabilitas-terbaru-capres-cawapres-sepekan-jelang-masa-kampanye">
                    Lebih lengkap..
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
