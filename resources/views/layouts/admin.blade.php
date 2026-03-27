<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-primary-soft flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <x-sidebar />

    {{-- Main Content Area --}}
    <main class="flex flex-col flex-1 overflow-hidden">

        {{-- Navbar --}}
        <x-navbar />

        {{-- Page Wrapper --}}
        <div class="p-6 flex flex-col gap-4 h-full overflow-y-auto">

            {{-- Header --}}
            <x-header />

            {{-- Page Content --}}
            @yield('content')

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

</body>
</html>