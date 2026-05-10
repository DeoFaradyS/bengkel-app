<x-layouts.app title="500 Server Error">

    <section class="min-h-screen flex items-center justify-center px-4">
        <div class="text-center max-w-md">
            <h1 class="text-7xl lg:text-9xl font-extrabold text-primary-600 tracking-tight mb-4">500</h1>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Internal Server Error</h2>
            <p class="text-gray-500 mb-8">Something went wrong on our end. We're working to fix it. Please try again.</p>
            <div class="flex justify-center gap-3">
                <x-ui.button onclick="window.location.reload()">🔄 Try Again</x-ui.button>
                <x-ui.button href="{{ url('/') }}" variant="outline">Back to Home</x-ui.button>
            </div>
        </div>
    </section>

</x-layouts.app>