@extends('layouts.layout')

@section('title', 'Login / Register - Festivalan')

@pushOnce('styles')
<style>
    /* Custom CSS untuk animasi sliding panel dan beberapa style dasar */
    /* Font Poppins bisa diimpor jika diinginkan, atau biarkan menggunakan font-sans dari Tailwind */
    /* @import url("https://fonts.googleapis.com/css2?family=Poppins"); */

    .auth-body-container {
        display: flex;
        /* background-color: #f6f5f7; Akan ditimpa oleh dark mode jika aktif */
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Poppins', sans-serif; /* Anda bisa ganti dengan var(--font-sans) jika didefinisikan di Tailwind */
        min-height: calc(100vh - 128px); /* Contoh: 100vh - (tinggi header + tinggi footer) */
        padding-top: 1rem; /* Jarak dari navbar */
        padding-bottom: 1rem; /* Jarak ke footer */
    }

    .auth-container {
        border-radius: 25px;
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 540px; /* Tinggi minimal disesuaikan sedikit untuk konten */
    }

    .form-auth-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .login-auth-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }
    .auth-container.right-panel-active .login-auth-container {
        transform: translateX(100%);
    }

    .register-auth-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }
    .auth-container.right-panel-active .register-auth-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: showAuthPanel 0.6s;
    }

    @keyframes showAuthPanel {
        0%, 49.99% { opacity: 0; z-index: 1; }
        50%, 100% { opacity: 1; z-index: 5; }
    }

    .overlay-auth-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }
    .auth-container.right-panel-active .overlay-auth-container {
        transform: translateX(-100%);
    }

    .auth-overlay {
        /* Menggunakan GIF sebagai background */
        background-image: url('Lilo\ And\ Stitch\ Leaf\ GIF\ -\ Lilo\ And\ Stitch\ Leaf\ Sad\ -\ Discover\ &\ Share\ GIFs.gif');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center; /* Pusatkan GIF */
        color: #fff; /* Teks default putih di overlay */
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }
    /* Gradien gelap di atas GIF untuk kontras teks */
    .auth-overlay:before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        /* Gradien disesuaikan dengan tema Festivalan (biru tua) */
        background: linear-gradient(
            to top,
            rgba(12, 74, 110, 0.6) 40%, /* Warna sky-900 dengan opacity */
            rgba(30, 58, 138, 0.1) /* Warna blue-800 dengan opacity tipis di atas */
        );
    }
    .auth-container.right-panel-active .auth-overlay {
        transform: translateX(50%);
    }

    .auth-overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }
    .auth-overlay-left { transform: translateX(-20%); }
    .auth-container.right-panel-active .auth-overlay-left { transform: translateX(0); }
    .auth-overlay-right { right: 0; transform: translateX(0); }
    .auth-container.right-panel-active .auth-overlay-right { transform: translateX(20%); }

    .auth-button.ghost {
        background-color: rgba(255, 255, 255, 0.25);
        border: 1px solid #fff; /* Border putih lebih tipis */
        color: #fff;
    }
    .auth-button.ghost:hover {
        background-color: rgba(255, 255, 255, 0.35);
    }
</style>
@endPushOnce

@section('content')
<div class="auth-body-container bg-gray-100 dark:bg-slate-900">
    <div class="auth-container bg-white dark:bg-slate-800 shadow-2xl rounded-2xl" id="authContainer">
        
        {{-- FORM REGISTER --}}
        <div class="form-auth-container register-auth-container">
            <form action="#" method="POST" class="auth-form bg-white dark:bg-slate-800 p-8 sm:p-12 h-full flex flex-col justify-center items-center" onsubmit="alert('Simulasi Register!'); return false;">
                {{-- @csrf --}}
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Buat Akun</h1>
                {{-- <div class="my-3 flex space-x-3"> --}}
                    {{-- Ikon sosial media dihilangkan --}}
                {{-- </div> --}}
                <input type="text" name="name" placeholder="Nama Lengkap" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2"/>
                <input type="email" name="email" placeholder="Email" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2"/>
                <input type="password" name="password" placeholder="Password" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2"/>
                <button type="submit" class="auth-button bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white py-3 px-12 rounded-full uppercase tracking-wider text-sm mt-6">Register</button>
            </form>
        </div>

        {{-- FORM LOGIN --}}
        <div class="form-auth-container login-auth-container">
            <form action="#" method="POST" class="auth-form bg-white dark:bg-slate-800 p-8 sm:p-12 h-full flex flex-col justify-center items-center" onsubmit="alert('Simulasi Login!'); return false;">
                {{-- @csrf --}}
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Login</h1>
                {{-- <div class="my-3 flex space-x-3"> --}}
                    {{-- Ikon sosial media dihilangkan --}}
                {{-- </div> --}}
                <input type="email" name="email" placeholder="Email" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2"/>
                <input type="password" name="password" placeholder="Password" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2"/>
                <div class="flex justify-between items-center w-full my-4 px-1">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-slate-800 focus:ring-2 dark:bg-slate-700 dark:border-slate-600">
                        <label for="remember_me" class="ml-2 text-xs text-gray-600 dark:text-gray-400">Ingat Saya</label>
                    </div>
                    <a href="#" class="text-xs text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">Lupa Password?</a>
                </div>
                <button type="submit" class="auth-button bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white py-3 px-12 rounded-full uppercase tracking-wider text-sm mt-4">Login</button>
            </form>
        </div>

        {{-- OVERLAY --}}
        <div class="overlay-auth-container">
            <div class="auth-overlay"> {{-- Kelas gradient Tailwind dihapus dari sini, dihandle oleh CSS --}}
                <div class="auth-overlay-panel auth-overlay-left p-8">
                    <h1 class="text-4xl font-bold text-white mb-4 leading-tight">Selamat Datang Kembali!</h1>
                    <p class="text-sm text-gray-100 mb-6 leading-relaxed px-4">Untuk tetap terhubung dengan semua event seru di Festivalan, silakan login dengan akun Anda.</p>
                    <button class="auth-button ghost py-3 px-10 rounded-full uppercase tracking-wider text-sm" id="authLoginButton">Login</button>
                </div>
                <div class="auth-overlay-panel auth-overlay-right p-8">
                    <h1 class="text-4xl font-bold text-white mb-4 leading-tight">Halo, Calon Festivarian!</h1>
                    <p class="text-sm text-gray-100 mb-6 leading-relaxed px-4">Belum punya akun? Daftarkan diri Anda dan mulailah petualangan event Anda bersama kami!</p>
                    <button class="auth-button ghost py-3 px-10 rounded-full uppercase tracking-wider text-sm" id="authRegisterButton">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Style untuk social icon yang sudah tidak terpakai bisa dihapus jika mau, tapi saya biarkan jika Anda berubah pikiran --}}
<style>
    .social-icon { /* Tidak terpakai lagi, tapi tidak dihapus jika Anda ingin menggunakannya kembali */
        @apply border border-gray-300 dark:border-slate-600 rounded-full inline-flex justify-center items-center h-10 w-10 text-gray-600 dark:text-gray-300 hover:border-blue-500 dark:hover:border-blue-400 hover:text-blue-500 dark:hover:text-blue-400 transition-all duration-300;
    }
    .auth-button { /* Base style untuk tombol utama dan ghost */
        @apply font-semibold transition-transform duration-75 active:scale-95 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-slate-800;
    }
    .auth-button:not(.ghost) { /* Styling spesifik untuk tombol non-ghost */
        @apply focus:ring-blue-500;
    }
    .auth-button.ghost {
        @apply focus:ring-white/70;
    }

</style>
@endsection


@push('scripts')
<script>
    const authRegisterButton = document.getElementById('authRegisterButton');
    const authLoginButton = document.getElementById('authLoginButton');
    const authContainer = document.getElementById('authContainer');

    if (authRegisterButton && authLoginButton && authContainer) {
        authRegisterButton.addEventListener('click', () => {
            authContainer.classList.add('right-panel-active');
        });

        authLoginButton.addEventListener('click', () => {
            authContainer.classList.remove('right-panel-active');
        });
    } else {
        // console.error('Auth toggle buttons or container not found.'); // Bisa di-uncomment untuk debugging
    }
</script>
@endpush