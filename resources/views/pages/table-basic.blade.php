@extends('nameera::layouts.app')

@section('title', 'Data Table Basic - Nameera ui')

@section('content')
<div class="mb-8">
  <div
    class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
  >
    <span>Data Table</span>
    <span class="text-gray-300 dark:text-gray-600">/</span>
    <span
      class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
      >Basic</span
    >
  </div>
  <h1
    class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
  >
    Basic Table
  </h1>
  <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
    Tabel HTML bawaan dengan gaya Tailwind murni, cocok dirender dari
    server.
  </p>
</div>

<div
  class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl shadow-sm overflow-hidden"
>
  <div
    class="p-6 border-b border-gray-100 dark:border-gray-700/50 flex justify-between items-center"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white">
      Daftar Surat Masuk
    </h3>
    <button
      class="bg-primary hover:bg-primary-mid text-white px-4 py-2 rounded-xl text-sm font-bold transition-colors"
    >
      + Tambah Surat
    </button>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-gray-50 dark:bg-gray-900/50">
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            No. Agenda
          </th>
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            Asal Instansi
          </th>
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            Perihal
          </th>
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            Tanggal Diterima
          </th>
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 whitespace-nowrap"
          >
            Sifat
          </th>
          <th
            class="px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 text-center whitespace-nowrap"
          >
            Aksi
          </th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 dark:divide-gray-700/50">
        <tr
          class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors"
        >
          <td
            class="px-6 py-4 text-sm font-medium text-dark dark:text-gray-200"
          >
            001/SM/VIII/2026
          </td>
          <td
            class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            Dinas Kesehatan Provinsi
          </td>
          <td
            class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            Undangan Rapat Koordinasi
          </td>
          <td
            class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400"
          >
            01 Ags 2026
          </td>
          <td class="px-6 py-4">
            <span
              class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400"
              >Segera</span
            >
          </td>
          <td
            class="px-6 py-4 text-center space-x-2 whitespace-nowrap"
          >
            <button
              class="text-primary hover:text-primary-mid font-medium text-sm"
            >
              Lihat
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection