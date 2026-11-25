@extends('layouts.guest')
@section('title', 'Masuk')
@section('content')
<header class="vk-public-nav vk-auth-nav">
    <a class="vk-brand" href="{{ url('/') }}"><span class="vk-logo"><img src="{{ asset('assets/VIBRASI KAWAN LOGO.png') }}" alt="Logo Vibrasi Kawan" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;"></span><span>Vibrasi Kawan</span></a>
    <div class="vk-nav-actions"><a class="vk-btn vk-btn-soft" href="{{ route('login') }}">Masuk</a><a class="vk-btn vk-btn-primary" href="{{ route('register') }}">Daftar</a></div>
</header>
<main class="vk-auth-page">
    <section class="vk-auth-card">
        <div class="vk-auth-brand"><span class="vk-logo vk-logo-large"><img src="{{ asset('assets/VIBRASI KAWAN LOGO.png') }}" alt="Logo Vibrasi Kawan" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;"></span><h1>Selamat Datang</h1><p>Masuk ke ruang amanmu</p></div>
        @if ($errors->any())<div class="vk-form-alert">{{ $errors->first() }}</div>@endif
        <form action="{{ route('login.attempt') }}" method="POST">
            @csrf
            <div class="vk-field"><label for="email">Email <b>*</b></label><div class="vk-input-wrap"><i class="bi bi-envelope"></i><input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="email"></div>@error('email')<small class="vk-error">{{ $message }}</small>@enderror</div>
            <div class="vk-field"><label for="password">Kata Sandi <b>*</b></label><div class="vk-input-wrap"><i class="bi bi-lock"></i><input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required autocomplete="current-password"><button type="button" class="vk-password-toggle" data-password-toggle="password"><i class="bi bi-eye"></i></button></div>@error('password')<small class="vk-error">{{ $message }}</small>@enderror</div>
            <button class="vk-btn vk-btn-primary vk-btn-submit" type="submit">Masuk <i class="bi bi-arrow-right"></i></button>
        </form>
        <p class="vk-auth-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        <a class="vk-back-home" href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
    </section>
</main>
@endsection
