<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>L.Blessings</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif

    <!-- Custom Styles -->
    <style>
        /* Gradient Background */
        body {
            background: linear-gradient(135deg, #ff2d20, #000000);
            color: #ffffff;
        }
        
        /* Card Styling */
        .card {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }
        
        /* Navigation Links */
        a.nav-link {
            color: #ffffff;
            transition: color 0.2s ease-in-out;
        }
        a.nav-link:hover {
            color: #ff2d20;
        }
        
        /* Header Style */
        header {
            margin-top: 2rem;
            text-align: center;
        }

        /* Footer */
        footer {
            margin-top: 3rem;
            text-align: center;
            font-size: 0.9rem;
            color: #ffffff;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="card w-full max-w-2xl px-6 py-8 lg:max-w-4xl">
            <header class="py-6">
                <h1 class="text-4xl font-bold text-white">Welcome to L.Tec</h1>
                <p class="mt-2 text-gray-200">Another level of Technology.</p>
            </header>

            <!-- Navigation -->
            @if (Route::has('login'))
                <nav class="flex justify-center space-x-4 mt-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link text-lg px-4 py-2 rounded-md bg-[#ff2d20] hover:bg-[#d1231c] transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link text-lg px-4 py-2 rounded-md bg-[#ff2d20] hover:bg-[#d1231c] transition">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link text-lg px-4 py-2 rounded-md bg-[#ff2d20] hover:bg-[#d1231c] transition">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>

        <footer>
            <p>&copy; {{ date('Y') }} L.Blessings</p>
        </footer>
    </div>
</body>
</html>
