<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Festivalan - Event Ticketing Platform</title>
<script src="https://cdn.tailwindcss.com"></script>
<script crossorigin="anonymous" src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
        tailwind.config = {
          theme: {
            extend: {
              animation: {
                marquee: 'marquee 25s linear infinite',
              },
              keyframes: {
                marquee: {
                  '0%': { transform: 'translateX(100%)' },
                  '100%': { transform: 'translateX(-100%)' },
                },
              }
            }
          }
        }
    </script>
<style>
    #user-dropdown * {
        color: #1a365d;
    }

    #logout {
        color: #e53e3e;
    }
</style>
</head>
<body class="bg-white">
<!-- Transparent Header -->
<header class="fixed top-0 w-full z-50">
<nav class="navbar bg-transparent border-transparent transition-colors duration-300">
<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
<a class="flex items-center space-x-3 rtl:space-x-reverse" href="{{ route('Beranda')}}">
<img alt="Logo" class="h-8" src="{{ asset('storage/Gambar_WhatsApp_2025-04-14_pukul_19.16.03_c2ef5862-removebg-preview.png') }}"/>
<span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Festivalan</span>
</a>
<button aria-label="Toggle menu" class="md:hidden text-white focus:outline-none" id="hamburger-menu">
<i class="fas fa-bars text-xl"></i>
</button>
<div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
<button class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" type="button">
<span class="sr-only">Open user menu</span>
<img alt="user photo" class="w-8 h-8 rounded-full" id="dropdown-avatar" src="{{ asset('storage/36') }}"/>
</button>
<!-- Dropdown menu -->
<div class="hidden absolute right-0 top-12 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 text-[#1a365d]" id="user-dropdown">
<div class="px-4 py-3 border-b border-gray-200">
<span class="block text-sm font-medium" id="dropdown-name">Faris Zain As-Shadiq</span>
<span class="block text-xs text-gray-500" id="dropdown-email">FarisZain@gmail.com</span>
</div>
<ul class="py-1" id="user-dropdown">
<li><a class="block px-4 py-2 text-sm hover:bg-gray-100" href="{{ route('Profile')}}">Profil</a></li>
<li><a class="block px-4 py-2 text-sm hover:bg-gray-100" href="{{ route('ubahprofile')}}">Ubah Profile</a></li>
<li><a class="block px-4 py-2 text-sm text-[#e53e3e] hover:bg-gray-100" href="login.html" id="logout">Keluar</a></li>
</ul>
</div>
</div>
<div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
<ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-transparent">
<li>
<a class="block py-2 px-3 text-white rounded-sm md:hover:text-blue-200 md:p-0" href="{{ route('Beranda')}}">Home</a>
</li>
<li>
<a class="block py-2 px-3 text-white rounded-sm md:hover:text-blue-200 md:p-0" href="{{ route('about')}}">About</a>
</li>
<li>
<a class="block py-2 px-3 text-white rounded-sm md:hover:text-blue-200 md:p-0" href="{{ route('services')}}">Services</a>
</li>
<li>
<a class="block py-2 px-3 text-white rounded-sm md:hover:text-blue-200 md:p-0" href="{{ route('gallery')}}">Gallery</a>
</li>
<li>
<a class="block py-2 px-3 text-white rounded-sm md:hover:text-blue-200 md:p-0" href="{{ route('contact')}}">Contact</a>
</li>
</ul>
</div>
</div>
</nav>
</header>
<!-- Background Video -->
<div class="relative h-screen overflow-hidden main">
<video autoplay="" class="absolute inset-0 w-full h-full object-cover -z-20 brightness-50" loop="" muted="" playsinline="">
<source src="{{ asset('storage/3209211-uhd_3840_2160_25fps.mp4') }}" type="video/mp4"/>
      Browser kamu tidak mendukung video background.
    </video>
<!-- Hero Content -->
<div class="relative z-10 flex h-full flex-col items-center justify-center px-4">
<div class="max-w-3xl text-center">
<h1 class="mb-8 text-4xl font-bold tracking-tight sm:text-6xl lg:text-7xl text-white">
          Welcome to
          <span class="text-sky-200">Festivalan</span>
</h1>
<p class="mx-auto mb-8 max-w-2xl text-lg text-white/90">
            The best platform to buy tickets and manage your events
        </p>
<div class="flex flex-wrap justify-center gap-4">
<button class="rounded-lg px-6 py-3 font-medium bg-white text-sky-900 hover:bg-gray-100" onclick="scrollToGallery()">Find Events</button>
<button class="rounded-lg border px-6 py-3 font-medium border-white bg-transparent text-white hover:bg-white/10">
<a href="{{ route('register')}}">Register Event</a>
</button>
</div>
</div>
</div>
</div>
<section class="overflow-hidden whitespace-nowrap bg-white py-6" id="event-gallery">
<h2 class="text-3xl font-bold text-center mb-8">Event Galery</h2>
<div class="inline-block animate-marquee">
<img class="inline-block mx-6 w-60 h-[400px] object-cover rounded-2xl shadow-lg" src="{{ asset('storage/1257w-Ghk8lx6yUCQ.webp') }}">
<img class="inline-block mx-6 w-60 h-[400px] object-cover rounded-2xl shadow-lg" src="{{ asset('storage/4535650015b7608dce2f8e36a42785eb.jpg') }}"/>
<img class="inline-block mx-6 w-60 h-[400px] object-cover rounded-2xl shadow-lg" src="{{ asset('storage/4c290251b6a184c00609d07e8f40fc9b.jpg') }}"/>
<img class="inline-block mx-6 w-60 h-[400px] object-cover rounded-2xl shadow-lg" src="{{ asset('storage/1131w-96LTeHAy_0c.webp') }}"/>
<img class="inline-block mx-6 w-60 h-[400px] object-cover rounded-2xl shadow-lg" src="{{ asset('storage/1131w-o5eGmJ05izs.webp') }}"/>
<img class="inline-block mx-6 w-60 h-[400px] object-cover rounded-2xl shadow-lg" src="{{ asset('storage/event-night-flyer-template-b354cd8cd9d0513d7b0dc7f8df2202d2_screen.jpg') }}"/>
<img class="inline-block mx-6 w-60 h-[400px] object-cover rounded-2xl shadow-lg" src="{{ asset('storage/6cdba24179ddf294aa2d59613a873ad6.jpg') }}"/>
</img></div>
</section>
<!-- Featured Events Section -->
<section class="py-16" id="events">
<div class="container mx-auto">
<h2 class="text-3xl font-bold text-center mb-8">Featured Events</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Event Card 1 -->
<div class="bg-white shadow-lg rounded-lg overflow-hidden">
<img alt="Event 1" class="w-full" src="{{ asset('storage/pdhday.jpg') }}"/>
<div class="p-4">
<h3 class="text-xl font-bold mb-2">PDH DAY</h3>
<p class="text-gray-600 mb-2">Jadwal: Setiap senin</p>
<p class="text-gray-800 mb-4">Kenakan PDH-mu dengan penuh kebanggaan, karena setiap langkah kita adalah bagian dari perjalanan besar. Mari melesat lebih tinggi, melampaui batas, dan terus maju bersama!🙌</p>
</div>
</div>
<!-- Event Card 2 -->
<div class="bg-white shadow-lg rounded-lg overflow-hidden">
<img alt="Event 2" class="w-full" src="{{ asset('storage/bukber.jpg') }}"/>
<div class="p-4">
<h3 class="text-xl font-bold mb-2">Buka Puasa Bersama!</h3>
<p class="text-gray-600 mb-2">Jadwal: Maret 25, 2025</p>
<p class="text-gray-800 mb-4">Mari jadikan momen ini lebih bermakna dengan mempererat kebersamaan dan menebar kebaikan di bulan suci Ramadhan. Sampai jumpa di sana! ✨🤗</p>
<button class="buy-ticket-btn bg-blue-600 text-white px-4 py-2 rounded">Daftar</button>
</div>
</div>
<!-- Event Card 3 -->
<div class="bg-white shadow-lg rounded-lg overflow-hidden">
<img alt="Event 3" class="w-full" src="{{ asset('storage/peerteaching.jpg') }}"/>
<div class="p-4">
<h3 class="text-xl font-bold mb-2">Peer Teaching</h3>
<p class="text-gray-600 mb-2">Jadwal: Maret 07-14, 2025</p>
<p class="text-gray-800 mb-4">Ayo segera ajukan pertanyaan atau diskusikan mata kuliah yang ingin dibahas dengan tutor melalui link berikut:</p>
<p class="text-gray-800 mb-4">https://forms.gle/HqUGuwwNPpHjS7N66</p>
<p class="text-gray-800 mb-4">Jangan lewatkan kesempatan belajar produktif ini, girls!</p>
<button class="buy-ticket-btn bg-blue-600 text-white px-4 py-2 rounded">Daftar</button>
</div>
</div>
</div>
</div>
</section>
<!-- Features Section -->
<section class="bg-gray-100 py-16">
<div class="container mx-auto">
<h2 class="text-3xl font-bold text-center mb-8">✨ Kenapa Pilih Eventify?</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="text-center">
<h3 class="text-xl font-bold mb-2">🚫 Tanpa Potongan Biaya</h3>
<p class="text-gray-800">Semua event bisa diunggah dan dikelola tanpa komisi. Cocok untuk BEM, UKM, hingga dosen yang mengadakan acara.</p>
</div>
<div class="text-center">
<h3 class="text-xl font-bold mb-2">📊 Data Real-time</h3>
<p class="text-gray-800">Lihat statistik peserta, jumlah pendaftar, dan status kehadiran secara langsung &amp; akurat. Laporan siap pakai!</p>
</div>
<div class="text-center">
<h3 class="text-xl font-bold mb-2">📆 Pengingat Otomatis</h3>
<p class="text-gray-800">Tim kami siap membantu kapan saja untuk memastikan event kamu berjalan lancar.</p>
</div>
</div>
</div>
</section>
<!-- Footer -->
<footer class="bg-gray-800 text-white p-4 text-center">
<p>© 2025 Festivalan. All rights reserved.</p>
</footer>
<!-- Modals -->
<!-- Register Event Modal -->
<div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" id="register-modal">
<div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
<h3 class="text-lg font-bold mb-4">Register Your Event</h3>
<form id="register-form">
<div class="mb-4">
<label class="block text-gray-700">Event Name</label>
<input class="border p-2 w-full" required="" type="text"/>
</div>
<div class="mb-4">
<label class="block text-gray-700">Date</label>
<input class="border p-2 w-full" required="" type="date"/>
</div>
<div class="mb-4">
<label class="block text-gray-700">Description</label>
<textarea class="border p-2 w-full" required=""></textarea>
</div>
<button class="bg-blue-600 text-white px-4 py-2 rounded" type="submit">Submit</button>
<button class="bg-gray-300 text-gray-700 px-4 py-2 rounded ml-2" id="close-register" type="button">Close</button>
</form>
</div>
</div>
<!-- Buy Tickets Modal -->
<div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden" id="ticket-modal">
<div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
<h3 class="text-lg font-bold mb-4">Buy Tickets</h3>
<p>Ticket purchasing functionality coming soon!</p>
<button class="bg-gray-300 text-gray-700 px-4 py-2 rounded mt-4" id="close-ticket">Close</button>
</div>
</div>
<script src="{{ asset('storage/js/main.js') }}"> </script>
</body>
</html>