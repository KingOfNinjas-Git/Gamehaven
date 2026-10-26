<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GameHaven Login</title>
    @include('partials.share-head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1A0841] min-h-screen flex flex-col justify-between">
    @include('partials.demo-bar')
    <div class="flex flex-col items-center mt-8">
        <!-- Logo -->
        <img src="{{ asset('images/gamehavenlogo.png') }}" alt="GameHaven Logo" class="h-44 mb-4">
        <!-- Language Switch -->
        <div class="text-white text-xl mb-8 tracking-widest">PT|ENG</div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-lg w-[90vw] max-w-md flex flex-col items-center pb-8">
            <div class="w-full flex justify-center -mt-8">
                <div class="bg-white rounded-t-2xl px-8 py-2 text-3xl font-bold text-[#1A0841] drop-shadow-lg">Log-In</div>
            </div>
            <form method="POST" action="{{ route('login') }}" class="w-full px-8 flex flex-col items-center">
                @csrf

                <!-- Email Address -->
                <div class="w-full mb-4">
                    <label for="email" class="block text-[#1A0841] font-bold mb-1">E-MAIL</label>
                    <input id="email" type="email" name="email" required autofocus autocomplete="username"
                        class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold focus:outline-none focus:ring-2 focus:ring-[#7C3AED]" />
                </div>

                <!-- Password -->
                <div class="w-full mb-4">
                    <label for="password" class="block text-[#1A0841] font-bold mb-1">PALAVRA-PASSE</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold focus:outline-none focus:ring-2 focus:ring-[#7C3AED]" />
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-40 mt-2 mb-2 bg-[#E6E6E6] text-[#1A0841] font-bold rounded-full py-2 shadow hover:bg-[#d1d1d1] transition">ENTRAR</button>
            </form>

            <!-- Register Link -->
            <div class="text-center mt-2 mb-2 text-[#1A0841] font-semibold text-sm">
                Ainda não tem conta? Crie uma!
            </div>
            <a href="{{ route('register') }}" class="w-40 bg-[#E6E6E6] text-[#1A0841] font-bold rounded-full py-2 shadow hover:bg-[#d1d1d1] transition block text-center mb-2">Criar Conta</a>

            <!-- Guest Button -->
            <a href="{{ url('/') }}" class="w-60 bg-[#E6E6E6] text-[#1A0841] font-bold rounded-full py-2 shadow hover:bg-[#d1d1d1] transition block text-center mt-2">ENTRAR COMO CONVIDADO</a>
        </div>

        <!-- Info Box -->
        <div class="bg-white rounded-2xl shadow-lg mt-8 px-8 py-6 text-center text-[#1A0841] font-bold text-lg max-w-2xl">
            Apenas introduza o seu email e a sua palavra passe e de seguida escolha a opção “Entrar”.
        </div>
    </div>
</body>
</html>
