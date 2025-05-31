{{-- resources/views/Profile.blade.php --}}
@extends('layouts.layout')

@section('content')
<main class="relative">
<div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]">
<div class="absolute inset-0 bg-[radial-gradient(circle_500px_at_50%_200px,#C9EBFF,transparent)]"></div>
</div>
<div class="container mx-auto p-4 sm:p-6 lg:p-8 py-16 max-w-4xl">
<section class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 mb-16 animate-fade-in">
<div class="profile-header flex flex-col sm:flex-row items-center pb-5 mb-8 border-b border-gray-200 dark:border-gray-600">
<div class="profile-avatar relative mr-0 sm:mr-8 mb-4 sm:mb-0">
<img alt="Profile Picture" class="w-[100px] h-[100px] rounded-full border-3 border-sky-900 dark:border-sky-300" id="profile-avatar" src="{{ asset('images/100') }}"/>
</div>
<div class="profile-info text-center sm:text-left">
<h3 class="text-2xl font-bold text-gray-900">Profil Saya</h3>
<p class="text-gray-600">Informasi pribadi Anda</p>
</div>
</div>
<div class="card-hover bg-white p-6 rounded-2xl shadow-lg mb-6">
<h3 class="text-xl font-bold text-sky-900 mb-4">Informasi Personal</h3>
<div class="space-y-6">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
<div class="relative flex items-center">
<i class="fas fa-user absolute left-3 text-gray-400 dark:text-gray-500"></i>
<span class="pl-10 text-gray-700">Faris Zain As-Shadiq</span>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Username</label>
<div class="relative flex items-center">
<i class="fas fa-at absolute left-3 text-gray-400 dark:text-gray-500"></i>
<span class="pl-10 text-gray-900">Zeyn</span>
</div>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Email</label>
<div class="relative flex items-center">
<i class="fas fa-envelope absolute left-3 text-gray-400 dark:text-gray-500"></i>
<span class="pl-10 text-gray-900">FarisZain@gmail.com</span>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
<div class="relative flex items-center">
<i class="fas fa-phone absolute left-3 text-gray-400 dark:text-gray-500"></i>
<span class="pl-10 text-gray-900">085142233633</span>
</div>
</div>
</div>
<div class="form-group">
<label class="block text-gray-700 font-medium mb-2">Bio</label>
<div class="text-gray-900">Project Manager dengan pengalaman 5 tahun dalam pengembangan aplikasi web dan mobile.</div>
</div>
</div>
</div>
</section>
</div>
</main>
@endsection