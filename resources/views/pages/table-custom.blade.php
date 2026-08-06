@extends('nameera::layouts.app')

@section('title', 'Data Table Custom - Nameera ui')

@section('content')
<!-- Tambahkan x-data="customTable()" di tag main untuk melingkupi state data tabel -->
<main
  x-data="customTable()"
  class="flex-1 overflow-y-auto p-6 lg:p-10 transition-colors duration-300"
  id="main-scroll"
>
  <div class="mb-8">
    <div
      class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
    >
      <span>Data Table</span
      ><span class="text-gray-300 dark:text-gray-600">/</span
      ><span
        class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
        >Custom</span
      >
    </div>
    <h1
      class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
    >
      Custom Table (Alpine.js)
    </h1>
    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
      Tabel reaktif yang dibuat secara kustom penuh menggunakan fungsi
      pada Alpine.js.
    </p>
  </div>

  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl shadow-sm overflow-hidden"
  >
    <div
      class="p-6 border-b border-gray-100 dark:border-gray-700/50 flex flex-col md:flex-row justify-between items-center gap-4"
    >
      <h3 class="font-heading font-bold text-dark dark:text-white">
        Arsip Disposisi
      </h3>

      <!-- Search bar (Terhubung dengan x-model="search") -->
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
          x-model="search"
          placeholder="Cari data disposisi..."
          class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 dark:border-gray-700 rounded-xl bg-gray-50 dark:bg-gray-900 text-sm focus:ring-primary focus:border-primary transition-all dark:text-white"
        />
      </div>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-gray-50 dark:bg-gray-900/50">
            <th
              @click="sortBy('id')"
              class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 cursor-pointer select-none hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors whitespace-nowrap"
            >
              ID Disposisi ↕
            </th>
            <th
              @click="sortBy('tujuan')"
              class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 cursor-pointer select-none hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors whitespace-nowrap"
            >
              Tujuan Bidang ↕
            </th>
            <th
              class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
            >
              Instruksi
            </th>
            <th
              class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
            >
              Status
            </th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-gray-700/50">
          <template x-for="item in paginatedData" :key="item.id">
            <tr
              class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors"
            >
              <td
                class="px-6 py-4 text-sm font-medium text-dark dark:text-gray-200 whitespace-nowrap"
                x-text="item.id"
              ></td>
              <td
                class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400 whitespace-nowrap"
                x-text="item.tujuan"
              ></td>
              <td
                class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
                x-text="item.instruksi"
              ></td>
              <td class="px-6 py-4">
                <span
                  class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold"
                  :class="{
                    'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400': item.status === 'Selesai',
                    'bg-accent-bg text-accent dark:bg-accent/20 dark:text-yellow-500': item.status === 'Proses',
                  }"
                  x-text="item.status"
                ></span>
              </td>
            </tr>
          </template>
          <tr x-show="paginatedData.length === 0">
            <td
              colspan="4"
              class="px-6 py-8 text-center text-sm text-gray-500 dark:text-gray-400"
            >
              Data tidak ditemukan.
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Custom Pagination Footer -->
    <div
      class="p-4 border-t border-gray-100 dark:border-gray-700/50 flex flex-col sm:flex-row items-center justify-between gap-4 bg-gray-50/50 dark:bg-gray-900/20"
    >
      <span class="text-sm text-gray-500 dark:text-gray-400">
        Menampilkan
        <span
          class="font-bold text-dark dark:text-white"
          x-text="filteredData.length > 0 ? startIndex + 1 : 0"
        ></span>
        -
        <span
          class="font-bold text-dark dark:text-white"
          x-text="Math.min(endIndex, filteredData.length)"
        ></span>
        dari
        <span
          class="font-bold text-dark dark:text-white"
          x-text="filteredData.length"
        ></span>
        data
      </span>
      <div class="flex gap-2">
        <!-- Tombol Prev (Terhubung dengan fungsi Alpine) -->
        <button
          @click="prevPage"
          :disabled="currentPage === 1"
          class="px-4 py-2 rounded-xl border border-gray-200 dark:border-gray-700 text-sm font-bold text-gray-600 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-800 hover:text-primary transition-colors disabled:opacity-50 disabled:cursor-not-allowed bg-transparent"
        >
          Prev
        </button>
        <!-- Tombol Next (Terhubung dengan fungsi Alpine) -->
        <button
          @click="nextPage"
          :disabled="currentPage === totalPages || totalPages === 0"
          class="px-4 py-2 rounded-xl border border-gray-200 dark:border-gray-700 text-sm font-bold text-gray-600 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-800 hover:text-primary transition-colors disabled:opacity-50 disabled:cursor-not-allowed bg-transparent"
        >
          Next
        </button>
      </div>
    </div>
  </div>
</main>
@endsection

@push('scripts')
<script>
  // Custom Alpine.js data table
  function customTable() {
    return {
      search: '',
      currentPage: 1,
      itemsPerPage: 5,
      sortColumn: 'id',
      sortDirection: 'asc',
      data: [
        { id: 'DISP-001', tujuan: 'Bidang Infrastruktur', instruksi: 'Tindak lanjut pengecekan jaringan fiber', status: 'Selesai' },
        { id: 'DISP-002', tujuan: 'Bidang Aplikasi', instruksi: 'Perbaikan bug modul laporan keuangan', status: 'Proses' },
        { id: 'DISP-003', tujuan: 'Bidang Data', instruksi: 'Verifikasi data sensus penduduk', status: 'Selesai' },
        { id: 'DISP-004', tujuan: 'Bidang Keamanan', instruksi: 'Audit keamanan server utama', status: 'Proses' },
        { id: 'DISP-005', tujuan: 'Bidang Infrastruktur', instruksi: 'Pengadaan perangkat switch baru', status: 'Selesai' },
        { id: 'DISP-006', tujuan: 'Bidang Aplikasi', instruksi: 'Pengembangan fitur dashboard real-time', status: 'Proses' },
        { id: 'DISP-007', tujuan: 'Bidang Data', instruksi: 'Backup database harian', status: 'Selesai' },
        { id: 'DISP-008', tujuan: 'Bidang Keamanan', instruksi: 'Update sertifikat SSL', status: 'Selesai' },
      ],
      get filteredData() {
        return this.data.filter(item => {
          return (
            item.id.toLowerCase().includes(this.search.toLowerCase()) ||
            item.tujuan.toLowerCase().includes(this.search.toLowerCase()) ||
            item.instruksi.toLowerCase().includes(this.search.toLowerCase()) ||
            item.status.toLowerCase().includes(this.search.toLowerCase())
          );
        }).sort((a, b) => {
          let aVal = a[this.sortColumn];
          let bVal = b[this.sortColumn];
          if (this.sortDirection === 'asc') {
            return aVal > bVal ? 1 : -1;
          } else {
            return aVal < bVal ? 1 : -1;
          }
        });
      },
      get totalPages() {
        return Math.ceil(this.filteredData.length / this.itemsPerPage);
      },
      get paginatedData() {
        const start = (this.currentPage - 1) * this.itemsPerPage;
        const end = start + this.itemsPerPage;
        return this.filteredData.slice(start, end);
      },
      get startIndex() {
        return (this.currentPage - 1) * this.itemsPerPage;
      },
      get endIndex() {
        return Math.min(this.startIndex + this.itemsPerPage, this.filteredData.length);
      },
      sortBy(column) {
        if (this.sortColumn === column) {
          this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
          this.sortColumn = column;
          this.sortDirection = 'asc';
        }
        this.currentPage = 1;
      },
      nextPage() {
        if (this.currentPage < this.totalPages) {
          this.currentPage++;
        }
      },
      prevPage() {
        if (this.currentPage > 1) {
          this.currentPage--;
        }
      },
    };
  }
</script>
@endpush