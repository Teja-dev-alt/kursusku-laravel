# KursusKu

Project praktikum Pemrograman Web III.

## Requirement

- PHP 8.3 atau lebih baru
- Composer
- Laravel
- Laragon / web server lokal
- Node.js dan npm

## Cara Menjalankan

1. Buka terminal pada folder project.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env` jika diperlukan.
4. Jalankan `php artisan key:generate`.
5. Jalankan `npm install`.
6. Jalankan `npm run dev` pada terminal pertama.
7. Jalankan `php artisan serve` pada terminal kedua.
8. Buka alamat yang ditampilkan oleh Laravel di terminal.

## Fitur Milestone 7

- Named route `home`
- `HomeController@index`
- Blade landing page
- Data kursus dari controller
- Asset CSS dan image

## Belum Dikerjakan

- Database
- CRUD
- Authentication
- Relasi data