<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NAOKI</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['/resources/js/product.js'])
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/style.scss'])
    </head>
    <body class="antialiased">
        <div class="bg-welcome relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="py-2 px-3 mr-1 text-sm bg-gradient-to-tr from-cyan-600 to-indigo-800 hover:brightness-110 text-gray-100 rounded-lg">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="py-2 px-3 mr-1 text-sm font-medium bg-gradient-to-tr from-cyan-600 to-indigo-800 hover:brightness-110 text-gray-100 rounded-lg">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="py-2 px-3 text-sm font-medium bg-gradient-to-tr from-yellow-500 to-orange-600 hover:brightness-110 text-gray-100 rounded-lg">登録</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <h1 class="text-gray-200">Welcome!</h1>
            </div>
        </div>
    </body>
</html>
