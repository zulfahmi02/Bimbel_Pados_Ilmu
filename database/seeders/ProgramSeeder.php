<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Les Privat SD Reguler',
                'slug' => 'les-privat-sd-reguler',
                'category' => 'sd',
                'description' => 'Program bimbingan belajar untuk siswa SD kelas 1-6 dengan pendekatan fun learning.',
                'subjects' => ['Matematika', 'Bahasa Indonesia', 'IPA', 'Bimbingan PR'],
                'facilities' => [],
                'price' => 200000,
                'duration' => '2x seminggu',
                'max_students' => 3,
                'is_premium' => false,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Les Privat SD Intensif',
                'slug' => 'les-privat-sd-intensif',
                'category' => 'sd',
                'description' => 'Program intensif dengan guru privat one-on-one untuk hasil maksimal.',
                'subjects' => [],
                'facilities' => ['Guru privat 1-on-1', 'Modul eksklusif', 'Laporan belajar rutin', 'Konsultasi orang tua'],
                'price' => 400000,
                'duration' => '3x seminggu',
                'max_students' => 1,
                'is_premium' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Les Privat SMP Reguler',
                'slug' => 'les-privat-smp-reguler',
                'category' => 'smp',
                'description' => 'Program bimbingan untuk siswa SMP dengan fokus pemahaman konsep dan latihan soal.',
                'subjects' => ['Matematika', 'IPA (Fisika & Biologi)', 'Bahasa Inggris', 'Persiapan ujian'],
                'facilities' => [],
                'price' => 300000,
                'duration' => '2x seminggu',
                'max_students' => 4,
                'is_premium' => false,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Program Persiapan Ujian SMP',
                'slug' => 'program-persiapan-ujian-smp',
                'category' => 'smp',
                'description' => 'Fokus persiapan ujian sekolah dan ujian nasional dengan drill soal intensif.',
                'subjects' => [],
                'facilities' => ['Bank soal lengkap', 'Try out rutin', 'Analisis hasil ujian', 'Pembahasan soal mendalam'],
                'price' => 350000,
                'duration' => '3x seminggu',
                'max_students' => 5,
                'is_premium' => false,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Les Privat SMA Reguler',
                'slug' => 'les-privat-sma-reguler',
                'category' => 'sma',
                'description' => 'Program bimbingan untuk siswa SMA semua jurusan dengan materi sesuai kurikulum.',
                'subjects' => ['Matematika', 'Fisika', 'Kimia', 'Biologi', 'Bahasa Inggris'],
                'facilities' => [],
                'price' => 400000,
                'duration' => '2x seminggu',
                'max_students' => 4,
                'is_premium' => false,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'Program Persiapan UTBK',
                'slug' => 'program-persiapan-utbk',
                'category' => 'sma',
                'description' => 'Persiapan UTBK, ujian sekolah, dan pemahaman materi tingkat lanjut.',
                'subjects' => [],
                'facilities' => ['Semua jurusan', 'Persiapan UTBK', 'Try out rutin', 'Pembahasan soal UTBK'],
                'price' => 500000,
                'duration' => '3x seminggu',
                'max_students' => 6,
                'is_premium' => true,
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
