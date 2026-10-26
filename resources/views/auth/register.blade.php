<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta | GameHaven</title>
    @include('partials.share-head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" as="style" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" onload="this.onload=null;this.rel='stylesheet'"/>
    <noscript><link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet"/></noscript>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1A0841] min-h-screen flex flex-col justify-between">
    @include('partials.demo-bar')
    <div class="flex flex-col items-center mt-8">
        <!-- Logo -->
        <img src="{{ asset('images/gamehavenlogo.webp') }}" width="400" height="400" fetchpriority="high" alt="GameHaven Logo" class="h-40 w-auto mb-4">
        <!-- Language Switch -->
        <div class="text-white text-xl mb-8 tracking-widest">PT|ENG</div>

        <!-- Register Card -->
        <div class="bg-white rounded-2xl shadow-lg w-[90vw] max-w-md flex flex-col items-center pb-8">
            <div class="w-full flex justify-center -mt-8">
                <div class="bg-white rounded-t-2xl px-8 py-2 text-3xl font-bold text-[#1A0841] drop-shadow-lg">Criar Conta</div>
            </div>
            <div class="w-full px-8 flex flex-col items-center mt-6">
                <!-- Google Button -->
                <a href="#" class="flex items-center w-full bg-[#E6E6E6] text-[#1A0841] font-bold rounded-full py-3 px-4 shadow mb-4 hover:bg-[#d1d1d1] transition text-lg justify-center"
                   style="box-shadow: 2px 4px 4px #bbb;">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="h-6 w-6 mr-3">
                    CONTINUAR COM GOOGLE
                </a>
                <!-- Email Button (aesthetic only) -->
                <a href="{{ route('register.email') }}" class="w-full bg-[#E6E6E6] text-[#1A0841] font-bold rounded-full py-3 px-4 shadow hover:bg-[#d1d1d1] transition text-lg text-center"
                   style="box-shadow: 2px 4px 4px #bbb;">
                    CONTINUAR COM E-MAIL
                </a>
            </div>
        </div>
    </div>
</body>
</html>
