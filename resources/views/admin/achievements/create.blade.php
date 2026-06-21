<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Prestasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    
                    <form method="POST" action="{{ route('admin.achievements.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Input Judul -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="title" value="Judul Prestasi (ID)" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus placeholder="Contoh: Juara 1 Lomba Web Design" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div>
                            <x-input-label for="title_en" value="Judul Prestasi (EN)" />
                            <x-text-input id="title_en" name="title_en" type="text" class="mt-1 block w-full" :value="old('title_en')" placeholder="Example: 1st Place Web Design Competition" />
                            <x-input-error class="mt-2" :messages="$errors->get('title_en')" />
                        </div>
                    </div>

                        <!-- Input Slug (Otomatis) -->
                        <div>
                            <x-input-label for="slug" :value="__('Slug (URL)')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full bg-gray-50 dark:bg-gray-900" :value="old('slug')" required placeholder="contoh-judul-prestasi" />
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Slug akan menjadi link URL halaman ini. Terisi otomatis dari judul.</p>
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <!-- Tanggal Prestasi -->
                        <div>
                            <x-input-label for="achievement_date" value="Tanggal Prestasi" />
                            <x-text-input id="achievement_date" name="achievement_date" type="date" class="mt-1 block w-full" :value="old('achievement_date')" />
                            <x-input-error class="mt-2" :messages="$errors->get('achievement_date')" />
                        </div>

                        <!-- Input Upload Gambar -->
                        <div>
                            <x-input-label for="image" :value="__('Foto/Sertifikat Prestasi (Opsional)')" />
                            <input class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900 dark:file:text-indigo-300" 
                                   id="image" name="image" type="file" accept="image/*">
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <!-- Input Konten (Textarea) -->
                        <div>
                            <x-input-label for="content" value="Deskripsi Prestasi (ID)" />
                            <textarea id="content" name="content" rows="6" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required placeholder="Tuliskan detail mengenai prestasi ini...">{{ old('content') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div>
                            <x-input-label for="content_en" value="Deskripsi Prestasi (EN)" />
                            <textarea id="content_en" name="content_en" rows="6" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="Write the achievement details here...">{{ old('content_en') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content_en')" />
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end mt-8 gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('admin.achievements.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fas fa-save mr-2"></i> {{ __('Simpan Prestasi') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            titleInput.addEventListener('input', function () {
                let title = titleInput.value;
                let slug = title.toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-') 
                    .replace(/(^-|-$)+/g, '');   

                slugInput.value = slug;
            });
        });
    </script>
</x-admin-layout>
