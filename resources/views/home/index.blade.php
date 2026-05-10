<x-layouts.app title="Home">

    <x-navbar.main />

    <div class="flex flex-col gap-10">
        @include('home.hero')
        @include('home.benefits')
    </div>

</x-layouts.app>