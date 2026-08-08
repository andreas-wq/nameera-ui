# Nameera UI — Laravel Premium Admin Template

Nameera UI adalah starter kit antarmuka admin kelas atas yang dibangun khusus untuk ekosistem Laravel. Dirancang menggunakan **Tailwind CSS**, **Alpine.js** (via CDN), dan **Chart.js**, package ini menawarkan pendekatan _plug-and-play_.

Tanpa perlu konfigurasi _frontend_ yang rumit, Anda bisa langsung memiliki _dashboard_ modern, form, tabel, dan halaman autentikasi yang sepenuhnya responsif dalam hitungan detik.

---

## 🌟 Fitur Utama

- **Plug & Play:** Terintegrasi langsung dengan Laravel melalui Service Provider (auto-discovery).
- **Modern Stack:** Support Tailwind CSS v3 & v4 (via Vite), Alpine.js (CDN), dan Chart.js (CDN).
- **Komponen Lengkap:** Buttons, Badges, Modals, Toasts, Skeletons, Sidenav, dll.
- **Halaman Siap Pakai:** Dashboard Analytics, Login, Register, 404 Error (Standalone Page).
- **Form Lengkap:** Form dasar, form dengan plugin pihak ketiga (Flatpickr, Quill, Choices.js, IMask, FilePond, Tagify), dan form multi-step.
- **Advanced Data Tables:** Dukungan untuk tabel dasar, List.js, dan Alpine-based tables.
- **Dark Mode Ready:** Sistem mode gelap bawaan dengan pencegahan _flash of wrong theme_ (FOUC).

---

## 🚀 Persyaratan Sistem

| Komponen           | Versi                                     |
| ------------------ | ----------------------------------------- |
| **PHP**            | ^8.1                                      |
| **Laravel**        | ^10.0 / ^11.0 / ^12.0 / ^13.0             |
| **Node.js & Vite** | Diperlukan untuk kompilasi aset front-end |

---

## 📦 Cara Instalasi (Step-by-Step)

### Langkah 1: Tambahkan Repositori (VCS)

Buka file `composer.json` di proyek Laravel utama Anda, dan tambahkan blok `repositories`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/andreas-wq/nameera-ui.git"
    }
]
```

> **Tips Development Lokal:** Jika mengembangkan paket di komputer yang sama, gunakan tipe `path`:
>
> ```json
> "repositories": [
>     {
>         "type": "path",
>         "url": "../nameera-ui"
>     }
> ]
> ```

---

### Langkah 2: Install Package via Composer

```bash
composer require nameera/ui-template
```

> Package akan otomatis ter-discover oleh Laravel melalui `NameeraUiServiceProvider` (tidak perlu daftar manual di `config/app.php`).

---

### Langkah 3: Publikasikan Aset (Wajib)

```bash
php artisan vendor:publish --tag=nameera-assets
```

Perintah ini akan meng-copy file-file berikut ke folder `public/vendor/nameera/`:

```
public/vendor/nameera/
├── css/
│   └── style.css       ← Variabel warna, font, scrollbar, tema plugin
├── js/
│   ├── app.js          ← Logika Alpine (sidebar, dark mode, custom table)
│   └── forms.js        ← Logika Alpine untuk form special & custom
```

---

### Langkah 4: Konfigurasi CSS (Tailwind v4 / v3)

Pilih konfigurasi sesuai versi Tailwind CSS pada proyek Laravel Anda.

#### Opsi A: Tailwind CSS v4 (Laravel 11+ / Default Terbaru)

Buka file **`resources/css/app.css`** di proyek utama Anda dan **ganti seluruh isinya** dengan:

```css
/* 1. Import Tailwind CSS v4 */
@import "tailwindcss";

/* 2. Wajib: Daftarkan variant 'dark' agar class-based Dark Mode berjalan */
@variant dark (&:where(.dark, .dark *));

/* 3. Scan semua view package Nameera UI agar utility class-nya ter-generate */
@source "../../vendor/nameera/ui-template/resources/views/**/*.blade.php";

/* 4. Import CSS variabel bawaan package (dari source, bukan dari public) */
@import "../../vendor/nameera/ui-template/public/css/style.css";

/* 5. Definisikan pemetaan warna & font di @theme */
@theme {
  --color-primary: var(--primary, #3b6d11);
  --color-primary-mid: var(--primary-mid, #639922);
  --color-primary-light: var(--primary-light, #c0dd97);
  --color-primary-bg: var(--primary-bg, #eaf3de);

  --color-accent: var(--accent, #ba7517);
  --color-accent-bg: var(--accent-bg, #faeeda);

  --color-dark: var(--dark, #1a2e1a);
  --color-dark-mid: var(--dark-mid, #27500a);

  --font-heading: var(--font-heading, "Plus Jakarta Sans", sans-serif);
  --font-body: var(--font-body, "Nunito", sans-serif);

  --radius-xl: 1rem;
  --radius-2xl: 1.5rem;
  --radius-3xl: 2rem;
}
```

> **Catatan:** File contoh lengkap juga tersedia di `vendor/nameera/ui-template/examples/tailwind-v4-app.css`.

#### Opsi B: Tailwind CSS v3 (File `tailwind.config.js`)

Tambahkan path views package ke array `content` di **`tailwind.config.js`**:

```javascript
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/nameera/ui-template/resources/views/**/*.blade.php",
  ],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: "var(--primary, #3b6d11)",
          mid: "var(--primary-mid, #639922)",
          light: "var(--primary-light, #c0dd97)",
          bg: "var(--primary-bg, #eaf3de)",
        },
        accent: {
          DEFAULT: "var(--accent, #ba7517)",
          bg: "var(--accent-bg, #faeeda)",
        },
        dark: {
          DEFAULT: "var(--dark, #1a2e1a)",
          mid: "var(--dark-mid, #27500a)",
        },
      },
      fontFamily: {
        heading: ["var(--font-heading)", "Plus Jakarta Sans", "sans-serif"],
        body: ["var(--font-body)", "Nunito", "sans-serif"],
      },
    },
  },
  plugins: [],
};
```

Dan atur **`resources/css/app.css`** menjadi:

```css
@import "../../vendor/nameera/ui-template/public/css/style.css";

@tailwind base;
@tailwind components;
@tailwind utilities;
```

---

### Langkah 5: Konfigurasi JavaScript

#### ⚠️ PENTING — Jangan Install Alpine.js via NPM

Package ini sudah memuat **Alpine.js** dan **Alpine Collapse** melalui CDN di dalam layout Blade bawaan:

```html
<!-- Sudah dimuat otomatis oleh layout package -->
<script
  defer
  src="https://unpkg.com/@alpinejs/collapse@3.14.1/dist/cdn.min.js"
></script>
<script defer src="https://unpkg.com/alpinejs@3.14.1/dist/cdn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
```

Jika proyek Laravel Anda belum memiliki file **`resources/js/app.js`**, cukup buat file kosong atau minimal:

```javascript
// resources/js/app.js
// Alpine.js sudah dimuat via CDN oleh Nameera UI layout.
// Jangan import Alpine di sini untuk menghindari konflik double-initialization.
```

> **Jika proyek Anda sudah menggunakan Alpine via npm** (`import Alpine from 'alpinejs'`), Anda perlu memilih salah satu:
>
> 1. **Hapus** import Alpine dari `resources/js/app.js` (gunakan CDN dari package), **atau**
> 2. **Override** layout Blade package untuk menghapus tag `<script>` CDN Alpine, lalu gunakan Alpine dari npm Anda sendiri.

---

### Langkah 6: Pastikan Vite Memproses File CSS & JS

Pastikan file **`vite.config.js`** di proyek Anda memproses `resources/css/app.css` dan `resources/js/app.js`:

```javascript
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"],
      refresh: true,
    }),
  ],
});
```

---

### Langkah 7: Kompilasi Aset & Jalankan

```bash
# Development (dengan hot-reload)
npm run dev

# Atau build untuk production
npm run build
```

Lalu jalankan server Laravel:

```bash
php artisan serve
```

Buka browser dan akses: **`http://localhost:8000/nameera/dashboard`** 🎉

---

## ✅ Checklist Instalasi (Quick Reference)

```
1. [ ] Tambahkan repositori VCS di composer.json
2. [ ] composer require nameera/ui-template
3. [ ] php artisan vendor:publish --tag=nameera-assets
4. [ ] Konfigurasi resources/css/app.css (Tailwind v4 atau v3)
5. [ ] Pastikan resources/js/app.js TIDAK mengimport Alpine.js
6. [ ] npm run dev (atau npm run build)
7. [ ] php artisan serve → buka /nameera/dashboard
```

---

## 🎯 Halaman & Route yang Tersedia

Semua route menggunakan prefix `/nameera`. Berikut daftar lengkap halaman yang bisa diakses:

### Halaman Utama

| Halaman             | URL                  | Keterangan                   |
| ------------------- | -------------------- | ---------------------------- |
| Dashboard Analytics | `/nameera/dashboard` | Menggunakan layout + sidebar |
| Login               | `/nameera/login`     | Standalone (tanpa sidebar)   |
| Register            | `/nameera/register`  | Standalone (tanpa sidebar)   |
| Error 404           | `/nameera/error-404` | Standalone (tanpa sidebar)   |

### Komponen UI

| Halaman          | URL                      |
| ---------------- | ------------------------ |
| Base UI          | `/nameera/comp-base`     |
| Navigation       | `/nameera/comp-nav`      |
| Feedback         | `/nameera/comp-feedback` |
| Data Display     | `/nameera/comp-data`     |
| Advanced Widgets | `/nameera/comp-advanced` |

### Tabel

| Halaman       | URL                      | Keterangan                  |
| ------------- | ------------------------ | --------------------------- |
| Basic Table   | `/nameera/table-basic`   | Tabel HTML statis           |
| Special Table | `/nameera/table-special` | Menggunakan List.js (CDN)   |
| Custom Table  | `/nameera/table-custom`  | Alpine.js pagination & sort |

### Form

| Halaman      | URL                     | Keterangan                                                |
| ------------ | ----------------------- | --------------------------------------------------------- |
| Form Basic   | `/nameera/form-basic`   | Input standar HTML                                        |
| Form Special | `/nameera/form-special` | Flatpickr, IMask, Choices.js, Quill, FilePond (semua CDN) |
| Form Custom  | `/nameera/form-custom`  | Multi-step wizard, rating, color picker, Tagify (CDN)     |

---

## 🔧 Kustomisasi & Overriding

### 1. Override View Blade

Buat file Blade baru di proyek utama Anda pada path yang sesuai:

```
resources/views/vendor/nameera/
├── components/
│   ├── sidebar.blade.php     ← Override sidebar
│   └── header.blade.php      ← Override header
├── layouts/
│   └── app.blade.php         ← Override layout utama
└── pages/
    └── dashboard.blade.php   ← Override halaman tertentu
```

### 2. Kustomisasi Warna Tema

Ubah nilai variabel CSS di file yang sudah dipublikasikan `public/vendor/nameera/css/style.css`:

```css
:root {
  --primary: #1d4ed8; /* Ganti ke warna biru */
  --primary-mid: #2563eb;
  --primary-light: #93c5fd;
  --primary-bg: #dbeafe;
  /* ... dst */
}
```

Jika menggunakan **Tailwind v4**, pastikan juga memperbarui nilai fallback di blok `@theme` pada `resources/css/app.css` agar konsisten.

---

## 🧩 Struktur Direktori Package

```
nameera-ui/
├── src/
│   └── NameeraUiServiceProvider.php   ← Auto-discovered oleh Laravel
├── resources/
│   └── views/
│       ├── components/
│       │   ├── header.blade.php
│       │   └── sidebar.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       └── pages/
│           ├── dashboard.blade.php
│           ├── login.blade.php
│           ├── register.blade.php
│           ├── error-404.blade.php
│           ├── comp-base.blade.php
│           ├── comp-nav.blade.php
│           ├── comp-feedback.blade.php
│           ├── comp-data.blade.php
│           ├── comp-advanced.blade.php
│           ├── table-basic.blade.php
│           ├── table-special.blade.php
│           ├── table-custom.blade.php
│           ├── form-basic.blade.php
│           ├── form-special.blade.php
│           └── form-custom.blade.php
├── public/
│   ├── css/
│   │   └── style.css
│   └── js/
│       ├── app.js
│       └── forms.js
├── routes/
│   └── web.php
├── examples/
│   └── tailwind-v4-app.css            ← Contoh konfigurasi app.css (Tailwind v4)
├── composer.json
└── README.MD
```

---

## ❓ Troubleshooting

### Tailwind class tidak bekerja (bg-primary, text-dark, dll)

- Pastikan `@source` path sudah benar di `app.css` (Tailwind v4) atau `content` array di `tailwind.config.js` (Tailwind v3).
- Jalankan `npm run build` ulang setelah mengubah konfigurasi.

### Dark Mode tidak berfungsi

- **Tailwind v4:** Pastikan ada `@variant dark (&:where(.dark, .dark *));` di `app.css`.
- **Tailwind v3:** Pastikan ada `darkMode: "class"` di `tailwind.config.js`.

### Error "Alpine is not defined" atau Alpine berjalan dua kali

- Package ini memuat Alpine.js via CDN. **Jangan** import Alpine di `resources/js/app.js`.
- Jika sudah terlanjur import, hapus baris `import Alpine from 'alpinejs'` beserta `Alpine.start()`.

### Error saat `npm run build` — file CSS tidak ditemukan

- Pastikan sudah menjalankan `composer require nameera/ui-template` terlebih dahulu.
- Path `@import` di `app.css` mengarah ke `../../vendor/nameera/ui-template/public/css/style.css` (dari source package, bukan dari folder `public/`).

### Halaman kosong / 404

- Pastikan sudah menjalankan `php artisan vendor:publish --tag=nameera-assets`.
- Cek apakah route terdaftar: `php artisan route:list --path=nameera`.

---

## 🤝 Kontribusi

Jika Anda ingin berkontribusi atau menemukan bug, silakan buat _issue_ atau _pull request_ pada [repositori GitHub](https://github.com/andreas-wq/nameera-ui).

---

## 📄 Lisensi

Package ini dilisensikan di bawah [MIT License](LICENSE).
