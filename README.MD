# Nameera UI - Laravel Premium Admin Template

Nameera UI adalah starter kit antarmuka admin kelas atas yang dibangun khusus untuk ekosistem Laravel. Dirancang menggunakan **Tailwind CSS**, **Alpine.js**, dan **Chart.js**, package ini menawarkan pendekatan _plug-and-play_.

Tanpa perlu konfigurasi _frontend_ yang rumit, Anda bisa langsung memiliki _dashboard_ modern, form, tabel, dan halaman autentikasi yang sepenuhnya responsif dalam hitungan detik.

## 🌟 Fitur Utama

- **Plug & Play:** Terintegrasi langsung dengan Laravel melalui Service Provider.
- **Modern Stack:** Tailwind CSS (via Vite) & Alpine.js untuk reaktivitas.
- **Komponen Lengkap:** Buttons, Badges, Modals, Toasts, Skeletons, Sidenav, dll.
- **Halaman Siap Pakai:** Dashboard Analytics (v1 & v2), Login, Register, 404 Error.
- **Advanced Data Tables:** Dukungan untuk tabel dasar, List.js, dan Alpine-based tables.
- **Dark Mode Ready:** Dukungan mode gelap bawaan yang mulus.

---

## 🚀 Persyaratan Sistem

- **PHP:** ^8.1
- **Laravel:** ^10.0 atau ^11.0
- **Node.js & Vite:** (Opsional, untuk development) – diperlukan jika ingin mengompilasi aset front‑end sendiri.

---

## 📦 Cara Instalasi

Karena package ini di‑host secara mandiri di GitHub (belum ada di Packagist), Anda perlu mendaftarkan repositori ini di file `composer.json` proyek Laravel utama Anda.

### Langkah 1: Tambahkan Repositori

Buka file `composer.json` di proyek Laravel Anda, dan tambahkan blok `repositories` berikut:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/andreas-wq/nameera-ui"
    }
],
```

### Langkah 2: Install Package

Jalankan perintah berikut di terminal proyek Laravel Anda:

```bash
composer require nameera/ui-template
```

### Langkah 3: Publikasikan Aset (Wajib)

Package ini menyediakan file CSS dan JS kustom yang harus dipublikasikan ke folder `public/vendor/nameera`. Jalankan perintah:

```bash
php artisan vendor:publish --tag=nameera-assets
```

Setelah itu, file‑file berikut akan tersedia:

- `public/vendor/nameera/css/style.css`
- `public/vendor/nameera/js/app.js`

### Langkah 4: Konfigurasi Tailwind CSS (Vite)

Package ini didesain untuk lingkungan production menggunakan standar Laravel Vite. Agar Tailwind CSS di project utama Anda mengenali class yang ada di dalam package Nameera UI, Anda wajib menambahkan path views package ke dalam array `content` pada file `tailwind.config.js` di root project Laravel Anda:

```javascript
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    // Tambahkan baris di bawah ini agar Tailwind memindai UI package Nameera:
    "./vendor/nameera/ui-template/resources/views/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
```

#### Untuk Tailwind CSS v4 (Laravel 11+ dengan `@tailwind` directive)

Jika project Anda menggunakan Tailwind CSS v4 (yang menggunakan file `app.css` dengan arahan `@import "tailwindcss";`), Anda perlu menambahkan pemindaian source dan mendefinisikan variabel tema.

1. **Import file CSS package** di `resources/css/app.css`:

   ```css
   @import "tailwindcss";
   @import "../../vendor/nameera/ui-template/public/css/style.css";
   ```

2. **Tambahkan directive `@source`** untuk memindai view package:

   ```css
   @source "../../vendor/nameera/ui-template/resources/views/**/*.blade.php";
   ```

3. **Definisikan pemetaan warna di `@theme`** (opsional, jika ingin menggunakan variabel CSS sebagai warna tema):
   ```css
   @theme {
     --color-primary: var(--primary, #3b6d11);
     --color-primary-mid: var(--primary-mid, #639922);
     --color-primary-light: var(--primary-light, #c0dd97);
     --color-dark: var(--dark, #1a2e1a);
     --font-heading: var(--font-heading, "Plus Jakarta Sans", sans-serif);
     --font-body: var(--font-body, "Nunito", sans-serif);
   }
   ```

Dengan konfigurasi di atas, utility class seperti `bg-primary`, `hover:bg-primary-mid`, `text-dark`, dan `font-heading` akan langsung bekerja.

### Langkah 5: Tambahkan Vite Directive di Layout Utama

Pastikan layout utama Laravel project Anda (biasanya `resources/views/layouts/app.blade.php` atau layout serupa) memuat Vite dengan directive berikut:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

Package Nameera UI sudah menggunakan directive `@vite` di layout internalnya, sehingga project utama Anda hanya perlu menyediakan file `resources/css/app.css` dan `resources/js/app.js` yang dihasilkan oleh Vite.

---

## 🎯 Cara Menggunakan

Setelah instalasi selesai, Anda dapat mengakses halaman‑halaman UI melalui route berikut (semua route diawali dengan prefix `/nameera`):

- **Dashboard** – `/nameera/dashboard`
- **Login** – `/nameera/login`
- **Register** – `/nameera/register`
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

## 🔧 Customization

### 1. Override View

Anda dapat menimpa (override) view bawaan package dengan membuat file Blade di folder `resources/views/vendor/nameera/` di project Laravel utama Anda.

Contoh: untuk mengganti layout sidebar, buat file:

```
resources/views/vendor/nameera/components/sidebar.blade.php
```

### 2. Custom CSS/JS

File CSS dan JS kustom yang sudah dipublikasikan dapat diedit langsung di:

- `public/vendor/nameera/css/style.css`
- `public/vendor/nameera/js/app.js`

Perubahan di file tersebut akan langsung diterima tanpa perlu rebuild Vite.

---

## 🧩 Struktur Package

```
nameera-ui/
├── src/
│   └── NameeraUiServiceProvider.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── components/
│   │   └── pages/
│   └── ...
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

Jika Anda ingin berkontribusi atau melaporkan bug, silakan buka _issue_ atau _pull request_ di repositori GitHub.

---

## 📄 Lisensi

Package ini dilisensikan di bawah [MIT License](LICENSE).
