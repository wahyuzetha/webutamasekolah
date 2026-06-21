<x-public-layout>
    <!-- Background Header Graphic -->
    <div class="bg-gradient-to-r from-primary-800 to-primary-600 h-64 md:h-80 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <!-- Main Content Area -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-32 md:-mt-48 relative z-10 mb-20">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
            <div class="p-6 md:p-10">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12">
                    
                    <!-- Left Column: Image -->
                    <div class="md:col-span-4 lg:col-span-3 flex flex-col items-center md:items-start">
                        <div class="rounded-xl overflow-hidden shadow-md aspect-[4/5] bg-gray-100 w-full max-w-[260px] mx-auto md:mx-0 relative sticky top-8">
                            @if($teacher->image_path)
                                <img src="{{ asset('storage/' . $teacher->image_path) }}" alt="{{ $teacher->name }}" class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-user text-6xl md:text-8xl"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Right Column: Details Table -->
                    <div class="md:col-span-8 lg:col-span-9 flex flex-col">
                        <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
                            <table class="w-full text-left border-collapse text-sm sm:text-base">
                                <tbody>
                                    <!-- Header Row -->
                                    <tr class="bg-teal-700 text-white">
                                        <th class="py-3 px-4 font-bold w-1/3 sm:w-1/4 md:w-1/3 border-b border-teal-800 whitespace-nowrap">{{ __('Nama') }}</th>
                                        <td class="py-3 px-4 font-bold border-b border-teal-800"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->name }}</td>
                                    </tr>
                                    
                                    <!-- Data Rows -->
                                    <tr class="bg-white border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('NUPTK') }}</th>
                                        <td class="py-3 px-4 text-gray-700"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->nuptk ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-gray-50 border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('NIP') }}</th>
                                        <td class="py-3 px-4 text-gray-700"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->nip ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-white border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('Tempat Lahir') }}</th>
                                        <td class="py-3 px-4 text-gray-700"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->tempat_lahir ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-gray-50 border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('Agama') }}</th>
                                        <td class="py-3 px-4 text-gray-700"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->agama ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-white border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('Jenis Kelamin') }}</th>
                                        <td class="py-3 px-4 text-gray-700"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->jenis_kelamin ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-gray-50 border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('Status') }}</th>
                                        <td class="py-3 px-4 text-gray-700"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->status_pegawai ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-white border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('No. HP') }}</th>
                                        <td class="py-3 px-4 text-gray-700 break-words"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->phone ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-gray-50 border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('Email') }}</th>
                                        <td class="py-3 px-4 text-gray-700 break-words"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->email ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-white border-b border-gray-100">
                                        <th class="py-3 px-4 font-medium text-gray-600 whitespace-nowrap">{{ __('Jabatan') }}</th>
                                        <td class="py-3 px-4 text-gray-700 break-words"><span class="hidden sm:inline mr-2">:</span>{{ app()->getLocale() == 'en' && $teacher->position_en ? $teacher->position_en : $teacher->position ?: '–' }}</td>
                                    </tr>
                                    <tr class="bg-gray-50">
                                        <th class="py-3 px-4 font-medium text-gray-600 align-top whitespace-nowrap">{{ __('Alamat') }}</th>
                                        <td class="py-3 px-4 text-gray-700 align-top break-words"><span class="hidden sm:inline mr-2">:</span>{{ $teacher->alamat ?: '–' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Spacer to push sharing buttons to bottom if needed -->
                        <div class="flex-grow"></div>

                        <!-- Sharing Buttons Section -->
                        <div class="mt-8 flex flex-col sm:flex-row items-center sm:justify-end border-t border-gray-100 pt-6">
                            <span class="text-gray-500 font-semibold mb-4 sm:mb-0 sm:mr-4">{{ __('Bagikan profil ini:') }}</span>
                            <div class="flex gap-3">
                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full border border-blue-600 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <!-- Twitter/X -->
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode(__('Profil') . ' ' . $teacher->name) }}" target="_blank" class="w-10 h-10 rounded-full border border-sky-500 text-sky-500 flex items-center justify-center hover:bg-sky-500 hover:text-white transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <!-- Telegram -->
                                <a href="https://t.me/share/url?url={{ urlencode(request()->url()) }}&text={{ urlencode(__('Profil') . ' ' . $teacher->name) }}" target="_blank" class="w-10 h-10 rounded-full border border-blue-500 text-blue-500 flex items-center justify-center hover:bg-blue-500 hover:text-white transition">
                                    <i class="fab fa-telegram-plane"></i>
                                </a>
                                <!-- WhatsApp -->
                                <a href="https://api.whatsapp.com/send?text={{ urlencode(__('Profil') . ' ' . $teacher->name) }} - {{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full border border-green-500 text-green-500 flex items-center justify-center hover:bg-green-500 hover:text-white transition">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Back Button -->
                <div class="mt-10 pt-6 border-t border-gray-100 text-center md:text-left">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-800 transition">
                        <i class="fas fa-arrow-left mr-2"></i> {{ __('Kembali ke Beranda') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
