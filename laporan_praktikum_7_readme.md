# Praktikum 7: Pemrograman Server-Side dengan PHP

## Identitas Mahasiswa
* **Nama:** Muhammad Hasan Zayn Zaydan
* **NIM:** 312510010
* **Program Studi:** teknik informatika
* **Mata Kuliah:** Pemrograman Web
* **Modul:** Praktikum 7 — Pemrograman Server-Side dengan PHP

---

## 1. Tujuan Praktikum
1. Memahami perbedaan pemrosesan *client-side* dan *server-side*.
2. Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
3. Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan *function*.
4. Menerima dan memproses data dari form HTML menggunakan metode `GET` dan `POST`.
5. Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.
6. Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.

---

## 2. Perangkat & Cara Menjalankan Server Lokal
* **Perangkat Lunak:** Web Browser, Visual Studio Code, PHP, dan server lokal (XAMPP / Laragon).
* **Cara Menjalankan:**
  1. Jalankan layanan web server (**Apache** pada XAMPP atau **Start All** pada Laragon).
  2. Simpan folder proyek `Lab7Web_PHP` ke dalam direktori root web server (misalnya `C:\xampp\htdocs\Lab7Web_PHP`).
  3. Akses melalui browser dengan alamat `http://localhost/Lab7Web_PHP/`.

---

## 3. Struktur File Proyek
```text
Lab7Web_PHP/
├── screenshots/        # Folder penyimpanan gambar hasil output
├── index.php           # Latihan 1: Menjalankan dasar PHP
├── latihan2.php        # Latihan 2: Variabel, operator, dan percabangan
├── latihan3.php        # Latihan 3: Perulangan dan array
├── latihan4.php        # Latihan 4: Pembuatan dan pemanggilan function
├── cari.php            # Latihan 5: Pemrosesan form dengan metode GET
├── latihan6.php        # Latihan 6: Pemrosesan form dengan metode POST
├── latihan7.php        # Latihan 7: Pengolahan data transaksi sederhana
├── mini_project.php    # Mini Project: Aplikasi Formulir Data Mahasiswa
└── README.md           # Dokumentasi laporan praktikum
```

---

## 4. Penjelasan Setiap Latihan & Mini Project

### A. Latihan 1 — Menjalankan PHP (`index.php`)
* **Penjelasan:** Menampilkan teks HTML beserta output dinamis dari PHP menggunakan `echo` dan fungsi `date("d-m-Y H:i:s")` untuk menampilkan waktu server saat ini. Kode dieksekusi di sisi server sehingga browser hanya menerima hasil HTML.
* **Screenshot Output:**
  ![Screenshot Latihan 1] ![alt text](<screenshots/Screenshot 2026-11-24 124209.png>)

### B. Latihan 2 — Variabel, Operator, dan Percabangan (`latihan2.php`)
* **Penjelasan:** Menghitung nilai akhir mahasiswa dari bobot komponen tugas ($30\%$), UTS ($30\%$), dan UAS ($40\%$) menggunakan operator aritmatika. Hasil perhitungan kemudian dievaluasi menggunakan struktur percabangan `if / elseif / else` untuk menentukan predikat huruf (`A`, `B`, `C`, atau `D`).
* **Screenshot Output:**
  ![Screenshot Latihan 2] ![alt text](<screenshots/Screenshot 2026-11-24 124454.png>)

### C. Latihan 3 — Perulangan dan Array (`latihan3.php`)
* **Penjelasan:** Menyimpan kumpulan nama mahasiswa ke dalam tipe data *array*, lalu menampilkannya ke dalam daftar berurut (`<ol>`) menggunakan perulangan `foreach` serta mengamankan output teks dengan `htmlspecialchars()`.
* **Screenshot Output:**
  ![Screenshot Latihan 3] ![alt text](<screenshots/Screenshot 2026-11-24 124711.png>)

### D. Latihan 4 — Membuat Function (`latihan4.php`)
* **Penjelasan:** Membungkus logika perhitungan ke dalam fungsi agar dapat digunakan secara berulang (*reusable*), meliputi fungsi `hitungDiskon()` untuk menghitung potongan harga, fungsi menghitung luas persegi panjang, serta fungsi penentuan status kelulusan.
* **Screenshot Output:**
  ![Screenshot Latihan 4] ![alt text](<screenshots/Screenshot 2026-11-24 124834.png>)

### E. Latihan 5 — Memproses Form dengan GET (`cari.php`)
* **Penjelasan:** Mengirimkan input kata kunci pencarian melalui metode `GET` sehingga data terlihat sebagai *query string* pada URL browser (`?kata=...`). Input dibersihkan dengan `trim()` dan ditampilkan kembali dengan `htmlspecialchars()`.
* **Screenshot Output:**
  ![Screenshot Latihan 5] ![alt text](<screenshots/Screenshot 2026-11-24 125030.png>)

### F. Latihan 6 — Memproses Form dengan POST (`latihan6.php`)
* **Penjelasan:** Mengirimkan data nama dan program studi melalui *body* permintaan menggunakan metode `POST`. Server mengecek `$_SERVER["REQUEST_METHOD"] === "POST"`, memvalidasi agar kolom tidak kosong, dan mencegah injeksi HTML menggunakan `htmlspecialchars()`.
* **Screenshot Output:**
  ![Screenshot Latihan 6] ![alt text](<screenshots/Screenshot 2026-11-24 125302.png>)

### G. Latihan 7 — Pengolahan Data Sederhana (`latihan7.php`)
* **Penjelasan:** Memproses form transaksi barang yang menerima nama barang, harga, dan jumlah. Validasi sisi server memeriksa tipe numerik (`is_numeric()`), bilangan bulat (`ctype_digit()`), serta nilai minimum sebelum menghitung `subtotal = harga * jumlah`.
* **Screenshot Output:**
  ![Screenshot Latihan 7] ![alt text](<screenshots/Screenshot 2026-11-24 125723.png>) ![alt text](<screenshots/Screenshot 2026-11-24 125830.png>)

### H. Mini Project — Aplikasi Formulir Data Mahasiswa (`mini_project.php`)
* **Penjelasan:** Aplikasi formulir berbasis `POST` yang memisahkan logika pemrosesan di bagian atas dengan tampilan HTML di bawahnya. Validasi server-side memastikan nama, NIM, dan program studi terisi, format email valid menggunakan `filter_var(..., FILTER_VALIDATE_EMAIL)`, serta semester berupa bilangan bulat pada rentang `1` hingga `14`.
* **Pengujian Kasus Valid & Tidak Valid:**
  1. **Kasus Valid 1:** Nama `Muhammad Hasan Zayn Zaydan`, NIM `312510010`, Prodi `Teknik Informatika`, Semester `3`, Email `zaydan159@gmail.com` $\rightarrow$ Menampilkan ringkasan data mahasiswa.
  3. **Kasus Tidak Valid 1:** Email diisi `zaydan159gmail.com` $\rightarrow$ Muncul pesan kesalahan *"please include an "@" in the email address."*
* **Screenshot Output (Valid & Error Validasi):**
  ![Screenshot Mini Project Valid] ![alt text](<screenshots/Screenshot 2026-11-24 130046.png>)
  ![Screenshot Mini Project Error] ![alt text](<screenshots/Screenshot 2026-11-24 130351.png>)
---

## 5. Jawaban Pertanyaan Evaluasi

1. **Apa perbedaan pemrosesan *client-side* dan *server-side*?**
   * **Client-side** dijalankan langsung di sisi browser pengguna (contoh: HTML, CSS, JavaScript).
   * **Server-side** dijalankan di sisi komputer server sebelum hasilnya dikirim ke browser (contoh: PHP). Server memproses permintaan, menjalankan logika aplikasi, dan mengirimkan respons akhir berupa HTML ke browser.

2. **Mengapa file PHP harus dijalankan melalui web server?**
   Karena browser secara bawaan hanya bisa menerjemahkan HTML, CSS, dan JavaScript, bukan kode PHP mentah. Web server (seperti Apache/Nginx dengan modul PHP) bertugas mengeksekusi kode PHP terlebih dahulu lalu mengirimkan output HTML-nya ke browser.

3. **Apa fungsi tanda `$` pada variabel PHP?**
   Tanda `$` (dolar) berfungsi sebagai penanda sintaks wajib di awal nama variabel pada PHP untuk mendeklarasikan maupun memanggil nilai dari variabel tersebut (contoh: `$nama`, `$nilai`).

4. **Apa perbedaan metode `GET` dan `POST`?**
   * **`GET`:** Mengirimkan data melalui parameter URL (*query string*), sehingga terlihat di *address bar* browser dan cocok untuk pencarian atau permintaan yang tidak mengubah data.
   * **`POST`:** Mengirimkan data di dalam *body* permintaan HTTP (tidak tampil di URL) dan lazim digunakan untuk pengiriman form data.

5. **Mengapa input pengguna perlu divalidasi di sisi server?**
   Karena validasi di sisi klien (seperti atribut `required` pada HTML atau JavaScript) mudah dilewati atau dimodifikasi oleh pengguna melalui *Developer Tools* browser. Validasi server-side memastikan data benar-benar aman dan sesuai aturan sebelum diproses.

6. **Apa fungsi `htmlspecialchars()` ketika menampilkan data dari form?**
   Fungsi `htmlspecialchars()` mengubah karakter khusus HTML (seperti `<`, `>`, `"`, `'`, `&`) menjadi entitas HTML yang aman sehingga browser menampilkannya sebagai teks biasa, bukan mengeksekusinya sebagai tag HTML atau skrip berbahaya (mencegah serangan *Cross-Site Scripting* / XSS).

7. **Apa manfaat penggunaan *function* dalam program PHP?**
   Membuat kode lebih terstruktur, modular, mudah dibaca dan dipelihara, serta memungkinkan blok kode tertentu dipanggil kembali (*reusable*) berkali-kali tanpa perlu menulis ulang logika yang sama.