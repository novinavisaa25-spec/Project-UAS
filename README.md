# Project-UAS
# 🚌 ARMADA PROJECT - Fleet Management System

**Kelompok 5 - Proyek Manajemen Armada Transportasi**

## 👥 Anggota Kelompok
1. Tetep Safarudin
2. Linda Anjarini
3. Novi Nopisa
4. Muhammad Rifqy Wildan
5. Rahayu Padilah
6. Aril Julfikar
7. Naufal Al Farros

---

## 📌 Daftar Isi
1. [Tentang Aplikasi](#tentang-aplikasi)
2. [Fitur Utama](#fitur-utama)
3. [Teknologi yang Digunakan](#teknologi-yang-digunakan)
4. [Persyaratan Sistem](#persyaratan-sistem)
5. [Instalasi](#instalasi)
6. [Akun Dummy untuk Testing](#akun-dummy-untuk-testing)
7. [Struktur Folder](#struktur-folder)
8. [Dokumentasi Tambahan](#dokumentasi-tambahan)
9. [Troubleshooting](#troubleshooting)

---

## 📖 Tentang Aplikasi

### Apa itu Armada Project?

**Armada Project** adalah aplikasi web berbasis Laravel yang dirancang untuk mengelola sistem armada transportasi secara menyeluruh. Platform ini menyediakan solusi lengkap untuk:

✅ **Pelanggan (Public Users)**
- Melihat informasi armada dan spesifikasi kendaraan
- Melacak status pengiriman paket secara real-time
- Melihat area layanan dan rute pengiriman
- Mengenal profil tim driver profesional
- Menghitung dan mengecek tarif pengiriman
- Melihat informasi perawatan dan maintenance kendaraan
- Menghubungi pihak perusahaan melalui WhatsApp

✅ **Admin/Staff (Authenticated Users)**
- Mengelola data armada (kendaraan)
- Mengelola profil driver dan status aktivitas
- Mengelola rute pengiriman dan area layanan
- Membuat tracking pengiriman dan generate nomor resi
- Update status pengiriman secara real-time
- Mengelola gudang/warehouse
- Mengelola paket tarif pengiriman
- Menerima notifikasi real-time untuk setiap aktivitas
- Dashboard analytics dengan statistik armada, rute, driver, dan gudang

### Visi & Misi

**Visi:** Menyediakan platform manajemen armada yang efisien, transparan, dan user-friendly untuk meningkatkan kualitas layanan transportasi.

**Misi:** 
- Mengotomatisasi proses manajemen armada
- Meningkatkan transparansi dalam pengiriman
- Memberikan pengalaman user yang excellent
- Menjamin keamanan data dan privasi pengguna

---

## 🌟 Fitur Utama

### Fitur Public (Tanpa Login)
- 🏠 **Beranda** - Homepage dengan informasi perusahaan
- 🚐 **Info Armada** - Lihat daftar dan detail kendaraan
- 🗺️ **Cek Area Layanan** - Lihat rute pengiriman yang tersedia
- 👥 **Profil Tim** - Lihat profil driver profesional
- 📦 **Cek Resi** - Lacak status pengiriman paket
- 📍 **Lokasi Gudang** - Lihat lokasi warehouse
- 🔧 **Info Perawatan** - Lihat maintenance history armada
- 💰 **Cek Ongkir** - Hitung biaya pengiriman

### Fitur Admin (Perlu Login + Role)
- 📊 **Dashboard** - Analytics & quick access ke semua fitur
- 🚐 **Manajemen Armada** - CRUD armada, status, foto
- 👤 **Manajemen Driver** - CRUD driver, SIM, rating
- 🛣️ **Manajemen Rute** - CRUD rute, lokasi, jarak, durasi
- 📦 **Manajemen Tracking** - CRUD tracking, generate resi, update status
- 📍 **Manajemen Gudang** - CRUD gudang, kapasitas, fasilitas
- 🔧 **Manajemen Service** - CRUD maintenance history
- 💰 **Manajemen Tarif** - CRUD tarif pengiriman
- 🔔 **Notifikasi** - Real-time notifications center

---

## 🔨 Teknologi yang Digunakan

### Backend
- **Framework:** Laravel 11.x
- **Database:** MySQL 8.0+
- **PHP:** 8.2+
- **Authentication:** Laravel Breeze + Spatie Laravel Permission
- **Broadcasting:** Laravel Broadcasting
- **Notifications:** Laravel Database Notifications

### Frontend
- **Templating:** Blade (Laravel Template Engine)
- **Admin UI:** AdminLTE 3.2
- **Public UI:** Bootstrap 5.3.2
- **Icons:** Font Awesome 6.4.0
- **JavaScript:** Alpine.js, jQuery
- **CSS:** Bootstrap CSS, Custom CSS

### Development Tools
- **Build Tool:** Vite
- **Testing:** PHPUnit
- **Version Control:** Git
- **Server:** Laragon / Local Laravel Server

---

## 💻 Persyaratan Sistem

### Minimum Requirements
- **OS:** Windows 10+, macOS 10.15+, atau Linux (Ubuntu 20.04+)
- **PHP:** 8.2 atau lebih tinggi
- **MySQL:** 8.0 atau lebih tinggi
- **Node.js:** 18.0 atau lebih tinggi
- **Composer:** 2.0 atau lebih tinggi

### Tools yang Harus Diinstall
- Laragon (Windows) atau LAMP/LEMP Stack
- Composer
- Node.js & npm
- Git
- Text Editor (VS Code, Sublime, etc)

---

## 📥 Instalasi

### Step 1: Clone Repository
```bash
git clone <repository-url>
cd armada-project
```

### Step 2: Install Dependencies
```bash
composer install
npm install
```

### Step 3: Setup Environment File
```bash
cp .env.example .env
```

### Step 4: Generate Application Key
```bash
php artisan key:generate
```

### Step 5: Setup Database

**Buat database `fleet_management` menggunakan salah satu metode:**

- **Laragon:** Menu → MySQL → Create Database → `fleet_management`
- **phpMyAdmin:** http://localhost/phpmyadmin → New Database → `fleet_management`
- **MySQL CLI:** `mysql -u root -e "CREATE DATABASE fleet_management;"`

### Step 6: Update .env Database Configuration
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fleet_management
DB_USERNAME=root
DB_PASSWORD=          # Kosong jika pakai Laragon default
```

### Step 7: Run Migrations & Seeders
```bash
php artisan migrate
php artisan db:seed
```

### Step 8: Build Assets
```bash
npm run build

# Atau untuk development dengan hot reload:
npm run dev
```

### Step 9: Start Development Server
```bash
# Terminal 1: Laravel server
php artisan serve
# Akses: http://127.0.0.1:8000

# Terminal 2 (opsional): Vite dev server
npm run dev
```

---

## 🔐 Akun Dummy untuk Testing

### Super Admin Account
```
Email    : superadmin@armada.com
Password : admin123
Role     : Super Admin
Akses    : Full access ke semua fitur admin
```

### Staff Accounts
```
Email    : staff@armada.com
Password : staff123
Role     : Staff
Akses    : Manajemen tracking, armada, driver, rute


### Customer Account
```
Email    : user@armada.com
Password : public123
Role     : User/Customer
Akses    : Public features
```

### Login
1. Buka http://127.0.0.1:8000/login
2. Masukkan email dari akun dummy
3. Password: `masukkan password`
4. Klik "Log In"

---

## 📁 Struktur Folder

```
armada-project/
├── app/                      # Application code
│   ├── Http/Controllers/     # Controllers
│   ├── Models/               # Database models
│   ├── Notifications/        # Notification classes
│   └── Providers/            # Service providers
├── config/                   # Configuration files
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── public/                   # Public assets
├── resources/
│   ├── css/                  # CSS files
│   ├── js/                   # JavaScript files
│   └── views/                # Blade templates
│       ├── layouts/          # Layout templates
│       ├── admin/            # Admin pages
│       └── public/           # Public pages
├── routes/                   # Route definitions
├── storage/                  # Storage files & logs
├── tests/                    # Test files
├── .env.example              # Environment example
├── composer.json             # PHP dependencies
├── package.json              # NPM dependencies
├── artisan                   # Laravel CLI
└── README.md                 # This file
```

## ❓ Troubleshooting

### Error: "Database connection refused"
**Solusi:**
- Pastikan MySQL server running
- Cek .env database configuration
- Jalankan: `php artisan migrate`

### Error: "No routes detected" atau Assets tidak load
**Solusi:**
- `npm install`
- `npm run build`
- Untuk development: `npm run dev`

### Error: "SQLSTATE[42S02]: Table doesn't exist"
**Solusi:**
- `php artisan migrate`
- `php artisan db:seed`

### Error: "Class not found"
**Solusi:**
- `composer dump-autoload`
- Pastikan class name & namespace benar

### Login tidak berhasil
**Solusi:**
- Pastikan: `php artisan db:seed` sudah dijalankan
- Gunakan email dari akun dummy di atas

### Notifikasi tidak muncul
**Solusi:**
- Pastikan user punya role "Super Admin" atau "Staff"
- Cek tabel `notifications` di database
- Cek `storage/logs/laravel.log`

---

## 🚀 Fitur Highlight

✨ **Real-time Tracking** - Pelanggan bisa tracking paket secara live

📊 **Admin Dashboard** - Statistics cards, activities feed, notifications

🔐 **Role-Based Access** - Super Admin, Staff, User dengan permission berbeda

📱 **Responsive Design** - Mobile-friendly untuk semua device

✅ **Data Validation** - Server-side validation & unique constraints

🔔 **Notification System** - Database notifications dengan real-time badges

---

## 📞 Kontak & Support

Jika ada pertanyaan atau masalah:
- 📧 Email: info@fleetmanagement.com 
- 📱 WhatsApp: Hubungi melalui website
- 🏢 Lokasi gudang: Lihat di halaman "Lokasi Gudang"

---

## 📄 License

Proyek ini adalah tugas UAS Pemograman Berbasis Web Kelompok 5.

---

## 🎉 Selamat!

Instalasi sudah selesai! 

**Langkah selanjutnya:**
1. Akses http://127.0.0.1:8000
2. Coba fitur public (tanpa login)
3. Login dengan akun dummy di atas
4. Explore admin dashboard
5. Baca dokumentasi tambahan

**Happy coding! 🚀**

---

**Dibuat dengan ❤️ oleh Kelompok 5**
