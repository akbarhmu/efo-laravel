@extends('layouts.dashboard')

@section('title', 'Syarat & Ketentuan')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pemilu.css') }}">
@endsection

@section('content')
<div class="overlay">
    <!-- Overlay inner wrapper -->
    <div class="overlay-inner">
        <!-- Title -->
        <h1 class="overlay-title">
            SYARAT & KETENTUAN
        </h1>
        <!-- Description -->
        <p class="overlay-description">
            Syarat dan Ketentuan Pindah Memilih:
            <br>
        </p>
        <ul>
            <li>
                Menjalankan tugas di tempat lain pada saat hari pemungutan suara;
            </li>
            <li>
                Menjalani rawat inap di fasilitas pelayanan kesehatan dan keluarga yang mendampingi;
            </li>
            <li>
                Penyandang disabilitas yang menjalani perawatan di panti sosial atau panti rehabilitasi;
            </li>
            <li>
                Tugas belajar/menempuh pendidikan menengah atau tinggi;
            </li>
            <li>
                Pindah domisili;
            </li>
            <li>
                Tertimpa bencana alam;
            </li>
            <li>
                Bekerja di luar domisilinya; dan/atau
            </li>
            <li>
                Keadaan tertentu di luar dari ketentuan di atas sesuai dengan peraturan perundang-undangan
            </li>
        </ul>
    </div>
</div>
@endsection
