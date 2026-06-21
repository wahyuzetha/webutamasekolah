<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Prestasi') }}
            </h2>
            <a href="{{ route('admin.achievements.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 active:bg-primary-900 focus:outline-none focus:border-primary-900 focus:ring ring-primary-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                <i class="fas fa-plus mr-2"></i> Tambah Prestasi
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg shadow-sm">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-4">Gambar</th>
                                <th scope="col" class="px-6 py-4">Judul Prestasi</th>
                                <th scope="col" class="px-6 py-4">Tanggal Prestasi</th>
                                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($achievements as $achievement)
                                <tr class="bg-white border-b hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        @if($achievement->image_path)
                                            <img src="{{ asset('storage/' . $achievement->image_path) }}" alt="{{ $achievement->title }}" class="w-16 h-12 object-cover rounded shadow-sm">
                                        @else
                                            <div class="w-16 h-12 bg-gray-100 rounded flex items-center justify-center text-gray-400">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ Str::limit($achievement->title, 50) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $achievement->achievement_date ? $achievement->achievement_date->format('d M Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            <a href="{{ route('achievements.show', $achievement->slug) }}" target="_blank" class="text-gray-500 hover:text-blue-600 transition" title="Lihat Publik">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.achievements.edit', $achievement) }}" class="text-gray-500 hover:text-yellow-600 transition" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-500 hover:text-red-600 transition" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fas fa-trophy text-5xl text-gray-300 mb-4"></i>
                                            <p class="text-lg font-medium text-gray-900">Belum ada data prestasi.</p>
                                            <p class="mt-1">Silakan klik "Tambah Prestasi" untuk mulai menambahkan.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($achievements->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100">
                        {{ $achievements->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
