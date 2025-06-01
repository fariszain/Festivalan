@extends('layouts.layout')

@section('title', 'Festivalan - Platform Tiket & Manajemen Event')

@section('header')
{{-- Header untuk Beranda --}}
<header class="fixed top-0 w-full z-30"> {{-- z-30 agar di bawah modal (biasanya z-50) --}}
    <nav class="navbar bg-transparent border-transparent transition-colors duration-300">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a class="flex items-center space-x-3 rtl:space-x-reverse" href="{{ route('Beranda')}}">
                <img alt="Logo Festivalan" class="h-8 sm:h-9" src="{{ asset('Gambar_WhatsApp_2025-04-14_pukul_19.16.03_c2ef5862-removebg-preview.png') }}"/>
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-on-transparent">Festivalan</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse relative">
                @auth
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false">
                        <span class="sr-only">Buka menu pengguna</span>
                        <img alt="Foto pengguna" class="w-8 h-8 rounded-full" id="dropdown-avatar" src="{{ asset('images/default_avatar.png') }}"/>
                    </button>
                    <div id="user-dropdown" class="hidden absolute top-full right-0 mt-2 w-48 bg-white dark:bg-slate-700 rounded-lg shadow-lg z-50 ring-1 ring-black ring-opacity-5">
                         <div class="px-4 py-3 border-b border-gray-200 dark:border-slate-600">
                            <span class="block text-sm text-gray-900 dark:text-white font-medium">Nama Pengguna</span>
                            <span class="block text-xs text-gray-500 dark:text-gray-400">pengguna@example.com</span>
                        </div>
                        <ul class="py-1" aria-labelledby="user-menu-button">
                            <li><a href="{{ route('Profile')}}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-600">Profil</a></li>
                            <li><a href="{{ route('ubahprofile')}}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-600">Ubah Profil</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST"> @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-slate-600">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('auth') }}" class="text-sm font-medium text-on-transparent hover-on-transparent px-3 py-2 transition-colors">Login</a>
                    <a href="{{ Route::has('register') ? route('register') : route('auth') }}" class="text-sm font-medium text-sky-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-sky-200 rounded-lg px-5 py-2.5 transition-colors shadow">Register</a>
                @endauth
                <button aria-label="Toggle menu" class="md:hidden text-on-transparent focus:outline-none p-2" id="hamburger-menu" data-collapse-toggle="navbar-user-beranda">
                    <i class="fas fa-bars text-xl icon-on-transparent"></i>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user-beranda">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-700/20 md:border-0 rounded-lg bg-black/20 md:bg-transparent backdrop-blur-sm md:backdrop-blur-none md:space-x-8 md:flex-row md:mt-0">
                    <li><a class="nav-link-transparent {{ request()->routeIs('Beranda') ? 'active' : '' }}" href="{{ route('Beranda')}}">Home</a></li>
                    <li><a class="nav-link-transparent {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about')}}">About</a></li>
                    <li><a class="nav-link-transparent {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services')}}">Services</a></li>
                    <li><a class="nav-link-transparent {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery')}}">Gallery</a></li>
                    <li><a class="nav-link-transparent {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact')}}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<style>
    .nav-link-transparent {
        @apply block py-2 px-3 text-white rounded hover:bg-white/20 md:hover:bg-transparent md:hover:text-sky-200 md:p-0 transition-colors;
    }
    .nav-link-transparent.active {
        @apply text-sky-200 md:text-sky-200 font-semibold;
    }
</style>
@endsection

@section('content')
{{-- Hero Section --}}
<div class="relative h-screen overflow-hidden main">
    <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover -z-10 brightness-[0.4]">
        <source src="{{ asset('3209211-uhd_3840_2160_25fps.mp4') }}" type="video/mp4"/>
        Browser Anda tidak mendukung background video.
    </video>
    <div class="relative z-10 flex h-full flex-col items-center justify-center px-4 text-center">
        <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-7xl mb-6 animate-fade-in [animation-delay:0.1s]">
            Welcome to <span class="text-sky-300">Festivalan</span>
        </h1>
        <p class="mx-auto max-w-2xl text-lg text-gray-200 mb-10 animate-fade-in [animation-delay:0.3s]">
            Platform terbaik untuk menemukan tiket dan mengelola event Anda dengan mudah dan menyenangkan.
        </p>
        <div class="flex flex-col sm:flex-row sm:justify-center gap-4 animate-fade-in [animation-delay:0.5s]">
            <button class="rounded-xl px-8 py-3.5 font-semibold bg-white text-sky-700 hover:bg-gray-100 transition-colors shadow-lg transform hover:scale-105" onclick="scrollToElement('event-gallery')">Temukan Event</button>
            <a href="{{ route('registerevent')}}" class="rounded-xl px-8 py-3.5 font-semibold border-2 border-white bg-white/10 text-white hover:bg-white/25 backdrop-blur-sm transition-colors shadow-lg transform hover:scale-105">
                Ajukan Event Anda
            </a>
        </div>
    </div>
</div>

{{-- Galeri Event (Marquee) --}}
<section class="overflow-hidden whitespace-nowrap bg-white dark:bg-slate-800 py-12" id="event-gallery">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center mb-10">Galeri Event Terkini</h2>
    <div class="w-full inline-block animate-marquee">
        @php
            $galleryImages = [
                ['file' => '1257w-Ghk8lx6yUCQ.webp', 'alt' => 'Suasana Konser Malam Hari'],
                ['file' => '4535650015b7608dce2f8e36a42785eb.jpg', 'alt' => 'Festival Musik Outdoor'],
                ['file' => '4c290251b6a184c00609d07e8f40fc9b.jpg', 'alt' => 'Panggung Megah dengan Lampu Sorot'],
                ['file' => '1131w-96LTeHAy_0c.webp', 'alt' => 'Penonton Menikmati Konser'],
                ['file' => '1131w-o5eGmJ05izs.webp', 'alt' => 'Pertunjukan Spektakuler di Panggung'],
                ['file' => 'event-night-flyer-template-b354cd8cd9d0513d7b0dc7f8df2202d2_screen.jpg', 'alt' => 'Desain Flyer Event Malam'],
                ['file' => '6cdba24179ddf294aa2d59613a873ad6.jpg', 'alt' => 'Keramaian Pengunjung Festival']
            ];
        @endphp
        @foreach ($galleryImages as $image)
            <img class="inline-block mx-3 w-60 h-96 object-cover rounded-xl shadow-lg card-hover" src="{{ asset($image['file']) }}" alt="{{ $image['alt'] }}">
        @endforeach
        {{-- Duplikasi untuk marquee mulus --}}
        @foreach ($galleryImages as $image)
            <img class="inline-block mx-3 w-60 h-96 object-cover rounded-xl shadow-lg card-hover" src="{{ asset($image['file']) }}" alt="{{ $image['alt'] }} (Duplikat)">
        @endforeach
    </div>
</section>

{{-- Event Unggulan --}}
<section class="py-16 bg-gray-50 dark:bg-slate-900" id="events">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center mb-12">Event Unggulan ✨</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Kartu Event 1: PDH DAY --}}
            <div class="bg-white dark:bg-slate-800 shadow-xl rounded-xl overflow-hidden flex flex-col card-hover transition-all duration-300 hover:shadow-2xl">
                <img alt="Event PDH DAY" class="w-full h-56 object-cover" src="{{ asset('pdhday.jpg') }}"/>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">PDH DAY</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1"><i class="fas fa-calendar-alt mr-1.5"></i> Jadwal: Setiap Senin</p>
                    <p class="text-gray-700 dark:text-gray-300 text-sm mb-4 flex-grow line-clamp-3">Kenakan PDH-mu dengan penuh kebanggaan, karena setiap langkah kita adalah bagian dari perjalanan besar...</p>
                    <div class="mt-auto pt-4 border-t border-gray-200 dark:border-slate-700 flex space-x-3">
                        <button type="button" class="register-event-trigger flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow hover:shadow-md"
                                data-event-name="PDH DAY" data-event-id="pdh-day">
                            <i class="fas fa-edit mr-2"></i>Daftar
                        </button>
                        <button type="button" class="open-event-detail-modal-trigger flex-1 text-center bg-transparent hover:bg-blue-50 dark:hover:bg-slate-700 text-blue-600 dark:text-blue-400 border-2 border-blue-500 dark:border-blue-500 px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors"
                                data-event-id="pdh-day">
                            <i class="fas fa-info-circle mr-2"></i>Detail
                        </button>
                    </div>
                </div>
            </div>

            {{-- Kartu Event 2: Buka Puasa Bersama --}}
            <div class="bg-white dark:bg-slate-800 shadow-xl rounded-xl overflow-hidden flex flex-col card-hover transition-all duration-300 hover:shadow-2xl">
                <img alt="Event Buka Puasa Bersama" class="w-full h-56 object-cover" src="{{ asset('bukber.jpg') }}"/>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Buka Puasa Bersama!</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1"><i class="fas fa-calendar-alt mr-1.5"></i> Jadwal: Maret 25, 2025</p>
                    <p class="text-gray-700 dark:text-gray-300 text-sm mb-4 flex-grow line-clamp-3">Mari jadikan momen ini lebih bermakna dengan mempererat kebersamaan dan menebar kebaikan...</p>
                    <div class="mt-auto pt-4 border-t border-gray-200 dark:border-slate-700 flex space-x-3">
                         <button type="button" class="register-event-trigger flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow hover:shadow-md"
                                data-event-name="Buka Puasa Bersama" data-event-id="buka-puasa">
                            <i class="fas fa-edit mr-2"></i>Daftar
                        </button>
                        <button type="button" class="open-event-detail-modal-trigger flex-1 text-center bg-transparent hover:bg-blue-50 dark:hover:bg-slate-700 text-blue-600 dark:text-blue-400 border-2 border-blue-500 dark:border-blue-500 px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors"
                                data-event-id="buka-puasa">
                             <i class="fas fa-info-circle mr-2"></i>Detail
                        </button>
                    </div>
                </div>
            </div>

            {{-- Kartu Event 3: Peer Teaching --}}
             <div class="bg-white dark:bg-slate-800 shadow-xl rounded-xl overflow-hidden flex flex-col card-hover transition-all duration-300 hover:shadow-2xl">
                <img alt="Event Peer Teaching" class="w-full h-56 object-cover" src="{{ asset('peerteaching.jpg') }}"/>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Peer Teaching</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1"><i class="fas fa-calendar-alt mr-1.5"></i> Jadwal: Maret 07-14, 2025</p>
                    <p class="text-gray-700 dark:text-gray-300 text-sm mb-4 flex-grow line-clamp-3">Ayo segera ajukan pertanyaan atau diskusikan mata kuliah yang ingin dibahas dengan tutor...</p>
                    <div class="mt-auto pt-4 border-t border-gray-200 dark:border-slate-700 flex space-x-3">
                        <button type="button" class="register-event-trigger flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow hover:shadow-md"
                                data-event-name="Peer Teaching" data-event-id="peer-teaching">
                            <i class="fas fa-edit mr-2"></i>Daftar
                        </button>
                        <button type="button" class="open-event-detail-modal-trigger flex-1 text-center bg-transparent hover:bg-blue-50 dark:hover:bg-slate-700 text-blue-600 dark:text-blue-400 border-2 border-blue-500 dark:border-blue-500 px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors"
                                data-event-id="peer-teaching">
                             <i class="fas fa-info-circle mr-2"></i>Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Section "Kenapa Pilih Festivalan" --}}
<section class="bg-white dark:bg-slate-800 py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center mb-12">✨ Kenapa Pilih Festivalan?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
            <div class="text-center p-6 bg-gray-50 dark:bg-slate-700/50 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-5xl text-blue-600 dark:text-blue-400 mb-5"><i class="fas fa-hand-holding-usd"></i></div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">🚫 Tanpa Potongan Biaya</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Semua event bisa diunggah dan dikelola tanpa komisi. Cocok untuk BEM, UKM, hingga dosen yang mengadakan acara.</p>
            </div>
            <div class="text-center p-6 bg-gray-50 dark:bg-slate-700/50 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                <div class="text-5xl text-blue-600 dark:text-blue-400 mb-5"><i class="fas fa-chart-line"></i></div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">📊 Data Real-time</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Lihat statistik peserta, jumlah pendaftar, dan status kehadiran secara langsung & akurat. Laporan siap pakai!</p>
            </div>
            <div class="text-center p-6 bg-gray-50 dark:bg-slate-700/50 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
                 <div class="text-5xl text-blue-600 dark:text-blue-400 mb-5"><i class="fas fa-headset"></i></div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">📞 Dukungan Penuh</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Tim kami siap membantu kapan saja untuk memastikan event kamu berjalan lancar dan sukses.</p>
            </div>
        </div>
    </div>
</section>

{{-- MODAL DETAIL EVENT (Ditempatkan di Beranda.blade.php) --}}
<div id="eventDetailModal" class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm h-full w-full hidden items-center justify-center z-50 p-4 animate-fade-in" style="animation-duration: 0.2s;">
    <div id="eventDetailModalContentWrapper" class="relative mx-auto w-full max-w-3xl xl:max-w-5xl h-auto max-h-[90vh] flex flex-col animate-slide-up bg-white dark:bg-slate-800 shadow-2xl rounded-xl" style="animation-duration: 0.3s;">
        {{-- Tombol Close di Pojok Kanan Atas Modal --}}
        <div class="flex justify-between items-center p-4 sm:p-6 border-b border-gray-200 dark:border-slate-700">
            <h2 id="modalDetailEventTitleHeader" class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white">Detail Event</h2>
            <button id="closeEventDetailModalTop" aria-label="Tutup modal detail" class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-100 transition-colors p-1 rounded-full hover:bg-gray-100 dark:hover:bg-slate-700">
                <i class="fas fa-times fa-lg"></i>
            </button>
        </div>

        {{-- Konten Scrollable --}}
        <div class="flex-grow overflow-y-auto">
            <article class="flex flex-col lg:flex-row">
                {{-- Kolom Kiri: Gambar Event --}}
                <div class="lg:w-2/5 xl:w-1/3 bg-gray-100 dark:bg-slate-700">
                    <img id="modalDetailEventImage" src="{{ asset('images/default_event_image.png') }}" alt="Poster Event" class="w-full h-64 lg:h-auto lg:aspect-[3/4] object-cover">
                </div>

                {{-- Kolom Kanan: Informasi Event --}}
                <div class="lg:w-3/5 xl:w-2/3 p-6 sm:p-8">
                    <span id="modalDetailEventCategory" class="bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300 text-xs font-semibold px-3 py-1 rounded-full mb-3 inline-block">Kategori</span>
                    {{-- Judul utama sudah di header modal, ini bisa jadi sub-judul atau dihilangkan --}}
                    {{-- <h1 id="modalDetailEventTitle" class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-3 leading-tight">Nama Event</h1> --}}
                    <div class="flex items-center text-gray-600 dark:text-gray-400 text-sm mb-5">
                        <i class="fas fa-calendar-alt mr-2 text-blue-500 dark:text-blue-400"></i>
                        <span id="modalDetailEventDateSimple">Tanggal</span>
                    </div>
                    <p id="modalDetailEventTagline" class="text-gray-700 dark:text-gray-300 mb-6 leading-relaxed text-md">Tagline event.</p>

                    <div class="space-y-3 text-sm mb-8">
                        <div class="flex">
                            <strong class="font-semibold text-gray-800 dark:text-gray-200 w-32 shrink-0">Jadwal Lengkap:</strong>
                            <span id="modalDetailEventScheduleFull" class="text-gray-600 dark:text-gray-400">Jadwal</span>
                        </div>
                        <div class="flex">
                            <strong class="font-semibold text-gray-800 dark:text-gray-200 w-32 shrink-0">Lokasi:</strong>
                            <span id="modalDetailEventLocation" class="text-gray-600 dark:text-gray-400">Lokasi</span>
                        </div>
                        <div class="flex">
                            <strong class="font-semibold text-gray-800 dark:text-gray-200 w-32 shrink-0">Penyelenggara:</strong>
                            <span id="modalDetailEventOrganizer" class="text-gray-600 dark:text-gray-400">Penyelenggara</span>
                        </div>
                    </div>
                     {{-- Deskripsi Lengkap di dalam modal --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Deskripsi Lengkap</h3>
                         <div id="modalDetailEventDescription" class="prose prose-sm sm:prose-base dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 leading-relaxed">
                            <p>Deskripsi detail event akan muncul di sini.</p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
         {{-- Footer Modal dengan Tombol Aksi --}}
        <div class="p-6 sm:p-8 border-t border-gray-200 dark:border-slate-700 flex flex-col sm:flex-row justify-end items-center gap-3">
             <button type="button" id="modalDetailRegisterButton" class="register-event-trigger w-full sm:w-auto flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-150 ease-in-out text-sm shadow-md hover:shadow-lg"
                    data-event-name="" data-event-id="">
                <i class="fas fa-edit mr-2"></i> Daftar Event Ini
            </button>
            <button type="button" onclick="alert('Fitur Tambah ke Kalender segera hadir!');" class="w-full sm:w-auto flex items-center justify-center bg-gray-200 hover:bg-gray-300 dark:bg-slate-600 dark:hover:bg-slate-500 text-gray-800 dark:text-white font-semibold py-2.5 px-6 rounded-lg transition duration-150 ease-in-out text-sm">
                <i class="fas fa-calendar-plus mr-2"></i>Tambahkan ke Kalender
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- Navbar Scroll & Transparansi ---
    const berandaNavbar = document.querySelector('header > nav.navbar.bg-transparent');
    const mainHeroSection = document.querySelector('.main');
    function handleBerandaScroll() {
        if (!berandaNavbar || !mainHeroSection) return;
        const isScrolledDown = window.scrollY > 1000;
        const elementsToChange = berandaNavbar.querySelectorAll('.text-on-transparent, .icon-on-transparent');
        const registerButtonHeroNav = berandaNavbar.querySelector('a[href*="register"].bg-white'); // Tombol "Register" di navbar saat transparan

        if (isScrolledDown) {
            berandaNavbar.classList.remove('bg-transparent', 'border-transparent');
            berandaNavbar.classList.add('bg-white', 'dark:bg-slate-800', 'shadow-lg');
            elementsToChange.forEach(el => {
                el.classList.remove('text-on-transparent', 'icon-on-transparent', 'hover-on-transparent');
                if (el.closest('ul')) {
                    el.classList.add('text-gray-900', 'dark:text-white', 'md:hover:text-blue-700', 'dark:md:hover:text-blue-500');
                } else if (el.tagName === 'SPAN' && el.classList.contains('self-center')) {
                    el.classList.add('text-gray-900', 'dark:text-white');
                } else if (el.tagName === 'I') {
                     el.classList.add('text-gray-700', 'dark:text-gray-300');
                } else { // Tautan login di navbar transparan
                    el.classList.add('text-gray-700', 'dark:text-gray-300', 'hover:text-blue-600', 'dark:hover:text-blue-400');
                }
            });
            if(registerButtonHeroNav){
                registerButtonHeroNav.classList.remove('bg-white','text-sky-700','hover:bg-gray-100', 'shadow');
                registerButtonHeroNav.classList.add('bg-blue-600','text-white','hover:bg-blue-700');
            }

        } else { // Kembali ke transparan
            berandaNavbar.classList.add('bg-transparent', 'border-transparent');
            berandaNavbar.classList.remove('bg-white', 'dark:bg-slate-800', 'shadow-lg');
            elementsToChange.forEach(el => {
                el.classList.remove('text-gray-900', 'dark:text-white', 'md:hover:text-blue-700', 'dark:md:hover:text-blue-500', 'text-gray-700', 'dark:text-gray-300', 'hover:text-blue-600', 'dark:hover:text-blue-400');
                el.classList.add('text-on-transparent');
                if(el.closest('ul')) el.classList.add('hover-on-transparent');
                if(el.tagName === 'I') el.classList.add('icon-on-transparent');
            });
            if(registerButtonHeroNav){
                registerButtonHeroNav.classList.remove('bg-blue-600','text-white','hover:bg-blue-700');
                registerButtonHeroNav.classList.add('bg-white','text-sky-700','hover:bg-gray-100', 'shadow');
            }
        }
    }
    if (mainHeroSection && berandaNavbar) {
        window.addEventListener('scroll', handleBerandaScroll);
        handleBerandaScroll(); // Panggil sekali saat load untuk set state awal
    }

    window.scrollToElement = function(elementId) {
        document.getElementById(elementId)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // --- DATA EVENT STATIS ---
    const staticEventsData = {
        'pdh-day': {
            title: 'PDH DAY', imageUrl: "{{ asset('pdhday.jpg') }}", category: 'Kegiatan Kampus', dateSimple: 'Setiap Senin',
            tagline: 'Kenakan PDH-mu dengan bangga, melangkah bersama menuju masa depan!',
            scheduleFull: 'Setiap Hari Senin, Jam Kampus Berlaku', location: 'Lingkungan Kampus Festivalan', organizer: 'Departemen Kesejahteraan Mahasiswa',
            description: "<p>PDH DAY adalah inisiatif mingguan yang bertujuan untuk memperkuat identitas dan kebersamaan mahasiswa Festivalan...</p>", idSlug: 'pdh-day'
        },
        'buka-puasa': {
            title: 'Buka Puasa Bersama', imageUrl: "{{ asset('bukber.jpg') }}", category: 'Acara Sosial & Keagamaan', dateSimple: '25 Maret 2025',
            tagline: 'Eratkan silaturahmi di bulan suci dengan berbuka puasa bersama.',
            scheduleFull: 'Selasa, 25 Maret 2025, Pukul 17.00 WIB - Selesai', location: 'Aula Utama Kampus Festivalan', organizer: 'UKM Kerohanian Islam',
            description: "<p>Dalam rangka menyambut bulan suci Ramadhan dan mempererat tali silaturahmi...</p>", idSlug: 'buka-puasa'
        },
        'peer-teaching': {
            title: 'Peer Teaching : Belajar Bareng', imageUrl: "{{ asset('peerteaching.jpg') }}", category: 'Akademik & Workshop', dateSimple: '07-14 Maret 2025',
            tagline: 'Belajar seru bareng tutor sebaya untuk berbagai mata kuliah.',
            scheduleFull: '07 - 14 Maret 2025 (Jadwal detail akan diumumkan)', location: 'Ruang Diskusi Kampus', organizer: 'Himpunan Mahasiswa & BEM',
            description: "<p>Kesulitan memahami mata kuliah tertentu? Program Peer Teaching hadir sebagai solusi!...</p>", idSlug: 'peer-teaching'
        }
    };

    // --- Logika untuk Modal Detail Event ---
    const eventDetailModal = document.getElementById('eventDetailModal');
    const closeEventDetailModalTopBtn = document.getElementById('closeEventDetailModalTop');
    // Elemen di dalam modal detail yang akan diisi
    const modalDetailEventImage = document.getElementById('modalDetailEventImage');
    const modalDetailEventCategory = document.getElementById('modalDetailEventCategory');
    const modalDetailEventTitleHeader = document.getElementById('modalDetailEventTitleHeader'); // Judul di header modal
    // const modalDetailEventTitle = document.getElementById('modalDetailEventTitle'); // Judul di konten (opsional jika sudah di header)
    const modalDetailEventDateSimple = document.getElementById('modalDetailEventDateSimple');
    const modalDetailEventTagline = document.getElementById('modalDetailEventTagline');
    const modalDetailRegisterButton = document.getElementById('modalDetailRegisterButton');
    const modalDetailEventScheduleFull = document.getElementById('modalDetailEventScheduleFull');
    const modalDetailEventLocation = document.getElementById('modalDetailEventLocation');
    const modalDetailEventOrganizer = document.getElementById('modalDetailEventOrganizer');
    const modalDetailEventDescription = document.getElementById('modalDetailEventDescription');

    function openEventDetailModal(eventId) {
        const eventData = staticEventsData[eventId];
        if (!eventData || !eventDetailModal) {
            console.error("Data event atau elemen modal tidak ditemukan untuk ID:", eventId);
            return;
        }

        modalDetailEventImage.src = eventData.imageUrl || "{{ asset('images/default_event_image.png') }}";
        modalDetailEventImage.alt = "Poster " + eventData.title;
        modalDetailEventCategory.textContent = eventData.category;
        modalDetailEventTitleHeader.textContent = eventData.title; // Set judul di header modal
        // if(modalDetailEventTitle) modalDetailEventTitle.textContent = eventData.title; // Set judul di konten jika ada
        modalDetailEventDateSimple.textContent = eventData.dateSimple;
        modalDetailEventTagline.textContent = eventData.tagline;
        
        modalDetailRegisterButton.dataset.eventName = eventData.title;
        modalDetailRegisterButton.dataset.eventId = eventData.idSlug;

        modalDetailEventScheduleFull.textContent = eventData.scheduleFull;
        modalDetailEventLocation.textContent = eventData.location;
        modalDetailEventOrganizer.textContent = eventData.organizer;
        modalDetailEventDescription.innerHTML = eventData.description;

        eventDetailModal.classList.remove('hidden');
        eventDetailModal.classList.add('flex');
        document.body.classList.add('overflow-hidden'); // Mencegah scroll background
    }

    function closeEventDetailModal() {
        if (eventDetailModal) {
            eventDetailModal.classList.add('hidden');
            eventDetailModal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    }

    if (closeEventDetailModalTopBtn) {
        closeEventDetailModalTopBtn.addEventListener('click', closeEventDetailModal);
    }
    if (eventDetailModal) {
        eventDetailModal.addEventListener('click', function(event) {
            if (event.target === eventDetailModal) {
                closeEventDetailModal();
            }
        });
    }
    if(modalDetailRegisterButton) {
        modalDetailRegisterButton.addEventListener('click', function() {
            const eventName = this.dataset.eventName;
            const eventId = this.dataset.eventId;
            closeEventDetailModal(); 
            setTimeout(() => { // Beri sedikit waktu agar modal detail tertutup sempurna
                if (typeof window.openEventRegistrationModal === 'function') {
                    window.openEventRegistrationModal(eventName, eventId);
                } else {
                     console.error('Fungsi openEventRegistrationModal tidak ditemukan.');
                }
            }, 150); // 150ms delay
        });
    }

    // Event Listener untuk tombol "Detail" pada kartu event
    const berandaDetailTriggers = document.querySelectorAll('.open-event-detail-modal-trigger');
    berandaDetailTriggers.forEach(button => {
        button.addEventListener('click', function() {
            const eventId = this.dataset.eventId;
            openEventDetailModal(eventId);
        });
    });

    // Event Listener untuk tombol pemicu modal registrasi event (yang umum)
    const berandaRegisterTriggers = document.querySelectorAll('.register-event-trigger:not(#modalDetailRegisterButton)'); // Kecualikan tombol di modal detail
    berandaRegisterTriggers.forEach(button => {
        button.addEventListener('click', function() {
            const eventName = this.dataset.eventName;
            const eventId = this.dataset.eventId;
            if (typeof window.openEventRegistrationModal === 'function') {
                window.openEventRegistrationModal(eventName, eventId);
            }
        });
    });
    
    // Hamburger Menu untuk Navbar Beranda
    const berandaHamburger = document.querySelector('#hamburger-menu[data-collapse-toggle="navbar-user-beranda"]');
    const berandaNavUser = document.getElementById('navbar-user-beranda');
    if (berandaHamburger && berandaNavUser) {
        berandaHamburger.addEventListener('click', function() {
            berandaNavUser.classList.toggle('hidden');
        });
    }
});
</script>
@endpush