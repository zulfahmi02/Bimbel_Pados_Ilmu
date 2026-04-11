@extends('layouts.app')

@section('title', $media->title . ' - Media Pembelajaran Taman Belajar Sedjati')

@section('description', Str::limit($media->description, 160))

@php
    $galleryUrls = $media->gallery_urls;
    $primaryImage = $media->image_url ?? ($galleryUrls[0] ?? asset('images/hero.jpg'));
    $schemaImages = $galleryUrls;

    if (empty($schemaImages)) {
        $schemaImages = $media->image_url ? [$media->image_url] : [asset('images/hero.jpg')];
    }
@endphp

@section('og:image', $primaryImage)

@section('schema')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Product",
      "name": "{{ $media->title }}",
      "description": "{{ Str::limit($media->description, 200) }}",
      "image": {!! json_encode($schemaImages, JSON_UNESCAPED_SLASHES) !!},
      "url": "{{ route('media-pembelajaran.show', $media->slug) }}",
      "brand": {
        "@@type": "Brand",
        "name": "Taman Belajar Sedjati"
      },
      "seller": {
        "@@type": "Organization",
        "name": "Taman Belajar Sedjati",
        "url": "{{ url('/') }}"
      },
      "offers": {
        "@@type": "Offer",
        "priceCurrency": "IDR",
        "price": "{{ $media->price }}",
        "availability": "{{ is_null($media->stock) || $media->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Beranda",
          "item": "{{ url('/') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Media Pembelajaran",
          "item": "{{ route('media-pembelajaran') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "{{ $media->title }}",
          "item": "{{ route('media-pembelajaran.show', $media->slug) }}"
        }
      ]
    }
    </script>
@endsection

@section('content')

    <section class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center text-sm mb-4">
                <a href="{{ route('media-pembelajaran') }}" class="hover:text-emerald-200 transition">Media Pembelajaran</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-emerald-200">{{ $media->title }}</span>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    @if($primaryImage)
                        <div class="rounded-xl overflow-hidden shadow-lg mb-8">
                            <div class="relative group">
                                <img id="media-main-image" src="{{ $primaryImage }}" alt="{{ $media->title }}"
                                    class="w-full h-auto transition duration-300">
                                @if(count($galleryUrls) > 1)
                                    <button type="button" data-gallery-prev
                                        class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/90 text-emerald-700 rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:bg-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <button type="button" data-gallery-next
                                        class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/90 text-emerald-700 rounded-full w-10 h-10 flex items-center justify-center shadow-md hover:bg-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                @endif
                            </div>

                            @if(count($galleryUrls) > 1)
                                <div class="grid grid-cols-4 sm:grid-cols-6 gap-2 p-4 bg-gray-50">
                                    @foreach($galleryUrls as $index => $url)
                                        <button type="button" data-gallery-thumb="{{ $index }}"
                                            class="rounded-lg overflow-hidden border-2 {{ $index === 0 ? 'border-emerald-500' : 'border-transparent' }} hover:border-emerald-300 transition">
                                            <img src="{{ $url }}" alt="{{ $media->title }} {{ $index + 1 }}"
                                                class="w-full h-16 object-cover">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="rounded-xl overflow-hidden shadow-lg mb-8 h-96 bg-gradient-to-br from-emerald-400 to-teal-600 flex items-center justify-center">
                            <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    @endif

                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold">
                            {{ $media->category ?: 'Media Belajar' }}
                        </span>
                        @if($media->is_featured)
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold">
                                Produk Unggulan
                            </span>
                        @endif
                    </div>

                    <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $media->title }}</h1>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8 text-gray-600">
                        <div>
                            <p class="text-sm text-gray-500">Penulis</p>
                            <p class="font-medium text-gray-900">{{ $media->author ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Penerbit</p>
                            <p class="font-medium text-gray-900">{{ $media->publisher ?: '-' }}</p>
                        </div>
                    </div>

                    <div class="prose max-w-none">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Deskripsi Produk</h2>
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $media->description }}</p>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Informasi Produk</h3>

                        <div class="space-y-4 mb-6">
                            <div class="pb-4 border-b border-gray-200">
                                <p class="text-sm text-gray-500 mb-1">Harga</p>
                                <p class="text-3xl font-bold text-emerald-600">{{ $media->formatted_price }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">Kategori</p>
                                <p class="font-medium text-gray-900">{{ $media->category ?: 'Media Belajar' }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">Penulis</p>
                                <p class="font-medium text-gray-900">{{ $media->author ?: '-' }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">Penerbit</p>
                                <p class="font-medium text-gray-900">{{ $media->publisher ?: '-' }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">Stok</p>
                                <p class="font-medium text-gray-900">
                                    @if(is_null($media->stock))
                                        Hubungi Admin
                                    @elseif($media->stock > 0)
                                        Tersedia ({{ $media->stock }})
                                    @else
                                        Habis
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <a href="{{ $media->whatsapp_url }}" target="_blank"
                                class="w-full inline-flex items-center justify-center bg-emerald-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-emerald-700 transition duration-300 shadow-md hover:shadow-lg">
                                Pesan via WhatsApp
                            </a>
                            <a href="{{ route('media-pembelajaran') }}"
                                class="w-full inline-flex items-center justify-center bg-white text-emerald-600 border-2 border-emerald-500 px-6 py-3 rounded-lg font-semibold hover:bg-emerald-50 transition duration-300">
                                Kembali ke Katalog
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if($relatedItems->count() > 0)
                <div class="mt-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Media Lainnya</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedItems as $relatedItem)
                            <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">
                                @if($relatedItem->image_url)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ $relatedItem->image_url }}" alt="{{ $relatedItem->title }}"
                                            class="w-full h-full object-cover hover:scale-105 transition duration-300">
                                    </div>
                                @else
                                    <div class="h-48 bg-gradient-to-br from-emerald-400 to-teal-600 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                @endif

                                <div class="p-5">
                                    <p class="text-sm text-gray-500 mb-2">{{ $relatedItem->category ?: 'Media Belajar' }}</p>
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $relatedItem->title }}</h3>
                                    <p class="text-emerald-600 font-semibold mb-3">{{ $relatedItem->formatted_price }}</p>
                                    <a href="{{ route('media-pembelajaran.show', $relatedItem->slug) }}"
                                        class="inline-flex items-center text-emerald-600 font-semibold hover:text-emerald-700 transition duration-300">
                                        Lihat Selengkapnya
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mainImage = document.getElementById('media-main-image');
            if (!mainImage) return;

            const images = @json($galleryUrls);
            if (!images || images.length === 0) return;

            let index = 0;
            const thumbs = Array.from(document.querySelectorAll('[data-gallery-thumb]'));

            const setActive = (nextIndex) => {
                index = (nextIndex + images.length) % images.length;
                mainImage.src = images[index];
                thumbs.forEach((thumb, i) => {
                    thumb.classList.toggle('border-emerald-500', i === index);
                    thumb.classList.toggle('border-transparent', i !== index);
                });
            };

            document.querySelector('[data-gallery-prev]')?.addEventListener('click', () => {
                setActive(index - 1);
            });
            document.querySelector('[data-gallery-next]')?.addEventListener('click', () => {
                setActive(index + 1);
            });

            thumbs.forEach((thumb) => {
                thumb.addEventListener('click', () => {
                    setActive(Number(thumb.dataset.galleryThumb));
                });
            });
        });
    </script>
@endsection
