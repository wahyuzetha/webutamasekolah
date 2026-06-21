<x-public-layout>
    <!-- Header Page -->
    <div class="bg-primary-900 py-16 border-b-4 border-primary-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold text-white mb-4">{{ __('Berita & Agenda Sekolah') }}</h1>
            <p class="text-primary-100 text-lg max-w-2xl mx-auto">{{ __('Ikuti terus perkembangan, prestasi, dan pengumuman terbaru dari SMKS Karya Nugraha Boyolali.') }}</p>
        </div>
    </div>

    <!-- Content -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition overflow-hidden border border-gray-100 flex flex-col h-full group">
                        <div class="aspect-video bg-gray-200 relative overflow-hidden">
                            @if($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100 group-hover:scale-105 transition duration-500">
                                    <i class="fas fa-image text-4xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-xs text-primary-600 mb-2 font-semibold flex items-center gap-2">
                                <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}
                                <span class="mx-1 text-gray-300">•</span>
                                <i class="far fa-user text-gray-400"></i> <span class="text-gray-500">{{ $post->author->name ?? 'Admin' }}</span>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3 leading-tight hover:text-primary-700 transition">
                                <a href="{{ route('posts.show', $post->slug) }}">{{ app()->getLocale() == 'en' && $post->title_en ? $post->title_en : $post->title }}</a>
                            </h2>
                            <p class="text-gray-600 line-clamp-3 text-sm mb-4 flex-grow">
                                {{ Str::limit(strip_tags(app()->getLocale() == 'en' && $post->content_en ? $post->content_en : $post->content), 120) }}
                            </p>
                            <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-primary-700 font-semibold text-sm hover:text-primary-900 transition mt-auto">
                                {{ __('Baca Selengkapnya') }} <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 bg-white rounded-xl border border-dashed border-gray-300">
                        <div class="text-gray-400 mb-4"><i class="fas fa-folder-open text-5xl"></i></div>
                        <h3 class="text-xl font-medium text-gray-900">{{ __('Belum ada berita') }}</h3>
                        <p class="text-gray-500 mt-2">{{ __('Berita dan pengumuman akan muncul di sini setelah ditambahkan oleh admin.') }}</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-public-layout>
