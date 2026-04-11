@extends('layouts.app')

@section('title', 'Jual Buku & Media Pembelajaran - Taman Belajar Sedjati')

@section('description', 'Jual buku dan media pembelajaran pilihan untuk mendukung proses belajar siswa bersama Taman Belajar Sedjati.')

@section('schema')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "ItemList",
      "name": "Katalog Media Pembelajaran Taman Belajar Sedjati",
      "description": "Daftar buku dan media pembelajaran untuk mendukung belajar siswa.",
      "itemListElement": [
        @foreach($mediaItems as $index => $media)
          {
            "@@type": "ListItem",
            "position": {{ $index + 1 }},
            "url": "{{ route('media-pembelajaran.show', $media->slug) }}",
            "name": "{{ $media->title }}"
          }@if(!$loop->last),@endif
        @endforeach
      ]
    }
    </script>
@endsection

@section('content')

    <section class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4 fade-in">Media Pembelajaran</h1>
            <p class="text-xl text-emerald-100 max-w-3xl mx-auto fade-in">
                Katalog buku dan media pembelajaran yang kami siapkan untuk membantu proses belajar jadi lebih terarah
            </p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($mediaItems->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($mediaItems as $media)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden h-full flex flex-col">
                            @if($media->image_url)
                                <div class="h-56 overflow-hidden">
                                    <img src="{{ $media->image_url }}" alt="{{ $media->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                </div>
                            @else
                                <div class="h-56 bg-gradient-to-br from-emerald-400 to-teal-600 flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            @endif

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center justify-between gap-3 mb-3">
                                    <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold">
                                        {{ $media->category ?: 'Media Belajar' }}
                                    </span>
                                    @if($media->is_featured)
                                        <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold">
                                            Unggulan
                                        </span>
                                    @endif
                                </div>

                                <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $media->title }}</h2>

                                <div class="space-y-1 text-sm text-gray-500 mb-4">
                                    @if($media->author)
                                        <p>Penulis: {{ $media->author }}</p>
                                    @endif
                                    @if($media->publisher)
                                        <p>Penerbit: {{ $media->publisher }}</p>
                                    @endif
                                    @if(!is_null($media->stock))
                                        <p>Stok: {{ $media->stock }}</p>
                                    @endif
                                </div>

                                <p class="text-gray-600 mb-6 flex-grow">
                                    {{ Str::limit($media->description, 120) }}
                                </p>

                                <div class="border-t pt-4 mt-auto">
                                    <p class="text-sm text-gray-500 mb-1">Harga</p>
                                    <p class="text-2xl font-bold text-emerald-600 mb-4">{{ $media->formatted_price }}</p>

                                    <div class="grid grid-cols-1 gap-3">
                                        <a href="{{ route('media-pembelajaran.show', $media->slug) }}"
                                            class="inline-flex items-center justify-center bg-white text-emerald-600 border-2 border-emerald-500 px-4 py-3 rounded-lg font-semibold hover:bg-emerald-50 transition duration-300">
                                            Lihat Selengkapnya
                                        </a>
                                        <a href="{{ $media->whatsapp_url }}" target="_blank"
                                            class="inline-flex items-center justify-center bg-emerald-500 text-white px-4 py-3 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300">
                                            Pesan via WhatsApp
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16 bg-white rounded-xl shadow-md">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <p class="text-gray-500 text-lg">Media pembelajaran belum tersedia saat ini</p>
                </div>
            @endif
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Butuh Rekomendasi Media Belajar?
            </h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
                Hubungi kami untuk memilih buku atau media pembelajaran yang paling sesuai dengan kebutuhan siswa
            </p>
            <a href="https://wa.me/6282237343764?text=Halo,%20saya%20ingin%20bertanya%20tentang%20media%20pembelajaran"
                target="_blank"
                class="inline-block bg-emerald-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 shadow-lg hover:shadow-xl">
                Konsultasi via WhatsApp
            </a>
        </div>
    </section>

@endsection
