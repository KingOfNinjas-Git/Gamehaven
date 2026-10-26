<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'GameHaven')</title>
    @include('partials.share-head')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" as="style" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" onload="this.onload=null;this.rel='stylesheet'"/>
    <noscript><link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet"/></noscript>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-[#18063A] text-white">
    @include('partials.demo-bar')

    
    @include('partials.navbar')
    
    <div class="container mx-auto px-4">
        @include('partials.header')
        <main id="main-content">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>