@extends('nameera::layouts.app')

@section('title', 'Feedback Components - Nameera ui')

@section('content')
<div class="mb-8">
  <div
    class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
  >
    <span>Components</span
    ><span class="text-gray-300 dark:text-gray-600">/</span
    ><span
      class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
      >Feedback</span
    >
  </div>
  <h1
    class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
  >
    Feedback UIs
  </h1>
  <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
    Komponen untuk memberikan umpan balik kepada pengguna dalam sistem
    administrasi persuratan.
  </p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- MODALS & ALERTS -->
  <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Modal -->
    <div
      class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
    >
      <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
        Modal Dialogs
      </h3>

      <!-- Setup Alpine State untuk Modal -->
      <div x-data="{ modalOpen: false }">
        <button
          @click="modalOpen = true"
          class="bg-primary hover:bg-primary-mid text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
        >
          Tampilkan Modal
        </button>

        <!-- Modal overlay & content -->
        <div
          x-show="modalOpen"
          x-transition.opacity.duration.200ms
          class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4"
          @click="modalOpen = false"
          style="display: none"
        >
          <div
            @click.stop
            class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-3xl shadow-2xl p-8 max-w-md w-full"
          >
            <div class="flex justify-between items-center mb-6">
              <h4
                class="font-heading font-bold text-dark dark:text-white text-xl"
              >
                Konfirmasi Penghapusan
              </h4>
              <button
                @click="modalOpen = false"
                class="text-gray-400 hover:text-dark dark:hover:text-white transition-colors"
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
                    d="M6 18L18 6M6 6l12 12"
                  ></path>
                </svg>
              </button>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-8">
              Anda akan menghapus surat dengan nomor 001/SK/2024 secara permanen.
              Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex gap-3 justify-end">
              <button
                @click="modalOpen = false"
                class="bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
              >
                Batalkan
              </button>
              <button
                @click="modalOpen = false"
                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
              >
                Hapus Sekarang
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Alerts -->
    <div
      class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
    >
      <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
        Alert Messages
      </h3>
      <div class="space-y-4">
        <div
          class="flex items-center px-4 py-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 rounded-2xl"
        >
          <svg
            class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-3 shrink-0"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            ></path>
          </svg>
          <p class="text-sm font-medium text-blue-700 dark:text-blue-300">
            Info: Surat baru telah diterima dari Dinas Pendidikan.
          </p>
        </div>
        <div
          class="flex items-center px-4 py-3 bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 rounded-2xl"
        >
          <svg
            class="w-5 h-5 text-green-600 dark:text-green-400 mr-3 shrink-0"
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
          <p class="text-sm font-medium text-green-700 dark:text-green-300">
            Berhasil: Disposisi telah dikirim ke Bidang IKP.
          </p>
        </div>
        <div
          class="flex items-center px-4 py-3 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-100 dark:border-yellow-800 rounded-2xl"
        >
          <svg
            class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-3 shrink-0"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.07 16.5c-.77.833.192 2.5 1.732 2.5z"
            ></path>
          </svg>
          <p class="text-sm font-medium text-yellow-700 dark:text-yellow-300">
            Peringatan: Anda belum mengunggah lampiran wajib.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- TOAST NOTIFICATIONS -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
      Toast Notifications
    </h3>

    <!-- Setup Alpine State untuk Toast -->
    <div x-data="{ toastOpen: false }" class="space-y-4">
      <button
        @click="toastOpen = true"
        class="bg-primary hover:bg-primary-mid text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
      >
        Tampilkan Toast
      </button>

      <!-- Toast Example -->
      <div
        x-show="toastOpen"
        x-transition.opacity.duration.200ms
        class="fixed bottom-6 right-6 z-50 flex items-center px-5 py-4 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-xl max-w-sm"
        style="display: none"
      >
        <svg
          class="w-5 h-5 text-green-500 dark:text-green-400 mr-3 shrink-0"
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
        <div class="flex-1">
          <h4 class="text-sm font-bold text-dark dark:text-white">
            Tersimpan Otomatis
          </h4>
          <p class="text-xs text-gray-500 dark:text-gray-400">
            Perubahan terakhir berhasil disimpan ke server.
          </p>
        </div>
        <button
          @click="toastOpen = false"
          class="text-gray-400 hover:text-dark dark:hover:text-white ml-4"
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
        </button>
      </div>
    </div>
  </div>

  <!-- SKELETON LOADERS -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
      Skeleton Loaders
    </h3>

    <div class="md:flex gap-4">
      <!-- Card Skeleton -->
      <div
        role="status"
        class="w-full md:w-48 h-64 animate-pulse rounded-2xl bg-gray-100 dark:bg-gray-700 p-6"
      >
        <div class="h-6 bg-gray-200 rounded-xl dark:bg-gray-600 mb-4"></div>
        <div class="space-y-3">
          <div
            class="h-4 bg-gray-200 rounded-lg dark:bg-gray-600"
          ></div>
          <div
            class="h-4 bg-gray-200 rounded-lg dark:bg-gray-600"
          ></div>
          <div
            class="h-4 bg-gray-200 rounded-lg dark:bg-gray-600"
          ></div>
        </div>
        <div class="flex items-center mt-6">
          <div
            class="w-10 h-10 bg-gray-200 rounded-full dark:bg-gray-600"
          ></div>
          <div class="ml-3">
            <div
              class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-600 w-12"
            ></div>
          </div>
        </div>
      </div>

      <!-- Text Skeleton -->
      <div
        role="status"
        class="w-full space-y-2.5 animate-pulse mt-4 md:mt-0"
      >
        <div class="flex items-center w-full space-x-2">
          <div
            class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32"
          ></div>
          <div
            class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24"
          ></div>
          <div
            class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-full"
          ></div>
        </div>
        <div class="flex items-center w-full space-x-2">
          <div
            class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-full"
          ></div>
          <div
            class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-full"
          ></div>
          <div
            class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-24"
          ></div>
        </div>
        <div class="flex items-center w-full space-x-2">
          <div
            class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-full"
          ></div>
          <div
            class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-80"
          ></div>
          <div
            class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-full"
          ></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection