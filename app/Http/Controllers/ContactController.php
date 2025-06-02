<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Implementasi nanti
        return redirect()->route('contact')->with('success', 'Pesan terkirim.');
    }
}