<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    {{-- Tailwind / Flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-white font-[Inter]">

    {{-- NAVBAR --}}
    <nav class="flex justify-between items-center px-8 py-4 text-black">
        <h1 class="text-xl font-bold">Bengkel App</h1>

        <div class="flex items-center space-x-4">

            @guest
                <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">
                    Login
                </a>
            @endguest

            @auth
                <span>👋 {{ auth()->user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section class="text-center px-4 py-16">

        <h1 class="mb-4 text-4xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl">
            Bengkel Management System
        </h1>

        <p class="mb-8 text-lg text-gray-500 lg:text-xl">
            Kelola sparepart, transaksi, dan data bengkel dengan lebih mudah dan efisien.
        </p>

        {{-- BUTTON AREA --}}
        <div class="flex flex-col items-center space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 justify-center">

            @guest
                <a href="{{ route('login') }}" class="px-6 py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Login Sekarang
                </a>
            @endguest

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="/dashboard" class="px-6 py-3 text-white bg-green-600 rounded-lg hover:bg-green-700">
                        Masuk Dashboard Admin
                    </a>
                @else
                    <a href="/home" class="px-6 py-3 text-white bg-green-600 rounded-lg hover:bg-green-700">
                        Masuk Dashboard User
                    </a>
                @endif
            @endauth

        </div>

    </section>

    {{-- FOOTER --}}
    <footer class="text-center text-gray-500 py-6">
        © {{ date('Y') }} Bengkel App. All rights reserved.
    </footer>

</body>

</html>