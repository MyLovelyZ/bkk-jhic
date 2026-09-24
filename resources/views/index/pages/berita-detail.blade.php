@extends('index.master')

@section('title', 'Detail Berita - BKK SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col w-full">
<div class="w-full bg-surface-container-low py-4">
<div class="max-w-5xl mx-auto px-6 lg:px-8">
<nav aria-label="Breadcrumb" class="flex items-center gap-2 font-label-md text-label-md text-on-surface-variant overflow-x-auto whitespace-nowrap">
<a class="hover:text-primary transition-colors flex items-center gap-1" data-path="beranda" href="#">
<span class="material-symbols-outlined text-[16px]">home</span>
<span>Beranda</span>
</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<a class="hover:text-primary transition-colors" data-path="berita-&amp;-agenda" href="#">Berita &amp; Agenda</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface-variant/80">Tips Karier</span>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-semibold truncate max-w-xs md:max-w-md">5 Langkah Membuat CV Digital ATS</span>
</nav>
</div>
</div>
<article class="w-full max-w-5xl mx-auto px-6 lg:px-8 py-10 md:py-14">
<header class="flex flex-col gap-6">
<div class="flex flex-wrap items-center gap-3">
<span class="px-3.5 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-dense text-label-dense uppercase tracking-wider flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px]">school</span>
          Tips &amp; Panduan Karier Siswa
        </span>
<span class="px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant font-label-dense text-label-dense flex items-center gap-1">
<span class="material-symbols-outlined text-[15px] text-secondary">update</span>
          Diperbarui 10 Menit Lalu
        </span>
</div>
<h1 class="font-headline-xl text-headline-xl text-on-surface leading-tight tracking-tight">
        Panduan Praktis Siswa: 5 Langkah Membuat CV Digital Standar ATS Menggunakan BKK Penus
      </h1>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 py-6 bg-surface-container-lowest rounded-xl p-6 shadow-sm">
<div class="flex items-center gap-4">
<img alt="Ibu Sri Rahayu, M.Pd." class="w-14 h-14 rounded-full object-cover shadow-sm ring-2 ring-primary/10" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB63mLO-BnMgFFgqx1mTuwPFGCzTmwLyy8_J4aLTzOGznPDmlW9ogUP_BfzTLkJ0xlAceEAOeRFi6oS_ZIKOEISZaexn-6scwvS0zs0dbPRAtJzIBlUYU2AMsnkYW-A-8Jh1zw-wQ4iRtEhhvoE1Ukg7i6-1XSC3KrQ8MOWP1Mp2FIYqYepTfVt-76KoTaeWJF2gXKoGd38EgQEhJhlThO8F6cMObBxynYkKpZ54dFAgJrgWayRbAbo"/>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="font-title-md text-title-md text-on-surface">Ibu Sri Rahayu, M.Pd.</span>
<span class="material-symbols-outlined text-[18px] text-primary" style="font-variation-settings: 'FILL' 1;" title="Konselor Terverifikasi">verified</span>
</div>
<span class="font-body-dense text-body-dense text-on-surface-variant">Koordinator BKK &amp; Bimbingan Konseling SMK Penus</span>
<div class="flex items-center gap-3 font-label-dense text-label-dense text-on-surface-variant/80 mt-1">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">calendar_today</span>
                24 Februari 2025
              </span>
<span>•</span>
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">timer</span>
                5 Menit Baca
              </span>
</div>
</div>
</div>
<div class="flex items-center gap-2">
<button aria-label="Simpan Artikel" class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-surface-container text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all" id="btnBookmark" type="button">
<span class="material-symbols-outlined text-[20px]" id="bookmarkIcon">bookmark_border</span>
</button>
<a aria-label="Bagikan ke WhatsApp" class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-surface-container text-[#25D366] hover:bg-surface-container-high transition-all" href="https://api.whatsapp.com/send?text=Panduan%20Praktis%20Siswa:%205%20Langkah%20Membuat%20CV%20Digital%20ATS%20di%20BKK%20Penus" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[20px]">chat</span>
</a>
<a aria-label="Bagikan ke LinkedIn" class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-surface-container text-[#0A66C2] hover:bg-surface-container-high transition-all" href="https://www.linkedin.com/sharing/share-offsite/" rel="noopener noreferrer" target="_blank">
<span class="material-symbols-outlined text-[20px]">share</span>
</a>
<button aria-label="Salin Tautan" class="inline-flex items-center gap-2 px-4 h-11 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary/90 transition-all shadow-sm" id="btnCopyLink" type="button">
<span class="material-symbols-outlined text-[18px]" id="copyIcon">content_copy</span>
<span id="copyLabel">Salin Link</span>
</button>
</div>
</div>
</header>
<div class="mt-8 mb-12 overflow-hidden rounded-xl bg-surface-container shadow-md">
<div class="w-full h-80 sm:h-96 md:h-[460px] relative">
<img class="w-full h-full object-cover" data-alt="Modern professional editorial illustration of an Indonesian high school vocational student crafting an ATS digital resume on a sleek laptop, clean minimal background with vector icons of verified certificates, programming code snippets, balance sheets, and a BKK Penus badge, warm cinematic lighting, editorial aesthetic in corporate red, warm amber and crisp white colors." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhUAdcpYiluQpZfjpUo75IgCnwRib0o2bdtKm1MlqHU7QD6tTy0TRicTctlr_mFtI8N6qEz062Rn2qpj0sm2vDthps2LcZTHbMbUL8MBt5eL9DvYtkATQD6zsFjhBF7qiFJ4n7hqBGBljQVPzcbYNJOgrxfXn9DpEdIrnIaNVStIb4Xb5_hnfGFJvsACn3McSVO5PYoz7F2Qm293LjDMtfsyYmOuH6CJOM0-CxOoF7bLFwRIRL7unG"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end p-6 md:p-8">
<p class="font-body-dense text-body-dense text-white/90 bg-black/40 backdrop-blur-md px-4 py-2 rounded-full">
            Dokumentasi &amp; Ilustrasi: Modul Persiapan Magang Industri Mandiri • Unit Penjaminan Mutu Lulusan
          </p>
</div>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
<div class="lg:col-span-8 flex flex-col gap-8 text-on-surface">
<div class="font-body-editorial text-body-editorial text-on-surface-variant leading-relaxed">
<p class="first-letter:text-5xl first-letter:font-bold first-letter:text-primary first-letter:mr-3 first-letter:float-left first-letter:font-headline-lg">
            Masalah paling lazim yang kerap dihadapi siswa SMK tingkat akhir saat hendak melamar Praktik Kerja Lapangan (PKL) maupun lowongan kerja perdana adalah sindrom <em>“halaman kosong”</em>. Banyak siswa merasa rendah diri karena belum memiliki pengalaman kerja kantoran formal, sehingga bingung poin apa saja yang layak dimasukkan ke dalam resume profesional.
          </p>
<p class="mt-4">
            Padahal, industri mitra BKK Penus justru mencari <strong>kapabilitas kejuruan terapan, kedisiplinan teknis, dan portofolio nyata</strong>. Melalui standar <em>Applicant Tracking System (ATS)</em> yang kini diterapkan oleh 85% perusahaan rekanan BKK Pelita Nusantara, resume Anda dinilai berdasarkan kesesuaian kata kunci kompetensi, struktur hierarki teks yang bersih, dan keterverifikasian data.
          </p>
</div>
<section class="flex flex-col gap-4">
<div class="flex items-center gap-3">
<span class="w-10 h-10 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-headline-sm text-headline-sm font-bold shrink-0">1</span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">
              Konversikan Tugas &amp; Proyek Praktikum Menjadi Pengalaman Nyata (Project-Based Learning)
            </h2>
</div>
<p class="font-body-default text-body-default text-on-surface-variant pl-13">
            Jangan biarkan kolom pengalaman kosong melompong. Bila Anda jurusan Rekayasa Perangkat Lunak, cantumkan proyek akhir pembuatan sistem kasir berbasis web atau implementasi API pembayaran. Bagi jurusan Akuntansi, tuliskan pengalaman menyusun laporan keuangan neraca lajur UKM saat simulasi <em>Teaching Factory (TEFA)</em>. Gunakan formula aksi: <strong>Tindakan + Alat/Teknologi + Hasil yang Terukur</strong>.
          </p>
<div class="bg-surface-container rounded-lg p-5 ml-13 flex flex-col gap-2">
<span class="font-label-dense text-label-dense uppercase tracking-wider text-secondary">Contoh Format Penulisan:</span>
<p class="font-body-dense text-body-dense text-on-surface italic">
              “Mengembangkan aplikasi inventaris bengkel menggunakan PHP Native dan MySQL dengan efisiensi pencarian data suku cadang di bawah 2 detik selama program TEFA Semester 5.”
            </p>
</div>
</section>
<section class="flex flex-col gap-4">
<div class="flex items-center gap-3">
<span class="w-10 h-10 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-headline-sm text-headline-sm font-bold shrink-0">2</span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">
              Cantumkan Sertifikasi Uji Kompetensi Keahlian (UKK) dan Lisensi BNSP
            </h2>
</div>
<p class="font-body-default text-body-default text-on-surface-variant pl-13">
            Sertifikasi kejuruan adalah pembeda paling vital antara siswa SMK dengan pelamar umum. Di BKK Penus, HRD mitra secara spesifik menyortir kandidat berdasar nomor registrasi sertifikat BNSP (Badan Nasional Sertifikasi Profesi) atau predikat Uji Kompetensi Keahlian (UKK) Mandiri. Letakkan bagian ini langsung di bawah ringkasan profil Anda.
          </p>
</section>
<section class="flex flex-col gap-4">
<div class="flex items-center gap-3">
<span class="w-10 h-10 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-headline-sm text-headline-sm font-bold shrink-0">3</span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">
              Gunakan Kata Kunci Teknis Sesuai Spesialisasi Jurusan
            </h2>
</div>
<p class="font-body-default text-body-default text-on-surface-variant pl-13">
            Algoritma ATS bekerja dengan mencocokkan kata kunci spesifik yang tercantum pada kualifikasi lowongan. Hindari istilah umum yang kabur seperti “bisa komputer” atau “rajin bekerja”. Ganti dengan frasa kompetensi industri yang presisi:
          </p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-3 pl-13">
<div class="bg-surface-container-low p-4 rounded-DEFAULT">
<span class="font-title-md text-title-md text-primary block mb-2">TKJ &amp; RPL</span>
<ul class="font-body-dense text-body-dense text-on-surface-variant flex flex-col gap-1.5">
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span>MikroTik MTCNA, Subnetting CIDR</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Tailwind CSS, React.js, Git Versioning</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Cisco Packet Tracer, Linux Server CentOS</li>
</ul>
</div>
<div class="bg-surface-container-low p-4 rounded-DEFAULT">
<span class="font-title-md text-title-md text-secondary block mb-2">AKL &amp; OTKP</span>
<ul class="font-body-dense text-body-dense text-on-surface-variant flex flex-col gap-1.5">
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>General Ledger &amp; Neraca Lajur</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>Perpajakan PPh 21 &amp; e-Faktur</li>
<li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>Kearsipan Sistem Abjad &amp; Agenda Surat</li>
</ul>
</div>
</div>
</section>
<div class="my-4 p-6 sm:p-8 rounded-xl bg-gradient-to-br from-primary-fixed/40 via-surface-container-low to-surface-container shadow-sm flex flex-col md:flex-row items-start gap-5">
<div class="w-12 h-12 rounded-full bg-primary text-on-primary flex items-center justify-center shrink-0 shadow-md">
<span class="material-symbols-outlined text-[26px]">smart_toy</span>
</div>
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">Fitur Otomatis BKK Penus</span>
<span class="px-2 py-0.5 rounded bg-secondary-container text-on-secondary-container font-label-dense text-label-dense font-semibold">Eksklusif Siswa</span>
</div>
<p class="font-body-default text-body-default text-on-surface-variant leading-relaxed">
              Siswa tidak perlu bingung mendesain layout grafis yang rumit dari nol. Cukup login ke portal siswa, masukkan nilai rapor dan sertifikat di menu <strong>Akun Siswa &gt; Berkas CV</strong>, sistem BKK akan otomatis meng-generate CV PDF berstandar ATS internasional lengkap dengan QR Verifikasi Sekolah.
            </p>
<div class="pt-2">
<a class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-primary-container text-on-primary font-label-md text-label-md font-semibold hover:bg-primary transition-colors" data-path="login-siswa" href="#">
<span class="material-symbols-outlined text-[18px]">auto_fix_high</span>
                Generate CV Otomatis Sekarang
              </a>
</div>
</div>
</div>
<section class="flex flex-col gap-4">
<div class="flex items-center gap-3">
<span class="w-10 h-10 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-headline-sm text-headline-sm font-bold shrink-0">4</span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">
              Sertakan Bukti Portofolio Tautan Aktif (GitHub, Figma, atau Cloud Drive)
            </h2>
</div>
<p class="font-body-default text-body-default text-on-surface-variant pl-13">
            Rekruter industri vokasi mengapresiasi pelamar yang berani menunjukkan hasil karya nyata. Pastikan tautan portofolio dapat diakses publik tanpa hambatan kata sandi. Cantumkan tautan Figma untuk siswa Desain Komunikasi Visual, repositori GitHub untuk RPL, atau Google Drive rapi berisi lembar kerja kalkulasi akuntansi untuk AKL.
          </p>
</section>
<section class="flex flex-col gap-4">
<div class="flex items-center gap-3">
<span class="w-10 h-10 rounded-full bg-primary-fixed text-primary flex items-center justify-center font-headline-sm text-headline-sm font-bold shrink-0">5</span>
<h2 class="font-headline-md text-headline-md text-on-surface font-semibold">
              Pastikan Kontak Valid &amp; Nilai Rapor Terverifikasi Tata Usaha
            </h2>
</div>
<p class="font-body-default text-body-default text-on-surface-variant pl-13">
            Banyak lamaran gugur karena nomor WhatsApp yang tidak aktif atau alamat surel yang tidak profesional (misal: <em>pejuang.santai99@gmail.com</em>). Gunakan format nama depan dan belakang resmi: <em>nama.lengkap@domain.com</em>. Pastikan pula sinkronisasi nilai rapor semester 1-5 telah disahkan oleh staf TU BKK agar memperoleh status <strong>“Validated by Penus Authority”</strong>.
          </p>
</section>
<section class="mt-4 p-6 bg-surface-container rounded-xl flex flex-col gap-3">
<h3 class="font-title-md text-title-md text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-primary">flag</span>
            Kesimpulan &amp; Arahan Selanjutnya
          </h3>
<p class="font-body-default text-body-default text-on-surface-variant">
            Penyusunan resume bukan sekadar mendaftar riwayat hidup, melainkan instrumen <em>positioning</em> nilai tambah kejuruan Anda. Jangan tunda hingga masa kelulusan tiba. Mulailah menginventarisir bukti praktikum hari ini, lalu manfaatkan generator CV BKK Penus untuk segera mendaftar pada deretan lowongan PKL gelombang terbaru.
          </p>
</section>
<div class="mt-8 p-6 md:p-8 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col sm:flex-row items-center sm:items-start gap-6">
<img alt="Ibu Sri Rahayu, M.Pd." class="w-20 h-20 rounded-full object-cover shadow-sm shrink-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB63mLO-BnMgFFgqx1mTuwPFGCzTmwLyy8_J4aLTzOGznPDmlW9ogUP_BfzTLkJ0xlAceEAOeRFi6oS_ZIKOEISZaexn-6scwvS0zs0dbPRAtJzIBlUYU2AMsnkYW-A-8Jh1zw-wQ4iRtEhhvoE1Ukg7i6-1XSC3KrQ8MOWP1Mp2FIYqYepTfVt-76KoTaeWJF2gXKoGd38EgQEhJhlThO8F6cMObBxynYkKpZ54dFAgJrgWayRbAbo"/>
<div class="flex flex-col gap-2 text-center sm:text-left">
<div class="flex flex-col sm:flex-row sm:items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface font-semibold">Ibu Sri Rahayu, M.Pd.</span>
<span class="font-label-dense text-label-dense px-2.5 py-0.5 rounded-full bg-primary/10 text-primary w-fit mx-auto sm:mx-0">Penulis &amp; Konselor Karier</span>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant">
              Berpengalaman lebih dari 12 tahun membimbing ribuan siswa SMK Plus Pelita Nusantara menembus industri otomotif, perbankan, manufaktur, dan software house nasional. Memegang sertifikasi Konselor Vokasi BNSP.
            </p>
<div class="pt-2 flex flex-wrap items-center justify-center sm:justify-start gap-3">
<a class="inline-flex items-center gap-1 font-label-dense text-label-dense text-primary font-semibold hover:underline" href="#">
<span class="material-symbols-outlined text-[16px]">mail</span>
                Konsultasi Bimbingan Karier
              </a>
<span class="text-on-surface-variant/40">•</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Ruang BKK Gedung A Lt. 2</span>
</div>
</div>
</div>
</div>
<aside class="lg:col-span-4 flex flex-col gap-8">
<div class="p-6 rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-5 sticky top-28">
<span class="font-title-md text-title-md text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-primary">view_timeline</span>
            Alur Cepat BKK Penus
          </span>
<div class="flex flex-col gap-4">
<div class="flex items-start gap-3">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">1</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Lengkapi Profil Siswa</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Upload nilai &amp; portofolio praktikum.</span>
</div>
</div>
<div class="flex items-start gap-3">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">2</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Generate ATS CV</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Unduh format PDF terstandar resmi.</span>
</div>
</div>
<div class="flex items-start gap-3">
<div class="w-7 h-7 rounded-full bg-primary-container text-on-primary flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">3</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Apply Lowongan Sekali Klik</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Tersambung ke 45+ IDUKA mitra Penus.</span>
</div>
</div>
</div>
<div class="p-4 rounded-DEFAULT bg-surface-container flex flex-col gap-2">
<span class="font-label-dense text-label-dense uppercase tracking-wider text-secondary font-bold">Agenda Terdekat</span>
<span class="font-title-md text-title-md text-on-surface">Walk-in Interview Batch 1</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Kamis, 6 Maret 2025 di Aula Utama</span>
<a class="mt-2 text-primary font-label-dense text-label-dense font-semibold flex items-center gap-1 hover:underline" data-path="berita-&amp;-agenda" href="#">
              Lihat Syarat &amp; Dokumen
              <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
<div class="p-4 rounded-DEFAULT bg-primary/5 flex flex-col gap-3">
<span class="font-label-dense text-label-dense uppercase tracking-wider text-primary font-bold">Unduhan Berkas</span>
<div class="flex items-center justify-between p-2.5 rounded bg-surface-container-lowest">
<div class="flex items-center gap-2 truncate">
<span class="material-symbols-outlined text-primary">description</span>
<span class="font-body-dense text-body-dense text-on-surface truncate">Template_CV_ATS_Penus.docx</span>
</div>
<button aria-label="Unduh Dokumen" class="text-on-surface-variant hover:text-primary" type="button">
<span class="material-symbols-outlined text-[20px]">download</span>
</button>
</div>
</div>
</div>
</aside>
</div>
<section class="mt-20 pt-12">
<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
<div>
<span class="font-label-dense text-label-dense uppercase tracking-wider text-primary font-bold">Rekomendasi Bacaan</span>
<h3 class="font-headline-lg text-headline-lg text-on-surface font-semibold mt-1">Artikel &amp; Pembekalan Terkait</h3>
</div>
<a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary font-semibold hover:text-on-surface transition-colors" data-path="berita-&amp;-agenda" href="#">
          Lihat Semua Artikel
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<article class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
<div class="h-44 w-full relative">
<img class="w-full h-full object-cover" data-alt="Two Indonesian vocational students participating in a realistic mock job interview session with an HR manager in a bright corporate office boardroom, clean professional atmosphere, sharp suits and school uniform, warm daylight." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBx3Y_kXptbFqRVvG7lGj3c5V2AI36Uds84r2YEcN-4JXukxlccCWG9pdXp-2kzX_peEaHehHQ4zdlmWsJRJ8oDQM2R9Usc2XlP6NVNKT5rPjEr2BRZ0vBWZ7ebEi9zZjbSp5m6Ka0UFjR3k9XIpMYEHtoD_wTdxAmsJ6wFbF4qpODwjjzRz0r6411RGaNNg4bBSR5oOKkhOCgn_qV4NjCkj-3kPJ3pkt3qHmpdJMV3eFpPZ0UJ_c3J"/>
<span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md text-on-surface font-label-dense text-label-dense">Tips Interview</span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 font-label-dense text-label-dense text-on-surface-variant">
<span>18 Feb 2025</span>
<span>•</span>
<span>4 Min Baca</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface font-semibold line-clamp-2 hover:text-primary cursor-pointer transition-colors">
                7 Pertanyaan Jebakan HRD Saat Wawancara Magang dan Cara Menjawabnya
              </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                Simulasi taktik menjawab kelemahan diri serta ekspektasi uang saku magang secara profesional tanpa terdengar arogan.
              </p>
</div>
<a class="font-label-md text-label-md text-primary font-semibold flex items-center gap-1 hover:underline" href="#">
              Baca Selengkapnya
              <span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
</article>
<article class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
<div class="h-44 w-full relative">
<img class="w-full h-full object-cover" data-alt="Industrial workplace setting with an Indonesian vocational student wearing safety equipment, hardhat, and uniform performing machinery inspection alongside a senior factory mentor in an automotive manufacturing plant, bright industrial high-contrast lighting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDVtTHc7zWDHkPyMujAGoHebcx0VS8q1q-FtP1rFHMGQbZY0DbrIFhiO94NaUN9WQpwb5GYqeZBrOdZFhAwLFTUkDZ42WJQ00jQKn-yF61VlM8uijcU1IV6cnKwhQfqSe0-hpkItnr93QFFRRwE7W2uHlXjs40R9V3jjxVmTw9-bwbqmaw2DOtQF7QWseqOfRw-FsSXBsGuJTVqC9cUWxFcIp5rIAHiIeXOyxbLSNQ8UEKh7X98Xp2N"/>
<span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md text-on-surface font-label-dense text-label-dense">Pembekalan PKL</span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 font-label-dense text-label-dense text-on-surface-variant">
<span>12 Feb 2025</span>
<span>•</span>
<span>6 Min Baca</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface font-semibold line-clamp-2 hover:text-primary cursor-pointer transition-colors">
                Etika Kerja &amp; Budaya Industri 5R yang Wajib Diterapkan Selama Masa Magang
              </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                Panduan praktis menjaga etos kedisiplinan kerja, standar keselamatan K3, dan komunikasi asertif dengan supervisor di IDUKA.
              </p>
</div>
<a class="font-label-md text-label-md text-primary font-semibold flex items-center gap-1 hover:underline" href="#">
              Baca Selengkapnya
              <span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
</article>
<article class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
<div class="h-44 w-full relative">
<img class="w-full h-full object-cover" data-alt="Young female vocational student at desk proudly holding an accredited national vocational competence certificate from BNSP, clean modern classroom studio, gentle rim light, radiant confident smile." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB1xlSRvSisaEY0BoRFUSSYj-eHy1wox9YKeuid3ix_dDbNf4Z_Y5kwuaESylCq3KvggZNrBRZo9OOa7_TMDT0wUcJQCfwAthP7FkmbYsjGFolXVESeUsQP-o6x21G9PPODTJIAl9IaY1XLuBWHA98_u80l4p_sLcZirUjQEi1qjvuHB6Wr3iKx94Hix2lx13LgcgWO2I4Mlp1kL4ls54E5nYU5tmuzoaFPZPBfYbrDil2kS0SJdTnf"/>
<span class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-surface-container-lowest/90 backdrop-blur-md text-on-surface font-label-dense text-label-dense">Sertifikasi BNSP</span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 font-label-dense text-label-dense text-on-surface-variant">
<span>05 Feb 2025</span>
<span>•</span>
<span>5 Min Baca</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface font-semibold line-clamp-2 hover:text-primary cursor-pointer transition-colors">
                Daftar Skema Uji Kompetensi BNSP yang Paling Banyak Dicari Perusahaan 2025
              </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                Ulasan komprehensif mengenai unit kompetensi bersertifikasi negara yang memberikan nilai tawar gaji awal lebih kompetitif.
              </p>
</div>
<a class="font-label-md text-label-md text-primary font-semibold flex items-center gap-1 hover:underline" href="#">
              Baca Selengkapnya
              <span class="material-symbols-outlined text-[16px]">chevron_right</span>
</a>
</div>
</article>
</div>
</section>
</article>
<script>
    (function() {
      const btnBookmark = document.getElementById('btnBookmark');
      const bookmarkIcon = document.getElementById('bookmarkIcon');
      let bookmarked = false;

      if (btnBookmark && bookmarkIcon) {
        btnBookmark.addEventListener('click', function() {
          bookmarked = !bookmarked;
          if (bookmarked) {
            bookmarkIcon.textContent = 'bookmark';
            bookmarkIcon.style.fontVariationSettings = "'FILL' 1";
            btnBookmark.classList.add('text-primary');
          } else {
            bookmarkIcon.textContent = 'bookmark_border';
            bookmarkIcon.style.fontVariationSettings = "'FILL' 0";
            btnBookmark.classList.remove('text-primary');
          }
        });
      }

      const btnCopyLink = document.getElementById('btnCopyLink');
      const copyIcon = document.getElementById('copyIcon');
      const copyLabel = document.getElementById('copyLabel');

      if (btnCopyLink && copyIcon && copyLabel) {
        btnCopyLink.addEventListener('click', function() {
          if (navigator.clipboard) {
            navigator.clipboard.writeText(window.location.href).catch(function() {});
          }
          copyIcon.textContent = 'check';
          copyLabel.textContent = 'Tersalin!';
          setTimeout(function() {
            copyIcon.textContent = 'content_copy';
            copyLabel.textContent = 'Salin Link';
          }, 2500);
        });
      }
    })();
  </script>
</div>
@endsection