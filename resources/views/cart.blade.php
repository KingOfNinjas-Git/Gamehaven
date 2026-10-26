@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh]">
    <div class="w-full max-w-2xl">
        <h1 class="text-3xl font-extrabold mb-8 text-white drop-shadow text-center flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 7M7 13l-2 4h14"/>
                <circle cx="9" cy="21" r="1.5" fill="currentColor"/>
                <circle cx="19" cy="21" r="1.5" fill="currentColor"/>
            </svg>
            Seu Carrinho
        </h1>
        @if(count($cart))
            <div class="bg-gradient-to-br from-[#7C3AED] via-[#1A0841] to-[#7C3AED] rounded-2xl shadow-2xl p-10">
                @foreach($cart as $item)
                    <div class="flex items-center justify-between border-b border-[#7C3AED]/30 py-6 last:border-b-0">
                        <div class="flex items-center gap-6">
                            <img src="{{ asset('storage/' . ($item['cover_image'] ?? 'default.png')) }}" alt="{{ $item['title'] }}" class="h-24 w-24 rounded-xl shadow border-2 border-[#7C3AED] bg-white object-cover">
                            <span class="font-bold text-[#7C3AED] hover:underline transition text-2xl">{{ $item['title'] }}</span>
                        </div>
                        <span class="text-[#fff] text-2xl font-semibold">{{ number_format($item['price'], 2) }}€</span>
                    </div>
                @endforeach
                <div class="flex justify-between items-center mt-8 pt-6 border-t border-[#7C3AED]/30">
                    <span class="text-white font-bold text-xl">Total:</span>
                    <span class="text-[#7C3AED] text-3xl font-extrabold">
                        {{ number_format(collect($cart)->sum('price'), 2) }}€
                    </span>
                </div>
                <div class="flex justify-end mt-8">
                    <button class="bg-[#7C3AED] hover:bg-[#5b28b6] text-white px-10 py-4 rounded-full font-bold shadow-lg transition text-xl">
                        Finalizar Compra
                    </button>
                </div>
            </div>
        @else
            <div class="bg-[#1A0841]/80 rounded-xl shadow-lg p-8 text-center">
                <p class="text-white text-lg mb-2">Seu carrinho está vazio.</p>
                <a href="{{ route('ofertas') }}" class="inline-block mt-4 bg-[#7C3AED] hover:bg-[#5b28b6] text-white px-6 py-2 rounded-full font-bold shadow transition">
                    Ver Ofertas
                </a>
            </div>
        @endif
    </div>
</div>
@endsection