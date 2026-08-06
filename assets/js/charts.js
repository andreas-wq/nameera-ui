let chartProduksiInstance = null;
let chartKomposisiInstance = null;

function renderCharts(isDarkMode = false) {
  const ctxProd = document.getElementById("chartProduksi");
  const ctxKomp = document.getElementById("chartKomposisi");

  if (!ctxProd || !ctxKomp) return;

  // Deteksi warna berdasarkan mode terang/gelap
  const textColor = isDarkMode ? "#e5e7eb" : "#4b5563";
  const gridColor = isDarkMode ? "#374151" : "#f3f4f6";
  const tooltipBg = isDarkMode ? "#1f2937" : "#ffffff";

  Chart.defaults.color = textColor;
  Chart.defaults.font.family = "'Nunito', sans-serif";

  if (chartProduksiInstance) chartProduksiInstance.destroy();
  if (chartKomposisiInstance) chartKomposisiInstance.destroy();

  // Chart Garis
  chartProduksiInstance = new Chart(ctxProd, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
      datasets: [
        {
          label: "Produksi (Ton)",
          data: [280, 310, 295, 340, 380, 420],
          borderColor: "#639922",
          backgroundColor: "rgba(99, 153, 34, 0.1)",
          borderWidth: 3,
          tension: 0.4,
          fill: true,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: tooltipBg,
          titleColor: textColor,
          bodyColor: textColor,
        },
      },
      scales: {
        y: {
          grid: { color: gridColor, drawBorder: false },
          ticks: { color: textColor },
        },
        x: { grid: { display: false }, ticks: { color: textColor } },
      },
    },
  });

  // Chart Donat
  chartKomposisiInstance = new Chart(ctxKomp, {
    type: "doughnut",
    data: {
      labels: ["Manggis", "Nanas", "Olahan", "Lainnya"],
      datasets: [
        {
          data: [45, 25, 20, 10],
          backgroundColor: ["#3b6d11", "#639922", "#ba7517", "#c0dd97"],
          borderWidth: 0,
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
          labels: { color: textColor, usePointStyle: true },
        },
      },
    },
  });
}
