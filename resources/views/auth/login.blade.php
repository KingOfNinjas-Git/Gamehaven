@extends('layouts.auth')

@section('title', 'Log-In')
@section('heading', 'Log-In')

@section('card')
    <form method="POST" action="{{ route('login') }}" class="mt-6 flex w-full flex-col items-center px-8">
        @csrf
        <x-auth-field label="E-MAIL" name="email" type="email" autocomplete="username" autofocus />
        <x-auth-field label="PALAVRA-PASSE" name="password" type="password" autocomplete="current-password" />

        <button type="submit" class="mb-2 mt-2 w-40 rounded-full bg-[#E6E6E6] py-2 font-bold text-[#1A0841] shadow transition hover:bg-[#d1d1d1]">ENTRAR</button>
    </form>

    <p class="mb-2 mt-2 text-center text-sm font-semibold text-[#1A0841]">Ainda não tem conta? Crie uma!</p>
    <a href="{{ route('register') }}" class="mb-2 block w-40 rounded-full bg-[#E6E6E6] py-2 text-center font-bold text-[#1A0841] shadow transition hover:bg-[#d1d1d1]">Criar Conta</a>
    <a href="{{ url('/') }}" class="mt-2 block w-60 rounded-full bg-[#E6E6E6] py-2 text-center font-bold text-[#1A0841] shadow transition hover:bg-[#d1d1d1]">ENTRAR COMO CONVIDADO</a>
@endsection

@section('below')
    <p class="mt-8 max-w-2xl rounded-2xl bg-white px-8 py-6 text-center text-lg font-bold text-[#1A0841] shadow-lg">
        Apenas introduza o seu email e a sua palavra passe e de seguida escolha a opção “Entrar”.
    </p>
@endsection
