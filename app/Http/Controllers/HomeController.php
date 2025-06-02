<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return $this->Beranda(); 
    }

    public function Beranda()
    {
        $approvedEvents = Event::where('status', 'approved') // Mengambil hanya event yang disetujui
                                ->with('user') // Eager load data user pembuat event
                                ->orderBy('schedule_start', 'asc') // Urutkan berdasarkan tanggal mulai
                                ->get(); // Ambil semua yang disetujui
        
        // Data untuk galeri marquee bisa tetap statis atau dinamis nanti
        $galleryImages = [
            ['file' => '1257w-Ghk8lx6yUCQ.webp', 'alt' => 'Suasana Konser Malam Hari'],
            ['file' => '4535650015b7608dce2f8e36a42785eb.jpg', 'alt' => 'Festival Musik Outdoor'],
            ['file' => '4c290251b6a184c00609d07e8f40fc9b.jpg', 'alt' => 'Panggung Megah dengan Lampu Sorot'],
            ['file' => '1131w-96LTeHAy_0c.webp', 'alt' => 'Penonton Menikmati Konser'],
            ['file' => '1131w-o5eGmJ05izs.webp', 'alt' => 'Pertunjukan Spektakuler di Panggung'],
            ['file' => 'event-night-flyer-template-b354cd8cd9d0513d7b0dc7f8df2202d2_screen.jpg', 'alt' => 'Desain Flyer Event Malam'],
            ['file' => '6cdba24179ddf294aa2d59613a873ad6.jpg', 'alt' => 'Keramaian Pengunjung Festival']
        ];

        $userRegisteredEventIds = [];
        if (Auth::check() && Auth::user()->role == 'mahasiswa') {
            $userRegisteredEventIds = Auth::user()->registeredEvents()->pluck('events.id')->toArray();
        }

        return view('Beranda', compact('approvedEvents', 'galleryImages', 'userRegisteredEventIds'));
    }
}