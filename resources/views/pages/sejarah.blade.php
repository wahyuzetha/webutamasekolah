<x-public-layout>
    @php
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
    @endphp

    <!-- Header Section -->
    <div class="bg-[#00123A] py-16 sm:py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-[#c29431] blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 rounded-full bg-blue-500 blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-4">{{ $settings['sejarah_hero_title'] ?? __('Sejarah Sekolah') }}</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">{{ $settings['sejarah_hero_subtitle'] ?? __('Perjalanan panjang SMKS Karya Nugraha Boyolali dalam mencetak generasi vokasi yang unggul dan berprestasi.') }}</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
        
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-8 opacity-5">
                <i class="fas fa-landmark text-9xl"></i>
            </div>
            
            <div class="relative z-10">
                <div class="inline-block border-l-4 border-[#c29431] pl-4 mb-8">
                    <span class="text-[#c29431] font-bold tracking-wider uppercase text-sm">{{ $settings['sejarah_label'] ?? __('Jejak Langkah') }}</span>
                </div>
                
                <h2 class="text-3xl font-extrabold text-[#00123A] mb-8">{{ $settings['sejarah_title'] ?? __('Awal Mula Berdirinya SMKS Karya Nugraha Boyolali') }}</h2>
                
                <div class="prose prose-lg text-gray-600 max-w-none leading-relaxed space-y-6">
                    @if(!empty($settings['sejarah_content']))
                        {!! nl2br(e($settings['sejarah_content'])) !!}
                    @else
                        <p>
                            SMKS Karya Nugraha Boyolali didirikan dengan cita-cita luhur untuk memajukan pendidikan vokasi di wilayah Boyolali dan sekitarnya. Sejak awal berdirinya, sekolah ini telah berkomitmen untuk memberikan pendidikan kejuruan yang berkualitas, relevan dengan kebutuhan industri, dan berlandaskan pada nilai-nilai karakter yang kuat.
                        </p>
                        <p>
                            Seiring berjalannya waktu, SMKS Karya Nugraha terus mengalami perkembangan pesat. Mulai dari peningkatan kualitas kurikulum, penambahan fasilitas praktik yang memadai, hingga perluasan jaringan kerjasama dengan berbagai perusahaan dan dunia industri (DUDI). Hal ini dilakukan untuk memastikan bahwa setiap lulusan memiliki kompetensi yang mumpuni dan siap bersaing di dunia kerja.
                        </p>
                        <p>
                            Dengan dedikasi dari para pendiri, guru, serta dukungan dari masyarakat dan pemerintah, SMKS Karya Nugraha Boyolali kini telah bertransformasi menjadi salah satu sekolah menengah kejuruan favorit yang banyak menorehkan prestasi, baik di tingkat regional maupun nasional. Kami bangga dapat terus berkontribusi dalam mencetak generasi penerus bangsa yang terampil, profesional, dan berakhlak mulia.
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Optional Timeline / Highlight Box -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-br from-[#00123A] to-[#001b54] rounded-2xl p-6 text-white text-center shadow-lg transform hover:-translate-y-1 transition duration-300">
                <div class="text-[#c29431] text-3xl mb-3"><i class="fas fa-calendar-alt"></i></div>
                <h4 class="font-bold text-xl mb-2">Didirikan</h4>
                <p class="text-blue-100 text-sm font-light">Berdiri dengan tekad memajukan pendidikan vokasi di Boyolali.</p>
            </div>
            <div class="bg-gradient-to-br from-[#00123A] to-[#001b54] rounded-2xl p-6 text-white text-center shadow-lg transform hover:-translate-y-1 transition duration-300">
                <div class="text-[#c29431] text-3xl mb-3"><i class="fas fa-users"></i></div>
                <h4 class="font-bold text-xl mb-2">Perkembangan</h4>
                <p class="text-blue-100 text-sm font-light">Terus berkembang dengan ribuan alumni yang sukses di berbagai bidang.</p>
            </div>
            <div class="bg-gradient-to-br from-[#00123A] to-[#001b54] rounded-2xl p-6 text-white text-center shadow-lg transform hover:-translate-y-1 transition duration-300">
                <div class="text-[#c29431] text-3xl mb-3"><i class="fas fa-award"></i></div>
                <h4 class="font-bold text-xl mb-2">Prestasi</h4>
                <p class="text-blue-100 text-sm font-light">Meraih berbagai penghargaan di tingkat regional dan nasional.</p>
            </div>
        </div>
        
    </div>
</x-public-layout>
