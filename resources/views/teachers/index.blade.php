<x-public-layout>
    <!-- Header Page -->
    <div class="bg-primary-700 py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4">{{ __('Daftar Guru & Staf') }}</h1>
            <p class="text-primary-100 text-lg max-w-2xl mx-auto">{{ __('Tenaga pendidik dan kependidikan profesional di lingkungan sekolah kami.') }}</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($teachers ?? [] as $teacher)
                    <a href="{{ route('teachers.show', $teacher->slug ?? $teacher->id) }}" class="bg-white rounded-2xl shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] overflow-hidden transition-transform duration-300 hover:-translate-y-1 border border-gray-100 block group">
                        <div class="relative aspect-[4/5] overflow-hidden bg-gray-100">
                            @if($teacher->image_path)
                                <img src="{{ asset('storage/' . $teacher->image_path) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <i class="fas fa-user text-5xl"></i>
                                </div>
                            @endif
                            
                            <!-- Floating Share Action -->
                            <div class="absolute -bottom-6 right-6">
                                <button class="w-12 h-12 bg-primary-600 text-white rounded-full shadow-lg flex items-center justify-center hover:bg-primary-700 transition transform hover:scale-105" onclick="event.preventDefault(); window.location.href='{{ route('teachers.show', $teacher->slug ?? $teacher->id) }}'">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="pt-10 pb-8 px-6 text-center">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 uppercase tracking-wide group-hover:text-primary-700 transition">{{ $teacher->name }}</h3>
                            <p class="text-gray-500 text-sm font-semibold">{{ app()->getLocale() == 'en' && $teacher->position_en ? $teacher->position_en : $teacher->position }}</p>
                            
                            @if($teacher->facebook || $teacher->instagram || $teacher->linkedin)
                                <div class="flex justify-center gap-3 mt-4">
                                    @if($teacher->facebook)
                                        <object><a href="{{ $teacher->facebook }}" target="_blank" class="text-gray-400 hover:text-primary-600 transition"><i class="fab fa-facebook"></i></a></object>
                                    @endif
                                    @if($teacher->instagram)
                                        <object><a href="{{ $teacher->instagram }}" target="_blank" class="text-gray-400 hover:text-primary-600 transition"><i class="fab fa-instagram"></i></a></object>
                                    @endif
                                    @if($teacher->linkedin)
                                        <object><a href="{{ $teacher->linkedin }}" target="_blank" class="text-gray-400 hover:text-primary-600 transition"><i class="fab fa-linkedin"></i></a></object>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16 bg-white rounded-xl border border-dashed border-gray-300">
                        <i class="fas fa-users text-5xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-bold text-gray-700">{{ __('Belum ada data') }}</h3>
                        <p class="text-gray-500 mt-2">{{ __('Belum ada data guru/staf yang ditambahkan.') }}</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-12 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-800 transition">
                    <i class="fas fa-arrow-left mr-2"></i> {{ __('Kembali ke Beranda') }}
                </a>
            </div>
        </div>
    </div>
</x-public-layout>
