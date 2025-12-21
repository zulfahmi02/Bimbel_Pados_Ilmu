@extends('layouts.app')

@section('title', 'Beranda - Bimbel Pados Ilmu')

@section('description', 'Bimbel pelajaran utama yang ditujukan untuk para murid agar dapat belajar lebih fokus dan mendapatkan pendampingan dari guru secara privat di Desa Gajah, Bojonegoro.')

@section('content')

<!-- Hero Section -->
<section class="bg-white pt-32 pb-16 lg:pt-36 lg:pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Left Content -->
            <div class="fade-in">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                    Belajar, Berkembang, Dan Berkarya Di Desa Gajah
                </h1>
                <p class="text-base text-gray-700 leading-relaxed mb-8">
                    Bimbel pados ilmu adalah bimbel pelajaran utama yang ditujukan untuk para murid agar dapat belajar lebih fokus dan mendapatkan pendampingan dari guru secara privat. Tombol utama mengarah ke pendaftaran & jadwal hari ini
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('pendaftaran') }}" class="inline-block bg-emerald-500 text-white px-8 py-4 rounded-lg font-semibold text-center hover:bg-emerald-600 transition duration-300 shadow-lg hover:shadow-xl">
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('program') }}" class="inline-block bg-white text-gray-800 px-8 py-4 rounded-lg font-semibold text-center hover:bg-gray-50 transition duration-300 shadow-md hover:shadow-lg border-2 border-gray-300">
                        Lihat Program Unggulan
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="fade-in">
                <div class="rounded-2xl overflow-hidden shadow-2xl h-96 bg-gray-900">
                    <img src="{{ asset('images/hero.jpg') }}" alt="Desa Gajah" class="w-full h-full object-contain">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kenapa Memilih Kami Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Kenapa Memilih Bimbel Pados Ilmu?</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Kami memberikan pendampingan terbaik untuk membantu murid mencapai potensi maksimalnya
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="text-center p-6 rounded-xl hover:shadow-lg transition duration-300 bg-gray-50">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Guru Berpengalaman</h3>
                <p class="text-gray-600">Tenaga pengajar profesional dan berpengalaman di bidangnya</p>
            </div>

            <!-- Feature 2 -->
            <div class="text-center p-6 rounded-xl hover:shadow-lg transition duration-300 bg-gray-50">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Metode Belajar Efektif</h3>
                <p class="text-gray-600">Metode pembelajaran yang disesuaikan dengan kebutuhan siswa</p>
            </div>

            <!-- Feature 3 -->
            <div class="text-center p-6 rounded-xl hover:shadow-lg transition duration-300 bg-gray-50">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Jadwal Fleksibel</h3>
                <p class="text-gray-600">Waktu belajar yang dapat disesuaikan dengan kesibukan siswa</p>
            </div>

            <!-- Feature 4 -->
            <div class="text-center p-6 rounded-xl hover:shadow-lg transition duration-300 bg-gray-50">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Hasil Terbukti</h3>
                <p class="text-gray-600">Peningkatan prestasi akademik yang signifikan</p>
            </div>
        </div>
    </div>
</section>

<!-- Program Unggulan Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Program Unggulan Kami</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Berbagai program pembelajaran yang dirancang khusus untuk kebutuhan siswa
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($programs as $program)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">
                    @if($program->image)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="h-48 bg-gradient-to-br from-{{ $program->category == 'sd' ? 'emerald' : ($program->category == 'smp' ? 'blue' : 'purple') }}-400 to-{{ $program->category == 'sd' ? 'emerald' : ($program->category == 'smp' ? 'blue' : 'purple') }}-600 flex items-center justify-center">
                            <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $program->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $program->description }}</p>
                        
                        @if(is_array($program->subjects) && count($program->subjects) > 0)
                            <ul class="space-y-2 mb-6">
                                @foreach(array_slice($program->subjects, 0, 3) as $subject)
                                    <li class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 text-emerald-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $subject }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        
                        <a href="{{ route('program') }}" class="block text-center bg-emerald-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada program yang tersedia</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Testimoni Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Apa Kata Mereka?</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Testimoni dari siswa dan orang tua yang telah merasakan manfaat belajar di Bimbel Pados Ilmu
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimoni 1 -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                        A
                    </div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Ahmad Rizki</h4>
                        <p class="text-sm text-gray-600">Siswa SMP Kelas 9</p>
                    </div>
                </div>
                <div class="flex mb-3">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-700 italic">"Anak saya jadi lebih semangat belajar. Gurunya ramah dan metode mengajarnya mudah dipahami. Terima kasih Bimbel Pados Ilmu!"</p>
            </div>

            <!-- Testimoni 3 -->
            <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                        D
                    </div>
                    <div class="ml-4">
                        <h4 class="font-semibold text-gray-900">Dimas Pratama</h4>
                        <p class="text-sm text-gray-600">Siswa SMA Kelas 12</p>
                    </div>
                </div>
                <div class="flex mb-3">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-700 italic">"Persiapan UTBK nya bagus banget! Soal soal latihannya mirip dengan soal ujian asli. Rekomendasi buat yang mau masuk PTN!"</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistik Section -->
<section class="py-16 bg-emerald-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">200+</div>
                <div class="text-emerald-100">Siswa Aktif</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">15+</div>
                <div class="text-emerald-100">Guru Berpengalaman</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">95%</div>
                <div class="text-emerald-100">Tingkat Kepuasan</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">5+</div>
                <div class="text-emerald-100">Tahun Berpengalaman</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-br from-emerald-50 to-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Siap Meningkatkan Prestasi Belajar?
        </h2>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
            Bergabunglah dengan ratusan siswa yang telah merasakan manfaat belajar di Bimbel Pados Ilmu. Daftar sekarang dan dapatkan konsultasi gratis!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('pendaftaran') }}" class="inline-block bg-emerald-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 shadow-lg hover:shadow-xl">
                Daftar Sekarang
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-block bg-white text-emerald-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-50 transition duration-300 shadow-md hover:shadow-lg border-2 border-emerald-500">
                Hubungi Kami via WhatsApp
            </a>
        </div>
    </div>
</section>

