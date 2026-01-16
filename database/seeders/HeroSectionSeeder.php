<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::create([
            'title' => 'Belajar, Berkembang, Dan Berkarya Di Desa Gajah',
            'subtitle' => 'Taman Belajar Sedjati adalah bimbel pelajaran utama yang ditujukan untuk para murid agar dapat belajar lebih fokus dan mendapatkan pendampingan dari guru secara privat. Tombol utama mengarah ke pendaftaran & jadwal hari ini',
            'cta_text' => 'Daftar Sekarang',
            'cta_link' => '/pendaftaran',
            'is_active' => true,
        ]);
    }
}
