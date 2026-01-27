@extends('layouts.app')

@section('title', 'Tentang Kami - Taman Belajar Sedjati')

@section('description', 'Kenali lebih dekat Taman Belajar Sedjati, visi misi kami, dan tim pengajar berpengalaman yang siap membantu meningkatkan prestasi belajar Anda.')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4 fade-in">Tentang Kami</h1>
            <p class="text-xl text-emerald-100 max-w-3xl mx-auto fade-in">
                Mengenal lebih dekat Taman Belajar Sedjati dan komitmen kami dalam dunia pendidikan
            </p>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6"> Taman Belajar Sedjati</h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-4">
                        Taman Belajar Sedjati adalah tempat bertumbuh dan berkembang anak-anak sesuai dengan minat dan bakat
                        mereka. Kami bertempat di desa Gajah kecamatan Baureno kabupaten Bojonegoro. Kami hadir dengan
                        komitmen untuk memberikan pendampingan belajar terbaik bagi murid.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed mb-4">
                        Dengan metode pembelajaran yang efektif dan guru-guru berpengalaman, kami membantu siswa memahami
                        materi pelajaran dengan lebih baik, meningkatkan prestasi akademik, dan mempersiapkan mereka
                        menghadapi ujian dengan percaya diri.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Kami percaya bahwa setiap siswa memiliki potensi yang luar biasa. Tugas kami adalah membantu mereka
                        menemukan dan mengembangkan potensi tersebut melalui pendampingan yang personal dan berkualitas.
                    </p>
                </div>
                <div class="rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/hero_tentang.jpg') }}" alt="Taman Belajar Sedjati"
                        class="w-full h-auto object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Vision -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi Kami</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Menjadi lembaga bimbingan belajar terpercaya yang menghasilkan generasi cerdas, berkarakter, dan
                        berprestasi di Desa Gajah dan sekitarnya.
                    </p>
                </div>

                <!-- Mission -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi Kami</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-emerald-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Memberikan pembelajaran berkualitas dengan metode yang efektif</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-emerald-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Mengembangkan potensi akademik siswa secara maksimal</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-emerald-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Membangun karakter dan kepercayaan diri siswa</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Prinsip-prinsip yang menjadi fondasi dalam setiap kegiatan pembelajaran kami
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Profesional</h3>
                    <p class="text-gray-600">Memberikan layanan terbaik dengan standar profesional tinggi</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Peduli</h3>
                    <p class="text-gray-600">Memperhatikan kebutuhan dan perkembangan setiap siswa</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Inovatif</h3>
                    <p class="text-gray-600">Menggunakan metode pembelajaran yang kreatif dan efektif</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Berkualitas</h3>
                    <p class="text-gray-600">Menjaga standar kualitas pembelajaran yang tinggi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Tim Pengajar Kami</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Guru-guru berpengalaman dan berdedikasi tinggi untuk kesuksesan belajar siswa
                </p>
            </div>

            @if(isset($headTeacher))
                <!-- Head Teacher Section (centered card) -->
                <div class="mb-16 flex justify-center">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden w-full max-w-4xl">
                        <div class="flex flex-col items-center px-10 pt-10 pb-12 text-center">
                            @if($headTeacher->photo_url)
                                <img src="{{ asset('storage/' . $headTeacher->photo_url) }}" alt="{{ $headTeacher->name }}"
                                    class="w-36 h-36 rounded-full object-cover shadow-lg mb-6">
                            @else
                                <div class="w-36 h-36 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center text-3xl font-bold shadow-lg mb-6">
                                    {{ substr($headTeacher->name, 0, 1) }}
                                </div>
                            @endif

                            <span class="inline-block bg-emerald-100 text-emerald-800 px-4 py-1.5 rounded-full text-sm font-semibold mb-3">
                                {{ $headTeacher->role }}
                            </span>
                            <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $headTeacher->name }}</h3>
                            <p class="text-gray-500 mb-4 font-medium">{{ $headTeacher->education }}</p>

                            <div class="text-gray-600 leading-relaxed max-w-2xl mb-6">
                                {!! $headTeacher->bio ? nl2br(e($headTeacher->bio)) : nl2br(e($headTeacher->description)) !!}
                            </div>

                            @if($headTeacher->specializations)
                                <div class="flex flex-wrap justify-center gap-2">
                                    @foreach($headTeacher->specializations as $spec)
                                        <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-md text-sm border border-gray-200">
                                            {{ $spec }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if($instructors && $instructors->count() > 0)
                <!-- Instructors Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($instructors as $instructor)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group">
                            <div class="relative h-64 overflow-hidden">
                                @if($instructor->photo_url)
                                    <img src="{{ asset('storage/' . $instructor->photo_url) }}" alt="{{ $instructor->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <svg class="w-20 h-20 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-1">
                                    {{ $instructor->name }}
                                </h3>
                                <p class="text-emerald-600 font-medium text-sm mb-2">{{ $instructor->role }}</p>

                                @if($instructor->specializations)
                                    <p class="text-gray-600 text-sm mb-3">
                                        {{ is_array($instructor->specializations) ? implode(', ', $instructor->specializations) : $instructor->specializations }}
                                    </p>
                                @endif

                                @if($instructor->education)
                                    <div class="flex items-center text-sm text-gray-500 mb-2">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        </svg>
                                        {{ $instructor->education }}
                                    </div>
                                @endif

                                @if($instructor->description)
                                    <p class="text-gray-600 text-sm line-clamp-3">{{ $instructor->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl shadow-md p-8 text-center col-span-3">
                        <p class="text-gray-500 italic">Data pengajar belum tersedia.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-emerald-50 to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Siap Bergabung Bersama Kami?
            </h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                Daftar sekarang dan rasakan pengalaman belajar yang berkualitas di Taman Belajar Sedjati
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('pendaftaran') }}"
                    class="inline-block bg-emerald-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 shadow-lg hover:shadow-xl">
                    Daftar Sekarang
                </a>
                <a href="{{ route('program') }}"
                    class="inline-block bg-white text-gray-800 px-8 py-4 rounded-lg font-semibold hover:bg-gray-50 transition duration-300 shadow-md hover:shadow-lg border-2 border-gray-300">
                    Lihat Program
                </a>
            </div>
        </div>
    </section>

@endsection
