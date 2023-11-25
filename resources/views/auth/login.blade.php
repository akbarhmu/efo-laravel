@extends('layouts.auth')

@section('title', 'Masuk')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
<div class="signin-signup">
    <form action="{{ route('authenticate') }}" class="sign-in-form" method="POST">
        @csrf
        <h2 class="title">Masuk</h2>
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
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" placeholder="Alamat Email" value="{{ old('email') }}" />
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Kata Sandi" />
        </div>
        <input type="submit" value="Masuk" class="btn" />
    </form>

    <a href="{{ route('register') }}">
        Buat Akun EFO
    </a>
</div>
@endsection
