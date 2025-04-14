<!DOCTYPE html>

<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Ubah Profil - Festivalan</title>
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
        .tooltip {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .tooltip-parent:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }
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
<div class="container mx-auto p-4 sm:p-6 lg:p-8 py-16 max-w-4xl">
<!-- Profile Section -->
<section class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 mb-16 animate-fade-in">
<div class="profile-header flex flex-col sm:flex-row items-center pb-5 mb-8 border-b border-gray-200">
<div class="profile-avatar relative mr-0 sm:mr-8 mb-4 sm:mb-0 tooltip-parent">
<img alt="Profile Picture" class="w-[100px] h-[100px] rounded-full border-3 border-sky-900" id="profile-avatar" src="{{ asset('images/100') }}"/>
<div class="upload-overlay absolute bottom-0 right-0 bg-sky-900 w-8 h-8 rounded-full flex items-center justify-center cursor-pointer transition-colors hover:bg-sky-800">
<label class="cursor-pointer" for="upload-photo">
<i class="fas fa-camera text-white text-sm"></i>
</label>
<input accept="image/*" class="hidden" id="upload-photo" type="file"/>
</div>
<span class="tooltip absolute bottom-10 right-0 bg-gray-800 text-white text-xs rounded py-1 px-2">Unggah Foto</span>
</div>
<div class="profile-info text-center sm:text-left">
<h3 class="text-2xl font-bold text-sky-900">Ubah Profil</h3>
<p class="text-gray-600">Perbarui informasi profil dan alamat email Anda</p>
</div>
</div>
<!-- Personal Info Card -->
<div class="card-hover bg-white p-6 rounded-2xl shadow-lg mb-6">
<h3 class="text-xl font-bold text-sky-900 mb-4">Informasi Personal</h3>
<form class="space-y-6" id="profile-form">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
<div class="relative">
<i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" id="full-name" type="text" value="Faris Zain As-Shadiq"/>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Username</label>
<div class="relative">
<i class="fas fa-at absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg bg-gray-100 cursor-not-allowed" id="username" readonly="" type="text" value="Zeyn"/>
</div>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Email</label>
<div class="relative">
<i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg bg-gray-100 cursor-not-allowed" id="email" readonly="" type="email" value="FarisZain@gmail.com"/>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
<div class="relative">
<i class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" id="phone" type="tel" value="085142233633"/>
</div>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Bio</label>
<textarea class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 min-h-[120px] transition" id="bio">Project Manager dengan pengalaman 5 tahun dalam pengembangan aplikasi web dan mobile.</textarea>
</div>
<div class="flex justify-end gap-4">
<button class="px-6 py-3 border border-gray-300 rounded-lg bg-white text-gray-700 hover:bg-gray-100 transition transform hover:scale-105" type="button">Batal</button>
<button class="px-6 py-3 bg-sky-900 text-white rounded-lg hover:bg-sky-800 transition transform hover:scale-105" type="submit">Simpan Perubahan</button>
</div>
</form>
</div>
<!-- Password Card -->
<div class="card-hover bg-white p-6 rounded-2xl shadow-lg">
<h3 class="text-xl font-bold text-sky-900 mb-4">Ubah Password</h3>
<p class="text-gray-600 mb-4">Kosongkan jika tidak ingin mengubah password</p>
<form class="space-y-6" id="password-form">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Password Saat Ini</label>
<div class="relative">
<i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" type="password"/>
<i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600 toggle-password"></i>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Password Baru</label>
<div class="relative">
<i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" type="password"/>
<i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600 toggle-password"></i>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
<div class="relative">
<i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" type="password"/>
<i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600 toggle-password"></i>
</div>
</div>
</div>
<div class="flex justify-end gap-4 mt-8">
<button class="px-6 py-3 border border-gray-300 rounded-lg bg-white text-gray-700 hover:bg-gray-100 transition transform hover:scale-105" type="button">Batal</button>
<button class="px-6 py-3 bg-sky-900 text-white rounded-lg hover:bg-sky-800 transition transform hover:scale-105" type="submit">Simpan Perubahan</button>
</div>
</form>
</div>
</section>
</div>
</main>
<!-- Footer -->
<footer class="bg-gray-800 text-white p-4 text-center">
<p>© 2025 Festivalan. All rights reserved.</p>
</footer>
<!-- Link to external JavaScript -->
<script src="{{ asset('storage/js/main.js') }}"></script>
</body>
</html>