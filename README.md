<div align="center">

<img src="imgs/landing.jpg" width="250" alt="Logo Alzi Petshop">

# Alzi Petshop - Sistem Manajemen Stok

Aplikasi web untuk manajemen stok produk toko hewan peliharaan yang simpel dan efisien. Dibangun dengan PHP native, aplikasi ini memisahkan peran antara penjual dan pembeli, menyediakan antarmuka yang fungsional untuk mengelola inventaris dan menampilkannya kepada pelanggan.

<p align="center">
  <img src="https://img.shields.io/badge/platform-Web-blue.svg" alt="Platform">
  <img src="https://img.shields.io/badge/license-MIT-green.svg" alt="License">
</p>

</div>

---

## ✨ Fitur Utama

- [x] **Manajemen Produk (CRUD Penuh):**
  - `[✓]` **Create:** Penjual dapat menambahkan produk baru beserta detail, harga, stok, dan gambar.
  - `[✓]` **Read:** Menampilkan katalog produk yang terorganisir berdasarkan kategori untuk pembeli.
  - `[✓]` **Update:** Mengubah data produk yang sudah ada, termasuk informasi dan foto.
  - `[✓]` **Delete:** Menghapus produk dari daftar.
- [x] **Sistem Login Berbasis Peran:**
  - `[✓]` **Penjual:** Memiliki akses ke dasbor khusus untuk mengelola produk dan stok.
  - `[✓]` **Pembeli:** Dapat menjelajahi produk tanpa perlu login.
- [x] **Manajemen Stok:** Setiap produk memiliki atribut stok yang akan ditampilkan kepada pembeli, dengan penanda "Stok Habis" jika stok mencapai nol.
- [x] **Optimalisasi Gambar Otomatis:** Gambar yang diunggah oleh penjual secara otomatis dikonversi ke format `.webp` untuk performa web yang lebih cepat.
- [x] **Tampilan Responsif:** Antarmuka yang dapat beradaptasi dengan baik di perangkat desktop maupun mobile.
- [x] **Integrasi Pihak Ketiga:**
  - `[✓]` **Google Maps:** Menampilkan lokasi fisik toko untuk memudahkan pelanggan.
  - `[✓]` **WhatsApp:** Tombol "Hubungi" pada halaman detail produk yang langsung mengarah ke chat WhatsApp.

---

## 🛠️ Teknologi yang Digunakan

<div align="center">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
    <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
    <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
    <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
</div>

---

## 🚀 Panduan Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

### **1. Prasyarat**

Pastikan Anda sudah menginstal perangkat lunak berikut:

- **Server Web Lokal:** [XAMPP](https://www.apachefriends.org/index.html) atau WAMP.
- **Browser Web:** Chrome, Firefox, atau Edge.

### **2. Langkah-langkah Setup**

1.  **Clone Repositori**
    Buka terminal dan jalankan perintah berikut:

    ```bash
    git clone https://github.com/your_username/your_repository.git
    ```

2.  **Pindahkan Proyek**
    Pindahkan folder proyek yang sudah di-clone ke dalam direktori `htdocs` (untuk XAMPP) atau `www` (untuk WAMP).

3.  **Setup Database**

    - Buka phpMyAdmin (`http://localhost/phpmyadmin`).
    - Buat database baru dengan nama `alzipetshop`.
    - Pilih database tersebut, lalu buka tab **"Import"**.
    - Unggah file `alzipetshop.sql` yang ada di direktori utama proyek.

4.  **Jalankan Aplikasi**
    - Buka browser dan akses `http://localhost/nama-folder-proyek`.
    - Aplikasi siap digunakan!

---

## 📸 Tampilan Aplikasi

<details>
<summary>Klik untuk melihat screenshot</summary>
<br>
<table>
  <tr>
    <td><center>Halaman Utama (Katalog Produk)</center></td>
  </tr>
  <tr>
    <td><center><img src="imgs/landing.jpg" width="80%" alt="Halaman Utama"></center></td>
  </tr>
  <tr>
    <td><center>Halaman Detail Produk</center></td>
  </tr>
  <tr>
    <td><center><img src="imgs/slide1.jpg" width="80%" alt="Detail Produk"></center></td>
  </tr>
    <tr>
    <td><center>Dasbor Penjual (Manajemen Produk)</center></td>
  </tr>
  <tr>
    <td><center><img src="imgs/slide2.jpg" width="80%" alt="Dasbor Penjual"></center></td>
  </tr>
</table>
</details>

---

## 📁 Struktur Proyek

Struktur folder dirancang untuk memisahkan aset, logika backend, dan halaman antarmuka.

```
.
├── css/                # File styling CSS kustom & Bootstrap
├── font/               # Font yang digunakan dalam proyek
├── imgs/               # Aset gambar (produk, slide, ikon)
├── js/                 # Skrip JavaScript
├── login/              # Halaman & logika untuk login, register, logout
├── php/                # Skrip backend PHP (koneksi DB, proses form)
├── script/             # Skrip JavaScript tambahan
├── alzipetshop.sql     # File dump database MySQL
├── index.php           # Halaman utama untuk pembeli (katalog)
├── index_p.php         # Halaman utama untuk penjual (dasbor)
├── produk.php          # Halaman untuk menampilkan detail produk
├── tambah.php          # Form untuk menambah produk baru
├── edit.php            # Form untuk mengedit produk
└── README.md           # File yang sedang Anda baca
```

---

## ⚖️ Lisensi

Didistribusikan di bawah Lisensi MIT. Lihat `LICENSE` untuk informasi lebih lanjut.
