{{-- resources/views/register.blade.php --}}
@extends('layouts.layout')

@section('content')
<main class="relative">
<div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]">
<div class="absolute inset-0 bg-[radial-gradient(circle_500px_at_50%_200px,#C9EBFF,transparent)]"></div>
</div>
<div class="container mx-auto p-4 py-16">
<section class="mb-16" id="event-list">
<h2 class="text-3xl font-bold text-center mb-8 text-slate-900">Daftar Event</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="events">
</div>
</section>
<section class="mb-16 hidden" id="register-form">
<h2 class="text-3xl font-bold text-center mb-8 text-slate-900">Form Pendaftaran</h2>
<div class="max-w-lg mx-auto bg-white p-6 rounded-2xl shadow-lg">
<form id="registration-form">
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="name">Nama:</label>
<input class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="name" required="" type="text"/>
</div>
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="email">Email:</label>
<input class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="email" required="" type="email"/>
</div>
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="phone">Nomor Telepon:</label>
<input class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="phone" required="" type="tel"/>
</div>
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="event-select">Pilih Event:</label>
<select class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="event-select" required="">
</select>
</div>
<button class="bg-sky-900 text-white px-6 py-3 rounded-lg w-full hover:bg-sky-800 transition" type="submit">Daftar</button>
</form>
</div>
</section>
<section class="mb-16" id="check-status">
<h2 class="text-3xl font-bold text-center mb-8 text-slate-900">Cek Status Pendaftaran</h2>
<div class="max-w-lg mx-auto bg-white p-6 rounded-2xl shadow-lg">
<form id="status-form">
<div class="mb-4">
<label class="block text-gray-700 font-medium" for="status-email">Email:</label>
<input class="border p-3 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-900" id="status-email" required="" type="email"/>
</div>
<button class="bg-sky-900 text-white px-6 py-3 rounded-lg w-full hover:bg-sky-800 transition" type="submit">Cek Status</button>
</form>
<div class="mt-4 text-gray-800" id="status-result"></div>
</div>
</section>
</div>
</main>
@endsection