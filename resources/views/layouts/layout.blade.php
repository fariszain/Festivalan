<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Festivalan')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sky-900': '#0c4a6e',
                        'slate-900': '#1e293b',
                    },
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
        /* Shared styles from your original files */
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
        /* Specific styles for dropdowns from Beranda.blade.php and other pages */
        #user-dropdown * {
            color: #1a365d;
        }
        #logout {
            color: #e53e3e;
        }
        /* Styles from contact.blade.php */
        #contact-success { display: none; }
        /* Styles from gallery.blade.php */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        /* Styles for the transparent header (if needed globally, or managed by main.js) */
        .navbar.bg-transparent .text-white {
            color: white; /* Ensure text is white for transparent header */
        }
        .navbar.bg-transparent .md\:hover\:text-blue-200:hover {
            color: #bfdbfe; /* Tailwind's blue-200 */
        }
    </style>
</head>
<body class="bg-white flex flex-col min-h-screen">

    @yield('header')
    @if (!request()->routeIs('Beranda')) {{-- Hanya sertakan navbar default jika bukan halaman Beranda --}}
        @include('navbar')
    @endif

    @yield('content')

    <footer class="bg-gray-800 text-white text-center p-4 mt-auto">
        <p>© 2025 Festivalan. All rights reserved.</p>
    </footer>

    <script src="{{ asset('main.js') }}"></script>
</body>
</html>