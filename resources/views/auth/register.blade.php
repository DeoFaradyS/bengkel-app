@extends('layouts.app')

@section('title', 'Register')
@section('body-class', 'bg-gray-50')

@section('content')

<div class="flex flex-col items-center justify-center min-h-screen px-6">

    {{-- Logo --}}
    <a href="{{ route('home') }}" class="mb-6 text-2xl font-semibold text-black">
        Motorium
    </a>

    <div class="w-full max-w-md bg-white rounded-lg shadow">
        <div class="p-6 space-y-5 sm:p-8">

            <h1 class="text-xl font-bold text-gray-900 md:text-2xl">
                Create an account
            </h1>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                @if ($errors->any())
                    <div class="text-sm text-red-500">
                        {{ $errors->first() }}
                    </div>
                @endif

                <x-forms.input name="name" label="Full Name" type="text" required />
                <x-forms.input name="email" label="Email" type="email" required />
                <x-forms.input name="password" label="Password" type="password" required />
                <x-forms.input name="password_confirmation" label="Confirm Password" type="password" required />

                <x-ui.button type="submit" variant="default" class="w-full">
                    Register
                </x-ui.button>

                <p class="text-sm text-gray-500 text-center">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-black hover:underline">
                        Sign in
                    </a>
                </p>

            </form>
        </div>
    </div>
</div>

@endsection