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
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">{{ $day }}</h2>
                    
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
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $schedule->teacher->name ?? '-' }}
                                                        </div>
                                                        @if($schedule->teacher && $schedule->teacher->whatsapp)
                                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $schedule->teacher->whatsapp) }}" 
                                                               target="_blank"
                                                               class="ml-3 inline-flex items-center justify-center w-8 h-8 bg-green-500 hover:bg-green-600 text-white rounded-full transition duration-300 shadow-md hover:shadow-lg"
                                                               title="Hubungi via WhatsApp">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                    </div>
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

<script>
function showDay(day) {
    // Hide all day contents
    document.querySelectorAll('.day-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Show selected day content
    document.getElementById('day-' + day).classList.remove('hidden');
    
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
</script>

@endsection
