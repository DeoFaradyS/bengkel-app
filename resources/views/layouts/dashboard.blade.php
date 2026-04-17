<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-primary-soft flex h-screen overflow-hidden font-sans">

    {{-- Sidebar --}}
    <x-sidebar.index />

    {{-- Main Layout Area --}}
    <main class="flex flex-col flex-1 overflow-hidden">

        {{-- Top Navigation --}}
        <x-navbar.dashboard />

        {{-- Page Content --}}
        <section class="p-6 flex flex-col gap-4 h-full overflow-y-auto">

            @yield('content')

        </section>

    </main>

    <!-- ApexCharts (WAJIB buat Flowbite chart) -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

</body>

</html>