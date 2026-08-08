@extends('nameera::layouts.app')

@section('content')
          <div x-data="formSpecial()" x-init="init()">
            <div class="mb-8">
              <div
                class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
              >
                <span>Form</span>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <span
                  class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
                  >Special</span
                >
              </div>
              <h1
                class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
              >
                Form Special
              </h1>
              <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Elemen form yang ditingkatkan dengan plugin pihak ketiga.
              </p>
            </div>

            <div
              class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 lg:p-8 shadow-sm"
            >
              <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
                Input Panen & Distribusi
              </h3>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Rentang Tanggal Panen
                    <span
                      class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle"
                      >Flatpickr</span
                    >
                  </label>
                  <input
                    type="text"
                    x-ref="harvestDate"
                    placeholder="Pilih rentang tanggal"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Jam Penjemputan
                    <span
                      class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle"
                      >Flatpickr</span
                    >
                  </label>
                  <input
                    type="text"
                    x-ref="harvestTime"
                    placeholder="Pilih jam"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    No. Telepon
                    <span
                      class="ml-1 text-[10px] font-bold text-accent bg-accent-bg dark:bg-accent/20 px-1.5 py-0.5 rounded-full align-middle"
                      >IMask</span
                    >
                  </label>
                  <input
                    type="text"
                    x-ref="telepon"
                    placeholder="+62 8xx-xxxx-xxxx"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Harga Jual / Kg
                    <span
                      class="ml-1 text-[10px] font-bold text-accent bg-accent-bg dark:bg-accent/20 px-1.5 py-0.5 rounded-full align-middle"
                      >IMask</span
                    >
                  </label>
                  <input
                    type="text"
                    x-ref="harga"
                    placeholder="Rp 0"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <div class="md:col-span-2">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Wilayah Distribusi
                    <span
                      class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle"
                      >Choices.js</span
                    >
                  </label>
                  <select x-ref="wilayah" multiple>
                    <option value="jakarta">Jakarta</option>
                    <option value="bandung">Bandung</option>
                    <option value="surabaya">Surabaya</option>
                    <option value="yogyakarta">Yogyakarta</option>
                    <option value="denpasar">Denpasar</option>
                    <option value="makassar">Makassar</option>
                    <option value="medan">Medan</option>
                  </select>
                </div>

                <div class="md:col-span-2">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Catatan Produksi
                    <span
                      class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle"
                      >Quill</span
                    >
                  </label>
                  <div
                    x-ref="catatan"
                    class="bg-gray-50 dark:bg-gray-900 rounded-xl"
                    style="min-height: 140px"
                  ></div>
                </div>

                <div class="md:col-span-2">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Dokumen Sertifikat Organik
                    <span
                      class="ml-1 text-[10px] font-bold text-accent bg-accent-bg dark:bg-accent/20 px-1.5 py-0.5 rounded-full align-middle"
                      >FilePond</span
                    >
                  </label>
                  <p class="text-xs text-gray-400 mb-2">
                    Seret & lepas beberapa gambar/PDF sekaligus — ada
                    preview, validasi tipe & ukuran otomatis.
                  </p>
                  <input type="file" x-ref="sertifikat" />
                </div>
              </div>

              <div
                class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700/50"
              >
                <button
                  type="button"
                  class="inline-flex items-center justify-center rounded-xl bg-primary hover:bg-primary-mid text-white font-bold text-sm px-6 py-2.5 transition-colors"
                >
                  Simpan Data
                </button>
                <button
                  type="button"
                  class="inline-flex items-center justify-center rounded-xl text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 font-bold text-sm px-6 py-2.5 transition-colors"
                >
                  Batal
                </button>
              </div>
            </div>
          </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@11.0.4/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/filepond@4.31.1/dist/filepond.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13"></script>
    <script src="https://npmcdn.com/flatpickr@4.6.13/dist/l10n/id.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@11.0.4/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/imask@7.6.1/dist/imask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-type@1.2.9/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-size@2.2.8/dist/filepond-plugin-file-validate-size.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond@4.31.1/dist/filepond.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.14.1/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script src="{{ asset('vendor/nameera/js/forms.js') }}"></script>
@endpush