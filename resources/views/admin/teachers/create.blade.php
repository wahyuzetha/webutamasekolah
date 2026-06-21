<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">Tambah Data Guru / Staf</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8">
                <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div class="pt-2 pb-2 border-b border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800">Informasi Dasar</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="name" value="Nama Lengkap & Gelar *" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full uppercase" :value="old('name')" placeholder="Misal: MARYADI, S.PD" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="position" value="Jabatan / Peran (ID) *" />
                            <x-text-input id="position" name="position" type="text" class="mt-1 block w-full capitalize" :value="old('position')" placeholder="Misal: Guru Kelas" required />
                            <x-input-error class="mt-2" :messages="$errors->get('position')" />
                        </div>

                        <div>
                            <x-input-label for="position_en" value="Jabatan / Peran (EN) *" />
                            <x-text-input id="position_en" name="position_en" type="text" class="mt-1 block w-full capitalize" :value="old('position_en')" placeholder="Misal: Class Teacher" />
                            <x-input-error class="mt-2" :messages="$errors->get('position_en')" />
                        </div>
                        
                        <div>
                            <x-input-label for="nuptk" value="NUPTK" />
                            <x-text-input id="nuptk" name="nuptk" type="text" class="mt-1 block w-full" :value="old('nuptk')" />
                            <x-input-error class="mt-2" :messages="$errors->get('nuptk')" />
                        </div>
                        
                        <div>
                            <x-input-label for="nip" value="NIP" />
                            <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full" :value="old('nip')" />
                            <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                        </div>
                        
                        <div>
                            <x-input-label for="tempat_lahir" value="Tempat Lahir" />
                            <x-text-input id="tempat_lahir" name="tempat_lahir" type="text" class="mt-1 block w-full capitalize" :value="old('tempat_lahir')" />
                            <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                        </div>
                        
                        <div>
                            <x-input-label for="agama" value="Agama" />
                            <select id="agama" name="agama" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">
                                <option value="">Pilih Agama</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('agama')" />
                        </div>
                        
                        <div>
                            <x-input-label for="jenis_kelamin" value="Jenis Kelamin" />
                            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
                        </div>
                        
                        <div>
                            <x-input-label for="status_pegawai" value="Status Pegawai" />
                            <x-text-input id="status_pegawai" name="status_pegawai" type="text" class="mt-1 block w-full uppercase" :value="old('status_pegawai')" placeholder="Misal: GTT / PTT" />
                            <x-input-error class="mt-2" :messages="$errors->get('status_pegawai')" />
                        </div>
                    </div>

                    <div class="pt-4 pb-2 border-b border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800">Kontak & Alamat</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="phone" value="No. HP" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" placeholder="Misal: 0812345..." />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                        
                        <div>
                            <x-input-label for="email" value="Email" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" placeholder="Misal: guru@email.com" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        
                        <div class="md:col-span-2">
                            <x-input-label for="alamat" value="Alamat Lengkap" />
                            <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm">{{ old('alamat') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>
                    </div>

                    <div class="pt-4 pb-2 border-b border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800">Media & Sosial</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <x-input-label for="image" value="Foto Profile Guru (Opsional)" />
                            <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                            <p class="text-xs text-gray-500 mt-1">Gunakan gambar rasio portrait (4:5) atau persegi untuk hasil terbaik.</p>
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>
                        
                        <div>
                            <x-input-label for="facebook" value="Link Facebook" />
                            <x-text-input id="facebook" name="facebook" type="url" class="mt-1 block w-full" :value="old('facebook')" placeholder="https://facebook.com/..." />
                            <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
                        </div>
                        <div>
                            <x-input-label for="instagram" value="Link Instagram" />
                            <x-text-input id="instagram" name="instagram" type="url" class="mt-1 block w-full" :value="old('instagram')" placeholder="https://instagram.com/..." />
                            <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
                        </div>
                        <div>
                            <x-input-label for="linkedin" value="Link LinkedIn" />
                            <x-text-input id="linkedin" name="linkedin" type="url" class="mt-1 block w-full" :value="old('linkedin')" placeholder="https://linkedin.com/in/..." />
                            <x-input-error class="mt-2" :messages="$errors->get('linkedin')" />
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100 mt-6">
                        <a href="{{ route('admin.teachers.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md font-medium hover:bg-gray-200 transition">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-md font-medium hover:bg-primary-700 shadow-sm transition">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
