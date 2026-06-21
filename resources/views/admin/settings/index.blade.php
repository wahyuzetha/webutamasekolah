<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Pengaturan Profil Sekolah</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg shadow-sm">
                    <p class="text-sm text-green-700 font-medium"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kolom Kiri -->
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="school_name" value="Nama Sekolah" />
                                <x-text-input id="school_name" name="school_name" type="text" class="mt-1 block w-full" :value="$settings['school_name'] ?? 'SMKS Karya Nugraha Boyolali'" required />
                            </div>

                            <div>
                                <x-input-label for="school_phone" value="No. Telepon" />
                                <x-text-input id="school_phone" name="school_phone" type="text" class="mt-1 block w-full" :value="$settings['school_phone'] ?? '(0276) 321xxx'" required />
                            </div>

                            <div>
                                <x-input-label for="school_email" value="Email Utama" />
                                <x-text-input id="school_email" name="school_email" type="email" class="mt-1 block w-full" :value="$settings['school_email'] ?? 'info@smkknboyolali.sch.id'" required />
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="school_facebook" value="Link Facebook (Opsional)" />
                                <x-text-input id="school_facebook" name="school_facebook" type="text" class="mt-1 block w-full" :value="$settings['school_facebook'] ?? ''" placeholder="https://facebook.com/..." />
                            </div>

                            <div>
                                <x-input-label for="school_instagram" value="Link Instagram (Opsional)" />
                                <x-text-input id="school_instagram" name="school_instagram" type="text" class="mt-1 block w-full" :value="$settings['school_instagram'] ?? ''" placeholder="https://instagram.com/..." />
                            </div>
                            
                            <div>
                                <x-input-label for="school_youtube" value="Link YouTube (Opsional)" />
                                <x-text-input id="school_youtube" name="school_youtube" type="text" class="mt-1 block w-full" :value="$settings['school_youtube'] ?? ''" placeholder="https://youtube.com/..." />
                            </div>
                        </div>
                            <div>
                                <x-input-label for="school_x_twitter" value="Link X / Twitter (Opsional)" />
                                <x-text-input id="school_x_twitter" name="school_x_twitter" type="text" class="mt-1 block w-full" :value="$settings['school_x_twitter'] ?? ''" placeholder="https://x.com/..." />
                            </div>

                            <div>
                                <x-input-label for="school_linkedin" value="Link LinkedIn (Opsional)" />
                                <x-text-input id="school_linkedin" name="school_linkedin" type="text" class="mt-1 block w-full" :value="$settings['school_linkedin'] ?? ''" placeholder="https://linkedin.com/..." />
                            </div>
                            
                            <div>
                                <x-input-label for="school_tiktok" value="Link TikTok (Opsional)" />
                                <x-text-input id="school_tiktok" name="school_tiktok" type="text" class="mt-1 block w-full" :value="$settings['school_tiktok'] ?? ''" placeholder="https://tiktok.com/..." />
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Lebar Penuh (Alamat) -->
                    <div class="pt-4 border-t border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="school_address" value="Alamat Lengkap Sekolah (Untuk Footer - ID)" />
                            <textarea id="school_address" name="school_address" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required>{{ $settings['school_address'] ?? 'Jl. Tentara Pelajar No. 1, Boyolali' }}</textarea>
                        </div>
                        <div>
                            <x-input-label for="school_address_en" value="Alamat Lengkap Sekolah (Untuk Footer - EN)" />
                            <textarea id="school_address_en" name="school_address_en" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ $settings['school_address_en'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <!-- Pengaturan Logo Footer -->
                    <div class="pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Pengaturan Logo Footer</h3>
                        <div>
                            <x-input-label for="footer_logo" value="Upload Logo Footer (Biarkan kosong jika tidak ingin mengubah)" />
                            <input type="file" id="footer_logo" name="footer_logo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100" accept="image/*">
                            @if(!empty($settings['footer_logo_path']))
                                <div class="mt-2 text-sm text-gray-500">
                                    Logo saat ini: <a href="{{ asset('storage/' . $settings['footer_logo_path']) }}" target="_blank" class="text-primary-600 underline">Lihat Logo</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- PENGATURAN TOP UTILITY BAR -->
                    <div class="pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Pengaturan Top Bar (Utilitas Atas)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="top_phone" value="No. Telepon (Top Bar)" />
                                <x-text-input id="top_phone" name="top_phone" type="text" class="mt-1 block w-full" :value="$settings['top_phone'] ?? '+62 812 3456 7890'" />
                            </div>
                            <div>
                                <x-input-label for="top_email" value="Email (Top Bar)" />
                                <x-text-input id="top_email" name="top_email" type="email" class="mt-1 block w-full" :value="$settings['top_email'] ?? 'info@smkknbi.sch.id'" />
                            </div>
                            <div>
                                <x-input-label for="top_cta_text" value="Teks Tombol CTA (Contoh: MAU JADI SISWA?)" />
                                <x-text-input id="top_cta_text" name="top_cta_text" type="text" class="mt-1 block w-full" :value="$settings['top_cta_text'] ?? 'MAU JADI SISWA?'" />
                            </div>
                            <div>
                                <x-input-label for="top_cta_link" value="Link Tombol CTA" />
                                <x-text-input id="top_cta_link" name="top_cta_link" type="text" class="mt-1 block w-full" :value="$settings['top_cta_link'] ?? '#'" />
                            </div>
                        </div>
                    </div>

                    <!-- PENGATURAN SEKSI SAMBUTAN (ABOUT) & VISI MISI -->
                    <div class="pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Pengaturan Profil Kepala Sekolah & Visi Misi</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="about_title" value="Judul Sambutan/Profil Kepala Sekolah (ID)" />
                                <x-text-input id="about_title" name="about_title" type="text" class="mt-1 block w-full" :value="$settings['about_title'] ?? 'Selamat Datang di SMKS Karya Nugraha Boyolali'" />
                            </div>
                            <div>
                                <x-input-label for="about_title_en" value="Judul Sambutan/Profil Kepala Sekolah (EN)" />
                                <x-text-input id="about_title_en" name="about_title_en" type="text" class="mt-1 block w-full" :value="$settings['about_title_en'] ?? 'Welcome to SMKS Karya Nugraha Boyolali'" />
                            </div>
                        </div>

                        <div class="mb-6">
                            <x-input-label for="about_image" value="Foto Kepala Sekolah (Biarkan kosong jika tidak ingin mengubah)" />
                            <input type="file" id="about_image" name="about_image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100" accept="image/*">
                            @if(!empty($settings['about_image_path']))
                                <div class="mt-2 text-sm text-gray-500">
                                    Foto saat ini: <a href="{{ asset('storage/' . $settings['about_image_path']) }}" target="_blank" class="text-primary-600 underline">Lihat Foto</a>
                                </div>
                            @endif
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="about_description" value="Profil Singkat Kepala Sekolah / Sambutan (ID)" />
                                <textarea id="about_description" name="about_description" rows="5" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ $settings['about_description'] ?? 'SMKS Karya Nugraha Boyolali merupakan sekolah kejuruan yang berkomitmen mencetak generasi...' }}</textarea>
                            </div>
                            <div>
                                <x-input-label for="about_description_en" value="Profil Singkat Kepala Sekolah / Sambutan (EN)" />
                                <textarea id="about_description_en" name="about_description_en" rows="5" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ $settings['about_description_en'] ?? 'SMKS Karya Nugraha Boyolali is a vocational school committed to producing...' }}</textarea>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="visi_sekolah" value="Visi Sekolah (ID)" />
                                <textarea id="visi_sekolah" name="visi_sekolah" rows="4" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ $settings['visi_sekolah'] ?? 'Menjadi lembaga pendidikan vokasi yang unggul, berkarakter, dan berdaya saing global.' }}</textarea>
                            </div>
                            <div>
                                <x-input-label for="visi_sekolah_en" value="Visi Sekolah (EN)" />
                                <textarea id="visi_sekolah_en" name="visi_sekolah_en" rows="4" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ $settings['visi_sekolah_en'] ?? '' }}</textarea>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="misi_sekolah" value="Misi Sekolah (ID) (Gunakan - untuk setiap poin)" />
                                <textarea id="misi_sekolah" name="misi_sekolah" rows="4" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ $settings['misi_sekolah'] ?? "- Menyelenggarakan pendidikan...\n- Mengembangkan kerjasama industri..." }}</textarea>
                            </div>
                            <div>
                                <x-input-label for="misi_sekolah_en" value="Misi Sekolah (EN) (Gunakan - untuk setiap poin)" />
                                <textarea id="misi_sekolah_en" name="misi_sekolah_en" rows="4" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ $settings['misi_sekolah_en'] ?? '' }}</textarea>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="about_cta_text" value="Teks Tombol Lanjut (Contoh: Profil Kepala Sekolah)" />
                                <x-text-input id="about_cta_text" name="about_cta_text" type="text" class="mt-1 block w-full" :value="$settings['about_cta_text'] ?? 'Profil Kepala Sekolah'" />
                            </div>
                            <div>
                                <x-input-label for="about_cta_link" value="Link Tombol Lanjut (Kosongkan untuk rute default)" />
                                <x-text-input id="about_cta_link" name="about_cta_link" type="text" class="mt-1 block w-full" :value="$settings['about_cta_link'] ?? route('profil.kepala-sekolah')" placeholder="{{ route('profil.kepala-sekolah') }}" />
                            </div>
                        </div>
                    </div>

                    <!-- PENGATURAN STATISTIK SEKOLAH -->
                    <div class="pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Pengaturan Statistik Sekolah</h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div>
                                <x-input-label for="stat_siswa" value="Jumlah Siswa" />
                                <x-text-input id="stat_siswa" name="stat_siswa" type="number" class="mt-1 block w-full" :value="$settings['stat_siswa'] ?? '2890'" />
                            </div>
                            <div>
                                <x-input-label for="stat_guru" value="Guru dan Karyawan" />
                                <x-text-input id="stat_guru" name="stat_guru" type="number" class="mt-1 block w-full" :value="$settings['stat_guru'] ?? '135'" />
                            </div>
                            <div>
                                <x-input-label for="stat_rombel" value="Rombongan Belajar" />
                                <x-text-input id="stat_rombel" name="stat_rombel" type="number" class="mt-1 block w-full" :value="$settings['stat_rombel'] ?? '72'" />
                            </div>
                            <div>
                                <x-input-label for="stat_jurusan" value="Konsentrasi Keahlian" />
                                <x-text-input id="stat_jurusan" name="stat_jurusan" type="number" class="mt-1 block w-full" :value="$settings['stat_jurusan'] ?? '7'" />
                            </div>
                        </div>
                    </div>

                    <!-- PENGATURAN VIDEO PROFIL SEKOLAH -->
                    <div class="pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Pengaturan Video Profil Sekolah</h3>
                        <div class="bg-blue-50 border border-blue-100 p-4 rounded-lg mb-6 flex items-start gap-3">
                            <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                            <p class="text-sm text-blue-800">
                                Masukkan link video YouTube untuk ditampilkan di beranda. Gunakan format lengkap, contoh:<br>
                                <code>https://www.youtube.com/watch?v=XXXXXXXXXXX</code>
                            </p>
                        </div>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <x-input-label for="video_profil_url" value="URL Video YouTube Profil Sekolah" />
                                <x-text-input id="video_profil_url" name="video_profil_url" type="url" class="mt-1 block w-full" :value="$settings['video_profil_url'] ?? ''" placeholder="https://www.youtube.com/watch?v=..." />
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
