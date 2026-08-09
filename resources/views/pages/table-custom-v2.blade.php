@extends('nameera::layouts.app')

@section('title', 'Data Table Custom V2 - Nameera ui')

@section('content')
          <!-- ==================== DATA TABLE: CUSTOM V2 (Laravel-Ready) ==================== -->
          <div id="custom-table-v2">
            <div class="mb-8">
              <div
                class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
              >
                <span>Data Table</span>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <span
                  class="text-primary-mid dark:text-primary-light normal-case font-semibold"
                  >Custom V2</span
                >
                <span
                  class="ml-2 inline-flex items-center gap-1 rounded-full bg-primary/10 dark:bg-primary/20 text-primary dark:text-primary-light text-[10px] font-bold px-2.5 py-0.5"
                >
                  <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                    <path
                      d="M11.999 1.993c-5.514.001-10 4.487-10 10.001 0 4.125 2.522 7.869 6.409 9.375.479.096.663-.208.663-.463 0-.225-.008-.825-.013-1.622-2.609.567-3.16-1.258-3.16-1.258-.426-1.083-1.04-1.371-1.04-1.371-.851-.581.064-.57.064-.57.941.066 1.436.966 1.436.966.835 1.432 2.191 1.018 2.726.779.084-.606.327-1.019.595-1.252-2.083-.237-4.274-1.042-4.274-4.636 0-1.024.366-1.862.966-2.519-.097-.237-.419-1.191.092-2.482 0 0 .787-.253 2.579.962a8.958 8.958 0 0 1 2.349-.316c.797.004 1.599.108 2.348.316 1.79-1.215 2.576-.962 2.576-.962.512 1.291.19 2.245.093 2.482.601.657.965 1.495.965 2.519 0 3.604-2.195 4.396-4.285 4.628.337.291.637.863.637 1.74 0 1.256-.011 2.268-.011 2.576 0 .257.181.562.668.463 3.885-1.507 6.405-5.251 6.405-9.375 0-5.514-4.486-10-10.001-10z"
                    />
                  </svg>
                  Laravel Ready
                </span>
              </div>
              <h1
                class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
              >
                Data Table Custom V2 — Laravel Server-Side
              </h1>
              <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Versi table custom yang dioptimalkan untuk Laravel: server-side
                pagination, search, dan sort menggunakan struktur JSON Laravel
                Paginator. Siap dihubungkan ke route & controller Laravel.
              </p>
            </div>

            <div
              x-data="tableCustomV2()"
              x-init="init()"
              class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 lg:p-8 shadow-sm"
            >
              <!-- Toolbar: Search, Column Toggle, Export -->
              <div
                class="flex flex-wrap items-center justify-between gap-3 mb-6"
              >
                <div class="relative flex-1 min-w-[220px] max-w-md">
                  <div
                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none"
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
                    x-model="query"
                    @input="onSearch()"
                    placeholder="Cari nama, kebun, komoditas... (server-side)"
                    class="block w-full pl-11 pr-4 py-2.5 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <div class="flex items-center gap-2">
                  <div class="relative" x-data="{ open: showColumnToggle }">
                    <button
                      type="button"
                      @click="showColumnToggle = !showColumnToggle"
                      class="inline-flex items-center gap-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 hover:border-primary/50 text-gray-600 dark:text-gray-300 font-bold text-sm px-4 py-2.5 transition-colors"
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
                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"
                        ></path>
                      </svg>
                      Kolom
                    </button>
                    <div
                      x-show="showColumnToggle"
                      x-transition
                      x-cloak
                      @click.outside="showColumnToggle = false"
                      class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 p-3 z-20"
                    >
                      <p
                        class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-2"
                      >
                        Tampilkan kolom
                      </p>
                      <div class="space-y-1.5">
                        <template x-for="col in allColumns" :key="col.key">
                          <label
                            class="flex items-center justify-between text-sm font-medium text-gray-600 dark:text-gray-300 cursor-pointer"
                          >
                            <span x-text="col.label"></span>
                            <input
                              type="checkbox"
                              x-model="visibleCols[col.key]"
                              class="w-4 h-4 rounded accent-primary cursor-pointer"
                            />
                          </label>
                        </template>
                      </div>
                    </div>
                  </div>

                  <button
                    type="button"
                    @click="exportAllCsv()"
                    class="inline-flex items-center gap-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 hover:border-primary/50 text-gray-600 dark:text-gray-300 font-bold text-sm px-4 py-2.5 transition-colors"
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
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                      ></path>
                    </svg>
                    Export
                  </button>

                  <button
                    type="button"
                    class="inline-flex items-center gap-2 rounded-xl bg-primary hover:bg-primary-mid text-white font-bold text-sm px-4 py-2.5 transition-colors shadow-sm shadow-primary/30"
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
                </div>
              </div>

              <!-- Loading State -->
              <div
                x-show="loading"
                x-cloak
                class="flex flex-col items-center justify-center py-16 text-gray-400"
              >
                <svg
                  class="w-8 h-8 animate-spin mb-3 text-primary"
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
                <p class="text-sm font-semibold">Memuat data dari server...</p>
              </div>

              <!-- Table -->
              <div x-show="!loading" x-cloak class="table-scroll">
                <table class="data-table min-w-[760px]">
                  <thead>
                    <tr>
                      <th x-show="visibleCols.checkbox" class="w-10">
                        <input
                          type="checkbox"
                          @change="selectAllRows($event.target.checked)"
                          :checked="selectedRows.length === rows.length && rows.length > 0"
                          class="w-4 h-4 rounded accent-primary cursor-pointer"
                          aria-label="Pilih semua baris"
                        />
                      </th>
                      <template x-for="col in displayedColumns" :key="col.key">
                        <th
                          @click="toggleSort(col.key)"
                          :class="{
                            'cursor-pointer select-none': col.key !== 'aksi',
                            'text-center': col.key === 'aksi'
                          }"
                          class="whitespace-nowrap"
                        >
                          <span class="inline-flex items-center gap-1">
                            <span x-text="col.label"></span>
                            <template x-if="col.key !== 'aksi'">
                              <svg
                                class="w-3 h-3"
                                :class="sortBy === col.key ? 'text-primary' : 'text-gray-300 dark:text-gray-600'"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                              >
                                <path
                                  x-show="sortBy !== col.key"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"
                                ></path>
                                <path
                                  x-show="sortBy === col.key && sortDir === 'asc'"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M5 15l7-7 7 7"
                                ></path>
                                <path
                                  x-show="sortBy === col.key && sortDir === 'desc'"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 9l-7 7-7-7"
                                ></path>
                              </svg>
                            </template>
                          </span>
                        </th>
                      </template>
                    </tr>
                  </thead>
                  <tbody>
                    <template x-if="rows.length === 0">
                      <tr>
                        <td
                          :colspan="displayedColumns.length + (visibleCols.checkbox ? 1 : 0)"
                          class="text-center py-8 text-gray-500 dark:text-gray-400"
                        >
                          <svg
                            class="w-12 h-12 mx-auto mb-3"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.5"
                              d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"
                            ></path>
                          </svg>
                          <p>Tidak ada data ditemukan.</p>
                        </td>
                      </tr>
                    </template>
                    <template x-for="(row, index) in rows" :key="row.id">
                      <tr
                        :class="{'bg-gray-50 dark:bg-gray-900/40': index % 2 !== 0, 'bg-primary-bg dark:bg-primary/10 border-l-4 border-l-primary': expandedId === row.id}"
                        class="cursor-pointer transition-colors"
                        @click="toggleExpand(row.id)"
                      >
                        <td x-show="visibleCols.checkbox">
                          <input
                            type="checkbox"
                            x-model="selectedRows"
                            :value="row.id"
                            @click.stop
                            class="w-4 h-4 rounded accent-primary cursor-pointer"
                            :aria-label="`Pilih baris ${row.nama}`"
                          />
                        </td>
                        <template
                          x-for="col in displayedColumns"
                          :key="col.key"
                        >
                          <td
                            class="whitespace-nowrap"
                            :class="{
                                'font-medium text-dark dark:text-gray-200': col.key === 'nama',
                                'text-center': col.key === 'aksi'
                              }"
                            x-show="col.key !== 'aksi' || visibleCols.aksi"
                            @dblclick="editCell(row.id, col.key, row[col.key])"
                          >
                            <template
                              x-if="editingCell === `${row.id}-${col.key}`"
                            >
                              <input
                                type="text"
                                x-model="editingValue"
                                @click.stop
                                @blur="saveCell(row.id, col.key)"
                                @keydown.enter="saveCell(row.id, col.key)"
                                class="w-full rounded-md border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-3 py-1.5 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary shadow-sm"
                              />
                            </template>
                            <template
                              x-if="editingCell !== `${row.id}-${col.key}`"
                            >
                              <div
                                :class="{'flex items-center justify-center gap-1': col.key === 'aksi'}"
                              >
                                <template
                                  x-if="col.key !== 'status' && col.key !== 'aksi'"
                                >
                                  <span x-text="row[col.key]"></span>
                                </template>
                                <template x-if="col.key === 'status'">
                                  <span
                                    class="status-badge"
                                    :class="row.status"
                                    x-text="row.status"
                                  ></span>
                                </template>
                                <template x-if="col.key === 'aksi'">
                                  <div
                                    class="flex items-center justify-center gap-1"
                                  >
                                    <button
                                      @click.stop="viewDetail(row.id)"
                                      class="table-action hover:!text-primary hover:!bg-primary-bg dark:hover:!bg-primary/20"
                                      aria-label="Lihat detail"
                                      title="Lihat detail"
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
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        ></path>
                                        <path
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                        ></path>
                                      </svg>
                                    </button>
                                    <button
                                      @click.stop="editRow(row.id)"
                                      class="table-action hover:!text-accent hover:!bg-accent-bg dark:hover:!bg-accent/20"
                                      aria-label="Edit data"
                                      title="Edit data"
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
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                        ></path>
                                      </svg>
                                    </button>
                                    <button
                                      @click.stop="duplicateRow(row.id)"
                                      class="table-action hover:!text-green-500 hover:!bg-green-50 dark:hover:!bg-green-500/10"
                                      aria-label="Duplikat data"
                                      title="Duplikat data"
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
                                          d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                                        ></path>
                                      </svg>
                                    </button>
                                    <button
                                      @click.stop="deleteSingleRow(row.id)"
                                      class="table-action hover:!text-red-500 hover:!bg-red-50 dark:hover:!bg-red-500/10"
                                      aria-label="Hapus data"
                                      title="Hapus data"
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
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        ></path>
                                      </svg>
                                    </button>
                                  </div>
                                </template>
                              </div>
                            </template>
                          </td>
                        </template>
                      </tr>
                    </template>
                    <template
                      x-for="(row, index) in rows"
                      :key="'detail-' + row.id"
                    >
                      <tr x-show="expandedId === row.id">
                        <td
                          :colspan="displayedColumns.length + (visibleCols.checkbox ? 1 : 0)"
                          class="px-6 py-4 bg-gray-50 dark:bg-gray-900/40"
                        >
                          <div class="text-sm text-gray-700 dark:text-gray-300">
                            <p class="font-bold mb-2">
                              Detail untuk <span x-text="row.nama"></span>:
                            </p>
                            <ul class="list-disc list-inside space-y-1">
                              <li>ID Anggota: <span x-text="row.id"></span></li>
                              <li>Kebun: <span x-text="row.kebun"></span></li>
                              <li>Status: <span x-text="row.status"></span></li>
                              <li>
                                Join Date: <span x-text="row.joinDate"></span>
                              </li>
                              <li>
                                Komoditas:
                                <span x-text="row.komoditas"></span>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>

              <!-- Bulk Action Toolbar -->
              <div
                x-show="!loading && selectedRows.length > 0"
                x-transition
                class="mt-4 p-3 rounded-2xl bg-primary-bg dark:bg-primary/10 border border-primary/20 dark:border-primary/30 flex items-center justify-between"
              >
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                  <span x-text="selectedRows.length"></span> baris terpilih
                </p>
                <div class="flex gap-2">
                  <button
                    type="button"
                    @click="openDeleteSelectedModal()"
                    class="text-sm font-bold rounded-xl px-4 py-2 bg-red-500 text-white hover:bg-red-600 transition-colors"
                  >
                    Hapus Terpilih
                  </button>
                  <button
                    type="button"
                    @click="exportSelectedCsv()"
                    class="text-sm font-bold rounded-xl px-4 py-2 bg-primary text-white hover:bg-primary-mid transition-colors"
                  >
                    Export Terpilih (CSV)
                  </button>
                </div>
              </div>

              <!-- Pagination (Server-side / Laravel style) -->
              <div
                class="flex flex-wrap items-center justify-between gap-4 border-t border-gray-100 dark:border-gray-700/50 pt-5 mt-5"
                x-show="!loading"
              >
                <!-- Info ala Laravel: "Menampilkan 1-5 dari 12 data" -->
                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">
                  Menampilkan
                  <span
                    class="font-bold text-dark dark:text-white"
                    x-text="from"
                  ></span>
                  -
                  <span
                    class="font-bold text-dark dark:text-white"
                    x-text="to"
                  ></span>
                  dari
                  <span
                    class="font-bold text-dark dark:text-white"
                    x-text="total"
                  ></span>
                  data
                </p>

                <div class="flex items-center gap-2">
                  <button
                    type="button"
                    @click="prevPage()"
                    :disabled="page === 1"
                    class="inline-flex items-center gap-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-bold text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary-light disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-sm"
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
                        d="M15 19l-7-7 7-7"
                      ></path>
                    </svg>
                    <span class="hidden sm:inline">Sebelumnya</span>
                  </button>

                  <!-- Nomor halaman -->
                  <div class="hidden sm:flex items-center gap-1.5">
                    <template x-for="p in lastPage" :key="p">
                      <button
                        type="button"
                        @click="goToPage(p)"
                        :class="p === page
                          ? 'bg-primary text-white shadow-sm shadow-primary/30'
                          : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary-light border border-gray-200 dark:border-gray-700'"
                        class="w-9 h-9 rounded-xl text-sm font-bold transition-all"
                        x-text="p"
                      ></button>
                    </template>
                  </div>

                  <button
                    type="button"
                    @click="nextPage()"
                    :disabled="page === lastPage"
                    class="inline-flex items-center gap-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-bold text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary dark:hover:text-primary-light disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-sm"
                  >
                    <span class="hidden sm:inline">Berikutnya</span>
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
                        d="M9 5l7 7-7 7"
                      ></path>
                    </svg>
                  </button>

                  <div
                    class="hidden md:block w-px h-4 bg-gray-200 dark:bg-gray-700 mx-2"
                  ></div>

                  <div class="hidden md:flex items-center gap-2">
                    <span
                      class="text-xs font-medium text-gray-500 dark:text-gray-400"
                      >Tampil:</span
                    >
                    <select
                      x-model="pageSize"
                      @change="changePageSize()"
                      class="text-xs font-bold rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-dark dark:text-white py-1.5 pl-3 pr-8 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary cursor-pointer shadow-sm"
                    >
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="20">20</option>
                      <option value="50">50</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- ==================== DELETE CONFIRMATION MODAL ==================== -->
              <template x-teleport="body">
                <div
                  x-show="deleteModalOpen"
                  class="relative z-[100]"
                  aria-labelledby="delete-modal-title"
                  role="dialog"
                  aria-modal="true"
                  style="display: none"
                >
                  <div
                    x-show="deleteModalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"
                  ></div>
                  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div
                      class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                    >
                      <div
                        x-show="deleteModalOpen"
                        @click.outside="closeDeleteModal()"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border border-gray-100 dark:border-gray-700"
                      >
                        <div class="p-6">
                          <div
                            class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center mb-4"
                          >
                            <svg
                              class="w-6 h-6 text-red-600 dark:text-red-400"
                              fill="none"
                              stroke="currentColor"
                              viewBox="0 0 24 24"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                              ></path>
                            </svg>
                          </div>
                          <h3
                            id="delete-modal-title"
                            class="text-xl font-heading font-bold text-gray-900 dark:text-white mb-2"
                          >
                            <template x-if="deleteMode === 'single'">
                              <span>Hapus Data?</span>
                            </template>
                            <template x-if="deleteMode === 'bulk'">
                              <span>Hapus Data Terpilih?</span>
                            </template>
                          </h3>
                          <p class="text-sm text-gray-500 dark:text-gray-400">
                            <template x-if="deleteMode === 'single'">
                              <span>
                                Apakah Anda yakin ingin menghapus data
                                <span
                                  class="font-bold text-gray-700 dark:text-gray-200"
                                  x-text="deleteTargetName"
                                ></span
                                >? Tindakan ini tidak dapat dibatalkan.
                              </span>
                            </template>
                            <template x-if="deleteMode === 'bulk'">
                              <span>
                                Apakah Anda yakin ingin menghapus
                                <span
                                  class="font-bold text-gray-700 dark:text-gray-200"
                                  x-text="selectedRows.length"
                                ></span>
                                baris data terpilih? Tindakan ini tidak dapat
                                dibatalkan.
                              </span>
                            </template>
                          </p>
                        </div>
                        <div
                          class="bg-gray-50 dark:bg-gray-900/50 px-6 py-4 flex flex-row-reverse gap-3"
                        >
                          <button
                            @click="confirmDelete()"
                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
                          >
                            Ya, Hapus
                          </button>
                          <button
                            @click="closeDeleteModal()"
                            class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
                          >
                            Batal
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </template>

              <!-- ==================== SUCCESS TOAST ==================== -->
              <div
                x-show="toastShow"
                x-transition.opacity.duration.300ms
                x-cloak
                class="fixed top-5 right-5 z-[110] flex items-center w-full max-w-sm p-4 text-gray-500 bg-white rounded-xl shadow-lg dark:text-gray-400 dark:bg-gray-800 border border-gray-100 dark:border-gray-700"
                role="alert"
              >
                <div
                  class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800/30 dark:text-green-400"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                    />
                  </svg>
                </div>
                <div class="ml-3 text-sm font-bold text-dark dark:text-white">
                  Sukses!
                  <span
                    class="font-normal text-gray-500 dark:text-gray-400 block text-xs"
                    x-text="toastMessage"
                  ></span>
                </div>
                <button
                  @click="toastShow = false"
                  type="button"
                  class="ml-auto -mx-1.5 -my-1.5 bg-transparent text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:hover:bg-gray-700 transition-colors"
                >
                  <svg
                    class="w-3 h-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 14 14"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/nameera/js/tables.js') }}?v=2"></script>
@endpush