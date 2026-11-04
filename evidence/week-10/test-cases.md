# Test Case Week 10 — KursusKu

| No. | Skenario | Input | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|
| 1 | Simpan data valid | Semua field valid | Data tersimpan, kembali ke index, pesan sukses | Isi setelah pengujian | - |
| 2 | Kode kosong | code kosong | Validasi gagal, data tidak tersimpan | Isi setelah pengujian | - |
| 3 | Kode duplikat | WEB-101 kedua kali | Ditolak oleh validasi unique | Isi setelah pengujian | - |
| 4 | Nama kosong | name kosong | Validasi gagal | Isi setelah pengujian | - |
| 5 | Biaya negatif | fee = -1000 | Ditolak karena min:0 | Isi setelah pengujian | - |
| 6 | Kuota 0 | quota = 0 | Ditolak karena min:1 | Isi setelah pengujian | - |
| 7 | Status tidak valid | status = active | Ditolak karena status hanya draft/open/closed | Isi setelah pengujian | - |
| 8 | Daftar tampil ulang | Reload /courses | Data tetap tampil dari MySQL | Isi setelah pengujian | - |