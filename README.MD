Berikut adalah perbaikan penuh untuk file **`README.md`** paket **Nameera UI**. Dokumentasi ini sudah menyempurnakan bagian konfigurasi **Tailwind CSS v4** (termasuk pendaftaran `@variant dark` yang wajib agar Dark Mode berjalan), penyetelan `resources/js/app.js`, serta memperjelas seluruh alur instalasi agar bebas dari bug.

````markdown
# Nameera UI - Laravel Premium Admin Template

Nameera UI adalah starter kit antarmuka admin kelas atas yang dibangun khusus untuk ekosistem Laravel. Dirancang menggunakan **Tailwind CSS**, **Alpine.js**, dan **Chart.js**, package ini menawarkan pendekatan _plug-and-play_.

Tanpa perlu konfigurasi _frontend_ yang rumit, Anda bisa langsung memiliki _dashboard_ modern, form, tabel, dan halaman autentikasi yang sepenuhnya responsif dalam hitungan detik.

---

## 🌟 Fitur Utama

- **Plug & Play:** Terintegrasi langsung dengan Laravel melalui Service Provider.
- **Modern Stack:** Support Tailwind CSS v3 & v4 (via Vite) serta Alpine.js.
- **Komponen Lengkap:** Buttons, Badges, Modals, Toasts, Skeletons, Sidenav, dll.
- **Halaman Siap Pakai:** Dashboard Analytics, Login, Register, 404 Error (Standalone Page).
- **Advanced Data Tables:** Dukungan untuk tabel dasar, List.js, dan Alpine-based tables.
- **Dark Mode Ready:** Sistem mode gelap bawaan dengan pencegahan _flash of wrong theme_ (FOUC).

---

## 🚀 Persyaratan Sistem

- **PHP:** ^8.1
- **Laravel:** ^10.0 atau ^11.0
- **Node.js & Vite:** Diperlukan untuk kompilasi aset front-end aplikasi utama.

---

## 📦 Cara Instalasi

### Langkah 1: Tambahkan Repositori (vcs)

Buka file `composer.json` di proyek Laravel utama Anda, dan tambahkan blok `repositories` berikut:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "[https://github.com/andreas-wq/nameera-ui.git](https://github.com/andreas-wq/nameera-ui.git)"
    }
]
```
````

> **Tips Development Lokal:** Jika mengembangkan paket di komputer yang sama, Anda juga dapat menggunakan lokasi folder lokal:
>
> ```json
> "repositories": [
>     {
>         "type": "path",
>         "url": "../packages/nameera/ui-template"
>     }
> ]
>
> ```

---

### Langkah 2: Install Package via Composer

Jalankan perintah berikut di terminal proyek Laravel Anda:

```bash
composer require nameera/ui-template

```

---

### Langkah 3: Publikasikan Aset Kustom (Wajib)

Package ini menyediakan file CSS dan JS bawaan yang perlu dipublikasikan ke folder `public/vendor/nameera`. Jalankan perintah:

```bash
php artisan vendor:publish --tag=nameera-assets

```

Langkah ini akan mengekstrak file berikut:

- `public/vendor/nameera/css/style.css`
- `public/vendor/nameera/js/app.js`

---

### Langkah 4: Konfigurasi CSS (Tailwind v4 / v3)

Pilih konfigurasi yang sesuai dengan versi Tailwind CSS pada proyek Laravel Anda:

#### Opsi A: Tailwind CSS v4 (Laravel 11+ / Default Terbaru)

Buka file **`resources/css/app.css`** di proyek utama Anda dan susun sesuai struktur berikut:

```css
@import "tailwindcss";

/* 1. Wajib: Daftarkan variant 'dark' agar Dark Mode berjalan dengan class .dark di <html> */
@variant dark (&:where(.dark, .dark *));

/* 2. Daftarkan path pemindaian view package Nameera UI */
@source "../../vendor/nameera/ui-template/resources/views/**/*.blade.php";

/* 3. Import CSS variabel bawaan package */
@import "../../public/vendor/nameera/css/style.css";

/* 4. Definisikan pemetaan warna & font di @theme */
@theme {
  --color-primary: var(--primary, #3b6d11);
  --color-primary-mid: var(--primary-mid, #639922);
  --color-primary-light: var(--primary-light, #c0dd97);
  --color-primary-bg: var(--primary-bg, #eaf3de);

  --color-accent: var(--accent, #ba7517);
  --color-accent-bg: var(--accent-bg, #faeeda);

  --color-dark: var(--dark, #1a2e1a);
  --color-dark-mid: var(--dark-mid, #27500a);

  --font-heading: var(--font-heading), "Plus Jakarta Sans", sans-serif;
  --font-body: var(--font-body), "Nunito", sans-serif;

  --radius-xl: 0.75rem;
  --radius-2xl: 1rem;
  --radius-3xl: 1.5rem;
}
```

#### Opsi B: Tailwind CSS v3 (File `tailwind.config.js`)

Jika proyek Anda masih menggunakan Tailwind v3, tambahkan path views package ke dalam array `content` di file **`tailwind.config.js`**:

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

Dan import `style.css` pada bagian paling atas file **`resources/css/app.css`**:

```css
@import "../../public/vendor/nameera/css/style.css";

@tailwind base;
@tailwind components;
@tailwind utilities;
```

---

### Langkah 5: Konfigurasi JavaScript & Alpine.js

Buka file **`resources/js/app.js`** proyek utama Anda untuk menginisialisasi Alpine.js:

```javascript
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();
```

---

### Langkah 6: Kompilasi Aset Vite

Setelah menyelesaikan seluruh konfigurasi di atas, jalankan perintah kompilasi Vite:

```bash
npm run build
# Atau untuk mode development:
npm run dev

```

---

## 🎯 Cara Menggunakan

Package ini secara otomatis memuat route kustom melalui `NameeraServiceProvider`. Anda dapat mengakses halaman sampel berikut di browser (prefix `/nameera`):

- **Dashboard** – `/nameera/dashboard`
- **Login (Standalone)** – `/nameera/login`
- **Register (Standalone)** – `/nameera/register`
- **404 Error Page** – `/nameera/error-404`

**Komponen UI:**

- Base UI – `/nameera/comp-base`
- Navigation – `/nameera/comp-nav`
- Feedback – `/nameera/comp-feedback`
- Data Display – `/nameera/comp-data`
- Advanced Widgets – `/nameera/comp-advanced`

**Tabel:**

- Basic Table – `/nameera/table-basic`
- Special Table – `/nameera/table-special`
- Custom Table – `/nameera/table-custom`

---

## 🔧 Kustomisasi & Overriding

### 1. Override View Blade

Anda dapat menimpa (_override_) komponen visual bawaan paket dengan membuat file Blade baru pada direktori proyek utama:

```
resources/views/vendor/nameera/components/sidebar.blade.php

```

### 2. Kustomisasi Kode Warna (`:root`)

Untuk mengubah tema warna default (misalnya mengubah warna hijau utama menjadi biru), Anda tidak perlu mengubah file konfigurasi JavaScript. Cukup ubah nilai Hex pada file `public/vendor/nameera/css/style.css`:

```css
:root {
  --primary: #1d4ed8;       /* Ganti warna utama di sini */
  --primary-mid: #2563eb;   /* Ganti warna hover di sini */
  --primary-light: #93c5fd;
  ...
}

```

---

## 🧩 Struktur Direktori Package

```
nameera-ui/
├── src/
│   └── NameeraServiceProvider.php
├── resources/
│   └── views/
│       ├── components/
│       ├── layouts/
│       └── pages/
├── public/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
├── routes/
│   └── web.php
├── composer.json
└── README.md

```

---

## 🤝 Kontribusi

Jika Anda ingin berkontribusi atau menemukan bug teknis, silakan buat _issue_ atau _pull request_ baru pada repositori GitHub ini.

---

## 📄 Lisensi

Package ini dilisensikan di bawah [MIT License](https://www.google.com/search?q=LICENSE).

```

```
