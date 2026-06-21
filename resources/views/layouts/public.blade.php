<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMKS Karya Nugraha Boyolali</title>

        @if(!empty($settings['footer_logo_path']))
            <link rel="icon" type="image/png" href="{{ asset('storage/' . $settings['footer_logo_path']) }}">
        @else
            <link rel="icon" href="/favicon.ico">
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Swiper CSS & JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        
        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        
        <!-- Top Utility Bar (UGM Style) -->
        <div class="bg-[#0b1b36] text-gray-300 text-[11px] border-b border-white/10 hidden xl:block">
            <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 flex justify-between items-center h-9">
                <div class="flex items-center space-x-4">
                    <span class="flex items-center font-bold text-white tracking-wider gap-3">
                        <a href="{{ route('lang.switch', 'id') }}" class="{{ app()->getLocale() == 'id' ? 'text-white opacity-100' : 'text-gray-400 hover:text-white opacity-60 hover:opacity-100 transition' }} flex items-center gap-1.5" title="Bahasa Indonesia">
                            <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-[18px] rounded-[2px] shadow-sm">
                            <span class="text-[12px]">ID</span>
                        </a> 
                        <span class="text-gray-500 font-normal">|</span> 
                        <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'text-white opacity-100' : 'text-gray-400 hover:text-white opacity-60 hover:opacity-100 transition' }} flex items-center gap-1.5" title="English">
                            <i class="fas fa-globe-americas text-[14px]"></i>
                            <span class="text-[12px]">EN</span>
                        </a>
                    </span>
                </div>
                <div class="flex items-center space-x-7">
                    <a href="mailto:{{ $settings['school_email'] ?? 'info@smkknbi.sch.id' }}" class="hover:text-white transition tracking-widest uppercase">Email</a>
                    <a href="#" class="hover:text-white transition tracking-widest uppercase">Perpustakaan</a>
                    <a href="#" class="hover:text-white transition tracking-widest uppercase">Siswa</a>
                    <a href="#" class="hover:text-white transition tracking-widest uppercase">Guru & Staff</a>
                    <a href="#" class="hover:text-white transition tracking-widest uppercase">Alumni</a>
                    <a href="#" class="hover:text-white transition tracking-widest uppercase text-[#c29431] font-bold">E-Learning</a>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav x-data="{ mobileMenuOpen: false }" class="bg-[#0b1b36] border-b border-white/10 shadow-md sticky top-0 z-50">
            <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12">
                <div class="flex justify-between h-20 sm:h-24">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center pr-4 w-2/3 lg:w-auto">
                        <a href="{{ route('home') }}" class="flex items-center gap-3">
                            @if(!empty($settings['footer_logo_path']))
                                <img src="{{ asset('storage/' . $settings['footer_logo_path']) }}" alt="Logo" class="h-12 sm:h-14 object-contain">
                            @else
                                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-white rounded-full flex items-center justify-center text-[#0b1b36] font-bold text-xl shadow-sm shrink-0">
                                    KN
                                </div>
                            @endif
                            <div class="flex flex-col justify-center min-w-0">
                                <h1 class="font-serif font-bold text-[14px] sm:text-[18px] lg:text-[19px] xl:text-[20px] text-white leading-[1.1] uppercase tracking-wide">
                                    @php
                                        $schoolNameParts = explode(' ', $settings['school_name'] ?? 'SMKS KARYA NUGRAHA BOYOLALI', 3);
                                        $line1 = isset($schoolNameParts[0]) ? $schoolNameParts[0] . (isset($schoolNameParts[1]) ? ' ' . $schoolNameParts[1] : '') : 'SMKS KARYA';
                                        $line2 = isset($schoolNameParts[2]) ? $schoolNameParts[2] : 'NUGRAHA BOYOLALI';
                                    @endphp
                                    {{ $line1 }}<br/>{{ $line2 }}
                                </h1>
                            </div>
                        </a>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden xl:flex xl:items-center space-x-1 lg:space-x-4">
                        <a href="{{ route('home') }}" class="text-gray-100 hover:text-[#c29431] font-bold h-full flex items-center px-3 border-b-[5px] {{ request()->routeIs('home') ? 'border-[#c29431]' : 'border-transparent' }} hover:border-[#c29431] transition uppercase tracking-wider text-[13px]">{{ __('Beranda') }}</a>
                        
                        <!-- Tentang Kami Dropdown -->
                        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative h-full flex items-center">
                            <button class="flex items-center text-gray-100 hover:text-[#c29431] font-bold h-full px-3 border-b-[5px] border-transparent hover:border-[#c29431] transition uppercase tracking-wider text-[13px]">
                                {{ __('Tentang Kami') }}
                                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-full left-0 w-60 bg-white border-t-[3px] border-[#c29431] shadow-xl py-3" style="display: none;">
                                <a href="#" class="block px-6 py-2.5 text-[13px] font-bold text-gray-600 hover:bg-gray-50 hover:text-[#c29431] transition uppercase tracking-wide">{{ __('Sejarah') }}</a>
                                <a href="#" class="block px-6 py-2.5 text-[13px] font-bold text-gray-600 hover:bg-gray-50 hover:text-[#c29431] transition uppercase tracking-wide">{{ __('Visi & Misi') }}</a>
                                <a href="#" class="block px-6 py-2.5 text-[13px] font-bold text-gray-600 hover:bg-gray-50 hover:text-[#c29431] transition uppercase tracking-wide">{{ __('Struktur Organisasi') }}</a>
                            </div>
                        </div>

                        <!-- Jurusan Dropdown -->
                        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative h-full flex items-center">
                            <button class="flex items-center text-gray-100 hover:text-[#c29431] font-bold h-full px-3 border-b-[5px] border-transparent hover:border-[#c29431] transition uppercase tracking-wider text-[13px]">
                                {{ __('Jurusan') }}
                                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-full left-0 w-72 bg-white border-t-[3px] border-[#c29431] shadow-xl py-3" style="display: none;">
                                @foreach(\App\Models\Major::all() as $major)
                                    <a href="{{ route('majors.show', $major->slug) }}" class="block px-6 py-2.5 text-[13px] font-bold text-gray-600 hover:bg-gray-50 hover:text-[#c29431] transition uppercase tracking-wide">{{ app()->getLocale() == 'en' && $major->name_en ? $major->name_en : $major->name }}</a>
                                @endforeach
                            </div>
                        </div>

                        <a href="{{ route('posts.public') }}" class="text-gray-100 hover:text-[#c29431] font-bold h-full flex items-center px-3 border-b-[5px] {{ request()->routeIs('posts.*') ? 'border-[#c29431]' : 'border-transparent' }} hover:border-[#c29431] transition uppercase tracking-wider text-[13px]">{{ __('Berita') }}</a>
                        
                        <!-- Ekstrakurikuler Dropdown -->
                        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative h-full flex items-center">
                            <button class="flex items-center text-gray-100 hover:text-[#c29431] font-bold h-full px-3 border-b-[5px] border-transparent hover:border-[#c29431] transition uppercase tracking-wider text-[13px]">
                                {{ __('Ekstrakurikuler') }}
                                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-full left-0 w-72 bg-white border-t-[3px] border-[#c29431] shadow-xl py-3" style="display: none;">
                                @foreach(\App\Models\Extracurricular::all() as $ekskul)
                                    <a href="{{ route('extracurriculars.show', $ekskul->slug) }}" class="block px-6 py-2.5 text-[13px] font-bold text-gray-600 hover:bg-gray-50 hover:text-[#c29431] transition uppercase tracking-wide">{{ app()->getLocale() == 'en' && $ekskul->name_en ? $ekskul->name_en : $ekskul->name }}</a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Layanan Dropdown -->
                        <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative h-full flex items-center">
                            <button class="flex items-center text-gray-100 hover:text-[#c29431] font-bold h-full px-3 border-b-[5px] border-transparent hover:border-[#c29431] transition uppercase tracking-wider text-[13px]">
                                {{ __('Layanan') }}
                                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" x-transition.opacity.duration.200ms class="absolute top-full left-0 w-60 bg-white border-t-[3px] border-[#c29431] shadow-xl py-3" style="display: none;">
                                <a href="#" class="block px-6 py-2.5 text-[13px] font-bold text-gray-600 hover:bg-gray-50 hover:text-[#c29431] transition uppercase tracking-wide">{{ __('Fasilitas Sekolah') }}</a>
                                <a href="#" class="block px-6 py-2.5 text-[13px] font-bold text-gray-600 hover:bg-gray-50 hover:text-[#c29431] transition uppercase tracking-wide">{{ __('Bursa Kerja Khusus') }}</a>
                            </div>
                        </div>

                        <a href="https://spmb.smkknbi.sch.id" target="_blank" class="text-gray-100 hover:text-[#c29431] font-bold h-full flex items-center px-3 border-b-[5px] border-transparent hover:border-[#c29431] transition uppercase tracking-wider text-[13px]">SPMB</a>

                        <!-- Search Button -->
                        <button class="ml-2 text-gray-100 hover:text-[#c29431] transition p-2">
                            <i class="fas fa-search text-[17px]"></i>
                        </button>
                    </div>

                    <!-- Mobile Hamburger -->
                    <div class="flex items-center xl:hidden shrink-0">
                        <!-- Search Mobile -->
                        <button class="mr-2 text-gray-100 hover:text-[#c29431] transition p-2">
                            <i class="fas fa-search text-xl"></i>
                        </button>
                        <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
                            <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': mobileMenuOpen, 'inline-flex': !mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 @click.away="mobileMenuOpen = false"
                 class="xl:hidden bg-white border-t border-gray-200 shadow-2xl absolute w-full z-40 origin-top"
                 style="display: none;">
                <div class="pt-2 pb-6 space-y-1">
                    <!-- Mobile Language Switcher -->
                    <div class="px-6 py-4 flex items-center justify-between border-b border-gray-100 mb-2 bg-gray-50/50">
                        <span class="text-[13px] font-bold text-[#0b1b36] uppercase tracking-wider">{{ __('Pilih Bahasa') }}</span>
                        <div class="flex items-center bg-gray-100 p-1 rounded-lg">
                            <a href="{{ route('lang.switch', 'id') }}" class="flex items-center gap-2 px-4 py-2 rounded-md transition-all {{ app()->getLocale() == 'id' ? 'bg-white shadow-sm text-[#0b1b36] font-bold' : 'text-gray-500 hover:text-[#0b1b36]' }}">
                                <img src="https://flagcdn.com/w20/id.png" alt="ID" class="w-4 rounded-[2px]"> <span class="text-xs">ID</span>
                            </a>
                            <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-2 px-4 py-2 rounded-md transition-all {{ app()->getLocale() == 'en' ? 'bg-white shadow-sm text-[#0b1b36] font-bold' : 'text-gray-500 hover:text-[#0b1b36]' }}">
                                <i class="fas fa-globe-americas"></i> <span class="text-xs">EN</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('home') }}" class="block px-6 py-3 {{ request()->routeIs('home') ? 'bg-gray-50 text-[#c29431] border-l-4 border-[#c29431]' : 'text-[#0b1b36] border-l-4 border-transparent hover:bg-gray-50' }} font-bold text-[14px] transition uppercase tracking-wider">{{ __('Beranda') }}</a>
                    
                    <!-- Mobile Tentang Kami Accordion -->
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-[#0b1b36] border-l-4 border-transparent hover:bg-gray-50 font-bold text-[14px] transition uppercase tracking-wider">
                            {{ __('Tentang Kami') }}
                            <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': subOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="subOpen" class="bg-gray-50 border-y border-gray-100" style="display: none;">
                            <a href="#" class="block px-10 py-3 text-[13px] font-bold text-gray-500 hover:text-[#c29431] uppercase tracking-wide border-b border-gray-200/50">{{ __('Sejarah') }}</a>
                            <a href="#" class="block px-10 py-3 text-[13px] font-bold text-gray-500 hover:text-[#c29431] uppercase tracking-wide border-b border-gray-200/50">{{ __('Visi & Misi') }}</a>
                            <a href="#" class="block px-10 py-3 text-[13px] font-bold text-gray-500 hover:text-[#c29431] uppercase tracking-wide">{{ __('Struktur Organisasi') }}</a>
                        </div>
                    </div>

                    <!-- Mobile Jurusan Accordion -->
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-[#0b1b36] border-l-4 border-transparent hover:bg-gray-50 font-bold text-[14px] transition uppercase tracking-wider">
                            {{ __('Jurusan') }}
                            <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': subOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="subOpen" class="bg-gray-50 border-y border-gray-100" style="display: none;">
                            @foreach(\App\Models\Major::all() as $major)
                                <a href="{{ route('majors.show', $major->slug) }}" class="block px-10 py-3 text-[13px] font-bold text-gray-500 hover:text-[#c29431] uppercase tracking-wide {{ !$loop->last ? 'border-b border-gray-200/50' : '' }}">{{ app()->getLocale() == 'en' && $major->name_en ? $major->name_en : $major->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('posts.public') }}" class="block px-6 py-3 {{ request()->routeIs('posts.*') ? 'bg-gray-50 text-[#c29431] border-l-4 border-[#c29431]' : 'text-[#0b1b36] border-l-4 border-transparent hover:bg-gray-50' }} font-bold text-[14px] transition uppercase tracking-wider">{{ __('Berita') }}</a>
                    
                    <!-- Mobile Ekstrakurikuler Accordion -->
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-[#0b1b36] border-l-4 border-transparent hover:bg-gray-50 font-bold text-[14px] transition uppercase tracking-wider">
                            {{ __('Ekstrakurikuler') }}
                            <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': subOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="subOpen" class="bg-gray-50 border-y border-gray-100" style="display: none;">
                            @foreach(\App\Models\Extracurricular::all() as $ekskul)
                                <a href="{{ route('extracurriculars.show', $ekskul->slug) }}" class="block px-10 py-3 text-[13px] font-bold text-gray-500 hover:text-[#c29431] uppercase tracking-wide {{ !$loop->last ? 'border-b border-gray-200/50' : '' }}">{{ app()->getLocale() == 'en' && $ekskul->name_en ? $ekskul->name_en : $ekskul->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Mobile Layanan Accordion -->
                    <div x-data="{ subOpen: false }">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-[#0b1b36] border-l-4 border-transparent hover:bg-gray-50 font-bold text-[14px] transition uppercase tracking-wider">
                            {{ __('Layanan') }}
                            <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': subOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="subOpen" class="bg-gray-50 border-y border-gray-100" style="display: none;">
                            <a href="#" class="block px-10 py-3 text-[13px] font-bold text-gray-500 hover:text-[#c29431] uppercase tracking-wide border-b border-gray-200/50">{{ __('Fasilitas Sekolah') }}</a>
                            <a href="#" class="block px-10 py-3 text-[13px] font-bold text-gray-500 hover:text-[#c29431] uppercase tracking-wide">{{ __('Bursa Kerja Khusus') }}</a>
                        </div>
                    </div>

                    <a href="https://spmb.smkknbi.sch.id" target="_blank" class="block px-6 py-3 text-[#0b1b36] border-l-4 border-transparent hover:bg-gray-50 font-bold text-[14px] transition uppercase tracking-wider">SPMB</a>
                    
                    <div class="mt-4 px-6 pt-4 border-t border-gray-200">
                        <a href="mailto:{{ $settings['school_email'] ?? 'info@smkknbi.sch.id' }}" class="block py-2.5 text-[13px] text-gray-500 hover:text-[#c29431] uppercase font-bold tracking-widest">Email</a>
                        <a href="#" class="block py-2.5 text-[13px] text-gray-500 hover:text-[#c29431] uppercase font-bold tracking-widest">Perpustakaan</a>
                        <a href="#" class="block py-2.5 text-[13px] text-gray-500 hover:text-[#c29431] uppercase font-bold tracking-widest">Siswa</a>
                        <a href="#" class="block py-2.5 text-[13px] text-gray-500 hover:text-[#c29431] uppercase font-bold tracking-widest">Guru & Staff</a>
                        <a href="#" class="block py-2.5 text-[13px] text-gray-500 hover:text-[#c29431] uppercase font-bold tracking-widest">Alumni</a>
                        <a href="#" class="block py-2.5 text-[13px] text-[#c29431] hover:text-[#0b1b36] uppercase font-bold tracking-widest">E-Learning</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer (UGM Centered Style) -->
        <footer id="kontak" class="bg-[#0b1b36] text-white py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center">
                
                <!-- Social Media Icons -->
                <div class="flex items-center justify-center gap-6 mb-10 text-xl">
                    @if(!empty($settings['school_instagram']))
                        <a href="{{ $settings['school_instagram'] }}" target="_blank" class="hover:text-gray-300 transition"><i class="fab fa-instagram"></i></a>
                    @endif

                    @if(!empty($settings['school_youtube']))
                        <a href="{{ $settings['school_youtube'] }}" target="_blank" class="hover:text-gray-300 transition"><i class="fab fa-youtube"></i></a>
                    @endif

                    @if(!empty($settings['school_facebook']))
                        <a href="{{ $settings['school_facebook'] }}" target="_blank" class="hover:text-gray-300 transition"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    
                    @if(!empty($settings['school_x_twitter']))
                        <a href="{{ $settings['school_x_twitter'] }}" target="_blank" class="hover:text-gray-300 transition"><i class="fab fa-x-twitter"></i></a>
                    @endif
                    
                    @if(!empty($settings['school_linkedin']))
                        <a href="{{ $settings['school_linkedin'] }}" target="_blank" class="hover:text-gray-300 transition"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    
                    @if(!empty($settings['school_tiktok']))
                        <a href="{{ $settings['school_tiktok'] }}" target="_blank" class="hover:text-gray-300 transition"><i class="fab fa-tiktok"></i></a>
                    @endif
                </div>

                <!-- Logo & School Name -->
                <div class="flex items-center gap-4 mb-8">
                    @if(!empty($settings['footer_logo_path']))
                        <img src="{{ asset('storage/' . $settings['footer_logo_path']) }}" alt="Footer Logo" class="h-16 object-contain">
                    @else
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-[#0b1b36] font-bold text-2xl shadow-lg shrink-0">
                            KN
                        </div>
                    @endif
                    <div class="text-left">
                        @php
                            $schoolNameParts = explode(' ', $settings['school_name'] ?? 'SMKS KARYA NUGRAHA BOYOLALI', 3);
                            $line1 = isset($schoolNameParts[0]) ? $schoolNameParts[0] . (isset($schoolNameParts[1]) ? ' ' . $schoolNameParts[1] : '') : 'SMKS KARYA';
                            $line2 = isset($schoolNameParts[2]) ? $schoolNameParts[2] : 'NUGRAHA BOYOLALI';
                        @endphp
                        <h2 class="font-serif text-xl sm:text-2xl tracking-widest leading-snug uppercase">
                            {{ $line1 }}<br>{{ $line2 }}
                        </h2>
                    </div>
                </div>

                <!-- Address -->
                <div class="mb-6 max-w-lg mx-auto text-sm sm:text-base leading-relaxed">
                    <div class="flex items-start justify-center">
                        <i class="fas fa-map-marker-alt mt-1.5 mr-2 shrink-0"></i>
                        <span class="inline-block text-center">
                            {{ app()->getLocale() == 'en' && !empty($settings['school_address_en']) ? $settings['school_address_en'] : ($settings['school_address'] ?? 'Jl. Pandanaran No. 123, Boyolali, Jawa Tengah, Indonesia 57311') }}
                        </span>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="text-sm sm:text-base text-gray-200 tracking-wide font-light">
                    E: {{ $settings['school_email'] ?? 'info@smkknboyolali.sch.id' }} 
                    <span class="mx-2 font-normal">|</span> 
                    P: {{ $settings['school_phone'] ?? '(0276) 321xxx' }}
                </div>

            </div>
        </footer>

        <!-- Font Awesome (for icons) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    </body>
</html>
