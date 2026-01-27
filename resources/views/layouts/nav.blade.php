<nav class="bg-white shadow-md fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Taman Belajar Sedjati" class="h-10 w-auto">
                </a>
            </div>

            <!-- Desktop Menu - Centered -->
            <div class="hidden md:flex items-center space-x-8 flex-1 justify-center">
                <a href="{{ route('home') }}"
                    class="text-gray-700 hover:text-emerald-600 font-medium transition duration-300 {{ request()->routeIs('home') ? 'text-emerald-600' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('program') }}"
                    class="text-gray-700 hover:text-emerald-600 font-medium transition duration-300 {{ request()->routeIs('program') ? 'text-emerald-600' : '' }}">
                    Program
                </a>
                <a href="{{ route('jadwal') }}"
                    class="text-gray-700 hover:text-emerald-600 font-medium transition duration-300 {{ request()->routeIs('jadwal') ? 'text-emerald-600' : '' }}">
                    Jadwal Bimbel
                </a>
                <a href="{{ route('event') }}"
                    class="text-gray-700 hover:text-emerald-600 font-medium transition duration-300 {{ request()->routeIs('event') ? 'text-emerald-600' : '' }}">
                    Event & Kalender
                </a>
                <a href="{{ route('blog') }}"
                    class="text-gray-700 hover:text-emerald-600 font-medium transition duration-300 {{ request()->routeIs('blog') ? 'text-emerald-600' : '' }}">
                    Blog
                </a>
                <a href="{{ route('tentang') }}"
                    class="text-gray-700 hover:text-emerald-600 font-medium transition duration-300 {{ request()->routeIs('tentang') ? 'text-emerald-600' : '' }}">
                    Tentang
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden md:flex items-center">
                <a href="{{ route('pendaftaran') }}"
                    class="bg-emerald-500 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 shadow-md hover:shadow-lg">
                    Pendaftaran
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" type="button"
                    class="text-gray-700 hover:text-emerald-600 focus:outline-none focus:text-emerald-600">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-4 pt-2 pb-4 space-y-2">
            <a href="{{ route('home') }}"
                class="block px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg font-medium transition duration-300 {{ request()->routeIs('home') ? 'bg-emerald-50 text-emerald-600' : '' }}">
                Beranda
            </a>
            <a href="{{ route('program') }}"
                class="block px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg font-medium transition duration-300 {{ request()->routeIs('program') ? 'bg-emerald-50 text-emerald-600' : '' }}">
                Program
            </a>
            <a href="{{ route('jadwal') }}"
                class="block px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg font-medium transition duration-300 {{ request()->routeIs('jadwal') ? 'bg-emerald-50 text-emerald-600' : '' }}">
                Jadwal Bimbel
            </a>
            <a href="{{ route('event') }}"
                class="block px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg font-medium transition duration-300 {{ request()->routeIs('event') ? 'bg-emerald-50 text-emerald-600' : '' }}">
                Event & Kalender
            </a>
            <a href="{{ route('blog') }}"
                class="block px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg font-medium transition duration-300 {{ request()->routeIs('blog') ? 'bg-emerald-50 text-emerald-600' : '' }}">
                Blog
            </a>
            <a href="{{ route('tentang') }}"
                class="block px-4 py-3 text-gray-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-lg font-medium transition duration-300 {{ request()->routeIs('tentang') ? 'bg-emerald-50 text-emerald-600' : '' }}">
                Tentang
            </a>
            <a href="{{ route('pendaftaran') }}"
                class="block mt-3 bg-emerald-500 text-white px-4 py-3 rounded-lg font-semibold hover:bg-emerald-600 transition duration-300 text-center shadow-md">
                Pendaftaran
            </a>
        </div>
    </div>
</nav>

<script>
    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (event) => {
        const isClickInside = mobileMenuButton.contains(event.target) || mobileMenu.contains(event.target);
        if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // Close mobile menu when window is resized to desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });
</script>