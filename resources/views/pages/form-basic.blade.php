@extends('nameera::layouts.app')

@section('content')
          <div>
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
                Form Basic
              </h1>
              <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Elemen form bawaan browser (native), tanpa plugin tambahan.
              </p>
            </div>

            <form
              @submit.prevent=""
              class="bg-white dark:bg-gray-800/60 border border-gray-100 dark:border-gray-700/50 rounded-3xl p-6 lg:p-8 shadow-sm"
            >
              <h3 class="font-heading font-bold text-dark dark:text-white mb-6">
                Formulir Pendaftaran Petani
              </h3>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Nama Lengkap</label
                  >
                  <input
                    type="text"
                    required
                    placeholder="cth. Siti Rahayu"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Email</label
                  >
                  <input
                    type="email"
                    required
                    placeholder="nama@email.com"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >No. Telepon</label
                  >
                  <input
                    type="tel"
                    placeholder="08xx-xxxx-xxxx"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all"
                  />
                </div>

                <div x-data="{ show: false }">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Kata Sandi</label
                  >
                  <div class="relative">
                    <input
                      :type="show ? 'text' : 'password'"
                      required
                      placeholder="Minimal 8 karakter"
                      class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all pr-11"
                    />
                    <button
                      type="button"
                      @click="show = !show"
                      class="absolute inset-y-0 right-0 px-3.5 text-gray-400 hover:text-primary transition-colors"
                    >
                      <svg
                        x-show="!show"
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        ></path>
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        ></path>
                      </svg>
                      <svg
                        x-show="show"
                        x-cloak
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.025 10.025 0 012.132-3.542m3.44-2.264A9.959 9.959 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.977 9.977 0 01-4.132 5.411M3 3l18 18"
                        ></path>
                      </svg>
                    </button>
                  </div>
                </div>

                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Jenis Kelamin</label
                  >
                  <div class="flex items-center gap-6 h-12">
                    <label class="flex items-center gap-2 cursor-pointer">
                      <input
                        type="radio"
                        name="gender"
                        class="w-4 h-4 accent-primary cursor-pointer"
                        checked
                      />
                      <span
                        class="text-sm font-medium text-gray-600 dark:text-gray-300"
                        >Laki-laki</span
                      >
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                      <input
                        type="radio"
                        name="gender"
                        class="w-4 h-4 accent-primary cursor-pointer"
                      />
                      <span
                        class="text-sm font-medium text-gray-600 dark:text-gray-300"
                        >Perempuan</span
                      >
                    </label>
                  </div>
                </div>

                <div>
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Jenis Komoditas</label
                  >
                  <div class="relative">
                    <select
                      class="w-full appearance-none rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 pr-10 text-sm font-medium text-dark dark:text-gray-100 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all cursor-pointer"
                    >
                      <option>Manggis</option>
                      <option>Nanas</option>
                      <option>Olahan</option>
                      <option>Lainnya</option>
                    </select>
                    <svg
                      class="pointer-events-none absolute right-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                      ></path>
                    </svg>
                  </div>
                </div>

                <div x-data="{ luas: 2 }">
                  <label
                    class="flex items-center justify-between text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                  >
                    <span>Luas Lahan</span>
                    <span
                      class="text-primary dark:text-primary-light font-extrabold"
                      x-text="luas + ' Ha'"
                    ></span>
                  </label>
                  <input
                    type="range"
                    min="0"
                    max="10"
                    step="0.5"
                    x-model="luas"
                    class="w-full h-2 rounded-full accent-primary cursor-pointer"
                  />
                </div>

                <div class="flex items-center justify-between">
                  <div>
                    <label
                      class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1"
                      >Status Aktif</label
                    >
                    <p class="text-xs text-gray-400">
                      Nonaktifkan jika anggota berhenti musim ini
                    </p>
                  </div>
                  <label
                    class="relative inline-flex items-center cursor-pointer"
                  >
                    <input type="checkbox" checked class="sr-only peer" />
                    <div
                      class="w-11 h-6 bg-gray-200 dark:bg-gray-700 rounded-full peer-checked:bg-primary transition-colors duration-300"
                    ></div>
                    <div
                      class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow-sm transition-transform duration-300 peer-checked:translate-x-5"
                    ></div>
                  </label>
                </div>

                <div class="md:col-span-2">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Alamat Kebun</label
                  >
                  <textarea
                    rows="3"
                    placeholder="Dusun, desa, kecamatan, kabupaten..."
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-4 py-2.5 text-sm font-medium text-dark dark:text-gray-100 placeholder:text-gray-400 placeholder:font-normal focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all resize-none"
                  ></textarea>
                </div>

                <div class="md:col-span-2">
                  <label
                    class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2"
                    >Upload Foto KTP</label
                  >
                  <input
                    type="file"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2.5 file:px-5 file:rounded-l-[11px] file:rounded-r-none file:border-0 file:bg-primary file:text-white file:font-bold file:text-sm hover:file:bg-primary-mid file:cursor-pointer file:transition-colors cursor-pointer"
                  />
                </div>

                <div class="md:col-span-2">
                  <label class="flex items-start gap-3 cursor-pointer">
                    <input
                      type="checkbox"
                      required
                      class="w-4 h-4 rounded accent-primary cursor-pointer mt-0.5"
                    />
                    <span class="text-sm text-gray-600 dark:text-gray-300"
                      >Saya menyetujui syarat & ketentuan keanggotaan
                      koperasi.</span
                    >
                  </label>
                </div>
              </div>

              <div
                class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700/50"
              >
                <button
                  type="submit"
                  class="inline-flex items-center justify-center rounded-xl bg-primary hover:bg-primary-mid text-white font-bold text-sm px-6 py-2.5 transition-colors"
                >
                  Simpan Data
                </button>
                <button
                  type="reset"
                  class="inline-flex items-center justify-center rounded-xl text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 font-bold text-sm px-6 py-2.5 transition-colors"
                >
                  Reset
                </button>
              </div>
            </form>
          </div>
@endsection

@push('scripts')
    <!-- Alpine Plugins (Duplicate from layout, keeping just in case they are specific to forms, though layout already has them) -->
    <!-- Removed duplicate app.js since layout handles it -->
@endpush
