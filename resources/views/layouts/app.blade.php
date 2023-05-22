<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Naoki</title>

        {{-- quill --}}
        {{-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

        {{-- js/css読み込み --}}
        @vite(['resources/css/app.css', 'resources/sass/style.scss', 'resources/js/app.js', '/resources/js/product.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="bg-main min-h-screen">
            @include('layouts.navigation')

            {{-- ヘッダー --}}
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- メイン --}}
            <main class="px-3 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    </body>
</html>
