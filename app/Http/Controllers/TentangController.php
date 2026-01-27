<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        // Ambil kepala bimbel berdasarkan role; jika tidak ada biarkan null
        $headTeacher = Teacher::active()
            ->where('role', 'Kepala Bimbel')
            ->ordered()
            ->first();

        // Ambil guru/pengajar lainnya (termasuk jika tidak ada kepala)
        $instructors = Teacher::active()
            ->when($headTeacher, fn ($q) => $q->where('id', '!=', $headTeacher->id))
            ->ordered()
            ->get();

        return view('tentang', compact('headTeacher', 'instructors'));
    }
}
