@extends('layouts.auth')

@section('title', 'Registrasi')

@section('content')
    <h2>Form Registrasi</h2>

    <form action="/registrasi" method="POST">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <label for="name">Nama Lengkap:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div style="color: red;">{{ $message }}</div>

            @enderror
        </div>
        <br>

        <!-- Email -->
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div style="color: red;">{{ $message}}</div>

            @enderror
        </div>
        <br>

        <!-- Nomor Hp -->
        <div>
            <label for = "no_hp">Nomor HP/WhatsApp:</label><br>
            <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
            @error('password')
                <div style="color: red;">{{ $message}}</div>

            @enderror
        </div>
        <br>

        <!-- Konfirmasi Password -->
        <div>
            <label for="password confirmation">Konfirmasi Kata Sandi:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <br>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="/Login">Login di sini</a></p>
@endsection
