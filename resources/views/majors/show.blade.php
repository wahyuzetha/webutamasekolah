<x-public-layout>
    <!-- Header Page -->
    <div class="bg-[#00123A] pt-16 pb-24 border-b-4 border-[#c29431]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#00123A] text-yellow-400 text-xs font-bold tracking-widest mb-6 border border-[#c29431] shadow-md uppercase">
                <i class="fas fa-graduation-cap"></i> {{ __('Program Keahlian') }}
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-6 leading-tight">{{ app()->getLocale() == 'en' && $major->name_en ? $major->name_en : $major->name }}</h1>
            <div class="flex items-center justify-center gap-4 text-gray-300 text-sm font-semibold tracking-wide uppercase">
                <span class="inline-block px-4 py-1.5 bg-[#c29431] text-[#00123A] font-bold rounded-sm shadow-md">{{ $major->slug }}</span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="py-12 bg-gray-50 -mt-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden">
                @if($major->image_path)
                    <div class="w-full relative overflow-hidden bg-gray-200" style="padding-top: 56.25%;"> <!-- 16:9 Aspect Ratio -->
                        <img src="{{ asset('storage/' . $major->image_path) }}" alt="{{ $major->name }}" class="absolute inset-0 w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-full relative overflow-hidden bg-blue-50 flex items-center justify-center text-[#00123A]" style="padding-top: 30%;">
                        <i class="fas fa-graduation-cap text-6xl opacity-20 absolute inset-0 m-auto" style="height: fit-content; width: fit-content;"></i>
                    </div>
                @endif
                
                <div class="p-8 md:p-12 lg:p-16 prose prose-lg max-w-none text-gray-700 prose-headings:text-[#00123A] prose-headings:font-bold prose-a:text-[#c29431] prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl">
                    {!! nl2br(e(app()->getLocale() == 'en' && $major->description_en ? $major->description_en : $major->description)) !!}
                </div>
                
                <div class="px-8 md:px-12 lg:px-16 py-6 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    <a href="{{ route('home') }}#jurusan" class="inline-flex items-center text-[#00123A] font-bold hover:text-[#c29431] transition uppercase tracking-wide text-sm">
                        <i class="fas fa-arrow-left mr-2"></i> {{ __('Kembali') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
