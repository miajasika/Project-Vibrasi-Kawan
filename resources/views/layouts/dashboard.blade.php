<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Vibrasi Kawan</title>
    @stack('styles')
</head>
<body style="margin: 0; font-family: sans-serif; background-color: #F7F5F5; color: #333;">

    <header style="background-color: #ffffff; padding: 14px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 32px;">
            <strong style="color: #8B3A42; font-size: 16px;">Vibrasi Kawan</strong>
        </div>
        <div style="display: flex; align-items: center; gap: 16px;">
            <span style="font-size: 14px; color: #555;">Halo, <strong>{{ Auth::user()->name ?? 'Pengguna' }}</strong></span>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="background-color: #8B3A42; color: #ffffff; border: none; padding: 8px 16px; border-radius: 6px; font-size: 14px; cursor: pointer;">Logout</button>
            </form>
        </div>
    </header>

    <main style="padding: 32px 20px;">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>