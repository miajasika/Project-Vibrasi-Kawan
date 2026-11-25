<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Autentikasi') - Vibrasi Kawan</title>
</head>
<body style="margin: 0; font-family: sans-sertif; background-color: #FDF8F8; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px;">

    <div style="width: 100%; max-width: 440px; background-color: #ffffff; padding: 32px; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.05);">
        <div style="text-align: center; margin-bottom: 24px;">
            <a href="/" style="text-decoration: none; display: inline-flex; align-items: center; gap: 10px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Vibrasi Kawan" style="height: 36px;">
                <strong style="font-size: 18px; color: #8B3A42;">Vibrasi Kawan</strong>
            </a>
        </div>

        <!-- Flash Message (Sesuai Keputusan 3.1 & D5) -->
        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background-color: #f8d7da; color: #721c24; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>











