<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)
                          ->orderBy('category')
                          ->orderBy('title')
                          ->get();

        return view('pendaftaran', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'program_id' => 'nullable|exists:programs,id',
            'message' => 'nullable|string',
        ]);

        Inquiry::create($validated);

        return redirect()->route('pendaftaran')
                        ->with('success', 'Terima kasih! Pendaftaran Anda telah kami terima. Kami akan menghubungi Anda segera.');
    }
}
