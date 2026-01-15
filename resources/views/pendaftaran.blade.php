@extends('layouts.app')

@section('title', 'Pendaftaran - Taman Belajar Sedjati')

@section('description', 'Daftar sekarang di Taman Belajar Sedjati dan dapatkan bimbingan belajar terbaik untuk meningkatkan prestasi akademik Anda.')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4 fade-in">Pendaftaran</h1>
            <p class="text-xl text-emerald-100 max-w-3xl mx-auto fade-in">
                Daftar sekarang dan mulai perjalanan belajar Anda bersama kami
            </p>
        </div>
    </section>

    <!-- Success Message -->
    @if(session('success'))
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-emerald-700 font-medium">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Registration Form Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Formulir Pendaftaran</h2>
                    <p class="text-gray-600">
                        Isi formulir di bawah ini dan kami akan menghubungi Anda segera
                    </p>
                </div>

                <form id="registrationForm" class="space-y-6" onsubmit="sendWhatsApp(event)">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300"
                            placeholder="Masukkan nama siswa">
                    </div>

                    <!-- Kelas -->
                    <div>
                        <label for="kelas" class="block text-sm font-semibold text-gray-700 mb-2">
                            Kelas <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="kelas" name="kelas" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300"
                            placeholder="Contoh: 7 SMP, 10 SMA">
                    </div>

                    <!-- Sekolah -->
                    <div>
                        <label for="sekolah" class="block text-sm font-semibold text-gray-700 mb-2">
                            Sekolah <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="sekolah" name="sekolah" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300"
                            placeholder="Nama sekolah">
                    </div>

                    <!-- Alamat Rumah -->
                    <div>
                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                            Alamat Rumah <span class="text-red-500">*</span>
                        </label>
                        <textarea id="alamat" name="alamat" rows="3" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300"
                            placeholder="Alamat lengkap rumah"></textarea>
                    </div>

                    <!-- Nama Wali -->
                    <div>
                        <label for="nama_wali" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Wali <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nama_wali" name="nama_wali" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300"
                            placeholder="Nama orang tua/wali">
                    </div>

                    <!-- Bimbel -->
                    <div>
                        <label for="bimbel" class="block text-sm font-semibold text-gray-700 mb-2">
                            Bimbel <span class="text-red-500">*</span>
                        </label>
                        <select id="bimbel" name="bimbel" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300">
                            <option value="">Pilih Program Bimbel</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->title }}" {{ request('program') == $program->title ? 'selected' : '' }}>{{ $program->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-emerald-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 shadow-lg hover:shadow-xl flex items-center justify-center">
                            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                            Kirim ke WhatsApp
                        </button>
                    </div>

                    <p class="text-sm text-gray-500 text-center">
                        Dengan mendaftar, Anda akan diarahkan ke WhatsApp untuk mengirim pesan pendaftaran
                    </p>
                </form>

                <script>
                    function sendWhatsApp(event) {
                        event.preventDefault();

                        // Ambil nilai dari form
                        const nama = document.getElementById('nama').value;
                        const kelas = document.getElementById('kelas').value;
                        const sekolah = document.getElementById('sekolah').value;
                        const alamat = document.getElementById('alamat').value;
                        const namaWali = document.getElementById('nama_wali').value;
                        const bimbel = document.getElementById('bimbel').value;

                        // Format pesan WhatsApp
                        const message = `Form pendaftaran kursus *Taman Belajar Sedjati* :%0A%0A` +
                            `* Nama : ${nama}%0A` +
                            `* Kelas : ${kelas}%0A` +
                            `* Sekolah : ${sekolah}%0A` +
                            `* Alamat rumah : ${alamat}%0A` +
                            `* Nama wali : ${namaWali}%0A` +
                            `* Bimbel : ${bimbel}`;

                        // Nomor WhatsApp tujuan (ganti dengan nomor yang benar)
                        const phoneNumber = '6282237343764'; // Ganti dengan nomor WhatsApp tujuan

                        // Buka WhatsApp
                        const whatsappURL = `https://wa.me/${phoneNumber}?text=${message}`;
                        window.open(whatsappURL, '_blank');
                    }
                </script>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Kenapa Harus Daftar Sekarang?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Dapatkan berbagai keuntungan dengan mendaftar di Bimbel Pados Ilmu
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Jadwal Fleksibel</h3>
                    <p class="text-gray-600">Atur jadwal belajar sesuai dengan kesibukan Anda</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Guru Berpengalaman</h3>
                    <p class="text-gray-600">Belajar dengan guru profesional dan berpengalaman</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Konsultasi Gratis</h3>
                    <p class="text-gray-600">Dapatkan konsultasi gratis sebelum memulai program</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Punya Pertanyaan?</h2>
            <p class="text-gray-600 mb-8">
                Hubungi kami melalui WhatsApp untuk informasi lebih lanjut
            </p>
            <a href="https://wa.me/6282237343764?text=Halo,%20saya%20ingin%20bertanya%20tentang%20pendaftaran%20di%20Bimbel%20Pados%20Ilmu"
                target="_blank"
                class="inline-flex items-center bg-green-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-green-700 transition duration-300 shadow-lg hover:shadow-xl">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                </svg>
                Hubungi via WhatsApp
            </a>
        </div>
    </section>

@endsection
