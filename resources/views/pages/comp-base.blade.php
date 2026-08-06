@extends('nameera::layouts.app')

@section('title', 'Base UI Components - Nameera ui')

@section('content')
<div class="mb-8">
  <div
    class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
  >
    <span>Components</span
    ><span class="text-gray-300 dark:text-gray-600">/</span
    ><span
      class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
      >Base UI</span
    >
  </div>
  <h1
    class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
  >
    Base UI Elements
  </h1>
  <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
    Koleksi elemen dasar untuk membangun antarmuka administrasi.
  </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
  <!-- BUTTONS -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-4">
      Buttons
    </h3>
    <div class="flex flex-wrap gap-3 mb-6">
      <button
        class="bg-primary hover:bg-primary-mid text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
      >
        Primary
      </button>
      <button
        class="bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
      >
        Secondary
      </button>
      <button
        class="border-2 border-primary text-primary hover:bg-primary-bg dark:hover:bg-primary/10 px-5 py-2 rounded-xl text-sm font-bold transition-colors"
      >
        Outline
      </button>
      <button
        class="bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
      >
        Danger
      </button>
    </div>

    <h4
      class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3"
    >
      Button States & Icons
    </h4>
    <div class="flex flex-wrap gap-3">
      <button
        class="flex items-center gap-2 bg-primary hover:bg-primary-mid text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
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
        Tambah Data
      </button>
      <!-- Loading State -->
      <button
        disabled
        class="flex items-center gap-2 bg-primary/70 text-white px-5 py-2.5 rounded-xl text-sm font-bold cursor-not-allowed"
      >
        <svg
          class="animate-spin w-4 h-4 text-white"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
        >
          <circle
            class="opacity-25"
            cx="12"
            cy="12"
            r="10"
            stroke="currentColor"
            stroke-width="4"
          ></circle>
          <path
            class="opacity-75"
            fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
          ></path>
        </svg>
        Menyimpan...
      </button>
    </div>
  </div>

  <!-- BADGES -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-4">
      Badges & Pills
    </h3>
    <div class="flex flex-wrap gap-3 mb-6">
      <span
        class="bg-primary-bg text-primary-mid dark:bg-primary/20 dark:text-primary-light px-3 py-1 rounded-lg text-xs font-bold"
        >Primary</span
      >
      <span
        class="bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 px-3 py-1 rounded-lg text-xs font-bold"
        >Success</span
      >
      <span
        class="bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400 px-3 py-1 rounded-lg text-xs font-bold"
        >Warning</span
      >
      <span
        class="bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 px-3 py-1 rounded-lg text-xs font-bold"
        >Danger</span
      >
      <span
        class="bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300 px-3 py-1 rounded-lg text-xs font-bold"
        >Draft</span
      >
    </div>

    <h4
      class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3"
    >
      Rounded Pills
    </h4>
    <div class="flex flex-wrap gap-3">
      <span
        class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 px-3 py-1 rounded-full text-xs font-bold"
      >
        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
        Disetujui
      </span>
      <span
        class="inline-flex items-center gap-1.5 bg-accent-bg text-accent dark:bg-accent/20 dark:text-yellow-500 px-3 py-1 rounded-full text-xs font-bold"
      >
        <span class="w-1.5 h-1.5 rounded-full bg-accent"></span>
        Proses
      </span>
    </div>
  </div>

  <!-- AVATARS -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-4">
      Avatars
    </h3>
    <div class="flex items-end gap-4 mb-6">
      <!-- Sizes -->
      <div
        class="w-16 h-16 rounded-2xl bg-gray-200 overflow-hidden shadow-sm"
      >
        <img
          src="https://ui-avatars.com/api/?name=Admin+Diskominfo&background=639922&color=fff"
          class="w-full h-full object-cover"
        />
      </div>
      <div
        class="w-12 h-12 rounded-xl bg-gray-200 overflow-hidden shadow-sm"
      >
        <img
          src="https://ui-avatars.com/api/?name=John+Doe&background=ba7517&color=fff"
          class="w-full h-full object-cover"
        />
      </div>
      <div
        class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden shadow-sm"
      >
        <img
          src="https://ui-avatars.com/api/?name=Jane+Smith&background=1a2e1a&color=fff"
          class="w-full h-full object-cover"
        />
      </div>
    </div>

    <h4
      class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3"
    >
      Avatar Group
    </h4>
    <div class="flex -space-x-3">
      <img
        class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-800 z-30"
        src="https://ui-avatars.com/api/?name=A&background=random"
        alt=""
      />
      <img
        class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-800 z-20"
        src="https://ui-avatars.com/api/?name=B&background=random"
        alt=""
      />
      <img
        class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-800 z-10"
        src="https://ui-avatars.com/api/?name=C&background=random"
        alt=""
      />
      <a
        class="flex items-center justify-center w-10 h-10 rounded-full border-2 border-white dark:border-gray-800 bg-gray-100 dark:bg-gray-700 text-xs font-bold text-gray-600 dark:text-gray-300 z-0 hover:bg-gray-200 transition-colors"
        href="#"
        >+5</a
      >
    </div>
  </div>

  <!-- TYPOGRAPHY -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-4">
      Typography
    </h3>
    <div class="space-y-4">
      <h1
        class="font-heading font-extrabold text-4xl text-dark dark:text-white"
      >
        Heading 1
      </h1>
      <h2
        class="font-heading font-bold text-2xl text-dark dark:text-white"
      >
        Heading 2
      </h2>
      <h3
        class="font-heading font-semibold text-lg text-dark dark:text-white"
      >
        Heading 3
      </h3>
      <p
        class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed"
      >
        Ini adalah contoh paragraf standar menggunakan font
        <b>Nunito</b>. Tipografi memegang peran penting dalam
        menyajikan data arsip dan instruksi surat agar mudah dibaca
        oleh pegawai Diskominfo Subang.
      </p>
      <blockquote
        class="border-l-4 border-primary pl-4 py-1 text-gray-600 dark:text-gray-400 italic text-sm bg-gray-50/50 dark:bg-gray-900/30 rounded-r-lg"
      >
        "Sistem informasi yang baik berawal dari struktur antarmuka
        yang jelas dan konsisten."
      </blockquote>
    </div>
  </div>
</div>
@endsection