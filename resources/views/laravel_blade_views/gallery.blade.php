<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Event Gallery - Eventify</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white min-h-screen flex flex-col">
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
<main class="flex-grow py-20 px-4">
<div class="max-w-4xl mx-auto">
<div class="text-center mb-12">
<h1 class="text-4xl font-bold text-sky-900 mb-4">Galeri Event Kampus</h1>
<p class="text-lg text-gray-700">Rekam Jejak Acara Universitas yang Telah Berlalu</p>
</div>
<!-- Event 1 -->
<section class="mb-12">
<h2 class="text-2xl font-bold text-sky-900 mb-4">Wisuda Angkatan 2023</h2>
<div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/w1.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/w2.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/w3.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/w4.jpg') }}"/>
</div>
</section>
<!-- Event 2 -->
<section class="mb-12">
<h2 class="text-2xl font-bold text-sky-900 mb-4">Integer X Upgrading 2025</h2>
<div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/i1.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/i2.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/i3.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/i4.jpg') }}"/>
</div>
</section>
<!-- Event 3 -->
<section class="mb-12">
<h2 class="text-2xl font-bold text-sky-900 mb-4">Takjil On The Road</h2>
<div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/t1.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/t2.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/t3.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('storage/t4.jpg') }}"/>
</div>
</section>
</div>
</main>
<footer class="bg-gray-800 text-white text-center p-4 mt-auto">
<p>© 2025 Eventify. All rights reserved.</p>
</footer>
<style>
    .scrollbar-hide::-webkit-scrollbar {
      display: none;
    }
    .scrollbar-hide {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>
  <script src="{{ asset('storage/js/main.js') }}"></script>
</body>
</html>