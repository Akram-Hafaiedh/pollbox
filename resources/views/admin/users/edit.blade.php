<x-app-layout>

    <div class="flex flex-col md:flex-row">

        @auth

        <x-dashboard-main-content :page-title="  __('Admin Edit User')">
            {{-- <h3 class="mb-4 text-2xl font-semibold">Client edit</h3> --}}
            <div class="flex items-center justify-between">
                <div class="w-full bg-gray-200" focusable>
                    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-6">
                        @method('PUT')
                        @csrf
                        <!-- Add your user creation form fields here -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                                :value="old('name', $user->name)"  autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block w-full mt-1" type="email" name="email"
                                :value="old('email', $user->email)"  autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="mobile_number" :value="__('Mobile Number')" />

                            <x-text-input id="mobile_number" class="block w-full mt-1" type="text"
                                :value="old('mobile_number', $user->mobile_number)" name="mobile_number"
                                autocomplete="mobile_number" />

                            <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        {{-- <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block w-full mt-1" type="password" name="password"
                                 autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div> --}}

                        <!-- Confirm Password -->
                        {{-- <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                                name="password_confirmation"  autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div> --}}


                        <div class="flex justify-end mt-6">
                            <a href="{{ route('admin.users.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ms-3 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{
                                __('Update') }}
                            </button>
                        </div>
                    </form>
                    @if (session('success') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>
