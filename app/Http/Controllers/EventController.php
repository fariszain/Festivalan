<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Untuk logging error jika diperlukan

class EventController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registerevent');
    }

    public function registerEvent(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'schedule_start' => ['required', 'date'],
            'schedule_end' => ['nullable', 'date', 'after_or_equal:schedule_start'],
            'location' => ['nullable', 'string', 'max:255'],
            'event_category' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('event_posters', 'public');
        }

        Event::create([
            'user_id' => Auth::id(),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'schedule_start' => $validatedData['schedule_start'],
            'schedule_end' => $validatedData['schedule_end'] ?? null,
            'location' => $validatedData['location'] ?? null,
            'event_category' => $validatedData['event_category'] ?? null,
            'image_path' => $imagePath,
            'status' => 'pending_approval',
        ]);

        return redirect()->route('registerevent')->with('success', 'Event Anda berhasil diajukan dan sedang menunggu persetujuan admin.');
    }

    public function detail()
    {
        // Ini akan memerlukan ID event untuk ditampilkan, misalnya dari route parameter
        // Contoh: public function detail(Event $event) { return view('detail', compact('event')); }
        // Untuk saat ini, view detail Anda mungkin masih statis atau belum menerima data dinamis.
        return view('detail');
    }

    /**
     * Register the authenticated user for a specific event.
     * Method ini akan dipanggil via AJAX dari frontend.
     * * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event (Route Model Binding)
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerUserToEvent(Request $request, Event $event)
    {
        $user = Auth::user();

        // Middleware 'check.role:mahasiswa' sudah seharusnya menangani ini di level route,
        // tapi validasi tambahan di controller adalah praktik yang baik.
        if (!$user || $user->role !== 'mahasiswa') {
            return response()->json(['success' => false, 'message' => 'Hanya mahasiswa yang dapat mendaftar event.'], 403); // Forbidden
        }

        // (Opsional) Tambahkan validasi lain di sini jika perlu,
        // misalnya: cek apakah event masih buka pendaftaran, cek kuota, dll.

        // Cek apakah user sudah terdaftar sebelumnya untuk event ini
        // syncWithoutDetaching akan menambahkan jika belum ada, dan tidak error jika sudah ada.
        // attach akan error jika mencoba menambah record yang sudah ada (karena composite primary key).
        // Kita bisa cek dulu untuk pesan error yang lebih baik.
        if ($user->registeredEvents()->where('event_id', $event->id)->exists()) {
            return response()->json(['success' => false, 'message' => 'Anda sudah terdaftar di event ini.'], 409); // 409 Conflict
        }

        // Daftarkan user ke event (membuat record di tabel pivot event_user)
        try {
            // Menggunakan attach untuk menambahkan record ke tabel pivot
            $user->registeredEvents()->attach($event->id); 
            // Anda bisa menambahkan data tambahan ke tabel pivot jika ada kolom lain:
            // $user->registeredEvents()->attach($event->id, ['registration_status' => 'confirmed', 'registration_time' => now()]);

            return response()->json(['success' => true, 'message' => 'Pendaftaran ke event berhasil!']);
        } catch (\Exception $e) {
            Log::error('Error saat mendaftarkan user ke event: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan pada server saat proses pendaftaran.'], 500); // Internal Server Error
        }
    }
}