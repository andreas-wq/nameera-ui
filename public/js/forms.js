/* ============================================================
 * Nameera UI - Forms.js
 * Logika Alpine.js untuk halaman Form Special & Form Custom
 * ============================================================ */

/* ---------- Form Special ---------- */
function formSpecial() {
  return {
    // Flatpickr
    flatpickrDate: null,
    flatpickrTime: null,

    // IMask
    imaskTelepon: null,
    imaskHarga: null,

    // Choices.js
    choicesWilayah: null,

    // Quill
    quillCatatan: null,

    // FilePond
    pond: null,

    init() {
      this.initFlatpickr();
      this.initIMask();
      this.initChoices();
      this.initQuill();
      this.initFilePond();
    },

    initFlatpickr() {
      if (typeof flatpickr === "undefined") return;

      const idLocale =
        flatpickr.l10ns && flatpickr.l10ns.id ? flatpickr.l10ns.id : undefined;

      this.flatpickrDate = flatpickr(this.$refs.harvestDate, {
        mode: "range",
        dateFormat: "d M Y",
        locale: idLocale,
        minDate: "today",
      });

      this.flatpickrTime = flatpickr(this.$refs.harvestTime, {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultDate: "07:00",
      });
    },

    initIMask() {
      if (typeof IMask === "undefined") return;

      this.imaskTelepon = IMask(this.$refs.telepon, {
        mask: "+62 8##-####-####",
      });

      this.imaskHarga = IMask(this.$refs.harga, {
        mask: "Rp num",
        blocks: {
          num: {
            mask: Number,
            thousandsSeparator: ".",
            scale: 0,
            padFractionalZeros: false,
            min: 0,
            max: 1000000000,
          },
        },
      });
    },

    initChoices() {
      if (typeof Choices === "undefined") return;

      this.choicesWilayah = new Choices(this.$refs.wilayah, {
        removeItemButton: true,
        placeholder: true,
        placeholderValue: "Pilih wilayah distribusi...",
        searchPlaceholderValue: "Cari wilayah...",
        itemSelectText: "Tekan untuk memilih",
        noResultsText: "Tidak ditemukan",
        noChoicesText: "Tidak ada pilihan",
        maxItemCount: 7,
      });
    },

    initQuill() {
      if (typeof Quill === "undefined") return;

      this.quillCatatan = new Quill(this.$refs.catatan, {
        theme: "snow",
        placeholder: "Tulis catatan produksi di sini...",
        modules: {
          toolbar: [
            [{ header: [1, 2, 3, false] }],
            ["bold", "italic", "underline", "strike"],
            [{ list: "ordered" }, { list: "bullet" }],
            [{ color: [] }, { background: [] }],
            ["link", "blockquote", "code-block"],
            ["clean"],
          ],
        },
      });
    },

    initFilePond() {
      if (typeof FilePond === "undefined") return;

      FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
      );

      this.pond = FilePond.create(this.$refs.sertifikat, {
        labelIdle:
          'Seret & lepas file di sini atau <span class="filepond--label-action">Pilih file</span>',
        acceptedFileTypes: ["image/*", "application/pdf"],
        maxFileSize: "5MB",
        allowMultiple: true,
        allowReorder: true,
        storeAsFile: true,
      });
    },
  };
}

/* ---------- Form Custom ---------- */
function formCustom() {
  return {
    totalSteps: 3,
    step: 1,
    stepLabels: ["Data Diri", "Data Kebun", "Konfirmasi"],

    data: {
      nama: "",
      nik: "",
      kebun: "",
      komoditas: "",
    },

    rating: 0,
    hoverRating: 0,

    colors: ["#639922", "#f59e0b", "#ef4444", "#3b82f6", "#8b5cf6", "#ec4899"],
    selectedColor: "#639922",

    tagify: null,

    init() {
      this.initTagify();
    },

    initTagify() {
      if (typeof Tagify === "undefined") return;

      this.tagify = new Tagify(this.$refs.tagsInput, {
        placeholder: "Tambah label lalu tekan Enter",
        delimiters: ",| ",
        pattern: /^.{1,30}$/,
        maxTags: 10,
        dropdown: {
          enabled: 0,
          classname: "tags-lookup",
        },
      });

      // Ganti input asli dengan Tagify custom wrapper
      this.tagify.DOM.input.classList.add(
        "w-full",
        "rounded-xl",
        "border",
        "border-gray-200",
        "dark:border-gray-700",
        "bg-gray-50",
        "dark:bg-gray-900",
        "px-4",
        "py-2.5",
        "text-sm",
        "font-medium",
        "text-dark",
        "dark:text-gray-100",
        "placeholder:text-gray-400",
        "placeholder:font-normal",
        "focus:outline-none",
        "focus:ring-4",
        "focus:ring-primary/10",
        "focus:border-primary",
        "transition-all",
      );
    },

    nextStep() {
      if (this.step < this.totalSteps) this.step++;
    },

    prevStep() {
      if (this.step > 1) this.step--;
    },
  };
}

/* ---------- File Uploader Kustom (Alpine Native) ---------- */
function fileUploader() {
  return {
    files: [],
    dragging: false,
    counter: 0,

    handleFiles(fileList) {
      const arr = Array.from(fileList);
      arr.forEach((file) => {
        const validTypes = ["image/", "application/pdf"];
        const isValid = validTypes.some((t) => file.type.startsWith(t));
        if (!isValid) return;

        this.files.push({
          id: ++this.counter,
          name: file.name,
          size: file.size,
          type: file.type,
          url: URL.createObjectURL(file),
        });
      });
    },

    formatSize(bytes) {
      if (bytes < 1024) return bytes + " B";
      if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + " KB";
      return (bytes / (1024 * 1024)).toFixed(1) + " MB";
    },

    isImage(file) {
      return file.type.startsWith("image/");
    },

    removeFile(id) {
      const file = this.files.find((f) => f.id === id);
      if (file && file.url) {
        URL.revokeObjectURL(file.url);
      }
      this.files = this.files.filter((f) => f.id !== id);
    },

    clearAll() {
      this.files.forEach((file) => {
        if (file.url) URL.revokeObjectURL(file.url);
      });
      this.files = [];
    },

    init() {
      // Revoke semua URL saat Alpine component di-unmount (cleanup)
      const cleanup = () => {
        this.files.forEach((file) => {
          if (file.url) URL.revokeObjectURL(file.url);
        });
      };

      // Attach cleanup ke event sebelum component di-unmount
      // (Alpine.js v3 mendeteksi $watch atau $destroy)
      if (this.$el && this.$el.parentNode) {
        // Gunakan Alpine built-in jika tersedia
        if (typeof this.$destroy === "function") {
          this.$destroy(() => cleanup());
        }
      }

      return cleanup;
    },
  };
}
