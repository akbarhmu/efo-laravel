@extends('layouts.dashboard')

@section('title', 'Pemilu')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/pemilu.css') }}">
@endsection

@section('content')
<div class="overlay">
    <!-- Overlay inner wrapper -->
    <div class="overlay-inner">
        <!-- Title -->
        <div class="dot-row">
            <div class="dot"></div>
            <h1 class="overlay-title">
                PEMILU
            </h1>
        </div>
        <!-- Description -->
        <p class="overlay-description">
            Urgensi Pemilu <br>
            Alasan dan fungsi pemilu Pemilu sebagai wujud demokrasi dan
            salah satu aspek yang penting untuk dilaksanakan secara demokratis.
            Semua demokrasi modern melaksanakan pemilihan. Namun tidak semua
            pemilihan adalah demokratis. Karena pemilihan secara demokratis
            bukan sekedar lambang, melainkan pemilihan yang harus kompetitif,
            berkala, inklusif (luas), dan definitif untuk menentukan pemerintah.
            Terdapat dua alasan mengapa pemilu menjadi variabel penting suatu
            negara, yakni: <br>
        </p>
        <ul>
            <li>
                Pemilu merupakan suatu mekanisme transfer kekuasaan
                politik secara damai. Legitimasi kekuasaan seseorang atau partai
                politik tertentu tidak diperoleh dengan cara kekerasan. Namun
                kemenangan terjadi karena suara mayoritas rakyat didapat melalui
                pemilu yang fair.
            </li>
            <li>
                Demokrasi memberikan ruang kebebasan bagi individu.
                Pemilu dalam konteks ini, artinya konflik yang terjadi selama
                proses pemilu diselesaikan melalui lembaga-lembaga demokrasi.
            </li>
        </ul>
    </div>
</div>
@endsection
