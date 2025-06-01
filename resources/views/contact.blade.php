{{-- resources/views/contact.blade.php --}}
@extends('layouts.layout')

@section('content')
    <main class="py-10 px-4">
    <section class="max-w-4xl mx-auto">
      <h1 class="text-4xl font-bold text-center mb-6">Get In Touch</h1>
      <p class="text-lg text-gray-700 text-center mb-8">
        Have any questions? Fill out the form below and we'll respond as soon as possible!
      </p>
      <form id="contact-form" class="max-w-2xl mx-auto space-y-6">
        <div>
          <label for="name" class="block text-gray-700">Name</label>
          <input type="text" id="name" class="w-full border p-3 rounded" required>
        </div>
        <div>
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" id="email" class="w-full border p-3 rounded" required>
        </div>
        <div>
          <label for="message" class="block text-gray-700">Message</label>
          <textarea id="message" rows="4" class="w-full border p-3 rounded" required></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-700 text-white py-3 rounded hover:bg-blue-800 transition">Send Message</button>
      </form>
      <div id="contact-success" class="mt-6 text-center text-green-600 font-semibold">
        Thank you for contacting us! We'll get back to you shortly.
      </div>
    </section>
    <section class="max-w-4xl mx-auto mt-12">
      <h2 class="text-2xl font-bold mb-4">Our Location</h2>
      <div class="w-full h-64">
        <iframe
          class="w-full h-full rounded"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q=Jakarta,Indonesia" allowfullscreen>
        </iframe>
      </div>
    </section>
  </main>
@endsection