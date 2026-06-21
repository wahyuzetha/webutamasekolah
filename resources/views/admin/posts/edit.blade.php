<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    
                    <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Input Judul -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="title" value="Judul Berita (ID)" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title)" required autofocus autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                            <div>
                                <x-input-label for="title_en" value="Judul Berita (EN)" />
                                <x-text-input id="title_en" name="title_en" type="text" class="mt-1 block w-full" :value="old('title_en', $post->title_en)" autocomplete="off" />
                                <x-input-error class="mt-2" :messages="$errors->get('title_en')" />
                            </div>
                        </div>

                        <!-- Input Slug (Otomatis) -->
                        <div>
                            <x-input-label for="slug" :value="__('Slug (URL)')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full bg-gray-50" :value="old('slug', $post->slug)" required />
                            <p class="mt-1 text-sm text-gray-500">Slug akan menjadi link URL berita Anda. Terisi otomatis dari judul.</p>
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <!-- Input Upload Gambar -->
                        <div>
                            <x-input-label for="image" :value="__('Gambar/Thumbnail Berita (Kosongkan jika tidak ingin mengubah)')" />
                            
                            @if($post->image_path)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Current Image" class="h-32 object-cover rounded border">
                                </div>
                            @endif
                            
                            <input class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2.5 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100" 
                                   id="image" name="image" type="file" accept="image/*">
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <!-- Input Konten (Textarea) -->
                        <div>
                            <x-input-label for="content" value="Isi Berita (ID)" />
                            <textarea id="content" name="content" rows="6" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required>{{ old('content', $post->content) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div>
                            <x-input-label for="content_en" value="Isi Berita (EN)" />
                            <textarea id="content_en" name="content_en" rows="6" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('content_en', $post->content_en) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content_en')" />
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end mt-8 gap-4 pt-4 border-t border-gray-200">
                            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fas fa-save mr-2"></i> {{ __('Update Berita') }}
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
