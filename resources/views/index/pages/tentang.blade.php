@extends('index.master')

@section('title', 'Tentang BKK - SMK Plus Pelita Nusantara')

@section('content')
<div class="flex flex-col w-full">
    <!-- Header & Hero Profil -->
    <section class="w-full bg-surface-container-low py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-6">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary font-label-dense text-label-dense">
                    <span class="w-2 h-2 rounded-full bg-primary mr-2 animate-pulse"></span>
                    Profil Lembaga
                </span>
                <span class="text-on-surface-variant font-label-dense text-label-dense">/ Bursa Kerja Khusus</span>
            </div>

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div class="max-w-3xl flex flex-col gap-3">
                    <h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight font-bold">
                        Mengenal BKK SMK Plus Pelita Nusantara
                    </h1>
                    <p class="font-body-editorial text-body-editorial text-on-surface-variant">
                        Lembaga resmi di bawah naungan SMK Plus Pelita Nusantara yang berdedikasi mengoptimalkan penyerapan lulusan ke dunia kerja, fasilitasi praktik kerja lapangan (PKL), dan kemitraan strategis dengan IDUKA nasional dan multinasional.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi Bento Grid -->
    <section class="max-w-7xl mx-auto px-6 lg:px-12 py-16 w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Visi Card -->
            <div class="p-8 rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col justify-between border border-surface-container">
                <div class="flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[26px]">visibility</span>
                    </div>
                    <h2 class="font-headline-md text-headline-md text-on-surface font-bold">Visi BKK</h2>
                    <p class="font-body-default text-body-default text-on-surface-variant leading-relaxed">
                        Menjadi unit Bursa Kerja Khusus vokasi yang terpercaya, adaptif terhadap perkembangan revolusi industri 4.0, dan unggul dalam mencetak tenaga kerja muda yang profesional, berkarakter, serta berdaya saing global.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-surface-container flex items-center gap-2 text-primary font-label-dense text-label-dense">
                    <span class="material-symbols-outlined text-[18px]">verified</span>
                    <span>Terakreditasi dan Tersinkronisasi Disnaker</span>
                </div>
            </div>

            <!-- Misi Card -->
            <div class="p-8 rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col justify-between border border-surface-container">
                <div class="flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-[26px]">flag</span>
                    </div>
                    <h2 class="font-headline-md text-headline-md text-on-surface font-bold">Misi BKK</h2>
                    <ul class="flex flex-col gap-3 font-body-default text-body-default text-on-surface-variant">
                        <li class="flex items-start gap-2.5">
                            <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">check_circle</span>
                            <span>Menjembatani komunikasi intensif antara siswa/alumni dengan institusi dunia usaha dan dunia industri (DUDI).</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">check_circle</span>
                            <span>Menyelenggarakan pembekalan etika kerja, pembuatan CV standar ATS, dan uji kompetensi berkala.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">check_circle</span>
                            <span>Melakukan penelusuran tamatan (*tracer study*) terpadu untuk evaluasi kurikulum yang relevan dengan kebutuhan industri.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section class="w-full bg-surface-container-low py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-10">
            <div class="flex flex-col gap-2 max-w-2xl">
                <span class="font-label-dense text-label-dense uppercase tracking-wider text-primary font-bold">Layanan &amp; Program</span>
                <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight font-bold">Layanan Prioritas BKK Penus</h2>
                <p class="font-body-default text-body-default text-on-surface-variant">
                    Fasilitas terpadu untuk menunjang transisi siswa dari bangku sekolah menuju dunia kerja profesional.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[24px]">business_center</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Penyaluran PKL Terpadu</h3>
                    <p class="font-body-dense text-body-dense text-on-surface-variant">
                        Penempatan siswa kelas XI dan XII di ratusan perusahaan rekanan resmi dengan sistem administrasi jurnal digital dan monitoring teratur.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary">
                        <span class="material-symbols-outlined text-[24px]">co_present</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Walk-in Rekrutmen Kampus</h3>
                    <p class="font-body-dense text-body-dense text-on-surface-variant">
                        Penyelenggaraan seleksi wawancara dan tes psikotes langsung di lingkungan sekolah bersama HRD perusahaan mitra.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-surface-container-lowest shadow-sm flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-xl bg-secondary-fixed flex items-center justify-center text-secondary">
                        <span class="material-symbols-outlined text-[24px]">school</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Konseling Karier &amp; ATS</h3>
                    <p class="font-body-dense text-body-dense text-on-surface-variant">
                        Bimbingan karier 1-on-1 bersama guru BK dan konselor BKK untuk mematangkan kesiapan wawancara dan portofolio profesional siswa.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tim Sekretariat BKK -->
    <section class="max-w-7xl mx-auto px-6 lg:px-12 py-16 w-full">
        <div class="flex flex-col gap-10">
            <div class="flex flex-col gap-2 text-center max-w-xl mx-auto">
                <span class="font-label-dense text-label-dense uppercase tracking-wider text-primary font-bold">Struktur Lembaga</span>
                <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight font-bold">Pengurus BKK SMK Penus</h2>
                <p class="font-body-default text-body-default text-on-surface-variant">
                    Dedikasi para pendidik dan praktisi hubungan industri demi masa depan gemilang lulusan vokasi.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 rounded-2xl bg-surface-container-lowest border border-surface-container shadow-sm flex flex-col items-center text-center gap-4">
                    <img class="w-20 h-20 rounded-full object-cover shadow-sm ring-2 ring-primary/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB63mLO-BnMgFFgqx1mTuwPFGCzTmwLyy8_J4aLTzOGznPDmlW9ogUP_BfzTLkJ0xlAceEAOeRFi6oS_ZIKOEISZaexn-6scwvS0zs0dbPRAtJzIBlUYU2AMsnkYW-A-8Jh1zw-wQ4iRtEhhvoE1Ukg7i6-1XSC3KrQ8MOWP1Mp2FIYqYepTfVt-76KoTaeWJF2gXKoGd38EgQEhJhlThO8F6cMObBxynYkKpZ54dFAgJrgWayRbAbo" alt="Ketua BKK"/>
                    <div class="flex flex-col">
                        <span class="font-title-md text-title-md text-on-surface font-semibold">Dra. Hj. Sri Wahyuni, M.Pd.</span>
                        <span class="font-label-dense text-label-dense text-primary font-semibold">Ketua Bursa Kerja Khusus</span>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-surface-container-lowest border border-surface-container shadow-sm flex flex-col items-center text-center gap-4">
                    <div class="w-20 h-20 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary font-bold text-xl shadow-sm">
                        <span class="material-symbols-outlined text-[36px]">support_agent</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-title-md text-title-md text-on-surface font-semibold">Ahmad Fauzi, S.Kom.</span>
                        <span class="font-label-dense text-label-dense text-on-surface-variant">Koordinator Hubungan Industri (Hubin)</span>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-surface-container-lowest border border-surface-container shadow-sm flex flex-col items-center text-center gap-4">
                    <div class="w-20 h-20 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary font-bold text-xl shadow-sm">
                        <span class="material-symbols-outlined text-[36px]">psychology</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-title-md text-title-md text-on-surface font-semibold">Rina Marlina, S.Psi.</span>
                        <span class="font-label-dense text-label-dense text-on-surface-variant">Konselor Karier &amp; Psikotes</span>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-surface-container-lowest border border-surface-container shadow-sm flex flex-col items-center text-center gap-4">
                    <div class="w-20 h-20 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold text-xl shadow-sm">
                        <span class="material-symbols-outlined text-[36px]">query_stats</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-title-md text-title-md text-on-surface font-semibold">Budi Santoso, S.T.</span>
                        <span class="font-label-dense text-label-dense text-on-surface-variant">Admin Tracer Study &amp; Data PKL</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
