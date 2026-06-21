<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Edit Slider</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8">
                <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf @method('PUT')
                    
                    <div>
                        <x-input-label value="Gambar Saat Ini" />
                        <img src="{{ asset('storage/' . $slider->image_path) }}" class="mt-2 h-32 rounded shadow-sm">
                    </div>

                    <div>
                        <x-input-label for="image" value="Ganti Gambar (Opsional)" />
                        <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="title" value="Judul Besar (ID)" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $slider->title)" />
                        </div>
                        <div>
                            <x-input-label for="title_en" value="Judul Besar (EN)" />
                            <x-text-input id="title_en" name="title_en" type="text" class="mt-1 block w-full" :value="old('title_en', $slider->title_en)" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="subtitle" value="Teks Subtitle (ID)" />
                            <x-text-input id="subtitle" name="subtitle" type="text" class="mt-1 block w-full" :value="old('subtitle', $slider->subtitle)" />
                        </div>
                        <div>
                            <x-input-label for="subtitle_en" value="Teks Subtitle (EN)" />
                            <x-text-input id="subtitle_en" name="subtitle_en" type="text" class="mt-1 block w-full" :value="old('subtitle_en', $slider->subtitle_en)" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="button_text" value="Teks Tombol" />
                            <x-text-input id="button_text" name="button_text" type="text" class="mt-1 block w-full" :value="old('button_text', $slider->button_text)" />
                        </div>
                        <div>
                            <x-input-label for="button_link" value="Link Tombol" />
                            <x-text-input id="button_link" name="button_link" type="text" class="mt-1 block w-full" :value="old('button_link', $slider->button_link)" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="order" value="Urutan Tampil" />
                        <x-text-input id="order" name="order" type="number" class="mt-1 block w-full" :value="old('order', $slider->order)" required />
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ route('admin.sliders.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md font-medium hover:bg-gray-200">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md font-medium hover:bg-primary-700">Update Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
