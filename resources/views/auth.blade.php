@extends('layouts.layout')

@section('title', 'Login / Register - Festivalan')

@pushOnce('styles')
<style>
    .auth-body-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        min-height: calc(100vh - 128px); /* Sesuaikan jika tinggi header/footer berbeda */
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
    .auth-container {
        border-radius: 25px; /* Disesuaikan dari 25px ke 20px agar lebih pas dengan shadow */
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 540px; /* Disesuaikan dari 540px agar form register tidak terpotong jika ada banyak field */
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
        /* Memastikan overflow-y auto agar bisa di-scroll jika kontennya panjang */
        overflow-y: auto; 
    }
    /* Styling untuk scrollbar di form register jika diperlukan (opsional) */
    .register-auth-container::-webkit-scrollbar {
        width: 6px;
    }
    .register-auth-container::-webkit-scrollbar-thumb {
        background-color: rgba(0,0,0,0.2);
        border-radius: 3px;
    }
    html.dark .register-auth-container::-webkit-scrollbar-thumb {
        background-color: rgba(255,255,255,0.2);
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
    .auth-container.right-panel-active .overlay-auth-container{
        transform: translateX(-100%);
    }
    .auth-overlay {
        background-image: url('Lilo\ And\ Stitch\ Leaf\ GIF\ -\ Lilo\ And\ Stitch\ Leaf\ Sad\ -\ Discover\ &\ Share\ GIFs.gif'); /* Pastikan path ke GIF ini benar atau ganti dengan URL valid */
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        color: #fff;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }
    .auth-overlay:before { /* Gradient overlay */
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: linear-gradient(
            to top,
            rgba(12, 74, 110, 0.6) 40%, /* sky-900 with opacity */
            rgba(30, 58, 138, 0.1) /* blue-800 with opacity, disesuaikan */
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
    .auth-overlay-left {
        transform: translateX(-20%);
    }
    .auth-container.right-panel-active .auth-overlay-left {
        transform: translateX(0);
    }
    .auth-overlay-right {
        right: 0;
        transform: translateX(0);
    }
    .auth-container.right-panel-active .auth-overlay-right {
        transform: translateX(20%);
    }
    .auth-button.ghost {
        background-color: rgba(255, 255, 255, 0.25); /* Sedikit lebih transparan */
        border: 1px solid #fff;
        color: #fff;
    }
    .auth-button.ghost:hover {
        background-color: rgba(255, 255, 255, 0.35); /* Efek hover yang lebih halus */
    }
</style>
@endPushOnce

@section('content')
<div class="auth-body-container bg-gray-100 dark:bg-slate-900">
    <div class="auth-container bg-white dark:bg-slate-800 shadow-2xl rounded-2xl" id="authContainer">
        
        {{-- FORM REGISTER --}}
        <div class="form-auth-container register-auth-container">
            <form action="{{ route('register') }}" method="POST" class="auth-form bg-white dark:bg-slate-800 p-8 sm:p-12 h-full flex flex-col justify-center items-center">
                @csrf
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Buat Akun</h1>
                
                <input type="text" name="name" placeholder="Nama Lengkap" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('name') border-red-500 @enderror" value="{{ old('name') }}"/>
                @error('name')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                @enderror

                {{-- TAMBAHKAN INPUT USERNAME DI SINI --}}
                <input type="text" name="username" placeholder="Username" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('username') border-red-500 @enderror" value="{{ old('username') }}"/>
                @error('username')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                @enderror
                {{-- SELESAI TAMBAH INPUT USERNAME --}}
                
                <input type="email" name="email" placeholder="Email" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('email') border-red-500 @enderror" value="{{ old('email') }}"/>
                @error('email')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                @enderror
                
                <input type="password" name="password" placeholder="Password" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('password') border-red-500 @enderror"/>
                @error('password')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                @enderror
                
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2"/>
                
                <select name="role" id="role" required 
                        class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('role') border-red-500 @enderror">
                    <option value="">Pilih Role...</option>
                    <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                @enderror
                
                <div id="npm-field" class="{{ old('role') == 'mahasiswa' ? '' : 'hidden' }} w-full">
                    <input type="text" name="npm" placeholder="NPM (Nomor Pokok Mahasiswa)" 
                           class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('npm') border-red-500 @enderror" value="{{ old('npm') }}"/>
                    @error('npm')
                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                    @enderror
                </div>
                
                <div id="nip-field" class="{{ old('role') == 'admin' ? '' : 'hidden' }} w-full">
                    <input type="text" name="nip" placeholder="NIP (Nomor Induk Pegawai)" 
                           class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('nip') border-red-500 @enderror" value="{{ old('nip') }}"/>
                    @error('nip')
                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                    @enderror
                </div>
                
                <button type="submit" class="auth-button bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white py-3 px-12 rounded-full uppercase tracking-wider text-sm mt-6">Register</button>
            </form>
        </div>

        {{-- FORM LOGIN --}}
        <div class="form-auth-container login-auth-container">
            <form action="{{ route('login') }}" method="POST" class="auth-form bg-white dark:bg-slate-800 p-8 sm:p-12 h-full flex flex-col justify-center items-center">
                @csrf
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Login</h1>
                <input type="email" name="email" placeholder="Email" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('email', 'login') border-red-500 @enderror" value="{{ old('email') }}"/>
                @error('email', 'login') <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                @enderror
                
                <input type="password" name="password" placeholder="Password" required 
                       class="auth-input bg-gray-50 dark:bg-slate-700 border border-gray-300 dark:border-slate-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-3 my-2 @error('password', 'login') border-red-500 @enderror"/>
                @error('password', 'login') <p class="text-red-500 dark:text-red-400 text-xs mt-1 w-full text-left">{{ $message }}</p>
                @enderror
                
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
            <div class="auth-overlay">
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

<style>
    .auth-button {
        @apply font-semibold transition-transform duration-75 active:scale-95 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-slate-800;
    }
    .auth-button:not(.ghost) {
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
    const roleSelect = document.getElementById('role');
    const npmField = document.getElementById('npm-field');
    const nipField = document.getElementById('nip-field');

    if (authRegisterButton && authLoginButton && authContainer) {
        authRegisterButton.addEventListener('click', () => {
            authContainer.classList.add('right-panel-active');
        });

        authLoginButton.addEventListener('click', () => {
            authContainer.classList.remove('right-panel-active');
        });
    }

    // Logika untuk menampilkan/menyembunyikan NPM atau NIP berdasarkan role
    if (roleSelect && npmField && nipField) {
        // Fungsi untuk handle perubahan role
        function handleRoleChange() {
            const role = roleSelect.value;
            const npmInput = npmField.querySelector('input');
            const nipInput = nipField.querySelector('input');

            if (role === 'mahasiswa') {
                npmField.classList.remove('hidden');
                nipField.classList.add('hidden');
                npmInput.setAttribute('required', 'required');
                nipInput.removeAttribute('required');
                nipInput.value = ''; // Kosongkan field NIP jika role berubah ke mahasiswa
            } else if (role === 'admin') {
                npmField.classList.add('hidden');
                nipField.classList.remove('hidden');
                npmInput.removeAttribute('required');
                nipInput.setAttribute('required', 'required');
                npmInput.value = ''; // Kosongkan field NPM jika role berubah ke admin
            } else {
                npmField.classList.add('hidden');
                nipField.classList.add('hidden');
                npmInput.removeAttribute('required');
                nipInput.removeAttribute('required');
                npmInput.value = ''; // Kosongkan field NPM
                nipInput.value = ''; // Kosongkan field NIP
            }
        }

        // Panggil saat halaman dimuat untuk menyesuaikan dengan old value (jika ada)
        handleRoleChange(); 

        // Tambahkan event listener
        roleSelect.addEventListener('change', handleRoleChange);
    }

    // Jika ada error validasi dari backend, pastikan panel yang benar aktif
    // Ini berguna jika setelah submit register gagal, panel tidak kembali ke login
    @if ($errors->any() && !$errors->hasBag('login')) // Hanya jika ada error umum dan bukan error login
        if (authContainer) {
            authContainer.classList.add('right-panel-active');
        }
    @endif

</script>
@endpush