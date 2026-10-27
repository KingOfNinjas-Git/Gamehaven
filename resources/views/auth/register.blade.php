@extends('layouts.auth')

@section('title', 'Criar Conta')
@section('heading', 'Criar Conta')

@section('card')
    <div class="mt-6 flex w-full flex-col items-center gap-4 px-8">
        {{-- The Google sign-up is only in the design for now --}}
        <a href="#" class="flex w-full items-center justify-center rounded-full bg-[#E6E6E6] px-4 py-3 text-lg font-bold text-[#1A0841] shadow-[2px_4px_4px_#bbb] transition hover:bg-[#d1d1d1]">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="" width="24" height="24" class="mr-3 h-6 w-6">
            CONTINUAR COM GOOGLE
        </a>
        <a href="{{ route('register.email') }}" class="w-full rounded-full bg-[#E6E6E6] px-4 py-3 text-center text-lg font-bold text-[#1A0841] shadow-[2px_4px_4px_#bbb] transition hover:bg-[#d1d1d1]">
            CONTINUAR COM E-MAIL
        </a>
    </div>
@endsection
