<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)
                          ->orderBy('order')
                          ->get();

        return view('program', compact('programs'));
    }
}
