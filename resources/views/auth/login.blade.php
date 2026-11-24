@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<h2 style="margin: 0 0 6px 0; font-size: 20px; text-align: center; color: #222;">Masuk ke Akun</h2>
<p style="margin: 0 0 20px 0; font-size: 13px; text-align: center; #666;">Silahkan masukkan email dan kata sandi Anda</p>

<!-- Buat Menampilkan Semua Error Sekaligus -->
@if ($errors->any())
    <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 13px;">
        <strong>Terjadi kesalahan:</strong>
        <ul style="margin: 6px 0 0 0; padding-left: 18px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

<p style="margin: 20px 0 0 0; text-align: center; font-size: 13px; color; #666;">
    Belum punya akun klien? <a href="{{ route('register') }}" style="color: #8B3A42; font-weight: 600; text-decoration: none;">Dfatar di sini</a>
</p>
@endsection
