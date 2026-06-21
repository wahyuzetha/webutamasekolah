<x-public-layout>
    <!-- CSS for Custom Animated Slider -->
    <style>
        /* Base Animation Classes */
        .hero-slide-bg {
            transform: scale(1.15);
            transition: transform 8s ease-out;
        }
        .swiper-slide-active .hero-slide-bg {
            transform: scale(1);
        }
        
        .hero-text-reveal {
            transform: translateY(120%);
            opacity: 0;
            transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.8s ease;
        }
        
        .swiper-slide-active .reveal-1 {
            transform: translateY(0);
            opacity: 1;
            transition-delay: 0.3s;
        }
        .swiper-slide-active .reveal-2 {
            transform: translateY(0);
            opacity: 1;
            transition-delay: 0.5s;
        }
        .swiper-slide-active .reveal-3 {
            transform: translateY(0);
            opacity: 1;
            transition-delay: 0.7s;
        }

        /* Custom Fractional Pagination & Progress */
        .custom-slider-nav {
            position: absolute;
            bottom: 40px;
            left: 5%;
            z-index: 20;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        @media (min-width: 640px) {
            .custom-slider-nav {
                left: 10%;
                bottom: 60px;
            }
        }
        
        @media (min-width: 1024px) {
            .custom-slider-nav {
                left: 10%;
                bottom: 140px; 
            }
        }

        .slider-fraction {
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .slider-fraction .current {
            color: #c29431;
            font-size: 18px;
        }
        
        .slider-fraction .divider {
            color: rgba(255, 255, 255, 0.4);
        }

        .slider-progress-container {
            width: 100px;
            height: 2px;
            background: rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        @media (min-width: 640px) {
            .slider-progress-container {
                width: 200px;
            }
        }

        .slider-progress-bar {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0%;
            background: #c29431;
            transition: width linear;
        }

        /* Custom Arrows */
        .custom-arrows {
            display: flex;
            gap: 10px;
        }
        .custom-arrow {
            width: 40px;
            height: 40px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .custom-arrow:hover {
            background: #c29431;
            border-color: #c29431;
        }
        
        .swiper-button-next, .swiper-button-prev, .swiper-pagination {
            display: none !important;
        }
    </style>

    <!-- Hero Image Slider Section -->
    <div class="relative w-full h-[80vh] sm:h-[90vh] lg:h-[100vh] min-h-[600px] lg:min-h-[700px] overflow-hidden bg-[#00123A]">
        <div class="swiper hero-swiper w-full h-full">
            <div class="swiper-wrapper">
                @forelse($sliders as $slider)
                    <div class="swiper-slide relative w-full h-full overflow-hidden">
                        <img src="{{ asset('storage/' . $slider->image_path) }}" alt="{{ $slider->title }}" class="absolute inset-0 w-full h-full object-cover hero-slide-bg origin-center">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-r from-[#00123A]/90 via-[#00123A]/40 to-transparent"></div>
                        
                        <div class="absolute inset-0 flex flex-col justify-center px-6 sm:px-12 lg:px-24 xl:px-32 z-10 pt-10">
                            <div class="max-w-4xl w-full">
                                @if($slider->subtitle)
                                <div class="overflow-hidden mb-4">
                                    <div class="text-[#c29431] font-bold text-sm sm:text-lg tracking-[0.3em] uppercase hero-text-reveal reveal-1">{{ app()->getLocale() == 'en' && $slider->subtitle_en ? $slider->subtitle_en : $slider->subtitle }}</div>
                                </div>
                                @endif
                                
                                @if($slider->title)
                                <div class="overflow-hidden mb-8 py-2">
                                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight leading-[1.1] text-white drop-shadow-xl hero-text-reveal reveal-2">
                                        {{ app()->getLocale() == 'en' && $slider->title_en ? $slider->title_en : $slider->title }}
                                    </h1>
                                </div>
                                @endif
                                
                                @if($slider->button_text)
                                <div class="overflow-hidden mt-4">
                                    <div class="hero-text-reveal reveal-3">
                                        <a href="{{ $slider->button_link ?? '#' }}" class="inline-flex items-center gap-3 bg-transparent border-2 border-[#c29431] text-white hover:bg-[#c29431] hover:text-[#00123a] px-8 py-4 rounded-sm font-bold text-base sm:text-lg transition-all duration-300 tracking-wider uppercase group">
                                            {{ $slider->button_text }}
                                            <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Default Static Slide if empty -->
                    <div class="swiper-slide relative w-full h-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Slide 1" class="absolute inset-0 w-full h-full object-cover hero-slide-bg origin-center">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#00123A]/90 via-[#00123A]/40 to-transparent"></div>
                        <div class="absolute inset-0 flex flex-col justify-center px-6 sm:px-12 lg:px-24 xl:px-32 z-10 pt-10">
                            <div class="max-w-4xl w-full">
                                <div class="overflow-hidden mb-4">
                                    <div class="text-[#c29431] font-bold text-sm sm:text-lg tracking-[0.3em] uppercase hero-text-reveal reveal-1">{{ __('Selamat Datang di') }}</div>
                                </div>
                                <div class="overflow-hidden mb-8 py-2">
                                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight leading-[1.1] text-white drop-shadow-xl hero-text-reveal reveal-2">
                                        SMKS Karya Nugraha <span class="text-[#c29431]">Boyolali</span>
                                    </h1>
                                </div>
                                <div class="overflow-hidden mt-4">
                                    <div class="hero-text-reveal reveal-3 text-sm sm:text-lg md:text-xl text-gray-200 mb-6 sm:mb-8 max-w-2xl drop-shadow-md">
                                        {{ __('Pusat keunggulan pendidikan vokasi yang mencetak lulusan kompeten, berkarakter, dan siap bersaing di dunia industri kreatif dan teknologi digital.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Custom Navigation -->
        <div class="custom-slider-nav">
            <div class="slider-fraction">
                <span class="current">01</span>
                <span class="divider">/</span>
                <span class="total">0{{ count($sliders) ?: 1 }}</span>
            </div>
            <div class="slider-progress-container">
                <div class="slider-progress-bar"></div>
            </div>
            <div class="custom-arrows">
                <div class="custom-arrow custom-prev"><i class="fas fa-chevron-left text-sm"></i></div>
                <div class="custom-arrow custom-next"><i class="fas fa-chevron-right text-sm"></i></div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof Swiper !== 'undefined') {
                const autoplayDelay = 6000;
                let progressBar = document.querySelector('.slider-progress-bar');
                let currentFraction = document.querySelector('.slider-fraction .current');
                
                const swiper = new Swiper('.hero-swiper', {
                    loop: true,
                    effect: 'fade',
                    fadeEffect: { crossFade: true },
                    autoplay: { 
                        delay: autoplayDelay, 
                        disableOnInteraction: false 
                    },
                    navigation: { 
                        nextEl: '.custom-next', 
                        prevEl: '.custom-prev' 
                    },
                    on: {
                        init: function () {
                            if(progressBar) {
                                progressBar.style.transition = 'none';
                                progressBar.style.width = '0%';
                                setTimeout(() => {
                                    progressBar.style.transition = `width ${autoplayDelay}ms linear`;
                                    progressBar.style.width = '100%';
                                }, 50);
                            }
                            if(currentFraction) {
                                currentFraction.innerHTML = '0' + (this.realIndex + 1);
                            }
                        },
                        slideChange: function () {
                            if(currentFraction) {
                                currentFraction.innerHTML = '0' + (this.realIndex + 1);
                            }
                        },
                        slideChangeTransitionStart: function () {
                            if(progressBar) {
                                progressBar.style.transition = 'none';
                                progressBar.style.width = '0%';
                            }
                        },
                        slideChangeTransitionEnd: function () {
                            if(progressBar) {
                                progressBar.style.transition = `width ${autoplayDelay}ms linear`;
                                progressBar.style.width = '100%';
                            }
                        }
                    }
                });

                const majorsSwiper = new Swiper('.majors-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 32,
                    loop: true,
                    autoplay: { delay: 3000, disableOnInteraction: false },
                    pagination: { el: '.majors-swiper .swiper-pagination', clickable: true },
                    breakpoints: {
                        640: { slidesPerView: 2 },
                        1024: { slidesPerView: 3 }
                    }
                });
            }
        });
    </script>

    <!-- Features / Quick Links Section (Overlapping Hero) -->
    <div class="relative z-20 -mt-16 sm:-mt-24 lg:-mt-32 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            @forelse($features ?? [] as $feature)
                <a href="{{ $feature->link ?? '#' }}" class="bg-[#00123A] text-white p-8 rounded-lg shadow-xl hover:-translate-y-2 transition duration-300 border-b-4 border-[#c29431] group flex flex-col h-full">
                    <div class="w-14 h-14 bg-white/10 rounded-full flex items-center justify-center text-yellow-400 group-hover:bg-yellow-400 group-hover:text-[#00123A] transition duration-300 mb-6 shrink-0">
                        @if($feature->icon)
                            @if(str_starts_with($feature->icon, 'fa'))
                                <i class="{{ $feature->icon }} text-2xl"></i>
                            @else
                                <span class="text-2xl">{{ $feature->icon }}</span>
                            @endif
                        @else
                            <i class="fas fa-star text-2xl"></i>
                        @endif
                    </div>
                    <h3 class="font-bold text-xl mb-3 leading-tight">{{ app()->getLocale() == 'en' && $feature->title_en ? $feature->title_en : $feature->title }}</h3>
                    <p class="text-gray-300 text-sm flex-grow line-clamp-3">{{ app()->getLocale() == 'en' && $feature->description_en ? $feature->description_en : $feature->description }}</p>
                    <div class="mt-4 text-yellow-400 text-sm font-bold flex items-center">
                        {{ __('Lebih Lanjut') }} <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition"></i>
                    </div>
                </a>
            @empty
                <!-- Fallback if empty -->
                <div class="col-span-full hidden"></div>
            @endforelse
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20 relative z-30">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-8">
            <!-- Card 1: Jumlah Siswa -->
            <div class="bg-white rounded-2xl border border-gray-100 p-4 sm:p-8 text-center shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden flex flex-col justify-center">
                <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 mx-auto bg-blue-50 text-blue-600 rounded-xl sm:rounded-2xl flex items-center justify-center mb-3 sm:mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-sm rotate-3 group-hover:rotate-0">
                        <i class="fas fa-user-graduate text-xl sm:text-2xl"></i>
                    </div>
                    <div class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-[#00123A] mb-1 sm:mb-2 tracking-tight">{{ $settings['stat_siswa'] ?? '2890' }}</div>
                    <div class="text-[9px] sm:text-xs font-bold text-blue-600/80 uppercase tracking-wider sm:tracking-widest leading-tight">Jumlah Siswa</div>
                </div>
            </div>
            
            <!-- Card 2: Guru dan Karyawan -->
            <div class="bg-white rounded-2xl border border-gray-100 p-4 sm:p-8 text-center shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden flex flex-col justify-center">
                <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 mx-auto bg-blue-50 text-blue-600 rounded-xl sm:rounded-2xl flex items-center justify-center mb-3 sm:mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-sm -rotate-3 group-hover:rotate-0">
                        <i class="fas fa-chalkboard-teacher text-xl sm:text-2xl"></i>
                    </div>
                    <div class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-[#00123A] mb-1 sm:mb-2 tracking-tight">{{ $settings['stat_guru'] ?? '135' }}</div>
                    <div class="text-[9px] sm:text-xs font-bold text-blue-600/80 uppercase tracking-wider sm:tracking-widest leading-tight">Guru & Karyawan</div>
                </div>
            </div>
            
            <!-- Card 3: Rombongan Belajar -->
            <div class="bg-white rounded-2xl border border-gray-100 p-4 sm:p-8 text-center shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden flex flex-col justify-center">
                <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 mx-auto bg-blue-50 text-blue-600 rounded-xl sm:rounded-2xl flex items-center justify-center mb-3 sm:mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-sm rotate-3 group-hover:rotate-0">
                        <i class="fas fa-school text-xl sm:text-2xl"></i>
                    </div>
                    <div class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-[#00123A] mb-1 sm:mb-2 tracking-tight">{{ $settings['stat_rombel'] ?? '72' }}</div>
                    <div class="text-[9px] sm:text-xs font-bold text-blue-600/80 uppercase tracking-wider sm:tracking-widest leading-tight">Rombongan Belajar</div>
                </div>
            </div>
            
            <!-- Card 4: Konsentrasi Keahlian -->
            <div class="bg-white rounded-2xl border border-gray-100 p-4 sm:p-8 text-center shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden flex flex-col justify-center">
                <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 mx-auto bg-blue-50 text-blue-600 rounded-xl sm:rounded-2xl flex items-center justify-center mb-3 sm:mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500 shadow-sm -rotate-3 group-hover:rotate-0">
                        <i class="fas fa-laptop-code text-xl sm:text-2xl"></i>
                    </div>
                    <div class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-[#00123A] mb-1 sm:mb-2 tracking-tight">{{ $settings['stat_jurusan'] ?? '7' }}</div>
                    <div class="text-[9px] sm:text-xs font-bold text-blue-600/80 uppercase tracking-wider sm:tracking-widest leading-tight">Konsentrasi Keahlian</div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section (Sambutan Pimpinan) -->
    <div id="profil" class="py-16 sm:py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Left Image -->
                <div class="relative">
                    <div class="absolute inset-0 bg-[#c29431] transform translate-x-4 translate-y-4 rounded-xl hidden sm:block"></div>
                    <div class="relative bg-gray-100 rounded-xl overflow-hidden aspect-[4/5] shadow-2xl z-10 border-4 border-white">
                        @if(!empty($settings['about_image_path']))
                            <img src="{{ asset('storage/' . $settings['about_image_path']) }}" alt="Sambutan" class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Default About" class="w-full h-full object-cover">
                        @endif
                    </div>
                </div>
                
                <!-- Right Content -->
                <div class="space-y-6">
                    <div class="inline-block border-l-4 border-[#c29431] pl-4">
                        <span class="text-[#c29431] font-bold tracking-wider uppercase text-sm sm:text-base">{{ __('Profil Kepala Sekolah') }}</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#00123A] leading-tight">
                        {{ app()->getLocale() == 'en' && !empty($settings['about_title_en']) ? $settings['about_title_en'] : ($settings['about_title'] ?? 'Selamat Datang di SMKS Karya Nugraha Boyolali') }}
                    </h2>
                    <div class="w-20 h-1 bg-[#c29431]"></div>
                    <div class="text-gray-600 text-lg leading-relaxed whitespace-pre-line line-clamp-2">
                        {{ app()->getLocale() == 'en' && !empty($settings['about_description_en']) ? $settings['about_description_en'] : ($settings['about_description'] ?? 'SMKS Karya Nugraha Boyolali merupakan sekolah kejuruan yang berkomitmen mencetak generasi vokasi unggul. Kami membekali siswa dengan kompetensi teknis, karakter profesional, dan mental juara agar siap menghadapi tantangan dunia industri global.') }}
                    </div>
                    <div class="pt-6">
                        <a href="{{ route('profil.kepala-sekolah') }}" class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-bold rounded-sm text-white bg-[#00123A] hover:bg-[#000d29] transition shadow-lg">
                            {{ __('Detail') }} <i class="fas fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Majors Section -->
    <div id="jurusan" class="py-16 sm:py-24 bg-gray-50 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-[#c29431] font-bold tracking-wider uppercase text-sm">Program Keahlian</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-[#00123A] mt-2">Pilihan Jurusan Unggulan</h2>
                <div class="w-24 h-1 bg-[#c29431] mx-auto mt-6 rounded"></div>
            </div>

            <div class="swiper majors-swiper pb-12">
                <div class="swiper-wrapper">
                    @forelse($majors ?? [] as $major)
                        <div class="swiper-slide h-auto">
                            <a href="{{ route('majors.show', $major->slug) }}" class="block h-full bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group border-b-4 border-transparent hover:border-[#c29431]">
                                <div class="p-10 text-center h-full flex flex-col">
                                    <div class="w-20 h-20 mx-auto rounded-full bg-blue-50 flex items-center justify-center text-[#00123A] mb-6 group-hover:scale-110 group-hover:bg-[#00123A] group-hover:text-yellow-400 transition-all duration-500 shadow-inner shrink-0">
                                        @if($major->image_path)
                                            <img src="{{ asset('storage/' . $major->image_path) }}" alt="{{ $major->slug }}" class="w-12 h-12 object-contain group-hover:brightness-200 transition-all">
                                        @else
                                            <i class="fas fa-graduation-cap text-3xl"></i>
                                        @endif
                                    </div>
                                    <h3 class="text-2xl font-bold text-[#00123A] mb-3 group-hover:text-[#c29431] transition">{{ app()->getLocale() == 'en' && $major->name_en ? $major->name_en : $major->name }}</h3>
                                    <div>
                                        <span class="inline-block px-4 py-1.5 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full mb-5">{{ $major->slug }}</span>
                                    </div>
                                    <p class="text-gray-600 text-sm line-clamp-3 flex-grow">
                                        {{ app()->getLocale() == 'en' && $major->description_en ? $major->description_en : $major->description }}
                                    </p>
                                    <div class="mt-6 text-[#00123A] font-bold text-sm uppercase tracking-wider group-hover:text-[#c29431] transition">
                                        {{ __('Lihat Detail') }} <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="w-full text-center text-gray-500 py-8">
                            <p>Data program keahlian belum ditambahkan.</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination !bottom-0"></div>
            </div>
        </div>
    </div>

    <!-- Teachers Section -->
    <div class="py-16 sm:py-24 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12">
                <div>
                    <span class="text-[#c29431] font-bold tracking-wider uppercase text-sm">SDM Unggul</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-[#00123A] mt-2">Daftar Guru & Staf</h2>
                    <div class="w-24 h-1 bg-[#c29431] mt-6 rounded"></div>
                </div>
                <a href="{{ route('teachers.public') }}" class="mt-6 sm:mt-0 inline-flex items-center px-6 py-2 border-2 border-[#00123A] text-[#00123A] rounded-sm font-bold hover:bg-[#00123A] hover:text-white transition uppercase tracking-wide text-sm">
                    Lihat Semua <i class="fas fa-chevron-right ml-2 text-xs"></i>
                </a>
            </div>

            <style>
                .hide-scrollbar::-webkit-scrollbar { display: none; }
                .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
            </style>
            
            <div class="flex overflow-x-auto sm:grid sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-6 -mx-4 px-4 sm:mx-0 sm:px-0 snap-x snap-mandatory hide-scrollbar">
                @forelse($teachers ?? [] as $index => $teacher)
                    <a href="{{ route('teachers.show', $teacher->slug ?? $teacher->id) }}" class="min-w-[85vw] sm:min-w-0 snap-center shrink-0 bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-500 hover:-translate-y-2 border border-gray-100 block group {{ $index >= 4 ? 'lg:hidden' : '' }}">
                        <div class="relative w-full overflow-hidden bg-gray-100" style="padding-top: 125%;">
                            @if($teacher->image_path)
                                <img src="{{ asset('storage/' . $teacher->image_path) }}" alt="{{ $teacher->name }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-user text-6xl"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-[#00123A]/90 via-[#00123A]/20 to-transparent opacity-80 group-hover:opacity-100 transition duration-500"></div>
                            
                            <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-4 group-hover:translate-y-0 transition duration-500">
                                <h3 class="text-xl font-bold text-white mb-1 leading-tight">{{ $teacher->name }}</h3>
                                <p class="text-yellow-400 text-sm font-semibold tracking-wide uppercase">{{ app()->getLocale() == 'en' && $teacher->position_en ? $teacher->position_en : $teacher->position }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                        <i class="fas fa-users text-4xl mb-3 text-gray-300"></i>
                        <p>Belum ada data guru/staf yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Latest News Section -->
    <div class="py-16 sm:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12">
                <div>
                    <span class="text-[#c29431] font-bold tracking-wider uppercase text-sm">Informasi Terkini</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-[#00123A] mt-2">Berita & Agenda</h2>
                    <div class="w-24 h-1 bg-[#c29431] mt-6 rounded"></div>
                </div>
                <a href="{{ route('posts.public') }}" class="mt-6 sm:mt-0 hidden sm:inline-flex items-center px-6 py-2 border-2 border-[#00123A] text-[#00123A] rounded-sm font-bold hover:bg-[#00123A] hover:text-white transition uppercase tracking-wide text-sm">
                    Indeks Berita <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

            <!-- Desktop/Tablet Grid View -->
            <div class="hidden sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-8 pb-6">
                @forelse($posts ?? [] as $index => $post)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-500 overflow-hidden flex flex-col h-full group border border-gray-100 {{ $index >= 3 ? 'lg:hidden' : '' }}">
                        <div class="relative w-full bg-gray-200 overflow-hidden" style="padding-top: 75%;">
                            @if($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center text-gray-400 bg-gray-100 group-hover:scale-105 transition duration-500">
                                    <i class="fas fa-newspaper text-5xl"></i>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 z-10 bg-yellow-400 text-[#00123A] text-xs font-extrabold px-3 py-1 rounded-sm shadow-md uppercase tracking-wider">
                                Berita
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <div class="text-xs text-gray-500 mb-3 flex items-center gap-3 font-semibold uppercase tracking-wider">
                                <span class="flex items-center gap-1"><i class="far fa-calendar-alt text-[#c29431]"></i> {{ $post->created_at->format('d M Y') }}</span>
                                <span class="flex items-center gap-1"><i class="far fa-user text-[#c29431]"></i> {{ $post->author->name ?? 'Admin' }}</span>
                            </div>
                            <h3 class="text-2xl font-bold text-[#00123A] mb-4 leading-snug group-hover:text-[#c29431] transition">
                                <a href="{{ route('posts.show', $post->slug) }}">{{ app()->getLocale() == 'en' && $post->title_en ? $post->title_en : $post->title }}</a>
                            </h3>
                            <p class="text-gray-600 line-clamp-3 text-sm mb-6 flex-grow leading-relaxed">
                                {{ Str::limit(strip_tags(app()->getLocale() == 'en' && $post->content_en ? $post->content_en : $post->content), 120) }}
                            </p>
                            <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-[#00123A] font-bold text-sm hover:text-[#c29431] transition mt-auto group/link">
                                {{ __('BACA SELENGKAPNYA') }} <i class="fas fa-arrow-right ml-2 group-hover/link:translate-x-1 transition"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 bg-white rounded-xl shadow-sm border border-dashed border-gray-300">
                        <div class="w-20 h-20 mx-auto bg-gray-50 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-newspaper text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-[#00123A]">Belum ada berita</h3>
                        <p class="text-gray-500 mt-2">Informasi dan pengumuman terbaru akan tampil di sini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Mobile Dropdown List View (Accordion) -->
            <div class="sm:hidden space-y-4 pb-6" x-data="{ activeNews: 0 }">
                @forelse($posts ?? [] as $index => $post)
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                        <button @click="activeNews === {{ $index }} ? activeNews = null : activeNews = {{ $index }}" class="w-full flex justify-between items-center p-4 text-left focus:outline-none bg-gray-50 hover:bg-gray-100 transition">
                            <h3 class="font-bold text-[#00123A] text-sm pr-4 leading-snug">{{ app()->getLocale() == 'en' && $post->title_en ? $post->title_en : $post->title }}</h3>
                            <div class="shrink-0 w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm text-[#c29431] transition-transform duration-300" :class="{'rotate-180': activeNews === {{ $index }} }">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </button>
                        <div x-show="activeNews === {{ $index }}" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="p-4 bg-white border-t border-gray-100" style="display: none;">
                            <div class="flex flex-col gap-4">
                                @if($post->image_path)
                                    <div class="w-full relative overflow-hidden rounded-lg bg-gray-200" style="padding-top: 56.25%;"> <!-- 16:9 for mobile accordion -->
                                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover">
                                    </div>
                                @endif
                                <div>
                                    <div class="text-[11px] text-gray-500 mb-2 font-bold tracking-wider uppercase">
                                        <i class="far fa-calendar-alt text-[#c29431] mr-1"></i> {{ $post->created_at->format('d M Y') }}
                                    </div>
                                    <p class="text-sm text-gray-600 line-clamp-3 mb-4 leading-relaxed">
                                        {{ Str::limit(strip_tags(app()->getLocale() == 'en' && $post->content_en ? $post->content_en : $post->content), 120) }}
                                    </p>
                                    <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-[#00123A] font-bold text-xs hover:text-[#c29431] transition uppercase tracking-wide">
                                        {{ __('Baca Selengkapnya') }} <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 bg-white rounded-xl shadow-sm border border-dashed border-gray-300">
                        <i class="fas fa-newspaper text-3xl text-gray-400 mb-3"></i>
                        <p class="text-sm font-bold text-[#00123A]">Belum ada berita</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-10 text-center sm:hidden">
                <a href="{{ route('posts.public') }}" class="inline-flex items-center justify-center px-6 py-3 border-2 border-[#00123A] text-[#00123A] font-bold rounded-sm hover:bg-[#00123A] hover:text-white transition w-full uppercase tracking-wide">
                    Indeks Berita
                </a>
            </div>
        </div>
    </div>

    <!-- Video Profile Section -->
    @php
        $videoUrl = $settings['video_profil_url'] ?? '';
        // Default video (bisa diubah di pengaturan)
        $videoId = 'LXb3EKWsInQ'; 
        
        if ($videoUrl) {
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $videoUrl, $match);
            if(isset($match[1])) {
                $videoId = $match[1];
            }
        }
    @endphp

    <div class="py-16 sm:py-24 bg-[#00123A] relative overflow-hidden" id="video-profil">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10 pointer-events-none">
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-blue-500 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-[40rem] h-[40rem] rounded-full bg-[#c29431] blur-3xl translate-x-1/3 translate-y-1/3"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12 lg:mb-16">
                <span class="text-[#c29431] font-bold tracking-wider uppercase text-sm sm:text-base bg-[#c29431]/10 px-4 py-2 rounded-full inline-block mb-4">
                    <i class="fas fa-play-circle mr-2"></i> Mengenal Kami Lebih Dekat
                </span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mt-2 tracking-tight">Video Profil Sekolah</h2>
                <p class="text-gray-400 max-w-2xl mx-auto mt-4 text-base sm:text-lg">Saksikan sekilas tentang fasilitas, kegiatan belajar mengajar, dan pencapaian SMKS Karya Nugraha Boyolali dalam mencetak generasi vokasi unggul.</p>
                
                @if(empty($settings['video_profil_url']))
                <div class="mt-4 inline-block bg-blue-900/50 border border-blue-500/30 text-blue-200 text-xs px-4 py-2 rounded-lg">
                    <i class="fas fa-info-circle mr-1"></i> Ini adalah video *default*. Silakan atur URL Video Profil di menu Admin > Pengaturan.
                </div>
                @endif
            </div>

            <div class="max-w-4xl mx-auto relative group">
                <!-- Video Container -->
                <div class="relative w-full rounded-2xl sm:rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] bg-gray-900 border border-white/10" style="padding-top: 56.25%;">
                    <iframe 
                        class="absolute inset-0 w-full h-full transition-transform duration-700 group-hover:scale-[1.02]"
                        src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&showinfo=0" 
                        title="Video Profil Sekolah" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                
                <!-- Floating Accent -->
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-[#c29431] rounded-2xl -z-10 rotate-12 opacity-50 sm:opacity-100 transition-transform duration-500 group-hover:rotate-45"></div>
                <div class="absolute -top-6 -left-6 w-20 h-20 border-4 border-blue-500 rounded-full -z-10 opacity-30 sm:opacity-50 transition-transform duration-500 group-hover:scale-150"></div>
            </div>
        </div>
    </div>
</x-public-layout>
