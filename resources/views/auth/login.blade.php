<x-guest-layout>
    <div class="w-full max-w-md mx-auto space-y-4">
        <div class="flex flex-col items-center justify-center w-full max-w-md space-y-4">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="flex flex-col items-center justify-center w-full space-y-4">
                <div class="my-8">
                    <a href="/">
                        <img class="h-28 w-28" src="{{ asset('assets/icon2.svg') }}" alt="Logo">
                    </a>
                </div>

                {{-- <h2 class="my-6 font-mono text-3xl font-bold text-[#064b7a]">Se connecter</h2> --}}

                <form method="POST" action="{{ route('login') }}" class="w-full">

                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full mt-1" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="text-[#064b7a] border-gray-300 rounded shadow-sm focus:ring-[#064b7a] focus:border-[#064b7a]"
                                name="remember">
                            <span class="text-sm text-gray-600 ms-2 ">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex flex-col items-center justify-end my-4 space-y-4">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif

                        <x-primary-button class="block w-full">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
