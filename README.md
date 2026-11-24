# Project 5 – Latihan 1
## Aplikasi Pengelolaan Data Mahasiswa dan Program Studi
Project 5 Pemrograman Berbasis Web Lanjutan                              
Riski Amanda NIM : 0702243150, Sistem Informasi 1                     
Dosen: Suendri, M.Kom · Semester Ganjil 2026/2027                              
UIN Sumatera Utara Medan, Fakultas Sains dan Teknologi                                 

Project ini merupakan aplikasi web sederhana berbasis PHP dan MySQL untuk mengelola data mahasiswa serta data program studi. Aplikasi menggunakan konsep CRUD (*Create, Read, Update, Delete*) dan pemrograman berorientasi objek sederhana melalui class `Model`, `Mahasiswa`, dan `Prodi`.

## Fitur Aplikasi

### 1. Pengelolaan Data Mahasiswa
- Menampilkan daftar mahasiswa.
- Menambahkan data mahasiswa.
- Mengubah data mahasiswa.
- Menghapus data mahasiswa.
- Menampilkan program studi yang berelasi dengan data mahasiswa.
- Mengisi NIM, nama, program studi, dan alamat mahasiswa.

### 2. Pengelolaan Data Program Studi
- Menambahkan kode dan nama program studi.
- Mengubah data program studi.
- Menghapus data program studi.
- Menampilkan daftar program studi.

## Teknologi yang Digunakan
- PHP.
- MySQL / MariaDB.
- HTML.
- PDO (*PHP Data Objects*) untuk koneksi dan pengolahan database.

## Struktur Folder dan File

```text
latihan-1_pbwl/
├── database.sql        # Script database, tabel, relasi, dan data awal prodi
├── index.php           # Halaman daftar mahasiswa
├── Mahasiswa.php       # Class untuk pengelolaan data mahasiswa
├── Model.php           # Class dasar dan koneksi database menggunakan PDO
├── Prodi.php           # Class untuk pengelolaan data program studi
├── mhsw_tambah.php     # Form tambah mahasiswa
├── mhsw_edit.php       # Form edit mahasiswa
├── prodi_tambah.php    # Form tambah program studi
├── prodi_edit.php      # Form edit program studi
├── proses.php          # Proses CRUD mahasiswa
├── proses_prodi.php    # Proses CRUD program studi
└── README.md           # Dokumentasi project
```

**Catatan:** Pada kode yang disertakan, tautan mengarah ke `prodi.php`, tetapi file `prodi.php` belum terdapat di dalam arsip project. Halaman daftar program studi perlu dibuat agar menu dan proses pengelolaan program studi dapat digunakan secara lengkap.

## Persiapan dan Instalasi

1. Instal dan jalankan **XAMPP**.
2. Aktifkan modul **Apache** dan **MySQL** melalui XAMPP Control Panel.
3. Ekstrak folder `latihan-1_pbwl` ke direktori:

   ```text
   C:\xampp\htdocs\
   ```

4. Buka phpMyAdmin melalui browser:

   ```text
   http://localhost/phpmyadmin
   ```

5. Pilih menu **Import**, lalu pilih file `database.sql` dari folder project.
6. Jalankan proses import database.
7. Periksa konfigurasi koneksi database pada file `Model.php`:

   ```php
   $dsn = "mysql:host=localhost;dbname=dbakademik;charset=utf8mb4";
   $this->db = new PDO($dsn, "root", "", $options);
   ```

   Secara default, aplikasi menggunakan database `dbakademik`, username MySQL `root`, dan password kosong. Sesuaikan konfigurasi jika pengaturan MySQL berbeda.
8. Setelah konfigurasi database dan kode diperbaiki sesuai catatan di bawah, akses aplikasi melalui:

   ```text
   http://localhost/latihan-1_pbwl/
   ```

## Struktur Database

Database yang dimaksud oleh konfigurasi `Model.php` adalah `dbakademik`. Berdasarkan struktur tabel dalam `database.sql`, terdapat dua tabel utama:

### Tabel `tb_prodi`

| Kolom | Keterangan |
|---|---|
| `prodi_id` | Primary key, bertambah otomatis |
| `prodi_kode` | Kode program studi dan bersifat unik |
| `prodi_nama` | Nama program studi |

Script SQL memasukkan tiga data awal program studi, yaitu Teknik Informatika, Sistem Informasi, dan Manajemen Informatika.

### Tabel `tb_mhsw`

| Kolom | Keterangan |
|---|---|
| `mhsw_id` | Primary key, bertambah otomatis |
| `mhsw_nim` | NIM mahasiswa dan bersifat unik |
| `prodi_id` | Foreign key yang menghubungkan mahasiswa dengan program studi |
| `mhsw_nama` | Nama mahasiswa |
| `mhsw_alamat` | Alamat mahasiswa |

Relasi `prodi_id` pada tabel `tb_mhsw` mengacu pada `prodi_id` di tabel `tb_prodi`. Jika program studi dihapus, nilai relasi mahasiswa terkait akan menjadi `NULL` sesuai aturan `ON DELETE SET NULL`.

## Catatan Perbaikan Sebelum Dijalankan

Hasil pemeriksaan file project menunjukkan beberapa bagian yang perlu disesuaikan agar aplikasi dapat berjalan dengan baik:

1. **Nama database pada `database.sql`:** script membuat database `dbakademik`, tetapi perintah berikutnya menggunakan `USE dbakademik1`. Ubah menjadi `USE dbakademik;` agar sama dengan nama database pada `Model.php`.
2. **Halaman daftar program studi:** file `prodi.php` belum ada, padahal dipanggil dari `index.php`, `prodi_tambah.php`, dan `proses_prodi.php`. Buat halaman tersebut untuk menampilkan daftar program studi beserta tautan tambah, edit, dan hapus.
3. **Parameter program studi pada proses mahasiswa:** method `simpan()` dan `update()` di `Mahasiswa.php` membutuhkan parameter `$prodiId`. Namun, pemanggilan method di `proses.php` belum mengirimkan nilai `prodi_id`. Tambahkan pembacaan `$_POST['prodi_id']` dan kirimkan sebagai parameter keempat pada kedua pemanggilan tersebut.

README ini mendokumentasikan struktur file yang terdapat pada arsip. Catatan di atas dicantumkan agar kendala yang ditemukan tidak terlewat saat proses instalasi dan pengujian.

## Cara Penggunaan

Setelah perbaikan dan konfigurasi selesai:

1. Buka halaman utama untuk melihat daftar mahasiswa.
2. Gunakan menu **Tambah Mahasiswa** untuk memasukkan NIM, nama, program studi, dan alamat.
3. Pilih **Edit** untuk memperbarui data mahasiswa.
4. Pilih **Delete** untuk menghapus data mahasiswa.
5. Buka menu **Data Program Studi** untuk mengelola kode dan nama program studi setelah halaman `prodi.php` tersedia.

## Tujuan Latihan

Project ini dapat digunakan sebagai latihan memahami:
- Penerapan CRUD menggunakan PHP dan MySQL.
- Penggunaan PDO untuk koneksi database.
- Pemisahan class model dan halaman proses.
- Penggunaan relasi *primary key* dan *foreign key*.
- Pengambilan data dari dua tabel menggunakan `LEFT JOIN`.
