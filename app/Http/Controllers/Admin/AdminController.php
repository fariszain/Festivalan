<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage; // Pastikan di-import jika menggunakan Storage::delete
use Illuminate\Support\Facades\Log;     // Untuk logging error jika diperlukan

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingEventCount = Event::where('status', 'pending_approval')->count();
        $approvedEventCount = Event::where('status', 'approved')->count();
        return view('admin.dashboard', compact('pendingEventCount', 'approvedEventCount'));
    }

    public function listEventProposals()
    {
        $pendingEvents = Event::where('status', 'pending_approval')
                              ->with('user') 
                              ->orderBy('created_at', 'asc')
                              ->paginate(10); 

        return view('admin.event_proposals', compact('pendingEvents'));
    }

    public function approveEvent(Event $event)
    {
        $event->status = 'approved';
        $event->save();
        return redirect()->route('admin.event.proposals')->with('success', 'Event "' . $event->title . '" telah berhasil disetujui.');
    }

    public function rejectEvent(Request $request, Event $event)
    {
        // Pertimbangkan apakah event yang ditolak akan dihapus atau hanya diubah statusnya
        // Untuk saat ini, kita ubah statusnya saja.
        $event->status = 'rejected'; 
        $event->save();
        $message = 'Event "' . $event->title . '" telah ditolak.';
        
        // Jika ingin ada opsi hapus file gambar saat ditolak (dan event record dihapus):
        // if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
        //     Storage::disk('public')->delete($event->image_path);
        // }
        // $event->delete(); // Jika ingin menghapus record eventnya juga

        return redirect()->route('admin.event.proposals')->with('success', $message);
    }
}