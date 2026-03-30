<aside id="logo-sidebar" class="top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">

        {{-- Logo --}}
        <x-sidebar.logo />

        {{-- Menu --}}
        <ul class="space-y-2 font-medium">

            <x-sidebar.item :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="dashboard">
                Dashboard
            </x-sidebar.item>

            <x-sidebar.item :href="route('users.index')" :active="request()->routeIs('users.*')" icon="users">
                Users
            </x-sidebar.item>

            <x-sidebar.item :href="route('spareparts.index')" :active="request()->routeIs('spareparts.*')"
                icon="product">
                Products
            </x-sidebar.item>

        </ul>

    </div>
</aside>