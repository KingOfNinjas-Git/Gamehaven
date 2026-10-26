@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-extrabold text-center text-white mb-8">Ofertas Especiais</h1>
    <form method="GET" action="{{ route('ofertas') }}" class="flex flex-wrap gap-3 mb-8 justify-center">
        @foreach($categories as $cat)
            <button type="submit" name="category" value="{{ $cat }}"
                class="px-4 py-2 rounded-full font-semibold transition
                    {{ $selectedCategory === $cat ? 'bg-[#7C3AED] text-white shadow' : 'bg-[#f3e8ff] text-[#1A0841] hover:bg-[#7C3AED] hover:text-white' }}">
                {{ $cat }}
            </button>
        @endforeach
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach($games as $game)
            <div class="bg-[#181818] rounded-xl shadow-lg overflow-hidden flex flex-col relative">
                <img src="{{ asset('storage/' . $game->cover_image) }}" alt="{{ $game->title }}" width="800" height="450" decoding="async" @if($loop->index >= 3) loading="lazy" @endif class="w-full h-64 object-cover">
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <h2 class="text-xl font-bold text-white mb-2">{{ $game->title }}</h2>
                    <div class="flex items-end justify-between mt-auto">
                        @if($game->discount > 0)
                            <span class="bg-[#7C3AED] text-white font-bold px-3 py-1 rounded-lg text-lg">-{{ rtrim(rtrim(number_format($game->discount, 2, '.', ''), '0'), '.') }}%</span>
                            <div class="flex flex-col items-end">
                                <span class="line-through text-gray-400 text-sm">{{ number_format($game->old_price, 2) }}€</span>
                                <span class="text-[#7C3AED] text-2xl font-bold">{{ number_format($game->price, 2) }}€</span>
                            </div>
                        @else
                            <span class="text-[#7C3AED] text-2xl font-bold">{{ number_format($game->price, 2) }}€</span>
                        @endif
                    </div>
                </div>
                @if(Auth::check() && Auth::user()->is_admin)
                    <div class="absolute top-2 right-2 flex space-x-2">
                        <a href="{{ route('admin.games.edit', $game) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white rounded-full p-2 shadow transition" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2a2.828 2.828 0 11-4-4 2.828 2.828 0 014 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7l-1.5 1.5M4 20h16" />
                            </svg>
                        </a>
                        <form action="{{ route('admin.games.destroy', $game) }}" method="POST" onsubmit="return confirm('Apagar este jogo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-2 shadow transition" title="Apagar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                @endif
                <form action="{{ route('cart.add', $game->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit"
                        class="w-full bg-[#7C3AED] hover:bg-[#5b28b6] text-white px-4 py-2 rounded-full font-bold shadow transition">
                        Adicionar ao Carrinho
                    </button>
                </form>
            </div>
        @endforeach
    </div>
    @if(Auth::check() && Auth::user()->is_admin)
        <div class="flex justify-end mt-8">
            <a href="{{ route('admin.games.create') }}" class="bg-[#7C3AED] hover:bg-[#5b28b6] text-white px-6 py-3 rounded-full font-bold shadow transition">Adicionar Jogo</a>
        </div>
    @endif
</div>
@endsection