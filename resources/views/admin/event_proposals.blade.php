@extends('layouts.layout')

@section('title', 'Pengajuan Event - Admin Festivalan')

@section('content')
<div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8 mt-20">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Kelola Pengajuan Event</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 dark:text-blue-400 hover:underline">&larr; Kembali ke Dashboard</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
            <p class="font-bold">Error!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-lg overflow-hidden">
        @if($pendingEvents->isEmpty())
            <p class="p-6 text-center text-gray-500 dark:text-gray-400">Tidak ada pengajuan event yang menunggu persetujuan saat ini.</p>
        @else
            <div class="divide-y divide-gray-200 dark:divide-slate-700">
                @foreach ($pendingEvents as $event)
                    <div class="p-4 sm:p-6 hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between">
                            {{-- Kolom Kiri: Gambar dan Info Dasar --}}
                            <div class="flex-shrink-0 md:w-1/4 mb-4 md:mb-0 md:mr-6">
                                @if($event->image_path)
                                    <img src="{{ asset('storage/' . $event->image_path) }}" alt="Poster {{ $event->title }}" class="w-full h-auto object-cover rounded-md shadow-md">
                                @else
                                    <div class="w-full h-40 bg-gray-200 dark:bg-slate-700 rounded-md flex items-center justify-center text-gray-400 dark:text-slate-500">
                                        <i class="fas fa-image fa-3x"></i>
                                    </div>
                                @endif
                            </div>

                            {{-- Kolom Tengah: Detail Event --}}
                            <div class="flex-grow mb-4 md:mb-0">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                    {{ $event->title }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    Diajukan oleh: <span class="font-medium">{{ $event->user->name ?? 'N/A' }}</span> ({{ $event->user->email ?? 'N/A' }})
                                </p>
                                <p class="text-xs text-gray-400 dark:text-slate-500">
                                    Pada: {{ $event->created_at->isoFormat('D MMMM YYYY, HH:mm') }}
                                </p>
                                
                                <div class="mt-3 text-sm space-y-1 text-gray-700 dark:text-gray-300">
                                    <p><strong class="font-medium text-gray-800 dark:text-gray-100">Jadwal:</strong> 
                                        @if($event->schedule_start)
                                            {{ \Carbon\Carbon::parse($event->schedule_start)->isoFormat('dddd, D MMMM YYYY, HH:mm') }}
                                            @if($event->schedule_end)
                                                - {{ \Carbon\Carbon::parse($event->schedule_end)->isoFormat('dddd, D MMMM YYYY, HH:mm') }}
                                            @endif
                                        @else
                                            Belum ditentukan
                                        @endif
                                    </p>
                                    @if($event->location)
                                        <p><strong class="font-medium text-gray-800 dark:text-gray-100">Lokasi:</strong> {{ $event->location }}</p>
                                    @endif
                                    @if($event->event_category)
                                        <p><strong class="font-medium text-gray-800 dark:text-gray-100">Kategori:</strong> {{ $event->event_category }}</p>
                                    @endif
                                </div>

                                <div class="mt-3 prose prose-sm dark:prose-invert max-w-none line-clamp-4">
                                    {!! $event->description !!} {{-- Menggunakan {!! !!} jika deskripsi bisa mengandung HTML dasar, pastikan disanitasi saat input jika perlu --}}
                                </div>
                                {{-- Tombol untuk expand deskripsi jika terlalu panjang --}}
                                @if(strlen(strip_tags($event->description)) > 200)
                                    <button type="button" onclick="this.previousElementSibling.classList.toggle('line-clamp-4')" class="text-xs text-blue-500 hover:underline mt-1">Baca selengkapnya / Lebih sedikit</button>
                                @endif
                            </div>

                            {{-- Kolom Kanan: Tombol Aksi --}}
                            <div class="flex-shrink-0 md:ml-6 flex flex-col space-y-2 items-stretch md:items-end">
                                <form action="{{ route('admin.event.approve', $event->id) }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-slate-900" onclick="return confirm('Anda yakin ingin menyetujui event ini: \'{{ Str::limit($event->title, 30) }}\'?')">
                                        <i class="fas fa-check mr-2"></i>Setujui
                                    </button>
                                </form>
                                <form action="{{ route('admin.event.reject', $event->id) }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-slate-900" onclick="return confirm('Anda yakin ingin menolak event ini: \'{{ Str::limit($event->title, 30) }}\'?')">
                                        <i class="fas fa-times mr-2"></i>Tolak
                                    </button>
                                </form>
                                {{-- Jika Anda punya halaman detail event untuk admin --}}
                                {{-- <a href="#" class="w-full mt-2 inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-slate-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-slate-700 hover:bg-gray-50 dark:hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-900">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail Lengkap
                                </a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($pendingEvents->hasPages())
            <div class="p-4 bg-gray-50 dark:bg-slate-700/50 border-t border-gray-200 dark:border-slate-600">
                {{ $pendingEvents->links() }}
            </div>
            @endif
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Jika Anda menggunakan Tailwind Typography plugin, prose class akan otomatis styling deskripsi */
    /* Untuk line-clamp, pastikan plugin @tailwindcss/line-clamp terinstal atau gunakan cara manual */
    .line-clamp-3 { /* Atur jumlah baris yang ingin ditampilkan sebelum "Baca selengkapnya" */
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3; /* Ubah angka ini jika ingin lebih banyak/sedikit baris */
    }
    .line-clamp-4 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 4;
    }
    /* Jika ingin menghilangkan line-clamp saat di-toggle: */
    /* .line-clamp-none {
        -webkit-line-clamp: unset !important;
    } */
    /* Namun, toggle dengan menambah/menghapus kelas lebih mudah daripada 'unset' */
</style>
@endpush