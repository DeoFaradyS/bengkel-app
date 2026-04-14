@extends('layouts.app')

@section('title', 'Login')
@section('body-class', 'bg-gray-50')

@section('content')

<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen">

<a href="{{ route('home') }}" class="mb-6 text-2xl font-semibold text-black">
        Motorium
    </a>
    <div class="w-full bg-white rounded-lg shadow sm:max-w-md">
        <div class="p-6 space-y-5 sm:p-8">

            <h1 class="text-xl font-bold text-gray-900 md:text-2xl">
                Sign in to your account
            </h1>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                @if ($errors->any())
                    <div class="text-sm text-red-500">
                        {{ $errors->first() }}
                    </div>
                @endif

                <x-forms.input name="email" label="Email" type="email" required />
                <x-forms.input name="password" label="Password" type="password" required />

                <x-ui.button type="submit" variant="primary" class="w-full">
                    Sign in
                </x-ui.button>

                <p class="text-sm text-gray-500">
                    Don’t have an account yet?
                    <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline">
                        Sign up
                    </a>
                </p>

            </form>
        </div>
    </div>

</div>

@endsection