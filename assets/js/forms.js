// Komponen Alpine untuk halaman "Form Special"
// Menginisialisasi: Flatpickr, Choices.js, Quill, IMask, FilePond
function formSpecial() {
  return {
    _initialized: false,

    init() {
      // Elemen di dalam x-show hanya di-hide (display:none), jadi tetap ada
      // di DOM saat Alpine memanggil init() — aman untuk plugin di bawah.
      if (this._initialized) return;
      this._initialized = true;

      // Rentang tanggal panen
      flatpickr(this.$refs.harvestDate, {
        mode: "range",
        dateFormat: "d M Y",
        locale: "id",
      });

      // Jam penjemputan
      flatpickr(this.$refs.harvestTime, {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        locale: "id",
      });

      // Wilayah distribusi (select pencarian multi-pilih)
      new Choices(this.$refs.wilayah, {
        removeItemButton: true,
        placeholder: true,
        placeholderValue: "Pilih wilayah distribusi...",
        searchPlaceholderValue: "Cari wilayah...",
        shouldSort: false,
      });

      // Catatan produksi (rich text editor)
      new Quill(this.$refs.catatan, {
        theme: "snow",
        placeholder: "Tulis catatan produksi di sini...",
        modules: {
          toolbar: [
            ["bold", "italic", "underline"],
            [{ list: "ordered" }, { list: "bullet" }],
            ["link", "clean"],
          ],
        },
      });

      // No. telepon (mask format Indonesia)
      IMask(this.$refs.telepon, {
        mask: "+62 000-0000-0000",
      });

      // Harga jual (mask mata uang Rupiah)
      IMask(this.$refs.harga, {
        mask: "Rp num",
        blocks: {
          num: {
            mask: Number,
            thousandsSeparator: ".",
            radix: ",",
            scale: 0,
          },
        },
      });

      // Upload dokumen sertifikat (drag & drop, preview gambar, validasi tipe & ukuran otomatis)
      FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
      );
      FilePond.create(this.$refs.sertifikat, {
        labelIdle:
          'Seret &amp; lepas dokumen atau <span class="filepond--label-action">Jelajahi</span>',
        acceptedFileTypes: ["image/*", "application/pdf"],
        labelFileTypeNotAllowed: "Tipe file tidak didukung",
        fileValidateTypeLabelExpectedTypes: "Hanya gambar (JPG/PNG) atau PDF",
        maxFileSize: "5MB",
        labelMaxFileSizeExceeded: "File terlalu besar",
        labelMaxFileSize: "Ukuran maksimal {filesize}",
        maxFiles: 3,
        allowMultiple: true,
        imagePreviewHeight: 140,
        styleItemPanelAspectRatio: 1,
        credits: false,
      });
    },
  };
}

// Komponen Alpine untuk halaman "Form Custom"
// Berisi: wizard multi-langkah, rating bintang, pemilih warna, dan Tagify
function formCustom() {
  return {
    _initialized: false,

    // Wizard
    step: 1,
    totalSteps: 3,
    stepLabels: ["Data Diri", "Data Kebun", "Konfirmasi"],
    data: { nama: "", nik: "", kebun: "", komoditas: "" },

    // Rating
    rating: 0,
    hoverRating: 0,

    // Warna label
    colors: ["#3b6d11", "#639922", "#ba7517", "#1a2e1a", "#2563eb", "#dc2626"],
    selectedColor: "#3b6d11",

    init() {
      if (this._initialized) return;
      this._initialized = true;

      // Input tag untuk label produk
      new Tagify(this.$refs.tagsInput, {
        whitelist: [
          "Organik",
          "Premium",
          "Panen Baru",
          "Grade A",
          "Ekspor",
          "Lokal",
        ],
        dropdown: { enabled: 0, closeOnSelect: true },
      });
    },

    nextStep() {
      if (this.step < this.totalSteps) this.step++;
    },
    prevStep() {
      if (this.step > 1) this.step--;
    },
  };
}

// Komponen upload kustom (drag & drop) untuk halaman "Form Custom"
// Alpine.js + Tailwind, ditambah browser-image-compression untuk
// mengecilkan ukuran gambar (foto kebun dari HP biasanya besar) sebelum "upload".
// Fitur: drag & drop, preview thumbnail, kompresi gambar otomatis,
// simulasi progress upload, validasi tipe & ukuran file.
function fileUploader() {
  return {
    dragging: false,
    files: [],
    error: "",
    _nextId: 1,
    maxSizeMB: 5,
    allowedTypes: /^image\/|^application\/pdf$/,

    // Target kompresi: lebar/tinggi maksimal 1920px, target ukuran ~1MB
    compressionOptions: {
      maxSizeMB: 1,
      maxWidthOrHeight: 1920,
      useWebWorker: true,
      initialQuality: 0.8,
    },

    get totalSizeLabel() {
      const totalBytes = this.files.reduce((sum, f) => sum + f.size, 0);
      return this.formatSize(totalBytes);
    },

    formatSize(bytes) {
      if (bytes < 1024) return bytes + " B";
      if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(0) + " KB";
      return (bytes / (1024 * 1024)).toFixed(1) + " MB";
    },

    async handleFiles(fileList) {
      this.error = "";
      for (const file of Array.from(fileList)) {
        if (!this.allowedTypes.test(file.type)) {
          this.error = `${file.name}: tipe file tidak didukung (hanya gambar/PDF).`;
          continue;
        }
        if (file.size > this.maxSizeMB * 1024 * 1024) {
          this.error = `${file.name}: ukuran melebihi ${this.maxSizeMB}MB.`;
          continue;
        }

        const id = this._nextId++;
        const isImage = file.type.startsWith("image/");
        const item = {
          id,
          name: file.name,
          size: file.size,
          sizeLabel: this.formatSize(file.size),
          ext: (file.name.split(".").pop() || "").slice(0, 4),
          progress: 0,
          previewUrl: isImage ? URL.createObjectURL(file) : null,
          compressing: isImage,
          savedPercent: 0,
        };
        this.files.push(item);

        if (isImage && window.imageCompression) {
          this.compressAndUpload(id, file);
        } else {
          this.simulateUpload(id);
        }
      }
    },

    async compressAndUpload(id, originalFile) {
      const item = this.files.find((f) => f.id === id);
      if (!item) return;
      try {
        const compressedFile = await imageCompression(
          originalFile,
          this.compressionOptions,
        );

        const target = this.files.find((f) => f.id === id);
        if (!target) return; // dihapus user saat proses kompresi

        // Ganti preview ke hasil kompresi & catat penghematan ukuran
        URL.revokeObjectURL(target.previewUrl);
        target.previewUrl = URL.createObjectURL(compressedFile);
        target.savedPercent = Math.max(
          0,
          Math.round((1 - compressedFile.size / originalFile.size) * 100),
        );
        target.size = compressedFile.size;
        target.sizeLabel = this.formatSize(compressedFile.size);
        target.compressing = false;
      } catch (e) {
        // Kompresi gagal (mis. format tidak didukung) — lanjut pakai file asli
        const target = this.files.find((f) => f.id === id);
        if (target) target.compressing = false;
      }
      this.simulateUpload(id);
    },

    // Simulasi progress upload (tidak ada backend di starter kit ini)
    simulateUpload(id) {
      const tick = () => {
        const item = this.files.find((f) => f.id === id);
        if (!item) return;
        item.progress = Math.min(100, item.progress + Math.random() * 25 + 12);
        if (item.progress < 100) setTimeout(tick, 150);
      };
      setTimeout(tick, 150);
    },

    removeFile(index) {
      const item = this.files[index];
      if (item && item.previewUrl) URL.revokeObjectURL(item.previewUrl);
      this.files.splice(index, 1);
    },
  };
}
