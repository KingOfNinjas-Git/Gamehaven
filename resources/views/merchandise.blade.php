@extends('layouts.app')

@section('title', 'GameHaven')

@section('content')
    <!-- Title -->
    <div class="text-center py-6">
        <h1 class="text-4xl font-bold drop-shadow-lg">Merchandising</h1>
    </div>

    <!-- Merch da loja -->
    <section class="mb-8 bg-[#0B001F] rounded-2xl py-8">
        <h2 class="text-2xl font-semibold px-6 mb-6">Merch da loja</h2>
        <div class="flex flex-wrap justify-center items-end space-x-12 px-6">
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/MerchLoja_1.png') }}" alt="T-shirt (frente e verso)" class="max-h-70 mb-4 w-62 object-contain">
                <div class="bg-[#7C3AED] text-white px-4 py-1 rounded-t-lg w-48 text-center font-bold text-lg">-20%</div>
                <div class="bg-gray-800 px-4 py-2 rounded-b-lg w-48 text-center">
                    <span class="line-through text-gray-400 text-base">25,00€</span><br>
                    <span class="text-2xl font-bold">20,00€</span>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/MerchLoja_2.png') }}" alt="Shorts" class="max-h-70 mb-4 w-62 object-contain">
                <div class="bg-[#7C3AED] text-white px-4 py-1 rounded-t-lg w-48 text-center font-bold text-lg">-40%</div>
                <div class="bg-gray-800 px-4 py-2 rounded-b-lg w-48 text-center">
                    <span class="line-through text-gray-400 text-base">25,00€</span><br>
                    <span class="text-2xl font-bold">15,00€</span>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/MerchLoja_3.png') }}" alt="Hoodie" class="max-h-70 mb-4 w-62 object-contain">
                <div class="bg-[#7C3AED] text-white px-4 py-1 rounded-t-lg w-48 text-center font-bold text-lg">-25%</div>
                <div class="bg-gray-800 px-4 py-2 rounded-b-lg w-48 text-center">
                    <span class="line-through text-gray-400 text-base">80,00€</span><br>
                    <span class="text-2xl font-bold">60,00€</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Merch De Dias Especiais -->
    <section class="mb-8 bg-[#0B001F] rounded-2xl py-8">
        <h2 class="text-2xl font-semibold px-6 mb-6">Merch De Dias Especiais</h2>
        <div class="flex flex-wrap justify-center items-end space-x-12 px-6">
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/MerchLojaSpecial1.png') }}" alt="Special 1" class="max-h-70 mb-4 w-62 object-contain">
                <div class="bg-[#7C3AED] text-white px-4 py-1 rounded-t-lg w-48 text-center font-bold text-lg">OFF</div>
                <div class="bg-gray-800 px-4 py-2 rounded-b-lg w-48 text-center text-xl">Indisponível</div>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/MerchLojaSpecial2.png') }}" alt="Special 2" class="max-h-70 mb-4 w-62 object-contain">
                <div class="bg-[#7C3AED] text-white px-4 py-1 rounded-t-lg w-48 text-center font-bold text-lg">OFF</div>
                <div class="bg-gray-800 px-4 py-2 rounded-b-lg w-48 text-center text-xl">Indisponível</div>
            </div>
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/MerchLojaSpecial3.png') }}" alt="Special 3" class="max-h-70 mb-4 w-62 object-contain">
                <div class="bg-[#7C3AED] text-white px-4 py-1 rounded-t-lg w-48 text-center font-bold text-lg">OFF</div>
                <div class="bg-gray-800 px-4 py-2 rounded-b-lg w-48 text-center text-xl">Indisponível</div>
            </div>
        </div>
    </section>
@endsection