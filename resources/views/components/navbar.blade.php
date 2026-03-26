{{-- ============================================================
     Komponen Navbar / Header (Admin)
     Digunakan di: layouts/app.blade.php via @include('components.navbar')
     Judul halaman diambil dari: @section('page-title', 'Nama Halaman')
     - Tinggi auto mengikuti konten (tidak fixed height)
     - Sticky agar tetap terlihat saat scroll
     - Spacing lega tapi proporsional
     ============================================================ --}}

{{-- Header sticky — tinggi auto, offset sidebar, border ikut style sidebar --}}
<header class="sticky top-0 z-30 sm:ml-64
               bg-neutral-primary-soft border-b border-default
               flex items-center justify-between
               px-6 py-3.5">

    {{-- ---- Kiri: Toggle mobile + Judul Halaman ---- --}}
    <div class="flex items-center gap-3">

        {{-- Tombol toggle sidebar (hanya muncul di layar kecil) --}}
        <button data-drawer-target="default-sidebar"
                data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar"
                type="button"
                class="sm:hidden p-1.5 rounded-base text-body
                       hover:bg-neutral-tertiary focus:outline-none">
            <span class="sr-only">Toggle sidebar</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke="currentColor" stroke-linecap="round"
                      stroke-width="2" d="M5 7h14M5 12h14M5 17h10"/>
            </svg>
        </button>

        {{-- Judul halaman — diisi lewat @section('page-title', '...') --}}
        <h1 class="text-2xl font-semibold text-heading leading-none">
            @yield('page-title', 'Dashboard')
        </h1>
    </div>

    {{-- ---- Kanan: Notifikasi + Avatar admin ---- --}}
    <div class="flex items-center gap-1.5">

        {{-- Tombol notifikasi --}}
        <button type="button"
                class="relative p-1.5 rounded-base text-body
                       hover:bg-neutral-tertiary focus:outline-none">
            <span class="sr-only">Notifikasi</span>
            <svg class="w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke="currentColor" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V5a2 2 0 1 0-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9"/>
            </svg>
            {{-- Badge notifikasi --}}
            <span class="absolute top-1 right-1 w-1.5 h-1.5 rounded-full
                         bg-red-500 border border-neutral-primary-soft"></span>
        </button>

        {{-- Divider vertikal --}}
        <div class="w-px h-4 bg-default mx-1"></div>

        {{-- Avatar & nama admin --}}
        <button type="button"
                class="flex items-center gap-2 pl-1 pr-2 py-1 rounded-base text-body
                       hover:bg-neutral-tertiary focus:outline-none">
            {{-- Avatar inisial --}}
            <span class="w-6 h-6 rounded-full bg-blue-600 text-white
                         flex items-center justify-center text-[11px] font-semibold shrink-0">
                A
            </span>
            {{-- Nama admin (sembunyikan di layar kecil) --}}
            <span class="hidden sm:block text-xs font-medium text-heading">Admin</span>
            {{-- Chevron --}}
            <svg class="hidden sm:block w-3 h-3 text-fg-muted"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
            </svg>
        </button>
    </div>

</header>
