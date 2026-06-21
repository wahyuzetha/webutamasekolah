<x-public-layout>
    <!-- Header Page -->
    <div class="bg-[#0b1b36] pt-16 pb-24 border-b-4 border-[#c29431]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#0b1b36] text-[#c29431] text-xs font-bold tracking-widest mb-6 border border-[#c29431] shadow-md uppercase">
                <i class="fas fa-futbol"></i> {{ __('Ekstrakurikuler') }}
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-6 leading-tight">{{ app()->getLocale() == 'en' && $extracurricular->name_en ? $extracurricular->name_en : $extracurricular->name }}</h1>
            <div class="flex items-center justify-center gap-4 text-gray-300 text-sm font-semibold tracking-wide uppercase">
                <span class="inline-block px-4 py-1.5 bg-[#c29431] text-[#0b1b36] font-bold rounded-sm shadow-md">{{ $extracurricular->slug }}</span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="py-12 bg-gray-50 -mt-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                @if($extracurricular->image_path)
                    <div class="w-full relative overflow-hidden bg-gray-200" style="padding-top: 56.25%;"> <!-- 16:9 Aspect Ratio -->
                        <img src="{{ asset('storage/' . $extracurricular->image_path) }}" alt="{{ $extracurricular->name }}" class="absolute inset-0 w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                @else
                    <div class="w-full relative overflow-hidden bg-blue-50 flex items-center justify-center text-[#0b1b36]" style="padding-top: 30%;">
                        <i class="fas fa-futbol text-6xl opacity-20 absolute inset-0 m-auto" style="height: fit-content; width: fit-content;"></i>
                    </div>
                @endif
                
                <div class="p-8 md:p-12 lg:p-16 prose prose-lg max-w-none text-gray-700 prose-headings:text-[#0b1b36] prose-headings:font-bold prose-a:text-[#c29431] prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl">
                    {!! nl2br(e(app()->getLocale() == 'en' && $extracurricular->description_en ? $extracurricular->description_en : $extracurricular->description)) !!}
                </div>
                
                @if($extracurricular->galleries->count() > 0)
                <div class="px-8 md:px-12 lg:px-16 pb-12">
                    <h2 class="text-2xl font-bold text-[#0b1b36] mb-6 border-b-2 border-[#c29431] pb-2 inline-block">{{ __('Galeri Kegiatan') }}</h2>
                    
                    <!-- AlpineJS Lightbox -->
                    <div x-data="{ lightboxOpen: false, activeImage: '', activeCaption: '' }" class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($extracurricular->galleries as $gallery)
                            <div class="relative group rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 cursor-pointer"
                                 @click="lightboxOpen = true; activeImage = '{{ asset('storage/' . $gallery->image_path) }}'; activeCaption = '{{ app()->getLocale() == 'en' && $gallery->caption_en ? addslashes($gallery->caption_en) : addslashes($gallery->caption) }}'">
                                <div class="w-full relative bg-gray-100" style="padding-top: 75%;"> <!-- 4:3 Aspect Ratio -->
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ app()->getLocale() == 'en' && $gallery->caption_en ? $gallery->caption_en : ($gallery->caption ?? __('Galeri') . ' ' . $extracurricular->name) }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0b1b36]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                                    <div class="p-4 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        <div class="text-white text-sm font-medium line-clamp-2">{{ app()->getLocale() == 'en' && $gallery->caption_en ? $gallery->caption_en : ($gallery->caption ?? __('Lihat Foto')) }}</div>
                                    </div>
                                    <div class="absolute top-4 right-4 bg-[#c29431] text-[#0b1b36] w-8 h-8 rounded-full flex items-center justify-center shadow-lg transform scale-0 group-hover:scale-100 transition-transform duration-300 delay-100">
                                        <i class="fas fa-search-plus"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Lightbox Modal -->
                        <div x-show="lightboxOpen" class="fixed inset-0 z-[100] bg-black/90 backdrop-blur-sm flex items-center justify-center p-4 sm:p-6" x-transition.opacity style="display: none;">
                            <div class="absolute top-4 right-4 sm:top-6 sm:right-6">
                                <button @click="lightboxOpen = false" class="text-white/70 hover:text-white bg-black/50 hover:bg-[#c29431] rounded-full w-12 h-12 flex items-center justify-center transition-all">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                            <div class="relative max-w-5xl w-full max-h-screen flex flex-col items-center justify-center" @click.away="lightboxOpen = false">
                                <img :src="activeImage" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl border border-white/10" alt="Galeri">
                                <div x-show="activeCaption" class="mt-4 text-center">
                                    <p class="text-white text-lg font-medium" x-text="activeCaption"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="px-8 md:px-12 lg:px-16 py-6 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-[#0b1b36] font-bold hover:text-[#c29431] transition uppercase tracking-wide text-sm">
                        <i class="fas fa-arrow-left mr-2"></i> {{ __('Beranda') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
