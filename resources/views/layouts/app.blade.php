<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Taman Belajar Sedjati - Belajar, Berkembang, Dan Berkarya Di Desa Gajah')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Meta Tags for SEO -->
    <meta name="description"
        content="@yield('description', 'Bimbel pelajaran utama yang ditujukan untuk para murid agar dapat belajar lebih fokus dan mendapatkan pendampingan dari guru secara privat di Desa Gajah.')">
    <meta name="keywords" content="bimbel, bimbingan belajar, desa gajah, bojonegoro, les privat, pendidikan">
    <meta name="author" content="Bimbel Pados Ilmu">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title"
        content="@yield('title', 'Taman Belajar Sedjati - Belajar, Berkembang, Dan Berkarya Di Desa Gajah')">
    <meta property="og:description"
        content="@yield('description', 'Bimbel pelajaran utama yang ditujukan untuk para murid agar dapat belajar lebih fokus dan mendapatkan pendampingan dari guru secara privat di Desa Gajah.')">
    <meta property="og:image" content="@yield('og:image', asset('images/hero.jpg'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title"
        content="@yield('title', 'Taman Belajar Sedjati - Belajar, Berkembang, Dan Berkarya Di Desa Gajah')">
    <meta property="twitter:description"
        content="@yield('description', 'Bimbel pelajaran utama yang ditujukan untuk para murid agar dapat belajar lebih fokus dan mendapatkan pendampingan dari guru secara privat di Desa Gajah.')">
    <meta property="twitter:image" content="@yield('og:image', asset('images/hero.jpg'))">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon-192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Organization Schema for Google SEO -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}"
    }
    </script>

    <!-- Custom Styles -->
    <style>
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #10b981;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #059669;
        }

        /* Content spacing for fixed navbar */
        .content-wrapper {
            padding-top: 80px;
            min-height: calc(100vh - 80px);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
    </style>

    @yield('styles')
</head>

<body class="bg-gray-50 font-sans antialiased">

    <!-- Navbar -->
    @include('layouts.nav')

    <!-- Main Content -->
    <main class="content-wrapper">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    @yield('scripts')

</body>

</html>
