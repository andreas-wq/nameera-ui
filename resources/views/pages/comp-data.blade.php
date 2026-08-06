@extends('nameera::layouts.app')

@section('title', 'Data Display Components - Nameera ui')

@section('content')
<div class="mb-8">
  <div
    class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
  >
    <span>Components</span
    ><span class="text-gray-300 dark:text-gray-600">/</span
    ><span
      class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
      >Data Display</span
    >
  </div>
  <h1
    class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
  >
    Data Display Elements
  </h1>
  <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
    Komponen visual untuk melacak proses, mengelompokkan info
    tambahan, dan mengukur progres.
  </p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- TIMELINES (Sangat relevan untuk Disposisi Surat) -->
  <div
    class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
  >
    <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
      Vertical Timeline (Riwayat)
    </h3>

    <ol
      class="relative border-l-2 border-gray-200 dark:border-gray-700 ml-3"
    >
      <li class="mb-8 ml-6">
        <span
          class="absolute flex items-center justify-center w-6 h-6 bg-primary-light rounded-full -left-[13px] ring-4 ring-white dark:ring-gray-800"
        >
          <svg
            class="w-3 h-3 text-primary-mid"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
            />
          </svg>
        </span>
        <h4
          class="flex items-center mb-1 text-sm font-bold text-gray-900 dark:text-white"
        >
          Diterima oleh Bidang IKP
          <span
            class="bg-green-100 text-green-800 text-[10px] font-bold mr-2 px-2.5 py-0.5 rounded ml-3 dark:bg-green-900 dark:text-green-300"
            >Terkini</span
          >
        </h4>
        <time
          class="block mb-2 text-xs font-normal leading-none text-gray-400 dark:text-gray-500"
          >Hari ini, 09:45 WIB</time
        >
        <p
          class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400"
        >
          Surat disposisi telah diterima oleh Kepala Bidang Informasi
          & Komunikasi Publik. Menunggu tindak lanjut staf.
        </p>
      </li>
      <li class="mb-8 ml-6">
        <span
          class="absolute flex items-center justify-center w-6 h-6 bg-gray-200 rounded-full -left-[13px] ring-4 ring-white dark:ring-gray-800 dark:bg-gray-700"
        >
          <svg
            class="w-3 h-3 text-gray-500 dark:text-gray-400"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 18 20"
          >
            <path
              d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"
            />
          </svg>
        </span>
        <h4
          class="mb-1 text-sm font-bold text-gray-900 dark:text-white"
        >
          Didisposisikan oleh Kepala Dinas
        </h4>
        <time
          class="block mb-2 text-xs font-normal leading-none text-gray-400 dark:text-gray-500"
          >05 Agustus 2026, 14:20 WIB</time
        >
        <p
          class="text-sm font-normal text-gray-500 dark:text-gray-400"
        >
          Kadis menambahkan instruksi: "Tolong segera siapkan bahan
          rilis pers untuk acara kunjungan besok."
        </p>
      </li>
      <li class="ml-6">
        <span
          class="absolute flex items-center justify-center w-6 h-6 bg-gray-200 rounded-full -left-[13px] ring-4 ring-white dark:ring-gray-800 dark:bg-gray-700"
        >
          <svg
            class="w-3 h-3 text-gray-500 dark:text-gray-400"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
            />
          </svg>
        </span>
        <h4
          class="mb-1 text-sm font-bold text-gray-900 dark:text-white"
        >
          Surat Didaftarkan oleh Sekretariat
        </h4>
        <time
          class="block mb-2 text-xs font-normal leading-none text-gray-400 dark:text-gray-500"
          >05 Agustus 2026, 08:00 WIB</time
        >
        <p
          class="text-sm font-normal text-gray-500 dark:text-gray-400"
        >
          Surat dari Sekretaris Daerah tiba di loket pelayanan.
          Diregistrasi dengan Nomor Agenda: 045/SM/VIII.
        </p>
      </li>
    </ol>
  </div>

  <!-- ACCORDIONS & PROGRESS -->
  <div class="flex flex-col gap-6">
    <!-- Accordions (x-collapse) -->
    <div
      class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
    >
      <h3
        class="font-heading font-bold text-dark dark:text-white mb-6"
      >
        Accordions (FAQ)
      </h3>

      <div x-data="{ activeAccordion: 1 }" class="space-y-3">
        <!-- Accordion Item 1 -->
        <div
          class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-gray-50 dark:bg-gray-900/50"
        >
          <button
            @click="activeAccordion = activeAccordion === 1 ? null : 1"
            class="w-full flex items-center justify-between p-4 text-left font-bold text-sm text-gray-700 dark:text-gray-200 focus:outline-none"
          >
            <span>Bagaimana alur surat masuk?</span>
            <svg
              :class="activeAccordion === 1 ? 'rotate-180' : ''"
              class="w-4 h-4 transition-transform duration-200 text-gray-500"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              ></path>
            </svg>
          </button>
          <div x-show="activeAccordion === 1" x-collapse>
            <div
              class="p-4 pt-0 text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-700 mt-2 pt-3"
            >
              Setiap surat masuk harus diregistrasikan terlebih dahulu
              di bagian Sekretariat, kemudian diserahkan kepada Kepala
              Dinas untuk diturunkan instruksi disposisinya.
            </div>
          </div>
        </div>

        <!-- Accordion Item 2 -->
        <div
          class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-gray-50 dark:bg-gray-900/50"
        >
          <button
            @click="activeAccordion = activeAccordion === 2 ? null : 2"
            class="w-full flex items-center justify-between p-4 text-left font-bold text-sm text-gray-700 dark:text-gray-200 focus:outline-none"
          >
            <span
              >Berapa lama batas waktu penyelesaian disposisi?</span
            >
            <svg
              :class="activeAccordion === 2 ? 'rotate-180' : ''"
              class="w-4 h-4 transition-transform duration-200 text-gray-500"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
              ></path>
            </svg>
          </button>
          <div x-show="activeAccordion === 2" x-collapse>
            <div
              class="p-4 pt-0 text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-700 mt-2 pt-3"
            >
              Sesuai standar operasional, surat bersipat "Biasa"
              diselesaikan maksimal 3 hari kerja, sedangkan surat
              "Segera" harus diproses dalam waktu 1x24 jam.
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Progress Bars -->
    <div
      class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
    >
      <h3
        class="font-heading font-bold text-dark dark:text-white mb-6"
      >
        Progress Bars
      </h3>

      <div class="space-y-5">
        <div>
          <div class="flex justify-between mb-1">
            <span
              class="text-xs font-bold text-gray-700 dark:text-gray-300"
              >Kelengkapan Profil Pegawai</span
            >
            <span
              class="text-xs font-bold text-primary dark:text-primary-light"
              >75%</span
            >
          </div>
          <div
            class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700"
          >
            <div
              class="bg-primary h-2 rounded-full"
              style="width: 75%"
            ></div>
          </div>
        </div>

        <div>
          <div class="flex justify-between mb-1">
            <span
              class="text-xs font-bold text-gray-700 dark:text-gray-300"
              >Kapasitas Penyimpanan Arsip Digital</span
            >
            <span
              class="text-xs font-bold text-red-600 dark:text-red-400"
              >92%</span
            >
          </div>
          <div
            class="w-full bg-gray-200 rounded-full h-3 dark:bg-gray-700"
          >
            <div
              class="bg-red-500 h-3 rounded-full"
              style="width: 92%"
            ></div>
          </div>
          <p class="text-[10px] text-gray-500 mt-1">
            Penyimpanan hampir penuh. Harap bersihkan log lama.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection