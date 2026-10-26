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
            <form method="POST" action="{{ route('register.email.submit') }}" class="w-full px-8 flex flex-col items-center mt-6">
                @csrf
                <!-- Email -->
                <div class="w-full mb-3">
                    <label class="block text-[#1A0841] font-bold mb-1">E-MAIL <span class="text-black">*</span></label>
                    <input name="email" type="email" class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold" required>
                </div>
                <!-- Password -->
                <div class="w-full mb-3">
                    <label class="block text-[#1A0841] font-bold mb-1">PALAVRA-PASSE <span class="text-black">*</span></label>
                    <input name="password" type="password" class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold" required>
                </div>
                <!-- Confirm Password -->
                <div class="w-full mb-3">
                    <label class="block text-[#1A0841] font-bold mb-1">CONFIRMAR PALAVRA-PASSE <span class="text-black">*</span></label>
                    <input name="password_confirmation" type="password" class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold" required>
                </div>
                <!-- NIF -->
                <div class="w-full mb-3">
                    <label class="block text-[#1A0841] font-bold mb-1">NIF <span class="text-black">*</span></label>
                    <input name="nif" type="text" class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold" required>
                </div>
                <!-- Name and Surname -->
                <div class="w-full flex space-x-2 mb-3">
                    <div class="w-1/2">
                        <label class="block text-[#1A0841] font-bold mb-1">NOME <span class="text-black">*</span></label>
                        <input name="first_name" type="text" class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold" required>
                    </div>
                    <div class="w-1/2">
                        <label class="block text-[#1A0841] font-bold mb-1">APELIDO <span class="text-black">*</span></label>
                        <input name="surname" type="text" class="w-full rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold" required>
                    </div>
                </div>
                <!-- Phone -->
                <div class="w-full mb-3 flex items-center">
                    <span class="inline-flex items-center bg-[#E6E6E6] border border-gray-400 rounded-l-md px-3 py-2 shadow">
                        <img src="https://flagcdn.com/pt.svg" alt="PT" class="h-5 w-6 mr-1">
                        +351
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </span>
                    <input name="phone" type="text" class="w-full rounded-r-md border-t border-b border-r border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold" placeholder="Nº TELEMOVEL" required>
                </div>
                <!-- Birthdate -->
                <div class="w-full mb-6 flex items-center">
                    <label class="block text-[#1A0841] font-bold mr-2">Data de Nascimento:</label>
                    <input name="birthdate" type="text" class="rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 shadow text-[#1A0841] font-semibold w-40" placeholder="DD/MM/AAAA" required>
                </div>
                <!-- Submit -->
                <button type="submit" class="w-40 bg-[#E6E6E6] text-[#1A0841] font-bold rounded-full py-2 shadow hover:bg-[#d1d1d1] transition text-lg" style="box-shadow: 2px 4px 4px #bbb;">ENTRAR</button>
            </form>
        </div>
    </div>
</body>
</html>