@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen">

    <a href="#" class="flex items-center mb-8 text-2xl font-semibold text-gray-900">
        <img class="w-8 h-8 mr-2"
            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
        Flowbite
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
                    <a href="#" class="font-medium text-primary-600 hover:underline">
                        Sign up
                    </a>
                </p>

            </form>
        </div>
    </div>

</div>

@endsection