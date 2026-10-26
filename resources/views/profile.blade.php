@extends('layouts.app')

@section('title', 'Perfil | GameHaven')

@section('content')

@php
    Auth::user()->refresh();
@endphp

<div class="flex flex-col items-center mt-12">
    <!-- Profile Card -->
    <div class="bg-gradient-to-br from-[#7C3AED] via-[#1A0841] to-[#7C3AED] rounded-3xl shadow-2xl max-w-lg w-full p-10 flex flex-col items-center border-4 border-[#7C3AED]">
        <!-- Profile Picture -->
        <div class="relative mb-6">
            @if(Auth::user()->profile_picture)
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-36 h-36 rounded-full object-cover border-4 border-white shadow-xl">
            @else
                <div class="w-36 h-36 rounded-full bg-[#fff] flex items-center justify-center text-6xl text-[#7C3AED] font-extrabold border-4 border-white shadow-xl">
                    {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1)) }}
                </div>
            @endif
            <!-- Change Picture Button -->
            <form method="POST" action="{{ route('profile.picture.update') }}" enctype="multipart/form-data" class="absolute bottom-2 right-2">
                @csrf
                <label class="cursor-pointer bg-[#7C3AED] hover:bg-[#5b28b6] text-white rounded-full p-2 shadow-lg flex items-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2a2.828 2.828 0 11-4-4 2.828 2.828 0 014 4z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7l-1.5 1.5M4 20h16" />
                    </svg>
                    <input type="file" name="profile_picture" accept="image/*" class="hidden" onchange="this.form.submit()">
                </label>
            </form>
        </div>
        <!-- User Info -->
        <h2 class="text-3xl font-bold text-white mb-2">{{ Auth::user()->first_name ?? '' }} {{ Auth::user()->surname ?? '' }}</h2>
        <p class="text-[#d1c4e9] mb-6 text-lg">{{ Auth::user()->email }}</p>
        <div class="bg-white rounded-xl shadow p-6 w-full">
            <div class="mb-4 flex items-center">
                <span class="font-semibold text-[#7C3AED] w-40">NIF:</span>
                <span class="text-lg font-mono text-[#1A0841] bg-[#f3e8ff] px-3 py-1 rounded-lg shadow-sm ml-auto text-right">{{ Auth::user()->nif ?? '-' }}</span>
            </div>
            <div class="mb-4 flex items-center">
                <span class="font-semibold text-[#7C3AED] w-40">Telemóvel:</span>
                <span class="text-lg font-mono text-[#1A0841] bg-[#f3e8ff] px-3 py-1 rounded-lg shadow-sm ml-auto text-right">{{ Auth::user()->phone ?? '-' }}</span>
            </div>
            <div class="mb-2 flex items-center">
                <span class="font-semibold text-[#7C3AED] w-40">Data de Nascimento:</span>
                <span class="text-lg font-mono text-[#1A0841] bg-[#f3e8ff] px-3 py-1 rounded-lg shadow-sm ml-auto text-right">
                    {{ Auth::user()->birthdate ? \Carbon\Carbon::parse(Auth::user()->birthdate)->format('d/m/Y') : '-' }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection