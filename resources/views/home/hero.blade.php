<section class="px-6 lg:px-10">
    <div class="relative min-h-[70vh] lg:min-h-[80vh] rounded-2xl overflow-hidden flex items-end justify-center text-center">

        {{-- Background Image --}}
        <img 
            src="https://framerusercontent.com/images/t1OphaUCE4AB6nK9Dyw5RTigHOE.webp"
            alt="Car Repair"
            class="absolute inset-0 w-full h-full object-cover"
        />

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>

        {{-- Content --}}
        <div class="relative z-10 max-w-3xl px-4 pb-16">
            
            {{-- Social Proof --}}
            <div class="flex items-center justify-center gap-3 mb-6">
                <x-avatar-group />
                <span class="text-sm text-white font-medium">
                    2,500+ Successful Repairs
                </span>
            </div>

            {{-- Heading --}}
            <h1 class="text-6xl font-medium text-white leading-tight mb-4">
                Reliable Premium <br class="hidden md:block" />
                Car Repair in Dubai
            </h1>

            {{-- Description --}}
            <p class="text-gray-300 text-md mb-8">
                Expert diagnostics and consistently dependable repairs.
            </p>

            {{-- CTA --}}
            <button class="px-6 py-3 text-sm font-semibold bg-white text-black rounded-xl hover:bg-gray-100 transition shadow-md">
                Explore Services
            </button>

        </div>
    </div>
</section>