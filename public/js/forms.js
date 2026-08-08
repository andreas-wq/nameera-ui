/* ============================================================
 * Nameera UI - Forms.js
 * Logika Alpine.js untuk halaman Form Special & Form Custom
 * ============================================================ */

/* ---------- Registrasi Plugin FilePond (sekali saja) ---------- */
// FilePond.registerPlugin TIDAK boleh dipanggil berulang kali —
// pindahkan ke level atas dengan guard agar tidak error/warning
// saat komponen formSpecial dibuat ulang oleh Alpine.
if (
    typeof window !== "undefined" &&
    !window.__nameeraFilePondPlugins &&
    typeof FilePond !== "undefined"
) {
    window.__nameeraFilePondPlugins = true;
    try {
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
        );
    } catch (e) {
        console.warn("Gagal register FilePond plugin:", e);
    }
}

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

        // Flag untuk mencegah double initialization
        initialized: false,

        init() {
            // Jika sudah diinisialisasi, skip
            if (this.initialized) return;

            this.initFlatpickr();
            this.initIMask();
            this.initChoices();
            this.initQuill();
            this.initFilePond();

            // Cleanup saat komponen dihancurkan Alpine
            this.$cleanup(() => {
                if (this.choicesWilayah) this.choicesWilayah.destroy();
                if (this.pond) this.pond.destroy();
                if (this.quillCatatan) this.quillCatatan = null;
            });

            this.initialized = true;
        },

        initFlatpickr() {
            if (typeof flatpickr === "undefined") return;

            const idLocale =
                flatpickr.l10ns && flatpickr.l10ns.id
                    ? flatpickr.l10ns.id
                    : undefined;

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
            if (typeof Choices === "undefined" || !this.$refs.wilayah) return;

            // Periksa apakah sudah diinisialisasi oleh Choices.js sebelumnya
            if (this.$refs.wilayah.classList.contains("choices__input")) return;

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
            if (typeof Quill === "undefined" || !this.$refs.catatan) return;

            // Hindari inisialisasi ganda: cek apakah Quill sudah dibuat
            if (this.quillCatatan) return;
            if (this.$refs.catatan.querySelector(".ql-container")) return;

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

            // Pastikan editor punya tinggi minimal yang sesuai desain
            const editor = this.quillCatatan.root;
            if (editor) {
                editor.style.minHeight = "140px";
                editor.style.fontSize = "14px";
            }
        },

        initFilePond() {
            if (typeof FilePond === "undefined" || !this.$refs.sertifikat)
                return;

            // Jangan buat instance baru jika sudah ada
            if (this.pond) return;

            // Cek apakah FilePond sudah ada di elemen tersebut
            if (FilePond.find(this.$refs.sertifikat)) return;

            // Plugin sudah diregistrasi sekali di level atas (lihat atas file)
            try {
                this.pond = FilePond.create(this.$refs.sertifikat, {
                    labelIdle:
                        '<div class="filepond--upload-icon">' +
                        '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">' +
                        '<path d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>' +
                        "</svg>" +
                        "</div>" +
                        '<span class="filepond--label-text">Seret & lepas file di sini atau</span> ' +
                        '<span class="filepond--label-action">Pilih file</span>',
                    acceptedFileTypes: ["image/*", "application/pdf"],
                    maxFileSize: "5MB",
                    allowMultiple: true,
                    allowReorder: true,
                    storeAsFile: true,
                });
            } catch (e) {
                console.error("Gagal membuat FilePond:", e);
                this.pond = null;
            }
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

        colors: [
            "#639922",
            "#f59e0b",
            "#ef4444",
            "#3b82f6",
            "#8b5cf6",
            "#ec4899",
        ],
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
        error: "",

        async handleFiles(fileList) {
            this.error = "";
            const arr = Array.from(fileList);

            for (const file of arr) {
                const validTypes = ["image/", "application/pdf"];
                const isValid = validTypes.some((t) => file.type.startsWith(t));
                if (!isValid) {
                    this.error =
                        file.name +
                        " tidak didukung. Gunakan JPG, PNG, atau PDF.";
                    continue;
                }
                if (file.size > 5 * 1024 * 1024) {
                    this.error = file.name + " melebihi batas 5MB.";
                    continue;
                }

                const item = {
                    id: ++this.counter,
                    name: file.name,
                    size: file.size,
                    sizeLabel: this.formatSize(file.size),
                    type: file.type,
                    ext: file.name.split(".").pop().toUpperCase(),
                    previewUrl: null,
                    compressing: false,
                    progress: 0,
                    savedPercent: null,
                };

                if (file.type.startsWith("image/")) {
                    this.files.push(item);
                    // Gunakan index array agar reaktivitas Alpine terjaga
                    const fileIndex = this.files.length - 1;
                    this.files[fileIndex].compressing = true;

                    try {
                        let processed = file;

                        if (
                            typeof imageCompression !== "undefined" &&
                            file.size > 300 * 1024
                        ) {
                            const compressPromise = imageCompression(file, {
                                maxSizeMB: 1,
                                maxWidthOrHeight: 1280,
                                useWebWorker: false,
                            });
                            const timeoutPromise = new Promise((_, reject) =>
                                setTimeout(
                                    () => reject(new Error("Timeout")),
                                    8000,
                                ),
                            );
                            processed = await Promise.race([
                                compressPromise,
                                timeoutPromise,
                            ]);
                            this.files[fileIndex].savedPercent = Math.round(
                                (1 - processed.size / file.size) * 100,
                            );
                        }

                        if (
                            typeof imageCompression !== "undefined" &&
                            imageCompression.getDataUrlFromFile
                        ) {
                            this.files[fileIndex].previewUrl =
                                await imageCompression.getDataUrlFromFile(
                                    processed,
                                );
                        } else {
                            this.files[fileIndex].previewUrl =
                                URL.createObjectURL(processed);
                        }
                        this.files[fileIndex].size = processed.size;
                        this.files[fileIndex].sizeLabel = this.formatSize(
                            processed.size,
                        );
                    } catch (e) {
                        console.warn("Kompresi dilewati:", e.message);
                        this.files[fileIndex].previewUrl =
                            URL.createObjectURL(file);
                    } finally {
                        this.files[fileIndex].compressing = false;
                        this.files[fileIndex].progress = 100;
                    }
                } else {
                    this.files.push(item);
                    this.files[this.files.length - 1].progress = 100;
                }
            }
        },

        formatSize(bytes) {
            if (bytes < 1024) return bytes + " B";
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + " KB";
            return (bytes / (1024 * 1024)).toFixed(1) + " MB";
        },

        get totalSizeLabel() {
            const total = this.files.reduce((sum, f) => sum + (f.size || 0), 0);
            return this.formatSize(total);
        },

        isImage(file) {
            return file.type.startsWith("image/");
        },

        removeFile(index) {
            if (this.files[index] && this.files[index].previewUrl) {
                URL.revokeObjectURL(this.files[index].previewUrl);
            }
            this.files.splice(index, 1);
        },
    };
}
