<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

        @php
            $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
        @endphp
        @if(!empty($settings['footer_logo_path']))
            <link rel="icon" type="image/png" href="{{ asset('storage/' . $settings['footer_logo_path']) }}">
        @else
            <link rel="icon" href="/favicon.ico">
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 flex" x-data="{ sidebarOpen: false }">
        
        <!-- Sidebar Navigation -->
        <aside class="fixed inset-y-0 left-0 bg-primary-900 w-64 text-white transition-transform duration-300 transform z-30 flex flex-col" 
               :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'md:translate-x-0': true}">
            <div class="h-16 flex items-center px-6 bg-primary-950 border-b border-primary-800 shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-white rounded flex items-center justify-center text-primary-900 font-bold text-sm">
                        KN
                    </div>
                    <span class="font-bold text-lg tracking-wider">Portal Admin</span>
                </a>
            </div>
            
            <nav class="p-4 space-y-2 flex-1 overflow-y-auto mt-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-tachometer-alt w-5 text-center"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-primary-400 uppercase tracking-wider">Manajemen Konten</p>
                </div>
                
                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.posts.*') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-newspaper w-5 text-center"></i>
                    <span class="font-medium">Berita & Pengumuman</span>
                </a>
                
                <a href="{{ route('admin.sliders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.sliders.*') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-images w-5 text-center"></i>
                    <span class="font-medium">Gambar Slider</span>
                </a>

                <a href="{{ route('admin.majors.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.majors.*') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-graduation-cap w-5 text-center"></i>
                    <span class="font-medium">Data Jurusan</span>
                </a>

                <a href="{{ route('admin.extracurriculars.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.extracurriculars.*') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-futbol w-5 text-center"></i>
                    <span class="font-medium">Ekstrakurikuler</span>
                </a>
                
                <a href="{{ route('admin.achievements.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.achievements.*') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-trophy w-5 text-center"></i>
                    <span class="font-medium">Prestasi</span>
                </a>
                
                <a href="{{ route('admin.teachers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.teachers.*') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span class="font-medium">Data Guru & Staf</span>
                </a>
                
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-primary-400 uppercase tracking-wider">Pengaturan</p>
                </div>
                
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.settings.index') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-cogs w-5 text-center"></i>
                    <span class="font-medium">Profil Sekolah</span>
                </a>

                <a href="{{ route('admin.settings.sejarah') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.settings.sejarah') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-landmark w-5 text-center"></i>
                    <span class="font-medium">Sejarah Sekolah</span>
                </a>

                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition {{ request()->routeIs('profile.edit') ? 'bg-primary-800 text-white shadow-md' : 'text-primary-200 hover:bg-primary-800 hover:text-white' }}">
                    <i class="fas fa-user-cog w-5 text-center"></i>
                    <span class="font-medium">Profil Admin</span>
                </a>
            </nav>

            <div class="p-4 border-t border-primary-800 shrink-0">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-primary-700 flex items-center justify-center text-white font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-primary-300 truncate">Administrator</p>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition shadow-sm">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-h-screen transition-all duration-300 md:ml-64 relative w-full">
            
            <!-- Top Header -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-4 sm:px-6 z-20 shrink-0">
                <!-- Mobile Sidebar Toggle -->
                <button @click="sidebarOpen = true" class="md:hidden text-gray-500 hover:text-primary-600 focus:outline-none bg-gray-100 p-2 rounded-md">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                @isset($header)
                    <div class="hidden md:block font-bold text-xl text-gray-800 leading-tight">
                        {{ $header }}
                    </div>
                @else
                    <div class="hidden md:block"></div>
                @endisset

                <!-- Right Menu -->
                <div class="flex items-center ms-auto gap-3 sm:gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition flex items-center gap-2 bg-gray-100 hover:bg-primary-50 px-3 py-1.5 rounded-md">
                        <i class="fas fa-external-link-alt"></i> <span class="hidden sm:inline">Lihat Web</span>
                    </a>
                    
                    <div class="h-6 w-px bg-gray-300 hidden sm:block"></div>

                    <!-- Profile Dropdown -->
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none transition">
                            <span class="hidden sm:block">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 ring-1 ring-black ring-opacity-5 z-50 border border-gray-100" style="display: none;">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition"><i class="fas fa-user w-5 text-center text-gray-400"></i> Profil Saya</a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition"><i class="fas fa-sign-out-alt w-5 text-center"></i> Keluar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto bg-gray-50">
                {{ $slot }}
            </main>
        </div>

        <!-- Mobile Overlay -->
        <div x-show="sidebarOpen" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-20 md:hidden transition-opacity backdrop-blur-sm" @click="sidebarOpen = false" style="display: none;"></div>
        
    </body>
</html>
