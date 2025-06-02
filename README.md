# Festivalan - Platform Manajemen Event Kampus

Festivalan adalah aplikasi web komprehensif yang dirancang untuk memudahkan pengelolaan dan partisipasi dalam berbagai acara di lingkungan kampus. Dibangun dengan framework Laravel, platform ini menyediakan alur kerja yang mulus bagi mahasiswa untuk mengajukan proposal acara, admin untuk meninjau dan menyetujuinya, serta seluruh civitas akademika untuk menemukan dan mendaftar ke acara yang diminati.

* **Autentikasi Pengguna:** Sistem registrasi dan login yang aman untuk mahasiswa dan admin.
* **Manajemen Peran:**
    * **Mahasiswa:** Dapat mengajukan proposal event, mendaftar ke event, melihat dan mengubah profil.
    * **Admin:** Dashboard khusus untuk melihat statistik event, mengelola (menyetujui/menolak) proposal event dari mahasiswa.
* **Pengajuan Event (oleh Mahasiswa):** Form intuitif untuk mengajukan event baru, lengkap dengan judul, deskripsi, jadwal (mulai & selesai), lokasi, kategori, dan unggah poster. Status awal event adalah "pending approval".
* **Moderasi Event (oleh Admin):** Admin dapat melihat daftar event yang diajukan, meninjau detailnya, dan kemudian menyetujui atau menolaknya.
* **Penjelajahan & Pendaftaran Event:**
    * Halaman Beranda menampilkan event yang telah disetujui dan akan datang.
    * Pengguna (mahasiswa) dapat mendaftar ke event.
    * Modal detail event untuk informasi lengkap tanpa meninggalkan halaman utama.
* **Manajemen Profil:** Pengguna dapat melihat dan memperbarui informasi profil mereka, termasuk nama, username, email, nomor telepon, bio, dan avatar.
* **Halaman Statis:** Termasuk halaman "Tentang Kami", "Layanan", "Galeri", dan "Kontak".
* **Desain Responsif:** Antarmuka pengguna yang dibangun dengan Tailwind CSS, memastikan pengalaman yang baik di berbagai perangkat.
* **Interaktivitas Frontend:** Penggunaan JavaScript untuk fitur seperti modal dinamis, validasi form, dan pendaftaran event via AJAX.

## 🚀 Teknologi yang Digunakan

* **Backend:** Laravel (PHP)
* **Frontend:**
    * Blade Templating Engine
    * Tailwind CSS
    * JavaScript (ES6+)
    * Font Awesome (untuk ikon)
* **Database:** (Sebutkan database Anda, misal: MySQL, PostgreSQL) - Terstruktur menggunakan Laravel Migrations & Seeders.
* **Konsep Utama Laravel yang Diimplementasikan:**
    * Model-View-Controller (MVC)
    * Eloquent ORM (untuk interaksi database dan relasi antar model: `User`, `Event`, `event_user` pivot table)
    * Routing (termasuk Route Model Binding dan Route Groups dengan Prefix & Naming)
    * Middleware (untuk autentikasi dan otorisasi berbasis peran - `RoleMiddleware`)
    * Validation (untuk form input)
    * File Storage (untuk avatar pengguna dan poster event)
    * Laravel Mix/Vite (jika digunakan, untuk kompilasi aset)

## 🔩 Arsitektur & Alur Penting

1.  **Autentikasi & Otorisasi:**
    * `AuthController` menangani registrasi, login, logout, dan manajemen profil.
    * `RoleMiddleware` melindungi rute berdasarkan peran pengguna (`mahasiswa` atau `admin`), memastikan hanya pengguna yang berhak yang dapat mengakses fungsionalitas tertentu.
2.  **Alur Pengajuan & Persetujuan Event:**
    * Mahasiswa mengisi form di `registerevent.blade.php`, data dikirim ke `EventController@registerEvent`.
    * Event disimpan dengan status `pending_approval`.
    * Admin melihat daftar event pending di `admin.event_proposals` (dari `AdminController@listEventProposals`).
    * Admin dapat menyetujui (`AdminController@approveEvent`) atau menolak (`AdminController@rejectEvent`) event, yang akan mengubah status event di database.
3.  **Pendaftaran Event oleh Mahasiswa:**
    * Di halaman Beranda (`Beranda.blade.php`), tombol "Daftar" pada event akan memicu request AJAX ke `EventController@registerUserToEvent`.
    * Controller memvalidasi dan mencatat pendaftaran di tabel pivot `event_user` menggunakan relasi Eloquent (`attach()`).
    * Frontend menerima respons JSON dan memberikan feedback kepada pengguna.
4.  **Relasi Model:**
    * `User` memiliki relasi `hasMany` ke `Event` (event yang dibuat) dan `belongsToMany` ke `Event` (event yang didaftari).
    * `Event` memiliki relasi `belongsTo` ke `User` (pembuat event) dan `belongsToMany` ke `User` (peserta yang terdaftar).

## 🛠️ Setup & Instalasi (Contoh)

1.  Clone repositori: `git clone https://github.com/USERNAME/NAMA_REPO.git`
2.  Masuk ke direktori proyek: `cd NAMA_REPO`
3.  Install dependensi PHP: `composer install`
4.  Salin file `.env.example` menjadi `.env`: `cp .env.example .env`
5.  Generate application key: `php artisan key:generate`
6.  Konfigurasi koneksi database Anda di file `.env`.
7.  Jalankan migrasi database: `php artisan migrate`
8.  (Opsional) Jalankan seeder untuk data awal: `php artisan db:seed`
9.  Buat symbolic link untuk storage: `php artisan storage:link`
10. Jalankan server development: `php artisan serve`

Aplikasi akan tersedia di `http://localhost:8000`.

---
