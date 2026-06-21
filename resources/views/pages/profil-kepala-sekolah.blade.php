<x-public-layout>
    @php
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
    @endphp

    <!-- Header Section -->
    <div class="bg-[#00123A] py-16 sm:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#c29431] blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 rounded-full bg-blue-500 blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-4">{{ __('Profil Kepala Sekolah') }}</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">{{ __('Mengenal lebih dekat sosok pemimpin SMKS Karya Nugraha Boyolali beserta Visi & Misi sekolah kami.') }}</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
        <!-- Profil Kepala Sekolah -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-5">
                <div class="lg:col-span-2 bg-gray-50 relative p-8 sm:p-12 flex items-center justify-center">
                    <div class="relative w-full max-w-sm aspect-[4/5] rounded-2xl overflow-hidden shadow-2xl border-8 border-white">
                        @if(!empty($settings['about_image_path']))
                            <img src="{{ asset('storage/' . $settings['about_image_path']) }}" alt="Kepala Sekolah" class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Kepala Sekolah" class="w-full h-full object-cover">
                        @endif
                    </div>
                </div>
                <div class="lg:col-span-3 p-8 sm:p-12 lg:p-16 flex flex-col justify-center">
                    <div class="inline-block border-l-4 border-[#c29431] pl-4 mb-4">
                        <span class="text-[#c29431] font-bold tracking-wider uppercase text-sm">{{ __('Sambutan & Profil') }}</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#00123A] leading-tight mb-6">
                        {{ app()->getLocale() == 'en' && !empty($settings['about_title_en']) ? $settings['about_title_en'] : ($settings['about_title'] ?? 'Selamat Datang di SMKS Karya Nugraha Boyolali') }}
                    </h2>
                    <div class="prose prose-lg text-gray-600 whitespace-pre-line max-w-none leading-relaxed">
                        {{ app()->getLocale() == 'en' && !empty($settings['about_description_en']) ? $settings['about_description_en'] : ($settings['about_description'] ?? 'SMKS Karya Nugraha Boyolali merupakan sekolah kejuruan yang berkomitmen mencetak generasi vokasi unggul. Kami membekali siswa dengan kompetensi teknis, karakter profesional, dan mental juara agar siap menghadapi tantangan dunia industri global.') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Visi -->
            <div class="bg-gradient-to-br from-[#00123A] to-[#001b54] rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 opacity-10 group-hover:scale-110 transition-transform duration-700">
                    <i class="fas fa-eye text-[12rem]"></i>
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-[#c29431] rounded-2xl flex items-center justify-center text-white mb-8 shadow-lg">
                        <i class="fas fa-bullseye text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-extrabold mb-6 tracking-tight">{{ __('Visi Sekolah') }}</h3>
                    <p class="text-xl leading-relaxed text-blue-50 font-light italic">
                        "{{ app()->getLocale() == 'en' && !empty($settings['visi_sekolah_en']) ? $settings['visi_sekolah_en'] : ($settings['visi_sekolah'] ?? 'Menjadi lembaga pendidikan vokasi yang unggul, berkarakter, dan berdaya saing global.') }}"
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="bg-white rounded-3xl p-8 sm:p-12 border border-gray-100 shadow-xl relative overflow-hidden group">
                <div class="absolute -right-10 -bottom-10 opacity-5 text-gray-400 group-hover:scale-110 transition-transform duration-700">
                    <i class="fas fa-rocket text-[12rem]"></i>
                </div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#00123A] mb-8 shadow-sm">
                        <i class="fas fa-tasks text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-extrabold mb-6 text-[#00123A] tracking-tight">{{ __('Misi Sekolah') }}</h3>
                    <ul class="space-y-4">
                        @php
                            $misi_text = app()->getLocale() == 'en' && !empty($settings['misi_sekolah_en']) ? $settings['misi_sekolah_en'] : ($settings['misi_sekolah'] ?? "- Menyelenggarakan pendidikan...\n- Mengembangkan kerjasama industri...");
                            $misi_items = array_filter(array_map('trim', explode("\n", $misi_text)));
                        @endphp
                        @foreach($misi_items as $item)
                            <li class="flex items-start">
                                <span class="text-[#c29431] mt-1 mr-3"><i class="fas fa-check-circle"></i></span>
                                <span class="text-gray-600 text-lg leading-relaxed">{{ ltrim($item, '- ') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
