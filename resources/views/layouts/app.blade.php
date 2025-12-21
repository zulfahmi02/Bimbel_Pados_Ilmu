<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Bimbel Pados Ilmu - Belajar, Berkembang, Dan Berkarya Di Desa Gajah')</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="@yield('description', 'Bimbel pelajaran utama yang ditujukan untuk para murid agar dapat belajar lebih fokus dan mendapatkan pendampingan dari guru secara privat di Desa Gajah.')">
    <meta name="keywords" content="bimbel, bimbingan belajar, desa gajah, bojonegoro, les privat, pendidikan">
    <meta name="author" content="Bimbel Pados Ilmu">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
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