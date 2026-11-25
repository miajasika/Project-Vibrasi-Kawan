<<<<<<< HEAD
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
=======
@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<h2 style="margin: 0 0 6px 0; font-size: 20px; text-align: center; color: #222;">Masuk ke Akun</h2>
<p style="margin: 0 0 24px 0; font-size: 13px; text-align center; #666;">Silahkan masukkan email dan kata sandi Anda</p>

<form method="POST" action="{{ route('Login.attempt') }}">
    @csrf

<div style="margin-bottom: 16px;">
    <label for="email" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('email')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom: 20px;">
        <label for="password" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Password</label>
        <input type="password" id="password" name="password" required
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('password')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" style="width: 100%; background-color: #8B3A42; color: #ffffff; padding: 12px; border: none; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer;">
        Masuk
    </button>
</form>

<p style="margin: 20px 0 0 0; text-align: center; font-size: 13px; color: #666;">
    Belum punya akun klien? <a href="{{ route('register') }}" style="color: #8B3A42; font-weight: 600; text-decoration: none;">Daftar di sini</a>
</p>
>>>>>>> c3c08e1a2f70ec7a3e6a3d18778a94f1e23c2266
@endsection
