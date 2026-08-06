# Nameera UI - Laravel Premium Admin Template

Nameera UI adalah starter kit antarmuka admin kelas atas yang dibangun khusus untuk ekosistem Laravel. Dirancang menggunakan **Tailwind CSS**, **Alpine.js**, dan **Chart.js**, package ini menawarkan pendekatan _plug-and-play_.

Tanpa perlu konfigurasi _frontend_ yang rumit, Anda bisa langsung memiliki _dashboard_ modern, form, tabel, dan halaman autentikasi yang sepenuhnya responsif dalam hitungan detik.

## 🌟 Fitur Utama

- **Plug & Play:** Terintegrasi langsung dengan Laravel melalui Service Provider.
- **Modern Stack:** Tailwind CSS (tanpa build step rumit) & Alpine.js untuk reaktivitas.
- **Komponen Lengkap:** Buttons, Badges, Modals, Toasts, Skeletons, Sidenav, dll.
- **Halaman Siap Pakai:** Dashboard Analytics (v1 & v2), Login, Register, 404 Error.
- **Advanced Data Tables:** Dukungan untuk tabel dasar, List.js, dan Alpine-based tables.
- **Dark Mode Ready:** Dukungan mode gelap bawaan yang mulus.

---

## 🚀 Persyaratan Sistem

- **PHP:** ^8.1
- **Laravel:** ^10.0 atau ^11.0

---

## 📦 Cara Instalasi

Karena package ini di-host secara mandiri di GitHub (belum ada di Packagist), Anda perlu mendaftarkan repositori ini di file `composer.json` proyek Laravel utama Anda.

### Langkah 1: Tambahkan Repositori

Buka file `composer.json` di proyek Laravel Anda, dan tambahkan blok `repositories` berikut:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "[https://github.com/andreas-wq/nameera-ui](https://github.com/andreas-wq/nameera-ui)"
    }
],
```
