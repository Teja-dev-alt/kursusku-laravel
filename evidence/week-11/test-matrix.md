# Test Matrix - CRUD Kursus
## Pertemuan 11

| No | Skenario Pengujian | Hasil yang Diharapkan | Status |
|---|---|---|---|
| 1 | Membuat kursus dengan code duplikat | Ditolak, muncul pesan validasi | Lulus |
| 2 | Membuat kursus dengan nama kosong | Ditolak, nama wajib diisi | Lulus |
| 3 | Membuat kursus dengan nama kurang dari 3 karakter | Ditolak, muncul pesan minimal 3 karakter | Lulus |
| 4 | Mengisi fee negatif | Ditolak, fee minimal 0 | Lulus |
| 5 | Mengisi fee dengan huruf | Ditolak, fee harus berupa integer | Lulus |
| 6 | Mengisi quota 0 | Ditolak, quota minimal 1 | Lulus |
| 7 | Mengisi quota 501 | Ditolak, quota maksimal 500 | Lulus |
| 8 | Mengisi quota 1 | Diterima | Lulus |
| 9 | Mengisi quota 500 | Diterima | Lulus |
| 10 | Mengisi tanggal tidak valid | Ditolak oleh validasi tanggal | Lulus |
| 11 | Mengisi status selain draft, open, closed | Ditolak oleh validasi status | Lulus |
| 12 | Update kursus tanpa mengubah code sendiri | Berhasil diperbarui | Lulus |
| 13 | Update menggunakan code milik kursus lain | Ditolak oleh validasi unique | Lulus |
| 14 | Update data kursus dengan data valid | Berhasil diperbarui | Lulus |
| 15 | Menghapus kursus dummy | Data terhapus dan muncul pesan sukses | Lulus |