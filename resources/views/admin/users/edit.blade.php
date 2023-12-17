<x-app-layout>

    <div class="flex flex-col md:flex-row">

        @auth
        <div class="w-64 h-screen py-8 text-gray-600 bg-gray-100 shadow-md dark:bg-gray-800 dark:text-gray-200">
            @if (auth()->user()->hasRole('admin'))
            <x-sidebar />
            @endif
        </div>
        <x-dashboard-main-content :page-title="  __('Admin Create New User')">
            <h3 class="mb-4 text-2xl font-semibold">Client edit</h3>
            <div class="flex justify-between items-center">
                <div class=" dark:bg-gray-800 bg-white w-full" focusable>
                    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-6">
                        @method('PUT')
                        @csrf
                        <h2 class="mb-4 text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Update existing User') }}
                        </h2>
                        <!-- Add your user creation form fields here -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="mobile_number" :value="__('Mobile Number')" />

                            <x-text-input id="mobile_number" class="block mt-1 w-full" type="text"
                                :value="old('mobile_number', $user->mobile_number)" name="mobile_number" required
                                autocomplete="mobile_number" />

                            <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        {{-- <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div> --}}

                        <!-- Confirm Password -->
                        {{-- <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div> --}}


                        <div class="flex justify-end mt-6">
                            <a href="{{ route('admin.users.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="ms-3 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{
                                __('Update') }}
                            </button>
                        </div>
                    </form>
                    @if (session('success') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>