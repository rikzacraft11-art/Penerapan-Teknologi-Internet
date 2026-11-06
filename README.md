# 💰 MoneyGement - Personal Finance & AI Management System

> **MoneyGement** adalah platform pencatatan dan pengelolaan keuangan pribadi modern berbasis web yang dibangun dengan framework **Laravel 10**, didukung oleh integrasi kecerdasan buatan (**Google Gemini API & Groq Llama 3**) untuk memberikan wawasan finansial pintar, deteksi struk belanja otomatis via visi komputer, serta penilaian kesehatan keuangan pengguna.

---

## 📑 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Struktur Folder Proyek](#-struktur-folder-proyek)
- [Panduan Instalasi & Menjalankan](#-panduan-instalasi--menjalankan)
- [Konfigurasi Environment](#-konfigurasi-environment)
- [Pengujian & Verifikasi Use Case](#-pengujian--verifikasi-use-case)
- [Dokumentasi Tambahan](#-dokumentasi-tambahan)

---

## 📌 Tentang Proyek

MoneyGement dikembangkan untuk memenuhi kebutuhan pencatatan finansial personal yang akurat, intuitif, dan cerdas. Aplikasi ini tidak hanya mencatat arus kas masuk dan keluar, melainkan juga menganalisis pola pengeluaran, memperkirakan saldo masa depan, dan membantu pengguna tetap disiplin terhadap target anggaran yang ditetapkan.

Proyek ini juga memenuhi standar dokumen rekayasa perangkat lunak berorientasi objek (**RPL II / PTI**) dengan cakupan 15 Use Case terverifikasi penuh.

---

## ✨ Fitur Utama

### 1. 📊 Dashboard Keuangan Interaktif
- Ringkasan total saldo, akumulasi pemasukan, dan total pengeluaran secara real-time.
- Visualisasi grafik arus kas bulanan dan breakdown pengeluaran berdasarkan kategori.
- Widget riwayat transaksi terbaru dan status budget aktif.

### 2. 💳 Manajemen Transaksi & Kategori
- Pencatatan transaksi pemasukan (*income*) dan pengeluaran (*expense*).
- Kategori dinamis (kustom per user atau bawaan sistem).
- Fitur pencarian, filtering berdasarkan rentang tanggal/kategori, dan paginasi.
- Alokasi pemindahan budget otomatis saat terjadi transfer antar pos.

### 3. 🎯 Smart Budgeting & Peringatan Anggaran
- Pembuatan kuota anggaran bulanan per kategori.
- Progress bar visual yang berubah warna saat mendekati batas limit (80% & 100%).
- Notifikasi sistem otomatis ketika transaksi melampaui alokasi budget.

### 4. 🤖 AI Financial Advisor (Google Gemini & Groq)
- **AI Chatbot Finansial**: Konsultasi strategi hemat, alokasi investasi, dan analisis kebiasaan belanja.
- **Smart Insight**: Ringkasan cerdas yang menyoroti kategori pengeluaran paling boros.
- **Cash Flow Forecast**: Proyeksi tren saldo dan pengeluaran untuk bulan berikutnya.
- **Financial Health Score**: Skoring otomatis kesehatan finansial (kriteria 50-30-20 rule, rasio tabungan, dll).

### 5. 📸 AI Vision Receipt Scanner
- Upload atau foto struk belanja fisik langsung dari perangkat.
- Analisis otomatis nama merchant, tanggal transaksi, total nominal, serta klasifikasi kategori menggunakan model Multimodal Gemini Vision.
- Konfirmasi dan simpan langsung ke database transaksi dengan satu klik.

### 6. 📑 Ekspor Laporan Multi-Format (UC-08)
- Ekspor rekapitulasi data transaksi ke dalam format **PDF** resmi, **Excel (XLSX)**, dan **CSV**.
- Dilengkapi filter periode transaksi.

### 7. 🛡️ Admin Panel & Activity Log (UC-13, 14, 15)
- Dashboard khusus administrator untuk monitoring keseluruhan sistem.
- Manajemen akun user (lihat daftar pengguna, toggle role admin, hapus akun).
- Audit trail dan log aktivitas pengguna.

### 8. 🌐 Multi-Bahasa & Kustomisasi Profil
- Tersedia dalam 2 pilihan bahasa: **Bahasa Indonesia** dan **English**.
- Kustomisasi profil pengguna, ganti password, avatar, dan format mata uang (IDR, USD, EUR, dll).

---

## 🛠️ Teknologi yang Digunakan

| Komponen | Teknologi |
| :--- | :--- |
| **Framework Backend** | [Laravel 10.x](https://laravel.com) (PHP 8.1+) |
| **Database** | MySQL / MariaDB |
| **Frontend Styling** | [Tailwind CSS](https://tailwindcss.com), PostCSS, Vite |
| **AI Integration** | [Google Gemini API](https://ai.google.dev/) & [Groq Cloud](https://groq.com) |
| **Reporting / Export** | `barryvdh/laravel-dompdf` (PDF), `maatwebsite/excel` (Excel/CSV) |
| **Diagramming** | Mermaid.js |

---

## 📂 Struktur Folder Proyek

Setelah proses penataan dan refaktorisasi struktur direktori (*codebase cleanup*):

```text
MoneyGementS1/
├── app/                        # Inti aplikasi MVC Laravel
│   ├── Http/Controllers/      # Controller utama, Auth, API, & AI Controller
│   ├── Models/                 # Model Eloquent (User, Transaction, Budget, dll)
│   ├── Notifications/          # Email & sistem notifikasi
│   └── Services/               # Layanan eksternal (GroqService, Gemini, dll)
├── bootstrap/                  # File bootstrap framework
├── config/                     # Konfigurasi sistem Laravel & third-party service
├── database/                   # Migrations, factories, dan seeders
├── lang/                       # File translasi bahasa (id, en)
├── public/                     # Asset publik (CSS, JS build, images, favicon)
├── resources/                  # Blade views dan asset frontend (Tailwind/Vite)
├── routes/                     # Definisi routing web (`web.php`, `auth.php`)
├── storage/                    # Storage berkas log, cache, dan upload user
├── tests/                      # Unit testing dan Feature testing Pest/PHPUnit
│
├── docs/                       # 📚 Dokumentasi dan Laporan Akademik
│   ├── diagrams/               # Diagram kelas UML, Mermaid script, dan file render
│   │   ├── class_diagram.md
│   │   ├── diagram_kelas.mmd
│   │   └── diagram_render.html
│   ├── interactive/            # Spesifikasi teknis interaktif berbasis web
│   │   └── index.html
│   └── reports/                # Seluruh laporan dokumen resmi PTI, RPL II, & hosting VPS
│       ├── AUDIT_RPL2_REPORT.md
│       ├── FINANCIAL_HEALTH_SCORE.md
│       ├── BAB_III_VPS.docx
│       ├── Laporan_Hosting_VPS_Lengkap.docx
│       ├── Laporan_Integrasi_AI_MoneyGement.pdf
│       ├── Pembangunan Manajemen Keuangan - Kelompok 3 PTI.pdf
│       └── Pembangunan Manajemen Keuangan RPL II.pdf
│
├── scripts/                    # 🛠️ Script Helper & Maintenance
│   ├── converters/             # Script utilitas konversi dokumen (Python)
│   │   ├── bab3_to_docx.py
│   │   └── md_to_docx.py
│   ├── maintenance/            # Script perbaikan data / migrasi one-off
│   │   └── fix_names.php
│   └── testing/                # Script pengujian otomatis 15 Use Case
│       ├── test_all_uc.php
│       └── test_results.json
│
├── .env.example                # Template konfigurasi environment
├── artisan                     # CLI Laravel Artisan
├── composer.json               # Dependensi paket PHP
├── package.json                # Dependensi paket Node.js & Vite
├── tailwind.config.js          # Konfigurasi Tailwind CSS
└── vite.config.js              # Konfigurasi Vite bundler
```

---

## 🚀 Panduan Instalasi & Menjalankan

### 1. Prasyarat Sistem
Pastikan lingkungan pengembangan Anda telah terpasang:
- PHP >= 8.1 (dengan ekstensi `pdo_mysql`, `mbstring`, `openssl`, `gd`, `fileinfo`)
- Composer >= 2.x
- Node.js >= 18.x & NPM
- MySQL Server >= 8.0 / MariaDB

### 2. Clone Repositori
```bash
git clone <url-repository>
cd MoneyGementS1
```

### 3. Install Dependensi PHP & Node.js
```bash
composer install
npm install
```

### 4. Setup File Environment
Salin template konfigurasi `.env.example`:
```bash
cp .env.example .env
```
Lalu generate application key:
```bash
php artisan key:generate
```

### 5. Konfigurasi Database & API Key
Buka file `.env` dan sesuaikan parameter berikut:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=moneygement
DB_USERNAME=root
DB_PASSWORD=

# Konfigurasi AI Service
GEMINI_API_KEY=your_google_gemini_api_key_here
GROQ_API_KEY=your_groq_cloud_api_key_here
```

### 6. Jalankan Migrasi & Seeder
Buat tabel database dan data kategori awal:
```bash
php artisan migrate --seed
```

### 7. Buat Symbolic Link Storage (Untuk Upload Struk/Avatar)
```bash
php artisan storage:link
```

### 8. Jalankan Server Pengembangan
Buka 2 terminal terpisah:

**Terminal 1 (Vite Frontend):**
```bash
npm run dev
```

**Terminal 2 (Laravel Backend):**
```bash
php artisan serve
```

Akses aplikasi melalui browser di: `http://127.0.0.1:8000`

---

## 🧪 Pengujian & Verifikasi Use Case

Proyek ini telah dilengkapi dengan script pengujian automated end-to-end untuk memvalidasi seluruh alur 15 Use Case:

```bash
php scripts/testing/test_all_uc.php
```

Hasil pengujian otomatis akan tersimpan dalam file:
- `scripts/testing/test_results.json`

Hasil audit kesesuaian dokumen vs implementasi dapat dilihat di:
- `docs/reports/AUDIT_RPL2_REPORT.md`

---

## 📚 Dokumentasi Tambahan

- **Diagram Kelas Keseluruhan**: Buka `docs/diagrams/diagram_render.html` di browser Anda untuk melihat render diagram kelas interaktif.
- **Spesifikasi Teknis Interaktif**: Akses `docs/interactive/index.html` untuk ringkasan UI spesifikasi teknis dan modul arsitektur.
- **Panduan Formula Kesehatan Keuangan**: Rincian formula skor finansial ada di `docs/reports/FINANCIAL_HEALTH_SCORE.md`.

---

<p align="center">Dikembangkan dengan ❤️ oleh Tim MoneyGement</p>
