@extends('nameera::layouts.app')

@section('title', 'Register - Nameera ui')

@section('sidebar')
<!-- Override sidebar with empty -->
@endsection

@section('header')
<!-- Override header with empty -->
@endsection

@section('content')
<!-- Floating Dark Mode Toggle -->
<div class="fixed top-6 left-6 lg:left-[calc(50%+1.5rem)] z-50">
  <button
    @click="isDarkMode = !isDarkMode"
    class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors shadow-sm border border-gray-200 dark:border-gray-700"
  >
    <svg
      x-show="!isDarkMode"
      class="w-5 h-5"
      xmlns="http://www.w3.org/2000/svg"
      fill="currentColor"
      viewBox="0 0 24 24"
    >
      <path
        d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1 1v1a1 1,0,0,0 2 0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0 1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"
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

<div class="flex min-h-screen w-full flex-row-reverse">
  <!-- RIGHT SIDE (Visual/Branding) -->
  <div
    class="hidden lg:flex w-1/2 bg-gradient-to-tl from-[#142414] to-[#0a120a] p-12 relative overflow-hidden flex-col justify-between"
  >
    <div
      class="absolute bottom-[20%] left-[-10%] w-[30rem] h-[30rem] bg-primary-mid/10 rounded-full blur-3xl"
    ></div>
    <div
      class="absolute top-[-5%] right-[-5%] w-72 h-72 bg-primary/20 rounded-full blur-3xl"
    ></div>

    <div class="relative z-10 flex items-center justify-end gap-3">
      <span
        class="font-heading font-extrabold text-2xl text-white tracking-wide"
        >Nameera <span class="text-primary-light">ui</span></span
      >
      <div
        class="w-12 h-12 rounded-xl bg-gradient-to-tl from-primary to-primary-light flex items-center justify-center shadow-lg shadow-primary/30"
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
    </div>

    <div class="relative z-10 ml-auto max-w-lg text-right">
      <h1
        class="font-heading font-extrabold text-4xl text-white leading-tight mb-4"
      >
        Mulai Perjalanan Anda Bersama Kami.
      </h1>
      <p class="text-gray-400 text-lg leading-relaxed mb-8">
        Bergabunglah dan nikmati pengalaman mengelola data serta antarmuka
        yang sangat responsif, intuitif, dan *developer-friendly*.
      </p>

      <div
        class="flex items-center justify-end gap-[-10px] -space-x-4 mb-4"
      >
        <img
          class="w-12 h-12 rounded-full border-2 border-[#142414] z-30"
          src="https://ui-avatars.com/api/?name=A&background=random"
          alt=""
        />
        <img
          class="w-12 h-12 rounded-full border-2 border-[#142414] z-20"
          src="https://ui-avatars.com/api/?name=B&background=random"
          alt=""
        />
        <img
          class="w-12 h-12 rounded-full border-2 border-[#142414] z-10"
          src="https://ui-avatars.com/api/?name=C&background=random"
          alt=""
        />
        <div
          class="w-12 h-12 rounded-full border-2 border-[#142414] bg-white/10 flex items-center justify-center text-xs font-bold text-white z-0 backdrop-blur-md"
        >
          +2k
        </div>
      </div>
      <p class="text-gray-400 text-sm">
        Dipercaya oleh ribuan pengembang web.
      </p>
    </div>

    <div class="relative z-10 text-sm text-gray-500 font-medium text-right">
      &copy; 2026 Nameera UI. Hak Cipta Dilindungi.
    </div>
  </div>

  <!-- LEFT SIDE (Form Register) -->
  <div
    class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 relative z-10"
  >
    <div class="w-full max-w-md">
      <!-- Mobile Logo -->
      <div class="flex lg:hidden items-center justify-center gap-2 mb-8">
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

      <div class="mb-8 text-center lg:text-left">
        <h2
          class="font-heading font-extrabold text-3xl text-dark dark:text-white mb-2"
        >
          Buat Akun Baru 🚀
        </h2>
        <p class="text-gray-500 dark:text-gray-400">
          Daftarkan diri Anda untuk mengakses seluruh fitur dashboard.
        </p>
      </div>

      <form action="{{ route('nameera.dashboard') }}" class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
          <div class="col-span-2 sm:col-span-1">
            <label
              class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
              >Nama Depan</label
            >
            <input
              type="text"
              placeholder="John"
              class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-4 py-3 text-sm font-medium text-dark dark:text-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all placeholder:text-gray-400"
              required
            />
          </div>
          <div class="col-span-2 sm:col-span-1">
            <label
              class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
              >Nama Belakang</label
            >
            <input
              type="text"
              placeholder="Doe"
              class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-4 py-3 text-sm font-medium text-dark dark:text-white focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all placeholder:text-gray-400"
            />
          </div>
        </div>

        <div>
          <label
            class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
            >Email Address</label
          >
          <input
            type="email"
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
              placeholder="Minimal 8 karakter"
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

        <div class="py-2">
          <label class="flex items-start gap-3 cursor-pointer group">
            <input
              type="checkbox"
              required
              class="w-4 h-4 mt-0.5 rounded accent-primary border-gray-300 dark:border-gray-600 focus:ring-primary/20 dark:bg-gray-800 cursor-pointer"
            />
            <span
              class="text-sm font-medium text-gray-600 dark:text-gray-400 group-hover:text-dark dark:group-hover:text-gray-200 transition-colors leading-snug"
            >
              Saya menyetujui
              <a
                href="#"
                class="text-primary hover:text-primary-mid font-bold underline decoration-primary/30"
                >Syarat & Ketentuan</a
              >
              serta Kebijakan Privasi platform ini.
            </span>
          </label>
        </div>

        <button
          type="submit"
          class="w-full bg-primary hover:bg-primary-mid text-white font-bold py-3.5 rounded-xl shadow-lg shadow-primary/30 transition-all active:scale-[0.98]"
        >
          Sign Up Sekarang
        </button>
      </form>

      <p
        class="mt-8 text-center text-sm font-medium text-gray-500 dark:text-gray-400"
      >
        Sudah punya akun?
        <a
          href="{{ route('nameera.login') }}"
          class="font-bold text-primary hover:text-primary-mid transition-colors"
          >Sign In di sini</a
        >
      </p>
    </div>
  </div>
</div>
@endsection