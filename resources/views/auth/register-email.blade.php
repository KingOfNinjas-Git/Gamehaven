@extends('layouts.auth')

@section('title', 'Criar Conta')
@section('heading', 'Criar Conta')

@section('card')
    <form method="POST" action="{{ route('register.email.submit') }}" class="mt-6 flex w-full flex-col items-center px-8">
        @csrf
        <x-auth-field label="E-MAIL" name="email" type="email" autocomplete="email" />
        <x-auth-field label="PALAVRA-PASSE" name="password" type="password" autocomplete="new-password" />
        <x-auth-field label="CONFIRMAR PALAVRA-PASSE" name="password_confirmation" type="password" autocomplete="new-password" />
        <x-auth-field label="NIF" name="nif" />

        <div class="flex w-full gap-2">
            <x-auth-field label="NOME" name="first_name" autocomplete="given-name" class="w-1/2" />
            <x-auth-field label="APELIDO" name="surname" autocomplete="family-name" class="w-1/2" />
        </div>

        <div class="mb-3 flex w-full items-center">
            <span class="inline-flex items-center rounded-l-md border border-gray-400 bg-[#E6E6E6] px-3 py-2 shadow">
                <img src="https://flagcdn.com/pt.svg" alt="PT" width="24" height="16" class="mr-1 h-5 w-6">
                +351
            </span>
            <input name="phone" type="tel" required value="{{ old('phone') }}" aria-label="Telefone" placeholder="Nº TELEMOVEL" autocomplete="tel-national"
                   class="w-full rounded-r-md border-b border-r border-t border-gray-400 bg-[#E6E6E6] px-4 py-2 font-semibold text-[#1A0841] shadow">
        </div>

        <div class="mb-6 flex w-full items-center">
            <label for="birthdate" class="mr-2 block font-bold text-[#1A0841]">Data de Nascimento:</label>
            <input id="birthdate" name="birthdate" type="text" required value="{{ old('birthdate') }}" placeholder="DD/MM/AAAA" autocomplete="bday"
                   class="w-40 rounded-md border border-gray-400 bg-[#E6E6E6] px-4 py-2 font-semibold text-[#1A0841] shadow">
        </div>

        <button type="submit" class="w-40 rounded-full bg-[#E6E6E6] py-2 text-lg font-bold text-[#1A0841] shadow-[2px_4px_4px_#bbb] transition hover:bg-[#d1d1d1]">ENTRAR</button>
    </form>
@endsection
