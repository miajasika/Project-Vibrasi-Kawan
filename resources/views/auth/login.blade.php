@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h2>Masuk ke Akun</h2>

    <form  action="/login" method="POST">
        @csrf

        <!-- Email -->
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <!-- Password -->
        <div>
            <label for="password">Kata Sandi:</label><br>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="/registrasi">Daftar di sini </a></p>
@endsection

