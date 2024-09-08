# Panduan Instalasi Laravel untuk Aplikasi Pemesanan Kendaraan

Panduan ini akan membantu menginstal dan menjalankan proyek Laravel "Aplikasi Pemesanan Kendaraan" dengan langkah-langkah yang jelas.

## Prasyarat

Pastikan telah memenuhi prasyarat berikut sebelum memulai:

- [XAMPP](https://www.apachefriends.org/index.html) atau stack server sejenis yang sudah terinstal.
- [PHP](https://www.php.net/): Pastikan memiliki PHP versi 8.1.17 atau yang lebih baru.
- [Composer](https://getcomposer.org/): Sebuah alat manajemen paket PHP.
- [Node.js](https://nodejs.org/): Untuk manajemen paket JavaScript.
- [npm](https://www.npmjs.com/): Alat manajemen paket JavaScript yang akan terinstal bersama Node.js.

## Langkah 1: Konfigurasi Database dan Composer install dan update 

- langkah wajib " composer install ", " composer update "

1. Salin file `.env.example` menjadi `.env`:

   ```bash
   cp .env.example .env
   ```

2. Buka file `.env` dengan editor teks dan atur parameter berikut sesuai kebutuhan:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=vehicle_order_application
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   Pastikan untuk cek di file : (env.) untuk mengganti nama database, username, dan password sesuai dengan konfigurasi database.

## Langkah 2: Migrasi Database

Jalankan perintah berikut untuk menjalankan migrasi database:

```bash
php artisan migrate
```

## Langkah 3: Memasukkan Data Dummy (Opsional)

Jika ingin memasukkan data dummy ke dalam database,jalankan perintah berikut:

```bash
php artisan db:seed --class=CreateUsersSeeder
php artisan db:seed --class=SubmissionSeeder
php artisan db:seed --class=CreateVehicleListSeeder
```

## Langkah 4: Instalasi Paket JavaScript

Jalankan perintah berikut untuk menginstal paket JavaScript yang diperlukan:

```bash
npm install
```

## Langkah 5: Kompilasi Sumber Daya

Selanjutnya, jalankan perintah untuk mengkompilasi sumber daya JavaScript dan CSS:

```bash
npm run dev
```

## Langkah 6: Menjalankan Server Pengembangan

Terakhir, jalankan server pengembangan Laravel dengan perintah:

```bash
php artisan serve
```
Tampilan Utama Aplikasi [http://localhost:8000/logs](http://localhost:8000/logs)
untuk mengakses aplikasi pemesanan kendaraan di [http://localhost:8000](http://localhost:8000).

# ALUR WEBSITE
- Alur lengkap
Alur Aplikasi Pemesanan Kendaraan oleh User
1. Login dan Otentikasi
Terdapat tiga jenis user yang dapat mengakses aplikasi:
User (Karyawan/Pegawai): User yang dapat mengajukan pemesanan kendaraan.
Admin: User yang mengelola pemesanan kendaraan dan menentukan driver serta pihak yang menyetujui.
Pihak yang Menyetujui: User yang memiliki wewenang untuk menyetujui pemesanan kendaraan.
2. Input Pemesanan Kendaraan oleh User
User login dan mengakses halaman pemesanan kendaraan.
User memasukkan detail pemesanan kendaraan yang meliputi:
Tanggal dan waktu pemakaian kendaraan(start date - end date).
Jenis kendaraan (mobil atau bus).
dan catatan:
Keperluan pemakaian kendaraan (misalnya perjalanan dinas atau event tertentu).
Setelah user mengisi form pemesanan, permintaan akan otomatis dikirimkan ke Admin untuk pengelolaan lebih lanjut.
3. Verifikasi dan Penugasan oleh Admin
Admin menerima notifikasi pemesanan dari user.
Admin memverifikasi detail pemesanan dan:
Menugaskan driver yang sesuai untuk pemesanan tersebut.
Menentukan pihak yang menyetujui untuk proses persetujuan berjenjang (minimal 2 level).
Setelah itu, Admin akan mengirimkan pemesanan tersebut ke pihak yang menyetujui untuk proses persetujuan.
4. Proses Persetujuan Berjenjang oleh Pihak yang Menyetujui
Level 1 Persetujuan: Pihak yang menyetujui level 1 (oleh admin) menerima notifikasi atau dapat melihat permintaan pemesanan di dashboard mereka.
Pihak yang menyetujui dapat:
Menyetujui atau Menolak permintaan. Jika menolak, mereka harus menyertakan alasan.
Jika permintaan disetujui, maka status pemesanan akan berubah menjadi "Disetujui Level 1" dan diteruskan ke Level 2 (Approver).
Level 2 Persetujuan: Pihak yang menyetujui level 2 melakukan persetujuan terakhir. Jika disetujui, status pemesanan akan berubah menjadi "Disetujui Akhir".
Jika ada penolakan di salah satu level, status pemesanan akan berubah menjadi "Ditolak", dan user serta admin dapat melihat pengumuman di dashboard applikasi.

- Alur sederhana
## Pengajuan
pengguna bisa langusng mengajuan di halaman home page  [http://localhost:8000/logs]
## Login
Admin dan Approval harus login terlebih dahulu untuk menyetujui pengajuan 
## Persetujuan
untuk persetujuan bisa di menggunjungi [http://localhost:8000/admin][http://localhost:8000/approval]
# Laporan di setiap tabel bisa di download, csv,excel tergantung apa yang dibutuhkan 
Email password
```bash
Email : admin@admin.com Password : admin
Email : approval@approval.com Password : approval
```
bisa di cek juga di: database\seeders\CreateUsersSeeder.php

di keluar email tersebut memiliki role dimana admin bisa melakukan persetujuan, penambahan data user dan kendarran list 
sedangkan approval hanya berfokus pada persetujuan saja


# ERD

public\erd\erd.png

# Activity diagram 
public\diagram\activitydiagram.drawio.png 
p