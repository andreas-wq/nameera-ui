@extends('nameera::layouts.app')

@section('title', '404 Not Found - Nameera ui')

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

<!-- Center Content -->
<div
  class="min-h-screen flex flex-col items-center justify-center p-6 text-center relative overflow-hidden"
>
  <!-- Background Abstract Decor -->
  <div
    class="absolute w-[40rem] h-[40rem] bg-primary/5 dark:bg-primary/10 rounded-full blur-3xl -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
  ></div>

  <!-- 404 Visual -->
  <div class="relative w-full max-w-md mx-auto mb-8">
    <h1
      class="font-heading font-extrabold text-[8rem] md:text-[12rem] leading-none text-transparent bg-clip-text bg-gradient-to-br from-primary to-primary-light opacity-90 drop-shadow-sm select-none"
    >
      404
    </h1>
    <div class="absolute inset-0 flex items-center justify-center">
      <div
        class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md px-6 py-2 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 mt-16 md:mt-24 rotate-[-5deg]"
      >
        <span
          class="font-bold text-gray-800 dark:text-white uppercase tracking-wider text-sm"
          >Page Not Found</span
        >
      </div>
    </div>
  </div>

  <!-- Text Content -->
  <div class="max-w-lg mx-auto z-10">
    <h2
      class="font-heading font-bold text-2xl md:text-3xl text-dark dark:text-white mb-4"
    >
      Ups! Kehilangan Arah?
    </h2>
    <p class="text-gray-500 dark:text-gray-400 mb-8 leading-relaxed">
      Halaman yang Anda tuju mungkin telah dihapus, diubah namanya, atau
      memang tidak pernah ada sejak awal.
    </p>

    <div
      class="flex flex-col sm:flex-row items-center justify-center gap-4"
    >
      <a
        href="{{ route('nameera.dashboard') }}"
        class="w-full sm:w-auto bg-primary hover:bg-primary-mid text-white px-8 py-3 rounded-xl text-sm font-bold transition-all shadow-lg shadow-primary/30 flex items-center justify-center gap-2"
      >
        <svg
          class="w-5 h-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M10 19l-7-7m0 0l7-7m-7 7h18"
          ></path>
        </svg>
        Kembali ke Beranda
      </a>
      <a
        href="mailto:support@domain.com"
        class="w-full sm:w-auto bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 px-8 py-3 rounded-xl text-sm font-bold transition-colors"
      >
        Hubungi Bantuan
      </a>
    </div>
  </div>
</div>
@endsection