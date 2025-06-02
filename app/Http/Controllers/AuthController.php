<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showAuthForm()
    {
        return view('auth');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:mahasiswa,admin'],
            'npm' => ['required_if:role,mahasiswa', 'string', 'max:20', 'nullable'],
            'nip' => ['required_if:role,admin', 'string', 'max:20', 'nullable'],
            'phone_number' => ['nullable', 'string', 'max:15'],
            'bio' => ['nullable', 'string', 'max:500'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'npm' => $request->role === 'mahasiswa' ? $request->npm : null,
            'nip' => $request->role === 'admin' ? $request->nip : null,
            'phone_number' => $request->phone_number,
            'bio' => $request->bio,
        ]);

        Auth::login($user);

        return redirect()->route('Beranda');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('Beranda');
        }

        throw ValidationException::withMessages([
            'email' => ['Email atau password salah.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('Profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('ubahprofile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone_number' => ['nullable', 'string', 'max:15'],
            'bio' => ['nullable', 'string', 'max:500'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'npm' => ['required_if:role,mahasiswa', 'string', 'max:20', 'nullable'],
            'nip' => ['required_if:role,admin', 'string', 'max:20', 'nullable'],
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'bio' => $request->bio,
            'npm' => $user->role === 'mahasiswa' ? $request->npm : null,
            'nip' => $user->role === 'admin' ? $request->nip : null,
        ];

        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && Storage::exists('public/avatars/' . $user->avatar)) {
                Storage::delete('public/avatars/' . $user->avatar);
            }
            // Simpan avatar baru
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = basename($avatarPath);
        }

        $user->update($data);

        return redirect()->route('Profile')->with('success', 'Profil berhasil diperbarui.');
    }
}