{{-- resources/views/gallery.blade.php --}}
@extends('layouts.layout')

@section('title', 'Galeri Event - Festivalan')

{{-- Kosongkan section header jika tidak ada header khusus untuk halaman ini,
     sehingga akan menggunakan navbar default dari layout jika ada. --}}
@section('header')
@endsection

@section('content')
<main class="bg-gray-100 dark:bg-slate-900 flex-grow py-16 sm:py-20 px-4">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12 sm:mb-16">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-800 dark:text-white mb-4">Galeri Event Kampus</h1>
            <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300">Rekam Jejak Acara Universitas yang Telah Berlalu</p>
        </div>

        {{-- Galeri 1: Wisuda Angkatan 2023 --}}
        <section class="mb-12 sm:mb-16 bg-white dark:bg-slate-800 p-6 sm:p-8 rounded-2xl shadow-xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 dark:text-white mb-6">Wisuda Angkatan 2023</h2>
            <div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
                {{-- Pastikan path gambar di asset() sesuai dengan lokasi file Anda, misal 'images/namafile.jpg' atau langsung 'namafile.jpg' jika di public --}}
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('w1.jpg') }}" alt="Wisuda Angkatan 2023 - Foto 1"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('w2.jpg') }}" alt="Wisuda Angkatan 2023 - Foto 2"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('w3.jpg') }}" alt="Wisuda Angkatan 2023 - Foto 3"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('w4.jpg') }}" alt="Wisuda Angkatan 2023 - Foto 4"/>
                </div>
                {{-- Anda bisa menambahkan lebih banyak gambar di sini --}}
            </div>
        </section>

        {{-- Galeri 2: Integer X Upgrading 2025 --}}
        <section class="mb-12 sm:mb-16 bg-white dark:bg-slate-800 p-6 sm:p-8 rounded-2xl shadow-xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 dark:text-white mb-6">Integer X Upgrading 2025</h2>
            <div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('i1.jpg') }}" alt="Integer X Upgrading 2025 - Foto 1"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('i2.jpg') }}" alt="Integer X Upgrading 2025 - Foto 2"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('i3.jpg') }}" alt="Integer X Upgrading 2025 - Foto 3"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('i4.jpg') }}" alt="Integer X Upgrading 2025 - Foto 4"/>
                </div>
                {{-- Anda bisa menambahkan lebih banyak gambar di sini --}}
            </div>
        </section>

        {{-- Galeri 3: Takjil On The Road --}}
        <section class="mb-12 sm:mb-16 bg-white dark:bg-slate-800 p-6 sm:p-8 rounded-2xl shadow-xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 dark:text-white mb-6">Takjil On The Road</h2>
            <div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('t1.jpg') }}" alt="Takjil On The Road - Foto 1"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('t2.jpg') }}" alt="Takjil On The Road - Foto 2"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('t3.jpg') }}" alt="Takjil On The Road - Foto 3"/>
                </div>
                <div class="flex-none w-72 h-52 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">
                    <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300" src="{{ asset('t4.jpg') }}" alt="Takjil On The Road - Foto 4"/>
                </div>
                {{-- Anda bisa menambahkan lebih banyak gambar di sini --}}
            </div>
        </section>
        
        {{-- Anda bisa menambahkan section galeri lainnya di sini --}}

    </div>
</main>
@endsection

@pushOnce('styles')
<style>
    /* Style untuk Nav Link Default (jika digunakan di halaman ini atau di layout) */
    .nav-link-default {
        @apply block py-2 px-3 text-slate-700 dark:text-gray-300 rounded hover:bg-gray-100 dark:hover:bg-slate-700 md:hover:bg-transparent md:hover:text-sky-600 dark:md:hover:text-sky-400 md:p-0 transition-colors;
    }
    .nav-link-default.active {
        @apply text-sky-600 dark:text-sky-400 font-semibold;
    }

    /* Menyembunyikan scrollbar untuk galeri horizontal */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;  /* IE dan Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>
@endPushOnce

{{-- Jika ada JS spesifik untuk galeri (misal lightbox), tambahkan di sini --}}
{{-- @push('scripts')
<script>
    // Contoh: Script untuk lightbox atau interaksi galeri lainnya bisa ditambahkan di sini
    // document.querySelectorAll('.gallery-image').forEach(image => {
    //     image.addEventListener('click', function() {
    //         // Logika untuk membuka lightbox dengan this.src
    //         console.log('Image clicked:', this.src);
    //     });
    // });
</script>
@endpush --}}