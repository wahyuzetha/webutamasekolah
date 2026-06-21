<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                {{ __('Data Guru & Staf') }}
            </h2>
            <a href="{{ route('admin.teachers.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 shadow-sm">
                <i class="fas fa-plus mr-2"></i> Tambah Guru/Staf
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
                                <th scope="col" class="px-6 py-4">Foto</th>
                                <th scope="col" class="px-6 py-4">Nama Lengkap & Gelar</th>
                                <th scope="col" class="px-6 py-4">Jabatan</th>
                                <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teachers as $teacher)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        @if($teacher->image_path)
                                            <img src="{{ asset('storage/' . $teacher->image_path) }}" class="w-16 h-16 object-cover rounded-md shadow-sm">
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded-md flex items-center justify-center text-gray-400 shadow-sm border border-gray-200">
                                                <i class="fas fa-user text-xl"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-900">
                                        {{ $teacher->name }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-600">
                                        {{ $teacher->position }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('admin.teachers.edit', $teacher) }}" class="text-yellow-600 hover:text-yellow-800 bg-yellow-50 p-2 rounded-md transition" title="Edit">
                                                <i class="fas fa-edit text-lg"></i>
                                            </a>
                                            <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" onsubmit="return confirm('Hapus data guru ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 bg-red-50 p-2 rounded-md transition" title="Hapus">
                                                    <i class="fas fa-trash-alt text-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-users text-4xl mb-3 text-gray-300"></i>
                                        <p>Belum ada data guru atau staf yang ditambahkan.</p>
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
