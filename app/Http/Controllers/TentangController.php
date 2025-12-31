<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        // Ambil data kepala bimbel (urutan pertama, aktif)
        $headTeacher = Teacher::active()->ordered()->first();

        // Ambil data tim pengajar (aktif, urutkan)
        $instructors = Instructor::active()->ordered()->get();

        return view('tentang', compact('headTeacher', 'instructors'));
    }
}
