<x-public-layout>
    <!-- Breadcrumb -->
    <div class="bg-gray-100 border-b border-gray-200 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex text-sm text-gray-500 font-medium" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="hover:text-[#c29431] transition-colors"><i class="fas fa-home mr-2"></i>{{ __('Beranda') }}</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-xs text-gray-400 mx-2"></i>
                            <a href="{{ route('achievements.public') }}" class="hover:text-[#c29431] transition-colors">{{ __('Prestasi & Penghargaan') }}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-xs text-gray-400 mx-2"></i>
                            <span class="text-gray-800 line-clamp-1">{{ Str::limit(app()->getLocale() == 'en' && $achievement->title_en ? $achievement->title_en : $achievement->title, 40) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Left Column (Main Article) -->
                <div class="lg:col-span-8">
                    <!-- Title and Meta -->
                    <div class="mb-8 border-b border-gray-100 pb-6">
                        <div class="inline-flex items-center px-3 py-1 bg-[#c29431]/10 text-[#c29431] text-xs font-bold uppercase tracking-wider rounded-sm mb-4 border border-[#c29431]/20">
                            <i class="fas fa-trophy mr-1.5"></i> {{ __('Prestasi') }}
                        </div>
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#0b1b36] leading-tight mb-6">
                            {{ app()->getLocale() == 'en' && $achievement->title_en ? $achievement->title_en : $achievement->title }}
                        </h1>
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 font-medium uppercase tracking-wide">
                            <div class="flex items-center gap-2">
                                <i class="far fa-calendar-check text-[#c29431]"></i>
                                <span>{{ __('Diraih pada') }}: <span class="text-[#0b1b36] font-bold">{{ $achievement->achievement_date ? $achievement->achievement_date->translatedFormat('d F Y') : '-' }}</span></span>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if($achievement->image_path)
                        <div class="mb-8 rounded-xl overflow-hidden shadow-md group">
                            <div class="w-full relative overflow-hidden bg-gray-200" style="padding-top: 56.25%;">
                                <img src="{{ asset('storage/' . $achievement->image_path) }}" alt="{{ $achievement->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            </div>
                        </div>
                    @endif

                    <!-- Article Content -->
                    <div class="prose prose-lg max-w-none text-gray-700 prose-headings:text-[#0b1b36] prose-headings:font-bold prose-a:text-[#c29431] prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl leading-relaxed">
                        {!! app()->getLocale() == 'en' && $achievement->content_en ? $achievement->content_en : $achievement->content !!}
                    </div>

                    <!-- Share -->
                    <div class="mt-12 pt-6 border-t border-gray-100 flex flex-col sm:flex-row justify-end items-center gap-6">
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-bold text-[#0b1b36] uppercase tracking-wider">Bagikan:</span>
                            <a href="#" class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition shadow-sm" title="Bagikan ke Facebook"><i class="fab fa-facebook-f text-sm"></i></a>
                            <a href="#" class="w-9 h-9 rounded-full bg-sky-500 text-white flex items-center justify-center hover:bg-sky-600 transition shadow-sm" title="Bagikan ke Twitter"><i class="fab fa-twitter text-sm"></i></a>
                            <a href="#" class="w-9 h-9 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 transition shadow-sm" title="Bagikan ke WhatsApp"><i class="fab fa-whatsapp text-sm"></i></a>
                            <a href="#" class="w-9 h-9 rounded-full bg-gray-600 text-white flex items-center justify-center hover:bg-gray-700 transition shadow-sm" title="Salin Tautan"><i class="fas fa-link text-sm"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Sidebar) -->
                <div class="lg:col-span-4 mt-12 lg:mt-0">
                    <div class="sticky top-28 space-y-8">

                        <!-- Recent Achievements Widget -->
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                            <h3 class="text-lg font-bold text-[#0b1b36] mb-4 pb-3 border-b-2 border-[#c29431] inline-block">{{ __('Prestasi Lainnya') }}</h3>
                            
                            <div class="space-y-4 mt-2">
                                @forelse($recent_achievements ?? [] as $recent)
                                    <a href="{{ route('achievements.show', $recent->slug) }}" class="group flex gap-4 items-start">
                                        <div class="shrink-0 w-20 h-20 rounded-lg overflow-hidden bg-gray-200">
                                            @if($recent->image_path)
                                                <img src="{{ asset('storage/' . $recent->image_path) }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                    <i class="fas fa-trophy text-xl"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="text-sm font-bold text-[#0b1b36] leading-snug group-hover:text-[#c29431] transition line-clamp-2 mb-1">
                                                {{ app()->getLocale() == 'en' && $recent->title_en ? $recent->title_en : $recent->title }}
                                            </h4>
                                            <div class="text-[11px] text-gray-500 font-medium uppercase tracking-wide flex items-center gap-1">
                                                <i class="far fa-calendar-alt text-[#c29431]"></i> {{ $recent->achievement_date ? $recent->achievement_date->format('d M Y') : '-' }}
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-sm text-gray-500 italic">{{ __('Belum ada prestasi lainnya.') }}</p>
                                @endforelse
                            </div>
                            
                            <div class="mt-6 text-center">
                                <a href="{{ route('achievements.public') }}" class="inline-block text-xs font-bold text-[#0b1b36] uppercase tracking-wider hover:text-[#c29431] transition">
                                    Lihat Semua Prestasi <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
