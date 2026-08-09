/* ============================================================
   NAMEERA UI — FORM KIT
   Semua fungsi Alpine untuk komponen form (Basic/Special/Custom)
   Dipisah rapi per komponen dengan penanda // ===== [komponen]
   ============================================================ */

// ===== FORM SPECIAL: formSpecial =====
// Plugin: Flatpickr, Tom Select, IMask, Quill, FilePond + browser-image-compression,
// Signature Pad (plugin), SortableJS, PristineJS, intl-tel-input
function formSpecial() {
  return {
    _initialized: false,

    init() {
      if (this._initialized) return;
      this._initialized = true;

      this._initFlatpickr();
      this._initTomSelect();
      this._initIMask();
      this._initQuill();
      this._initFilePond();
      this._initIntlTelInput();
      this._initSignaturePad();
    },

    /* ---------- Flatpickr (tanggal & jam) ---------- */
    _initFlatpickr() {
      if (!window.flatpickr) return;
      if (this.$refs.harvestDate) {
        flatpickr(this.$refs.harvestDate, {
          mode: "range",
          dateFormat: "d M Y",
          locale: "id",
        });
      }
      if (this.$refs.harvestTime) {
        flatpickr(this.$refs.harvestTime, {
          enableTime: true,
          noCalendar: true,
          dateFormat: "H:i",
          time_24hr: true,
          locale: "id",
        });
      }
    },

    /* ---------- Tom Select (multi select) ---------- */
    _initTomSelect() {
      if (!window.TomSelect || !this.$refs.wilayah) return;
      this.tomWilayah = new TomSelect(this.$refs.wilayah, {
        plugins: ["remove_button"],
        placeholder: "Pilih wilayah distribusi...",
        create: false,
        sortField: { field: "text", direction: "asc" },
      });
    },

    /* ---------- IMask (telepon & rupiah) ---------- */
    _initIMask() {
      if (!window.IMask) return;
      if (this.$refs.telepon) {
        IMask(this.$refs.telepon, { mask: "+62 000-0000-0000" });
      }
      if (this.$refs.harga) {
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
      }
    },

    /* ---------- Quill (rich text) ---------- */
    _initQuill() {
      if (!window.Quill || !this.$refs.catatan) return;
      this.quill = new Quill(this.$refs.catatan, {
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
    },

    /* ---------- FilePond + browser-image-compression ----------
       File yang berupa gambar DIKOMPRESI dahulu (max ~1MB, 1920px)
       sebelum masuk antrian FilePond, supaya hemat bandwidth server. */
    _initFilePond() {
      if (!window.FilePond || !this.$refs.sertifikat) return;
      FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType,
        FilePondPluginFileValidateSize,
      );

      FilePond.create(this.$refs.sertifikat, {
        labelIdle:
          'Seret & lepas dokumen atau <span class="filepond--label-action">Jelajahi</span>',
        acceptedFileTypes: ["image/*", "application/pdf"],
        labelFileTypeNotAllowed: "Tipe file tidak didukung",
        fileValidateTypeLabelExpectedTypes: "Hanya gambar (JPG/PNG) atau PDF",
        maxFileSize: "5MB",
        maxFiles: 5,
        allowMultiple: true,
        imagePreviewHeight: 140,
        styleItemPanelAspectRatio: 1,
        credits: false,

        // Ganti file asli dengan versi terkompresi SEBELUM masuk antrian.
        beforeAddFile: (fileItem) => {
          if (!fileItem.file.type?.startsWith("image/")) return true;
          if (!window.imageCompression) return true; // fallback tetap bisa upload

          return imageCompression(fileItem.file, {
            maxSizeMB: 1,
            maxWidthOrHeight: 1920,
            useWebWorker: true,
            initialQuality: 0.8,
          })
            .then((compressed) => {
              const name = fileItem.file.name.replace(
                /(\.[\w]+)$/i,
                "-kompresi$1",
              );
              return new File([compressed], name, {
                type: compressed.type || "image/jpeg",
              });
            })
            .catch(() => true); // kalau gagal, pakai file asli
        },
      });
    },

    /* ---------- intl-tel-input (nomor HP internasional) ---------- */
    _initIntlTelInput() {
      if (!window.intlTelInput || !this.$refs.telpIntl) return;
      this.intl = intlTelInput(this.$refs.telpIntl, {
        initialCountry: "id",
        preferredCountries: ["id", "my", "sg"],
        utilsScript:
          "https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/utils.js",
      });
    },

    /* ---------- Signature Pad (plugin) ----------
       Canvas dibuat presisi dengan DPR supaya goresan sesuai posisi mouse. */
    _initSignaturePad() {
      const canvas = this.$refs.signaturePlugin;
      if (!canvas || !window.SignaturePad) return;

      this._resizePluginCanvas();
      this._registerPluginCanvasResize();

      this.signaturePluginPad = new SignaturePad(canvas, {
        backgroundColor: "rgba(255,255,255,0)",
        penColor: "#1a2e1a",
        minWidth: 1,
        maxWidth: 2.5,
      });
    },

    _resizePluginCanvas() {
      const canvas = this.$refs.signaturePlugin;
      if (!canvas) return;
      const rect = canvas.getBoundingClientRect();
      const ratio = Math.max(window.devicePixelRatio || 1, 1);
      canvas.width = rect.width * ratio;
      canvas.height = rect.height * ratio;
      canvas.getContext("2d").scale(ratio, ratio);
    },

    _registerPluginCanvasResize() {
      let timer;
      window.addEventListener("resize", () => {
        clearTimeout(timer);
        timer = setTimeout(() => {
          if (!this.signaturePluginPad || this.signaturePluginPad.isEmpty()) {
            this._resizePluginCanvas();
          } else {
            const data = this.signaturePluginPad.toDataURL();
            this._resizePluginCanvas();
            this.signaturePluginPad.fromData(data);
          }
        }, 150);
      });
    },

    signaturePluginClear() {
      this.signaturePluginPad?.clear();
    },

    signaturePluginSave() {
      if (!this.signaturePluginPad || this.signaturePluginPad.isEmpty()) return;
      const dataUrl = this.signaturePluginPad.toDataURL("image/png");
      this.$refs.signaturePluginValue.value = dataUrl;
      this.$refs.signaturePluginPreview.src = dataUrl;
      this.$refs.signaturePluginPreview.classList.remove("hidden");
    },

    signaturePluginDownload() {
      if (!this.signaturePluginPad || this.signaturePluginPad.isEmpty()) return;
      const a = document.createElement("a");
      a.href = this.signaturePluginPad.toDataURL("image/png");
      a.download = "tanda-tangan.png";
      a.click();
    },

    /* ---------- Form Validation (PristineJS) ---------- */
    _pristine: null,

    initValidation() {
      const form = this.$refs.pristineForm;
      if (!form || !window.Pristine) return;
      this._pristine = new Pristine(form, {
        classTo: "pristine-group",
        errorClass: "has-error",
        successClass: "has-success",
        errorTextParent: "pristine-group",
        errorTextTag: "p",
        errorTextClass: "text-xs text-red-500 mt-1",
      });
    },

    validateForm(e) {
      e?.preventDefault();
      if (this._pristine?.validate()) {
        this.$refs.successMessage.classList.remove("hidden");
        setTimeout(
          () => this.$refs.successMessage.classList.add("hidden"),
          3000,
        );
      }
    },

    /* ---------- SortableJS (drag-reorder) ---------- */
    _initSortable() {
      if (!window.Sortable || !this.$refs.sortableList) return;
      Sortable.create(this.$refs.sortableList, {
        animation: 150,
        handle: ".sortable-handle",
        ghostClass: "opacity-50 bg-primary-bg",
        chosenClass: "bg-primary-bg",
        dragClass: "shadow-lg",
      });
    },

    deleteSortable(id) {
      this.sortableItems = this.sortableItems.filter((i) => i.id !== id);
    },
  };
}

// ===== [ SPECIAL: PristineJS — data sortable & opsi dinamis ] =====
// (Opsi & list default disimpan di x-data masing-masing komponen)

// ===== [ SPECIAL: dragSortable — urutan dokumen upload ] =====
function dragSortable() {
  return {
    items: [
      { id: 1, label: "KTP Asli", type: "image/jpeg" },
      { id: 2, label: "KK (Kartu Keluarga)", type: "image/jpeg" },
      { id: 3, label: "Sertifikat Tanah", type: "application/pdf" },
      { id: 4, label: "Izin Usaha (NIB)", type: "application/pdf" },
    ],

    init() {
      this._sortableCreated = !this.$refs.sortableList;
      if (this.$refs.sortableList && window.Sortable) {
        new Sortable(this.$refs.sortableList, {
          animation: 150,
          handle: ".sortable-handle",
          ghostClass: "opacity-40",
          chosenClass: "bg-primary/10",
        });
      }
    },

    remove(id) {
      this.items = this.items.filter((i) => i.id !== id);
    },
  };
}

// ===== [ SPECIAL: validasi Custom Label jadi badge ] =====

// ===== [ CUSTOM: formCustom ] =====
// Wizard multi-langkah + validasi per-step, rating, warna, emoji survey,
// input tags (Tagify), combobox multiset, currency formatter
function formCustom() {
  return {
    _initialized: false,

    /* Wizard dengan validasi per-step */
    step: 1,
    totalSteps: 3,
    stepLabels: ["Data Diri", "Data Kebun", "Konfirmasi"],
    data: { nama: "", nik: "", kebun: "", komoditas: "" },

    /* Rating */
    rating: 0,
    hoverRating: 0,

    /* Emoji mood */
    emojis: ["😀", "🙂", "😐", "🙁", "😞"],
    mood: 0,
    moodHover: 0,

    /* Warna label */
    colors: ["#3b6d11", "#639922", "#ba7517", "#1a2e1a", "#2563eb", "#dc2626"],
    selectedColor: "#3b6d11",

    /* Combobox */
    comboboxOpen: false,
    comboboxIndex: 0,
    comboboxData: [
      "Manggis",
      "Nanas",
      "Pisang Cavendish",
      "Jeruk Pamelo",
      "Alpukat",
      "Durian",
      "Salak",
      "Kopi Arabica",
    ],
    get comboboxFiltered() {
      const q = (this.comboboxQuery || "").toLowerCase();
      if (!q) return this.comboboxData;
      return this.comboboxData.filter((d) => d.toLowerCase().includes(q));
    },

    /* Rupiah formatter */
    rawNumber: 1250000,

    /* Provinsi → Kabupaten */
    provinsi: "",
    kabupaten: "",
    dataWilayah: {
      "Jawa Barat": ["Bandung", "Bogor", "Garut", "Tasikmalaya"],
      "Jawa Timur": ["Malang", "Banyuwangi", "Jember", "Blitar"],
      Bali: ["Badung", "Buleleng", "Gianyar", "Tabanan"],
      Lampung: ["Pringsewu", "Tulang Bawang", "Lampung Selatan"],
    },
    daftarProvinsi() {
      return Object.keys(this.dataWilayah);
    },
    daftarKabupaten() {
      return this.dataWilayah[this.provinsi] || [];
    },
    resetKabupaten() {
      this.kabupaten = "";
    },

    init() {
      if (this._initialized) return;
      this._initialized = true;

      // Tagify utk label produk (plugin, tetap dimuat di Custom utk integrasi mudah)
      if (window.Tagify && this.$refs.tagsInput) {
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
      }
    },

    /* Validasi per-step */
    isStepValid() {
      if (this.step === 1) return !!(this.data.nama && this.data.nik);
      if (this.step === 2) return !!(this.data.kebun && this.data.komoditas);
      return true;
    },

    nextStep() {
      if (this.isStepValid() && this.step < this.totalSteps) this.step++;
    },
    prevStep() {
      if (this.step > 1) this.step--;
    },

    /* Currency formatter */
    get currencyDisplay() {
      try {
        return new Intl.NumberFormat("id-ID", {
          style: "currency",
          currency: "IDR",
          maximumFractionDigits: 0,
        }).format(this.currencyNumber || 0);
      } catch {
        return "Rp 0";
      }
    },
    formatInput(e) {
      const digits = e.target.value.replace(/\D/g, "");
      this.currencyNumber = digits ? parseInt(digits, 10) : 0;
    },

    /* Combobox navigation */
    comboboxSelect(val) {
      this.comboboxQuery = val;
      this.comboboxOpen = false;
    },
    comboboxMove(step) {
      if (!this.comboboxOpen) return;
      const list = this.comboboxFiltered;
      if (!list.length) return;
      this.comboboxIndex =
        (this.comboboxIndex + step + list.length) % list.length;
    },
    comboboxResetIndex() {
      this.comboboxIndex = 0;
    },
  };
}

// ===== CUSTOM: Repeatable Field Group =====
function repeatableGroup() {
  return {
    rows: [{ id: crypto.randomUUID(), nama: "", hubungan: "" }],

    addRow() {
      this.rows.push({
        id: crypto.randomUUID(),
        nama: "",
        hubungan: "",
      });
    },

    removeRow(i) {
      if (this.rows.length > 1) this.rows.splice(i, 1);
    },
  };
}

// ===== CUSTOM: OTP / PIN Input =====
function otpInput() {
  return {
    code: ["", "", "", "", "", ""],
    value: "",

    handleInput(i, e) {
      const val = e.target.value.replace(/\D/g, "");
      this.code[i] = val.slice(0, 1);
      if (val && i < 5) this.$refs["otp-" + (i + 1)]?.focus();
      this.sync();
    },

    handleKeydown(i, e) {
      // backspace di kotak kosong → fokus ke kotak sebelumnya
      if (e.key === "Backspace" && !this.code[i] && i > 0) {
        this.$refs["otp-" + (i - 1)]?.focus();
      }
    },

    handlePaste(e) {
      const text = e.clipboardData
        .getData("text")
        .replace(/\D/g, "")
        .slice(0, 6);
      text.split("").forEach((ch, i) => {
        this.code[i] = ch;
      });
      sync: this.sync();
      this.$refs["otp-" + Math.min(text.length, 5)]?.focus();
      e.preventDefault();
    },

    sync() {
      this.value = this.code.join("");
    },
  };
}

// ===== CUSTOM: Combobox / Autocomplete =====
// (Sudah di-error log dalam formCustom() — di sini komponen terpisah utk chartlist)

// ===== CUSTOM: Currency Formatter (murni Alpine) =====
function currencyCustom() {
  return {
    raw: 1250000,

    get display() {
      try {
        return new Intl.NumberFormat("id-ID", {
          style: "currency",
          currency: "IDR",
          maximumFractionDigits: 0,
        }).format(this.raw || 0);
      } catch {
        return "Rp 0";
      }
    },

    onInput(e) {
      const digits = e.target.value.replace(/\D/g, "");
      this.raw = digits ? parseInt(digits, 10) : 0;
    },
  };
}

// ===== CUSTOM: Emoji Mood Picker =====
// (Sudah dipakai di formCustom() — dipisah untuk reusability)
function emojiMood() {
  return {
    mood: null,
    hover: 0,
    list: ["😀", "🙂", "😐", "🙁", "😞"],
    label() {
      return ["Sangat Puas", "Puas", "Netral", "Kurang", "Tidak Puas"][
        (this.mood || 0) - 1
      ];
    },
  };
}

// ===== CUSTOM: Dependent Dropdown (Provinsi → Kabupaten) =====
function dependentDropdown() {
  return {
    provinsi: "",
    kabupaten: "",
    dataWilayah: {
      "Jawa Barat": ["Bandung", "Bogor", "Garut", "Tasikmalaya"],
      "Jawa Timur": ["Malang", "Banyuwangi", "Blitar", "Kediri"],
      "Sumatera Utara": ["Medan", "Deliserdang", "Binjai"],
      Bali: ["Badung", "Gianyar", "Buleleng"],
    },
    get listProvinsi() {
      return Object.keys(this.dataWilayah);
    },
    get listKabupaten() {
      return (this.provinsi && this.dataWilayah[this.provinsi]) || [];
    },
    onProvinsiChange() {
      this.kabupaten = "";
    },
  };
}

// ===== CUSTOM: Signature Pad (murni Alpine + canvas, tanpa plugin) =====
function customSignature() {
  return {
    isDrawing: false,
    hasInk: false,

    init() {
      this.resizeCanvas();
      // Tutup goresan jika pointer keluar canvas
      this.isInCanvas = false;
    },

    resizeCanvas() {
      const canvas = this.$refs.customCanvas;
      if (!canvas) return;
      const ratio = Math.max(window.devicePixelRatio || 1, 1);
      const rect = canvas.getBoundingClientRect();
      const prevData = this.hasInk ? canvas.toDataURL() : null;

      canvas.width = rect.width * ratio;
      canvas.height = rect.height * ratio;

      this.ctx = canvas.getContext("2d");
      this.ctx.scale(ratio, ratio);
      this.ctx.strokeStyle = "#1a2e1a";
      this.ctx.lineWidth = 2;
      this.ctx.lineCap = "round";
      this.ctx.lineJoin = "round";

      if (prevData) {
        const img = new Image();
        img.onload = () =>
          this.ctx.drawImage(img, 0, 0, rect.width, rect.height);
        img.src = prevData;
      }
    },

    // Pakai clientX/clientY + getBoundingClientRect agar selalu sinkron posisi kursor
    pos(e) {
      const rect = this.$refs.customCanvas.getBoundingClientRect();
      return {
        x: e.clientX - rect.left,
        y: e.clientY - rect.top,
      };
    },

    start(e) {
      e.preventDefault();
      const p = this.pos(e);
      this.ctx.beginPath();
      this.ctx.moveTo(p.x, p.y);
      this.isDrawing = true;
      this.hasInk = true;
      this.$refs.customCanvas.setPointerCapture?.(e.pointerId);
    },

    draw(e) {
      if (!this.isDrawing) return;
      e.preventDefault();
      const p = this.pos(e);
      this.ctx.lineTo(p.x, p.y);
      this.ctx.stroke();
    },

    stop(e) {
      this.isDrawing = false;
    },

    clear() {
      const canvas = this.$refs.customCanvas;
      if (!canvas) return;
      this.hasInk = false;
      this.resizeCanvas();
    },

    save() {
      if (!this.hasInk) return;
      const canvas = this.$refs.customCanvas;
      const dataUrl = canvas.toDataURL("image/png");
      this.$refs.customSigValue.value = dataUrl;
      this.$refs.customSigPreview.src = dataUrl;
      this.$refs.customSigPreview.classList.remove("hidden");
    },
  };
}

// ===== CUSTOM: fileUploader (Alpine native + kompresi gambar) =====
function fileUploader() {
  return {
    dragging: false,
    files: [],
    error: "",
    _nextId: 1,
    maxSizeMB: 5,
    allowedTypes: /^image\/|^application\/pdf$/,

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
          originalSize: file.size,
        };
        this.files.push(item);

        if (isImage && window.imageCompression) {
          // kompresi dulu → baru preview upload
          await this.compressAndUpload(id, file);
        } else {
          this.simulateUpload(id);
        }
      }
    },

    async compressAndUpload(id, originalFile) {
      try {
        const compressed = await imageCompression(
          originalFile,
          this.compressionOptions,
        );
        const target = this.files.find((f) => f.id === id);
        if (!target) return;

        // Ganti preview & info ukuran
        URL.revokeObjectURL(target.previewUrl);
        target.previewUrl = URL.createObjectURL(compressed);
        target.size = compressed.size;
        target.sizeLabel = this.formatSize(compressed.size);
        target.savedPercent = Math.max(
          0,
          Math.round((1 - compressed.size / originalFile.size) * 100),
        );
        target.name =
          originalFile.name.replace(/(\.[\w]+)$/i, "-kompresi$1") ||
          originalFile.name;
        target.compressing = false;
      } catch (e) {
        const target = this.files.find((f) => f.id === id);
        if (target) target.compressing = false;
      }
      this.simulateUpload(id);
    },

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
