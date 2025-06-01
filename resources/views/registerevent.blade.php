@extends('layouts.layout')

@section('title', 'Ajukan Event Kampus - Festivalan')

@section('content')
<main class="min-h-screen bg-gray-100 dark:bg-slate-900 py-12 sm:py-16 px-4">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-slate-800 shadow-xl rounded-xl overflow-hidden">
            <div class="px-6 py-8 sm:px-10"> {{-- Padding lebih besar --}}
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white text-center mb-4">Ajukan Event Kampus</h2>
                <p class="text-gray-600 dark:text-gray-400 text-center mb-10 text-lg">Sebagai mahasiswa, ajukan event Anda untuk ditinjau oleh tim Festivalan.</p>

                {{-- Untuk frontend saja, pesan sukses/error dari backend tidak akan muncul.
                     Bisa di-uncomment untuk tes styling jika perlu. --}}
                {{-- @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 dark:text-green-100 dark:border-green-600 dark:bg-green-700 p-4 rounded-md mb-6">
                        <p class="font-bold">Sukses!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 dark:text-red-100 dark:border-red-600 dark:bg-red-700 p-4 rounded-md mb-6">
                        <p class="font-bold">Oops! Ada beberapa masalah dengan input Anda:</p>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <form method="POST" action="#" enctype="multipart/form-data" class="space-y-6" onsubmit="alert('Pengajuan event diterima (simulasi frontend)! Tidak ada pemrosesan backend saat ini.'); return false;">
                    {{-- @csrf --}} {{-- CSRF untuk backend, bisa di-comment untuk frontend demo --}}

                    <div class="space-y-1.5"> {{-- Mengurangi spasi antara label dan input --}}
                        <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Event</label>
                        <input type="text" name="title" id="title"
                               class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm"
                               placeholder="Contoh: Gebyar Seni Budaya Tahunan" required>
                    </div>

                    <div class="space-y-1.5">
                        <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Deskripsi Event</label>
                        <textarea name="description" id="description" rows="5"
                                  class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm"
                                  placeholder="Jelaskan secara detail mengenai event Anda, termasuk tujuan, target peserta, dan rangkaian acara..." required></textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-6"> {{-- Menambah gap-y --}}
                        <div class="space-y-1.5">
                            <label for="schedule_start" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal & Waktu Mulai</label>
                            <input type="datetime-local" name="schedule_start" id="schedule_start"
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:[color-scheme:dark] focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm" required>
                        </div>
                        <div class="space-y-1.5">
                            <label for="schedule_end" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal & Waktu Selesai <span class="text-xs text-gray-500 dark:text-gray-400">(Opsional)</span></label>
                            <input type="datetime-local" name="schedule_end" id="schedule_end"
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white dark:[color-scheme:dark] focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Lokasi Event</label>
                        <input type="text" name="location" id="location"
                               class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm"
                               placeholder="Contoh: Aula Cut Nyak Dhien, Kampus Festivalan">
                    </div>
                    
                    <div class="space-y-1.5">
                        <label for="event_category" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Kategori Event</label>
                        <select name="event_category" id="event_category"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm">
                            <option value="">Pilih kategori...</option>
                            <option value="music">Musik & Konser</option>
                            <option value="workshop">Workshop & Pelatihan</option>
                            <option value="seminar">Seminar & Konferensi</option>
                            <option value="sports">Olahraga</option>
                            <option value="exhibition">Pameran Seni & Budaya</option>
                            <option value="community">Kegiatan Komunitas</option>
                            <option value="competition">Kompetisi</option>
                            <option value="charity">Amal & Sosial</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label for="image" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Poster Event <span class="text-xs text-gray-500 dark:text-gray-400">(Opsional)</span></label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full text-sm text-gray-500 dark:text-slate-400
                                      file:mr-4 file:py-2 file:px-4 
                                      file:rounded-lg file:border-0 
                                      file:text-sm file:font-semibold
                                      file:bg-indigo-50 dark:file:bg-indigo-600 file:text-indigo-700 dark:file:text-indigo-100
                                      hover:file:bg-indigo-100 dark:hover:file:bg-indigo-500 cursor-pointer">
                        <p class="mt-1 text-xs text-gray-500 dark:text-slate-400">Format: JPEG, PNG, GIF, WEBP. Maks: 2MB.</p>
                    </div>

                    <div class="pt-6 text-right"> {{-- Menggeser tombol ke kanan --}}
                        <button type="submit"
                                class="inline-flex justify-center py-3 px-8 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-slate-800 focus:ring-indigo-500 transition-colors">
                            Ajukan Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection