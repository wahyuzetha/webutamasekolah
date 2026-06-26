<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Pengaturan Halaman Sejarah</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg shadow-sm">
                    <p class="text-sm text-green-700 font-medium"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8">
                <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <div class="pt-2">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Bagian Hero (Atas)</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <x-input-label for="sejarah_hero_title" value="Judul Utama Halaman" />
                                <x-text-input id="sejarah_hero_title" name="sejarah_hero_title" type="text" class="mt-1 block w-full" :value="$settings['sejarah_hero_title'] ?? 'Sejarah Sekolah'" required />
                            </div>

                            <div>
                                <x-input-label for="sejarah_hero_subtitle" value="Subjudul / Deskripsi Singkat" />
                                <x-text-input id="sejarah_hero_subtitle" name="sejarah_hero_subtitle" type="text" class="mt-1 block w-full" :value="$settings['sejarah_hero_subtitle'] ?? 'Perjalanan panjang SMKS Karya Nugraha Boyolali dalam mencetak generasi vokasi yang unggul dan berprestasi.'" required />
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Bagian Konten Sejarah</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <x-input-label for="sejarah_label" value="Label Kecil di Atas Judul" />
                                <x-text-input id="sejarah_label" name="sejarah_label" type="text" class="mt-1 block w-full" :value="$settings['sejarah_label'] ?? 'Jejak Langkah'" required />
                            </div>

                            <div>
                                <x-input-label for="sejarah_title" value="Judul Konten" />
                                <x-text-input id="sejarah_title" name="sejarah_title" type="text" class="mt-1 block w-full" :value="$settings['sejarah_title'] ?? 'Awal Mula Berdirinya SMKS Karya Nugraha Boyolali'" required />
                            </div>

                            <div>
                                <x-input-label for="sejarah_content" value="Isi Konten Sejarah (Teks Panjang)" />
                                <textarea id="sejarah_content" name="sejarah_content" rows="12" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required>{{ $settings['sejarah_content'] ?? "SMKS Karya Nugraha Boyolali didirikan dengan cita-cita luhur untuk memajukan pendidikan vokasi di wilayah Boyolali dan sekitarnya. Sejak awal berdirinya, sekolah ini telah berkomitmen untuk memberikan pendidikan kejuruan yang berkualitas, relevan dengan kebutuhan industri, dan berlandaskan pada nilai-nilai karakter yang kuat.\n\nSeiring berjalannya waktu, SMKS Karya Nugraha terus mengalami perkembangan pesat. Mulai dari peningkatan kualitas kurikulum, penambahan fasilitas praktik yang memadai, hingga perluasan jaringan kerjasama dengan berbagai perusahaan dan dunia industri (DUDI). Hal ini dilakukan untuk memastikan bahwa setiap lulusan memiliki kompetensi yang mumpuni dan siap bersaing di dunia kerja.\n\nDengan dedikasi dari para pendiri, guru, serta dukungan dari masyarakat dan pemerintah, SMKS Karya Nugraha Boyolali kini telah bertransformasi menjadi salah satu sekolah menengah kejuruan favorit yang banyak menorehkan prestasi, baik di tingkat regional maupun nasional. Kami bangga dapat terus berkontribusi dalam mencetak generasi penerus bangsa yang terampil, profesional, dan berakhlak mulia." }}</textarea>
                                <p class="text-sm text-gray-500 mt-2">Gunakan 'Enter' untuk membuat paragraf baru. Baris baru akan otomatis diubah menjadi paragraf saat ditampilkan di website.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700 shadow-sm transition flex items-center gap-2">
                            <i class="fas fa-save"></i> Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
