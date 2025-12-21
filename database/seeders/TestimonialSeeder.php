<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Ahmad Rizki',
                'role' => 'Siswa SMP Kelas 9',
                'content' => 'Alhamdulillah nilai matematika saya naik drastis setelah ikut les di sini. Guru nya sabar banget ngajarin sampai paham!',
                'rating' => 5,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Siti Nur Azizah',
                'role' => 'Orang Tua Siswa SD',
                'content' => 'Anak saya jadi lebih semangat belajar. Gurunya ramah dan metode mengajarnya mudah dipahami. Terima kasih Bimbel Pados Ilmu!',
                'rating' => 5,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Dimas Pratama',
                'role' => 'Siswa SMA Kelas 12',
                'content' => 'Persiapan UTBK nya bagus banget! Soal soal latihannya mirip dengan soal ujian asli. Rekomendasi buat yang mau masuk PTN!',
                'rating' => 5,
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
