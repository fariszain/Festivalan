{{-- resources/views/about.blade.php --}}
@extends('layouts.layout')

@section('title', 'Tentang Festivalan')

@section('header')
@endsection

@section('content')
<main class="relative flex-grow bg-gray-100 dark:bg-slate-900 py-16 sm:py-20">
    {{-- Background grid dan radial opsional, bisa dihilangkan untuk tema lebih simpel --}}
    {{-- <div class="absolute inset-0 -z-10 h-full w-full bg-white dark:bg-slate-800 bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]">
        <div class="absolute inset-0 bg-[radial-gradient(circle_500px_at_50%_200px,#C9EBFF,transparent)] dark:bg-[radial-gradient(circle_500px_at_50%_200px,rgba(201,235,255,0.1),transparent)]"></div>
    </div> --}}

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <section class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-6 sm:p-8 lg:p-10 animate-fade-in card-hover">
            <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white mb-6 text-center">Festivalan</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-8 text-center max-w-2xl mx-auto text-lg">
                Temukan pusat acara Universitas Syiah Kuala yang semarak melalui Festivalan, platform andalan Anda untuk semua hal tentang acara.
            </p>
            <div class="space-y-6 text-gray-700 dark:text-gray-400 leading-relaxed prose prose-lg dark:prose-invert max-w-none">
                <p>Festivalan berfungsi sebagai pusat informasi resmi tentang berbagai acara, kegiatan, dan kejadian menarik di Universitas Syiah Kuala. Dari seminar dan lokakarya hingga konferensi, perayaan budaya, dan acara olahraga, kami menyajikan informasi terkini, jadwal terperinci, dan sorotan dari setiap acara. Tim kami yang berdedikasi memastikan bahwa setiap detail akurat dan mudah dipahami, sehingga memudahkan Anda untuk tetap mendapatkan informasi.</p>
                <p>Baik Anda seorang mahasiswa, dosen, atau tamu, Festivalan membuat Anda tetap mengetahui berbagai acara yang telah lalu dan akan datang, yang menumbuhkan rasa kebersamaan dan kolaborasi di seluruh kampus. Jelajahi berbagai kegiatan inovatif, bagikan pengalaman, dan temukan inspirasi melalui platform kami, yang dirancang untuk mendorong partisipasi aktif dan memperkuat hubungan dalam komunitas akademis.</p>
                <p>Dengan fokus pada kesederhanaan dan aksesibilitas, Festivalan menawarkan pengalaman yang lancar, memungkinkan Anda menemukan jadwal dan detail acara dengan mudah tanpa harus menavigasi antarmuka yang rumit. Lebih dari sekadar sumber informasi, kami bertujuan untuk menyatukan komunitas Universitas Syiah Kuala dengan mempromosikan kreativitas, kebersamaan, dan keterlibatan melalui setiap acara yang kami tampilkan.</p>
            </div>
        </section>
    </div>
</main>
@endsection

@pushOnce('styles')
<style>
    .nav-link-default {
        @apply block py-2 px-3 text-slate-700 dark:text-gray-300 rounded hover:bg-gray-100 dark:hover:bg-slate-700 md:hover:bg-transparent md:hover:text-sky-600 dark:md:hover:text-sky-400 md:p-0 transition-colors;
    }
    .nav-link-default.active {
        @apply text-sky-600 dark:text-sky-400 font-semibold;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
    }
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
</style>
@endPushOnce