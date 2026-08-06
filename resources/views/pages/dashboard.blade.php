@extends('nameera::layouts.app')

@section('title', 'Dashboard v2 (Analytics) - Nameera ui')

@section('content')
<!-- 1. Premium Welcome Banner -->
<div
  class="relative w-full bg-gradient-to-r from-primary to-primary-mid rounded-3xl p-8 mb-8 overflow-hidden shadow-lg shadow-primary/20"
>
  <!-- Decoration -->
  <div
    class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"
  ></div>
  <div
    class="absolute bottom-0 right-1/4 w-40 h-40 bg-black opacity-10 rounded-full blur-2xl translate-y-1/2"
  ></div>

  <div
    class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6"
  >
    <div class="text-white">
      <h2
        class="text-2xl md:text-3xl font-heading font-extrabold mb-2"
      >
        Selamat Datang di Analytics, Admin! 👋
      </h2>
      <p class="text-primary-bg/80 text-sm max-w-lg leading-relaxed">
        Laporan performa sistem Anda menunjukkan tren positif minggu
        ini. Pendapatan naik sebesar
        <span class="font-bold text-white">12.5%</span> dibandingkan
        minggu lalu. Terus pertahankan kerja bagus ini!
      </p>
    </div>
    <div class="shrink-0 flex gap-3">
      <button
        class="bg-white/20 hover:bg-white/30 backdrop-blur-md border border-white/20 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors"
      >
        Unduh PDF
      </button>
      <button
        class="bg-white text-primary hover:bg-gray-50 px-5 py-2.5 rounded-xl text-sm font-bold transition-colors shadow-sm"
      >
        Atur Laporan
      </button>
    </div>
  </div>
</div>

<!-- 2. Mini Stat Cards (4 Columns) -->
<div
  class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8"
>
  <!-- Card 1 -->
  <div
    class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl p-5 shadow-sm"
  >
    <div class="flex justify-between items-start mb-4">
      <div
        class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 flex items-center justify-center"
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
            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
          ></path>
        </svg>
      </div>
      <span
        class="flex items-center text-xs font-bold text-green-500 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-md"
        >+4.5%</span
      >
    </div>
    <h4
      class="text-2xl font-heading font-extrabold text-dark dark:text-white mb-1"
    >
      $45,231
    </h4>
    <p
      class="text-xs font-bold text-gray-400 uppercase tracking-wider"
    >
      Total Pendapatan
    </p>
  </div>
  <!-- Card 2 -->
  <div
    class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl p-5 shadow-sm"
  >
    <div class="flex justify-between items-start mb-4">
      <div
        class="w-10 h-10 rounded-lg bg-primary-bg dark:bg-primary/20 text-primary-mid dark:text-primary-light flex items-center justify-center"
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
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
          ></path>
        </svg>
      </div>
      <span
        class="flex items-center text-xs font-bold text-green-500 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-md"
        >+12%</span
      >
    </div>
    <h4
      class="text-2xl font-heading font-extrabold text-dark dark:text-white mb-1"
    >
      1,284
    </h4>
    <p
      class="text-xs font-bold text-gray-400 uppercase tracking-wider"
    >
      Pengguna Aktif
    </p>
  </div>
  <!-- Card 3 -->
  <div
    class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl p-5 shadow-sm"
  >
    <div class="flex justify-between items-start mb-4">
      <div
        class="w-10 h-10 rounded-lg bg-accent-bg dark:bg-accent/20 text-accent flex items-center justify-center"
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
            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
          ></path>
        </svg>
      </div>
      <span
        class="flex items-center text-xs font-bold text-red-500 bg-red-50 dark:bg-red-900/20 px-2 py-1 rounded-md"
        >-2.1%</span
      >
    </div>
    <h4
      class="text-2xl font-heading font-extrabold text-dark dark:text-white mb-1"
    >
      24.5%
    </h4>
    <p
      class="text-xs font-bold text-gray-400 uppercase tracking-wider"
    >
      Bounce Rate
    </p>
  </div>
  <!-- Card 4 -->
  <div
    class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl p-5 shadow-sm"
  >
    <div class="flex justify-between items-start mb-4">
      <div
        class="w-10 h-10 rounded-lg bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 flex items-center justify-center"
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
            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
          ></path>
        </svg>
      </div>
      <span
        class="flex items-center text-xs font-bold text-green-500 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-md"
        >+8.4%</span
      >
    </div>
    <h4
      class="text-2xl font-heading font-extrabold text-dark dark:text-white mb-1"
    >
      4.2%
    </h4>
    <p
      class="text-xs font-bold text-gray-400 uppercase tracking-wider"
    >
      Conversion Rate
    </p>
  </div>
</div>

<!-- 3. Complex Charts Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
  <!-- Bar Chart (Span 2) -->
  <div
    class="lg:col-span-2 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-3xl p-6 shadow-sm"
  >
    <div class="flex justify-between items-center mb-6">
      <div>
        <h3 class="font-heading font-bold text-dark dark:text-white">
          Analisis Pendapatan
        </h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
          Laporan 6 bulan terakhir
        </p>
      </div>
      <button
        class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-400 transition-colors"
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
            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
          ></path>
        </svg>
      </button>
    </div>
    <div class="relative h-72 w-full">
      <canvas id="barChart"></canvas>
    </div>
  </div>

  <!-- Doughnut Chart (Span 1) -->
  <div
    class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-3xl p-6 shadow-sm flex flex-col"
  >
    <div class="mb-4">
      <h3 class="font-heading font-bold text-dark dark:text-white">
        Sumber Trafik
      </h3>
      <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
        Berdasarkan perangkat
      </p>
    </div>
    <div
      class="relative flex-1 flex items-center justify-center min-h-[200px] w-full"
    >
      <canvas id="doughnutChart"></canvas>
      <!-- Center Text Custom -->
      <div
        class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none mt-2"
      >
        <span
          class="text-3xl font-heading font-extrabold text-dark dark:text-white"
          >12k</span
        >
        <span
          class="text-[10px] font-bold text-gray-400 uppercase tracking-wider"
          >Total</span
        >
      </div>
    </div>
  </div>
</div>

<!-- 4. Advanced Table -->
<div
  class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-3xl shadow-sm overflow-hidden mb-4"
>
  <div
    class="p-6 border-b border-gray-100 dark:border-gray-700/50 flex flex-col sm:flex-row justify-between sm:items-center gap-4"
  >
    <div>
      <h3 class="font-heading font-bold text-dark dark:text-white">
        Proyek Berjalan
      </h3>
      <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
        Daftar kampanye top performa minggu ini.
      </p>
    </div>
    <div class="flex gap-2">
      <input
        type="text"
        placeholder="Cari proyek..."
        class="w-full sm:w-48 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg px-3 py-2 text-sm focus:ring-primary focus:border-primary transition-colors dark:text-white"
      />
      <button
        class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 px-3 py-2 rounded-lg text-sm font-bold transition-colors shadow-sm"
      >
        Filter
      </button>
    </div>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-gray-50/50 dark:bg-gray-900/30">
          <th
            class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider whitespace-nowrap"
          >
            Nama Proyek
          </th>
          <th
            class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider whitespace-nowrap"
          >
            Tim
          </th>
          <th
            class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider whitespace-nowrap"
          >
            Progres
          </th>
          <th
            class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider whitespace-nowrap"
          >
            Status
          </th>
          <th
            class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider whitespace-nowrap text-right"
          >
            Aksi
          </th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 dark:divide-gray-700/50">
        <!-- Row 1 -->
        <tr
          class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors"
        >
          <td class="px-6 py-4">
            <div class="flex items-center gap-3">
              <div
                class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400"
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
                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"
                  ></path>
                </svg>
              </div>
              <div>
                <p
                  class="text-sm font-bold text-dark dark:text-gray-200"
                >
                  Redesign Website
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                  Tenggat: 12 Okt 2026
                </p>
              </div>
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="flex -space-x-2">
              <img
                class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800"
                src="https://ui-avatars.com/api/?name=J&background=random"
                alt=""
              />
              <img
                class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800"
                src="https://ui-avatars.com/api/?name=M&background=random"
                alt=""
              />
              <img
                class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800"
                src="https://ui-avatars.com/api/?name=S&background=random"
                alt=""
              />
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="w-full max-w-[120px]">
              <div class="flex justify-between mb-1">
                <span
                  class="text-[10px] font-bold text-gray-500 dark:text-gray-400"
                  >75%</span
                >
              </div>
              <div
                class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700"
              >
                <div
                  class="bg-primary h-1.5 rounded-full"
                  style="width: 75%"
                ></div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4">
            <span
              class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-primary-bg text-primary-mid dark:bg-primary/20 dark:text-primary-light"
              >Berjalan</span
            >
          </td>
          <td class="px-6 py-4 text-right">
            <button
              class="text-gray-400 hover:text-primary transition-colors"
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
                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                ></path>
              </svg>
            </button>
          </td>
        </tr>

        <!-- Row 2 -->
        <tr
          class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors"
        >
          <td class="px-6 py-4">
            <div class="flex items-center gap-3">
              <div
                class="w-10 h-10 rounded-lg bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600 dark:text-orange-400"
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
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                  ></path>
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"
                  ></path>
                </svg>
              </div>
              <div>
                <p
                  class="text-sm font-bold text-dark dark:text-gray-200"
                >
                  Integrasi Analytics
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                  Tenggat: 20 Okt 2026
                </p>
              </div>
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="flex -space-x-2">
              <img
                class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800"
                src="https://ui-avatars.com/api/?name=R&background=random"
                alt=""
              />
              <img
                class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-800"
                src="https://ui-avatars.com/api/?name=F&background=random"
                alt=""
              />
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="w-full max-w-[120px]">
              <div class="flex justify-between mb-1">
                <span
                  class="text-[10px] font-bold text-gray-500 dark:text-gray-400"
                  >30%</span
                >
              </div>
              <div
                class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700"
              >
                <div
                  class="bg-accent h-1.5 rounded-full"
                  style="width: 30%"
                ></div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4">
            <span
              class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-accent-bg text-accent dark:bg-accent/20 dark:text-yellow-500"
              >Tertunda</span
            >
          </td>
          <td class="px-6 py-4 text-right">
            <button
              class="text-gray-400 hover:text-primary transition-colors"
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
                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                ></path>
              </svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const isDark = document.documentElement.classList.contains("dark");
    const textColor = isDark ? "#9ca3af" : "#6b7280";
    const gridColor = isDark
      ? "rgba(55, 65, 81, 0.5)"
      : "rgba(243, 244, 246, 1)";
    const tooltipBg = isDark ? "#1f2937" : "#fff";
    const tooltipTitle = isDark ? "#fff" : "#111827";
    const tooltipBody = isDark ? "#d1d5db" : "#4b5563";
    const tooltipBorder = isDark ? "#374151" : "#e5e7eb";

    // 1. Bar Chart (Revenue Analytics)
    if (document.getElementById("barChart")) {
      const barCtx = document.getElementById("barChart").getContext("2d");
      new Chart(barCtx, {
        type: "bar",
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
          datasets: [
            {
              label: "Pendapatan ($)",
              data: [12000, 19000, 15000, 25000, 22000, 30000],
              backgroundColor: "#3b6d11", // Primary color
              borderRadius: 6,
              borderSkipped: false,
              barPercentage: 0.6,
            },
            {
              label: "Pengeluaran ($)",
              data: [8000, 12000, 10000, 15000, 13000, 18000],
              backgroundColor: "#c0dd97", // Primary Light
              borderRadius: 6,
              borderSkipped: false,
              barPercentage: 0.6,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: "top",
              labels: {
                color: textColor,
                font: { family: "'Nunito', sans-serif" },
                padding: 15,
              },
            },
            tooltip: {
              backgroundColor: tooltipBg,
              titleColor: tooltipTitle,
              bodyColor: tooltipBody,
              borderColor: tooltipBorder,
              borderWidth: 1,
              padding: 10,
              boxPadding: 4,
              usePointStyle: true,
            },
          },
          scales: {
            x: {
              grid: { display: false, drawBorder: false },
              ticks: {
                color: textColor,
                font: { family: "'Nunito', sans-serif" },
              },
            },
            y: {
              grid: { color: gridColor, drawBorder: false },
              ticks: {
                color: textColor,
                font: { family: "'Nunito', sans-serif" },
                padding: 10,
                callback: function (value) {
                  return "$" + value.toLocaleString();
                },
              },
            },
          },
        },
      });
    }

    // 2. Doughnut Chart (Traffic Source)
    if (document.getElementById("doughnutChart")) {
      const doughnutCtx = document.getElementById("doughnutChart").getContext("2d");
      new Chart(doughnutCtx, {
        type: "doughnut",
        data: {
          labels: ["Desktop", "Mobile", "Tablet", "Other"],
          datasets: [
            {
              data: [45, 35, 15, 5],
              backgroundColor: ["#3b6d11", "#c0dd97", "#f59e0b", "#6b7280"],
              borderWidth: 0,
              borderRadius: 8,
              spacing: 2,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: "70%",
          plugins: {
            legend: {
              position: "bottom",
              labels: {
                color: textColor,
                font: { family: "'Nunito', sans-serif", size: 10 },
                padding: 15,
                boxWidth: 12,
                usePointStyle: true,
              },
            },
            tooltip: {
              backgroundColor: tooltipBg,
              titleColor: tooltipTitle,
              bodyColor: tooltipBody,
              borderColor: tooltipBorder,
              borderWidth: 1,
              padding: 10,
              boxPadding: 4,
              usePointStyle: true,
            },
          },
        },
      });
    }
  });
</script>
@endpush