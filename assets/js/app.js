// Konfigurasi Tailwind (CDN) — palet warna & font khusus tema Nameera ui
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: "#3b6d11",
        "primary-mid": "#639922",
        "primary-light": "#c0dd97",
        "primary-bg": "#eaf3de",
        accent: "#ba7517",
        "accent-bg": "#faeeda",
        dark: "#1a2e1a",
        "dark-mid": "#27500a",
      },
      fontFamily: {
        heading: ['"Plus Jakarta Sans"', "sans-serif"],
        body: ['"Nunito"', "sans-serif"],
      },
    },
  },
};

// Logika Alpine JS — shell (sidebar, header, dark mode).
// Setiap halaman berdiri sendiri (multi-page), jadi tidak ada lagi
// activeMenu/navigate() SPA; highlight menu aktif & submenu terbuka
// sudah ditulis statis langsung di masing-masing file HTML.
function adminApp() {
  return {
    sidebarOpen: window.innerWidth >= 1024,
    isMobile: window.innerWidth < 1024,

    // Ambil preferensi tema dari local storage, jika tidak ada default false (Light Mode)
    isDarkMode: localStorage.getItem("theme") === "dark",

    initApp() {
      // Terapkan tema saat pertama load
      this.applyTheme(this.isDarkMode);

      // Pantau klik toggle Dark Mode
      this.$watch("isDarkMode", (val) => {
        this.applyTheme(val);
      });

      // Pantau ukuran layar untuk sidebar responsive
      window.addEventListener("resize", () => {
        this.isMobile = window.innerWidth < 1024;
        if (window.innerWidth >= 1024) this.sidebarOpen = true;
        else if (this.isMobile) this.sidebarOpen = false;
      });
    },

    applyTheme(isDark) {
      localStorage.setItem("theme", isDark ? "dark" : "light");

      if (isDark) {
        document.documentElement.classList.add("dark");
      } else {
        document.documentElement.classList.remove("dark");
      }
    },
  };
}
// Logika Alpine JS - Custom Table
function customTable() {
  return {
    search: "",
    sortCol: "id",
    sortAsc: true,
    currentPage: 1,
    pageSize: 4,
    data: [
      {
        id: "DSP-001",
        tujuan: "Bidang E-Government",
        instruksi: "Tindak lanjuti edaran keamanan server",
        status: "Proses",
      },
      {
        id: "DSP-002",
        tujuan: "Bidang IKP",
        instruksi: "Siapkan rilis pers untuk acara besok",
        status: "Selesai",
      },
      {
        id: "DSP-003",
        tujuan: "Bidang Statistik",
        instruksi: "Kompilasi data sektoral kuartal III",
        status: "Proses",
      },
      {
        id: "DSP-004",
        tujuan: "Sekretariat",
        instruksi: "Arsip dokumen fisik ke gudang",
        status: "Selesai",
      },
      {
        id: "DSP-005",
        tujuan: "Bidang Persandian",
        instruksi: "Audit berkala password admin",
        status: "Proses",
      },
    ],

    get filteredData() {
      let result = this.data;
      if (this.search) {
        result = result.filter(
          (item) =>
            item.tujuan.toLowerCase().includes(this.search.toLowerCase()) ||
            item.instruksi.toLowerCase().includes(this.search.toLowerCase()),
        );
      }

      result = result.sort((a, b) => {
        let valA = a[this.sortCol].toLowerCase();
        let valB = b[this.sortCol].toLowerCase();
        if (valA < valB) return this.sortAsc ? -1 : 1;
        if (valA > valB) return this.sortAsc ? 1 : -1;
        return 0;
      });

      let total = Math.ceil(result.length / this.pageSize);
      if (this.currentPage > total && total > 0) this.currentPage = 1;

      return result;
    },

    get paginatedData() {
      return this.filteredData.slice(this.startIndex, this.endIndex);
    },

    get startIndex() {
      return (this.currentPage - 1) * this.pageSize;
    },

    get endIndex() {
      return this.currentPage * this.pageSize;
    },

    get totalPages() {
      return Math.ceil(this.filteredData.length / this.pageSize);
    },

    sortBy(col) {
      if (this.sortCol === col) {
        this.sortAsc = !this.sortAsc;
      } else {
        this.sortCol = col;
        this.sortAsc = true;
      }
    },

    nextPage() {
      if (this.currentPage < this.totalPages) this.currentPage++;
    },

    prevPage() {
      if (this.currentPage > 1) this.currentPage--;
    },
  };
}
