<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">
        <div class="min-h-screen flex">
            <!-- Left Side: Branding/Image (Hidden on mobile) -->
            <div class="hidden lg:flex lg:w-1/2 bg-primary-900 relative overflow-hidden items-center justify-center">
                <!-- Abstract Pattern -->
                <div class="absolute inset-0 opacity-20">
                    <svg class="absolute inset-0 h-full w-full" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="squares" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse"><rect x="0" y="0" width="2" height="2" fill="currentColor"></rect></pattern></defs><rect width="100%" height="100%" fill="url(#squares)"></rect></svg>
                </div>
                
                <div class="relative z-10 px-12 text-center flex flex-col items-center">
                    <div class="w-24 h-24 bg-white rounded-2xl flex items-center justify-center text-primary-900 font-bold text-4xl shadow-2xl mb-8 transform -rotate-6 hover:rotate-0 transition duration-500 hover:scale-110">
                        KN
                    </div>
                    <h1 class="text-4xl font-extrabold text-white tracking-tight mb-4">Portal Admin</h1>
                    <p class="text-primary-200 text-lg max-w-md">Sistem Informasi dan Manajemen Konten SMKS Karya Nugraha Boyolali.</p>
                </div>
                
                <!-- Decorative Circles -->
                <div class="absolute -bottom-32 -left-32 w-96 h-96 rounded-full bg-primary-800 opacity-50 blur-3xl"></div>
                <div class="absolute -top-32 -right-32 w-96 h-96 rounded-full bg-primary-700 opacity-50 blur-3xl"></div>
            </div>

            <!-- Right Side: Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-white relative">
                <div class="w-full max-w-md">
                    <!-- Mobile Logo (Visible only on small screens) -->
                    <div class="lg:hidden flex items-center gap-3 mb-10 justify-center">
                        <div class="w-12 h-12 bg-primary-700 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-md">
                            KN
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Portal Admin</h2>
                    </div>

                    {{ $slot }}
                    
                    <div class="mt-10 pt-6 border-t border-gray-100 text-center">
                        <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-primary-600 transition inline-flex items-center gap-2 font-medium">
                            <i class="fas fa-arrow-left"></i> Kembali ke Beranda Publik
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
