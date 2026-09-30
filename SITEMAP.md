# BKK
## Public
* /bkk -> Landpage
* /bkk/berita -> List Berita tentang BKK
* /bkk/berita/{id_berita} -> Detail Berita tentang BKK
* /bkk/lowongan -> List Lowongan PKL/Kerja
* /bkk/lowongan/{id_lowongan} -> Detail Lowongan PKL/Kerja
* /bkk/tentang -> Tentang BKK Penus
* /bkk/kerja-sama -> Informsai kontak untuk menerima kerja sama PKL/Pekerjaan
* /bkk/dashboard/login -> Login untuk Mitra (Input Nama Perusahaan (Sanitize) & Password) ✅

## Authenticated (SISWA)
* /bkk/me/laporan -> Laporan PKL
* /bkk/me/jurnal -> Jurnal PKL Harian

## Authenticated (SISWA & ALUMNI)
* /bkk/{id_lowongan}/daftar -> Daftar 
* /bkk/me -> Dashboard Profil
* /bkk/me/cv -> Preview CV dan overview score CV (Ada AI untuk improvisasi)
* /bkk/me/cv/edit -> CV Editor (Ada AI untuk improvisasi)
* /bkk/me/lamaran -> Status riwayat pendaftaran kerja/PKL (e.g., Terkirim, Sedang Ditinjau, Dipanggil Interview, Diterima).

## Authenticated (MITRA) ✅
* /bkk/dashboard -> Dasboard Mitra
* /bkk/dashboard/pengaturan -> Ubah password. Input: Password sebelumnya & baru, Ubah logo perusahaan. Input: File max 5 MB (png, jpg, ico(n)), Logout (Hapus Cookie)
* /bkk/dashboard/lowongan -> Daftar Lowongan yang ditawarkan oleh Mitra
* /bkk/dashboard/lowongan/new -> Bikin lowongan baru
* /bkk/dashboard/lowongan/{id_lowongan} -> Edit informasi lowongan, Hapus, DLL
* /bkk/dashboard/lowongan/{id_lowongan}/pelamar -> Review daftar CV pelamar (siswa/alumni).
* /bkk/dashboard/lowongan/{id_lowongan}/pelamar/{id_pelamar} -> Detail pelamar, update status seleksi (Dipanggil, Interview, Diterima, Ditolak).

## Authenticated (ADMIN_BKK)
* /bkk/admin -> Dashboard Admin BKK ✅
* /bkk/admin/tracer-study -> Rekap data keterserapan alumni dan agregasi statistik. ✅
* /bkk/admin/mitra -> List daftar Mitra ✅
* /bkk/admin/mitra/new -> Bikin mitra baru. Input Nama Perusahaan (Sanitize) & Password ✅
* /bkk/admin/mitra/{id_mitra} -> Edit informasi Mitra, Hapus, DLL ✅
* /bkk/admin/lowongan -> Daftar Lowongan yang ditawarkan oleh Mitra ✅
* /bkk/admin/lowongan/{id_lowongan} -> Edit informasi lowongan, Hapus, DLL ✅
* /bkk/admin/lowongan/{id_lowongan}/siswa -> Siswa yang terdaftar PKL ✅
* /bkk/admin/pkl/monitoring -> Pantauan seluruh siswa yang sedang aktif PKL, lokasi mitra, dan guru pembimbingnya. ✅
* /bkk/admin/pkl/laporan-review -> Review dan validasi jurnal harian serta draf laporan akhir siswa. ✅
* /bkk/admin/berita/new -> Buat Berita Baru ✅
* /bkk/admin/berita/{id_berita} -> Edit informasi berita, Hapus, DLL ✅

Dari sitemap di atas. Aku pengen bikin dashboard untuk Authenticated Siswa & Alumni.

Coba bikinin prompt untuk AI Agent dengan tambahan:
## Color
Primary: #dcdcdc
Secondary: #1b283b
Third: #741918

## Design Insipration
Google Dashboard Design. Pokonya harus Google banget.