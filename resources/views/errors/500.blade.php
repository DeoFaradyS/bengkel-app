@extends('layouts.app')

@section('title', '500 Server Error')

@section('body-class', 'bg-white')

@section('content')
<section class="min-h-screen flex items-center justify-center px-4">

    <div class="text-center max-w-md">

        {{-- Code --}}
        <h1 class="text-7xl lg:text-9xl font-extrabold text-primary-600 tracking-tight mb-4">
            500
        </h1>

        {{-- Title --}}
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">
            Internal Server Error
        </h2>

        {{-- Description --}}
        <p class="text-gray-500 mb-8">
            Something went wrong on our end. We're working to fix it. 
            Please try again.
        </p>

        {{-- Actions --}}
        <div class="flex justify-center gap-3">

            {{-- Refresh --}}
            <x-ui.button onclick="window.location.reload()">
                🔄 Try Again
            </x-ui.button>

            {{-- Back Home --}}
            <x-ui.button href="{{ url('/') }}" variant="outline">
                Back to Home
            </x-ui.button>

        </div>

    </div>

</section>
@endsection