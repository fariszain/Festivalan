<!DOCTYPE html>

<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Festivalan - Portal Event Kampus</title>
<script src="https://cdn.tailwindcss.com"></script>
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
<div class="container mx-auto p-4 py-16">
<!-- List Event Section -->
<section class="mb-16" id="event-list">
<h2 class="text-3xl font-bold text-center mb-8 text-slate-900">Daftar Event</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="events">
<!-- Event cards will be dynamically added here -->
</div>
</section>
<!-- Registration Form Section -->
<section class="mb-16 hidden" id="register-form">
<h2 class="text-3xl font-bold text-center mb-8 text-slate-900">Form Pendaftaran</h2>
<div class="max-w-lg mx-auto bg-white p-6 rounded-2xl shadow-lg">
<form id="registration-form">
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="name">Nama:</label>
<input class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="name" required="" type="text"/>
</div>
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="email">Email:</label>
<input class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="email" required="" type="email"/>
</div>
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="phone">Nomor Telepon:</label>
<input class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="phone" required="" type="tel"/>
</div>
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="event-select">Pilih Event:</label>
<select class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="event-select" required="">
<!-- Options will be dynamically added here -->
</select>
</div>
<button class="bg-sky-900 text-white px-6 py-3 rounded-lg w-full hover:bg-sky-800 transition" type="submit">Daftar</button>
</form>
</div>
</section>
<!-- Check Status Section -->
<section class="mb-16" id="check-status">
<h2 class="text-3xl font-bold text-center mb-8 text-slate-900">Cek Status Pendaftaran</h2>
<div class="max-w-lg mx-auto bg-white p-6 rounded-2xl shadow-lg">
<form id="status-form">
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="status-email">Email:</label>
<input class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="status-email" required="" type="email"/>
</div>
<button class="bg-sky-900 text-white px-6 py-3 rounded-lg w-full hover:bg-sky-800 transition" type="submit">Cek Status</button>
</form>
<div class="mt-4 text-gray-800" id="status-result"></div>
</div>
</section>
</div>
</main>
<!-- Footer -->
<footer class="bg-gray-800 text-white p-4 text-center">
<p>© 2025 Festivalan. All rights reserved.</p>
</footer>
<!-- Link to external JavaScript -->
<script src="{{ asset('storage/js/script.js') }}"></script>
<script src="{{ asset('storage/js/main.js') }}"></script>
</body>
</html>