@extends('layouts.app')
@section('title', 'Login — MyApp')

@section('content')
<section class="min-h-screen bg-gray-50 dark:bg-gray-900 flex items-center justify-center px-4 py-12">
  <div class="w-full max-w-md">

    {{-- ===== LOGO / BRAND ===== --}}
    <a href="{{ url('/') }}" class="flex items-center justify-center gap-2 mb-8">
      <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-md">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
      </div>
      <span class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">MyApp</span>
    </a>

    {{-- ===== CARD UTAMA ===== --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-8">

      {{-- Heading --}}
      <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Selamat datang! 👋</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Masuk ke akun kamu untuk melanjutkan.</p>
      </div>

      {{-- ===== ALERT ERROR (Session) ===== --}}
      @if (session('error'))
        <div id="alert-error"
          class="flex items-start gap-3 p-4 mb-5 text-sm text-red-800 bg-red-50 border border-red-200 rounded-lg dark:bg-red-900/20 dark:text-red-400 dark:border-red-800"
          role="alert">
          <svg class="w-4 h-4 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
              clip-rule="evenodd" />
          </svg>
          <span>{{ session('error') }}</span>
          <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 text-red-500 hover:text-red-700 rounded-lg p-1.5 inline-flex h-8 w-8 items-center justify-center"
            data-dismiss-target="#alert-error" aria-label="Close">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
          </button>
        </div>
      @endif

      {{-- ===== FORM LOGIN ===== --}}
      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
          <label for="email"
            class="block mb-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
            Alamat Email
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <input
              type="email"
              name="email"
              id="email"
              value="{{ old('email') }}"
              placeholder="nama@email.com"
              required
              autofocus
              class="bg-gray-50 border pl-10 text-gray-900 text-sm rounded-lg block w-full p-2.5
                     dark:bg-gray-700 dark:text-white dark:placeholder-gray-400
                     @error('email')
                       border-red-500 focus:ring-red-500 focus:border-red-500
                     @else
                       border-gray-300 focus:ring-blue-500 focus:border-blue-500
                       dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500
                     @enderror" />
          </div>
          @error('email')
            <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
              <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                  clip-rule="evenodd" />
              </svg>
              {{ $message }}
            </p>
          @enderror
        </div>

        {{-- Password --}}
        <div>
          <label for="password"
            class="block mb-1.5 text-sm font-medium text-gray-700 dark:text-gray-300">
            Password
          </label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <input
              type="password"
              name="password"
              id="password"
              placeholder="••••••••"
              required
              class="bg-gray-50 border pl-10 pr-10 text-gray-900 text-sm rounded-lg block w-full p-2.5
                     dark:bg-gray-700 dark:text-white dark:placeholder-gray-400
                     @error('password')
                       border-red-500 focus:ring-red-500 focus:border-red-500
                     @else
                       border-gray-300 focus:ring-blue-500 focus:border-blue-500
                       dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500
                     @enderror" />
            {{-- Toggle show/hide password --}}
            <button type="button" onclick="togglePassword()"
              class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
              <svg id="eye-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
          </div>
          @error('password')
            <p class="mt-1.5 text-xs text-red-600 dark:text-red-400 flex items-center gap-1">
              <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                  clip-rule="evenodd" />
              </svg>
              {{ $message }}
            </p>
          @enderror
        </div>

        {{-- Remember me + Lupa password --}}
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-2">
            <input
              id="remember"
              name="remember"
              type="checkbox"
              {{ old('remember') ? 'checked' : '' }}
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded
                     focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 cursor-pointer" />
            <label for="remember" class="text-sm text-gray-600 dark:text-gray-300 cursor-pointer select-none">
              Ingat aku
            </label>
          </div>
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}"
              class="text-sm text-blue-600 hover:text-blue-800 hover:underline dark:text-blue-400 font-medium">
              Lupa password?
            </a>
          @endif
        </div>

        {{-- ===== TOMBOL SUBMIT ===== --}}
        <button type="submit"
          class="w-full flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700
                 active:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                 font-semibold rounded-lg text-sm px-5 py-3 text-center transition-all duration-150
                 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-sm
                 hover:shadow-md">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
          </svg>
          Masuk Sekarang
        </button>

      </form>
    </div>

    {{-- ===== LINK DAFTAR ===== --}}
    @if (Route::has('register'))
      <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
        Belum punya akun?
        <a href="{{ route('register') }}"
          class="font-semibold text-blue-600 hover:text-blue-800 hover:underline dark:text-blue-400">
          Daftar gratis sekarang
        </a>
      </p>
    @endif

    {{-- Copyright --}}
    <p class="mt-4 text-center text-xs text-gray-400 dark:text-gray-600">
      © {{ date('Y') }} MyApp. All rights reserved.
    </p>

  </div>
</section>

{{-- ===== SCRIPT: Toggle Password ===== --}}
<script>
  function togglePassword() {
    const input = document.getElementById('password');
    const icon  = document.getElementById('eye-icon');
    const isHidden = input.type === 'password';

    input.type = isHidden ? 'text' : 'password';

    icon.innerHTML = isHidden
      ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
           d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7
              a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243
              M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29
              M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7
              a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`
      : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
           d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
           d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
              -1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
  }
</script>
@endsection