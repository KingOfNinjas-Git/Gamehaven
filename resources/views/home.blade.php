@extends('layouts.app')

@section('title', 'GameHaven | Jogos, consolas e merchandising')

{{-- Swiper (the promotions carousel) is only needed on this page --}}
@push('head')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
@endpush

@php
    // The pictures in the three rows below. [file in public/images (without .webp), description, width, height, extra classes]
    // The "tall" pictures are 14 rem high on phones and keep their own size (up to 24 rem) from tablets up.
    $rows = [
        [
            'title' => 'Jogos para alugar',
            'link' => route('ofertas'),
            'items' => [
                ['SonicUnleashed', 'Sonic Unleashed', 258, 362, 'h-56 md:h-auto md:max-h-96'],
                ['Zelda', 'The Legend of Zelda (cartucho)', 258, 208, 'h-40 md:h-auto md:max-h-60'],
                ['StarFox', 'Star Fox Adventures', 258, 362, 'h-56 md:h-auto md:max-h-96'],
                ['Link', 'The Legend of Zelda: Ocarina of Time', 285, 387, 'h-56 md:h-auto md:max-h-96'],
                ['Mario', 'Super Mario Bros. Wonder', 800, 1282, 'h-56 md:h-auto md:max-h-96'],
            ],
        ],
        [
            'title' => 'Consolas para alugar',
            'link' => route('ofertas'),
            'items' => [
                ['Console1', 'Consola 1', 358, 227, 'h-28 md:h-auto md:max-h-32'],
                ['Console2', 'Consola 2', 358, 150, 'h-28 md:h-auto md:max-h-32'],
                ['Console3', 'Consola 3', 648, 385, 'h-28 md:h-auto md:max-h-32'],
            ],
        ],
        [
            'title' => 'Merch da loja',
            'link' => route('merchandise'),
            'items' => [
                ['Merch1', 'Merchandise 1', 300, 300, 'h-44 md:h-auto'],
                ['Merch2', 'Merchandise 2', 300, 300, 'h-44 md:h-auto'],
                ['Merch3', 'Merchandise 3', 300, 300, 'h-44 md:h-auto'],
            ],
        ],
    ];

    $promotions = [
        ['Promotions', 'Promoção 1', 1024, 1024],
        ['Hytale', 'Promoção 2', 1000, 563],
        ['Tears', 'Promoção 3', 1170, 720],
    ];
@endphp

@section('content')
    <h1 class="sr-only">GameHaven: jogos, consolas e merchandising</h1>

    <!-- Promotions carousel -->
    <section class="flex justify-center py-8">
        <div class="w-full md:w-4/5">
            <div class="swiper rounded-2xl">
                <div class="swiper-wrapper">
                    @foreach ($promotions as [$file, $alt, $w, $h])
                        <div class="swiper-slide">
                            <img src="{{ asset("images/{$file}.webp") }}" width="{{ $w }}" height="{{ $h }}" alt="{{ $alt }}"
                                 @if ($loop->first) fetchpriority="high" @else loading="lazy" decoding="async" @endif
                                 class="mx-auto max-h-[28rem] w-full rounded-2xl object-cover">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- Games, consoles and merchandise: one scrolling row each on phones, centred on wide screens -->
    @foreach ($rows as $row)
        <section class="mb-8 rounded-2xl bg-[#0B001F] py-8">
            <div class="mb-4 flex items-center justify-between gap-3 px-6">
                <h2 class="text-2xl font-bold">{{ $row['title'] }}</h2>
                <a href="{{ $row['link'] }}" class="shrink-0 rounded-full bg-white px-4 py-2 font-bold text-purple-800">Ver mais</a>
            </div>
            <div tabindex="0" role="region" aria-label="{{ $row['title'] }}" class="flex items-center gap-4 overflow-x-auto px-6 pb-2 md:justify-center md:gap-8 md:overflow-visible">
                @foreach ($row['items'] as [$file, $alt, $w, $h, $size])
                    <img src="{{ asset("images/{$file}.webp") }}" width="{{ $w }}" height="{{ $h }}" alt="{{ $alt }}"
                         loading="lazy" decoding="async" class="{{ $size }} w-auto max-w-none shrink-0 rounded-lg md:min-w-0 md:max-w-full md:shrink">
                @endforeach
            </div>
        </section>
    @endforeach
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.swiper', {
                loop: true,
                pagination: { el: '.swiper-pagination', clickable: true },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
                autoplay: { delay: 4000 },
            });
        });
    </script>
@endpush
