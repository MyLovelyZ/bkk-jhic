@extends('index.master')

@section('title', 'Kerja Sama Mitra - BKK SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col w-full">
<!-- Top Visual Hero / Partnership Header -->
<section class="relative w-full overflow-hidden bg-surface-container-low px-6 lg:px-12 py-16 lg:py-24">
<div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-primary-container/5 blur-3xl pointer-events-none"></div>
<div class="absolute left-1/3 -bottom-20 w-80 h-80 rounded-full bg-secondary-container/10 blur-3xl pointer-events-none"></div>
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center relative">
<div class="lg:col-span-7 flex flex-col gap-6">
<div class="inline-flex items-center gap-2 self-start px-3.5 py-1.5 rounded-full bg-surface-container-highest shadow-sm">
<span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
<span class="font-label-dense text-label-dense text-on-surface uppercase tracking-wider">Portal Hubungan Industri (Hubin &amp; BKK)</span>
</div>
<h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight leading-tight">
          Bangun Kemitraan Strategis Bersama <span class="text-primary-container">SMK Plus Pelita Nusantara</span>
</h1>
<p class="font-body-editorial text-body-editorial text-on-surface-variant max-w-2xl">
          Akses talenta muda siap kerja dengan kompetensi teruji di bidang Teknologi Informasi, Administrasi Perkantoran, dan Akuntansi Bisnis. Kami membuka peluang program PKL terstruktur, rekrutmen lulusan langsung, hingga sinkronisasi kurikulum industri.
        </p>
<div class="flex flex-wrap items-center gap-4 pt-2">
<a class="inline-flex items-center justify-center px-7 py-3.5 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary shadow-md transition-all duration-200 hover:shadow-lg" href="#form-kemitraan">
<span class="material-symbols-outlined text-[20px] mr-2">edit_document</span>
            Ajukan Formulir Kerja Sama
          </a>
<button class="inline-flex items-center justify-center px-6 py-3.5 rounded-full bg-surface-container-lowest text-on-surface font-label-md text-label-md font-semibold hover:bg-surface-container shadow-sm transition-all duration-200" onclick="alert('Mengunduh Company Profile &amp; Silabus Vokasi SMK Plus Pelita Nusantara (PDF)...')" type="button">
<span class="material-symbols-outlined text-[20px] mr-2 text-secondary">download</span>
            Unduh Company Profile &amp; Silabus (PDF)
          </button>
</div>
<!-- Metric micro-strip -->
<div class="grid grid-cols-3 gap-4 pt-6 max-w-lg">
<div class="flex flex-col p-3 rounded bg-surface-container-lowest/80 backdrop-blur-sm shadow-sm">
<span class="font-metric-stat text-metric-stat text-primary-container leading-none">120+</span>
<span class="font-label-dense text-label-dense text-on-surface-variant mt-1">Mitra DUDI Aktif</span>
</div>
<div class="flex flex-col p-3 rounded bg-surface-container-lowest/80 backdrop-blur-sm shadow-sm">
<span class="font-metric-stat text-metric-stat text-secondary-container leading-none">94%</span>
<span class="font-label-dense text-label-dense text-on-surface-variant mt-1">Kesiapan Kerja Siswa</span>
</div>
<div class="flex flex-col p-3 rounded bg-surface-container-lowest/80 backdrop-blur-sm shadow-sm">
<span class="font-metric-stat text-metric-stat text-on-surface leading-none">&lt;24 Jam</span>
<span class="font-label-dense text-label-dense text-on-surface-variant mt-1">Respon Cepat Hubin</span>
</div>
</div>
</div>
<div class="lg:col-span-5 relative">
<div class="relative w-full rounded-lg overflow-hidden shadow-xl aspect-[4/3]">
<img class="w-full h-full object-cover" data-alt="Modern collaborative workspace meeting in a high-tech corporate office where an industry manager conducts an interview and mentorship session with skilled vocational technology interns, natural warm office lighting, contemporary Indonesian corporate atmosphere with laptops and curriculum diagrams on a glass board" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBILTNE1MvwstCaVbES78F_3AryC-yYnYOq0zXQfjiNBFJcHrYuY9FSX-kt52bbmiSl21incTc5wzBjNmEMvMAc1piyhzfYHZMHmVRBQra3VikvJ_6dPVcZOXHXhWiL3JnlIcTXS4lEk7ltzgY1qknuAMFuG7eeDpqHVVmfE6q90TzBiaIhuSp7Qkuj73NsOUx191pnOLc3aWl_IysSl2jO2uDLg1NOEf3f_tY7A8BCW4bwRwEYPKq_"/>
<div class="absolute inset-0 bg-gradient-to-t from-on-background/70 via-transparent to-transparent flex flex-col justify-end p-6">
<div class="flex items-center gap-2 mb-1">
<span class="px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-dense text-label-dense font-bold">MoU DUDI Resmi</span>
<span class="text-on-tertiary-container font-body-dense text-body-dense">Link &amp; Match Vokasi</span>
</div>
<p class="font-label-md text-label-md text-surface-lowest text-white font-medium">Penguatan Ekosistem Vokasi Berbasis Standardisasi Industri Nasional</p>
</div>
</div>
<!-- Overlapping trust badge -->
<div class="absolute -bottom-6 -left-6 hidden sm:flex items-center gap-3 p-4 rounded-DEFAULT bg-surface-container-lowest shadow-lg">
<div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[24px]">verified</span>
</div>
<div class="flex flex-col">
<span class="font-title-md text-title-md text-on-surface leading-none">Mitra Tersertifikasi</span>
<span class="font-body-dense text-body-dense text-on-surface-variant mt-0.5">Sesuai Regulasi Ditjen Pendidikan Vokasi</span>
</div>
</div>
</div>
</div>
</section>
<!-- 4-Step Partnership Flow -->
<section class="w-full px-6 lg:px-12 py-20 bg-surface">
<div class="max-w-7xl mx-auto flex flex-col gap-14">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<span class="font-label-dense text-label-dense uppercase tracking-widest text-primary-container font-bold">Proses Terstruktur &amp; Cepat</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-1">Alur Mudah Kemitraan Industri</h2>
</div>
<p class="font-body-default text-body-default text-on-surface-variant max-w-md">
          Prosedur birokrasi yang ramping dan transparan agar perusahaan Anda dapat segera menjalin kolaborasi produktif tanpa hambatan administratif.
        </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative">
<!-- Step 1 -->
<div class="flex flex-col p-6 rounded-DEFAULT bg-surface-container-low shadow-sm relative group hover:bg-surface-container transition-colors">
<div class="flex items-center justify-between mb-4">
<span class="w-10 h-10 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center font-metric-stat text-[18px]">1</span>
<span class="material-symbols-outlined text-primary-container text-[28px]">assignment_turned_in</span>
</div>
<h3 class="font-title-md text-title-md text-on-surface mb-2">Pengisian Kebutuhan</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant">Perusahaan mengisi formulir kebutuhan talenta, posisi PKL, rekrutmen kerja, atau rencana program kelas industri.</p>
<div class="mt-4 pt-3 flex items-center text-primary text-label-dense font-label-dense font-semibold">
            Estimasi: 5 Menit
          </div>
</div>
<!-- Step 2 -->
<div class="flex flex-col p-6 rounded-DEFAULT bg-surface-container-low shadow-sm relative group hover:bg-surface-container transition-colors">
<div class="flex items-center justify-between mb-4">
<span class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface flex items-center justify-center font-metric-stat text-[18px]">2</span>
<span class="material-symbols-outlined text-secondary text-[28px]">forum</span>
</div>
<h3 class="font-title-md text-title-md text-on-surface mb-2">Verifikasi &amp; Diskusi</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant">Tim Hubin &amp; Pengurus BKK menghubungi HRD mitra untuk penyelarasan kualifikasi teknis dan jadwal rekrutmen.</p>
<div class="mt-4 pt-3 flex items-center text-secondary text-label-dense font-label-dense font-semibold">
            Maks. 1x24 Jam Kerja
          </div>
</div>
<!-- Step 3 -->
<div class="flex flex-col p-6 rounded-DEFAULT bg-surface-container-low shadow-sm relative group hover:bg-surface-container transition-colors">
<div class="flex items-center justify-between mb-4">
<span class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface flex items-center justify-center font-metric-stat text-[18px]">3</span>
<span class="material-symbols-outlined text-tertiary text-[28px]">ink_pen</span>
</div>
<h3 class="font-title-md text-title-md text-on-surface mb-2">Penandatanganan MoU</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant">Penerbitan surat perjanjian kerja sama resmi (MoU / PKS) bermaterai secara digital maupun luring di sekolah.</p>
<div class="mt-4 pt-3 flex items-center text-tertiary text-label-dense font-label-dense font-semibold">
            Legalitas Terjamin
          </div>
</div>
<!-- Step 4 -->
<div class="flex flex-col p-6 rounded-DEFAULT bg-surface-container-low shadow-sm relative group hover:bg-surface-container transition-colors">
<div class="flex items-center justify-between mb-4">
<span class="w-10 h-10 rounded-full bg-surface-container-highest text-on-surface flex items-center justify-center font-metric-stat text-[18px]">4</span>
<span class="material-symbols-outlined text-primary text-[28px]">rocket_launch</span>
</div>
<h3 class="font-title-md text-title-md text-on-surface mb-2">Seleksi &amp; Penempatan</h3>
<p class="font-body-dense text-body-dense text-on-surface-variant">Fasilitasi tes psikotes, wawancara kandidat di kampus BKK Penus, dan onboarding peserta magang/karyawan baru.</p>
<div class="mt-4 pt-3 flex items-center text-primary-container text-label-dense font-label-dense font-semibold">
            Siap Bertugas
          </div>
</div>
</div>
</div>
</section>
<!-- Bentuk-Bentuk Kerja Sama (Pillars) -->
<section class="w-full px-6 lg:px-12 py-20 bg-surface-container-low">
<div class="max-w-7xl mx-auto flex flex-col gap-12">
<div class="text-center max-w-3xl mx-auto">
<span class="font-label-dense text-label-dense uppercase tracking-widest text-primary-container font-bold">Skema Kolaborasi Komprehensif</span>
<h2 class="font-headline-lg text-headline-lg text-on-surface mt-2">Bentuk Program Kerja Sama Industri (DUDI)</h2>
<p class="font-body-default text-body-default text-on-surface-variant mt-3">Kami menawarkan integrasi berkelanjutan yang menguntungkan industri mitra melalui penyediaan sumber daya manusia berdaya saing tinggi.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<!-- Card 1 -->
<div class="p-6 rounded-DEFAULT bg-surface-container-lowest shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
<div class="flex flex-col gap-4">
<div class="w-12 h-12 rounded-DEFAULT bg-primary-fixed/50 flex items-center justify-center text-primary-container">
<span class="material-symbols-outlined text-[28px]">school</span>
</div>
<div>
<h3 class="font-title-md text-title-md text-on-surface">Praktik Kerja Lapangan (PKL)</h3>
<span class="font-label-dense text-label-dense text-secondary font-semibold">Durasi 3 - 6 Bulan Penuh</span>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant">
              Penempatan siswa tingkat XI dan XII untuk menjalani magang intensif dengan modul kerja operasional nyata di perusahaan Anda, dilengkapi sertifikat kompetensi.
            </p>
</div>
<ul class="mt-6 pt-4 space-y-2 font-body-dense text-body-dense text-on-surface-variant">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-primary">check_circle</span>Siswa terlatih etika kerja</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-primary">check_circle</span>Didampingi guru pamong</li>
</ul>
</div>
<!-- Card 2 -->
<div class="p-6 rounded-DEFAULT bg-surface-container-lowest shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
<div class="flex flex-col gap-4">
<div class="w-12 h-12 rounded-DEFAULT bg-secondary-fixed/50 flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[28px]">badge</span>
</div>
<div>
<h3 class="font-title-md text-title-md text-on-surface">Rekrutmen &amp; Walk-In Interview</h3>
<span class="font-label-dense text-label-dense text-secondary font-semibold">Fasilitas Kampus Gratis</span>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant">
              Penyelenggaraan rekrutmen eksklusif lulusan baru (fresh graduates) langsung di aula sekolah dengan dukungan logistik tim BKK untuk tes tulis dan wawancara massal.
            </p>
</div>
<ul class="mt-6 pt-4 space-y-2 font-body-dense text-body-dense text-on-surface-variant">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-secondary">check_circle</span>Database 400+ lulusan/thn</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-secondary">check_circle</span>Ruang wawancara AC &amp; Lab Komputer</li>
</ul>
</div>
<!-- Card 3 -->
<div class="p-6 rounded-DEFAULT bg-surface-container-lowest shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
<div class="flex flex-col gap-4">
<div class="w-12 h-12 rounded-DEFAULT bg-surface-variant flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[28px]">precision_manufacturing</span>
</div>
<div>
<h3 class="font-title-md text-title-md text-on-surface">Kelas Industri &amp; TEFA</h3>
<span class="font-label-dense text-label-dense text-secondary font-semibold">Sinkronisasi Kurikulum</span>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant">
              Penyelarasan silabus mata pelajaran dengan Standard Operating Procedure (SOP) mitra sehingga siswa langsung paham teknologi spesifik perusahaan Anda.
            </p>
</div>
<ul class="mt-6 pt-4 space-y-2 font-body-dense text-body-dense text-on-surface-variant">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-tertiary">check_circle</span>Teaching Factory bersama</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-tertiary">check_circle</span>Skema prioritas rekrutmen</li>
</ul>
</div>
<!-- Card 4 -->
<div class="p-6 rounded-DEFAULT bg-surface-container-lowest shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
<div class="flex flex-col gap-4">
<div class="w-12 h-12 rounded-DEFAULT bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[28px]">co_present</span>
</div>
<div>
<h3 class="font-title-md text-title-md text-on-surface">Guru Tamu &amp; Kunjungan Industri</h3>
<span class="font-label-dense text-label-dense text-secondary font-semibold">Transfer Pengetahuan Praktis</span>
</div>
<p class="font-body-dense text-body-dense text-on-surface-variant">
              Hadirkan praktisi atau pimpinan perusahaan Anda sebagai narasumber seminar vokasi, serta menerima sesi company visit edukatif siswa dan dewan guru.
            </p>
</div>
<ul class="mt-6 pt-4 space-y-2 font-body-dense text-body-dense text-on-surface-variant">
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-primary">check_circle</span>Branding perusahaan di civitas</li>
<li class="flex items-center gap-2"><span class="material-symbols-outlined text-[16px] text-primary">check_circle</span>CSR Pendidikan terukur</li>
</ul>
</div>
</div>
</div>
</section>
<!-- Interactive Partnership Form & Contact Split -->
<section class="w-full px-6 lg:px-12 py-20 bg-surface" id="form-kemitraan">
<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
<!-- Left Column: Form Interactive -->
<div class="lg:col-span-7 bg-surface-container-lowest rounded-lg p-8 sm:p-10 shadow-md">
<div class="flex items-center gap-3 mb-6">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">handshake</span>
</div>
<div>
<h2 class="font-headline-md text-headline-md text-on-surface">Formulir Pengajuan Kemitraan DUDI</h2>
<p class="font-body-dense text-body-dense text-on-surface-variant">Mohon lengkapi data resmi kantor Anda di bawah ini.</p>
</div>
</div>
<form class="flex flex-col gap-5" id="partnership-form" onsubmit="event.preventDefault(); document.getElementById('form-success').classList.remove('hidden'); this.reset();">
<!-- Company Name & Sector -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="comp_name">Nama Perusahaan / Instansi *</label>
<input class="h-11 px-4 rounded-DEFAULT bg-surface-container-low text-on-surface font-body-default text-body-default focus:bg-surface-container-lowest focus:outline-none shadow-sm transition-all" id="comp_name" placeholder="PT. Solusi Digital Nusantara" required="" type="text"/>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="comp_sector">Bidang Industri *</label>
<select class="h-11 px-4 rounded-DEFAULT bg-surface-container-low text-on-surface font-body-default text-body-default focus:bg-surface-container-lowest focus:outline-none shadow-sm transition-all" id="comp_sector" required="">
<option value="">Pilih Bidang Usaha...</option>
<option value="Teknologi Informasi &amp; Software">Teknologi Informasi &amp; Software</option>
<option value="Manufaktur &amp; Otomotif">Manufaktur &amp; Perakitan</option>
<option value="Perbankan &amp; Jasa Keuangan">Perbankan &amp; Jasa Keuangan</option>
<option value="Logistik &amp; Supply Chain">Logistik, Ekspedisi &amp; Gudang</option>
<option value="Retail &amp; Distribusi">Retail, E-Commerce &amp; Perdagangan</option>
<option value="Media, Desain &amp; Percetakan">Media Digital &amp; Creative Agency</option>
<option value="Lainnya">Lainnya</option>
</select>
</div>
</div>
<!-- PIC Name & WhatsApp -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="pic_name">Nama Penanggung Jawab / HRD *</label>
<input class="h-11 px-4 rounded-DEFAULT bg-surface-container-low text-on-surface font-body-default text-body-default focus:bg-surface-container-lowest focus:outline-none shadow-sm transition-all" id="pic_name" placeholder="Bpk. Hendra Wijaya, S.Psi" required="" type="text"/>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="pic_phone">Nomor WhatsApp / Seluler *</label>
<input class="h-11 px-4 rounded-DEFAULT bg-surface-container-low text-on-surface font-body-default text-body-default focus:bg-surface-container-lowest focus:outline-none shadow-sm transition-all" id="pic_phone" placeholder="0812XXXXXXXX" required="" type="tel"/>
</div>
</div>
<!-- Official Email & Estimation -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="comp_email">Email Resmi Kantor *</label>
<input class="h-11 px-4 rounded-DEFAULT bg-surface-container-low text-on-surface font-body-default text-body-default focus:bg-surface-container-lowest focus:outline-none shadow-sm transition-all" id="comp_email" placeholder="recruitment@perusahaan.co.id" required="" type="email"/>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="comp_headcount">Estimasi Kebutuhan Talenta *</label>
<select class="h-11 px-4 rounded-DEFAULT bg-surface-container-low text-on-surface font-body-default text-body-default focus:bg-surface-container-lowest focus:outline-none shadow-sm transition-all" id="comp_headcount" required="">
<option value="">Pilih Jumlah Kandidat...</option>
<option value="1-5 Siswa">1 - 5 Orang</option>
<option value="6-15 Siswa">6 - 15 Orang</option>
<option value="16-30 Siswa">16 - 30 Orang</option>
<option value="Lebih dari 30 Siswa">&gt; 30 Orang (Perekrutan Massal)</option>
</select>
</div>
</div>
<!-- Checkboxes: Jenis Kerja Sama -->
<div class="flex flex-col gap-2 pt-2">
<label class="font-label-md text-label-md text-on-surface font-semibold">Jenis Program yang Diminati (Bisa pilih lebih dari satu) *</label>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
<label class="flex items-center gap-3 p-3 rounded bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input checked="" class="w-4 h-4 rounded text-primary-container accent-primary-container" name="interest" type="checkbox" value="pkl"/>
<span class="font-body-dense text-body-dense text-on-surface">Praktik Kerja Lapangan (PKL)</span>
</label>
<label class="flex items-center gap-3 p-3 rounded bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="w-4 h-4 rounded text-primary-container accent-primary-container" name="interest" type="checkbox" value="rekrutmen"/>
<span class="font-body-dense text-body-dense text-on-surface">Rekrutmen Lulusan / Walk-in</span>
</label>
<label class="flex items-center gap-3 p-3 rounded bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="w-4 h-4 rounded text-primary-container accent-primary-container" name="interest" type="checkbox" value="kurikulum"/>
<span class="font-body-dense text-body-dense text-on-surface">Kelas Industri / MoU Silabus</span>
</label>
<label class="flex items-center gap-3 p-3 rounded bg-surface-container-low hover:bg-surface-container cursor-pointer transition-colors">
<input class="w-4 h-4 rounded text-primary-container accent-primary-container" name="interest" type="checkbox" value="seminar"/>
<span class="font-body-dense text-body-dense text-on-surface">Guru Tamu &amp; Kunjungan Industri</span>
</label>
</div>
</div>
<!-- Additional Notes -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold" for="comp_notes">Catatan Kualifikasi / Deskripsi Kebutuhan</label>
<textarea class="p-4 rounded-DEFAULT bg-surface-container-low text-on-surface font-body-default text-body-default focus:bg-surface-container-lowest focus:outline-none shadow-sm transition-all" id="comp_notes" placeholder="Contoh: Kami memerlukan 3 siswa jurusan RPL/TKJ untuk support instalasi jaringan dan 2 siswa Akuntansi untuk staf administrasi logistik..." rows="3"></textarea>
</div>
<!-- Guarantee badge & Submit Button -->
<div class="pt-2 flex flex-col gap-4">
<div class="flex items-center gap-2 font-body-dense text-body-dense text-on-surface-variant">
<span class="material-symbols-outlined text-[18px] text-secondary">timer</span>
<span>Tim Hubin BKK Penus menjamin konfirmasi respons maksimal <strong>1 x 24 jam kerja</strong> via WhatsApp/Email.</span>
</div>
<button class="w-full h-12 rounded-full bg-primary-container text-on-primary-container font-label-md text-label-md font-semibold hover:bg-primary shadow-md transition-all flex items-center justify-center gap-2" type="submit">
<span class="material-symbols-outlined text-[20px]">send</span>
              Kirim Pengajuan Kemitraan
            </button>
</div>
</form>
<!-- Dynamic Success Feedback -->
<div class="hidden mt-6 p-4 rounded-DEFAULT bg-surface-container-high text-on-surface shadow-sm" id="form-success">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[24px]">task_alt</span>
<div>
<h4 class="font-title-md text-title-md text-on-surface">Pengajuan Berhasil Terkirim!</h4>
<p class="font-body-dense text-body-dense text-on-surface-variant mt-1">Terima kasih atas kepercayaan institusi Anda. Tim kemitraan BKK SMK Plus Pelita Nusantara akan segera menghubungi kontak penanggung jawab dalam kurun waktu 1x24 jam.</p>
</div>
</div>
</div>
</div>
<!-- Right Column: Secretariat Details & Office Info -->
<div class="lg:col-span-5 flex flex-col gap-8">
<!-- Direct Contact Card -->
<div class="p-8 rounded-lg bg-surface-container-lowest shadow-md flex flex-col gap-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center text-on-surface">
<span class="material-symbols-outlined text-[22px]">contact_phone</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface">Sekretariat BKK &amp; Hubin</h3>
</div>
<div class="flex flex-col gap-4">
<div class="flex items-start gap-3.5 p-3 rounded bg-surface-container-low">
<span class="material-symbols-outlined text-[20px] text-primary-container shrink-0 mt-0.5">location_on</span>
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase">Alamat Kampus</span>
<span class="font-body-default text-body-default text-on-surface mt-0.5">Kampus SMK Plus Pelita Nusantara, Jl. Golf No. 1, Ciriung, Cibinong, Kab. Bogor, Jawa Barat 16918</span>
</div>
</div>
<div class="flex items-start gap-3.5 p-3 rounded bg-surface-container-low">
<span class="material-symbols-outlined text-[20px] text-secondary shrink-0 mt-0.5">mail</span>
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase">Email Korespondensi Kemitraan</span>
<a class="font-body-default text-body-default text-primary font-semibold hover:underline mt-0.5" href="mailto:kemitraan@smkpenus.sch.id">kemitraan@smkpenus.sch.id</a>
<span class="text-body-dense font-body-dense text-on-surface-variant">Alternatif: bkk@smkpenus.sch.id</span>
</div>
</div>
<div class="flex items-start gap-3.5 p-3 rounded bg-surface-container-low">
<span class="material-symbols-outlined text-[20px] text-tertiary shrink-0 mt-0.5">chat</span>
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase">WhatsApp Resmi Hubin Penus</span>
<span class="font-title-md text-title-md text-on-surface mt-0.5 font-bold">+62 812-8875-4321</span>
<span class="text-body-dense font-body-dense text-on-surface-variant">Tersedia panggilan telepon kantor &amp; chat instan</span>
</div>
</div>
<div class="flex items-start gap-3.5 p-3 rounded bg-surface-container-low">
<span class="material-symbols-outlined text-[20px] text-on-surface shrink-0 mt-0.5">schedule</span>
<div class="flex flex-col">
<span class="font-label-dense text-label-dense text-on-surface-variant uppercase">Jam Operasional Layanan</span>
<span class="font-body-default text-body-default text-on-surface mt-0.5">Senin – Jumat : 08.00 – 16.00 WIB</span>
<span class="text-body-dense font-body-dense text-on-surface-variant">Sabtu – Minggu &amp; Libur Nasional : Tutup</span>
</div>
</div>
</div>
</div>
<!-- Static Map Placeholder -->
<div class="p-6 rounded-lg bg-surface-container-lowest shadow-md flex flex-col gap-4">
<div class="flex items-center justify-between">
<span class="font-title-md text-title-md text-on-surface">Peta Lokasi Kampus</span>
<span class="font-label-dense text-label-dense px-2 py-0.5 rounded bg-surface-container text-on-surface-variant">Cibinong, Bogor</span>
</div>
<div class="w-full h-56 bg-cover bg-center rounded-DEFAULT shadow-inner relative flex items-center justify-center overflow-hidden" data-location="SMK Plus Pelita Nusantara, Jl. Golf No. 1, Ciriung, Cibinong, Bogor, Jawa Barat" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBZkHpfxiXl71GDtQUDy6a6QPOZAzHCeNzwPxr4jDTh9IlvVFA23rdddAH7Zkofx3OER1X78yhD5C1MIZ-wFxiQiNe_ZJL6izch-B8Z8CyvJtqhUWM9ZCeh8sgLONCQiWSULRGOZh44mzhC7nRn4OThea5A8AzVQ4ZMlN8Y-77UhuGj8lsGiDX81in40vebrdQ7Lr1mmDPLpB3lngAu3ZKPXKysPJ-dLv3-9EDIWyJftZeJkrkThK0T')">
<div class="absolute inset-0 bg-on-background/20 backdrop-blur-[1px]"></div>
<div class="relative z-10 px-4 py-2 rounded-full bg-surface-container-lowest/90 backdrop-blur-sm shadow-md flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">location_on</span>
<span class="font-label-md text-label-md text-on-surface font-semibold">Kampus BKK Pelita Nusantara</span>
</div>
</div>
<div class="flex items-center justify-between text-body-dense font-body-dense text-on-surface-variant">
<span>Akses 7 menit dari Tol Jagorawi (Gerbang Sirkuit Sentul / Cibinong)</span>
<a class="text-primary font-semibold hover:underline" href="https://maps.google.com" target="_blank">Buka di Maps →</a>
</div>
</div>
</div>
</div>
</section>
<!-- FAQ Section for Prospective Partners -->
<section class="w-full px-6 lg:px-12 py-16 bg-surface-container-low">
<div class="max-w-4xl mx-auto flex flex-col gap-8">
<div class="text-center">
<span class="font-label-dense text-label-dense uppercase tracking-widest text-primary font-bold">Frequently Asked Questions</span>
<h2 class="font-headline-md text-headline-md text-on-surface mt-1">Pertanyaan Seputar Kemitraan DUDI</h2>
</div>
<div class="flex flex-col gap-3">
<!-- Q1 -->
<details class="group bg-surface-container-lowest p-5 rounded-DEFAULT shadow-sm cursor-pointer transition-all">
<summary class="flex items-center justify-between font-title-md text-title-md text-on-surface list-none">
<span>Apakah ada biaya administrasi untuk membuka walk-in interview atau rekrutmen di kampus?</span>
<span class="material-symbols-outlined text-[20px] transition-transform group-open:rotate-180 text-on-surface-variant">expand_more</span>
</summary>
<p class="mt-3 font-body-default text-body-default text-on-surface-variant pt-2 border-t border-surface-container">
            Tidak ada. Program rekrutmen lulusan dan seleksi walk-in interview di SMK Plus Pelita Nusantara disediakan secara gratis tanpa dipungut biaya fasilitas sebagai bentuk komitmen penyaluran kerja alumni BKK kami.
          </p>
</details>
<!-- Q2 -->
<details class="group bg-surface-container-lowest p-5 rounded-DEFAULT shadow-sm cursor-pointer transition-all">
<summary class="flex items-center justify-between font-title-md text-title-md text-on-surface list-none">
<span>Kompetensi keahlian apa saja yang tersedia di SMK Plus Pelita Nusantara?</span>
<span class="material-symbols-outlined text-[20px] transition-transform group-open:rotate-180 text-on-surface-variant">expand_more</span>
</summary>
<p class="mt-3 font-body-default text-body-default text-on-surface-variant pt-2 border-t border-surface-container">
            Siswa kami terlatih dalam 3 klaster keahlian utama: 1) Rekayasa Perangkat Lunak &amp; Jaringan Komputer, 2) Manajemen Perkantoran &amp; Otomatisasi Administrasi, dan 3) Akuntansi &amp; Keuangan Lembaga, lengkap dengan sertifikasi BNSP.
          </p>
</details>
<!-- Q3 -->
<details class="group bg-surface-container-lowest p-5 rounded-DEFAULT shadow-sm cursor-pointer transition-all">
<summary class="flex items-center justify-between font-title-md text-title-md text-on-surface list-none">
<span>Bagaimana proses penandatanganan dokumen MoU kerja sama?</span>
<span class="material-symbols-outlined text-[20px] transition-transform group-open:rotate-180 text-on-surface-variant">expand_more</span>
</summary>
<p class="mt-3 font-body-default text-body-default text-on-surface-variant pt-2 border-t border-surface-container">
            Tim Hubin kami menyediakan draf nota kesepahaman (MoU) standar Kemendikbudristek yang dapat ditandatangani secara digital (e-sign dengan sertifikat elektronik) maupun pertemuan seremoni resmi secara tatap muka di kantor mitra atau di sekolah.
          </p>
</details>
</div>
</div>
</section>
</div>
@endsection