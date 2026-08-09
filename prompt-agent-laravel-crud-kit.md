# 🧩 PROMPT AGENT — "Laravel CRUD Kit" Generator (Nameera UI Style)

> Salin file ini ke AI agent + lampirkan file migration. Agent WAJIB membaca pola dari:
>
> - **Form Kit**: `resources/views/pages/form-kit.blade.php`
> - **Table Kit**: `resources/views/pages/table-custom-v2.blade.php`
>
> **PENTING:** CRUD = **server-rendered, TANPA AJAX**. Tidak ada `routes/api.php`, API Resource, atau `fetch()`. Form submit via `<form method="POST">` + `@csrf`, redirect + flash session, error via `$errors`.

---

## 1. ALUR KERJA

1. Parse migration → nama tabel, kolom, tipe, `nullable()`, `default()`, `unique()`, foreign key, `enum`, `softDeletes()`.
2. Entity: snake_case plural → StudlyCase singular (`product_categories` → `ProductCategory`).
3. Generate backend (Bagian 2) + frontend (Bagian 3).
4. Buat `docs/crud/{nama-resource}.md`.
5. Ringkasan akhir: daftar file + command `artisan`/`composer` yang perlu dijalankan manual.

---

## 2. BACKEND (Laravel 13 / PHP 8.3)

### 2.1 File per resource

```
app/Models/{Entity}.php
app/Http/Controllers/{Entity}Controller.php
app/Http/Requests/{Entity}/Store{Entity}Request.php
app/Http/Requests/{Entity}/Update{Entity}Request.php
app/Policies/{Entity}Policy.php              (kalau pakai auth)
database/factories/{Entity}Factory.php
database/seeders/{Entity}Seeder.php
tests/Feature/{Entity}/{Entity}CrudTest.php  (Pest)
resources/views/{entities}/index.blade.php    ← pola Table Kit
resources/views/{entities}/create.blade.php   ← pola Form Kit
resources/views/{entities}/edit.blade.php     ← pola Form Kit
resources/views/{entities}/_form.blade.php    ← partial form
routes/web.php                                ← Route::resource (JANGAN buat file baru)
```

### 2.2 Model

- `casts()` method (bukan property): `boolean`→`'boolean'`, `decimal`→`'decimal:2'`, `json`→`'array'`, `date`→`'date'`, `dateTime`→`'datetime'`.
- `$fillable` = semua kolom **kecuali** `id`, `timestamps`, `deleted_at`, **`slug`**, **`created_by`**, **`user_id`**. JANGAN `$guarded = []`.
- `xxx_id` + FK → `belongsTo`. Relasi balik → `hasMany`. `softDeletes()` → trait `SoftDeletes`. Tambah `HasFactory`.

### 2.3 Form Request

- Rule ikut mapping Bagian 3.1. `Update` → `unique` WAJIB `->ignore($this->route('{entity}'))`.
- `authorize()` → `$this->user()->can(...)` kalau ada auth; jangan hardcode `true` kalau app punya login.
- `messages()` → bahasa Indonesia.
- **JANGAN masukkan `slug`, `created_by`, `user_id` ke `rules()`** — diisi otomatis di Controller.

### 2.4 Controller — server-rendered

```php
public function index(): View
{
    $items = Model::query()
        ->with('relasi')
        ->when(request('search'), fn ($q, $s) => $q->where('name', 'like', "%{$s}%"))
        ->when(request('status'), fn ($q, $s) => $q->where('status', $s))
        ->when(request('trashed') === 'with', fn ($q) => $q->withTrashed())
        ->when(request('trashed') === 'only', fn ($q) => $q->onlyTrashed())
        ->when(request('sort') && request('direction'),
            fn ($q) => $q->orderBy(request('sort'), request('direction')),
            fn ($q) => $q->latest())
        ->paginate(request('per_page', 10))
        ->withQueryString();

    return view('{entities}.index', compact('items'));
}

public function store(StoreRequest $request): RedirectResponse
{
    $data = $request->validated();

    // ===== KOLOM OTOMATIS (DIISI DI CONTROLLER, BUKAN DARI FORM) =====
    if (Schema::hasColumn('{table}', 'slug')) {
        $data['slug'] = Str::slug($data['name'] ?? $data['title'] ?? '');
    }
    if (Schema::hasColumn('{table}', 'created_by')) {
        $data['created_by'] = auth()->id();
    }
    if (Schema::hasColumn('{table}', 'user_id')) {
        $data['user_id'] = auth()->id();
    }
    // ===== END KOLOM OTOMATIS =====

    $item = Model::create($data);

    return redirect()->route('{entities}.index')
        ->with('success', "Data \"{$item->name}\" berhasil ditambahkan.");
}

public function update(UpdateRequest $request, Model $item): RedirectResponse
{
    $data = $request->validated();

    // slug: re-generate hanya jika name/title berubah
    if (Schema::hasColumn('{table}', 'slug') && isset($data['name'])) {
        $data['slug'] = Str::slug($data['name']);
    }
    // created_by / user_id: TIDAK diubah saat update

    $item->update($data);

    return redirect()->route('{entities}.index')
        ->with('success', "Data \"{$item->name}\" berhasil diperbarui.");
}

public function destroy(Model $item): RedirectResponse
{
    $item->delete();
    return redirect()->route('{entities}.index')
        ->with('success', "Data \"{$item->name}\" berhasil dihapus.");
}

public function bulkDestroy(): RedirectResponse
{
    $ids = request()->validate(['ids' => ['required', 'array']])['ids'];
    $count = Model::whereIn('id', $ids)->delete();
    return redirect()->route('{entities}.index')
        ->with('success', "Berhasil menghapus {$count} data terpilih.");
}
```

- `store()`/`update()` pakai `$request->validated()`, bungkus `DB::transaction()` kalau multi-tabel.
- `destroy()` = soft delete kalau pakai `SoftDeletes`. Endpoint `restore()`/`forceDestroy()` hanya kalau diminta.
- Error validasi otomatis dari Laravel → `$errors` di session → dirender di Blade.

### 2.5 Routes

```php
Route::middleware(['auth'])->group(function () {
    Route::resource('{entities}', {Entity}Controller::class);
    Route::post('{entities}/bulk-delete', [{Entity}Controller::class, 'bulkDestroy'])->name('{entities}.bulkDestroy');
});
```

### 2.6 Factory & Seeder

- Value dummy kontekstual (bukan `fake()->word()` semua): `email`→`safeEmail()`, `harga/price`→`numberBetween(10000, 500000)`, `nama/name`→`name()`.
- Seeder 15–20 baris (cukup untuk demo pagination).

### 2.7 Tests (Pest)

Cover: index (filter & sort), store (sukses + validasi gagal), update, destroy, authorization. Pakai `RefreshDatabase`.

---

## 3. MAPPING KOLOM → VALIDASI → KOMPONEN

> Komponen dirujuk dari `form-kit.blade.php` (Form) dan `table-custom-v2.blade.php` (Table).

| Tipe kolom                                     | Rule                                 | Form Kit                                          | Table Kit                                   |
| ---------------------------------------------- | ------------------------------------ | ------------------------------------------------- | ------------------------------------------- |
| `string` pendek                                | `required\|string\|max:255`          | `<input type="text">`                             | teks, sortable                              |
| `text/longText`                                | `nullable\|string`                   | **Quill**                                         | truncate + `title`                          |
| `boolean`                                      | `required\|boolean`                  | toggle switch                                     | badge Aktif/Nonaktif                        |
| `integer` (bukan FK)                           | `required\|integer`                  | `<input type="number">`                           | angka, align kanan                          |
| `decimal` bernama harga/price/biaya/gaji/total | `required\|numeric\|min:0`           | **IMask** Rupiah                                  | format Rupiah                               |
| `decimal` lain                                 | `required\|numeric`                  | `<input type="number" step="0.01">`               | angka                                       |
| `date`                                         | `required\|date`                     | **Flatpickr**                                     | `Carbon::translatedFormat('d M Y')`         |
| `dateTime/timestamp`                           | `required\|date`                     | **Flatpickr** + time                              | format tanggal+jam                          |
| `enum` / `Rule::in`                            | `required\|in:...`                   | `<select>` native (≤4 opsi) / **Tom Select** (>4) | badge warna per nilai                       |
| `xxx_id` + FK                                  | `required\|integer\|exists:...`      | **Tom Select** (opsi dari server)                 | tampilkan `relasi->nama`, filter `<select>` |
| `foto/gambar/photo/file`                       | `nullable\|image\|max:2048`          | `<input type="file">` + preview                   | thumbnail 32×32                             |
| `password`                                     | `required\|string\|min:8\|confirmed` | password + toggle                                 | **JANGAN tampilkan**                        |
| `json`                                         | `nullable\|array`                    | Tagify / repeatable                               | gabung jadi teks/badge                      |
| `softDeletes`                                  | —                                    | —                                                 | filter `?trashed=with\|only`                |
| **`slug`**                                     | — (otomatis)                         | **TIDAK ADA INPUT**                               | read-only (opsional)                        |
| **`created_by` / `user_id`**                   | — (otomatis)                         | **TIDAK ADA INPUT**                               | nama pembuat via relasi                     |

### Aturan tambahan

- `nullable()` → label tanpa `*`, rule `nullable`.
- Error validasi → `@error('field')` di bawah input, JANGAN `alert()`.
- Submit → `<form method="POST">` + `@csrf`; update `@method('PUT')`; delete `@method('DELETE')`.
- Flash success → `session('success')` di halaman index (alert hijau Nameera UI).
- Pagination → `$items->links()`.
- Relasi dropdown → `<option>` di-render server dari Controller, bukan remote AJAX.
- JavaScript hanya untuk UI enhancement (Tom Select, Flatpickr, IMask, confirm) — halaman tetap berfungsi tanpa JS.

---

## 4. CONTOH SINGKAT

Migration `products` (category_id FK, name, description nullable, price decimal, status enum, photo nullable, is_featured boolean, softDeletes):

- Model `Product` + `belongsTo(Category)`.
- Form: `name`→text, `description`→Quill, `price`→IMask Rupiah, `status`→select native, `photo`→file, `is_featured`→toggle, `category_id`→Tom Select.
- Tabel: Nama, Kategori (relasi), Harga (Rupiah), Status (badge), Featured, Foto (thumbnail), filter status + trashed.
- Routes: `Route::resource('products', ...)` + `POST /products/bulk-delete`.

---

## 5. DOKUMENTASI (`docs/crud/{nama-resource}.md`)

- Daftar route + query parameter filter/sort.
- Tabel field → tipe input frontend.
- Cara jalankan: `php artisan migrate`, `php artisan db:seed --class={Entity}Seeder`.
- Package baru yang perlu di-install.

---

## 6. OUTPUT

1. Semua file backend (isi lengkap, bukan skeleton).
2. Halaman index + create + edit + `_form` (pola Form Kit & Table Kit).
3. `docs/crud/{nama-resource}.md`.
4. Ringkasan akhir: daftar file, command manual, dan peringatan keputusan desain yang agent ambil sendiri.

---

## 7. LARANGAN

- **JANGAN pakai AJAX/API untuk CRUD** — semua server-rendered.
- **JANGAN buat input form untuk `slug`, `created_by`, `user_id`** — diisi otomatis di Controller (`slug` via `Str::slug()` dari `name`/`title`, `created_by`/`user_id` dari `auth()->id()`). Jangan panggil `auth()->id()` di Model/FormRequest.
- Jangan skip Form Request — jangan `$request->validate()` inline di Controller.
- Jangan expose `password`, token, `remember_token`.
- Jangan bikin ulang styling — pakai pola dari `form-kit.blade.php`, `table-custom-v2.blade.php`, dan `public/css/style.css`.
- Jangan hardcode `authorize() { return true; }` kalau app punya login.
- Jangan lupa `->ignore()` pada `unique` di Update Request.
- Jangan ubah migration user — usulkan perubahan di ringkasan akhir.
