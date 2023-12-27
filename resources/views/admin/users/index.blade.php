<x-app-layout>

    <div class="flex flex-col md:flex-row">

        @auth
        <x-dashboard-main-content :page-title="  __('Admin Clients')">
            <!-- Buttons -->
            <div class="flex items-center justify-between ">
                <div>
                    <a href="{{ route('admin.users.create') }}"
                        class="inline-flex items-center px-4 py-2 tracking-widest text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-offset-2">{{
                        __('Add user')
                        }}</a>
                    {{-- TODO DELETE ALL --}}
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 tracking-widest text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-700 focus:bg-blue-500 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-offset-2">{{
                        __('Delete all')
                        }}</a>

                </div>
                <form action="{{ route('admin.users.index') }}" method="GET">
                    <x-text-input id="search" name="search" type="text" class="mt-1" :value="old('search',$search)"
                        placeholder="Search users" />
                    <button type="submit">Search</button>
                </form>
            </div>



            {{-- <p>Your role: {{ auth()->user()->role }}</p> --}}
            @if(isset($users))
            <table class="table w-full mt-5 divide-y overflow-x">
                <thead class="font-medium text-left bg-indigo-300">
                    <tr>
                        <th class="py-2">#</th>
                        <th class="py-2">Name</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Status</th>
                        <th class="py-2 text-center">Created At</th>
                        <th class="py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($users as $user)
                    <tr class=" hover:bg-gray-300 odd:bg-gray-100 even:bg-white">
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ route('admin.users.show', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td class="text-green-500">Active</td>
                        {{-- TODO ADD ACTIVE OR INACTIVE TO USERS --}}
                        {{-- <td>@if ($quiz->active) <span class="text-green-500">Active</span> @else <span
                                class="text-red-500">Inactive</span> @endif</td> --}}
                        {{-- <td class="text-center">{{ $quiz->time_limit ? $quiz->time_limit . ' mins' : '-' }}</td>
                        --}}
                        <td class="text-center">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="flex justify-center space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-100 rounded-md shadow-sm hover:bg-blue-400 hover:fill-white fill-blue-500">
                                <div class='sr-only'>Edit User</div>
                                <svg class="" xmlns="http://www.w3.org/2000/svg" height="16" width="20"
                                    viewBox="0 0 640 512">
                                    <path
                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block">
                                <div class="sr-only">Delete User</div>
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-100 rounded-md shadow-sm hover:bg-red-400 fill-red-500 hover:fill-white">
                                    <div class="sr-only">Delete</div>
                                    <svg class="" xmlns="http://www.w3.org/2000/svg" height="16" width="20"
                                        viewBox="0 0 640 512">
                                        <path
                                            d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L353.3 251.6C407.9 237 448 187.2 448 128C448 57.3 390.7 0 320 0C250.2 0 193.5 55.8 192 125.2L38.8 5.1zM264.3 304.3C170.5 309.4 96 387.2 96 482.3c0 16.4 13.3 29.7 29.7 29.7H514.3c3.9 0 7.6-.7 11-2.1l-261-205.6z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
            @else
            <p>No Users added Yet</p>
            @endif


        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>
