{{-- The look shared by the log-in and sign-up pages: logo, language note and a white card with a tab-style heading. --}}
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | GameHaven</title>
    @include('partials.share-head')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" as="style" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" onload="this.onload=null;this.rel='stylesheet'"/>
    <noscript><link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet"/></noscript>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col justify-between bg-[#1A0841]">
    @include('partials.demo-bar')
    <main id="main-content" class="mt-8 flex flex-col items-center px-4">
        <img src="{{ asset('images/gamehavenlogo.webp') }}" width="400" height="400" fetchpriority="high" alt="GameHaven Logo" class="mb-4 h-40 w-auto">
        <div class="mb-8 text-xl tracking-widest text-white">PT|ENG</div>

        <div class="flex w-full max-w-md flex-col items-center rounded-2xl bg-white pb-8 shadow-lg">
            <div class="-mt-8 flex w-full justify-center">
                <h1 class="rounded-t-2xl bg-white px-8 py-2 text-3xl font-bold text-[#1A0841] drop-shadow-lg">@yield('heading')</h1>
            </div>

            @if ($errors->any())
                <ul role="alert" class="mx-8 mt-4 w-[calc(100%-4rem)] rounded-md bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @yield('card')
        </div>

        @yield('below')
    </main>
    <div></div>
</body>
</html>
