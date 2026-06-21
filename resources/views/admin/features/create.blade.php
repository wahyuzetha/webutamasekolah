<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Keunggulan') }}
            </h2>
            <a href="{{ route('admin.features.index') }}" class="text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8">
                <form action="{{ route('admin.features.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="title" value="Judul Keunggulan (ID)" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div>
                            <x-input-label for="title_en" value="Judul Keunggulan (EN)" />
                            <x-text-input id="title_en" name="title_en" type="text" class="mt-1 block w-full" :value="old('title_en')" />
                            <x-input-error class="mt-2" :messages="$errors->get('title_en')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="description" value="Deskripsi Singkat (ID)" />
                        <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="description_en" value="Deskripsi Singkat (EN)" />
                        <textarea id="description_en" name="description_en" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('description_en') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description_en')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="icon" value="Class Icon (misal: fas fa-book) / Emoji" />
                            <x-text-input id="icon" name="icon" type="text" class="mt-1 block w-full" :value="old('icon')" placeholder="fas fa-star" />
                            <p class="text-xs text-gray-500 mt-1">Gunakan class FontAwesome (misal: fas fa-award) atau Emoji biasa.</p>
                            <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                        </div>

                        <div>
                            <x-input-label for="link" value="Link Tujuan (Opsional)" />
                            <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link')" placeholder="https://..." />
                            <x-input-error class="mt-2" :messages="$errors->get('link')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="order" value="Urutan Tampil" />
                        <x-text-input id="order" name="order" type="number" class="mt-1 block w-24" :value="old('order', 1)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('order')" />
                    </div>

                    <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                        <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700 shadow-sm transition flex items-center gap-2">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
