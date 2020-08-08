# Sistem Informasi Penerimaan Peserta Didik Baru (PPDB)

Sistem Informasi ini memanajemen penerimaan peserta didik baru dengan fitur-fitur dasar CRUD seperti
* Form pendaftaran
* Form penerimaan
* Dashboard admin
* Manajemen informasi pendaftaranen formulir
* Manajem
* Manajemen akun staff
* Pencetakan
* dsb

## Instalasi

Download repo ini dan install dependency
```sh
$ git clone https://github.com/agumil/ci3-ppdb.git
$ composer install
```

Buat database dengan nama ppdbgirikerto, kemudian import file sql dari repo ini.
Di bawah ini menggunakan user root, silahkan sesuaikan dengan kebutuhan anda
```sh
$ mysql -u root -p
[mariadb] > create database ppdbgirikerto
[mariadb] > exit;
$ mysql -u root -p ppdbgirikerto < ppdbgirikerto.sql
```

## Konfigurasi

Silahkan konfigurasi .htaccess sesuai dengan web server anda.

## Demo

https://ppdbgirikerto.000webhostapp.com/ppdb-girikerto

Username : admin
Password : admin12

## Disclaimer

Web aplikasi ini belum siap sepenuhnya untuk digunakan pada server produksi karena belum menerapkan keamanan yang baik. Mohon untuk tidak dipergunakan apa adanya seperti pada repo ini. Pengembangan dan perbaikan masih akan terus dilakukan.
