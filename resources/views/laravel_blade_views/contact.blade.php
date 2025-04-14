<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact - Festivalan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Gaya untuk feedback formulir */
    #contact-success { display: none; }
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
  <main class="py-10 px-4">
    <section class="max-w-4xl mx-auto">
      <h1 class="text-4xl font-bold text-center mb-6">Get In Touch</h1>
      <p class="text-lg text-gray-700 text-center mb-8">
        Have any questions? Fill out the form below and we'll respond as soon as possible!
      </p>
      <form id="contact-form" class="max-w-2xl mx-auto space-y-6">
        <div>
          <label for="name" class="block text-gray-700">Name</label>
          <input type="text" id="name" class="w-full border p-3 rounded" required>
        </div>
        <div>
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" id="email" class="w-full border p-3 rounded" required>
        </div>
        <div>
          <label for="message" class="block text-gray-700">Message</label>
          <textarea id="message" rows="4" class="w-full border p-3 rounded" required></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-700 text-white py-3 rounded hover:bg-blue-800 transition">Send Message</button>
      </form>
      <div id="contact-success" class="mt-6 text-center text-green-600 font-semibold">
        Thank you for contacting us! We'll get back to you shortly.
      </div>
    </section>
    <section class="max-w-4xl mx-auto mt-12">
      <h2 class="text-2xl font-bold mb-4">Our Location</h2>
      <div class="w-full h-64">
        <iframe
          class="w-full h-full rounded"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=Jakarta,Indonesia" allowfullscreen>
        </iframe>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-center p-4">
    <p>&copy; 2025 Festivalan. All rights reserved.</p>
  </footer>

  <script>
    document.getElementById('contact-form').addEventListener('submit', function(e) {
      e.preventDefault();
      document.getElementById('contact-success').style.display = 'block';
      this.reset();
    });
  </script>
  <script src="{{ asset('storage/js/main.js') }}"></script>
</body>
</html>
