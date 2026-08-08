@extends('nameera::layouts.app')

@section('content')
          <div x-data="formCustom()" x-init="init()">
            <div class="mb-8">
              <div
                class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
              >
                <span>Form</span>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <span
                  class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
                  >Custom</span
                >
              </div>
              <h1
                class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
              >
                Form Custom
              </h1>
              <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Komponen form interaktif buatan sendiri di atas Alpine.js.
              </p>
            </div>

            <!-- Wizard -->
            <div
              class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 lg:p-8 shadow-sm mb-6"
            >
              <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
                Pendaftaran Anggota Baru — Wizard
              </h3>

              <div class="flex items-center mb-8">
                <template x-for="n in totalSteps" :key="n">
                  <div class="flex items-center flex-1 last:flex-none">
                    <div class="flex flex-col items-center gap-1.5">
                      <div
                        class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-extrabold transition-colors duration-300"
                        :class="step >= n ? 'bg-primary text-white' : 'bg-gray-100 dark:bg-gray-700 text-gray-400'"
                        x-text="n"
                      ></div>
                      <span
                        class="text-[11px] font-bold text-gray-400 whitespace-nowrap"
                        x-text="stepLabels[n - 1]"
                      ></span>
                    </div>
                    <div
                      x-show="n < totalSteps"
                      class="flex-1 h-0.5 mx-3 rounded-full transition-colors duration-300"
                      :class="step > n ? 'bg-primary' : 'bg-gray-100 dark:bg-gray-700'"
                    ></div>
                  </div>
                </template>
              </div>

              <div
                x-show="step === 1"
                x-transition.opacity
                class="grid grid-cols-1 md:grid-cols-2 gap-6"
              >
                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Nama Lengkap</label
                  >
                  <input
                    type="text"
                    x-model="data.nama"
                    placeholder="cth. Budi Santoso"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>
                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >NIK</label
                  >
                  <input
                    type="text"
                    x-model="data.nik"
                    placeholder="16 digit NIK"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>
              </div>

              <div
                x-show="step === 2"
                x-transition.opacity
                class="grid grid-cols-1 md:grid-cols-2 gap-6"
              >
                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Nama Kebun</label
                  >
                  <input
                    type="text"
                    x-model="data.kebun"
                    placeholder="cth. Kebun Sumber Makmur"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>
                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Komoditas Utama</label
                  >
                  <input
                    type="text"
                    x-model="data.komoditas"
                    placeholder="cth. Manggis"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>
              </div>

              <div
                x-show="step === 3"
                x-transition.opacity
                class="bg-primary-bg dark:bg-gray-900 rounded-2xl p-5 space-y-2 text-sm"
              >
                <p class="font-bold text-dark dark:text-white mb-2">
                  Konfirmasi Data
                </p>
                <p class="text-gray-600 dark:text-gray-300">
                  <span class="font-semibold">Nama:</span>
                  <span x-text="data.nama || '—'"></span>
                </p>
                <p class="text-gray-600 dark:text-gray-300">
                  <span class="font-semibold">NIK:</span>
                  <span x-text="data.nik || '—'"></span>
                </p>
                <p class="text-gray-600 dark:text-gray-300">
                  <span class="font-semibold">Kebun:</span>
                  <span x-text="data.kebun || '—'"></span>
                </p>
                <p class="text-gray-600 dark:text-gray-300">
                  <span class="font-semibold">Komoditas:</span>
                  <span x-text="data.komoditas || '—'"></span>
                </p>
              </div>

              <div
                class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100 dark:border-gray-700/50"
              >
                <button
                  type="button"
                  @click="prevStep()"
                  x-show="step > 1"
                  class="inline-flex items-center justify-center rounded-xl text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 font-bold text-sm px-6 py-2.5 transition-colors"
                >
                  Kembali
                </button>
                <div x-show="step === 1"></div>
                <button
                  type="button"
                  @click="nextStep()"
                  x-show="step < totalSteps"
                  class="inline-flex items-center justify-center rounded-xl bg-primary hover:bg-primary-mid text-white font-bold text-sm px-6 py-2.5 transition-colors ml-auto"
                >
                  Lanjut
                </button>
                <button
                  type="button"
                  x-show="step === totalSteps"
                  class="inline-flex items-center justify-center rounded-xl bg-accent hover:opacity-90 text-white font-bold text-sm px-6 py-2.5 transition-colors ml-auto"
                >
                  Daftarkan Anggota
                </button>
              </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
              <!-- Rating -->
              <div
                class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
              >
                <label
                  class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3"
                  >Rating Kualitas Panen Terakhir</label
                >
                <div
                  class="flex items-center gap-1.5"
                  @mouseleave="hoverRating = 0"
                >
                  <template x-for="n in 5" :key="n">
                    <button
                      type="button"
                      @click="rating = n"
                      @mouseenter="hoverRating = n"
                      class="transition-transform hover:scale-110"
                    >
                      <svg
                        class="w-8 h-8"
                        :class="(hoverRating || rating) >= n ? 'fill-accent text-accent' : 'fill-transparent text-gray-300 dark:text-gray-600'"
                        stroke="currentColor"
                        stroke-width="1.5"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"
                        ></path>
                      </svg>
                    </button>
                  </template>
                  <span
                    class="ml-2 text-sm font-bold text-gray-500"
                    x-text="rating ? rating + '/5' : 'Belum dinilai'"
                  ></span>
                </div>
              </div>

              <!-- Warna label -->
              <div
                class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
              >
                <label
                  class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3"
                  >Warna Label Kategori</label
                >
                <div class="flex items-center gap-3 flex-wrap">
                  <template x-for="c in colors" :key="c">
                    <button
                      type="button"
                      @click="selectedColor = c"
                      class="w-8 h-8 rounded-full ring-offset-2 ring-offset-white dark:ring-offset-gray-800 transition-all"
                      :style="'background-color:' + c"
                      :class="selectedColor === c ? 'ring-2 ring-dark dark:ring-white scale-110' : ''"
                    ></button>
                  </template>
                  <input
                    type="color"
                    x-model="selectedColor"
                    class="w-8 h-8 rounded-full border-none cursor-pointer"
                  />
                </div>
                <p class="text-xs text-gray-400 mt-3">
                  Terpilih:
                  <span
                    class="font-mono font-bold"
                    x-text="selectedColor"
                  ></span>
                </p>
              </div>

              <!-- Tags -->
              <div
                class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
              >
                <label
                  class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                >
                  Label Produk
                  <span
                    class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle"
                    >Tagify</span
                  >
                </label>
                <input
                  type="text"
                  x-ref="tagsInput"
                  value="Organik, Panen Baru"
                  placeholder="Tambah label..."
                />
              </div>

              <!-- Upload Kustom -->
              <div
                class="lg:col-span-2 bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm"
                x-data="fileUploader()"
              >
                <label
                  class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                >
                  Upload Foto Kebun & Dokumen Pendukung
                  <span
                    class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle"
                    >Alpine Native</span
                  >
                </label>
                <div
                  @dragover.prevent="dragging = true"
                  @dragleave.prevent="dragging = false"
                  @drop.prevent="dragging = false; handleFiles($event.dataTransfer.files)"
                  @click="$refs.fileInput.click()"
                  :class="dragging ? 'border-primary bg-primary-bg dark:bg-primary/10 scale-[1.01]' : 'border-gray-200 dark:border-gray-700 hover:border-primary-light hover:bg-gray-50 dark:hover:bg-gray-900'"
                  class="relative border-2 border-dashed rounded-2xl px-6 py-8 text-center cursor-pointer transition-all duration-200"
                >
                  <input
                    type="file"
                    x-ref="fileInput"
                    multiple
                    accept="image/*,application/pdf"
                    class="hidden"
                    @change="handleFiles($event.target.files); $event.target.value = ''"
                  />
                  <p class="text-sm font-bold text-dark dark:text-white"
                    x-text="dragging ? 'Lepas file di sini...' : 'Seret & lepas file di sini'"
                  ></p>
                </div>
                <div
                  x-show="files.length"
                  x-cloak
                  class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mt-4"
                >
                  <template x-for="(file, index) in files" :key="file.id">
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-3 group hover:border-primary transition-colors">
                      <!-- Preview Image / Icon -->
                      <div class="aspect-square w-full rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-900 mb-2 flex items-center justify-center">
                        <template x-if="isImage(file)">
                          <img :src="file.url" :alt="file.name" class="object-cover w-full h-full" />
                        </template>
                        <template x-if="!isImage(file)">
                          <div class="text-center p-3">
                            <div class="w-10 h-12 bg-red-100 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-md flex items-center justify-center mx-auto mb-1">
                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM6 20V4h7v5h5v11H6z"/>
                              </svg>
                            </div>
                            <span class="text-xs font-bold text-gray-600 dark:text-gray-300">PDF</span>
                          </div>
                        </template>
                      </div>
                      <!-- File Info -->
                      <p class="text-xs font-bold text-dark dark:text-white truncate" x-text="file.name"></p>
                      <p class="text-[10px] text-gray-500 dark:text-gray-400" x-text="formatSize(file.size)"></p>
                      <!-- Remove Button -->
                      <button
                        type="button"
                        @click="removeFile(file.id)"
                        class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center text-xs shadow-md transition-colors"
                      >
                        ×
                      </button>
                    </div>
                  </template>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.31.4/dist/tagify.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.31.4/dist/tagify.min.js"></script>
    <script src="{{ asset('vendor/nameera/js/forms.js') }}"></script>
@endpush
