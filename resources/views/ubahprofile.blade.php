@extends('layouts.layout')

@section('title', 'Ubah Profil - Festivalan')

@section('header')
@endsection

@section('content')
<main class="relative bg-gray-100 dark:bg-slate-900 py-16 sm:py-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <section class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl p-6 sm:p-8 animate-fade-in">
            <div class="profile-header flex flex-col sm:flex-row items-center pb-6 mb-8 border-b border-gray-200 dark:border-slate-700">
                <div class="profile-avatar relative mr-0 sm:mr-6 mb-4 sm:mb-0 group">
                    <img alt="Profile Picture" class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-4 border-sky-500 dark:border-sky-400 shadow-md" id="profile-avatar-display" src="{{ $user->avatar ? asset('storage/avatars/' . $user->avatar) : asset('images/default_avatar.png') }}"/>
                    <label for="upload-photo" class="upload-overlay absolute bottom-1 right-1 bg-sky-600 hover:bg-sky-700 w-8 h-8 rounded-full flex items-center justify-center cursor-pointer transition-colors shadow-md">
                        <i class="fas fa-camera text-white text-sm"></i>
                        <input accept="image/*" class="hidden" id="upload-photo" name="avatar" type="file"/>
                    </label>
                    <span class="tooltip hidden group-hover:block absolute -bottom-8 left-1/2 -translate-x-1/2 bg-slate-700 text-white text-xs rounded py-1 px-2 whitespace-nowrap">Unggah Foto</span>
                </div>
                <div class="profile-info text-center sm:text-left">
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 dark:text-white">Ubah Profil</h2>
                    <p class="text-gray-600 dark:text-gray-400">Perbarui informasi profil Anda.</p>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl">
                <h3 class="text-xl font-semibold text-slate-700 dark:text-white mb-6">Informasi Personal</h3>
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="space-y-6" id="profile-form" method="POST" action="{{ route('ubahprofile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                        <div class="form-group">
                            <label for="full-name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Lengkap</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="fas fa-user text-gray-400"></i></span>
                                <input class="pl-10 w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition @error('name') border-red-500 @enderror" id="full-name" name="name" type="text" value="{{ old('name', $user->name) }}" required/>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Username</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="fas fa-at text-gray-400"></i></span>
                                <input class="pl-10 w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition @error('username') border-red-500 @enderror" id="username" name="username" type="text" value="{{ old('username', $user->username) }}" required/>
                                @error('username')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="fas fa-envelope text-gray-400"></i></span>
                                <input class="pl-10 w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition @error('email') border-red-500 @enderror" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required/>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nomor Telepon</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="fas fa-phone text-gray-400"></i></span>
                                <input class="pl-10 w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition @error('phone_number') border-red-500 @enderror" id="phone" name="phone_number" type="tel" value="{{ old('phone_number', $user->phone_number) }}"/>
                                @error('phone_number')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        @if ($user->role === 'mahasiswa')
                            <div class="form-group">
                                <label for="npm" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">NPM</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="fas fa-id-card text-gray-400"></i></span>
                                    <input class="pl-10 w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition @error('npm') border-red-500 @enderror" id="npm" name="npm" type="text" value="{{ old('npm', $user->npm) }}" required/>
                                    @error('npm')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @elseif ($user->role === 'admin')
                            <div class="form-group">
                                <label for="nip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">NIP</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="fas fa-id-card text-gray-400"></i></span>
                                    <input class="pl-10 w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition @error('nip') border-red-500 @enderror" id="nip" name="nip" type="text" value="{{ old('nip', $user->nip) }}" required/>
                                    @error('nip')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bio</label>
                        <textarea class="w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 min-h-[100px] transition @error('bio') border-red-500 @enderror" id="bio" name="bio">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end gap-4 pt-4">
                        <a href="{{ route('Profile') }}" class="px-6 py-2.5 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-slate-600 transition transform hover:scale-105 font-medium">Batal</a>
                        <button class="px-6 py-2.5 bg-sky-600 hover:bg-sky-700 text-white rounded-lg font-medium transition transform hover:scale-105 shadow hover:shadow-md" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
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
    .tooltip {
        @apply invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-300;
    }
</style>
@endPushOnce

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const uploadPhotoInput = document.getElementById('upload-photo');
    const profileAvatarDisplay = document.getElementById('profile-avatar-display');
    if (uploadPhotoInput && profileAvatarDisplay) {
        uploadPhotoInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    profileAvatarDisplay.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endpush