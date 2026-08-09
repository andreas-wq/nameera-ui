@extends('nameera::layouts.app')

@section('title', 'Form Kit - Nameera ui')

@section('content')
          <!-- ==================== FORM BASIC ==================== -->
          <div class="mb-16">
            <div class="mb-8">
              <div
                class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
              >
                <span>Form</span>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <span
                  class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
                  >Basic</span
                >
              </div>
              <h1
                class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
              >
                Form Kit — Basic
              </h1>
              <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Elemen HTML native lengkap: validasi, datalist, fieldset,
                progress, meter, file multiple. Tanpa JavaScript.
              </p>
            </div>

            <form
              @submit.prevent=""
              class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 lg:p-8 shadow-sm"
            >
              <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
                Registrasi Petani — Native Only
              </h3>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama + validasi native -->
                <div>
                  <label
                    for="nama-lengkap"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Nama Lengkap</label
                  >
                  <input
                    id="nama-lengkap"
                    type="text"
                    required
                    minlength="3"
                    maxlength="50"
                    pattern="[A-Za-zÀ-ÿ\s\.\-']+"
                    placeholder="cth. Siti Rahayu"
                    title="Hanya huruf, minimal 3 karakter"
                    class="peer w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                  <p
                    class="hidden peer-invalid:block text-xs font-bold text-red-500 mt-1"
                  >
                    Nama wajib diisi — minimal 3 huruf, tanpa angka.
                  </p>
                </div>

                <!-- Input angka + stepper -->
                <div>
                  <label
                    for="luas"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Luas Lahan (m²) — <code>type="number"</code></label
                  >
                  <div class="relative flex items-center">
                    <input
                      id="luas"
                      type="number"
                      min="10"
                      max="10000"
                      step="10"
                      value="100"
                      class="peer w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-12 py-2.5 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                    />
                    <button
                      type="button"
                      onclick="this.parentElement.querySelector('input').stepDown()"
                      class="absolute left-1 top-1/2 -translate-y-1/2 w-9 h-9 rounded-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 text-lg font-bold"
                    >
                      −
                    </button>
                    <button
                      type="button"
                      onclick="this.parentElement.querySelector('input').stepUp()"
                      class="absolute right-1 top-1/2 -translate-y-1/2 w-9 h-9 rounded-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 text-lg font-bold"
                    >
                      +
                    </button>
                  </div>
                  <p
                    class="hidden peer-invalid:block text-xs font-bold text-red-500 mt-1"
                  >
                    Minimal 10 m², maksimal 10.000 m².
                  </p>
                </div>

                <!-- Tanggal native -->
                <div>
                  <label
                    for="tanggal-panen"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Tanggal Panen — <code>type="date"</code></label
                  >
                  <input
                    id="tanggal-panen"
                    type="date"
                    required
                    class="peer w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                  <p
                    class="hidden peer-invalid:block text-xs font-bold text-red-500 mt-1"
                  >
                    Tanggal panen wajib dipilih.
                  </p>
                </div>

                <!-- Warna native -->
                <div>
                  <label
                    for="warna-sortir"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Warna Sortir — <code>type="color"</code></label
                  >
                  <input
                    id="warna-sortir"
                    type="color"
                    value="#3b6d11"
                    class="w-full h-11 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 cursor-pointer p-1"
                  />
                </div>

                <!-- Datalist -->
                <div>
                  <label
                    for="komoditas-saran"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Komoditas — <code><datalist></code></label
                  >
                  <input
                    id="komoditas-saran"
                    list="daftar-komoditas"
                    placeholder="Ketik: man..."
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                  <datalist id="daftar-komoditas">
                    <option value="Manggis"></option>
                    <option value="Nanas"></option>
                    <option value="Pisang Cavendish"></option>
                    <option value="Alpukat"></option>
                    <option value="Durian"></option>
                  </datalist>
                </div>

                <!-- Fieldset + legend -->
                <div class="md:col-span-2">
                  <fieldset
                    class="border border-gray-200 dark:border-gray-700 rounded-2xl p-4"
                  >
                    <legend
                      class="px-2 text-xs font-bold uppercase tracking-wide text-primary-mid dark:text-primary-light"
                    >
                      Metode Pemetikan (fieldset + legend)
                    </legend>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                      <label class="flex items-center gap-2 cursor-pointer">
                        <input
                          type="radio"
                          name="metode"
                          checked
                          class="w-4 h-4 accent-primary"
                        />
                        <span class="text-sm font-medium">Manual</span>
                      </label>
                      <label class="flex items-center gap-2 cursor-pointer">
                        <input
                          type="radio"
                          name="metode"
                          class="w-4 h-4 accent-primary"
                        />
                        <span class="text-sm font-medium">Gunting</span>
                      </label>
                      <label class="flex items-center gap-2 cursor-pointer">
                        <input
                          type="radio"
                          name="metode"
                          class="w-4 h-4 accent-primary"
                        />
                        <span class="text-sm font-medium">Mesin</span>
                      </label>
                    </div>
                  </fieldset>
                </div>

                <!-- Progress -->
                <div>
                  <label
                    for="progress-simpan"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Progress Penyimpanan — <code><progress></code></label
                  >
                  <progress
                    id="progress-simpan"
                    max="100"
                    value="68"
                    class="w-full h-2.5 rounded-full bg-gray-100 dark:bg-gray-700 accent-primary"
                  ></progress>
                  <p class="text-xs text-gray-400 mt-1">Kapasitas gudang 68%</p>
                </div>

                <!-- Meter -->
                <div>
                  <label
                    for="meter-ph"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >pH Tanah — <code><meter></code></label
                  >
                  <meter
                    id="meter-ph"
                    min="0"
                    max="14"
                    low="5"
                    high="7"
                    optimum="6.5"
                    value="6.2"
                    class="w-full h-2.5 rounded"
                  ></meter>
                  <p class="text-xs text-gray-400 mt-1">Ideal 5,5 – 7,0</p>
                </div>

                <!-- Multiple file native -->
                <div class="md:col-span-2">
                  <label
                    for="bukti-multiple"
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Upload Foto (multiple) — <code>type="file" multiple</code></label
                  >
                  <input
                    id="bukti-multiple"
                    type="file"
                    multiple
                    accept="image/*"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2.5 file:px-5 file:rounded-l-[11px] file:border-0 file:bg-primary file:text-white file:font-bold file:text-sm hover:file:bg-primary-mid file:cursor-pointer file:transition-colors cursor-pointer"
                  />
                </div>
              </div>
            </form>
          </div>

          <!-- ==================== FORM SPECIAL (PLUGIN) ==================== -->
          <div class="mb-16" x-data="formSpecial()" x-init="init()">
            <div class="mb-8">
              <div
                class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
              >
                <span>Form</span>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <span
                  class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
                  >Special (Plugin)</span
                >
              </div>
              <h1
                class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
              >
                Form Special — Plugin Pihak Ketiga
              </h1>
              <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Flatpickr, Tom Select, IMask, Quill, FilePond +
                browser-image-compression, intl-tel-input, SignaturePad,
                SortableJS, PristineJS. Semua via CDN jsDelivr.
              </p>
            </div>

            <div
              class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 lg:p-8 shadow-sm"
            >
              <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
                Input Panen & Distribusi
              </h3>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Flatpickr range -->
                <div>
                  <label
                    for="harvest-range"
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
                    placeholder="Pilih rentang..."
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <!-- Flatpickr time -->
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

                <!-- IMask telepon-->
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
                    placeholder="+62 812-3456-7890"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <!-- IMask rupiah -->
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
                    placeholder="Rp 12.000"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <!-- intl-tel-input -->
                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    No. HP Internasional
                    <span
                      class="ml-1 text-[10px] font-bold text-accent bg-accent-bg dark:bg-accent/20 px-1.5 py-0.5 rounded-full align-middle"
                      >intl-tel-input</span
                    >
                  </label>
                  <input x-ref="telpIntl" type="tel" class="iti__tel-input" />
                </div>

                <!-- Tom Select multiple -->
                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Wilayah Distribusi
                    <span
                      class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle"
                      >TomSelect</span
                    >
                  </label>
                  <select x-ref="wilayah" multiple autocomplete="off">
                    <option value="jakarta" selected>Jakarta</option>
                    <option value="bandung" selected>Bandung</option>
                    <option value="surabaya">Surabaya</option>
                    <option value="yogyakarta">Yogyakarta</option>
                    <option value="denpasar">Denpasar</option>
                    <option value="makassar">Makassar</option>
                    <option value="medan">Medan</option>
                  </select>
                </div>

                <!-- Quill -->
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

                <!-- FilePond + kompresi -->
                <div class="md:col-span-2">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Dokumen Sertifikat Organik
                    <span
                      class="ml-1 text-[10px] font-bold text-accent bg-accent-bg dark:bg-accent/20 px-1.5 py-0.5 rounded-full align-middle"
                      >FilePond + browser-image-compression</span
                    >
                  </label>
                  <p class="text-xs text-gray-400 mb-2">
                    Gambar otomatis dikompres (<=1MB, max 1920px) sebelum
                    dikirim ke server.
                  </p>
                  <input type="file" x-ref="sertifikat" />
                </div>

                <!-- Signature Pad (plugin) -->
                <div class="md:col-span-2 signature-pad-container">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Tanda Tangan Digital
                    <span
                      class="ml-1 text-[10px] font-bold text-accent bg-accent-bg dark:bg-accent/20 px-1.5 py-0.5 rounded-full align-middle"
                      >SignaturePad</span
                    >
                  </label>
                  <canvas
                    x-ref="signaturePlugin"
                    class="w-full h-40 signature-canvas"
                  ></canvas>
                  <div class="flex flex-wrap gap-2 mt-3">
                    <button
                      type="button"
                      @click="signaturePluginClear()"
                      class="text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 font-bold text-sm px-4 py-2 rounded-xl transition-colors"
                    >
                      Hapus
                    </button>
                    <button
                      type="button"
                      @click="signaturePluginSave()"
                      class="bg-primary hover:bg-primary-mid text-white font-bold text-sm px-4 py-2 rounded-xl transition-colors"
                    >
                      Simpan
                    </button>
                    <button
                      type="button"
                      @click="signaturePluginDownload()"
                      class="bg-accent text-white font-bold text-sm px-4 py-2 rounded-xl transition-colors"
                    >
                      Unduh PNG
                    </button>
                  </div>
                  <input type="hidden" x-ref="signaturePluginValue" />
                  <img
                    x-ref="signaturePluginPreview"
                    class="hidden mt-4 border rounded-xl max-h-40"
                  />
                </div>

                <!-- SortableJS -->
                <div class="md:col-span-2" x-data="dragSortable()" x-init="init()">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    Urutan Dokumen (drag untuk reorder)
                    <span
                      class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle"
                      >SortableJS</span
                    >
                  </label>
                  <ul x-ref="sortableList" class="space-y-2">
                    <template x-for="item in items" :key="item.id">
                      <li
                        class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-900 rounded-xl cursor-pointer"
                      >
                        <span class="sortable-handle text-gray-400 cursor-grab">☰</span>
                        <span class="flex-1 text-sm font-medium" x-text="item.label"></span>
                        <span
                          class="text-[10px] font-bold uppercase px-2 py-0.5 rounded-full bg-primary-bg text-primary dark:bg-primary/20 dark:text-primary-light"
                          x-text="item.type"
                        ></span>
                        <button
                          type="button"
                          @click="remove(item.id)"
                          class="text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg px-2"
                        >
                          ✕
                        </button>
                      </li>
                    </template>
                  </ul>
                </div>

                <!-- PristineJS -->
                <div class="md:col-span-2">
                  <form
                    x-ref="pristineForm"
                    @submit="validateForm($event)"
                    novalidate
                  >
                    <h4
                      class="font-heading font-bold text-dark dark:text-white mb-4"
                    >
                      Validasi Real-time — PristineJS
                    </h4>
                    <div
                      class="grid grid-cols-1 sm:grid-cols-2 gap-4 pristine-group"
                    >
                      <div class="pristine-group">
                        <label
                          for="pristine-nama"
                          class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1"
                        >Nama</label>
                        <input
                          id="pristine-nama"
                          type="text"
                          data-pristine-required
                          data-pristine-minlength="3"
                          class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary"
                        />
                      </div>
                      <div class="pristine-group">
                        <label
                          for="pristine-email"
                          class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1"
                        >Email</label>
                        <input
                          id="pristine-email"
                          type="email"
                          data-pristine-required
                          data-pristine-email
                          class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-white focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary"
                        />
                      </div>
                    </div>
                    <button
                      type="submit"
                      class="mt-4 inline-flex items-center justify-center rounded-xl bg-primary text-white font-bold text-sm px-6 py-2.5"
                      @click="initValidation()"
                    >
                      Validasi
                    </button>
                    <p
                      x-ref="successMessage"
                      class="hidden text-green-600 font-bold text-sm mt-2"
                    >
                      ✓ Form valid!
                    </p>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- ==================== FORM CUSTOM (ALPINE NATIVE) ==================== -->
          <div>
            <div class="mb-8">
              <div
                class="flex items-center gap-1.5 text-xs font-bold text-primary-mid dark:text-primary-light uppercase tracking-wider mb-2"
              >
                <span>Form</span>
                <span class="text-gray-300 dark:text-gray-600">/</span>
                <span
                  class="text-gray-400 dark:text-gray-500 normal-case font-semibold"
                  >Custom (Alpine Native)</span
                >
              </div>
              <h1
                class="text-2xl lg:text-3xl font-heading font-extrabold text-dark dark:text-white"
              >
                Form Custom — 100% Alpine.js + Tailwind
              </h1>
              <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Tanpa library luar: wizard, rating, repeatable, OTP, combobox,
                currency, emoji, dependent dropdown, signature & upload
                custom.
              </p>
            </div>

            <div x-data="formCustom()" x-init="init()">
              <!-- Wizard dengan validasi per-step -->
              <div
                class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 lg:p-8 shadow-sm mb-6"
              >
                <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
                  Wizard Validasi per-Step
                </h3>
                <div class="flex items-center mb-8">
                  <template x-for="n in totalSteps" :key="n">
                    <div class="flex items-center flex-1 last:flex-none">
                      <div class="flex flex-col items-center gap-1">
                        <div
                          class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-extrabold transition-colors"
                          :class="step >= n ? 'bg-primary text-white' : 'bg-gray-100 dark:bg-gray-700 text-gray-400'"
                          x-text="n"
                        ></div>
                        <span
                          class="text-[10px] font-bold text-gray-400 whitespace-nowrap"
                          x-text="stepLabels[n-1]"
                        ></span>
                      </div>
                      <div
                        x-show="n < totalSteps"
                        class="flex-1 h-0.5 mx-2 rounded-full"
                        :class="step > n ? 'bg-primary' : 'bg-gray-100 dark:bg-gray-700'"
                      ></div>
                    </div>
                  </template>
                </div>

                <div x-show="step===1" x-transition.opacity class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                      >Nama Lengkap *</label
                    >
                    <input x-model="data.nama" type="text" placeholder="Nama lengkap..."
                      class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary" />
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                      >NIK *</label
                    >
                    <input x-model="data.nik" type="text" placeholder="16 digit NIK"
                      class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary" />
                  </div>
                </div>
                <div x-show="step===2" x-transition.opacity class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                      >Nama Kebun *</label
                    >
                    <input x-model="data.kebun" type="text" placeholder="cth. Kebun Sumber Makmur"
                      class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary" />
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                      >Komoditas Utama *</label
                    >
                    <input x-model="data.komoditas" type="text" placeholder="cth. Manggis"
                      class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary" />
                  </div>
                </div>
                <div x-show="step===3" x-transition.opacity
                  class="bg-primary-bg dark:bg-gray-900 rounded-2xl p-5 space-y-2 text-sm">
                  <p class="font-bold text-dark dark:text-white">Konfirmasi</p>
                  <p>Nama: <b x-text="data.nama || '—'"></b></p>
                  <p>NIK: <b x-text="data.nik || '—'"></b></p>
                  <p>Kebun: <b x-text="data.kebun || '—'"></b></p>
                  <p>Komoditas: <b x-text="data.komoditas || '—'"></b></p>
                </div>

                <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100 dark:border-gray-700/50">
                  <button
                    type="button" @click="prevStep()" x-show="step>1"
                    class="rounded-xl text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 font-bold text-sm px-6 py-2.5 transition-colors">
                    Kembali
                  </button>
                  <button
                    type="button" @click="nextStep()" x-show="step<totalSteps"
                    :disabled="!isStepValid()"
                    class="ml-auto rounded-xl font-bold text-sm px-6 py-2.5 transition-colors"
                    :class="isStepValid() ? 'bg-primary hover:bg-primary-mid text-white' : 'bg-gray-100 dark:bg-gray-700 text-gray-400 cursor-not-allowed'">
                    Lanjut
                  </button>
                  <button type="button" x-show="step===totalSteps" @click="wizardDone=true"
                    class="ml-auto rounded-xl bg-accent text-white font-bold text-sm px-6 py-2.5 transition-colors">
                    Daftarkan
                  </button>
                </div>
                <p x-show="wizardDone" x-transition class="text-green-500 text-sm font-bold mt-4">
                  ✓ Anggota berhasil didaftarkan!
                </p>
              </div>

              <!-- Rating & Emoji -->
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm">
                  <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3"
                    >Rating Kualitas Panen</label
                  >
                  <div class="flex items-center gap-1" @mouseleave="hoverRating = 0">
                    <template x-for="n in 5" :key="n">
                      <button type="button" @click="rating = n" @mouseenter="hoverRating = n" class="transition-transform hover:scale-110">
                        <svg class="w-8 h-8" :class="(hoverRating||rating) >= n ? 'fill-accent text-accent' : 'fill-transparent text-gray-300 dark:text-gray-600'" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                        </svg>
                      </button>
                    </template>
                    <span class="ml-2 text-sm font-bold text-gray-500" x-text="rating ? rating + '/5' : 'Belum dinilai'"></span>
                  </div>

                  <hr class="my-5 border-gray-100 dark:border-gray-700" />

                  <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3"
                    >Emoji Mood Survey</label
                  >
                  <div class="flex gap-2" @mouseleave="moodHover = 0">
                    <template x-for="(e,i) in emojis" :key="i">
                      <button type="button" @click="mood = i+1" @mouseenter="moodHover = i+1"
                        :class="((moodHover||mood) === i+1) ? 'scale-125' : 'opacity-60 hover:opacity-100'"
                        class="text-3xl transition-all duration-200"
                        x-text="e">
                      </button>
                    </template>
                    <span class="ml-2 text-sm font-bold text-gray-500 self-center" x-text="mood ? ['Sangat Puas','Puas','Netral','Kurang','Tidak Puas'][mood-1] : ''"></span>
                  </div>
                </div>

                <div class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm">
                  <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3"
                    >Warna Label Kategori</label
                  >
                  <div class="flex items-center gap-3 flex-wrap">
                    <template x-for="c in colors" :key="c">
                      <button type="button" @click="selectedColor = c"
                        class="w-8 h-8 rounded-full ring-offset-2 ring-offset-white dark:ring-offset-gray-800 transition-all"
                        :style="'background-color:'+c"
                        :class="selectedColor === c ? 'ring-2 ring-dark dark:ring-white scale-110' : ''">
                      </button>
                    </template>
                    <input type="color" x-model="selectedColor" class="w-8 h-8 rounded-full border-none cursor-pointer" />
                  </div>
                  <p class="text-xs text-gray-400 mt-3">Terpilih: <span class="font-mono font-bold" x-text="selectedColor"></span></p>

                  <hr class="my-5 border-gray-100 dark:border-gray-700" />

                  <!-- Currency formatter -->
                  <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                    Harga Jual (Rupiah live)
                    <span class="ml-1 text-[10px] font-bold text-primary-mid bg-primary-bg dark:bg-primary/20 px-1.5 py-0.5 rounded-full align-middle">Intl.NumberFormat</span>
                  </label>
                  <input type="text" @input="formatInput($event)" class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-bold text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary"
                    :value="currencyDisplay" />
                </div>
              </div>

              <!-- Repeatable + OTP -->
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm" x-data="repeatableGroup()">
                  <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3"
                    >Daftar Anggota Keluarga</label
                  >
                  <template x-for="(row,i) in rows" :key="row.id">
                    <div class="flex gap-2 mb-2">
                      <input x-model="row.nama" type="text" placeholder="Nama"
                        class="flex-1 min-w-0 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-3 py-2 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary" />
                      <input x-model="row.hubungan" type="text" placeholder="Hubungan"
                        class="flex-1 min-w-0 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-3 py-2 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary" />
                      <button type="button" @click="removeRow(i)"
                        class="text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg px-2 shrink-0">✕</button>
                    </div>
                  </template>
                  <button type="button" @click="addRow()"
                    class="text-sm font-bold text-primary-mid hover:text-primary transition-colors">+ Tambah Baris</button>
                </div>

                <div class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm" x-data="otpInput()">
                  <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1"
                    >Kode OTP (6 digit)</label
                  >
                  <p class="text-xs text-gray-400 mb-3">Auto-focus & paste support</p>
                  <div class="flex gap-2" @paste.prevent="handlePaste($event)">
                    <template x-for="(_,i) in code" :key="i">
                      <input type="text" inputmode="numeric" maxlength="2"
                        :x-ref="'otp-'+i"
                        x-ref="`otp-${i}`"
                        @input="handleInput(i,$event)"
                        @keydown="handleKeydown(i,$event)"
                        class="w-12 h-12 text-center text-lg font-extrabold rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary"
                      />
                    </template>
                  </div>
                  <p class="text-xs text-gray-400 mt-3">Nilai tersimpan: <span class="font-mono font-bold" x-text="value || '—'"></span></p>
                </div>
              </div>

              <!-- Combobox + Dependent dropdown -->
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm">
                  <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Cari Komoditas (Combobox)</label
                  >
                  <div class="relative">
                    <input type="text" x-model="comboboxQuery" @focus="comboboxOpen = true"
                      @keydown.down.prevent="comboboxMove(1)"
                      @keydown.up.prevent="comboboxMove(-1)"
                      @keydown.enter.prevent="comboboxSelect(comboboxFiltered[comboboxIndex])"
                      @keydown.esc="comboboxOpen = false"
                      @input="comboboxResetIndex()"
                      placeholder="Ketik: mang..."
                      class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary" />
                    <div x-show="comboboxOpen && comboboxFiltered.length" x-transition
                      class="absolute z-20 mt-1 w-full bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-xl shadow-xl overflow-hidden">
                      <template x-for="(item, idx) in comboboxFiltered" :key="item">
                        <button type="button" @mousedown.prevent="comboboxSelect(item)" @mouseenter="comboboxIndex = idx"
                          class="w-full text-left px-4 py-2 text-sm font-medium hover:bg-primary-bg dark:hover:bg-primary/20"
                          :class="idx === comboboxIndex ? 'bg-primary-bg dark:bg-primary/20' : ''">
                          <span x-text="item"></span>
                        </button>
                      </template>
                    </div>
                  </div>
                </div>

                <div class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm" x-data="dependentDropdown()">
                  <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-3"
                    >Provinsi → Kabupaten</label
                  >
                  <div class="grid grid-cols-2 gap-3">
                    <div>
                      <select x-model="provinsi" @change="onProvinsiChange()" class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-3 py-2.5 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary">
                        <option value="">— Pilih Provinsi —</option>
                        <template x-for="p in listProvinsi" :key="p">
                          <option :value="p" x-text="p"></option>
                        </template>
                      </select>
                    </div>
                    <div>
                      <select x-model="kabupaten" class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-3 py-2.5 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary">
                        <option value="">— Pilih Kabupaten —</option>
                        <template x-for="k in listKabupaten" :key="k">
                          <option :value="k" x-text="k"></option>
                        </template>
                      </select>
                    </div>
                  </div>
                  <p class="text-xs text-gray-400 mt-3">
                    Terpilih: <span class="font-bold" x-text="provinsi ? provinsi + ' → ' + (kabupaten || '?') : '—'"></span>
                  </p>
                </div>
              </div>

              <!-- Signature custom (Alpine murni) -->
              <div class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm mb-6 signature-pad-container" x-data="customSignature()" x-init="init()">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                  Tanda Tangan (Alpine + canvas)
                  <span class="ml-1 text-[10px] font-bold text-accent bg-accent-bg dark:bg-accent/20 px-1.5 py-0.5 rounded-full align-middle">Pointer Events</span>
                </label>
                <canvas x-ref="customCanvas"
                  @pointerdown="start($event)"
                  @pointermove="draw($event)"
                  @pointerup="stop()"
                  @pointerleave="stop()"
                  class="signature-canvas w-full h-40"></canvas>
                <div class="flex flex-wrap gap-2 mt-3">
                  <button type="button" @click="clear()" class="text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 font-bold text-sm px-4 py-2 rounded-xl">Hapus</button>
                  <button type="button" @click="save()" class="bg-primary text-white font-bold text-sm px-4 py-2 rounded-xl">Simpan PNG</button>
                </div>
                <input type="hidden" x-ref="customSigValue" />
                <img x-ref="customSigPreview" class="hidden mt-4 border rounded-xl max-h-40" />
              </div>

              <!-- Upload Alpine native + kompresi -->
              <div class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 shadow-sm mb-6" x-data="fileUploader()">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                  Upload Foto Kebun & Dokumen
                  <span class="ml-1 text-[10px] font-bold text-accent bg-accent-bg dark:bg-accent/20 px-1.5 py-0.5 rounded-full align-middle">Alpine + image-compression</span>
                </label>
                <p class="text-xs text-gray-400 mb-3">
                  Drag & drop, preview thumbnail, kompresi otomatis (<=1MB), tanpa FilePond.
                </p>
                <div
                  @dragover.prevent="dragging = true"
                  @dragleave.prevent="dragging = false"
                  @drop.prevent="dragging = false; handleFiles($event.dataTransfer.files)"
                  @click="$refs.fileInput.click()"
                  :class="dragging ? 'border-primary bg-primary-bg dark:bg-primary/10' : 'border-gray-200 dark:border-gray-700 hover:border-primary-light hover:bg-gray-50 dark:hover:bg-gray-900'"
                  class="border-2 border-dashed rounded-2xl px-6 py-8 text-center cursor-pointer transition-all duration-200"
                >
                  <input type="file" x-ref="fileInput" multiple accept="image/*,application/pdf" class="hidden" @change="handleFiles($event.target.files); $event.target.value = ''" />
                  <p class="text-sm font-bold text-dark dark:text-white" x-text="dragging ? 'Lepas file di sini...' : 'Seret & lepas di sini atau klik'" />
                  <p class="text-xs text-gray-400 mt-1">JPG, PNG, PDF — maks 5MB/file</p>
                </div>
                <p x-show="error" x-cloak x-text="error" class="text-xs font-bold text-red-500 mt-3"></p>
                <div x-show="files.length" x-cloak class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mt-4">
                  <template x-for="(file, index) in files" :key="file.id">
                    <div class="relative group rounded-xl overflow-hidden border border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                      <template x-if="file.previewUrl">
                        <img :src="file.previewUrl" class="w-full h-24 object-cover" />
                      </template>
                      <template x-if="!file.previewUrl">
                        <div class="w-full h-24 flex flex-col items-center justify-center text-accent gap-1">
                          <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 3v5a1 1 0 001 1h5"></path>
                          </svg>
                          <span class="text-[10px] font-bold uppercase" x-text="file.ext"></span>
                        </div>
                      </template>
                      <div class="absolute inset-x-0 bottom-0 bg-black/60 px-2 py-1.5">
                        <p class="text-[10px] text-white truncate" x-text="file.name"></p>
                        <p class="text-[9px] text-gray-300" x-text="file.sizeLabel"></p>
                        <div class="w-full h-1 bg-white/20 rounded-full mt-1 overflow-hidden">
                          <div class="h-full bg-primary-light transition-all duration-200" :style="'width:'+file.progress+'%'"></div>
                        </div>
                      </div>
                      <button type="button" @click.stop="removeFile(index)"
                        class="absolute top-1.5 right-1.5 w-5 h-5 rounded-full bg-black/60 hover:bg-red-500 text-white text-xs flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all">✕</button>
                    </div>
                  </template>
                </div>
                <p x-show="files.length" x-cloak class="text-xs text-gray-400 mt-3">
                  <span x-text="files.length"></span> file · <span x-text="totalSizeLabel"></span>
                </p>
              </div>
            </div>
          </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select@2.6.1/dist/css/tom-select.default.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/filepond@4.31.1/dist/filepond.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.31.4/dist/tagify.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.min.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13"></script>
    <script src="https://npmcdn.com/flatpickr@4.6.13/dist/l10n/id.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.6.1/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/browser-image-compression@2.0.2/dist/browser-image-compression.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/imask@7.6.1/dist/imask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-type@1.2.9/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-size@2.2.8/dist/filepond-plugin-file-validate-size.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond@4.31.1/dist/filepond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.31.4/dist/tagify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pristinejs@0.1.11/dist/pristine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@5.0.4/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>
    {{-- Alpine.js sudah dimuat via CDN di layouts/app --}}
    <script src="{{ asset('vendor/nameera/js/forms.js') }}?v=4"></script>
@endpush