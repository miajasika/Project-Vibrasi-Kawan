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
@endsection
