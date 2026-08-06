@extends('nameera::layouts.app')

@section('title', 'Data Table Special - Nameera ui')

@section('content')
<div class="mb-8">
  <div
    class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
  >
    <span>Data Table</span
    ><span class="text-gray-300 dark:text-gray-600">/</span
    ><span
      class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
      >Special</span
    >
  </div>
  <h1
    class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
  >
    Special Table (List.js)
  </h1>
  <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
    Ditenagai oleh List.js, memanfaatkan markup HTML statis dengan
    fitur pencarian dan paginasi yang sangat ringan.
  </p>
</div>

<!-- List.js Wrapper -->
<div
  id="arsip-list"
  class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl shadow-sm overflow-hidden"
>
  <div
    class="p-6 border-b border-gray-100 dark:border-gray-700/50 flex flex-col md:flex-row justify-between items-center gap-4"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white">
      Log Surat Keluar Instansi
    </h3>

    <!-- Search Box (wajib class "search") -->
    <div class="relative w-full md:w-72">
      <div
        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
      >
        <svg
          class="w-4 h-4 text-gray-400"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
          ></path>
        </svg>
      </div>
      <input
        type="text"
        class="search block w-full pl-10 pr-3 py-2.5 border border-gray-200 dark:border-gray-700 rounded-xl bg-gray-50 dark:bg-gray-900 text-sm focus:ring-primary focus:border-primary transition-all dark:text-white"
        placeholder="Cari nomor, tujuan, atau perihal..."
      />
    </div>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-gray-50 dark:bg-gray-900/50">
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            <button
              class="sort hover:text-primary transition-colors flex items-center gap-1 focus:outline-none"
              data-sort="no-surat"
            >
              No. Surat ↕
            </button>
          </th>
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            <button
              class="sort hover:text-primary transition-colors flex items-center gap-1 focus:outline-none"
              data-sort="tujuan"
            >
              Tujuan ↕
            </button>
          </th>
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            <button
              class="sort hover:text-primary transition-colors flex items-center gap-1 focus:outline-none"
              data-sort="perihal"
            >
              Perihal ↕
            </button>
          </th>
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            <button
              class="sort hover:text-primary transition-colors flex items-center gap-1 focus:outline-none"
              data-sort="tanggal"
            >
              Tanggal Kirim ↕
            </button>
          </th>
        </tr>
      </thead>
      <!-- List container (wajib class "list") -->
      <tbody
        class="list divide-y divide-gray-100 dark:divide-gray-700/50"
      >
        <tr
          class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors"
        >
          <td
            class="no-surat px-6 py-4 text-sm font-medium text-dark dark:text-gray-200 whitespace-nowrap"
          >
            800/045/Diskominfo
          </td>
          <td
            class="tujuan px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            Bupati Kabupaten
          </td>
          <td
            class="perihal px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            Laporan Kinerja Bulanan
          </td>
          <td
            class="tanggal px-6 py-4 text-sm text-gray-600 dark:text-gray-400 whitespace-nowrap"
          >
            04 Ags 2026
          </td>
        </tr>
        <tr
          class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors"
        >
          <td
            class="no-surat px-6 py-4 text-sm font-medium text-dark dark:text-gray-200 whitespace-nowrap"
          >
            800/046/Diskominfo
          </td>
          <td
            class="tujuan px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            Dinas Pendidikan
          </td>
          <td
            class="perihal px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            Permintaan Data Sekolah Dasar
          </td>
          <td
            class="tanggal px-6 py-4 text-sm text-gray-600 dark:text-gray-400 whitespace-nowrap"
          >
            05 Ags 2026
          </td>
        </tr>
        <tr
          class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors"
        >
          <td
            class="no-surat px-6 py-4 text-sm font-medium text-dark dark:text-gray-200 whitespace-nowrap"
          >
            800/047/Diskominfo
          </td>
          <td
            class="tujuan px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            Dinas Sosial
          </td>
          <td
            class="perihal px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            Integrasi Data Bansos Tahap II
          </td>
          <td
            class="tanggal px-6 py-4 text-sm text-gray-600 dark:text-gray-400 whitespace-nowrap"
          >
            06 Ags 2026
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- List.js Pagination container (wajib class "pagination") -->
  <div
    class="p-4 border-t border-gray-100 dark:border-gray-700/50 flex justify-center bg-gray-50/50 dark:bg-gray-900/20"
  >
    <ul class="pagination flex gap-2"></ul>
  </div>
</div>
@endsection

@push('scripts')
<!-- Tambahan Library List.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    new List("arsip-list", {
      valueNames: ["no-surat", "tujuan", "perihal", "tanggal"],
      page: 2, // sengaja diset 2 agar pagination langsung muncul dengan 3 data
      pagination: true,
    });
  });
</script>
@endpush