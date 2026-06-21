<x-guest-layout>
    <div class="mb-8 text-center sm:text-left">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang! 👋</h2>
        <p class="text-gray-500 text-sm sm:text-base">Silakan masuk ke akun Anda untuk mengelola portal.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200 font-medium text-sm text-center" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary-500 transition">
                    <i class="far fa-envelope"></i>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                    class="block w-full pl-11 pr-4 py-3.5 border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition shadow-sm bg-gray-50 focus:bg-white" placeholder="admin@smkknboyolali.sch.id" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm font-medium" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-primary-600 hover:text-primary-800 font-semibold transition">
                        Lupa password?
                    </a>
                @endif
            </div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary-500 transition">
                    <i class="fas fa-lock"></i>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password" 
                    class="block w-full pl-11 pr-4 py-3.5 border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition shadow-sm bg-gray-50 focus:bg-white" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm font-medium" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <div class="relative flex items-center">
                    <input id="remember_me" type="checkbox" class="peer sr-only" name="remember">
                    <div class="w-5 h-5 bg-white border-2 border-gray-300 rounded peer-focus:ring-2 peer-focus:ring-primary-500 peer-checked:bg-primary-600 peer-checked:border-primary-600 transition duration-200 flex items-center justify-center shadow-sm">
                        <i class="fas fa-check text-white text-xs opacity-0 peer-checked:opacity-100 transition duration-200"></i>
                    </div>
                </div>
                <span class="ms-3 text-sm font-medium text-gray-600 group-hover:text-gray-900 transition">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-base font-bold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-primary-500/40">
                Masuk ke Dashboard <i class="fas fa-sign-in-alt ml-2"></i>
            </button>
        </div>
    </form>
</x-guest-layout>
