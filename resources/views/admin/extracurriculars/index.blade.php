<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Data Ekstrakurikuler') }}
            </h2>
            <a href="{{ route('admin.extracurriculars.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 shadow-sm">
                <i class="fas fa-plus mr-2"></i> Tambah Ekstrakurikuler
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-4">Gambar</th>
                                <th scope="col" class="px-6 py-4">Nama Ekstrakurikuler</th>
                                <th scope="col" class="px-6 py-4">Slug</th>
                                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($extracurriculars as $extracurricular)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        @if($extracurricular->image_path)
                                            <img src="{{ asset('storage/' . $extracurricular->image_path) }}" class="w-12 h-12 object-cover rounded shadow-sm">
                                        @else
                                            <div class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center text-gray-400">
                                                <i class="fas fa-futbol"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $extracurricular->name }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">
                                        {{ $extracurricular->slug }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('admin.extracurriculars.gallery.index', $extracurricular) }}" class="text-blue-600 hover:text-blue-800" title="Kelola Galeri">
                                                <i class="fas fa-images text-lg"></i>
                                            </a>
                                            <a href="{{ route('admin.extracurriculars.edit', $extracurricular) }}" class="text-yellow-600 hover:text-yellow-800" title="Edit">
                                                <i class="fas fa-edit text-lg"></i>
                                            </a>
                                            <form action="{{ route('admin.extracurriculars.destroy', $extracurricular) }}" method="POST" onsubmit="return confirm('Hapus ekstrakurikuler ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                                    <i class="fas fa-trash-alt text-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-futbol text-4xl mb-3 text-gray-300"></i>
                                        <p>Belum ada data ekstrakurikuler yang ditambahkan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
