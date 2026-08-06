@extends('nameera::layouts.app')

@section('title', 'Navigation Components - Nameera ui')

@section('content')
<div class="mb-8">
  <div
    class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
  >
    <span>Components</span
    ><span class="text-gray-300 dark:text-gray-600">/</span
    ><span
      class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
      >Navigation</span
    >
  </div>
  <h1
    class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
  >
    Navigation UIs
  </h1>
  <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
    Komponen penunjuk arah dan pemecah halaman untuk sistem
    administrasi persuratan.
  </p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- BREADCRUMBS -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
      Breadcrumbs
    </h3>

    <!-- Style 1: Garis miring -->
    <nav class="flex mb-4" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a
            href="#"
            class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-primary dark:text-gray-400 dark:hover:text-white"
          >
            <svg
              class="w-3 h-3 mr-2.5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
              />
            </svg>
            Dashboard
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <span class="text-gray-300 dark:text-gray-600">/</span>
            <a
              href="#"
              class="ml-1 text-sm font-medium text-gray-500 hover:text-primary md:ml-2 dark:text-gray-400 dark:hover:text-white"
              >Persuratan</a
            >
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <span class="text-gray-300 dark:text-gray-600">/</span>
            <span
              class="ml-1 text-sm font-bold text-dark dark:text-white md:ml-2"
              >Disposisi Surat</span
            >
          </div>
        </li>
      </ol>
    </nav>

    <!-- Style 2: Chevron / Background -->
    <nav
      class="flex px-4 py-3 text-gray-700 border border-gray-200 rounded-xl bg-gray-50 dark:bg-gray-900 dark:border-gray-700"
      aria-label="Breadcrumb"
    >
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a
            href="#"
            class="text-sm font-medium text-gray-500 hover:text-primary dark:text-gray-400 dark:hover:text-white"
            >Arsip</a
          >
        </li>
        <li>
          <div class="flex items-center">
            <svg
              class="w-3 h-3 mx-1 text-gray-400"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 6 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 9 4-4-4-4"
              />
            </svg>
            <a
              href="#"
              class="ml-1 text-sm font-medium text-gray-500 hover:text-primary md:ml-2 dark:text-gray-400 dark:hover:text-white"
              >Bidang IKP</a
            >
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg
              class="w-3 h-3 mx-1 text-gray-400"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 6 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 9 4-4-4-4"
              />
            </svg>
            <span
              class="ml-1 text-sm font-bold text-primary md:ml-2 dark:text-primary-light"
              >Detail Naskah</span
            >
          </div>
        </li>
      </ol>
    </nav>
  </div>

  <!-- TABS -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
      Tabs
    </h3>

    <!-- Setup Alpine State untuk Tabs -->
    <div x-data="{ tab: 'detail' }">
      <ul
        class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
      >
        <li class="mr-2">
          <a
            href="#"
            @click.prevent="tab = 'detail'"
            :class="tab === 'detail' ? 'text-primary border-primary dark:text-primary-light dark:border-primary-light' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
            class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group transition-colors"
          >
            <svg
              class="w-4 h-4 mr-2"
              :class="tab === 'detail' ? 'text-primary' : 'text-gray-400 group-hover:text-gray-500'"
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
            Detail
          </a>
        </li>
        <li class="mr-2">
          <a
            href="#"
            @click.prevent="tab = 'lampiran'"
            :class="tab === 'lampiran' ? 'text-primary border-primary dark:text-primary-light dark:border-primary-light' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
            class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group transition-colors"
          >
            <svg
              class="w-4 h-4 mr-2"
              :class="tab === 'lampiran' ? 'text-primary' : 'text-gray-400 group-hover:text-gray-500'"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
              ></path>
            </svg>
            Lampiran
          </a>
        </li>
      </ul>

      <div
        class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-b-xl rounded-tr-xl mt-px"
      >
        <div x-show="tab === 'detail'" x-transition.opacity>
          <p class="text-sm text-gray-500 dark:text-gray-400">
            Menampilkan detail informasi dari surat masuk. Termasuk
            nomor registrasi, asal instansi, dan riwayat posisi surat
            saat ini di Dinas Kominfo Subang.
          </p>
        </div>
        <div
          x-show="tab === 'lampiran'"
          x-transition.opacity
          style="display: none"
        >
          <p class="text-sm text-gray-500 dark:text-gray-400">
            Daftar berkas lampiran pendukung. Belum ada berkas PDF
            yang diunggah oleh admin sekretariat.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- DROPDOWN & PAGINATION -->
  <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Dropdowns -->
    <div
      class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
    >
      <h3
        class="font-heading font-bold text-dark dark:text-white mb-6"
      >
        Dropdown Menus
      </h3>

      <!-- Setup Alpine State untuk Dropdown -->
      <div class="flex gap-4">
        <div x-data="{ open: false }" class="relative">
          <button
            @click="open = !open"
            @click.outside="open = false"
            class="text-white bg-primary hover:bg-primary-mid focus:ring-4 focus:outline-none focus:ring-primary/30 font-medium rounded-xl text-sm px-5 py-2.5 text-center inline-flex items-center transition-colors"
          >
            Tindakan Surat
            <svg
              class="w-2.5 h-2.5 ml-2.5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 10 6"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 4 4 4-4"
              />
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div
            x-show="open"
            x-transition.opacity.duration.200ms
            class="absolute z-10 mt-2 bg-white divide-y divide-gray-100 rounded-xl shadow-lg w-44 dark:bg-gray-700 dark:divide-gray-600"
            style="display: none"
          >
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                  >Teruskan Disposisi</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                  >Cetak Lembar</a
                >
              </li>
            </ul>
            <div class="py-2">
              <a
                href="#"
                class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-red-300 font-bold"
                >Arsipkan</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Standalone Pagination -->
    <div
      class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
    >
      <h3
        class="font-heading font-bold text-dark dark:text-white mb-6"
      >
        Pagination UIs
      </h3>

      <nav aria-label="Page navigation">
        <ul class="inline-flex -space-x-px text-sm">
          <li>
            <a
              href="#"
              class="flex items-center justify-center px-3 h-9 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >Previous</a
            >
          </li>
          <li>
            <a
              href="#"
              class="flex items-center justify-center px-3 h-9 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >1</a
            >
          </li>
          <li>
            <a
              href="#"
              aria-current="page"
              class="flex items-center justify-center px-3 h-9 text-white border border-primary bg-primary hover:bg-primary-mid hover:text-white dark:border-gray-700"
              >2</a
            >
          </li>
          <li>
            <a
              href="#"
              class="flex items-center justify-center px-3 h-9 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >3</a
            >
          </li>
          <li>
            <a
              href="#"
              class="flex items-center justify-center px-3 h-9 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
              >Next</a
            >
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
@endsection