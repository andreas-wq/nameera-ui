@extends('nameera::layouts.app')

@section('title', 'Advanced Components - Nameera ui')

@section('content')
<div class="mb-8">
  <div
    class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
  >
    <span>Components</span
    ><span class="text-gray-300 dark:text-gray-600">/</span
    ><span
      class="text-primary-mid dark:text-primary-light normal-case font-semibold"
      >Advanced</span
    >
  </div>
  <h1
    class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
  >
    Advanced Widgets
  </h1>
  <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
    Koleksi kartu statistik dan tampilan layar kosong untuk memperkaya
    antarmuka dashboard.
  </p>
</div>

<!-- ===================== STATISTIC CARDS (WIDGETS) ===================== -->
<h3
  class="font-heading font-bold text-dark dark:text-white mb-4 mt-8"
>
  Dashboard Statistic Cards
</h3>
<div
  class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10"
>
  <!-- Widget 1: Total Data/Users (Primary) -->
  <div
    class="bg-white dark:bg-gray-800/80 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm relative overflow-hidden group"
  >
    <!-- Dekorasi Background -->
    <div
      class="absolute -right-6 -top-6 w-24 h-24 bg-primary/5 rounded-full group-hover:scale-150 transition-transform duration-500"
    ></div>

    <div class="flex items-start justify-between relative z-10">
      <div>
        <p
          class="text-sm font-bold text-gray-500 dark:text-gray-400 mb-1"
        >
          Total Pengguna Aktif
        </p>
        <h3
          class="text-3xl font-heading font-extrabold text-dark dark:text-white"
        >
          1,284
        </h3>
      </div>
      <div
        class="w-12 h-12 rounded-2xl bg-primary-bg dark:bg-primary/20 flex items-center justify-center text-primary-mid dark:text-primary-light shrink-0"
      >
        <svg
          class="w-6 h-6"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
          ></path>
        </svg>
      </div>
    </div>
    <div class="mt-4 flex items-center text-sm relative z-10">
      <span
        class="flex items-center text-green-500 font-bold bg-green-50 dark:bg-green-900/20 px-2 py-0.5 rounded-md"
      >
        <svg
          class="w-3 h-3 mr-1"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
          ></path>
        </svg>
        12.5%
      </span>
      <span class="text-gray-400 ml-2">dari bulan lalu</span>
    </div>
  </div>

  <!-- Widget 2: Pending Items (Warning) -->
  <div
    class="bg-white dark:bg-gray-800/80 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm relative overflow-hidden group"
  >
    <div
      class="absolute -right-6 -top-6 w-24 h-24 bg-accent/5 rounded-full group-hover:scale-150 transition-transform duration-500"
    ></div>

    <div class="flex items-start justify-between relative z-10">
      <div>
        <p
          class="text-sm font-bold text-gray-500 dark:text-gray-400 mb-1"
        >
          Tugas Tertunda
        </p>
        <h3
          class="text-3xl font-heading font-extrabold text-dark dark:text-white"
        >
          48
        </h3>
      </div>
      <div
        class="w-12 h-12 rounded-2xl bg-accent-bg dark:bg-accent/20 flex items-center justify-center text-accent shrink-0"
      >
        <svg
          class="w-6 h-6"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
          ></path>
        </svg>
      </div>
    </div>
    <div class="mt-4 flex items-center text-sm relative z-10">
      <span
        class="flex items-center text-red-500 font-bold bg-red-50 dark:bg-red-900/20 px-2 py-0.5 rounded-md"
      >
        <svg
          class="w-3 h-3 mr-1"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"
          ></path>
        </svg>
        +5
      </span>
      <span class="text-gray-400 ml-2">hari ini</span>
    </div>
  </div>

  <!-- Widget 3: Completed Items (Success) -->
  <div
    class="bg-white dark:bg-gray-800/80 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm relative overflow-hidden group"
  >
    <div
      class="absolute -right-6 -top-6 w-24 h-24 bg-green-500/5 rounded-full group-hover:scale-150 transition-transform duration-500"
    ></div>

    <div class="flex items-start justify-between relative z-10">
      <div>
        <p
          class="text-sm font-bold text-gray-500 dark:text-gray-400 mb-1"
        >
          Proyek Selesai
        </p>
        <h3
          class="text-3xl font-heading font-extrabold text-dark dark:text-white"
        >
          852
        </h3>
      </div>
      <div
        class="w-12 h-12 rounded-2xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center text-green-600 dark:text-green-400 shrink-0"
      >
        <svg
          class="w-6 h-6"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
          ></path>
        </svg>
      </div>
    </div>
    <!-- Progress Bar dalam Widget -->
    <div class="mt-5 relative z-10">
      <div class="flex justify-between mb-1">
        <span
          class="text-[10px] font-bold text-gray-400 uppercase tracking-wider"
          >Target Tahunan</span
        >
        <span
          class="text-[10px] font-bold text-green-600 dark:text-green-400"
          >85%</span
        >
      </div>
      <div
        class="w-full bg-gray-100 rounded-full h-1.5 dark:bg-gray-700"
      >
        <div
          class="bg-green-500 h-1.5 rounded-full"
          style="width: 85%"
        ></div>
      </div>
    </div>
  </div>
</div>

<!-- ===================== EMPTY STATES ===================== -->
<h3 class="font-heading font-bold text-dark dark:text-white mb-4">
  Empty States
</h3>
<p class="text-xs text-gray-400 mb-6">
  Digunakan ketika sebuah tabel kosong, belum ada pencarian, atau saat
  menambahkan data baru.
</p>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- Empty State 1: Basic Illustration -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-10 shadow-sm flex flex-col items-center justify-center text-center"
  >
    <div
      class="w-24 h-24 bg-gray-50 dark:bg-gray-900/50 rounded-full flex items-center justify-center mb-6"
    >
      <svg
        class="w-10 h-10 text-gray-400 dark:text-gray-500"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="1.5"
          d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
        ></path>
      </svg>
    </div>
    <h3
      class="font-heading font-bold text-lg text-dark dark:text-white mb-2"
    >
      Belum Ada Data
    </h3>
    <p
      class="text-sm text-gray-500 dark:text-gray-400 mb-6 max-w-sm mx-auto"
    >
      Anda belum menambahkan data apa pun ke dalam sistem. Silakan
      klik tombol di bawah untuk mulai membuat entri baru.
    </p>
    <button
      class="bg-primary hover:bg-primary-mid text-white px-6 py-2.5 rounded-xl text-sm font-bold transition-colors flex items-center gap-2"
    >
      <svg
        class="w-4 h-4"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M12 4v16m8-8H4"
        ></path>
      </svg>
      Tambah Data Baru
    </button>
  </div>

  <!-- Empty State 2: Dashed Area (Upload/Add) -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h4 class="font-bold text-sm text-dark dark:text-white mb-4">
      Lampiran Dokumen Tambahan
    </h4>

    <button
      class="w-full flex flex-col items-center justify-center p-8 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-2xl bg-gray-50/50 dark:bg-gray-900/30 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors group"
    >
      <div
        class="w-12 h-12 rounded-full bg-primary-bg dark:bg-primary/20 text-primary-mid dark:text-primary-light flex items-center justify-center mb-4 group-hover:scale-110 transition-transform"
      >
        <svg
          class="w-6 h-6"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"
          ></path>
        </svg>
      </div>
      <p class="text-sm font-bold text-dark dark:text-white mb-1">
        Klik untuk unggah atau seret file ke sini
      </p>
      <p class="text-xs text-gray-500 dark:text-gray-400">
        PDF, JPG, atau PNG (Maks. 5MB)
      </p>
    </button>
  </div>

  <!-- Empty State 3: Search Not Found -->
  <div
    class="lg:col-span-2 bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-10 shadow-sm flex flex-col items-center justify-center text-center"
  >
    <div class="w-20 h-20 mb-4 relative">
      <!-- Ikon Kaca Pembesar -->
      <svg
        class="w-full h-full text-gray-300 dark:text-gray-600"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="1.5"
          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
        ></path>
      </svg>
      <!-- Ikon Silang (Not Found) -->
      <div
        class="absolute bottom-0 right-0 bg-white dark:bg-gray-800 rounded-full p-1"
      >
        <div
          class="w-6 h-6 bg-red-100 dark:bg-red-900/30 text-red-500 rounded-full flex items-center justify-center"
        >
          <svg
            class="w-4 h-4"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            ></path>
          </svg>
        </div>
      </div>
    </div>
    <h3
      class="font-heading font-bold text-lg text-dark dark:text-white mb-2"
    >
      Pencarian Tidak Ditemukan
    </h3>
    <p
      class="text-sm text-gray-500 dark:text-gray-400 max-w-sm mx-auto"
    >
      Kami tidak dapat menemukan data untuk kata kunci
      "<b>Data002</b>". Coba gunakan kata kunci lain atau periksa
      ejaan Anda.
    </p>
  </div>
</div>
@endsection