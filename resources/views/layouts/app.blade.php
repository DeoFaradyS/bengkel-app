<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-primary-soft dark:bg-neutral-primary-soft flex flex-row h-screen">
    @include('components.sidebar')
    <div class="w-full flex flex-col">
        @include('components.navbar', ['title' => $title ?? 'My App'])
        <div class="p-4 h-screen">
            @include('components.header')
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>