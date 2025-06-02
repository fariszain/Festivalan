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
                    <img alt="Profile Picture" class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-4 border-sky-500 dark:border-sky-400 shadow-md" id="profile-avatar" src="{{ $user->avatar ? asset('storage/avatars/' . $user->avatar) : asset('images/default_avatar.png') }}"/>
                </div>
                <div class="profile-info text-center sm:text-left">
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 dark:text-white">Profil Saya</h2>
                    <p class="text-gray-600 dark:text-gray-400">Informasi pribadi Anda.</p>
                </div>
                <a href="{{ route('ubahprofile') }}" class="ml-auto mt-4 sm:mt-0 bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out text-sm flex items-center">
                    <i class="fas fa-edit mr-2"></i>Ubah Profil
                </a>
            </div>

            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl">
                <h3 class="text-xl font-semibold text-slate-700 dark:text-white mb-6">Informasi Personal</h3>
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="space-y-5">
                    @php
                        $userData = [
                            'Nama Lengkap' => $user->name,
                            'Username' => $user->username,
                            'Email' => $user->email,
                            'Nomor Telepon' => $user->phone_number,
                            'Role' => ucfirst($user->role),
                            $user->role === 'mahasiswa' ? 'NPM' : 'NIP' => $user->role === 'mahasiswa' ? $user->npm : $user->nip,
                            'Bio' => $user->bio,
                        ];
                        $userIcons = [
                            'Nama Lengkap' => 'fas fa-user',
                            'Username' => 'fas fa-at',
                            'Email' => 'fas fa-envelope',
                            'Nomor Telepon' => 'fas fa-phone',
                            'Role' => 'fas fa-user-tag',
                            'NPM' => 'fas fa-id-card',
                            'NIP' => 'fas fa-id-card',
                        ];
                    @endphp

                    @foreach($userData as $label => $value)
                        @if ($value) <!-- Hanya tampilkan jika ada nilai -->
                            @if ($label === 'Bio')
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">{{ $label }}</label>
                                    <p class="text-gray-700 dark:text-gray-200 p-3 bg-gray-50 dark:bg-slate-700/50 rounded-md min-h-[80px] whitespace-pre-line">{{ $value }}</p>
                                </div>
                            @else
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 items-center">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 sm:col-span-1">{{ $label }}</label>
                                    <div class="relative flex items-center sm:col-span-2">
                                        @if (isset($userIcons[$label]))
                                            <i class="{{ $userIcons[$label] }} absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                                            <span class="pl-10 text-gray-700 dark:text-gray-200 py-2 px-3 w-full bg-gray-50 dark:bg-slate-700/50 rounded-md">{{ $value }}</span>
                                        @else
                                            <span class="text-gray-700 dark:text-gray-200 py-2 px-3 w-full bg-gray-50 dark:bg-slate-700/50 rounded-md">{{ $value }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
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