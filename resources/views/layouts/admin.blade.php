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
    <x-sidebar />

    <main class="flex flex-col flex-1 overflow-hidden">

        {{-- Navbar --}}
        <x-navbar />

        {{-- Page Content Wrapper --}}
        <div class="p-6 flex flex-col gap-4 h-full overflow-y-auto">

            @yield('content')

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

</body>
</html>