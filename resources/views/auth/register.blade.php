<<<<<<< HEAD
@extends('layouts.guest')
@section('title', 'Daftar Akun')
@section('content')
<header class="vk-public-nav vk-auth-nav">
    <a class="vk-brand" href="{{ url('/') }}"><span class="vk-logo"><img src="{{ asset('assets/VIBRASI KAWAN LOGO.png') }}" alt="Logo Vibrasi Kawan" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;"></span><span>Vibrasi Kawan</span></a>
    <div class="vk-nav-actions"><a class="vk-btn vk-btn-soft" href="{{ route('login') }}">Masuk</a><a class="vk-btn vk-btn-primary" href="{{ route('register') }}">Daftar</a></div>
</header>
<main class="vk-auth-page">
    <section class="vk-auth-card vk-register-card">
        <div class="vk-auth-brand"><span class="vk-logo vk-logo-large"><img src="{{ asset('assets/VIBRASI KAWAN LOGO.png') }}" alt="Logo Vibrasi Kawan" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;"></span><h1>Vibrasi Kawan</h1><p>Buat akun baru sebagai klien</p></div>
        @if ($errors->any())<div class="vk-form-alert">Periksa kembali data yang kamu masukkan.</div>@endif
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="vk-field"><label for="name">Nama Lengkap <b>*</b></label><div class="vk-input-wrap"><i class="bi bi-person"></i><input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Maya Anindita" required autocomplete="name"></div>@error('name')<small class="vk-error">{{ $message }}</small>@enderror</div>
            <div class="vk-field"><label for="email">Email <b>*</b></label><div class="vk-input-wrap"><i class="bi bi-envelope"></i><input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="email"></div>@error('email')<small class="vk-error">{{ $message }}</small>@enderror</div>
            <div class="vk-field"><label for="no_hp">No. HP / WhatsApp <b>*</b></label><div class="vk-input-wrap"><i class="bi bi-chat-square-text"></i><input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="+62 812-3456-7890" required></div>@error('no_hp')<small class="vk-error">{{ $message }}</small>@enderror</div>
            <div class="vk-field"><label for="password">Kata Sandi <b>*</b></label><div class="vk-input-wrap"><i class="bi bi-lock"></i><input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required autocomplete="new-password"><button type="button" class="vk-password-toggle" data-password-toggle="password"><i class="bi bi-eye"></i></button></div>@error('password')<small class="vk-error">{{ $message }}</small>@enderror</div>
            <div class="vk-field"><label for="password_confirmation">Konfirmasi Kata Sandi <b>*</b></label><div class="vk-input-wrap"><i class="bi bi-shield-lock"></i><input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required autocomplete="new-password"><button type="button" class="vk-password-toggle" data-password-toggle="password_confirmation"><i class="bi bi-eye"></i></button></div></div>
            <label class="vk-checkbox"><input type="checkbox" required><span>Saya menyetujui <a href="#privacy">kerahasiaan data & syarat layanan</a> Vibrasi Kawan.</span></label>
            <button class="vk-btn vk-btn-primary vk-btn-submit" type="submit">Daftar Sekarang <i class="bi bi-arrow-right"></i></button>
        </form>
        <p class="vk-auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
    </section>
</main>
=======
@extends('layouts.auth')

@section('title', 'Daftar Akun Klien')

@section('content')
<h2 style="margin: 0 0 6px 0; font-size: 20px; text-align: center; color: #222;">Daftar Akun Baru</h2>
<p style="margin: 0 0 24px 0; font-size: 13px; text-align: center; color: #666;">Pendaftaran khusus untuk klien konseling</p>

<form method="POST" action="{{ route('register.store') }}">
    @csrf

    <div style="margin-bottom: 14px;">
        <label for="name" style="display: block; font-size: 13px; font-weight: 600; margin-buttom: 6px;">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
            @error('name')
                <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
            @enderror
    </div>

    <div style="margin-bottom: 14px;">
        <label for="no_hp" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Nomor HP / WhatsApp</label>
        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('no_hp')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom: 14px;">
        <label for="password" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Password</label>
        <input type="password" id="password" name="password" required
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('password')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom: 20px;">
        <label for="password_confirmation" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('password_confirmation')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" style="width: 100%; background-color: #8B3A42; color: #ffffff; padding: 12px; border: none; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer;">
        Daftar Sekarang
    </button>
</form>

<p style="margin: 20px 0 0 0; text-align: center; font-size: 13px; color: #666;">
    Sudah punya akun? <a href="{{ route('Login') }}" style="color: #8B3A42; font-weight: 600; text-decoration: none;">Masuk di sini</a>
</p>
>>>>>>> c3c08e1a2f70ec7a3e6a3d18778a94f1e23c2266
@endsection
