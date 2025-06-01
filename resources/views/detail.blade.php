@extends('layouts.layout')

@php
    // Data dummy jika $event tidak dikirim dari controller (untuk demo frontend murni halaman ini)
    // Ini akan digunakan jika halaman ini diakses tanpa $event dari controller.
    $eventData = $event ?? [
        'title' => 'Festival Coding Tahunan 2025 (Dummy)',
        'image_url' => asset('images/default_event_image.png'),
        'category' => 'Webinar & Workshop (Dummy)',
        'date_simple' => '15 - 17 Agustus 2025 (Dummy)',
        'tagline' => 'Sebuah festival tiga hari untuk developer, desainer, dan antusias teknologi (Dummy).',
        'schedule_full' => '15 Agt (09:00-17:00), 16 Agt (10:00-18:00), 17 Agt (10:00-15:00) (Dummy)',
        'location' => 'Gedung Konvensi Festivalan & Online (Hybrid) (Dummy)',
        'organizer' => 'Komunitas Developer Festivalan (Dummy)',
        'description' => '<p>Deskripsi lengkap dummy untuk Festival Coding Tahunan 2025...</p>',
        'id_slug' => 'festival-coding-2025-dummy' // ID atau slug unik untuk event ini
    ];
@endphp

@section('title', $eventData['title'] . ' - Festivalan')

@section('content')
<div class="bg-gray-100 dark:bg-slate-900 min-h-screen py-12 sm:py-16 px-4">
    <div class="container mx-auto max-w-5xl">

        {{-- Tombol Kembali --}}
        <div class="mb-8">
            <a href="{{ route('Beranda') }}" class="inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-500 transition-colors group">
                <svg class="w-5 h-5 mr-1.5 transform transition-transform duration-150 group-hover:-translate-x-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                Kembali ke Beranda
            </a>
        </div>

        <article class="bg-white dark:bg-slate-800 shadow-xl rounded-xl overflow-hidden">
            <div class="lg:flex">
                {{-- Kolom Kiri: Gambar Event --}}
                <div class="lg:w-2/5 xl:w-1/3 bg-gray-200 dark:bg-slate-700">
                    <img src="{{ $eventData['image_url'] }}" alt="Poster {{ $eventData['title'] }}" class="w-full h-80 lg:h-full object-cover">
                </div>

                {{-- Kolom Kanan: Informasi Event --}}
                <div class="lg:w-3/5 xl:w-2/3 p-6 sm:p-8 md:p-10 flex flex-col">
                    <div>
                        <span class="bg-blue-100 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300 text-xs font-semibold px-3 py-1 rounded-full mb-3 inline-block">{{ $eventData['category'] }}</span>
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-3 leading-tight">{{ $eventData['title'] }}</h1>
                        <div class="flex items-center text-gray-600 dark:text-gray-400 text-sm mb-5">
                            <i class="fas fa-calendar-alt mr-2 text-blue-500 dark:text-blue-400"></i>
                            <span>{{ $eventData['date_simple'] }}</span>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 mb-6 leading-relaxed text-md">{{ $eventData['tagline'] }}</p>
                    </div>

                    <div class="mt-auto space-y-4 sm:space-y-0 sm:flex sm:items-center sm:gap-4 mb-8">
                        {{-- TOMBOL "DAFTAR EVENT INI" DIPERBARUI DI SINI --}}
                        <button type="button" class="register-event-trigger-detail w-full sm:w-auto flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-150 ease-in-out text-base shadow-md hover:shadow-lg transform hover:-translate-y-0.5"
                                data-event-name="{{ $eventData['title'] }}"
                                data-event-id="{{ $eventData['id_slug'] }}">
                            <i class="fas fa-edit mr-2"></i> Daftar Event Ini
                        </button>
                    </div>

                    <div class="space-y-3 text-sm border-t border-gray-200 dark:border-slate-700 pt-6">
                        <div class="flex">
                            <strong class="font-semibold text-gray-800 dark:text-gray-200 w-32 shrink-0">Jadwal Lengkap:</strong>
                            <span class="text-gray-600 dark:text-gray-400">{{ $eventData['schedule_full'] }}</span>
                        </div>
                        <div class="flex">
                            <strong class="font-semibold text-gray-800 dark:text-gray-200 w-32 shrink-0">Lokasi:</strong>
                            <span class="text-gray-600 dark:text-gray-400">{{ $eventData['location'] }}</span>
                        </div>
                        <div class="flex">
                            <strong class="font-semibold text-gray-800 dark:text-gray-200 w-32 shrink-0">Penyelenggara:</strong>
                            <span class="text-gray-600 dark:text-gray-400">{{ $eventData['organizer'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        {{-- Bagian Tab untuk Deskripsi Tambahan --}}
        <div class="mt-10 bg-white dark:bg-slate-800 shadow-xl rounded-xl overflow-hidden">
            <div class="border-b border-gray-200 dark:border-slate-700">
                <nav class="-mb-px flex space-x-6 sm:space-x-8 px-6 sm:px-8" aria-label="Tabs" id="eventTabs">
                    <a href="#deskripsi" class="event-tab active-tab whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm border-blue-500 dark:border-blue-400 text-blue-600 dark:text-blue-300" data-tab="deskripsi">
                        Deskripsi Lengkap
                    </a>
                    <a href="#jadwal-rinci" class="event-tab whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-slate-600" data-tab="jadwal-rinci">
                        Jadwal Rinci
                    </a>
                     <a href="#galeri-foto" class="event-tab whitespace-nowrap py-4 px-1 border-b-2 font-semibold text-sm border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-slate-600" data-tab="galeri-foto">
                        Galeri
                    </a>
                </nav>
            </div>
            <div class="p-6 sm:p-8">
                <div id="deskripsiContent" class="tab-content prose prose-sm sm:prose-base lg:prose-lg dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed">
                    {!! $eventData['description'] !!}
                </div>
                <div id="jadwal-rinciContent" class="tab-content hidden prose prose-sm sm:prose-base lg:prose-lg dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed">
                    <h4>Jumat, 15 Agustus 2025 (Dummy)</h4>
                    <ul>
                        <li>08:00 - 09:00: Registrasi Ulang & Sarapan Pagi</li>
                        <li>09:00 - 09:30: Upacara Pembukaan</li>
                        <li>09:30 - 11:00: Keynote 1: "Topik Menarik"</li>
                    </ul>
                    {{-- ... (jadwal dummy lainnya) ... --}}
                </div>
                <div id="galeri-fotoContent" class="tab-content hidden">
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Galeri foto dummy.</p>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <div class="aspect-w-1 aspect-h-1"><img src="https://source.unsplash.com/random/400x300?event&sig=21" alt="Foto Galeri 1" class="w-full h-full object-cover rounded-lg shadow-md"></div>
                        <div class="aspect-w-1 aspect-h-1"><img src="https://source.unsplash.com/random/400x300?conference&sig=22" alt="Foto Galeri 2" class="w-full h-full object-cover rounded-lg shadow-md"></div>
                        <div class="aspect-w-1 aspect-h-1"><img src="https://source.unsplash.com/random/400x300?workshop&sig=23" alt="Foto Galeri 3" class="w-full h-full object-cover rounded-lg shadow-md"></div>
                        <div class="aspect-w-1 aspect-h-1"><img src="https://source.unsplash.com/random/400x300?community&sig=24" alt="Foto Galeri 4" class="w-full h-full object-cover rounded-lg shadow-md"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
{{-- Tidak ada style tambahan spesifik untuk halaman ini jika semua sudah di layout --}}
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- Logika Tab ---
    const tabs = document.querySelectorAll('.event-tab');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function (event) {
            event.preventDefault();

            tabs.forEach(t => {
                t.classList.remove('border-blue-500', 'dark:border-blue-400', 'text-blue-600', 'dark:text-blue-300');
                t.classList.add('border-transparent', 'text-gray-500', 'dark:text-gray-400', 'hover:text-gray-700', 'dark:hover:text-gray-200', 'hover:border-gray-300', 'dark:hover:border-slate-600');
            });
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            this.classList.add('border-blue-500', 'dark:border-blue-400', 'text-blue-600', 'dark:text-blue-300');
            this.classList.remove('border-transparent', 'text-gray-500', 'dark:text-gray-400', 'hover:text-gray-700', 'dark:hover:text-gray-200', 'hover:border-gray-300', 'dark:hover:border-slate-600');
            
            const targetTabContentId = this.getAttribute('data-tab') + 'Content';
            const targetTabContent = document.getElementById(targetTabContentId);
            if (targetTabContent) {
                targetTabContent.classList.remove('hidden');
            }
            localStorage.setItem('activeEventDetailTab', this.getAttribute('data-tab'));
        });
    });

    let activeTabId = window.location.hash.substring(1) || localStorage.getItem('activeEventDetailTab') || 'deskripsi';
    const initialActiveTab = document.querySelector(`.event-tab[data-tab="${activeTabId}"]`);
    
    if (initialActiveTab) {
        initialActiveTab.click();
    } else {
        const fallbackTab = document.querySelector('.event-tab[data-tab="deskripsi"]');
        if (fallbackTab) {
            fallbackTab.click();
        }
    }

    // --- Event Listener untuk Tombol Pemicu Modal Registrasi Event di Halaman Detail ---
    // Menggunakan class yang lebih spesifik untuk menghindari konflik jika ada class '.register-event-trigger' lain di masa depan
    const detailPageRegisterButton = document.querySelector('.register-event-trigger-detail'); 
    if (detailPageRegisterButton) {
        detailPageRegisterButton.addEventListener('click', function() {
            const eventName = this.dataset.eventName;
            const eventId = this.dataset.eventId; 
            if (typeof window.openEventRegistrationModal === 'function') {
                window.openEventRegistrationModal(eventName, eventId);
            } else {
                console.error('Fungsi openEventRegistrationModal tidak ditemukan. Pastikan ada di layout.');
            }
        });
    }
});
</script>
@endpush