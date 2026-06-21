<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Edit Ekstrakurikuler</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8">
                <form action="{{ route('admin.extracurriculars.update', $extracurricular) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="name" value="Nama Ekstrakurikuler (ID)" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $extracurricular->name)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="name_en" value="Nama Ekstrakurikuler (EN)" />
                            <x-text-input id="name_en" name="name_en" type="text" class="mt-1 block w-full" :value="old('name_en', $extracurricular->name_en)" />
                            <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="slug" value="Slug (URL Friendly)" />
                        <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full lowercase" :value="old('slug', $extracurricular->slug)" required />
                        <p class="text-xs text-gray-500 mt-1">Gunakan huruf kecil dan pisahkan kata dengan strip (-) tanpa spasi.</p>
                        <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                    </div>

                    <div>
                        <x-input-label for="description" value="Deskripsi Ekstrakurikuler (ID)" />
                        <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required>{{ old('description', $extracurricular->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="description_en" value="Deskripsi Ekstrakurikuler (EN)" />
                        <textarea id="description_en" name="description_en" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('description_en', $extracurricular->description_en) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description_en')" />
                    </div>

                    <div>
                        <x-input-label for="image" value="Gambar Dokumentasi Baru (Opsional)" />
                        
                        @if($extracurricular->image_path)
                            <div class="mb-4 mt-2">
                                <p class="text-sm text-gray-500 mb-2">Gambar Saat Ini:</p>
                                <img src="{{ asset('storage/' . $extracurricular->image_path) }}" alt="{{ $extracurricular->name }}" class="h-32 object-cover rounded-md border">
                            </div>
                        @endif

                        <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('admin.extracurriculars.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md font-medium hover:bg-gray-200">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md font-medium hover:bg-primary-700">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
