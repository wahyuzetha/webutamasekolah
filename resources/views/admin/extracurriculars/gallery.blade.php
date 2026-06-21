<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                Galeri: {{ $extracurricular->name }}
            </h2>
            <a href="{{ route('admin.extracurriculars.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 shadow-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg shadow-sm">
                    <p class="text-sm text-green-700 font-medium"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg shadow-sm">
                    <ul class="list-disc list-inside text-sm text-red-700 font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Form Upload -->
                <div class="md:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6 sticky top-6">
                        <h3 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2">Unggah Foto Baru</h3>
                        <form action="{{ route('admin.extracurriculars.gallery.store', $extracurricular) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            
                            <div>
                                <x-input-label for="images" value="Pilih Foto (Bisa lebih dari 1)" />
                                <input type="file" name="images[]" id="images" accept="image/*" multiple required class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                                <p class="text-xs text-gray-500 mt-1">Maks 2MB per file.</p>
                            </div>

                            <div>
                                <x-input-label for="caption" value="Keterangan Kegiatan (ID) - Opsional" />
                                <x-text-input id="caption" name="caption" type="text" class="mt-1 block w-full text-sm" placeholder="Misal: Latihan Pramuka 2026" />
                            </div>

                            <div>
                                <x-input-label for="caption_en" value="Keterangan Kegiatan (EN) - Opsional" />
                                <x-text-input id="caption_en" name="caption_en" type="text" class="mt-1 block w-full text-sm" placeholder="Misal: Scout Practice 2026" />
                                <p class="text-xs text-gray-500 mt-1">Keterangan ini akan berlaku untuk semua foto yang diunggah bersamaan.</p>
                            </div>

                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none">
                                <i class="fas fa-upload mr-2 mt-1"></i> Unggah Foto
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Daftar Galeri -->
                <div class="md:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6">
                        <h3 class="font-bold text-lg text-gray-800 mb-4 border-b pb-2">Foto Kegiatan Tersimpan ({{ $galleries->count() }})</h3>
                        
                        @if($galleries->isEmpty())
                            <div class="text-center py-12">
                                <i class="fas fa-images text-5xl text-gray-300 mb-3"></i>
                                <p class="text-gray-500">Belum ada foto galeri kegiatan untuk ekstrakurikuler ini.</p>
                            </div>
                        @else
                            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($galleries as $gallery)
                                    <div class="relative group rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                                        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->caption ?? 'Galeri' }}" class="w-full h-40 object-cover">
                                        
                                        <!-- Overlay -->
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex flex-col justify-between p-3 opacity-0 group-hover:opacity-100">
                                            @if($gallery->caption)
                                                <div class="text-xs text-white bg-black bg-opacity-70 px-2 py-1 rounded truncate">
                                                    {{ $gallery->caption }}
                                                </div>
                                            @else
                                                <div></div>
                                            @endif
                                            
                                            <div class="flex justify-end">
                                                <form action="{{ route('admin.extracurriculars.gallery.destroy', [$extracurricular, $gallery]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white rounded-full w-8 h-8 flex items-center justify-center shadow" title="Hapus Foto">
                                                        <i class="fas fa-trash-alt text-xs"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
