{{-- resources/views/services.blade.php --}}
@extends('layouts.layout')

@section('content')
<main class="relative">
<div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]">
<div class="absolute inset-0 bg-[radial-gradient(circle_500px_at_50%_200px,#C9EBFF,transparent)]"></div>
</div>
<div class="container mx-auto p-4 sm:p-6 lg:p-8 py-16 max-w-6xl">
<section class="bg-gray-800 text-white py-16 rounded-2xl shadow-lg mb-16 animate-fade-in">
<div class="max-w-4xl mx-auto text-center px-4">
<h1 class="text-4xl md:text-5xl font-bold mb-6">Layanan Kami</h1>
<p class="text-xl md:text-2xl mb-8">Temukan bagaimana Festivalan dapat membantu Anda membuat, mengelola, dan mempromosikan acara Anda</p>
</div>
</section>
<section class="mb-16">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
<div class="card-hover bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
<div class="p-6">
<div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
<i class="fas fa-chart-line text-gray-600 text-2xl"></i>
</div>
<h3 class="text-xl font-bold text-sky-900 mb-3">Analitik & Laporan</h3>
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
<section class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-200 animate-fade-in">
<h2 class="text-2xl md:text-3xl font-bold mb-4 text-sky-900">Siap membuat acara berikutnya?</h2>
<p class="text-gray-600 mb-6 max-w-2xl mx-auto">Bergabunglah dengan ribuan penyelenggara acara yang mempercayai Festivalan untuk membuat acara mereka sukses.</p>
<div class="flex flex-wrap justify-center gap-4">
<a class="rounded-lg px-6 py-3 font-medium bg-gray-800 text-gray-100 hover:bg-gray-700 transition-colors transform hover:scale-105" href="{{ route('register') }}">Mulai Sekarang</a>
<a class="rounded-lg border px-6 py-3 font-medium border-gray-800 bg-transparent text-gray-500 hover:bg-gray-700 hover:text-blue-400 transition-colors transform hover:scale-105" href="{{ route('contact') }}">Hubungi Tim Kami</a>
</div>
</section>
</div>
</main>
@endsection