@extends('layouts.dashboard')

@section('title', 'Tata Cara')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pemilu.css') }}">
@endsection

@section('content')
<div class="overlay">
    <!-- Overlay inner wrapper -->
    <div class="overlay-inner">
        <!-- Title -->
        <h1 class="overlay-title">
            TATA CARA
        </h1>
        <!-- Description -->
        <p class="overlay-description">
            Tata Cara Lama:
            <br>
        </p>
        <ul>
            <li>
                Datang langsung ke Panitia Pemungutan Suara (PPS), Panitia Pemilihan Kecamatan (PPK) atau KPU Kabupaten/Kota
            </li>
            <li>
                Bawa bukti dukung alasan pindah memilih (Misalkan karena tugas, bawa surat tugas)
            </li>
            <li>
                KPU akan memetakan TPS mana di sekitar tempat tujuan (masuk di Daftar Pemilih Tambahan atau DPT)
            </li>
            <li>
                Pemilih diberikan bukti dari KPU berupa formulir A-Surat Pindah Memilih
            </li>
        </ul> <br>

        <p class="overlay-description">
            Inovasi tata cara pindah memilih EFO:
        </p>
        <ul>
            <li>
                Buat akun di laman web EFO (Election for Everyone)
            </li>
            <li>
                Isi data diri Anda
            </li>
            <li>
                Baca dan pahami S&K yang berlaku
            </li>
            <li>
                Masuk ke laman pengajuan dan lengkapi data dan dokumen yang diperlukan
            </li>
            <li>
                Cek data DPT Anda secara berkala di cekdptonline.kpu.go.id
            </li>
        </ul>
    </div>
</div>
@endsection
