{{-- resources/views/services.blade.php --}}
@extends('layouts.layout')

@section('title', 'Layanan Kami - Festivalan')

@section('header')
@endsection

@section('content')
<main class="relative bg-gray-100 dark:bg-slate-900">
    {{-- Hero Section for Services --}}
    <section class="bg-slate-700 dark:bg-slate-800 text-white py-20 sm:py-28 md:py-32 pattern-background">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in-up">Layanan Kami</h1>
            <p class="text-xl md:text-2xl text-gray-200 dark:text-gray-300 mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
                Temukan bagaimana Festivalan dapat membantu Anda membuat, mengelola, dan mempromosikan acara Anda dengan sukses.
            </p>
        </div>
    </section>

    <div class="py-16 sm:py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            @php
                $services = [
                    [
                        'icon' => 'fas fa-ticket-alt',
                        'title' => 'Tiket Acara',
                        'description' => 'Jual tiket online dengan platform kami yang mudah digunakan. Kelola daftar peserta, lacak penjualan, dan tangani pembayaran dengan aman.',
                        'features' => ['Jenis tiket khusus', 'Pelacakan penjualan real-time', 'Proses pembayaran aman']
                    ],
                    [
                        'icon' => 'fas fa-calendar-alt',
                        'title' => 'Manajemen Acara',
                        'description' => 'Buat dan kelola acara Anda dengan alat kami yang komprehensif. Dari pertemuan kecil hingga festival besar.',
                        'features' => ['Halaman acara khusus', 'Manajemen RSVP', 'Komunikasi peserta']
                    ],
                    [
                        'icon' => 'fas fa-bullhorn',
                        'title' => 'Promosi Acara',
                        'description' => 'Dapatkan acara Anda di depan audiens yang tepat dengan alat pemasaran dan jaringan kami.',
                        'features' => ['Integrasi media sosial', 'Alat pemasaran email', 'Penempatan acara unggulan']
                    ],
                    [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Analitik & Laporan',
                        'description' => 'Dapatkan wawasan tentang kinerja acara Anda dengan analitik dan laporan terperinci.',
                        'features' => ['Pelacakan kehadiran real-time', 'Laporan pendapatan', 'Demografi audiens']
                    ],
                    [
                        'icon' => 'fas fa-check-circle', // Icon for check-in solutions
                        'title' => 'Solusi Check-in',
                        'description' => 'Sederhanakan proses check-in acara Anda dengan solusi kami yang ramah seluler.',
                        'features' => ['Pemindaian kode QR', 'Aplikasi check-in seluler', 'Registrasi di tempat']
                    ],
                    [
                        'icon' => 'fas fa-headset',
                        'title' => 'Dukungan Khusus',
                        'description' => 'Tim kami siap membantu Anda di setiap langkah perencanaan acara Anda.',
                        'features' => ['Dukungan pelanggan 24/7', 'Sumber daya perencanaan acara', 'Panduan praktik terbaik']
                    ]
                ];
            @endphp

            <section class="mb-16 sm:mb-20">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                    <div class="card-hover bg-white dark:bg-slate-800 rounded-xl shadow-lg overflow-hidden border border-gray-200 dark:border-slate-700 flex flex-col">
                        <div class="p-6 sm:p-8">
                            <div class="w-16 h-16 bg-sky-100 dark:bg-sky-700/30 rounded-full flex items-center justify-center mb-5 text-sky-600 dark:text-sky-400">
                                <i class="{{ $service['icon'] }} text-3xl"></i>
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold text-slate-800 dark:text-white mb-3">{{ $service['title'] }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-5 text-sm leading-relaxed flex-grow">{{ $service['description'] }}</p>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-400 text-sm">
                                @foreach($service['features'] as $feature)
                                <li class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 dark:text-green-400 mr-2.5"></i>
                                    <span>{{ $feature }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <section class="bg-white dark:bg-slate-800 rounded-2xl p-8 sm:p-10 lg:p-12 text-center border border-gray-200 dark:border-slate-700 shadow-xl animate-fade-in">
                <h2 class="text-2xl md:text-3xl font-bold mb-4 text-slate-800 dark:text-white">Siap membuat acara berikutnya sukses?</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto text-lg">
                    Bergabunglah dengan ribuan penyelenggara acara yang mempercayai Festivalan untuk mewujudkan visi mereka.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a class="w-full sm:w-auto rounded-lg px-8 py-3.5 font-semibold bg-sky-600 text-white hover:bg-sky-700 transition-colors transform hover:scale-105 shadow-md" href="{{ route('registerevent') }}">Mulai Sekarang</a>
                    <a class="w-full sm:w-auto rounded-lg border-2 border-sky-600 dark:border-sky-500 px-8 py-3.5 font-semibold bg-transparent text-sky-600 dark:text-sky-400 hover:bg-sky-50 dark:hover:bg-sky-500/20 transition-colors transform hover:scale-105" href="{{ route('contact') }}">Hubungi Tim Kami</a>
                </div>
            </section>
        </div>
    </div>
</main>
@endsection

@pushOnce('styles')
<style>
    .nav-link-default {
        @apply block py-2 px-3 text-slate-700 dark:text-gray-300 rounded hover:bg-gray-100 dark:hover:bg-slate-700 md:hover:bg-transparent md:hover:text-sky-600 dark:md:hover:text-sky-400 md:p-0 transition-colors;
    }
    .nav-link-default.active {
        @apply text-sky-600 dark:text-sky-400 font-semibold;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); /* Tailwind shadow-xl equivalent */
    }
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .pattern-background { /* Contoh background pattern, sesuaikan */
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("{{ asset('images/hero-pattern.svg') }}"); /* Ganti dengan path pattern Anda */
        background-size: cover;
        background-position: center;
    }
</style>
@endPushOnce