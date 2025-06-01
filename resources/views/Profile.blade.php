{{-- resources/views/Profile.blade.php --}}
@extends('layouts.layout')

@section('title', 'Profil Saya - Festivalan')

@section('header')
@endsection

@section('content')
<main class="relative bg-gray-100 dark:bg-slate-900 py-16 sm:py-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <section class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-6 sm:p-8 animate-fade-in">
            <div class="profile-header flex flex-col sm:flex-row items-center pb-6 mb-8 border-b border-gray-200 dark:border-slate-700">
                <div class="profile-avatar relative mr-0 sm:mr-6 mb-4 sm:mb-0">
                    {{-- Ganti dengan avatar pengguna dinamis jika ada, contoh: asset(Auth::user()->avatar_path ?? 'images/default_avatar.png') --}}
                    <img alt="Profile Picture" class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-4 border-sky-500 dark:border-sky-400 shadow-md" id="profile-avatar" src="{{ asset('images/default_avatar.png') }}"/>
                </div>
                <div class="profile-info text-center sm:text-left">
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 dark:text-white">Profil Saya</h2>
                    <p class="text-gray-600 dark:text-gray-400">Informasi pribadi Anda.</p>
                </div>
                 <a href="{{ route('ubahprofile') }}" class="ml-auto mt-4 sm:mt-0 bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out text-sm flex items-center">
                    <i class="fas fa-edit mr-2"></i>Ubah Profil
                </a>
            </div>

            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl"> {/* Removed card-hover and shadow-lg as parent has it */}
                <h3 class="text-xl font-semibold text-slate-700 dark:text-white mb-6">Informasi Personal</h3>
                <div class="space-y-5">
                    {{-- Data dummy, ganti dengan data dinamis --}}
                    @php
                        $userData = [
                            'Nama Lengkap' => 'Faris Zain As-Shadiq',
                            'Username' => 'Zeyn',
                            'Email' => 'FarisZain@gmail.com',
                            'Nomor Telepon' => '085142233633',
                            'Bio' => 'Project Manager dengan pengalaman 5 tahun dalam pengembangan aplikasi web dan mobile.'
                        ];
                        $userIcons = [
                            'Nama Lengkap' => 'fas fa-user',
                            'Username' => 'fas fa-at',
                            'Email' => 'fas fa-envelope',
                            'Nomor Telepon' => 'fas fa-phone'
                        ];
                    @endphp

                    @foreach($userData as $label => $value)
                        @if($label !== 'Bio')
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 items-center">
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 sm:col-span-1">{{ $label }}</label>
                            <div class="relative flex items-center sm:col-span-2">
                                @if(isset($userIcons[$label]))
                                <i class="{{ $userIcons[$label] }} absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                                <span class="pl-10 text-gray-700 dark:text-gray-200 py-2 px-3 w-full bg-gray-50 dark:bg-slate-700/50 rounded-md">{{ $value }}</span>
                                @else
                                <span class="text-gray-700 dark:text-gray-200 py-2 px-3 w-full bg-gray-50 dark:bg-slate-700/50 rounded-md">{{ $value }}</span>
                                @endif
                            </div>
                        </div>
                        @endif
                    @endforeach
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Bio</label>
                        <p class="text-gray-700 dark:text-gray-200 p-3 bg-gray-50 dark:bg-slate-700/50 rounded-md min-h-[80px] whitespace-pre-line">{{ $userData['Bio'] }}</p>
                    </div>
                </div>
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
</style>
@endPushOnce