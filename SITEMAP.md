# BKK
## Public
* /bkk -> Landpage
* /bkk/berita -> List Berita tentang BKK
* /bkk/berita/{id_berita} -> Detail Berita tentang BKK
* /bkk/lowongan -> List Lowongan PKL/Kerja
* /bkk/lowongan/{id_lowongan} -> Detail Lowongan PKL/Kerja
* /bkk/tentang -> Tentang BKK Penus
* /bkk/kerja-sama -> Informsai kontak untuk menerima kerja sama PKL/Pekerjaan

## Authenticated (SISWA)
* /bkk/me/laporan -> Laporan PKL
* /bkk/me/jurnal -> Jurnal PKL Harian

## Authenticated (SISWA & ALUMNI)
* /bkk/{id_lowongan}/daftar -> Daftar 
* /bkk/me -> Dashboard Profil
* /bkk/me/cv -> Preview CV dan overview score CV (Ada AI untuk improvisasi)
* /bkk/me/cv/edit -> CV Editor (Ada AI untuk improvisasi)
* /bkk/me/lamaran -> Status riwayat pendaftaran kerja/PKL (e.g., Terkirim, Sedang Ditinjau, Dipanggil Interview, Diterima).

## Authenticated (MITRA)
* /bkk/dashboard -> Dasboard Mitra
* /bkk/dashboard/lowongan -> Daftar Lowongan yang ditawarkan oleh Mitra
* /bkk/dashboard/lowongan/new -> Bikin lowongan baru
* /bkk/dashboard/lowongan/{id_lowongan} -> Edit informasi lowongan, Hapus, DLL
* /bkk/dashboard/lowongan/{id_lowongan}/pelamar -> Review daftar CV pelamar (siswa/alumni).
* /bkk/dashboard/lowongan/{id_lowongan}/pelamar/{id_pelamar} -> Detail pelamar, update status seleksi (Dipanggil, Interview, Diterima, Ditolak).

## Authenticated (ADMIN_BKK)
* /bkk/dashboard -> Dashboard Admin BKK
* /bkk/dashboard/tracer-study -> Rekap data keterserapan alumni dan agregasi statistik.
* /bkk/dashboard/mitra -> List daftar Mitra
* /bkk/dashboard/mitra/{id_mitra} -> Edit informasi Mitra, Hapus, DLL
* /bkk/dashboard/lowongan -> Daftar Lowongan yang ditawarkan oleh Mitra
* /bkk/dashboard/lowongan/{id_lowongan} -> Edit informasi lowongan, Hapus, DLL
* /bkk/dashboard/lowongan/{id_lowongan}/siswa -> Siswa yang terdaftar PKL
* /bkk/dashboard/pkl/monitoring -> Pantauan seluruh siswa yang sedang aktif PKL, lokasi mitra, dan guru pembimbingnya.
* /bkk/dashboard/pkl/laporan-review -> Review dan validasi jurnal harian serta draf laporan akhir siswa.
* /bkk/dashboard/berita/new -> Buat Berita Baru
* /bkk/dashboard/berita/{id_berita} -> Edit informasi berita, Hapus, DLL

Dari sitemap di atas. Aku pengen bikin dashboard untuk Authenticated Siswa & Alumni.

Coba bikinin prompt untuk AI Agent dengan tambahan:
## Color
Primary: #dcdcdc
Secondary: #1b283b
Third: #741918

## Design Insipration
Google Dashboard Design. Pokonya harus Google banget.