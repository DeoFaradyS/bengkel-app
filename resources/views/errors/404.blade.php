@extends('layouts.app')

@section('title', '404 Not Found')

@section('body-class', 'bg-white')

@section('content')
<section class="min-h-screen flex items-center justify-center px-4">

    <div class="text-center max-w-md">

        {{-- Code --}}
        <h1 class="text-7xl lg:text-9xl font-extrabold text-primary-600 tracking-tight mb-4">
            404
        </h1>

        {{-- Title --}}
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">
            Page not found
        </h2>

        {{-- Description --}}
        <p class="text-gray-500 mb-8">
            Sorry, the page you’re looking for doesn’t exist or has been moved.
        </p>

        {{-- Actions --}}
        <div class="flex justify-center gap-3">

            {{-- Back Home --}}
            <x-ui.button href="{{ url('/') }}">
                ← Back to Home
            </x-ui.button>

            {{-- Go Back --}}
            <x-ui.button 
                href="{{ url()->previous() }}" 
                variant="outline"
            >
                Go Back
            </x-ui.button>

        </div>

    </div>

</section>
@endsection