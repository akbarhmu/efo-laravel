@extends('layouts.auth')

@section('title', 'Buat Akun Baru')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/registrasi.css') }}">
@endsection

@section('content')

    <div class="signin-signup">
        <form action="{{ route('register') }}" class="sign-in-form" method="POST">
            @csrf
            <h2 class="title">Daftar</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" />
            </div>
            <div class="input-field">
                <i class="fas fa-id-card"></i>
                <input type="text" name="nik" placeholder="NIK" value="{{ old('nik') }}" />
            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
            </div>
            <div class="input-field">
                <i class="fas fa-calendar-days"></i>
                <input type="date" name="birth_date" placeholder="Tanggal Lahir" value="{{ old('birth_date') }}" />
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Kata Sandi" />
            </div>
            <input type="submit" value="Daftar" class="btn solid" />
        </form>

        <a href="{{ route('login') }}">
            Silahkan masuk jika sudah memiliki akun
        </a>
    </div>
@endsection
