{{-- resources/views/ubahprofile.blade.php --}}
@extends('layouts.layout')

@section('content')
<main class="relative">
<div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]">
<div class="absolute inset-0 bg-[radial-gradient(circle_500px_at_50%_200px,#C9EBFF,transparent)]"></div>
</div>
<div class="container mx-auto p-4 sm:p-6 lg:p-8 py-16 max-w-4xl">
<section class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 mb-16 animate-fade-in">
<div class="profile-header flex flex-col sm:flex-row items-center pb-5 mb-8 border-b border-gray-200">
<div class="profile-avatar relative mr-0 sm:mr-8 mb-4 sm:mb-0 tooltip-parent">
<img alt="Profile Picture" class="w-[100px] h-[100px] rounded-full border-3 border-sky-900" id="profile-avatar" src="{{ asset('images/100') }}"/>
<div class="upload-overlay absolute bottom-0 right-0 bg-sky-900 w-8 h-8 rounded-full flex items-center justify-center cursor-pointer transition-colors hover:bg-sky-800">
<label class="cursor-pointer" for="upload-photo">
<i class="fas fa-camera text-white text-sm"></i>
</label>
<input accept="image/*" class="hidden" id="upload-photo" type="file"/>
</div>
<span class="tooltip absolute bottom-10 right-0 bg-gray-800 text-white text-xs rounded py-1 px-2">Unggah Foto</span>
</div>
<div class="profile-info text-center sm:text-left">
<h3 class="text-2xl font-bold text-sky-900">Ubah Profil</h3>
<p class="text-gray-600">Perbarui informasi profil dan alamat email Anda</p>
</div>
</div>
<div class="card-hover bg-white p-6 rounded-2xl shadow-lg mb-6">
<h3 class="text-xl font-bold text-sky-900 mb-4">Informasi Personal</h3>
<form class="space-y-6" id="profile-form">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
<div class="relative">
<i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" id="full-name" type="text" value="Faris Zain As-Shadiq"/>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Username</label>
<div class="relative">
<i class="fas fa-at absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg bg-gray-100 cursor-not-allowed" id="username" readonly="" type="text" value="Zeyn"/>
</div>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Email</label>
<div class="relative">
<i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg bg-gray-100 cursor-not-allowed" id="email" readonly="" type="email" value="FarisZain@gmail.com"/>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
<div class="relative">
<i class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" id="phone" type="tel" value="085142233633"/>
</div>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Bio</label>
<textarea class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 min-h-[120px] transition" id="bio">Project Manager dengan pengalaman 5 tahun dalam pengembangan aplikasi web dan mobile.</textarea>
</div>
<div class="flex justify-end gap-4">
<button class="px-6 py-3 border border-gray-300 rounded-lg bg-white text-gray-700 hover:bg-gray-100 transition transform hover:scale-105" type="button">Batal</button>
<button class="px-6 py-3 bg-sky-900 text-white rounded-lg hover:bg-sky-800 transition transform hover:scale-105" type="submit">Simpan Perubahan</button>
</div>
</form>
</div>
<div class="card-hover bg-white p-6 rounded-2xl shadow-lg">
<h3 class="text-xl font-bold text-sky-900 mb-4">Ubah Password</h3>
<p class="text-gray-600 mb-4">Kosongkan jika tidak ingin mengubah password</p>
<form class="space-y-6" id="password-form">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Password Saat Ini</label>
<div class="relative">
<i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" type="password"/>
<i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600 toggle-password"></i>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Password Baru</label>
<div class="relative">
<i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" type="password"/>
<i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600 toggle-password"></i>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
<div class="relative">
<i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
<input class="pl-10 border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900 transition" type="password"/>
<i class="fas fa-eye absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer text-gray-600 toggle-password"></i>
</div>
</div>
</div>
<div class="flex justify-end gap-4 mt-8">
<button class="px-6 py-3 border border-gray-300 rounded-lg bg-white text-gray-700 hover:bg-gray-100 transition transform hover:scale-105" type="button">Batal</button>
<button class="px-6 py-3 bg-sky-900 text-white rounded-lg hover:bg-sky-800 transition transform hover:scale-105" type="submit">Simpan Perubahan</button>
</div>
</form>
</div>
</section>
</div>
</main>
@endsection