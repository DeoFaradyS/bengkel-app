<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <title>{{ $title ?? 'Motorium' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="{{ $bodyClass ?? 'bg-white' }}">

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

</body>

</html>