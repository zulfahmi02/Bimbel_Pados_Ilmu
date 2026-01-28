@extends('layouts.app')

@section('title', 'Jadwal Bimbel - Taman Belajar Sedjati')

@section('description', 'Lihat jadwal bimbingan belajar siswa di Taman Belajar Sedjati. Temukan jadwal les dengan guru berpengalaman.')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl sm:text-5xl font-bold mb-4 fade-in">Jadwal Bimbel</h1>
        <p class="text-xl text-emerald-100 max-w-3xl mx-auto fade-in">
            Jadwal bimbingan belajar siswa di Taman Belajar Sedjati
        </p>
    </div>
</section>

<!-- Schedule Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if($schedules->isEmpty())
            <div class="text-center py-16">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-gray-500 text-lg">Belum ada jadwal yang tersedia</p>
            </div>
        @else
            <!-- Day Tabs -->
            <div class="mb-8">
                <div class="flex flex-wrap justify-center gap-2">
                    <button onclick="showDay('Semua')" 
                        class="day-tab px-4 py-2 rounded-lg font-medium text-sm transition duration-300 bg-white text-gray-700 border border-gray-300 hover:border-emerald-500"
                        data-day="Semua">
                        Semua Jadwal
                    </button>
                    @foreach($days as $index => $day)
                        <button onclick="showDay('{{ $day }}')" 
                            class="day-tab px-4 py-2 rounded-lg font-medium text-sm transition duration-300 {{ $index === 0 ? 'bg-emerald-500 text-white' : 'bg-white text-gray-700 border border-gray-300 hover:border-emerald-500' }}"
                            data-day="{{ $day }}">
                            {{ $day }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Schedule Tables -->
            @foreach($days as $index => $day)
                <div class="day-content {{ $index !== 0 ? 'hidden' : '' }}" id="day-{{ $day }}">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                        <h2 class="text-2xl font-bold text-gray-900 text-center sm:text-left">{{ $day }}</h2>
                        <button type="button"
                            class="share-schedule inline-flex items-center gap-2 px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-sm font-semibold transition duration-300 shadow-md hover:shadow-lg"
                            data-day="{{ $day }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 8a3 3 0 11-6 0 3 3 0 016 0zM19 21v-1a4 4 0 00-4-4H9a4 4 0 00-4 4v1m12-9l4 4m0 0l-4 4m4-4H9" />
                            </svg>
                            Share Jadwal
                        </button>
                    </div>
                    
                    @if(isset($schedules[$day]) && $schedules[$day]->count() > 0)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-emerald-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                                Nama Siswa
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                                Pelajaran
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                                Waktu
                                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">
                                Guru
                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($schedules[$day] as $schedule)
                                            <tr class="hover:bg-gray-50 transition duration-150">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $schedule->student_name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                                        {{ $schedule->subject }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                                </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $schedule->teacher->name ?? '-' }}
                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12 bg-white rounded-xl shadow-md">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-gray-500">Tidak ada jadwal untuk hari {{ $day }}</p>
                        </div>
                    @endif
                </div>
            @endforeach

            <!-- Semua Jadwal -->
            @php
                $allSchedules = $schedules->flatten(1);
            @endphp
            <div class="day-content hidden" id="day-Semua">
                <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Semua Jadwal</h2>
                @if($allSchedules->count() > 0)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-emerald-50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Hari</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Nama Siswa</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Pelajaran</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Waktu</th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-emerald-700 uppercase tracking-wider">Guru</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($allSchedules as $schedule)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $schedule->day_of_week }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $schedule->student_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                                    {{ $schedule->subject }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $schedule->teacher->name ?? '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="text-center py-12 bg-white rounded-xl shadow-md">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-gray-500">Tidak ada jadwal.</p>
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
            Ingin Bergabung?
        </h2>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
            Daftarkan anak Anda untuk mendapatkan bimbingan belajar terbaik dengan guru-guru berpengalaman
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('pendaftaran') }}" class="inline-block bg-emerald-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 shadow-lg hover:shadow-xl">
                Daftar Sekarang
            </a>
            <a href="https://wa.me/6282237343764?text=Halo,%20saya%20ingin%20bertanya%20tentang%20jadwal%20bimbel" target="_blank" class="inline-block bg-white text-emerald-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-50 transition duration-300 shadow-md hover:shadow-lg border-2 border-emerald-500">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@php
    $shareData = [];
    if (isset($days)) {
        $shareBaseUrl = route('jadwal');
        foreach ($days as $day) {
            $shareData[$day] = $shareBaseUrl . '?day=' . rawurlencode($day);
        }
    }
@endphp

<script>
const scheduleShareData = @json($shareData);

function showDay(day) {
    const target = document.getElementById('day-' + day);
    if (!target) {
        return;
    }

    // Hide all day contents
    document.querySelectorAll('.day-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Show selected day content
    target.classList.remove('hidden');
    
    // Update tab styles
    document.querySelectorAll('.day-tab').forEach(tab => {
        if (tab.dataset.day === day) {
            tab.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300', 'hover:border-emerald-500');
            tab.classList.add('bg-emerald-500', 'text-white');
        } else {
            tab.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300', 'hover:border-emerald-500');
            tab.classList.remove('bg-emerald-500', 'text-white');
        }
    });
}

document.querySelectorAll('.share-schedule').forEach(button => {
    button.addEventListener('click', async () => {
        const day = button.dataset.day;
        const url = scheduleShareData[day] || '';
        const title = 'Jadwal ' + day + ' - Taman Belajar Sedjati';

        if (!url) {
            return;
        }

        if (navigator.share) {
            try {
                await navigator.share({ title, url });
                return;
            } catch (error) {
                // Fall back to clipboard if share is cancelled or fails.
            }
        }

        if (navigator.clipboard && navigator.clipboard.writeText) {
            await navigator.clipboard.writeText(url);
            alert('Link jadwal berhasil disalin. Silakan tempelkan untuk dibagikan.');
        } else {
            prompt('Salin link jadwal berikut untuk dibagikan:', url);
        }
    });
});

const urlDay = new URLSearchParams(window.location.search).get('day');
if (urlDay) {
    showDay(urlDay);
}
</script>

@endsection
