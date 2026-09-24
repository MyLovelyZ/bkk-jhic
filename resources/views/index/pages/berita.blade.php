@extends('index.master')

@section('title', 'Berita & Agenda - BKK SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col w-full">
<!-- Page Header & Categorization Layer -->
<section class="w-full bg-surface-container-low py-12 lg:py-16">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-8">
<!-- Breadcrumb & Status Pill -->
<div class="flex items-center gap-3">
<span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary font-label-dense text-label-dense">
<span class="w-2 h-2 rounded-full bg-primary mr-2 animate-pulse"></span>
          Warta &amp; Agenda Terkini
        </span>
<span class="text-on-surface-variant font-label-dense text-label-dense">/ Portal Informasi Terpadu</span>
</div>
<!-- Main Header Text -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
<div class="max-w-3xl flex flex-col gap-3">
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">
            Kabar &amp; Agenda Bursa Kerja Khusus
          </h1>
<p class="font-body-editorial text-body-editorial text-on-surface-variant">
            Informasi terkini mengenai bursa kerja, agenda walk-in interview, kunjungan industri, pembekalan magang (PKL), serta tips karier persiapan dunia kerja SMK Plus Pelita Nusantara.
          </p>
</div>
<!-- Quick Search Form -->
<div class="w-full sm:w-80 relative shrink-0">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">search</span>
<input class="w-full pl-11 pr-4 py-3 bg-surface-container-lowest text-on-surface font-body-default text-body-default rounded-full shadow-sm placeholder:text-on-surface-variant/70 focus:outline-none focus:ring-2 focus:ring-primary/20" placeholder="Cari berita atau agenda..." type="text"/>
</div>
</div>
<!-- Category Filter Tabs -->
<div class="flex items-center gap-2 overflow-x-auto pb-2 pt-1 no-scrollbar">
<button class="px-5 py-2.5 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold shrink-0 shadow-sm transition-all hover:bg-primary/90 flex items-center gap-2">
<span>Semua Artikel</span>
<span class="text-[11px] bg-white/20 px-2 py-0.5 rounded-full">24</span>
</button>
<button class="px-5 py-2.5 rounded-full bg-surface-container text-on-surface font-label-md text-label-md shrink-0 hover:bg-surface-variant transition-colors flex items-center gap-2">
<span>Agenda &amp; Event</span>
<span class="text-[11px] bg-on-surface/10 px-2 py-0.5 rounded-full text-on-surface-variant">8</span>
</button>
<button class="px-5 py-2.5 rounded-full bg-surface-container text-on-surface font-label-md text-label-md shrink-0 hover:bg-surface-variant transition-colors flex items-center gap-2">
<span>Kunjungan Industri</span>
<span class="text-[11px] bg-on-surface/10 px-2 py-0.5 rounded-full text-on-surface-variant">6</span>
</button>
<button class="px-5 py-2.5 rounded-full bg-surface-container text-on-surface font-label-md text-label-md shrink-0 hover:bg-surface-variant transition-colors flex items-center gap-2">
<span>Panduan &amp; Tips Karier</span>
<span class="text-[11px] bg-on-surface/10 px-2 py-0.5 rounded-full text-on-surface-variant">7</span>
</button>
<button class="px-5 py-2.5 rounded-full bg-surface-container text-on-surface font-label-md text-label-md shrink-0 hover:bg-surface-variant transition-colors flex items-center gap-2">
<span>Prestasi Alumni</span>
<span class="text-[11px] bg-on-surface/10 px-2 py-0.5 rounded-full text-on-surface-variant">3</span>
</button>
</div>
</div>
</section>
<!-- Main Content Structure: Hero + Articles Grid with Sidebar -->
<section class="w-full max-w-7xl mx-auto px-6 lg:px-12 py-12 lg:py-16 flex flex-col gap-12">
<!-- FEATURED HERO ARTICLE (Horizontal Split 16:9 feel) -->
<article class="w-full bg-surface-container-lowest rounded-lg shadow-sm overflow-hidden flex flex-col lg:flex-row transition-all hover:shadow-md">
<!-- Media Aspect Holder -->
<div class="lg:w-7/12 relative aspect-video lg:aspect-auto min-h-[320px] overflow-hidden group">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Suasana riuh antusias Job Fair akbar di aula auditorium SMK dengan stan-stan perusahaan ternama, banner bertuliskan Penus Career Expo, ratusan siswa berseragam rapi membawa map berkas CV, pencahayaan panggung modern hangat dengan nuansa merah dan amber korporat profesional." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUM_9PoEDzhUHmysf4BQAkT6lrpVW6bpBNpCPaTFKzAYGFnllsgVWTQNfJTWHAi1yxF_RhLLP4cxUUc7ZB09-sJOgY7ng8NZN7hwgw7Va_jkHa3--Cp3LB1LEw064ZKk2M1otu2uG6ily06ajNGnvx5hqVoE9yDT3aFtKAlB-d7SSSdhePgEWrs_nXRkfKrBqNFVoGt2Ozb-bIg55sYJhjHaA3sjDTI8G8eoB0HdZDlf6FpDDDOC1b"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent lg:hidden"></div>
<div class="absolute top-4 left-4 flex flex-wrap gap-2">
<span class="px-3 py-1 rounded-full bg-primary text-on-primary font-label-dense text-label-dense uppercase tracking-wider font-semibold shadow-sm">
            Agenda Utama
          </span>
<span class="px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-dense text-label-dense uppercase tracking-wider font-semibold shadow-sm">
            Walk-in Interview
          </span>
</div>
</div>
<!-- Text Details -->
<div class="lg:w-5/12 p-8 lg:p-10 flex flex-col justify-between bg-surface-container-lowest">
<div class="flex flex-col gap-4">
<!-- Metadata Bar -->
<div class="flex items-center gap-4 text-on-surface-variant font-label-dense text-label-dense">
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">calendar_today</span>
              24 Mei 2025
            </span>
<span>•</span>
<span class="flex items-center gap-1">
<span class="material-symbols-outlined text-[16px]">schedule</span>
              4 Menit Baca
            </span>
</div>
<h2 class="font-headline-md text-headline-md text-on-surface leading-snug hover:text-primary transition-colors cursor-pointer">
            Job Fair Akbar SMK Plus Pelita Nusantara 2025: Hadirkan 35 Perusahaan Nasional dan 500+ Lowongan Khusus Lulusan Vokasi
          </h2>
<p class="font-body-default text-body-default text-on-surface-variant line-clamp-3">
            Pusat karier BKK Penus kembali menghelat perhelatan rekrutmen massal tahunan dengan menggandeng industri otomotif, teknologi informasi, logistik, dan hospitality terkemuka. Registrasi dibuka secara terintegrasi via portal mandiri siswa.
          </p>
</div>
<!-- Byline & CTA -->
<div class="pt-6 mt-6 flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-semibold text-[14px]">
              HP
            </div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Tim Humas &amp; BKK Penus</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Sekretariat Penus Cibinong</span>
</div>
</div>
<a class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold hover:bg-primary/90 transition-all" href="#">
<span>Baca Selengkapnya</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- CONTENT GRID: Left (Articles) & Right (Sidebar) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
<!-- ARTICLES COLUMN (8 Cols) -->
<div class="lg:col-span-8 flex flex-col gap-8">
<div class="flex items-center justify-between">
<h3 class="font-title-md text-title-md text-on-surface flex items-center gap-2">
<span class="w-1.5 h-6 bg-primary rounded-full inline-block"></span>
            Semua Publikasi Terkini
          </h3>
<span class="font-label-dense text-label-dense text-on-surface-variant">Menampilkan 1 - 6 dari 24 Kabar</span>
</div>
<!-- 6 Cards Grid (2 columns on desktop) -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
<!-- Card 1 -->
<article class="flex flex-col bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative aspect-[16/10] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Sesi penandatanganan kesepakatan nota kesepahaman MoU antara kepala sekolah SMK vokasi dan pimpinan manajer HRD perusahaan manufaktur otomotif besar dengan latar logo Astra dan Telkom, suasana ruang rapat resmi berstandar industri modern." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDE8yzqYGf2hT4bYvUkHE0P7LQgydg9R0JGxxrsQKfytPHWXSCg9IWXfcX_nrjJ3tHsMSxkKdGtjyT3eZeLj1jnL_efbCxxQQQ1rPqDBPxDVQ5U7rmdpL6VSDBr6yf98jPqXXhC-fzM_wcQsU_vHGlHvReqVE4tXOK0o6wSCcp0Yxwo8N7cY9mPA1t1Zs1n7upMLABr0pJ3EgkuMOf71n6CdWgWs8fblcFnXMRfm1Lv9r4l8YgJs-zC"/>
<span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full bg-surface-container-lowest/90 backdrop-blur text-primary font-label-dense text-label-dense font-semibold">
                Kemitraan
              </span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant font-label-dense text-label-dense">
<span>20 Mei 2025</span>
<span>•</span>
<span>3 Menit</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug line-clamp-2">
                  Penyelarasan Kurikulum Vokasi 2025 bersama PT Astra Otoparts &amp; Telkom Akses
                </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                  Memastikan kompetensi teknis peserta didik jurusan TKRO, TKJ, dan RPL selaras langsung dengan standar operasional pabrikasi terkini.
                </p>
</div>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-on-surface-variant">Humas Industri</span>
<span class="text-primary font-label-dense text-label-dense font-semibold flex items-center group-hover:translate-x-1 transition-transform">
                  Selengkapnya <span class="material-symbols-outlined text-[16px] ml-0.5">chevron_right</span>
</span>
</div>
</div>
</article>
<!-- Card 2 -->
<article class="flex flex-col bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative aspect-[16/10] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Tampilan laptop modern menampilkan dokumen Curriculum Vitae terstruktur rapi dengan layout ATS friendly di atas meja kayu bersih lengkap dengan secangkir kopi dan kacamata berbingkai tipis, pencahayaan natural hangat." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgZM4aRMWxSK85LgW7L5yuximWGp-AlZzvEKoqzdO5AJla8LiJ1cQi_wTD5N9WdrsJkrj1cdIa5K8bnmdSWe7MrXyc50aj7X9ybnEleQVvqcNNfOqaMF621Sms7TwENvaJM1Z_o7aaC-IY2HbgRb9pkqKcwFKNs6lCTay2Pr0y30hdklYM_ybjJw9VaOiKoRhl0eexabsiysf-Shfz9Olh8Lajzj8xsi77R8zz49QSKS7KEgEI6TGM"/>
<span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full bg-surface-container-lowest/90 backdrop-blur text-secondary font-label-dense text-label-dense font-semibold">
                Tips Karier
              </span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant font-label-dense text-label-dense">
<span>18 Mei 2025</span>
<span>•</span>
<span>5 Menit</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug line-clamp-2">
                  Panduan Praktis Siswa: 5 Langkah Membuat CV Digital Standar ATS Menggunakan BKK Penus
                </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                  Pelajari rahasia lolos penyaringan otomatis Applicant Tracking System bagi fresh graduate SMK dengan kata kunci kompetensi keahlian.
                </p>
</div>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-on-surface-variant">Konselor Karier</span>
<span class="text-primary font-label-dense text-label-dense font-semibold flex items-center group-hover:translate-x-1 transition-transform">
                  Selengkapnya <span class="material-symbols-outlined text-[16px] ml-0.5">chevron_right</span>
</span>
</div>
</div>
</article>
<!-- Card 3 -->
<article class="flex flex-col bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative aspect-[16/10] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Barisan siswa SMK berseragam werpack praktikum rapi mendengarkan pengarahan instruktur di aula sekolah berbendera merah putih, apel pembekalan magang industri dengan sikap disiplin dan optimis cerah." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdEP9QiyayhPuPK5DqZghuMq7WPV4nv2Cp_p0FupgIiKyxwcr2TNBXEk6Lx8v7IHJhG-BAapIfGLu3yTcdKQ-XqylHfI4nkUoq0AsBSmCIc1z6siGwT6eJlTdEXYfmQqcM4CPzBHfKoLxV2MXh5aCPQbBclhiUZTHDrC2_y09ZFFHKVVMmNc4wFzOBdlxRbADB3Tn5_TfyJVV9a-pHG9CiIXwY8BfA7iLu5d2kkabwqeMDZA9OfBM2"/>
<span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full bg-surface-container-lowest/90 backdrop-blur text-primary font-label-dense text-label-dense font-semibold">
                Agenda
              </span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant font-label-dense text-label-dense">
<span>15 Mei 2025</span>
<span>•</span>
<span>2 Menit</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug line-clamp-2">
                  Jadwal Pembekalan dan Pelepasan PKL Gelombang II Tahun Ajaran 2024/2025
                </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                  Informasi komprehensif tanggal serah terima ke 42 IDUKA mitra, tata tertib absensi harian, dan pembagian dosen pamong pembimbing lapangan.
                </p>
</div>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-on-surface-variant">Pokja Magang PKL</span>
<span class="text-primary font-label-dense text-label-dense font-semibold flex items-center group-hover:translate-x-1 transition-transform">
                  Selengkapnya <span class="material-symbols-outlined text-[16px] ml-0.5">chevron_right</span>
</span>
</div>
</div>
</article>
<!-- Card 4 -->
<article class="flex flex-col bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative aspect-[16/10] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Potret seorang alumni muda tersenyum percaya diri mengenakan lanyard identitas ID Card kantor teknologi startup modern, duduk di depan monitor multi-display menampilkan kode pemrograman awan cloud server." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDkPp_-I6dMWpDQDJpKhyQvaRhj2nCMcjrTrSTLLPv8QxLYkSQHyJnbSO3nZSfhMaOnzeqDs1IqacW27WCBGrD7yiWy5GHhZr7vC5ATdXpRdk4EGM_0YaMI647jqM2KbsZZ2axt4ucUW8EcqbkLWRoLf321usoQGmlG5pbiSvhamXaq7UEsZu2EFCB579t7lVyh41Zs-PauvBFeSnCDcoeNn1hoY2YLuwfUCtzSMsK1IQS4XDTWuSjd"/>
<span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full bg-surface-container-lowest/90 backdrop-blur text-secondary-container text-on-secondary-container font-label-dense text-label-dense font-semibold">
                Prestasi
              </span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant font-label-dense text-label-dense">
<span>12 Mei 2025</span>
<span>•</span>
<span>6 Menit</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug line-clamp-2">
                  Kisah Sukses Alumni: Dari Magang PKL di Software Studio hingga Diangkat Menjadi Junior Cloud Engineer
                </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                  Simak perjalanan Dimas Ramadhan (Alumni RPL '23) membuktikan dedikasi tinggi selama masa prakerin berbuah kontrak kerja profesional tetap.
                </p>
</div>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-on-surface-variant">Divisi Alumni</span>
<span class="text-primary font-label-dense text-label-dense font-semibold flex items-center group-hover:translate-x-1 transition-transform">
                  Selengkapnya <span class="material-symbols-outlined text-[16px] ml-0.5">chevron_right</span>
</span>
</div>
</div>
</article>
<!-- Card 5 -->
<article class="flex flex-col bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative aspect-[16/10] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Suasana simulasi wawancara kerja tatap muka profesional antara calon pencari kerja muda yang sopan dan dua orang panelis pewawancara HRD di ruang kantor berdinding kaca elegan." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxEkNx4fgUB6x2z7PMfHpsPLuVBy3ss3HuIdM-NwMj27DJWvXSkfEb-K9OwT7IiRaQQjc2tDW0UT5GSOO4eG9p7V2YAw9nFLVuU9uh4cAdTRolFFKyBnwRD2fi5XCNlnB7r6GHLyfVhV6V4o5xIW214A1EXGdJz39Fp-O5_WZ0CfqKzuTICjbymmgK5Qlo5qhAHoLdkVvNA8si0l9VaTw9LSMfrYNnewcg2nMkhRtMz-sUh8Kx8CN0"/>
<span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full bg-surface-container-lowest/90 backdrop-blur text-secondary font-label-dense text-label-dense font-semibold">
                Tips Karier
              </span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant font-label-dense text-label-dense">
<span>08 Mei 2025</span>
<span>•</span>
<span>4 Menit</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug line-clamp-2">
                  Tips Menjawab Pertanyaan Menjebak Saat Interview Kerja untuk Fresh Graduate SMK
                </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                  Strategi menggunakan metode STAR (Situation, Task, Action, Result) saat ditanya kelemahan diri, gaji yang diharapkan, dan rencana studi lanjutan.
                </p>
</div>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-on-surface-variant">Bimbingan Karier</span>
<span class="text-primary font-label-dense text-label-dense font-semibold flex items-center group-hover:translate-x-1 transition-transform">
                  Selengkapnya <span class="material-symbols-outlined text-[16px] ml-0.5">chevron_right</span>
</span>
</div>
</div>
</article>
<!-- Card 6 -->
<article class="flex flex-col bg-surface-container-lowest rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
<div class="relative aspect-[16/10] overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="Presentasi sosialisasi program magang ke luar negeri dengan latar bendera Indonesia dan Jepang, instruktur bahasa asing menunjukkan dokumen visa magang teknis tokutei ginou kepada pelajar SMK di kelas multimedia." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0I8ALJRMLmAlhbAMxhmsMx8uE7F1pzd1WFnb0ZxH683ywhCcsHDXbBrXn5ibo2An4rWYNO_zBYwXFK27-rNyU-vdnztbnNEbl1VesWlzFWtXC0pflKEvdDT8zsxWJ6jJ2BmAlyah_vBcscfwtjFEEScLcRfM7YoqZ-6XJOrUS4bcAiAxd_OH9Y4326s0okMv0Zk6lNHFx32uOLvo4fBJ9KDYbpRfSyGo0J4A--ikyonV9esaMLur9"/>
<span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full bg-surface-container-lowest/90 backdrop-blur text-tertiary font-label-dense text-label-dense font-semibold">
                Peluang Global
              </span>
</div>
<div class="p-5 flex flex-col flex-1 justify-between gap-4">
<div class="flex flex-col gap-2">
<div class="flex items-center gap-2 text-on-surface-variant font-label-dense text-label-dense">
<span>04 Mei 2025</span>
<span>•</span>
<span>5 Menit</span>
</div>
<h4 class="font-title-md text-title-md text-on-surface group-hover:text-primary transition-colors leading-snug line-clamp-2">
                  Sosialisasi Program Pemagangan Industri ke Jepang: Peluang Karier Global bagi Siswa Penus
                </h4>
<p class="font-body-dense text-body-dense text-on-surface-variant line-clamp-2">
                  Kolaborasi strategis LPK Resmi Sending Organization dengan BKK Penus untuk kuota pelatihan bahasa N4 dan magang teknisi manufaktur presisi.
                </p>
</div>
<div class="flex items-center justify-between pt-2">
<span class="font-label-dense text-label-dense text-on-surface-variant">Kerja Sama Global</span>
<span class="text-primary font-label-dense text-label-dense font-semibold flex items-center group-hover:translate-x-1 transition-transform">
                  Selengkapnya <span class="material-symbols-outlined text-[16px] ml-0.5">chevron_right</span>
</span>
</div>
</div>
</article>
</div>
<!-- PAGINATION SECTION -->
<div class="w-full bg-surface-container-lowest rounded-lg p-4 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4 mt-4">
<div class="text-on-surface-variant font-body-dense text-body-dense">
            Halaman <strong class="text-on-surface">1</strong> dari <strong class="text-on-surface">4</strong> (Total 24 Catatan Berita)
          </div>
<div class="flex items-center gap-1.5">
<button class="w-9 h-9 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center opacity-50 cursor-not-allowed">
<span class="material-symbols-outlined text-[18px]">chevron_left</span>
</button>
<button class="w-9 h-9 rounded-full bg-primary text-on-primary font-label-md text-label-md font-semibold flex items-center justify-center shadow-sm">
              1
            </button>
<button class="w-9 h-9 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant font-label-md text-label-md transition-colors flex items-center justify-center">
              2
            </button>
<button class="w-9 h-9 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant font-label-md text-label-md transition-colors flex items-center justify-center">
              3
            </button>
<button class="w-9 h-9 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant font-label-md text-label-md transition-colors flex items-center justify-center">
              4
            </button>
<button class="w-9 h-9 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-[18px]">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- SIDEBAR WIDGETS COLUMN (4 Cols) -->
<aside class="lg:col-span-4 flex flex-col gap-6 w-full">
<!-- WIDGET 1: Agenda Calendar & Milestones -->
<div class="w-full bg-surface-container-lowest rounded-lg p-6 shadow-sm flex flex-col gap-5">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[22px]">event</span>
<h3 class="font-title-md text-title-md text-on-surface">Kalender Agenda BKK</h3>
</div>
<span class="font-label-dense text-label-dense px-2.5 py-1 rounded-full bg-surface-container text-on-surface-variant">Mei - Juni 2025</span>
</div>
<!-- Micro Schedule Timeline -->
<div class="flex flex-col gap-3.5">
<!-- Event Item 1 -->
<div class="flex items-start gap-3 p-3 rounded-DEFAULT bg-surface-container-low transition-colors hover:bg-surface-container">
<div class="flex flex-col items-center justify-center w-12 h-12 rounded-DEFAULT bg-primary text-on-primary shrink-0">
<span class="text-[10px] uppercase font-label-dense font-semibold tracking-wide">Mei</span>
<span class="text-[18px] font-bold leading-none">24</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Penus Career Fair 2025</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Aula Serbaguna Kampus • 08:00 WIB</span>
<span class="font-label-dense text-label-dense text-primary mt-0.5">35 Perusahaan Partisipan</span>
</div>
</div>
<!-- Event Item 2 -->
<div class="flex items-start gap-3 p-3 rounded-DEFAULT bg-surface-container-low transition-colors hover:bg-surface-container">
<div class="flex flex-col items-center justify-center w-12 h-12 rounded-DEFAULT bg-secondary-container text-on-secondary-container shrink-0">
<span class="text-[10px] uppercase font-label-dense font-semibold tracking-wide">Mei</span>
<span class="text-[18px] font-bold leading-none">28</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Pelepasan Magang Gel. II</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Lapangan Utama • Siswa Kelas XI</span>
<span class="font-label-dense text-label-dense text-on-surface-variant mt-0.5">Wajib Seragam Wearpack</span>
</div>
</div>
<!-- Event Item 3 -->
<div class="flex items-start gap-3 p-3 rounded-DEFAULT bg-surface-container-low transition-colors hover:bg-surface-container">
<div class="flex flex-col items-center justify-center w-12 h-12 rounded-DEFAULT bg-surface-container-highest text-on-surface shrink-0">
<span class="text-[10px] uppercase font-label-dense font-semibold tracking-wide">Jun</span>
<span class="text-[18px] font-bold leading-none">05</span>
</div>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Walk-in PT Denso Indonesia</span>
<span class="font-body-dense text-body-dense text-on-surface-variant">Lab Mesin &amp; Otomotif • 09:00 WIB</span>
<span class="font-label-dense text-label-dense text-primary mt-0.5">Khusus Alumni 2024 &amp; 2025</span>
</div>
</div>
</div>
<a class="w-full py-2.5 rounded-full bg-surface-container text-on-surface hover:bg-surface-variant text-center font-label-md text-label-md font-medium transition-colors" href="#">
            Lihat Jadwal Lengkap Semester Ini
          </a>
</div>
<!-- WIDGET 2: Document Downloads -->
<div class="w-full bg-surface-container-lowest rounded-lg p-6 shadow-sm flex flex-col gap-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[22px]">download_for_offline</span>
<h3 class="font-title-md text-title-md text-on-surface">Pusat Unduhan Siswa</h3>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant">
            Unduh format resmi berkas administratif prakerin magang dan template portofolio standar industri.
          </p>
<div class="flex flex-col gap-2.5">
<!-- Doc 1 -->
<a class="flex items-center justify-between p-3 rounded-DEFAULT bg-surface-container-low hover:bg-primary/5 transition-all group" href="#">
<div class="flex items-center gap-3 min-w-0">
<span class="material-symbols-outlined text-primary text-[24px]">description</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate group-hover:text-primary transition-colors">
                    Pedoman Laporan PKL 2025
                  </span>
<span class="font-body-dense text-body-dense text-on-surface-variant">PDF • 2.4 MB • Versi Revisi</span>
</div>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">file_download</span>
</a>
<!-- Doc 2 -->
<a class="flex items-center justify-between p-3 rounded-DEFAULT bg-surface-container-low hover:bg-primary/5 transition-all group" href="#">
<div class="flex items-center gap-3 min-w-0">
<span class="material-symbols-outlined text-secondary text-[24px]">contact_page</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate group-hover:text-primary transition-colors">
                    Format CV ATS Vokasi SMK
                  </span>
<span class="font-body-dense text-body-dense text-on-surface-variant">DOCX • 680 KB • Terstandarisasi</span>
</div>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">file_download</span>
</a>
<!-- Doc 3 -->
<a class="flex items-center justify-between p-3 rounded-DEFAULT bg-surface-container-low hover:bg-primary/5 transition-all group" href="#">
<div class="flex items-center gap-3 min-w-0">
<span class="material-symbols-outlined text-tertiary text-[24px]">fact_check</span>
<div class="flex flex-col min-w-0">
<span class="font-label-md text-label-md text-on-surface font-semibold truncate group-hover:text-primary transition-colors">
                    Form Penilaian Mitra IDUKA
                  </span>
<span class="font-body-dense text-body-dense text-on-surface-variant">PDF • 450 KB • Lampiran Penilaian</span>
</div>
</div>
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors">file_download</span>
</a>
</div>
</div>
<!-- WIDGET 3: Newsletter & WhatsApp Career Alerts -->
<div class="w-full bg-gradient-to-br from-primary to-primary-fixed-variant rounded-lg p-6 text-on-primary shadow-sm flex flex-col gap-4 relative overflow-hidden">
<!-- Ambient Decorative Accent -->
<div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[24px] text-secondary-fixed">campaign</span>
<span class="font-label-dense text-label-dense uppercase tracking-wider font-semibold text-white/80">Langganan Info Karir</span>
</div>
<h3 class="font-title-md text-title-md font-bold leading-tight">
            Dapatkan Info Lowongan &amp; Walk-in Wawancara Langsung di Ponselmu
          </h3>
<p class="font-body-dense text-body-dense text-white/90">
            Bergabung dengan 1.200+ siswa dan alumni dalam siaran kabar eksklusif BKK Penus setiap Jumat pagi.
          </p>
<form class="flex flex-col gap-2.5 pt-1" onsubmit="event.preventDefault(); alert('Terima kasih! Anda telah terdaftar dalam sistem broadcast BKK Penus.');">
<input class="w-full px-4 py-2.5 rounded-full bg-white text-on-surface font-body-dense text-body-dense placeholder:text-on-surface-variant/70 focus:outline-none" placeholder="Nama Lengkap Siswa / Alumni" required="" type="text"/>
<input class="w-full px-4 py-2.5 rounded-full bg-white text-on-surface font-body-dense text-body-dense placeholder:text-on-surface-variant/70 focus:outline-none" placeholder="No. WhatsApp Aktif (08xx)" required="" type="tel"/>
<button class="w-full py-2.5 rounded-full bg-secondary-container text-on-secondary-container font-label-md text-label-md font-semibold hover:bg-secondary-fixed transition-all flex items-center justify-center gap-2 shadow-sm" type="submit">
<span class="material-symbols-outlined text-[18px]">send</span>
              Daftar Notifikasi WhatsApp
            </button>
</form>
<div class="flex items-center justify-center gap-2 text-[11px] text-white/75 font-body-dense pt-1">
<span class="material-symbols-outlined text-[14px]">lock</span>
<span>Data privat terproteksi &amp; bebas spam iklan luar.</span>
</div>
</div>
</aside>
</div>
</section>
<!-- Interactive Search and Filter Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
      // Micro-interaction for category tabs
      const tabs = document.querySelectorAll('section button[class*="rounded-full"]');
      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          tabs.forEach(t => {
            t.classList.remove('bg-primary', 'text-on-primary');
            t.classList.add('bg-surface-container', 'text-on-surface');
            const counter = t.querySelector('span:last-child');
            if(counter) {
              counter.classList.remove('bg-white/20');
              counter.classList.add('bg-on-surface/10', 'text-on-surface-variant');
            }
          });
          tab.classList.remove('bg-surface-container', 'text-on-surface');
          tab.classList.add('bg-primary', 'text-on-primary');
          const activeCounter = tab.querySelector('span:last-child');
          if(activeCounter) {
            activeCounter.classList.remove('bg-on-surface/10', 'text-on-surface-variant');
            activeCounter.classList.add('bg-white/20');
          }
        });
      });
    });
  </script>
</div>
@endsection