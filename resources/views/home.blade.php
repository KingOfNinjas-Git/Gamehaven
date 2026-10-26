@extends('layouts.app')

@section('title', 'GameHaven')

@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GameHaven</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#18063A] text-white">

    <div class="container mx-auto px-4">
        

        <!-- Promotions Carousel -->
        <section class="py-8 flex justify-center">
            <div class="w-4/5"> <!-- Changed from w-4/5 to w-full -->
                <div class="swiper rounded-2xl">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('images/Promotions.png') }}" alt="Promotion 1" class="w-full max-h-[28rem] object-cover rounded-2xl mx-auto" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/Hytale.jpg') }}" alt="Promotion 2" class="w-full max-h-[28rem] object-cover rounded-2xl mx-auto" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/Tears.png') }}" alt="Promotion 3" class="w-full max-h-[28rem] object-fit rounded-2xl mx-auto" />
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>

        <!-- Jogos para alugar (Games to Rent) -->
        <section class="py-8 bg-[#0B001F] rounded-2xl mb-8">
            <div class="flex items-center justify-between mb-4 px-6">
                <h2 class="text-2xl font-bold">Jogos para alugar</h2>
                <a href="{{ route('ofertas') }}">
                    <button class="bg-white text-purple-800 font-bold py-2 px-4 rounded-full">
                        Ver mais
                    </button>
                </a>
            </div>
            <div class="flex items-center justify-center space-x-8 px-6">
                <div class="game-item">
                    <img src="{{ asset('images/SonicUnleashed.png') }}" alt="Game 1" class="rounded-lg max-h-96">
                </div>
                <div class="game-item">
                    <img src="{{ asset('images/Zelda.png') }}" alt="Game 2" class="rounded-lg max-h-60">
                </div>
                <div class="game-item">
                    <img src="{{ asset('images/StarFox.png') }}" alt="Game 3" class="rounded-lg max-h-96">
                </div>
                <div class="game-item">
                    <img src="{{ asset('images/Link.png') }}" alt="Game 4" class="rounded-lg max-h-96">
                </div>
                <div class="game-item">
                    <img src="{{ asset('images/Mario.jpg') }}" alt="Game 5" class="rounded-lg max-h-96">
                </div>
            </div>
        </section>

        <!-- Consolas para alugar (Consoles to Rent) -->
        <section class="py-8 bg-[#0B001F] rounded-2xl mb-8">
            <div class="flex items-center justify-between mb-4 px-6">
                <h2 class="text-2xl font-bold">Consolas para alugar</h2>
                <a href="{{ route('ofertas') }}">
                    <button class="bg-white text-purple-800 font-bold py-2 px-4 rounded-full">
                        Ver mais
                    </button>
                </a>
            </div>
            <div class="flex items-center justify-center space-x-8 px-6">
                <div class="game-item">
                    <img src="{{ asset('images/Console1.png') }}" alt="Console 1" class="rounded-lg max-h-32">
                </div>
                <div class="game-item">
                    <img src="{{ asset('images/Console2.png') }}" alt="Console 2" class="rounded-lg max-h-32">
                </div>
                <div class="game-item">
                    <img src="{{ asset('images/Console3.png') }}" alt="Console 3" class="rounded-lg max-h-32">
                </div>
            </div>
        </section>

        <!-- Merch da loja (Store Merch) -->
        <section class="py-8 bg-[#0B001F] rounded-2xl mb-8">
            <div class="flex items-center justify-between mb-4 px-6">
                <h2 class="text-2xl font-bold">Merch da loja</h2>
                <a href="{{ route('merchandise') }}">
                    <button class="bg-white text-purple-800 font-bold py-2 px-4 rounded-full">
                        Ver mais
                    </button>
                </a>
            </div>
            <div class="flex items-center justify-center space-x-8 px-6">
                <div class="merch-item">
                    <img src="{{ asset('images/Merch1.png') }}" alt="Merch 1" class="rounded-lg max-h-70">
                </div>
                <div class="merch-item">
                    <img src="{{ asset('images/Merch2.png') }}" alt="Merch 2" class="rounded-lg max-h-70">
                </div>
                <div class="merch-item">
                    <img src="{{ asset('images/Merch3.png') }}" alt="Merch 3" class="rounded-lg max-h-70">
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".swiper", {
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                autoplay: {
                    delay: 4000,
                },
            });
        });
    </script>

    </body>
    </html>
@endsection
