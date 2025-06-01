{{-- resources/views/contact.blade.php --}}
@extends('layouts.layout')

@section('title', 'Hubungi Kami - Festivalan')

@section('header')
@endsection

@section('content')
<main class="bg-gray-100 dark:bg-slate-900 py-16 sm:py-20 px-4">
    <div class="container mx-auto max-w-4xl">
        <section class="bg-white dark:bg-slate-800 p-6 sm:p-8 lg:p-10 rounded-2xl shadow-xl mb-12">
            <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 dark:text-white text-center mb-6">Get In Touch</h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 text-center mb-8">
                Have any questions? Fill out the form below and we'll respond as soon as possible!
            </p>
            <form id="contact-form" class="max-w-2xl mx-auto space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
                    <input type="text" id="name" name="name" class="w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition" required>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full border-gray-300 dark:border-slate-600 bg-gray-50 dark:bg-slate-700 text-gray-900 dark:text-gray-200 p-3 rounded-lg focus:ring-sky-500 focus:border-sky-500 transition" required></textarea>
                </div>
                <button type="submit" class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-150 ease-in-out shadow hover:shadow-md">Send Message</button>
            </form>
            <div id="contact-success" class="hidden mt-6 text-center text-green-600 dark:text-green-400 font-semibold">
                Thank you for contacting us! We'll get back to you shortly.
            </div>
        </section>

        <section class="bg-white dark:bg-slate-800 p-6 sm:p-8 lg:p-10 rounded-2xl shadow-xl">
            <h2 class="text-2xl font-bold text-slate-800 dark:text-white mb-6 text-center sm:text-left">Our Location</h2>
            <div class="w-full h-72 sm:h-80 md:h-96 rounded-lg overflow-hidden shadow">
                {{-- Ganti dengan embed Google Maps yang valid jika diperlukan --}}
                <iframe
                    class="w-full h-full"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.709989109029!2d95.31809931535705!3d5.569079995995786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304037a5a6c5f779%3A0x6d19293fd91a9167!2sUniversitas%20Syiah%20Kuala!5e0!3m2!1sen!2sid!4v1622549971756!5m2!1sen!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contact-form');
        const contactSuccessMessage = document.getElementById('contact-success');

        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Implement actual form submission logic here (e.g., using Fetch API or Axios)
                console.log('Contact form submitted');
                // For demo purposes, show success message after a short delay
                setTimeout(() => {
                    contactSuccessMessage.classList.remove('hidden');
                    contactForm.reset(); // Reset form fields
                }, 1000);
                 // Hide message again after a few seconds
                setTimeout(() => {
                    contactSuccessMessage.classList.add('hidden');
                }, 5000);
            });
        }
    });
</script>
@endpush