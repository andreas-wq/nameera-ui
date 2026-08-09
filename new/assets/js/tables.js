// Dummy data for demonstration purposes
window.__demoAnggotaKoperasi = [
  {
    id: 1,
    nama: "Siti Rahayu",
    kebun: "Kebun Manggis Indah",
    status: "aktif",
    joinDate: "2023-01-15",
    komoditas: "Manggis",
  },
  {
    id: 2,
    nama: "Budi Santoso",
    kebun: "Agrowisata Nanas Jaya",
    status: "aktif",
    joinDate: "2023-02-20",
    komoditas: "Nanas",
  },
  {
    id: 3,
    nama: "Dewi Sartika",
    kebun: "Perkebunan Cokelat Lestari",
    status: "nonaktif",
    joinDate: "2023-03-10",
    komoditas: "Cokelat",
  },
  {
    id: 4,
    nama: "Joko Susilo",
    kebun: "Sentra Olahan Kopi",
    status: "aktif",
    joinDate: "2023-04-05",
    komoditas: "Kopi",
  },
  {
    id: 5,
    nama: "Ani Wijaya",
    kebun: "Kebun Stroberi Sehat",
    status: "aktif",
    joinDate: "2023-05-12",
    komoditas: "Stroberi",
  },
  {
    id: 6,
    nama: "Rudi Hartono",
    kebun: "Lahan Buah Naga",
    status: "nonaktif",
    joinDate: "2023-06-01",
    komoditas: "Buah Naga",
  },
  {
    id: 7,
    nama: "Maya Puspita",
    kebun: "Peternakan Ayam Organik",
    status: "aktif",
    joinDate: "2023-07-07",
    komoditas: "Telur Ayam",
  },
  {
    id: 8,
    nama: "Faisal Rahman",
    kebun: "Tambak Udang Jaya",
    status: "aktif",
    joinDate: "2023-08-18",
    komoditas: "Udang",
  },
  {
    id: 9,
    nama: "Lisa Amelia",
    kebun: "Kebun Mangga Manis",
    status: "aktif",
    joinDate: "2023-09-25",
    komoditas: "Mangga",
  },
  {
    id: 10,
    nama: "Doni Pratama",
    kebun: "Perkebunan Teh Hijau",
    status: "nonaktif",
    joinDate: "2023-10-30",
    komoditas: "Teh",
  },
  {
    id: 11,
    nama: "Citra Kirana",
    kebun: "Ladang Jagung Kuning",
    status: "aktif",
    joinDate: "2023-11-11",
    komoditas: "Jagung",
  },
  {
    id: 12,
    nama: "Eko Nugroho",
    kebun: "Sawah Padi Subur",
    status: "aktif",
    joinDate: "2023-12-01",
    komoditas: "Padi",
  },
];

// ==== TABLE BASIC ====
function tableBasic() {
  return {
    rows: window.__demoAnggotaKoperasi ?? [],
    selectedRows: [],
    selectAllRows(checked) {
      this.selectedRows = checked ? this.rows.map((row) => row.id) : [];
    },
  };
}

// ==== TABLE SPECIAL ====
function tableSpecial() {
  return {
    tabulator: null,
    init() {
      this.tabulator = new Tabulator(this.$refs.grid, {
        data: window.__demoAnggotaKoperasi ?? [],
        layout: "fitColumns",
        pagination: true,
        paginationSize: 10,
        columns: [
          {
            title: "",
            formatter: "rowSelection",
            titleFormatter: "rowSelection",
            hozAlign: "center",
            headerSort: false,
            width: 40,
            cssClass: "tabulator-checkbox-column", // custom class for styling
          },
          {
            title: "Nama",
            field: "nama",
            sorter: "string",
            headerFilter: "input",
            cssClass: "tabulator-cell-name", // custom class for styling
          },
          {
            title: "Kebun",
            field: "kebun",
            sorter: "string",
            headerFilter: "input",
            cssClass: "tabulator-cell-kebun", // custom class for styling
          },
          {
            title: "Status",
            field: "status",
            sorter: "string",
            headerFilter: "select",
            headerFilterParams: {
              values: { "": "Semua", aktif: "Aktif", nonaktif: "Nonaktif" },
            },
            formatter: (cell) => {
              const status = cell.getValue();
              return `<span class="px-2 py-0.5 rounded-full text-xs font-bold ${
                status === "aktif"
                  ? "bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400"
                  : "bg-gray-100 text-gray-500 dark:bg-gray-700/50 dark:text-gray-400"
              }">${status}</span>`;
            },
            cssClass: "tabulator-cell-status", // custom class for styling
          },
          {
            title: "Aksi",
            field: "aksi",
            formatter: (cell) => {
              return `
                <button class="text-primary hover:text-primary-mid font-medium text-sm rounded-lg px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" aria-label="Lihat data">Lihat</button>
                <button class="text-gray-400 hover:text-red-500 font-medium text-sm rounded-lg px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" aria-label="Hapus data">Hapus</button>
              `;
            },
            headerSort: false,
            hozAlign: "center",
            width: 150,
            cssClass: "tabulator-cell-aksi", // custom class for styling
          },
        ],
        // Apply custom styling for dark mode compatibility and aesthetics
        headerFilterLiveFilter: true,
        movableColumns: true,
        resizableColumns: true,
        rowFormatter: function (row) {
          if (row.getData().status === "nonaktif") {
            row.getElement().classList.add("tabulator-row-nonaktif");
          }
        },
      });

      // Tom Select for status filter
      if (this.$refs.statusFilter) {
        const statusSelect = new TomSelect(this.$refs.statusFilter, {
          create: false,
          sortField: {
            field: "text",
            direction: "asc",
          },
        });
        statusSelect.on("change", (value) => {
          if (value) {
            this.tabulator.setFilter("status", "=", value);
          } else {
            this.tabulator.clearFilter("status");
          }
        });
      }
    },
    exportCsv() {
      if (typeof Papa !== "undefined") {
        const csv = Papa.unparse(this.tabulator.getData());
        const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
        const a = document.createElement("a");
        a.href = URL.createObjectURL(blob);
        a.download = "data-anggota.csv";
        a.click();
      } else {
        alert("PapaParse library not loaded. Cannot export CSV.");
      }
    },
    exportXlsx() {
      if (typeof XLSX !== "undefined") {
        const ws = XLSX.utils.json_to_sheet(this.tabulator.getData());
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Anggota");
        XLSX.writeFile(wb, "data-anggota.xlsx");
      } else {
        alert("SheetJS library not loaded. Cannot export XLSX.");
      }
    },
  };
}

// ==== TABLE CUSTOM V2 (Laravel-Ready) ====
// Komponen ini dirancang untuk integrasi dengan Laravel:
// - Server-side pagination (struktur JSON Laravel Paginator)
// - Server-side search & sort (query parameter ke endpoint)
// - CSRF token untuk method POST/DELETE
// - Siap dipakai dengan fetch() ke route Laravel
//
// Contoh integrasi Laravel:
//
// routes/web.php:
//   Route::get('/anggota/data', [AnggotaController::class, 'data'])->name('anggota.data');
//   Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
//
// app/Http/Controllers/AnggotaController.php:
//   public function data(Request $request) {
//     $query = Anggota::query();
//     if ($request->search) {
//       $query->where('nama', 'like', "%{$request->search}%")
//             ->orWhere('kebun', 'like', "%{$request->search}%")
//             ->orWhere('komoditas', 'like', "%{$request->search}%");
//     }
//     if ($request->sort_by && $request->sort_dir) {
//       $query->orderBy($request->sort_by, $request->sort_dir);
//     }
//     return response()->json($query->paginate($request->per_page ?? 5));
//   }
//
//   public function destroy(Anggota $anggota) {
//     $anggota->delete();
//     return response()->json(['message' => 'Data berhasil dihapus']);
//   }
//
// resources/views/pages/table-custom-v2.blade.php:
//   <div x-data="tableCustomV2()" x-init="init()">
//     ... (salin markup dari table-custom-v2.html)
//   </div>
function tableCustomV2() {
  return {
    // ===== State =====
    loading: true,
    rows: [],
    query: "",
    searchTimer: null,
    sortBy: "id",
    sortDir: "asc",
    page: 1,
    pageSize: 5,
    selectedRows: [],
    expandedId: null,
    showColumnToggle: false,
    editingCell: null,
    editingValue: "",
    // Delete modal state
    deleteModalOpen: false,
    deleteTargetId: null,
    deleteTargetName: "",
    deleteMode: "single", // 'single' | 'bulk'
    // Toast state
    toastShow: false,
    toastMessage: "",
    toastType: "success",
    toastTimer: null,
    // ===== Server-side pagination metadata (Laravel Paginator) =====
    currentPage: 1,
    lastPage: 1,
    total: 0,
    from: 0,
    to: 0,
    perPage: 5,
    // ===== Konfigurasi endpoint Laravel =====
    // Ganti dengan URL route Laravel Anda, misal: '/anggota/data'
    endpoint: "/api/anggota/data",
    // CSRF token untuk Laravel (dari meta tag atau @csrf)
    csrfToken: document.querySelector('meta[name="csrf-token"]')
      ? document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content")
      : "",
    allColumns: [
      { key: "checkbox", label: "Pilih" },
      { key: "id", label: "ID" },
      { key: "nama", label: "Nama" },
      { key: "kebun", label: "Kebun" },
      { key: "status", label: "Status" },
      { key: "joinDate", label: "Tanggal Gabung" },
      { key: "komoditas", label: "Komoditas" },
      { key: "aksi", label: "Aksi" },
    ],
    visibleCols: {
      checkbox: true,
      id: true,
      nama: true,
      kebun: true,
      status: true,
      joinDate: true,
      komoditas: true,
      aksi: true,
    },

    // ===== Init =====
    init() {
      this.fetchData();
    },

    // ===== Fetch data dari server (Laravel) =====
    // Mengirim request GET ke endpoint dengan query parameter:
    // ?page=1&per_page=5&search=...&sort_by=id&sort_dir=asc
    fetchData() {
      this.loading = true;

      // Build query string untuk Laravel
      const params = new URLSearchParams({
        page: this.page,
        per_page: this.pageSize,
        search: this.query,
        sort_by: this.sortBy,
        sort_dir: this.sortDir,
      });

      // ====== UNCOMMENT untuk koneksi ke Laravel asli ======
      // fetch(`${this.endpoint}?${params.toString()}`, {
      //   headers: {
      //     "Accept": "application/json",
      //     "X-CSRF-TOKEN": this.csrfToken,
      //   },
      // })
      //   .then((res) => res.json())
      //   .then((data) => {
      //     // Struktur JSON Laravel Paginator:
      //     // { data: [...], current_page, last_page, total, from, to, per_page }
      //     this.rows = data.data;
      //     this.currentPage = data.current_page;
      //     this.lastPage = data.last_page;
      //     this.total = data.total;
      //     this.from = data.from;
      //     this.to = data.to;
      //     this.perPage = data.per_page;
      //     this.loading = false;
      //   })
      //   .catch(() => {
      //     this.loading = false;
      //     this.showToast("Gagal memuat data dari server.", "error");
      //   });

      // ====== DEMO: Simulasi respons Laravel Paginator ======
      // Hapus blok ini saat terhubung ke backend Laravel asli.
      setTimeout(() => {
        const allData = window.__demoAnggotaKoperasi ?? [];

        // Server-side search (simulasi query Laravel: WHERE ... LIKE)
        let filtered = allData;
        const q = this.query.toLowerCase();
        if (q) {
          filtered = allData.filter((r) =>
            Object.values(r).some((v) => String(v).toLowerCase().includes(q)),
          );
        }

        // Server-side sort (simulasi query Laravel: ORDER BY)
        const sorted = [...filtered].sort((a, b) => {
          const valA = String(a[this.sortBy]).toLowerCase();
          const valB = String(b[this.sortBy]).toLowerCase();
          if (valA < valB) return this.sortDir === "asc" ? -1 : 1;
          if (valA > valB) return this.sortDir === "asc" ? 1 : -1;
          return 0;
        });

        // Server-side pagination (simulasi Laravel paginate())
        const total = sorted.length;
        const lastPage = Math.max(1, Math.ceil(total / this.pageSize));
        if (this.page > lastPage) this.page = lastPage;
        const start = (this.page - 1) * this.pageSize;
        const pagedData = sorted.slice(start, start + this.pageSize);

        // Struktur respons identik dengan Laravel Paginator
        const response = {
          data: pagedData,
          current_page: this.page,
          last_page: lastPage,
          total: total,
          from: total === 0 ? 0 : start + 1,
          to: Math.min(start + this.pageSize, total),
          per_page: this.pageSize,
        };

        this.rows = response.data;
        this.currentPage = response.current_page;
        this.lastPage = response.last_page;
        this.total = response.total;
        this.from = response.from;
        this.to = response.to;
        this.perPage = response.per_page;
        this.loading = false;
      }, 300);
    },

    // ===== Search dengan debounce (server-side) =====
    onSearch() {
      clearTimeout(this.searchTimer);
      this.searchTimer = setTimeout(() => {
        this.page = 1;
        this.fetchData();
      }, 400);
    },

    // ===== Sort (server-side) =====
    toggleSort(key) {
      if (key === "aksi") return;
      if (this.sortBy === key) {
        this.sortDir = this.sortDir === "asc" ? "desc" : "asc";
      } else {
        this.sortBy = key;
        this.sortDir = "asc";
      }
      this.page = 1;
      this.fetchData();
    },

    // ===== Pagination (server-side) =====
    goToPage(p) {
      if (p < 1 || p > this.lastPage || p === this.page) return;
      this.page = p;
      this.fetchData();
    },

    nextPage() {
      this.goToPage(this.page + 1);
    },

    prevPage() {
      this.goToPage(this.page - 1);
    },

    changePageSize() {
      this.page = 1;
      this.fetchData();
    },

    // ===== Kolom =====
    get displayedColumns() {
      return this.allColumns.filter(
        (col) => this.visibleCols[col.key] && col.key !== "checkbox",
      );
    },

    // ===== Seleksi =====
    selectAllRows(checked) {
      this.selectedRows = checked ? this.rows.map((row) => row.id) : [];
    },

    toggleExpand(rowId) {
      this.expandedId = this.expandedId === rowId ? null : rowId;
    },

    // ===== Aksi baris =====
    viewDetail(rowId) {
      alert("Detail untuk ID: " + rowId);
    },

    editRow(rowId) {
      alert("Edit row ID: " + rowId);
    },

    duplicateRow(rowId) {
      const row = this.rows.find((r) => r.id === rowId);
      if (row) {
        this.rows.push({ ...row, id: Date.now() });
        this.total++;
        this.showToast(`Data "${row.nama}" berhasil diduplikasi.`, "success");
      }
    },

    // ===== Edit inline =====
    editCell(rowId, colKey, initialValue) {
      if (colKey === "aksi" || colKey === "checkbox" || colKey === "id") return;
      this.editingCell = `${rowId}-${colKey}`;
      this.editingValue = initialValue;
      this.$nextTick(() => {
        const input = this.$el.querySelector(`input[x-model="editingValue"]`);
        if (input) input.focus();
      });
    },

    saveCell(rowId, colKey) {
      const rowIndex = this.rows.findIndex((r) => r.id === rowId);
      if (rowIndex !== -1) {
        this.rows[rowIndex][colKey] = this.editingValue;
        this.rows = [...this.rows];
        this.showToast("Perubahan berhasil disimpan.", "success");
      }
      this.editingCell = null;
      this.editingValue = "";
    },

    // ===== Delete dengan modal konfirmasi =====
    openDeleteModal(rowId) {
      const row = this.rows.find((r) => r.id === rowId);
      this.deleteTargetId = rowId;
      this.deleteTargetName = row ? row.nama : "";
      this.deleteMode = "single";
      this.deleteModalOpen = true;
    },

    openDeleteSelectedModal() {
      this.deleteTargetId = null;
      this.deleteTargetName = "";
      this.deleteMode = "bulk";
      this.deleteModalOpen = true;
    },

    closeDeleteModal() {
      this.deleteModalOpen = false;
      this.deleteTargetId = null;
      this.deleteTargetName = "";
    },

    confirmDelete() {
      if (this.deleteMode === "bulk") {
        const count = this.selectedRows.length;
        this.rows = this.rows.filter(
          (row) => !this.selectedRows.includes(row.id),
        );
        this.selectedRows = [];
        this.total -= count;
        this.closeDeleteModal();
        this.showToast(
          `Berhasil menghapus ${count} baris data terpilih.`,
          "success",
        );
        this.fetchData();
      } else {
        const row = this.rows.find((r) => r.id === this.deleteTargetId);
        this.rows = this.rows.filter((r) => r.id !== this.deleteTargetId);
        this.total--;
        this.closeDeleteModal();
        this.showToast(
          `Data "${row ? row.nama : ""}" berhasil dihapus.`,
          "success",
        );
        this.fetchData();
      }
    },

    deleteSingleRow(rowId) {
      this.openDeleteModal(rowId);
    },

    deleteSelected() {
      this.openDeleteSelectedModal();
    },

    // ===== Toast =====
    showToast(message, type = "success") {
      this.toastMessage = message;
      this.toastType = type;
      this.toastShow = true;
      clearTimeout(this.toastTimer);
      this.toastTimer = setTimeout(() => {
        this.toastShow = false;
      }, 3000);
    },

    // ===== Export CSV =====
    exportSelectedCsv() {
      const selectedData = this.rows.filter((row) =>
        this.selectedRows.includes(row.id),
      );
      if (selectedData.length === 0) {
        alert("Tidak ada data terpilih untuk diekspor.");
        return;
      }

      const headers = Object.keys(selectedData[0]).join(",");
      const csvRows = selectedData.map((row) =>
        Object.values(row)
          .map((v) => `"${String(v).replace(/"/g, '""')}"`)
          .join(","),
      );
      const csvString = [headers, ...csvRows].join("\n");

      const blob = new Blob([csvString], { type: "text/csv;charset=utf-8;" });
      const a = document.createElement("a");
      a.href = URL.createObjectURL(blob);
      a.download = "data-anggota-terpilih.csv";
      a.click();
    },

    exportAllCsv() {
      const allData = window.__demoAnggotaKoperasi ?? [];
      const headers = Object.keys(allData[0]).join(",");
      const csvRows = allData.map((row) =>
        Object.values(row)
          .map((v) => `"${String(v).replace(/"/g, '""')}"`)
          .join(","),
      );
      const csvString = [headers, ...csvRows].join("\n");

      const blob = new Blob([csvString], { type: "text/csv;charset=utf-8;" });
      const a = document.createElement("a");
      a.href = URL.createObjectURL(blob);
      a.download = "data-anggota.csv";
      a.click();
    },
  };
}

// ==== TABLE CUSTOM ====
function tableCustom() {
  return {
    loading: true,
    query: "",
    sortBy: "id", // Default sort by id
    sortDir: "asc",
    page: 1,
    pageSize: 5,
    selectedRows: [],
    expandedId: null,
    showColumnToggle: false,
    editingCell: null,
    editingValue: "",
    // Delete modal state
    deleteModalOpen: false,
    deleteTargetId: null,
    deleteTargetName: "",
    deleteMode: "single", // 'single' | 'bulk'
    // Toast state
    toastShow: false,
    toastMessage: "",
    toastType: "success",
    toastTimer: null,
    allColumns: [
      { key: "checkbox", label: "Pilih" },
      { key: "id", label: "ID" },
      { key: "nama", label: "Nama" },
      { key: "kebun", label: "Kebun" },
      { key: "status", label: "Status" },
      { key: "joinDate", label: "Tanggal Gabung" },
      { key: "komoditas", label: "Komoditas" },
      { key: "aksi", label: "Aksi" },
    ],
    visibleCols: {
      checkbox: true,
      id: true,
      nama: true,
      kebun: true,
      status: true,
      joinDate: true,
      komoditas: true,
      aksi: true,
    },
    rows: [],

    init() {
      // Simulate data loading
      setTimeout(() => {
        this.rows = window.__demoAnggotaKoperasi ?? [];
        this.loading = false;
      }, 500); // Simulate network delay
    },

    get displayedColumns() {
      return this.allColumns.filter(
        (col) => this.visibleCols[col.key] && col.key !== "checkbox",
      );
    },

    toggleSort(key) {
      if (key === "aksi") return; // Do not sort action column
      if (this.sortBy === key) {
        this.sortDir = this.sortDir === "asc" ? "desc" : "asc";
      } else {
        this.sortBy = key;
        this.sortDir = "asc";
      }
      this.page = 1;
    },

    get filteredRows() {
      const q = this.query.toLowerCase();
      if (!q) return this.rows;
      return this.rows.filter((r) =>
        Object.values(r).some((v) => String(v).toLowerCase().includes(q)),
      );
    },

    get sortedRows() {
      const sortableRows = [...this.filteredRows];
      if (!this.sortBy) return sortableRows;

      return sortableRows.sort((a, b) => {
        const valA = String(a[this.sortBy]).toLowerCase();
        const valB = String(b[this.sortBy]).toLowerCase();

        if (valA < valB) return this.sortDir === "asc" ? -1 : 1;
        if (valA > valB) return this.sortDir === "asc" ? 1 : -1;
        return 0;
      });
    },

    get totalPages() {
      return Math.max(1, Math.ceil(this.sortedRows.length / this.pageSize));
    },

    get pagedRows() {
      const start = (this.page - 1) * this.pageSize;
      return this.sortedRows.slice(start, start + this.pageSize);
    },

    selectAllRows(checked) {
      this.selectedRows = checked ? this.rows.map((row) => row.id) : [];
    },

    toggleExpand(rowId) {
      this.expandedId = this.expandedId === rowId ? null : rowId;
    },

    viewDetail(rowId) {
      alert("Detail untuk ID: " + rowId);
    },

    editRow(rowId) {
      alert("Edit row ID: " + rowId);
    },

    duplicateRow(rowId) {
      const row = this.rows.find((r) => r.id === rowId);
      if (row) {
        this.rows.push({ ...row, id: Date.now() });
      }
    },

    openDeleteModal(rowId) {
      const row = this.rows.find((r) => r.id === rowId);
      this.deleteTargetId = rowId;
      this.deleteTargetName = row ? row.nama : "";
      this.deleteMode = "single";
      this.deleteModalOpen = true;
    },

    openDeleteSelectedModal() {
      this.deleteTargetId = null;
      this.deleteTargetName = "";
      this.deleteMode = "bulk";
      this.deleteModalOpen = true;
    },

    closeDeleteModal() {
      this.deleteModalOpen = false;
      this.deleteTargetId = null;
      this.deleteTargetName = "";
    },

    confirmDelete() {
      if (this.deleteMode === "bulk") {
        const count = this.selectedRows.length;
        this.rows = this.rows.filter(
          (row) => !this.selectedRows.includes(row.id),
        );
        this.selectedRows = [];
        this.page = 1; // Reset to first page after deletion
        this.closeDeleteModal();
        this.showToast(
          `Berhasil menghapus ${count} baris data terpilih.`,
          "success",
        );
      } else {
        const row = this.rows.find((r) => r.id === this.deleteTargetId);
        this.rows = this.rows.filter((r) => r.id !== this.deleteTargetId);
        this.closeDeleteModal();
        this.showToast(
          `Data "${row ? row.nama : ""}" berhasil dihapus.`,
          "success",
        );
      }
    },

    showToast(message, type = "success") {
      this.toastMessage = message;
      this.toastType = type;
      this.toastShow = true;
      clearTimeout(this.toastTimer);
      this.toastTimer = setTimeout(() => {
        this.toastShow = false;
      }, 3000);
    },

    deleteSingleRow(rowId) {
      this.openDeleteModal(rowId);
    },

    editCell(rowId, colKey, initialValue) {
      if (colKey === "aksi" || colKey === "checkbox" || colKey === "id") return;
      this.editingCell = `${rowId}-${colKey}`;
      this.editingValue = initialValue;
      this.$nextTick(() => {
        const input = this.$el.querySelector(`input[x-model="editingValue"]`);
        if (input) input.focus();
      });
    },

    saveCell(rowId, colKey) {
      const rowIndex = this.rows.findIndex((r) => r.id === rowId);
      if (rowIndex !== -1) {
        this.rows[rowIndex][colKey] = this.editingValue;
        this.rows = [...this.rows];
      }
      this.editingCell = null;
      this.editingValue = "";
    },

    deleteSelected() {
      this.openDeleteSelectedModal();
    },

    exportSelectedCsv() {
      const selectedData = this.rows.filter((row) =>
        this.selectedRows.includes(row.id),
      );
      if (selectedData.length === 0) {
        alert("Tidak ada data terpilih untuk diekspor.");
        return;
      }

      const headers = Object.keys(selectedData[0]).join(",");
      const csvRows = selectedData.map((row) =>
        Object.values(row)
          .map((v) => `"${String(v).replace(/"/g, '""')}"`)
          .join(","),
      );
      const csvString = [headers, ...csvRows].join("\n");

      const blob = new Blob([csvString], { type: "text/csv;charset=utf-8;" });
      const a = document.createElement("a");
      a.href = URL.createObjectURL(blob);
      a.download = "data-anggota-terpilih.csv";
      a.click();
    },
  };
}
