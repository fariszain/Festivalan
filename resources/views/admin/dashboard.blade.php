@extends('layouts.layout') {{-- Menggunakan layout utama --}}

@section('title', 'Admin Dashboard - Festivalan')

@section('content')
<div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8 mt-20"> {{-- Menambahkan margin top agar tidak tertutup navbar sticky --}}
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Admin Dashboard</h1>
    </header>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- Kartu Statistik Sederhana --}}
        <div class="bg-white dark:bg-slate-800 shadow-lg rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-blue-500 text-white rounded-full p-3">
                    <i class="fas fa-hourglass-half fa-lg"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Event Menunggu Persetujuan</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $pendingEventCount ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-800 shadow-lg rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-green-500 text-white rounded-full p-3">
                    <i class="fas fa-check-circle fa-lg"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Event Disetujui</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $approvedEventCount ?? 0 }}</p>
                </div>
            </div>
        </div>

        {{-- Kartu Navigasi --}}
        <div class="bg-white dark:bg-slate-800 shadow-lg rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Navigasi Cepat</h3>
            <ul>
                <li>
                    <a href="{{ route('admin.event.proposals') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                        <i class="fas fa-tasks mr-2"></i>Kelola Pengajuan Event
                    </a>
                </li>
                {{-- <li><a href="#" class="text-blue-600 dark:text-blue-400 hover:underline mt-2 block"><i class="fas fa-envelope mr-2"></i>Lihat Pesan Kontak (Segera)</a></li> --}}
                {{-- <li><a href="#" class="text-blue-600 dark:text-blue-400 hover:underline mt-2 block"><i class="fas fa-images mr-2"></i>Kelola Galeri (Segera)</a></li> --}}
            </ul>
        </div>
    </div>
</div>
@endsection