<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Keunggulan (Fitur)') }}
            </h2>
            <a href="{{ route('admin.features.create') }}" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition shadow-sm text-sm font-semibold">
                <i class="fas fa-plus mr-1"></i> Tambah Keunggulan
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg shadow-sm">
                    <p class="text-sm text-green-700 font-medium"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-600 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 font-bold">Urutan</th>
                                <th class="px-6 py-4 font-bold">Ikon / Gambar</th>
                                <th class="px-6 py-4 font-bold">Judul</th>
                                <th class="px-6 py-4 font-bold">Deskripsi</th>
                                <th class="px-6 py-4 font-bold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($features as $feature)
                                <tr class="hover:bg-gray-50/50 transition">
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-700 font-bold border border-gray-200">{{ $feature->order }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($feature->icon)
                                            @if(str_starts_with($feature->icon, 'fa'))
                                                <i class="{{ $feature->icon }} text-2xl text-primary-600"></i>
                                            @else
                                                <span class="text-xl">{{ $feature->icon }}</span>
                                            @endif
                                        @else
                                            <span class="text-gray-400 italic">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-900">{{ $feature->title }}</td>
                                    <td class="px-6 py-4 text-gray-500 max-w-xs truncate">{{ $feature->description }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.features.edit', $feature) }}" class="p-2 text-primary-600 hover:bg-primary-50 rounded-lg transition" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus keunggulan ini?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fas fa-star text-4xl text-gray-300 mb-3"></i>
                                            <p>Belum ada data keunggulan. Silakan tambahkan baru.</p>
                                        </div>
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
