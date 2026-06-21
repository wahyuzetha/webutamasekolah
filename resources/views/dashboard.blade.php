<x-admin-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
        <p class="text-gray-500 mt-1">Berikut adalah ringkasan sistem portal SMKS Karya Nugraha Boyolali hari ini.</p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition">
            <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                <i class="fas fa-newspaper text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Berita</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ \App\Models\Post::count() }}</h3>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition">
            <div class="w-14 h-14 rounded-full bg-green-50 flex items-center justify-center text-green-600 shrink-0">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Admin</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</h3>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition">
            <div class="w-14 h-14 rounded-full bg-purple-50 flex items-center justify-center text-purple-600 shrink-0">
                <i class="fas fa-eye text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Pengunjung Web</p>
                <h3 class="text-2xl font-bold text-gray-900">1,204</h3>
                <p class="text-xs text-green-500 font-medium mt-1"><i class="fas fa-arrow-up"></i> 12% dari kemarin</p>
            </div>
        </div>
        
        <!-- Card 4 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 hover:shadow-md transition">
            <div class="w-14 h-14 rounded-full bg-orange-50 flex items-center justify-center text-orange-600 shrink-0">
                <i class="fas fa-clock text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Aktivitas Terakhir</p>
                <h3 class="text-lg font-bold text-gray-900">Hari ini</h3>
                <p class="text-xs text-gray-400 mt-1">{{ now()->format('H:i') }} WIB</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Posts -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Recent Posts Table -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h3 class="font-bold text-gray-800">Berita Terakhir Ditambahkan</h3>
                <a href="{{ route('admin.posts.index') }}" class="text-sm font-medium text-primary-600 hover:text-primary-800 transition">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Judul Berita</th>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Post::latest()->take(5)->get() as $post)
                            <tr class="bg-white border-b hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ Str::limit($post->title, 50) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('posts.show', $post->slug) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-gray-400">
                                    <i class="fas fa-inbox text-3xl mb-3"></i>
                                    <p>Belum ada berita yang ditambahkan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-gray-800">Aksi Cepat</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('admin.posts.create') }}" class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:border-primary-500 hover:bg-primary-50 transition group">
                    <div class="w-10 h-10 rounded bg-primary-100 text-primary-600 flex items-center justify-center group-hover:bg-primary-600 group-hover:text-white transition">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800 group-hover:text-primary-700">Tulis Berita Baru</p>
                        <p class="text-xs text-gray-500">Buat pengumuman atau artikel baru</p>
                    </div>
                </a>
                
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:border-gray-300 hover:bg-gray-50 transition group">
                    <div class="w-10 h-10 rounded bg-gray-100 text-gray-600 flex items-center justify-center group-hover:bg-gray-200 transition">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Pengaturan Akun</p>
                        <p class="text-xs text-gray-500">Ubah password atau profil Anda</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</x-admin-layout>
