{{-- ============================================================
Komponen Sidebar (Flowbite)
Sumber: https://flowbite.com/docs/components/sidebar/
Digunakan di: layouts/app.blade.php via @include('components.sidebar')
============================================================ --}}

{{-- Tombol toggle sidebar — hanya muncul di layar kecil (mobile) --}}
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button" class="text-heading bg-transparent box-border border border-transparent
           hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary
           font-medium leading-5 rounded-base ms-3 mt-3 text-sm p-2
           focus:outline-none inline-flex sm:hidden">
    <span class="sr-only">Buka sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
        viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10" />
    </svg>
</button>

{{-- ===== SIDEBAR ===== --}}
<aside id="default-sidebar"
    class="top-0 left-0 w-80 h-full transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">

    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default flex flex-col">

        {{-- ---- Logo / Brand ---- --}}
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 mb-6 px-2">
            {{-- Ikon brand --}}
            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-600 text-white shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.5 2.5a7.5 7.5 0 0 1 7.5 7.5h-7.5v-7.5Z" />
                </svg>
            </span>
            {{-- Nama aplikasi --}}
            <span class="text-sm font-semibold text-gray-900 dark:text-white leading-tight">
                Bengkel App
                <span class="block text-xs font-normal text-gray-500 dark:text-gray-400">
                    Management System
                </span>
            </span>
        </a>

        {{-- ---- Menu Navigasi Utama ---- --}}
        <ul class="space-y-2 font-medium flex-1">

            {{-- Menu: Dashboard --}}
            <li>
                <a href="{{ url('/') }}" class="flex items-center px-2 py-1.5 text-body rounded-base
                          hover:bg-neutral-tertiary hover:text-fg-brand group">
                    <svg class="w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            {{-- Menu: Inbox --}}
            <li>
                <a href="#" class="flex items-center px-2 py-1.5 text-body rounded-base
                          hover:bg-neutral-tertiary hover:text-fg-brand group">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                    {{-- Badge jumlah pesan belum dibaca --}}
                    <span class="inline-flex items-center justify-center w-4.5 h-4.5 ms-2
                                 text-xs font-medium text-fg-danger-strong bg-danger-soft
                                 border border-danger-subtle rounded-full">2</span>
                </a>
            </li>

            {{-- Menu: Users --}}
            <li>
                <a href="#" class="flex items-center px-2 py-1.5 text-body rounded-base
                          hover:bg-neutral-tertiary hover:text-fg-brand group">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>

            {{-- Menu: Sparepart --}}
            <li>
                <a href="{{ route('spareparts.index') }}" class="flex items-center px-2 py-1.5 text-body rounded-base
                          hover:bg-neutral-tertiary hover:text-fg-brand group">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sparepart</span>
                </a>
            </li>
        </ul>

        {{-- ---- Footer Sidebar: Tombol Keluar ---- --}}
        <div class="border-t border-default pt-3 mt-3">
            <a href="#" class="flex items-center px-2 py-1.5 text-body rounded-base
                      hover:bg-neutral-tertiary hover:text-fg-brand group">
                <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Keluar</span>
            </a>
        </div>
    </div>
</aside>