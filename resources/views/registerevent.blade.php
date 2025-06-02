@extends('layouts.layout')

@section('title', 'Ajukan Event Kampus - Festivalan')

@section('content')
<main class="min-h-screen bg-gray-100 dark:bg-slate-900 py-12 sm:py-16 px-4">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-slate-800 shadow-xl rounded-xl overflow-hidden">
            <div class="px-6 py-8 sm:px-10">
                <h2 class="text-3xl font-semibold text-gray-900 dark:text-white text-center mb-4">Ajukan Event Kampus</h2>
                <p class="text-gray-600 dark:text-gray-400 text-center mb-10 text-lg">Sebagai mahasiswa, ajukan event Anda untuk ditinjau oleh tim Festivalan.</p>

                {{-- Menampilkan pesan sukses --}}
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 dark:text-green-100 dark:border-green-600 dark:bg-green-700/30 p-4 rounded-md mb-6" role="alert">
                        <p class="font-bold">Sukses!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                {{-- Menampilkan error validasi umum (jika ada, selain per field) --}}
                @if ($errors->any() && !session('success')) {{-- Hanya tampilkan jika tidak ada pesan sukses --}}
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 dark:text-red-100 dark:border-red-600 dark:bg-red-700/30 p-4 rounded-md mb-6" role="alert">
                        <p class="font-bold">Oops! Ada beberapa masalah dengan input Anda:</p>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('event.register') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf 

                    <div class="space-y-1.5">
                        <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Event</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                               class="w-full px-4 py-2.5 rounded-lg border @error('title') border-red-500 @else border-gray-300 dark:border-slate-600 @enderror dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm"
                               placeholder="Contoh: Gebyar Seni Budaya Tahunan" required>
                        @error('title')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Deskripsi Event</label>
                        <textarea name="description" id="description" rows="5"
                                  class="w-full px-4 py-2.5 rounded-lg border @error('description') border-red-500 @else border-gray-300 dark:border-slate-600 @enderror dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm"
                                  placeholder="Jelaskan secara detail mengenai event Anda, termasuk tujuan, target peserta, dan rangkaian acara..." required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-6">
                        <div class="space-y-1.5">
                            <label for="schedule_start" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal & Waktu Mulai</label>
                            <input type="datetime-local" name="schedule_start" id="schedule_start" value="{{ old('schedule_start') }}"
                                   class="w-full px-4 py-2.5 rounded-lg border @error('schedule_start') border-red-500 @else border-gray-300 dark:border-slate-600 @enderror dark:bg-slate-700 dark:text-white dark:[color-scheme:dark] focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm" required>
                            @error('schedule_start')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-1.5">
                            <label for="schedule_end" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal & Waktu Selesai <span class="text-xs text-gray-500 dark:text-gray-400">(Opsional)</span></label>
                            <input type="datetime-local" name="schedule_end" id="schedule_end" value="{{ old('schedule_end') }}"
                                   class="w-full px-4 py-2.5 rounded-lg border @error('schedule_end') border-red-500 @else border-gray-300 dark:border-slate-600 @enderror dark:bg-slate-700 dark:text-white dark:[color-scheme:dark] focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm">
                            @error('schedule_end')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Lokasi Event</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}"
                               class="w-full px-4 py-2.5 rounded-lg border @error('location') border-red-500 @else border-gray-300 dark:border-slate-600 @enderror dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm"
                               placeholder="Contoh: Aula Cut Nyak Dhien, Kampus Festivalan">
                        @error('location')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="space-y-1.5">
                        <label for="event_category" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Kategori Event</label>
                        <select name="event_category" id="event_category"
                                class="w-full px-4 py-2.5 rounded-lg border @error('event_category') border-red-500 @else border-gray-300 dark:border-slate-600 @enderror dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-indigo-500 dark:focus:border-indigo-400 sm:text-sm">
                            <option value="">Pilih kategori...</option>
                            <option value="Musik & Konser" {{ old('event_category') == 'Musik & Konser' ? 'selected' : '' }}>Musik & Konser</option>
                            <option value="Workshop & Pelatihan" {{ old('event_category') == 'Workshop & Pelatihan' ? 'selected' : '' }}>Workshop & Pelatihan</option>
                            <option value="Seminar & Konferensi" {{ old('event_category') == 'Seminar & Konferensi' ? 'selected' : '' }}>Seminar & Konferensi</option>
                            <option value="Olahraga" {{ old('event_category') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                            <option value="Pameran Seni & Budaya" {{ old('event_category') == 'Pameran Seni & Budaya' ? 'selected' : '' }}>Pameran Seni & Budaya</option>
                            <option value="Kegiatan Komunitas" {{ old('event_category') == 'Kegiatan Komunitas' ? 'selected' : '' }}>Kegiatan Komunitas</option>
                            <option value="Kompetisi" {{ old('event_category') == 'Kompetisi' ? 'selected' : '' }}>Kompetisi</option>
                            <option value="Amal & Sosial" {{ old('event_category') == 'Amal & Sosial' ? 'selected' : '' }}>Amal & Sosial</option>
                            <option value="Lainnya" {{ old('event_category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('event_category')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label for="image" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Poster Event <span class="text-xs text-gray-500 dark:text-gray-400">(Opsional)</span></label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full text-sm @error('image') text-red-500 @else text-gray-500 dark:text-slate-400 @enderror
                                      file:mr-4 file:py-2 file:px-4 
                                      file:rounded-lg file:border-0 
                                      file:text-sm file:font-semibold
                                      file:bg-indigo-50 dark:file:bg-indigo-600/80 file:text-indigo-700 dark:file:text-indigo-100
                                      hover:file:bg-indigo-100 dark:hover:file:bg-indigo-500/80 cursor-pointer
                                      @error('image') border border-red-500 rounded-lg p-2 @else border border-gray-300 dark:border-slate-600 rounded-lg p-1.5 @enderror">
                        <p class="mt-1 text-xs text-gray-500 dark:text-slate-400">Format: JPEG, PNG, GIF, WEBP. Maks: 2MB.</p>
                        @error('image')
                            <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-6 text-right">
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