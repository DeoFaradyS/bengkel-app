@props(['title' => null])

@php
    $user = auth()->user();
@endphp

<nav class="bg-white w-full z-20 top-0 start-0 border-b border-default">
    <div class="flex items-center justify-between px-4 py-3">

        {{-- Page Title --}}
        <span class="text-base font-semibold text-heading">
            {{ $title ?? 'Dashboard' }}
        </span>

        {{-- Right: Bell + Divider + User --}}
        <div class="flex items-center gap-3">

            {{-- Bell --}}
            <button type="button" class="p-2 text-body rounded-base hover:bg-neutral-secondary">
                <span class="sr-only">Notifications</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z" />
                </svg>
            </button>

            {{-- Divider --}}
            <div class="w-px h-7 bg-gray-200"></div>

            {{-- User --}}
            <div class="relative">
                {{-- User --}}
                @php
                    $isAdmin = $user->role === 'admin';
                @endphp

                <div class="relative">
                    <button type="button" id="dashboard-user-button" data-dropdown-toggle="dashboard-user-dropdown"
                        class="flex items-center gap-2 px-2 py-1 rounded-lg hover:bg-gray-100 transition">

                        <div
                            class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-sm font-semibold text-blue-700">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <span class="text-sm font-medium text-gray-800">{{ $user->name }}</span>

                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    {{-- Dropdown --}}
                    <div id="dashboard-user-dropdown"
                        class="z-50 hidden absolute right-0 mt-2 bg-white border border-gray-200 rounded-xl shadow-lg w-52">

                        {{-- User info --}}
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ $user->email }}</p>
                        </div>

                        {{-- Menu items --}}
                        <ul class="p-2 space-y-0.5 text-sm text-gray-700">
                            @if($isAdmin)
                                <li>
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025ZM13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('user.bookings.index') }}"
                                        class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />
                                        </svg>
                                        Booking
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.vehicles.index') }}"
                                        class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 17H3a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1m12 4h2a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-1M5 17v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M5 17H4m1 0h14m0 0h1M7.5 12 9 7h6l1.5 5H7.5Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 17a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm12 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                                        </svg>
                                        Vehicle
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.profile') }}"
                                        class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                        Profile
                                    </a>
                                </li>
                            @endif
                        </ul>

                        {{-- Logout --}}
                        <div class="p-2 border-t border-gray-100">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex items-center gap-2 w-full px-3 py-2 text-sm text-red-600 rounded-lg hover:bg-red-50 transition">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</nav>