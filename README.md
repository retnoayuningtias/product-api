# Product REST API

**Technical Test – Developer**

---

## 📌 Gambaran Umum Project

Project ini merupakan **RESTful API** yang dibangun menggunakan **CodeIgniter 4** dan **MySQL**.
API digunakan untuk mengelola data **Produk** dengan fitur **CRUD lengkap**, meliputi:

* Search
* Pagination
* Soft Delete
* Restore Data
* Force Delete (hapus permanen)

Aplikasi ini bersifat **backend-only (tanpa frontend)** dan dibuat untuk memenuhi kebutuhan **technical test**, dengan struktur kode yang rapi dan mengikuti prinsip **RESTful API**.

---

## 🛠 Tech Stack

* **Bahasa**: PHP 8+
* **Framework**: CodeIgniter 4
* **Database**: MySQL
* **Tipe Aplikasi**: REST API
* **Version Control**: Git (GitHub)

---

## 📂 Struktur Project (Ringkas)

```
app/
├── Controllers/
│   └── Api/
│       └── ProductController.php
├── Models/
│   └── ProductModel.php
├── Database/
│   ├── Migrations/
│   └── Seeders/

routes/
└── Routes.php
```

---

## 🧩 Desain Database

### Tabel: `products`

| Field       | Tipe Data       | Keterangan       |
| ----------- | --------------- | ---------------- |
| id          | BIGINT (PK)     | Primary Key      |
| name        | VARCHAR(100)    | Nama produk      |
| description | TEXT            | Deskripsi produk |
| price       | DECIMAL(10,2)   | Harga produk     |
| stock       | INT             | Stok produk      |
| created_at  | DATETIME        | Waktu dibuat     |
| updated_at  | DATETIME        | Waktu diubah     |
| deleted_at  | DATETIME (NULL) | Soft delete      |

Database menggunakan **MySQL (RDBMS)** dan dirancang agar mudah dikembangkan ke relasi tabel lain jika dibutuhkan.

---

## 🚀 Daftar API Endpoint

### 1️⃣ Get Produk (Search & Pagination)

**GET** `/api/products`

Query Parameter (opsional):

* `search` → pencarian berdasarkan nama produk
* `limit` → jumlah data per halaman

Contoh:

```
GET /api/products?search=keyboard&limit=5
```

---

### 2️⃣ Tambah Produk

**POST** `/api/products`

Request Body (JSON):

```json
{
  "name": "Mechanical Keyboard",
  "description": "RGB Backlit Keyboard",
  "price": 750000,
  "stock": 10
}
```

---

### 3️⃣ Update Produk

**PUT / PATCH** `/api/products/{id}`

Request Body (JSON):

```json
{
  "name": "Wireless Keyboard",
  "price": 850000,
  "stock": 8
}
```

---

### 4️⃣ Soft Delete Produk

**DELETE** `/api/products/{id}`

Menghapus data produk secara **soft delete** (data tidak benar-benar dihapus dari database).

---

### 5️⃣ Data Produk Terhapus (Trash)

**GET** `/api/products/trash`

Menampilkan daftar produk yang telah di soft delete.

---

### 6️⃣ Restore Produk

**POST** `/api/products/{id}/restore`

Mengembalikan produk yang sebelumnya di soft delete.

---

### 7️⃣ Force Delete Produk

**DELETE** `/api/products/{id}/force`

Menghapus produk secara **permanen** dari database.

---

## 🧪 Pengujian API

Pengujian API dilakukan menggunakan:

* **Postman**

Seluruh endpoint mengembalikan response **JSON** dan **HTTP Status Code** yang sesuai.

---

## 🗄 Database Migration & Seeder

### Migration

Migration disediakan untuk:

* Menghapus tabel lama (jika ada)
* Membuat tabel baru sesuai struktur terbaru

Jalankan:

```bash
php spark migrate
```

### Seeder

Seeder disediakan untuk:

* Menghapus data lama
* Mengisi **13 data produk awal**
* Mengatur field `created_at` dan `updated_at`

Jalankan:

```bash
php spark db:seed ProductSeeder
```

---

## ✅ Ringkasan Fitur

* RESTful API
* CRUD Produk
* Validasi input
* Search & pagination
* Soft delete, restore, dan force delete
* Struktur project rapi & scalable

---

## 📎 Catatan

* Soft delete disiapkan untuk kebutuhan admin dan keamanan data.
* Endpoint **trash** disediakan sebagai fitur tambahan (opsional).

---

## 👤 Author

**Retno Ayuningtias**

---

📌 **Branch Repository**: `development`

---
