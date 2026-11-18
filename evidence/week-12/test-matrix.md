# Test Matrix Week 12 - KursusKu

**Praktikum:** Pemrograman Web III  
**Pertemuan:** 12 - Relational Core  
**Project:** KursusKu

## A. Pengujian End-to-End

| No. | Skenario | Hasil yang Diharapkan | Hasil Aktual | Status | Bukti |
|---|---|---|---|---|---|
| 1 | Buka `/enrollments/create` | Participant dan Course tampil di select. | Form menampilkan pilihan Participant dan Course. | PASS | 07-Form-Enrollment.png |
| 2 | Submit participant kosong | Ditolak dengan validation error. | Sistem menolak pendaftaran tanpa memilih Participant. | PASS | Pengujian form |
| 3 | Submit course kosong | Ditolak dengan validation error. | Sistem menolak pendaftaran tanpa memilih Course. | PASS | Pengujian form |
| 4 | Alya → Laravel Dasar | Tersimpan dengan status registered. | Pendaftaran Alya berhasil tersimpan. | PASS | 09-Laporan-Enrollment.png |
| 5 | Alya → Laravel Dasar lagi | Ditolak sebagai duplicate. | Sistem menampilkan pesan bahwa peserta sudah terdaftar pada kursus tersebut. | PASS | 08-Pesan-Duplicate.png |
| 6 | Alya → PHP Dasar | Pendaftaran boleh tersimpan. | Pendaftaran Alya pada PHP Fundamental berhasil ditambahkan. | PASS | Pengujian enrollment |
| 7 | Bima → Laravel Dasar | Pendaftaran boleh tersimpan. | Pendaftaran Bima pada Laravel Dasar berhasil dilakukan. | PASS | Pengujian enrollment |
| 8 | Buka `/enrollments` | Nama Participant, Course, start date, dan status tampil dengan benar. | Laporan enrollment berhasil menampilkan data relasional. | PASS | 09-Laporan-Enrollment.png |

**Catatan:** Nama kursus pada data project kita adalah PHP Fundamental, sedangkan panduan menggunakan PHP Dasar.

## B. Pengujian Tambahan — Cascade Delete

| No. | Skenario | Hasil yang Diharapkan | Hasil Aktual | Status | Bukti |
|---|---|---|---|---|---|
| 9 | Hapus Course dummy | Enrollment terkait ikut terhapus, Participant tetap ada. | Jumlah Enrollment berubah dari 1 menjadi 0 dan Participant tetap ditemukan. | PASS | 10-Cascade-Course-Sebelum-Dihapus.png; 10-Cascade-Course-Setelah-Dihapus.png |
| 10 | Hapus Participant dummy | Enrollment terkait ikut terhapus, Course tetap ada. | Jumlah Enrollment berubah dari 1 menjadi 0 dan Course tetap ditemukan. | PASS | 11-Cascade-Participant-Sebelum-Dihapus.png; 11-Cascade-Participant-Setelah-Dihapus.png |

## C. Kesimpulan

Berdasarkan pengujian yang dilakukan, fitur enrollment dapat menampilkan pilihan Participant dan Course, menyimpan pendaftaran, menolak pendaftaran duplikat, serta menampilkan laporan relasional.

Pengujian cascade delete menunjukkan bahwa penghapusan Course atau Participant akan menghapus Enrollment yang terkait tanpa menghapus entitas master lainnya.