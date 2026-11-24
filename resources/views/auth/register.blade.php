@extends('layouts.guest')
@section('title', 'Daftar Akun')
@section('content')
<header class="vk-public-nav vk-auth-nav">
    <a class="vk-brand" href="{{ url('/') }}"><span class="vk-logo"><i class="bi bi-flower1"></i></span><span>Vibrasi Kawan</span></a>
    <div class="vk-nav-actions"><a class="vk-btn vk-btn-soft" href="{{ route('login') }}">Masuk</a><a class="vk-btn vk-btn-primary" href="{{ route('register') }}">Daftar</a></div>
</header>
<main class="vk-auth-page">
    <section class="vk-auth-card vk-register-card">
        <div class="vk-auth-brand"><span class="vk-logo vk-logo-large"><i class="bi bi-flower1"></i></span><h1>Vibrasi Kawan</h1><p>Buat akun baru sebagai klien</p></div>
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
@endsection
