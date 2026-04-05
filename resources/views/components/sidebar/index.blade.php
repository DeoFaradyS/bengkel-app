<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">

    <div class="flex flex-col h-full px-3 py-4 bg-neutral-primary-soft border-e border-default">

        {{-- TOP (Logo + Menu) --}}
        <div>

            {{-- Logo --}}
            <x-sidebar.logo />

            {{-- Menu --}}
            <ul class="space-y-2 font-medium mt-6">

                <x-sidebar.item 
                    :href="route('admin.dashboard')" 
                    :active="request()->routeIs('admin.dashboard')" 
                    icon="dashboard">
                    Dashboard
                </x-sidebar.item>

                <x-sidebar.item 
                    :href="route('admin.users.index')" 
                    :active="request()->routeIs('admin.users.*')" 
                    icon="users">
                    Users
                </x-sidebar.item>

                <x-sidebar.item 
                    :href="route('admin.spareparts.index')" 
                    :active="request()->routeIs('admin.spareparts.*')"
                    icon="product">
                    Spareparts
                </x-sidebar.item>

                <x-sidebar.item icon="box">
                    Service
                </x-sidebar.item>

            </ul>

        </div>

        {{-- BOTTOM (Logout) --}}
        <div class="mt-auto pt-4 border-t border-default">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                    class="flex items-center w-full px-3 py-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 transition">

                    {{-- Icon --}}
                    <svg class="w-5 h-5 me-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M16 12H3m0 0 4-4m-4 4 4 4m13-4a9 9 0 1 1-9-9" />
                    </svg>

                    Logout
                </button>
            </form>

        </div>

    </div>
</aside>