<nav class="w-full bg-white sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex items-center justify-between h-16">

      {{-- Logo --}}
      <a href="{{ route('home') }}" class="text-xl font-semibold text-black">
        Motorium
      </a>

      {{-- Menu --}}
      <div class="hidden md:flex items-center gap-8 text-md font-regular text-gray-600">
        <a href="/services" class="hover:text-black transition">Services</a>
        <a href="/repair-cases" class="hover:text-black transition">Cases</a>
        <a href="/before-after" class="hover:text-black transition">Before & After</a>
        <a href="/contact" class="hover:text-black transition">Contact</a>
      </div>

      {{-- Actions --}}
      <div class="flex items-center gap-3">

        @guest
          <x-ui.button href="{{ route('login') }}" variant="outline" size="md">
            Login
          </x-ui.button>

          <x-ui.button href="{{ route('register') }}" variant="default" size="md">
            Register
          </x-ui.button>
        @endguest

        @auth
          <x-ui.button
            href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
            variant="outline"
            size="md"
          >
            Dashboard
          </x-ui.button>

          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <x-ui.button type="submit" variant="default" size="md">
              Logout
            </x-ui.button>
          </form>
        @endauth

      </div>

    </div>
  </div>
</nav>