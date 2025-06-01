{{-- resources/views/gallery.blade.php --}}
@extends('layouts.layout')

@section('content')
<main class="flex-grow py-20 px-4">
<div class="max-w-4xl mx-auto">
<div class="text-center mb-12">
<h1 class="text-4xl font-bold text-sky-900 mb-4">Galeri Event Kampus</h1>
<p class="text-lg text-gray-700">Rekam Jejak Acara Universitas yang Telah Berlalu</p>
</div>
<section class="mb-12">
<h2 class="text-2xl font-bold text-sky-900 mb-4">Wisuda Angkatan 2023</h2>
<div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('w1.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('w2.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('w3.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('w4.jpg') }}"/>
</div>
</section>
<section class="mb-12">
<h2 class="text-2xl font-bold text-sky-900 mb-4">Integer X Upgrading 2025</h2>
<div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('i1.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('i2.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('i3.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('i4.jpg') }}"/>
</div>
</section>
<section class="mb-12">
<h2 class="text-2xl font-bold text-sky-900 mb-4">Takjil On The Road</h2>
<div class="flex overflow-x-auto pb-4 space-x-4 scrollbar-hide">
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('t1.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('t2.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('t3.jpg') }}"/>
<img class="flex-none w-64 h-48 rounded-lg object-cover shadow-sm hover:shadow-md transition-shadow" src="{{ asset('t4.jpg') }}"/>
</div>
</section>
</div>
</main>
@endsection