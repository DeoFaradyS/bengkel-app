<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <title>{{ $title ?? 'Dashboard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-secondary flex h-screen overflow-hidden font-sans">

    <x-sidebar.index />

    <main class="flex flex-col flex-1 overflow-hidden">

        <x-navbar.dashboard :title="$title ?? 'Dashboard'" />

        <section class="p-5 flex flex-col gap-5 h-full overflow-y-auto">
            {{ $slot }}
        </section>

    </main>

    <x-toast />

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

</body>

</html>