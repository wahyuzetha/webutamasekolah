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
                            <a href="{{ route('posts.public') }}" class="hover:text-[#c29431] transition-colors">{{ __('Berita Terkini') }}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-xs text-gray-400 mx-2"></i>
                            <span class="text-gray-800 line-clamp-1">{{ Str::limit(app()->getLocale() == 'en' && $post->title_en ? $post->title_en : $post->title, 40) }}</span>
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
                        <div class="inline-flex items-center px-3 py-1 bg-blue-50 text-[#00123A] text-xs font-bold uppercase tracking-wider rounded-sm mb-4 border border-blue-100">
                            {{ __('Berita Utama') }}
                        </div>
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#00123A] leading-tight mb-6">
                            {{ app()->getLocale() == 'en' && $post->title_en ? $post->title_en : $post->title }}
                        </h1>
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 font-medium uppercase tracking-wide">
                            <div class="flex items-center gap-2">
                                <i class="far fa-user text-[#c29431]"></i>
                                <span>{{ __('Oleh') }}: <span class="text-[#00123A] font-bold">{{ $post->author->name ?? 'Admin' }}</span></span>
                            </div>
                            <span class="text-gray-300">|</span>
                            <div class="flex items-center gap-2">
                                <i class="far fa-calendar-alt text-[#c29431]"></i>
                                <span>{{ $post->created_at->translatedFormat('l, d F Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if($post->image_path)
                        <div class="mb-8 rounded-xl overflow-hidden shadow-md group">
                            <div class="w-full relative overflow-hidden bg-gray-200" style="padding-top: 56.25%;">
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            </div>
                        </div>
                    @endif

                    <!-- Article Content -->
                    <div class="prose prose-lg max-w-none text-gray-700 prose-headings:text-[#00123A] prose-headings:font-bold prose-a:text-[#c29431] prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl leading-relaxed">
                        {!! app()->getLocale() == 'en' && $post->content_en ? $post->content_en : $post->content !!}
                    </div>

                    <!-- Tags and Share -->
                    <div class="mt-12 pt-6 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-6">
                        <div class="flex gap-2 items-center">
                            <span class="text-sm font-bold text-[#00123A] uppercase tracking-wider mr-2"><i class="fas fa-tags text-[#c29431] mr-1"></i> Tags:</span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-full hover:bg-gray-200 transition cursor-pointer">Pendidikan</span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-full hover:bg-gray-200 transition cursor-pointer">SMK</span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-full hover:bg-gray-200 transition cursor-pointer">Boyolali</span>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-bold text-[#00123A] uppercase tracking-wider">Bagikan:</span>
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
                        
                        <!-- Search Widget -->
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                            <h3 class="text-lg font-bold text-[#00123A] mb-4 flex items-center"><i class="fas fa-search text-[#c29431] mr-2"></i> {{ __('Cari Berita') }}</h3>
                            <form action="{{ route('posts.public') }}" method="GET" class="relative">
                                <input type="text" name="search" placeholder="{{ __('Masukkan kata kunci...') }}" class="w-full pl-4 pr-12 py-3 rounded-md border-gray-300 focus:border-[#c29431] focus:ring focus:ring-[#c29431] focus:ring-opacity-20 shadow-sm transition">
                                <button type="submit" class="absolute right-0 top-0 bottom-0 px-4 text-gray-400 hover:text-[#c29431] transition">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                            <h3 class="text-lg font-bold text-[#00123A] mb-4 pb-3 border-b-2 border-[#c29431] inline-block">{{ __('Berita Terkini') }}</h3>
                            
                            <div class="space-y-4 mt-2">
                                @forelse($recent_posts ?? [] as $recent)
                                    <a href="{{ route('posts.show', $recent->slug) }}" class="group flex gap-4 items-start">
                                        <div class="shrink-0 w-20 h-20 rounded-lg overflow-hidden bg-gray-200">
                                            @if($recent->image_path)
                                                <img src="{{ asset('storage/' . $recent->image_path) }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                    <i class="fas fa-newspaper text-xl"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="text-sm font-bold text-[#00123A] leading-snug group-hover:text-[#c29431] transition line-clamp-2 mb-1">
                                                {{ app()->getLocale() == 'en' && $recent->title_en ? $recent->title_en : $recent->title }}
                                            </h4>
                                            <div class="text-[11px] text-gray-500 font-medium uppercase tracking-wide flex items-center gap-1">
                                                <i class="far fa-calendar-alt text-[#c29431]"></i> {{ $recent->created_at->format('d M Y') }}
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-sm text-gray-500 italic">{{ __('Belum ada berita lainnya.') }}</p>
                                @endforelse
                            </div>
                            
                            <div class="mt-6 text-center">
                                <a href="{{ route('posts.public') }}" class="inline-block text-xs font-bold text-[#00123A] uppercase tracking-wider hover:text-[#c29431] transition">
                                    Lihat Semua Berita <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
