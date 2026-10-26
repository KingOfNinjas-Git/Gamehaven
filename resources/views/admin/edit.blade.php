@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh]">
    <h1 class="text-3xl font-extrabold mb-8 text-white drop-shadow">Editar Jogo</h1>
    <form action="{{ route('admin.games.update', $game) }}" method="POST" enctype="multipart/form-data"
        class="bg-gradient-to-br from-[#7C3AED] via-[#1A0841] to-[#7C3AED] rounded-2xl shadow-2xl max-w-md w-full p-8 space-y-6 border-2 border-[#7C3AED]">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-semibold mb-2 text-white">Título</label>
            <input type="text" name="title" class="w-full border-0 rounded-lg px-4 py-2 bg-[#f3e8ff] focus:ring-2 focus:ring-[#7C3AED] text-[#1A0841] font-semibold" value="{{ old('title', $game->title) }}" required>
        </div>
        <div>
            <label class="block font-semibold mb-2 text-white">Capa Atual</label>
            <img src="{{ asset('storage/' . $game->cover_image) }}" class="h-32 mb-2 rounded shadow border-2 border-[#7C3AED]">
            <input type="file" name="cover_image" class="w-full border-0 rounded-lg px-4 py-2 bg-[#f3e8ff] text-[#1A0841] font-semibold file:bg-[#7C3AED] file:text-white file:rounded-lg file:px-4 file:py-2">
            <small class="text-gray-300">Deixe em branco para manter a capa atual.</small>
        </div>
        <div class="flex space-x-4">
            <div class="flex-1">
                <label class="block font-semibold mb-2 text-white">Preço</label>
                <input type="number" step="0.01" name="price" class="w-full border-0 rounded-lg px-4 py-2 bg-[#f3e8ff] focus:ring-2 focus:ring-[#7C3AED] text-[#1A0841] font-semibold" value="{{ old('price', $game->price) }}" required>
            </div>
            <div class="flex-1">
                <label class="block font-semibold mb-2 text-white">Preço Antigo</label>
                <input type="number" step="0.01" name="old_price" class="w-full border-0 rounded-lg px-4 py-2 bg-[#f3e8ff] focus:ring-2 focus:ring-[#7C3AED] text-[#1A0841] font-semibold" value="{{ old('old_price', $game->old_price) }}">
            </div>
        </div>
        <div class="flex space-x-4">
            <div class="flex-1">
                <label class="block font-semibold mb-2 text-white">Desconto (%)</label>
                <input type="number" step="0.01" name="discount" class="w-full border-0 rounded-lg px-4 py-2 bg-[#f3e8ff] focus:ring-2 focus:ring-[#7C3AED] text-[#1A0841] font-semibold" value="{{ old('discount', $game->discount) }}">
            </div>
            <div class="flex-1">
                <label class="block font-semibold mb-2 text-white">Categoria</label>
                <select name="category" class="w-full border-0 rounded-lg px-4 py-2 bg-[#f3e8ff] focus:ring-2 focus:ring-[#7C3AED] text-[#1A0841] font-semibold" required>
                    <option value="">Selecione uma categoria</option>
                    @php
                        $categories = [
                            'Featured', 'Action-Adventure', 'Arcade', 'Casual', 'Action',
                            'Open-World', 'RPG', 'Horror', 'Strategy', 'Hack & Slash', 'Shooter', 'Racing'
                        ];
                    @endphp
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ (old('category', $game->category) == $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit"
            class="w-full bg-[#7C3AED] hover:bg-[#5b28b6] text-white px-6 py-3 rounded-full font-bold shadow-lg transition text-lg mt-4 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M9 9h6M9 15h6" />
            </svg>
            Atualizar
        </button>
    </form>
</div>
@endsection