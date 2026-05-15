<x-layouts.app title="404 Not Found">

    <section class="min-h-screen flex items-center justify-center px-4">
        <div class="text-center max-w-md">
            <h1 class="text-7xl lg:text-9xl font-extrabold text-primary-600 tracking-tight mb-4">404</h1>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Page not found</h2>
            <p class="text-gray-500 mb-8">Sorry, the page you're looking for doesn't exist or has been moved.</p>
            <div class="flex justify-center gap-3">
                <x-button href="{{ url('/') }}">← Back to Home</x-button>
                <x-button href="{{ url()->previous() }}" variant="outline">Go Back</x-button>
            </div>
        </div>
    </section>

</x-layouts.app>