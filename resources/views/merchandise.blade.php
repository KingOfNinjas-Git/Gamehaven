@extends('layouts.app')

@section('title', 'GameHaven')

@php
    // [picture (public/images, without .webp), description, discount label, old price, price] - no prices means "Indisponível"
    $sections = [
        'Merch da loja' => [
            ['MerchLoja_1', 'T-shirt (frente e verso)', '-20%', '25,00€', '20,00€'],
            ['MerchLoja_2', 'Shorts', '-40%', '25,00€', '15,00€'],
            ['MerchLoja_3', 'Hoodie', '-25%', '80,00€', '60,00€'],
        ],
        'Merch De Dias Especiais' => [
            ['MerchLojaSpecial1', 'Edição especial 1', 'OFF'],
            ['MerchLojaSpecial2', 'Edição especial 2', 'OFF'],
            ['MerchLojaSpecial3', 'Edição especial 3', 'OFF'],
        ],
    ];
@endphp

@section('content')
    <div class="py-6 text-center">
        <h1 class="text-4xl font-bold drop-shadow-lg">Merchandising</h1>
    </div>

    @foreach ($sections as $title => $products)
        <section class="mb-8 rounded-2xl bg-[#0B001F] py-8">
            <h2 class="mb-6 px-6 text-2xl font-semibold">{{ $title }}</h2>
            <div class="flex flex-wrap items-end justify-center gap-x-12 gap-y-8 px-6">
                @foreach ($products as $product)
                    @php([$file, $alt, $badge, $oldPrice, $price] = array_pad($product, 5, null))
                    <div class="flex flex-col items-center">
                        <img src="{{ asset("images/{$file}.webp") }}" width="300" height="300" alt="{{ $alt }}"
                             loading="lazy" decoding="async" class="mb-4 h-72 w-auto object-contain">
                        <div class="w-48 rounded-t-lg bg-[#7C3AED] px-4 py-1 text-center text-lg font-bold text-white">{{ $badge }}</div>
                        <div class="w-48 rounded-b-lg bg-gray-800 px-4 py-2 text-center">
                            @if ($price)
                                <span class="block text-base text-gray-400 line-through">{{ $oldPrice }}</span>
                                <span class="text-2xl font-bold">{{ $price }}</span>
                            @else
                                <span class="text-xl">Indisponível</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
@endsection
