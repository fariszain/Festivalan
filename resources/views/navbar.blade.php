<header class="sticky top-0 z-50">
    {{-- Standard navbar for non-Beranda pages --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('Beranda') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img alt="Logo" class="h-8" src="{{ asset('Gambar_WhatsApp_2025-04-14_pukul_19.16.03_c2ef5862-removebg-preview.png') }}"/>
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Festivalan</span>
            </a>

            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @auth
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img id="dropdown-avatar" class="w-8 h-8 rounded-full" src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('images/default_avatar.png') }}" alt="user photo">
                    </button>
                    <div id="user-dropdown" class="hidden absolute top-full right-0 md:top-auto md:mt-2 w-48 bg-white rounded-lg shadow-lg dark:bg-gray-700 z-50 ring-1 ring-black ring-opacity-5">
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-600">
                            <span class="block text-sm text-gray-900 font-medium dark:text-white">{{ Auth::user()->name }}</span>
                            <span class="block text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-1" aria-labelledby="user-menu-button">
                            <li><a href="{{ route('Profile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a></li>
                            <li><a href="{{ route('ubahprofile')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Ubah Profile</a></li>
                            @if (Auth::user()->role === 'mahasiswa') {{-- Example conditional link --}}
                                <li><a href="{{ route('registerevent') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Ajukan Event</a></li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="block w-full text-left">
                                    @csrf
                                    <button type="submit" id="logout-button" class="block w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-600 dark:hover:text-red-300">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('auth') }}" class="text-sm text-gray-700 dark:text-white hover:text-blue-700 dark:hover:text-blue-500 px-3 py-2">Login</a>
                    @if (Route::has('register')) {{-- Assuming you have a 'register' route separate from 'auth' if it's a combined page --}}
                        <a href="{{ route('register') }}" class="text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</a>
                    @else {{-- Fallback if only 'auth' route is used for both login/register page --}}
                         <a href="{{ route('auth') }}" class="text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</a>
                    @endif
                @endauth

                <button id="hamburger-menu" data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false" aria-label="Toggle menu">
                    <span class="sr-only">Open main menu</span>
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('Beranda')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ request()->routeIs('Beranda') ? 'md:text-blue-700 dark:md:text-blue-500' : '' }}" aria-current="{{ request()->routeIs('Beranda') ? 'page' : '' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ request()->routeIs('about') ? 'md:text-blue-700 dark:md:text-blue-500' : '' }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('services')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ request()->routeIs('services') ? 'md:text-blue-700 dark:md:text-blue-500' : '' }}">Services</a>
                    </li>
                    <li>
                        <a href="{{ route('gallery')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ request()->routeIs('gallery') ? 'md:text-blue-700 dark:md:text-blue-500' : '' }}">Gallery</a>
                    </li>
                    <li>
                        <a href="{{ route('contact')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ request()->routeIs('contact') ? 'md:text-blue-700 dark:md:text-blue-500' : '' }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>