@extends('layouts.app')

@section('title', 'Program - Taman Belajar Sedjati')

@section('description', 'Program bimbingan belajar untuk SD, SMP, dan SMA dengan metode pembelajaran yang efektif dan guru berpengalaman di Desa Gajah, Bojonegoro.')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold mb-4 fade-in">Program Bimbingan Belajar</h1>
        <p class="text-xl text-emerald-100 max-w-3xl mx-auto fade-in">
            Pilih program yang sesuai dengan kebutuhan belajar Anda. Kami menyediakan berbagai program untuk semua jenjang pendidikan.
        </p>
    </div>
</section>

<!-- Filter Section -->
<section class="bg-white py-8 shadow-md sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-3">
            <button onclick="filterProgram('all')" class="filter-btn active px-4 py-1.5 rounded-lg font-medium text-sm transition duration-300">
                Semua Program
            </button>
            <button onclick="filterProgram('sd')" class="filter-btn px-4 py-1.5 rounded-lg font-medium text-sm transition duration-300">
                SD
            </button>
            <button onclick="filterProgram('smp')" class="filter-btn px-4 py-1.5 rounded-lg font-medium text-sm transition duration-300">
                SMP
            </button>
            <button onclick="filterProgram('sma')" class="filter-btn px-4 py-1.5 rounded-lg font-medium text-sm transition duration-300">
                SMA
            </button>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="programs-container">
            @forelse($programs as $program)
                <div class="program-card bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300" data-category="{{ $program->category }}">
                    @if($program->image)
                        <div class="h-48 overflow-hidden rounded-t-xl">
                            <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="h-48 bg-gradient-to-br from-{{ $program->category == 'sd' ? 'blue' : ($program->category == 'smp' ? 'purple' : 'orange') }}-400 to-{{ $program->category == 'sd' ? 'blue' : ($program->category == 'smp' ? 'purple' : 'orange') }}-600 flex items-center justify-center rounded-t-xl">
                            <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold uppercase">
                                {{ $program->category }}
                            </span>
                            @if($program->is_premium)
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold">
                                    Premium
                                </span>
                            @endif
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $program->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $program->description }}</p>
                        
                        @if(is_array($program->subjects) && count($program->subjects) > 0)
                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Mata Pelajaran:</h4>
                                <ul class="space-y-2">
                                    @foreach($program->subjects as $subject)
                                        <li class="flex items-center text-gray-700 text-sm">
                                            <svg class="w-4 h-4 text-emerald-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $subject }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if(is_array($program->facilities) && count($program->facilities) > 0)
                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-900 mb-2">Fasilitas:</h4>
                                <ul class="space-y-2">
                                    @foreach($program->facilities as $facility)
                                        <li class="flex items-center text-gray-700 text-sm">
                                            <svg class="w-4 h-4 text-emerald-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $facility }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="border-t pt-4 mt-4">
                            <div class="flex items-center justify-between mb-3">
                                <div>
                                    <p class="text-sm text-gray-600">Harga</p>
                                    <p class="text-2xl font-bold text-emerald-600">Rp {{ number_format($program->price, 0, ',', '.') }}</p>
                                    <p class="text-xs text-gray-500">per bulan</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-600">Durasi</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $program->duration }}</p>
                                </div>
                            </div>
                            
                            @if($program->max_students)
                                <p class="text-sm text-gray-600 mb-4">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    Maks. {{ $program->max_students }} siswa
                                </p>
                            @endif
                            
                            <a href="{{ route('pendaftaran') }}" class="block w-full bg-emerald-500 text-white text-center px-6 py-3 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <p class="text-gray-500 text-lg">Belum ada program yang tersedia</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Masih Bingung Pilih Program?
        </h2>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
            Hubungi kami untuk konsultasi gratis dan temukan program yang paling sesuai dengan kebutuhan belajar Anda
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20konsultasi%20tentang%20program%20bimbel" target="_blank" class="inline-block bg-emerald-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 shadow-lg hover:shadow-xl">
                Konsultasi via WhatsApp
            </a>
            <a href="{{ route('pendaftaran') }}" class="inline-block bg-white text-gray-800 px-8 py-4 rounded-lg font-semibold hover:bg-gray-50 transition duration-300 shadow-md hover:shadow-lg border-2 border-gray-300">
                Langsung Daftar
            </a>
        </div>
    </div>
</section>

<script>
function filterProgram(category) {
    const cards = document.querySelectorAll('.program-card');
    const buttons = document.querySelectorAll('.filter-btn');
    
    // Update button states
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Filter cards
    cards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<style>
.filter-btn {
    background-color: white;
    color: #374151;
    border: 2px solid #e5e7eb;
}

.filter-btn:hover {
    background-color: #f3f4f6;
    border-color: #10b981;
}

.filter-btn.active {
    background-color: #10b981;
    color: white;
    border-color: #10b981;
}
</style>

@endsection