@extends('layouts.auth')

@section('title', 'Daftar Akun Klien')

@section('content')
<h2 style="margin: 0 0 6px 0; font-size: 20px; text-align: center; color: #222;">Daftar Akun Baru</h2>
<p style="margin: 0 0 20px 0; font-size: 13px; text-align: center; color: #666;">Pendaftaran khusus untuk klien konseling</p>

<!-- Blok Menampilkan Semua Error Sekaligus -->
@if ($errors->any())
    <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 13px;">
        <strong>Mohon periksa kembali isian Anda:</strong>
        <ul style="margin: 6px 0 0 0; padding-left: 18px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register.store') }}">
    @csrf

    <div style="margin-bottom: 14px;">
        <label for="name" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('name')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom: 14px;">
        <label for="email" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('email')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom: 14px;">
        <label for="no_hp" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Nomor HP / WhatsApp</label>
        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('no_hp')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom: 14px;">
        <label for="password" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Password</label>
        <input type="password" id="password" name="password"
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('password')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <div style="margin-bottom: 16px;">
        <label for="password_confirmation" style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
               style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
        @error('password_confirmation')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <!-- Checkbox Persetujuan (KF-03, name="setuju") -->
    <div style="margin-bottom: 20px;">
        <label style="display: flex; align-items: flex-start; gap: 8px; font-size: 13px; color: #555; cursor: pointer;">
            <input type="checkbox" name="setuju" value="1" {{ old('setuju') ? 'checked' : '' }} style="margin-top: 3px;">
            <span>Saya menyetujui kebijakan kerahasiaan data klinis dan syarat layanan Vibrasi Kawan.</span>
        </label>
        @error('setuju')
            <small style="color: #dc3545; display: block; margin-top: 4px;">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" style="width: 100%; background-color: #8B3A42; color: #ffffff; padding: 12px; border: none; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer;">
        Daftar Sekarang
    </button>
</form>

<p style="margin: 20px 0 0 0; text-align: center; font-size: 13px; color: #666;">
    Sudah punya akun? <a href="{{ route('login') }}" style="color: #8B3A42; font-weight: 600; text-decoration: none;">Masuk di sini</a>
</p>
@endsection
