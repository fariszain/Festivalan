<!DOCTYPE html>

<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Services - Festivalan</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>
<script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sky-900': '#0c4a6e',
                        'slate-900': '#1e293b',
                    },
                }
            }
        }
    </script>
<style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.5s ease-in-out; }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-white">
<!-- Header -->
</head>
<body class="bg-white flex flex-col min-h-screen">
    <!-- Header -->
    <header class="sticky top-0 z-50">
      <nav class="bg-white border-gray-200 dark:bg-gray-900">
          <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <a href="{{ route('Beranda')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
              <img alt="Logo" class="h-8" src="{{ asset('storage/Gambar_WhatsApp_2025-04-14_pukul_19.16.03_c2ef5862-removebg-preview.png') }}"/>
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Festivalan</span>
              </a>
              <button id="hamburger-menu" class="md:hidden text-gray-900 focus:outline-none dark:text-white" aria-label="Toggle menu">
                  <i class="fas fa-bars text-xl"></i>
              </button>
              <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                  <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                      <span class="sr-only">Open user menu</span>
                      <img id="dropdown-avatar" class="w-8 h-8 rounded-full" src="/api/placeholder/36/36" alt="user photo">
                  </button>
                  <!-- Dropdown menu -->
                  <div id="user-dropdown" class="hidden absolute right-0 top-12 mt-2 w-48 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 z-50">
                      <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-600">
                          <span id="dropdown-name" class="block text-sm text-gray-900 font-medium dark:text-white">Faris Zain As-Shadiq</span>
                          <span id="dropdown-email" class="block text-xs text-gray-500 dark:text-gray-400">FarisZain@gmail.com</span>
                      </div>
                      <ul class="py-1">
                          <li><a href="{{ route('Profile')}}"" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a></li>
                          <li><a href="{{ route('ubahprofile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Ubah Profile</a></li>
                          <li><a href="login.html" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-500 dark:hover:bg-gray-600 dark:hover:text-white">Keluar</a></li>
                      </ul>
                  </div>
              </div>
              <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                  <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                      <li>
                          <a href="{{ route('Beranda')}}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
                      </li>
                      <li>
                          <a href="{{ route('about')}}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                      </li>
                      <li>
                          <a href="{{ route('services')}}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                      </li>
                      <li>
                          <a href="{{ route('gallery')}}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Gallery</a>
                      </li>
                      <li>
                          <a href="{{ route('contact')}}" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
  </header>
<!-- Main Content -->
<main class="relative">
<!-- Background Pattern -->
<div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]">
<div class="absolute inset-0 bg-[radial-gradient(circle_500px_at_50%_200px,#C9EBFF,transparent)]"></div>
</div>
<div class="container mx-auto p-4 sm:p-6 lg:p-8 py-16 max-w-6xl">
<!-- Hero Section -->
<section class="bg-gray-800 text-white py-16 rounded-2xl shadow-lg mb-16 animate-fade-in">
<div class="max-w-4xl mx-auto text-center px-4">
<h1 class="text-4xl md:text-5xl font-bold mb-6">Layanan Kami</h1>
<p class="text-xl md:text-2xl mb-8">Temukan bagaimana Festivalan dapat membantu Anda membuat, mengelola, dan mempromosikan acara Anda</p>
</div>
</section>
<!-- Services Grid -->
<section class="mb-16">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<!-- Service Card 1 -->
<div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
<div class="p-6">
<div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
<i class="fas fa-ticket-alt text-gray-600 text-2xl"></i>
</div>
<h3 class="text-xl font-bold text-sky-900 mb-3">Tiket Acara</h3>
<p class="text-gray-600 mb-4">Jual tiket online dengan platform kami yang mudah digunakan. Kelola daftar peserta, lacak penjualan, dan tangani pembayaran dengan aman.</p>
<ul class="space-y-2 text-gray-700">
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Jenis tiket khusus</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Pelacakan penjualan real-time</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Proses pembayaran aman</span>
</li>
</ul>
</div>
</div>
<!-- Service Card 2 -->
<div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
<div class="p-6">
<div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
<i class="fas fa-calendar-alt text-gray-600 text-2xl"></i>
</div>
<h3 class="text-xl font-bold text-sky-900 mb-3">Manajemen Acara</h3>
<p class="text-gray-600 mb-4">Buat dan kelola acara Anda dengan alat kami yang komprehensif. Dari pertemuan kecil hingga festival besar.</p>
<ul class="space-y-2 text-gray-700">
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Halaman acara khusus</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Manajemen RSVP</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Komunikasi peserta</span>
</li>
</ul>
</div>
</div>
<!-- Service Card 3 -->
<div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
<div class="p-6">
<div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
<i class="fas fa-bullhorn text-gray-600 text-2xl"></i>
</div>
<h3 class="text-xl font-bold text-sky-900 mb-3">Promosi Acara</h3>
<p class="text-gray-600 mb-4">Dapatkan acara Anda di depan audiens yang tepat dengan alat pemasaran dan jaringan kami.</p>
<ul class="space-y-2 text-gray-700">
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Integrasi media sosial</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Alat pemasaran email</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Penempatan acara unggulan</span>
</li>
</ul>
</div>
</div>
<!-- Service Card 4 -->
<div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
<div class="p-6">
<div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
<i class="fas fa-chart-line text-gray-600 text-2xl"></i>
</div>
<h3 class="text-xl font-bold text-sky-900 mb-3">Analitik &amp; Laporan</h3>
<p class="text-gray-600 mb-4">Dapatkan wawasan tentang kinerja acara Anda dengan analitik dan laporan terperinci.</p>
<ul class="space-y-2 text-gray-700">
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Pelacakan kehadiran real-time</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Laporan pendapatan</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Demografi audiens</span>
</li>
</ul>
</div>
</div>
<!-- Service Card 5 -->
<div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
<div class="p-6">
<div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
<i class="fas fa-check-circle text-gray-600 text-2xl"></i>
</div>
<h3 class="text-xl font-bold text-sky-900 mb-3">Solusi Check-in</h3>
<p class="text-gray-600 mb-4">Sederhanakan proses check-in acara Anda dengan solusi kami yang ramah seluler.</p>
<ul class="space-y-2 text-gray-600">
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Pemindaian kode QR</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Aplikasi check-in seluler</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Registrasi di tempat</span>
</li>
</ul>
</div>
</div>
<!-- Service Card 6 -->
<div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
<div class="p-6">
<div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
<i class="fas fa-headset text-gray-600 text-2xl"></i>
</div>
<h3 class="text-xl font-bold text-sky-900 mb-3">Dukungan Khusus</h3>
<p class="text-gray-600 mb-4">Tim kami siap membantu Anda di setiap langkah perencanaan acara Anda.</p>
<ul class="space-y-2 text-gray-700">
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Dukungan pelanggan 24/7</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Sumber daya perencanaan acara</span>
</li>
<li class="flex items-center">
<i class="fas fa-check-circle text-green-500 mr-2"></i>
<span>Panduan praktik terbaik</span>
</li>
</ul>
</div>
</div>
</div>
</section>
<!-- CTA Section -->
<section class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-200 animate-fade-in">
<h2 class="text-2xl md:text-3xl font-bold mb-4 text-sky-900">Siap membuat acara berikutnya?</h2>
<p class="text-gray-600 mb-6 max-w-2xl mx-auto">Bergabunglah dengan ribuan penyelenggara acara yang mempercayai Festivalan untuk membuat acara mereka sukses.</p>
<div class="flex flex-wrap justify-center gap-4">
<a class="rounded-lg px-6 py-3 font-medium bg-gray-800 text-gray-100 hover:bg-gray-700 transition-colors transform hover:scale-105" href="register.html">Mulai Sekarang</a>
<a class="rounded-lg border px-6 py-3 font-medium border-gray-800 bg-transparent text-gray-500 hover:bg-gray-700 hover:text-blue-400 transition-colors transform hover:scale-105" href="contact.html">Hubungi Tim Kami</a>
</div>
</section>
</div>
</main>
<!-- Footer -->
<footer class="bg-gray-800 text-white p-4 text-center">
<p>© 2025 Festivalan. All rights reserved.</p>
</footer>
<script src="{{ asset('storage/js/main.js') }}"></script>
</body>
</html>