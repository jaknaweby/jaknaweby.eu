@extends('layouts.auth-template')

@section('auth-title')
    Log in
@endsection

@section('auth-content')
    {{-- Session Status --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-guest-layout>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Username --}}
            <div>
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" required autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Remember Me --}}
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('register'))    
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none mr-2" href="{{ route('register') }}">
                        Not registered yet?
                    </a>
                @endif
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    Log in
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
@endsection