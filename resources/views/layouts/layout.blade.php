<!DOCTYPE html>
<html lang="id" class="scroll-smooth"> {{-- Added scroll-smooth --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Festivalan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'sky-900': '#0c4a6e',
                        'slate-900': '#0e172a',
                        'slate-800': '#1e293b',
                        'slate-700': '#334155',
                        'sky-200': '#bae6fd',
                        'sky-300': '#7dd3fc', // Added for accents
                        'blue-500': '#3b82f6',
                        'blue-600': '#2563eb',
                        'blue-700': '#1d4ed8',
                        'indigo-500': '#6366f1',
                        'indigo-600': '#4f46e5',
                    },
                    animation: {
                        marquee: 'marquee 35s linear infinite', // Slightly slower
                        'fade-in': 'fadeIn 0.5s ease-out forwards', // For modal & hero
                        'slide-up': 'slideUp 0.5s ease-out forwards', // For modal content
                    },
                    keyframes: {
                        marquee: {
                            '0%': { transform: 'translateX(100%)' },
                            '100%': { transform: 'translateX(-100%)' }, // Animate to further left
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    },
                    typography: (theme) => ({ /* ... (konfigurasi typography jika pakai plugin) ... */ }),
                }
            },
            plugins: [
                require('@tailwindcss/typography'),
                require('@tailwindcss/forms'),
            ],
        }
    </script>
    <style>
        html.dark input[type="datetime-local"]::-webkit-calendar-picker-indicator,
        html.dark input[type="date"]::-webkit-calendar-picker-indicator,
        html.dark input[type="time"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
        .navbar.bg-transparent .text-on-transparent { color: white !important; }
        .navbar.bg-transparent .hover-on-transparent:hover { color: #bfdbfe !important; }
        .navbar.bg-transparent .icon-on-transparent { color: white !important; }
        .animate-fade-in { animation: fadeIn 0.5s ease-out forwards; }
    </style>
    @stack('styles')
</head>
<body class="bg-white dark:bg-slate-900 flex flex-col min-h-screen font-sans text-gray-900 dark:text-gray-200 antialiased">

    @yield('header')

    @if (!request()->routeIs('Beranda') && !request()->routeIs('auth'))
        <header class="sticky top-0 z-40 shadow-md">
            {{-- Navbar Default --}}
            <nav class="bg-white border-b border-gray-200 dark:bg-slate-800 dark:border-slate-700">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="{{ route('Beranda') }}" class="flex items-center space-x-3">
                        <img alt="Logo" class="h-8 sm:h-9" src="{{ asset('Gambar_WhatsApp_2025-04-14_pukul_19.16.03_c2ef5862-removebg-preview.png') }}"/>
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900 dark:text-white">Festivalan</span>
                    </a>
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse relative">
                        @auth
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false">
                                <span class="sr-only">Buka menu pengguna</span>
                                <img id="dropdown-avatar" class="w-8 h-8 rounded-full" src="{{ asset('images/default_avatar.png') }}" alt="Foto pengguna">
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
                            <a href="{{ route('auth') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 transition-colors">Login</a>
                            <a href="{{ Route::has('register') ? route('register') : route('auth') }}" class="text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 rounded-lg px-4 py-2 transition-colors">Register</a>
                        @endauth
                        <button id="hamburger-menu" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 dark:text-gray-400 rounded-lg md:hidden hover:bg-gray-100 dark:hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-slate-600" aria-controls="navbar-user-default" aria-expanded="false" aria-label="Toggle menu">
                            <span class="sr-only">Buka menu utama</span><i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user-default">
                        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 dark:border-slate-700 rounded-lg bg-gray-50 dark:bg-slate-800 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:md:bg-slate-800">
                            <li><a href="{{ route('Beranda')}}" class="nav-link {{ request()->routeIs('Beranda') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ route('about')}}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                            <li><a href="{{ route('services')}}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
                            <li><a href="{{ route('gallery')}}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a></li>
                            <li><a href="{{ route('contact')}}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    @endif

    @if (session('success')) /* ... (blok pesan session) ... */ @endif
    @if (session('error')) /* ... (blok pesan session) ... */ @endif
    @if ($errors->any() && !request()->routeIs('registerevent')) /* ... (blok pesan error) ... */ @endif

    <div class="flex-grow">
        @yield('content')
    </div>

    <footer class="bg-slate-800 dark:bg-slate-900 text-gray-300 dark:text-gray-400 text-center p-8 mt-auto">
        <p>&copy; {{ date('Y') }} Festivalan. Hak Cipta Dilindungi.</p>
    </footer>

    {{-- MODAL PENDAFTARAN EVENT (UMUM) --}}
    <div id="eventRegistrationModal" class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm h-full w-full hidden items-center justify-center z-50 p-4 animate-fade-in" style="animation-duration: 0.2s;">
        <div id="eventRegistrationModalContent" class="relative mx-auto p-6 sm:p-8 w-full max-w-lg shadow-2xl rounded-xl bg-white dark:bg-slate-800 text-gray-900 dark:text-white animate-slide-up" style="animation-duration: 0.3s;">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-xl sm:text-2xl font-semibold">Pendaftaran Event: <br class="sm:hidden"><span id="modalEventName" class="text-blue-600 dark:text-blue-400">Nama Event</span></h3>
                <button id="closeEventRegistrationModal" aria-label="Tutup modal" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors p-1 -mt-1 -mr-1">
                    <i class="fas fa-times fa-lg"></i>
                </button>
            </div>
            <form id="eventRegistrationForm" class="space-y-4">
                <input type="hidden" id="modalEventId" name="event_id">
                <div>
                    <label for="modalUserName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap Anda</label>
                    <input type="text" id="modalUserName" name="name" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent sm:text-sm" placeholder="John Doe">
                </div>
                <div>
                    <label for="modalUserEmail" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Alamat Email</label>
                    <input type="email" id="modalUserEmail" name="email" required class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:border-transparent sm:text-sm" placeholder="anda@example.com">
                </div>
                <div class="pt-4 flex flex-col sm:flex-row-reverse gap-3">
                    <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors shadow hover:shadow-md">
                        Kirim Pendaftaran
                    </button>
                    <button type="button" id="cancelEventRegistration" class="w-full sm:w-auto bg-gray-200 hover:bg-gray-300 dark:bg-slate-600 dark:hover:bg-slate-500 text-gray-800 dark:text-white px-6 py-2.5 rounded-lg text-sm font-medium transition-colors">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // --- Dark Mode Toggle (Contoh jika Anda ingin tombol manual) ---
        // ... (kode dark mode jika ada) ...

        // --- Menu Pengguna dan Hamburger (Global) ---
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        // ... (logika dropdown pengguna yang sudah ada) ...
        const hamburgerMenuButton = document.getElementById('hamburger-menu');
        let navbarUserDefault = document.getElementById('navbar-user-default'); // Untuk navbar default
        let navbarUserBeranda = document.getElementById('navbar-user'); // Untuk navbar Beranda
        // ... (logika hamburger yang sudah ada, pastikan memilih navbar yang benar) ...
         if (userMenuButton && userDropdown) {
            userMenuButton.addEventListener('click', function(event) { /* ... */ });
            document.addEventListener('click', function(event) { /* ... */ });
        }
        if (hamburgerMenuButton) {
            const targetNavId = hamburgerMenuButton.getAttribute('data-collapse-toggle'); // Ambil target dari atribut
            const targetNav = document.getElementById(targetNavId);
            if (targetNav) {
                hamburgerMenuButton.addEventListener('click', function() {
                    targetNav.classList.toggle('hidden');
                    targetNav.classList.toggle('md:flex'); // Pastikan responsif
                });
            }
        }


        // --- Logika Global untuk Modal Pendaftaran Event ---
        const eventRegistrationModal = document.getElementById('eventRegistrationModal');
        const eventRegistrationModalContent = document.getElementById('eventRegistrationModalContent');
        const closeEventRegistrationModalBtn = document.getElementById('closeEventRegistrationModal');
        const cancelEventRegistrationBtn = document.getElementById('cancelEventRegistration');
        const eventRegistrationForm = document.getElementById('eventRegistrationForm');
        const modalEventNameSpan = document.getElementById('modalEventName');
        const modalEventIdInput = document.getElementById('modalEventId');

        window.openEventRegistrationModal = function(eventName, eventId) { // Jadikan global
            if (eventRegistrationModal && modalEventNameSpan && modalEventIdInput) {
                modalEventNameSpan.textContent = eventName || 'Event Pilihan Anda';
                modalEventIdInput.value = eventId || '';
                eventRegistrationModal.classList.remove('hidden');
                eventRegistrationModal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            }
        }

        window.closeEventRegistrationModal = function() { // Jadikan global
            if (eventRegistrationModal) {
                eventRegistrationModal.classList.add('hidden');
                eventRegistrationModal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
                if (eventRegistrationForm) eventRegistrationForm.reset();
            }
        }

        if (closeEventRegistrationModalBtn) {
            closeEventRegistrationModalBtn.addEventListener('click', closeEventRegistrationModal);
        }
        if (cancelEventRegistrationBtn) {
            cancelEventRegistrationBtn.addEventListener('click', closeEventRegistrationModal);
        }
        if (eventRegistrationModal) {
            eventRegistrationModal.addEventListener('click', function(event) {
                if (event.target === eventRegistrationModal) closeEventRegistrationModal();
            });
        }
        if (eventRegistrationForm) {
            eventRegistrationForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const eventName = modalEventNameSpan.textContent;
                const userName = document.getElementById('modalUserName').value;
                alert(`Pendaftaran Anda untuk event "${eventName}" atas nama "${userName}" akan diproses (Simulasi Frontend)!`);
                closeEventRegistrationModal();
            });
        }
    </script>
    @stack('scripts')
</body>
</html>