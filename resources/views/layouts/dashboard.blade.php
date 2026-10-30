<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Vibrasi Kawan</title>
</head>
<body>

    <!-- Header / Navbar -->
    <header style="background: #f4f4f4; padding: 10px; display: flex; justify-content: space-between;">
        <h2>Vibrasi Kawan Dashboard</h2>
        <nav>
            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    </header>

    <!-- Main Content -->
    <main style="padding: 20px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer style="margin-top: 50px; text-align: center; color: gray;">
        <p>&copy; {{ date('Y') }} Vibrasi Kawan. All rights reserved.</p>
    </footer>
</body>
</html>
