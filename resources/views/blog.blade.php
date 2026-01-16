@extends('layouts.app')

@section('title', 'Blog - Taman Belajar Sedjati')

@section('description', 'Baca artikel-artikel menarik seputar pendidikan, tips belajar, dan informasi terkini dari Taman Belajar Sedjati.')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4 fade-in">Blog & Artikel</h1>
            <p class="text-xl text-emerald-100 max-w-3xl mx-auto fade-in">
                Tips belajar, informasi pendidikan, dan artikel menarik untuk mendukung prestasi akademik Anda
            </p>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">
                            @if($post->image)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            @endif

                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $post->published_at->format('d F Y') }}
                                    <span class="mx-2">•</span>
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    {{ $post->author }}
                                </div>

                                <h2 class="text-xl font-bold text-gray-900 mb-3 hover:text-emerald-600 transition duration-300">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h2>

                                <p class="text-gray-600 mb-4">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                </p>

                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="inline-flex items-center text-emerald-600 font-semibold hover:text-emerald-700 transition duration-300 py-2 -ml-2 px-2 rounded-lg hover:bg-emerald-50 active:bg-emerald-100">
                                    Baca Selengkapnya
                                    <svg class="w-5 h-5 ml-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-500 text-lg">Belum ada artikel yang dipublikasikan</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Siap Meningkatkan Prestasi Belajar?
            </h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan ratusan siswa yang telah merasakan manfaat belajar di Taman Belajar Sedjati
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