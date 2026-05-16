<aside id="logo-sidebar"
    class="top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">

    <div class="flex flex-col h-full px-5 py-4 bg-neutral-primary-soft border-e border-default">

        <x-sidebar.logo />
        <hr class="border-default" />

        @php
            $menus = [
                'admin' => [
                    [
                        ['label' => 'Dashboard', 'icon' => 'dashboard', 'route' => 'admin.dashboard'],
                        ['label' => 'Finance',   'icon' => 'finance',   'route' => 'admin.finances.index'],
                    ],
                    [
                        ['label' => 'Booking',   'icon' => 'calendar',  'route' => 'admin.bookings.index'],
                        ['label' => 'Product',   'icon' => 'product',   'route' => 'admin.products.index'],
                    ],
                    [
                        ['label' => 'Service',   'icon' => 'service',   'route' => 'admin.services.index'],
                        ['label' => 'Customer',  'icon' => 'customer',  'route' => 'admin.customers.index'],
                    ],
                ],
                'user' => [
                    [
                        ['label' => 'Booking', 'icon' => 'calendar', 'route' => 'user.bookings.index'],
                        ['label' => 'Vehicle', 'icon' => 'vehicle',  'route' => 'user.vehicles.index'],
                    ],
                    [
                        ['label' => 'Profile', 'icon' => 'profile',  'route' => 'user.profile'],
                    ],
                ],
            ];

            $role = auth()->user()->role;
            $groups = $menus[$role] ?? [];
        @endphp

        <nav class="flex flex-col gap-4 mt-3">
            @foreach($groups as $index => $group)
                @if($index > 0)
                    <hr class="border-default" />
                @endif

                <ul class="space-y-2 font-medium">
                    @foreach($group as $menu)
                        <x-sidebar.item
                            :href="route($menu['route'])"
                            :active="request()->routeIs($menu['route'] . '*')"
                            :icon="$menu['icon']">
                            {{ $menu['label'] }}
                        </x-sidebar.item>
                    @endforeach
                </ul>
            @endforeach
        </nav>

        <div class="mt-auto pt-4 border-t border-default">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center w-full px-2 py-1.5 text-sm font-medium text-red-600 rounded-base hover:bg-red-50 transition">
                    <svg class="w-5 h-5 me-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>

    </div>
</aside>