# PHP Simple Application – Soal 1 & Soal 2

Repository ini berisi jawaban untuk **Soal 1** dan **Soal 2** berupa aplikasi sederhana berbasis **PHP + MySQL**, dengan tampilan minimalis menggunakan **Bootstrap 5**.

---

## 🚀 Requirements

Sebelum menjalankan aplikasi, pastikan Anda sudah menyiapkan environment berikut:

- PHP 7.4+ atau PHP 8+
- MySQL/MariaDB
- Web server (Apache/Nginx) atau bisa menggunakan **XAMPP/Laragon**
- Browser modern (Chrome/Edge/Firefox)

---

## 📂 Struktur Folder

```
.
├── soal1.php        # Aplikasi Soal 1 (Form Dinamis)
├── soal2.php        # Aplikasi Soal 2 (Laporan Hobi)
├── db.php           # File koneksi database (untuk Soal 2)
├── import.sql       # Struktur & data sample untuk database testdb
└── README.md        # Dokumentasi
```

---

## 📝 Soal 1 – Form Dinamis

### 📌 Deskripsi
Aplikasi ini membuat form dinamis berdasarkan input jumlah baris & kolom.  
- **Langkah 1 (Tampilan Awal)** → User mengisi jumlah baris & kolom.  
- **Langkah 2 (Form Dinamis)** → Sistem membangkitkan form input sesuai baris × kolom.  
- **Langkah 3 (Hasil Output)** → Sistem menampilkan hasil input user.  

### ▶️ Cara Menjalankan
1. Simpan file `soal1.php` di folder web server (misalnya `htdocs/soal1.php` jika pakai XAMPP).
2. Jalankan server Apache + MySQL.
3. Buka browser lalu akses:
   ```
   http://localhost/soal1.php
   ```
4. Isi jumlah baris & kolom → submit → isi data → submit → lihat hasil.

---

## 📝 Soal 2 – Relasi Person & Hobi

### 📌 Deskripsi
Aplikasi ini menggunakan **MySQL database `testdb`** dengan 2 tabel:  
- `person` → menyimpan data orang.  
- `hobi` → menyimpan hobi setiap orang (relasi one-to-many).  

Aplikasi menampilkan laporan:
- List hobi beserta jumlah orang yang memiliki hobi tersebut.
- Urut berdasarkan jumlah person terbanyak.
- Fitur **search by hobi** untuk filter data.

### 🗄️ Struktur Database

File `import.sql` sudah disediakan.  
Contoh tabel:

**Tabel `person`:**
| id | nama    | alamat  |
|----|---------|---------|
| 1  | sentot  | bandung |
| 2  | ali     | jakarta |
| 3  | mahmud  | bali    |
| 4  | shena   | USA     |

**Tabel `hobi`:**
| id | person_id | hobi     |
|----|-----------|----------|
| 1  | 1         | membaca  |
| 2  | 1         | menulis  |
| 3  | 2         | renang   |
| 4  | 3         | futsal   |
| 5  | 3         | renang   |
| 6  | 4         | membaca  |
| 7  | 4         | renang   |

### ▶️ Cara Menjalankan
1. Import database:
   ```bash
   mysql -u root -p < import.sql
   ```
   > Jika pakai phpMyAdmin, bisa langsung **Import → pilih file `import.sql`**.

2. Sesuaikan koneksi database di file `db.php`:
   ```php
   <?php
   $host = "localhost";
   $user = "root";      // ganti sesuai user MySQL
   $pass = "";          // ganti sesuai password MySQL
   $db   = "testdb";    // nama database
   $mysqli = new mysqli($host, $user, $pass, $db);
   if ($mysqli->connect_errno) {
       die("Failed to connect to MySQL: " . $mysqli->connect_error);
   }
   ?>
   ```

3. Simpan file `soal2.php` & `db.php` di folder web server (misalnya `htdocs/soal2.php`).
4. Jalankan server Apache + MySQL.
5. Buka browser lalu akses:
   ```
   http://localhost/soal2.php
   ```

### 🔍 Fitur
- Tabel laporan hobi dan jumlah person.
- Kolom pencarian `search by hobi`.
- Tombol reset untuk kembali ke semua data.

---

## ✅ Contoh Output

### Soal 1
1. Input jumlah baris = 1, kolom = 3.  
2. Isi data → `a`, `b`, `c`.  
3. Output:
   ```
   1.1 : a
   1.2 : b
   1.3 : c
   dst
   ```

### Soal 2
Laporan:
| hobi    | jumlah person |
|---------|---------------|
| renang  | 3             |
| membaca | 2             |
| menulis | 1             |
| futsal  | 1             |

---