@extends('nameera::layouts.app')

@section('title', 'Login - Nameera ui')

@section('sidebar')
<!-- Override sidebar with empty -->
@endsection

@section('header')
<!-- Override header with empty -->
@endsection

@section('content')
<!-- Floating Dark Mode Toggle -->
<div class="fixed top-6 right-6 z-50">
  <button
    @click="isDarkMode = !isDarkMode"
    class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors shadow-sm"
  >
    <svg
      x-show="!isDarkMode"
      class="w-5 h-5"
      xmlns="http://www.w3.org/2000/svg"
      fill="currentColor"
      viewBox="0 0 24 24"
    >
      <path
        d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"
      />
    </svg>
    <svg
      x-show="isDarkMode"
      x-cloak
      class="w-5 h-5"
      xmlns="http://www.w3.org/2000/svg"
      fill="currentColor"
      viewBox="0 0 24 24"
    >
      <path
        d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"
      />
    </svg>
  </button>
</div>

<div class="flex min-h-screen w-full">
  <!-- LFT SIDE: Branding / Illustration (Hidden on Mobile) -->
  <div
    class="hidden lg:flex w-1/2 bg-gradient-to-br from-[#142414] to-[#0a120a] p-12 relative overflow-hidden flex-col justify-between"
  >
    <!-- Abstract Decorations -->
    <div
      class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-primary/20 rounded-full blur-3xl"
    ></div>
    <div
      class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-primary-light/10 rounded-full blur-3xl"
    ></div>

    <!-- Logo -->
    <div class="relative z-10 flex items-center gap-3">
      <div
        class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-light to-primary flex items-center justify-center shadow-lg shadow-primary/30"
      >
        <svg
          class="w-7 h-7 text-white"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"
          ></path>
        </svg>
      </div>
      <span
        class="font-heading font-extrabold text-2xl text-white tracking-wide"
        >Nameera <span class="text-primary-light">ui</span></span
      >
    </div>

    <!-- Hero Text -->
    <div class="relative z-10 max-w-lg">
      <h1
        class="font-heading font-extrabold text-4xl text-white leading-tight mb-4"
      >
        Membangun Sistem Lebih Cepat & Elegan.
      </h1>
      <p class="text-gray-400 text-lg leading-relaxed mb-8">
        Solusi antarmuka admin terlengkap untuk mengakselerasi pengembangan
        aplikasi web Anda ke level profesional.
      </p>

      <!-- Mockup Element -->
      <div
        class="w-full h-48 bg-white/5 border border-white/10 rounded-2xl backdrop-blur-sm p-6 shadow-2xl flex flex-col gap-4"
      >
        <div class="w-1/3 h-4 bg-white/20 rounded-full"></div>
        <div class="w-full h-2 bg-white/10 rounded-full"></div>
        <div class="w-5/6 h-2 bg-white/10 rounded-full"></div>
        <div class="flex gap-2 mt-auto">
          <div class="w-8 h-8 rounded-lg bg-primary"></div>
          <div class="w-8 h-8 rounded-lg bg-white/10"></div>
        </div>
      </div>
    </div>

    <!-- Footer Text -->
    <div class="relative z-10 text-sm text-gray-500 font-medium">
      &copy; 2026 Nameera UI. Hak Cipta Dilindungi.
    </div>
  </div>

  <!-- RIGHT SIDE: Form Login -->
  <div
    class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 relative z-10"
  >
    <div class="w-full max-w-md">
      <!-- Mobile Logo (Visible only on mobile) -->
      <div class="flex lg:hidden items-center justify-center gap-2 mb-10">
        <div
          class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center shadow-lg"
        >
          <svg
            class="w-6 h-6 text-white"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"
            ></path>
          </svg>
        </div>
        <span
          class="font-heading font-extrabold text-2xl text-dark dark:text-white tracking-wide"
          >Nameera
          <span class="text-primary-mid dark:text-primary-light"
            >ui</span
          ></span
        >
      </div>

      <div class="mb-10 text-center lg:text-left">
        <h2
          class="font-heading font-extrabold text-3xl text-dark dark:text-white mb-2"
        >
          Selamat Datang 👋
        </h2>
        <p class="text-gray-500 dark:text-gray-400">
          Silakan masukkan kredensial Anda untuk masuk ke sistem.
        </p>
      </div>

      <form action="#" method="POST" class="space-y-5">
        @csrf
        <div>
          <label
            class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
            >Email Address</label
          >
          <input
            type="email"
            name="email"
            placeholder="nama@email.com"
            class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-4 py-3 text-sm font-medium text-dark dark:text-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all placeholder:text-gray-400"
            required
          />
        </div>

        <div x-data="{ show: false }">
          <label
            class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
            >Password</label
          >
          <div class="relative">
            <input
              :type="show ? 'text' : 'password'"
              name="password"
              placeholder="••••••••"
              class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-4 py-3 pr-12 text-sm font-medium text-dark dark:text-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all placeholder:text-gray-400"
              required
            />
            <button
              type="button"
              @click="show = !show"
              class="absolute inset-y-0 right-0 px-4 text-gray-400 hover:text-primary transition-colors focus:outline-none"
            >
              <svg
                x-show="!show"
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                ></path>
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                ></path>
              </svg>
              <svg
                x-show="show"
                x-cloak
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.025 10.025 0 012.132-3.542m3.44-2.264A9.959 9.959 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.977 9.977 0 01-4.132 5.411M3 3l18 18"
                ></path>
              </svg>
            </button>
          </div>
        </div>

        <div class="flex items-center justify-between py-2">
          <label class="flex items-center gap-2 cursor-pointer group">
            <input
              type="checkbox"
              name="remember"
              class="w-4 h-4 rounded accent-primary border-gray-300 dark:border-gray-600 focus:ring-primary/20 dark:bg-gray-800 cursor-pointer"
            />
            <span
              class="text-sm font-medium text-gray-600 dark:text-gray-400 group-hover:text-dark dark:group-hover:text-gray-200 transition-colors"
              >Ingat Saya</span
            >
          </label>
          <a
            href="#"
            class="text-sm font-bold text-primary hover:text-primary-mid transition-colors"
            >Lupa Password?</a
          >
        </div>

        <button
          type="submit"
          class="w-full bg-primary hover:bg-primary-mid text-white font-bold py-3.5 rounded-xl shadow-lg shadow-primary/30 transition-all active:scale-[0.98]"
        >
          Sign In ke Dashboard
        </button>
      </form>

      <!-- Divider -->
      <div
        class="my-8 flex items-center gap-4 before:h-px before:flex-1 before:bg-gray-200 dark:before:bg-gray-700 after:h-px after:flex-1 after:bg-gray-200 dark:after:bg-gray-700"
      >
        <span
          class="text-xs font-bold text-gray-400 uppercase tracking-wider"
          >Atau masuk dengan</span
        >
      </div>

      <!-- Social Login -->
      <div class="grid grid-cols-2 gap-4 mb-8">
        <button
          type="button"
          class="flex items-center justify-center gap-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 font-bold py-2.5 rounded-xl transition-colors"
        >
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
              fill="#4285F4"
            />
            <path
              d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
              fill="#34A853"
            />
            <path
              d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
              fill="#FBBC05"
            />
            <path
              d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
              fill="#EA4335"
            />
          </svg>
          Google
        </button>
        <button
          type="button"
          class="flex items-center justify-center gap-2 bg-[#181717] dark:bg-white text-white dark:text-gray-900 hover:opacity-90 font-bold py-2.5 rounded-xl transition-colors"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.379.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.418 22 12c0-5.523-4.477-10-10-10z"
            ></path>
          </svg>
          GitHub
        </button>
      </div>

      <p
        class="text-center text-sm font-medium text-gray-500 dark:text-gray-400"
      >
        Belum punya akun?
        <a
          href="#"
          class="font-bold text-primary hover:text-primary-mid transition-colors"
          >Sign Up di sini</a
        >
      </p>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  /* Override body background for login page */
  body {
    background-color: white;
  }
  .dark body {
    background-color: #111827;
  }
</style>
@endpush