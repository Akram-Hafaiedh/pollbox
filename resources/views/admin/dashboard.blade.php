<x-app-layout>
    <div class="flex flex-col md:flex-row">

        @auth

        <x-dashboard-main-content :page-title="  __('Admin Dashboard') ">
            {{-- <h3 class="mb-4 text-2xl font-semibold">Welcome to the admin dashboard!</h3>
            <p>This is your admin dashboard content.</p> --}}
            {{-- <div class="p-6 bg-gray-200">
                <div class="grid mb-12 gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                    <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                        <div
                            class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-blue-600 to-blue-400 shadow-blue-500/40 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-6 h-6 text-white">
                                <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                                <path fill-rule="evenodd"
                                    d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                                </path>
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                                Today's Money</p>
                            <h4
                                class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                $53k</h4>
                        </div>
                        <div class="p-4 border-t border-blue-gray-50">
                            <p
                                class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                                <strong class="text-green-500">+55%</strong>&nbsp;than last week
                            </p>
                        </div>
                    </div>
                    <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                        <div
                            class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-pink-600 to-pink-400 shadow-pink-500/40 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-6 h-6 text-white">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                                Today's Users</p>
                            <h4
                                class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                2,300</h4>
                        </div>
                        <div class="p-4 border-t border-blue-gray-50">
                            <p
                                class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                                <strong class="text-green-500">+3%</strong>&nbsp;than last month
                            </p>
                        </div>
                    </div>
                    <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                        <div
                            class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-green-600 to-green-400 shadow-green-500/40 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-6 h-6 text-white">
                                <path
                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                </path>
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                                New Clients</p>
                            <h4
                                class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                3,462</h4>
                        </div>
                        <div class="p-4 border-t border-blue-gray-50">
                            <p
                                class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                                <strong class="text-red-500">-2%</strong>&nbsp;than yesterday
                            </p>
                        </div>
                    </div>
                    <div class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl">
                        <div
                            class="absolute grid w-16 h-16 mx-4 -mt-4 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-gradient-to-tr from-orange-600 to-orange-400 shadow-orange-500/40 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" class="w-6 h-6 text-white">
                                <path
                                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z">
                                </path>
                            </svg>
                        </div>
                        <div class="p-4 text-right">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                                Sales</p>
                            <h4
                                class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                $103,430</h4>
                        </div>
                        <div class="p-4 border-t border-blue-gray-50">
                            <p
                                class="block font-sans text-base antialiased font-normal leading-relaxed text-blue-gray-600">
                                <strong class="text-green-500">+5%</strong>&nbsp;than yesterday
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 mb-4 xl:grid-cols-3">
                    <div
                        class="relative flex flex-col overflow-hidden text-gray-700 bg-white shadow-md bg-clip-border rounded-xl xl:col-span-2">
                        <div
                            class="relative flex items-center justify-between p-6 m-0 overflow-hidden text-gray-700 bg-transparent shadow-none bg-clip-border rounded-xl">
                            <div>
                                <h6
                                    class="block mb-1 font-sans text-base antialiased font-semibold leading-relaxed tracking-normal text-blue-gray-900">
                                    Quizzes</h6>
                                <p
                                    class="flex items-center gap-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="3" stroke="currentColor" aria-hidden="true"
                                        class="w-4 h-4 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5">
                                        </path>
                                    </svg>
                                    <strong>30 done</strong> this month
                                </p>
                            </div>
                            <button aria-expanded="false" aria-haspopup="menu" id=":r5:"
                                class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30"
                                type="button">
                                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currenColor" viewBox="0 0 24 24"
                                        stroke-width="3" stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="p-6 px-0 pt-0 pb-2 overflow-x-scroll">
                            <table class="w-full min-w-[640px] table-auto">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                companies</p>
                                        </th>
                                        <th class="px-6 py-3 text-left border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                budget</p>
                                        </th>
                                        <th class="px-6 py-3 text-left border-b border-blue-gray-50">
                                            <p
                                                class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">
                                                completion</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                                    Material XD Version</p>
                                            </div>
                                        </td>

                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <p
                                                class="block font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                $14,000</p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p
                                                    class="block mb-1 font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                    60%</p>
                                                <div
                                                    class="flex w-full h-1 overflow-hidden font-sans text-xs font-medium rounded-sm flex-start bg-blue-gray-50">
                                                    <div class="flex items-center justify-center h-full text-white bg-gradient-to-tr from-blue-600 to-blue-400"
                                                        style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                                    Add Progress Track</p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <p
                                                class="block font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                $3,000</p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p
                                                    class="block mb-1 font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                    10%</p>
                                                <div
                                                    class="flex w-full h-1 overflow-hidden font-sans text-xs font-medium rounded-sm flex-start bg-blue-gray-50">
                                                    <div class="flex items-center justify-center h-full text-white bg-gradient-to-tr from-blue-600 to-blue-400"
                                                        style="width: 10%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                                    Fix Platform Errors</p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <p
                                                class="block font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                Not set</p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p
                                                    class="block mb-1 font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                    100%</p>
                                                <div
                                                    class="flex w-full h-1 overflow-hidden font-sans text-xs font-medium rounded-sm flex-start bg-blue-gray-50">
                                                    <div class="flex items-center justify-center h-full text-white bg-gradient-to-tr from-green-600 to-green-400"
                                                        style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                                    Launch our Mobile App</p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <p
                                                class="block font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                $20,500</p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p
                                                    class="block mb-1 font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                    100%</p>
                                                <div
                                                    class="flex w-full h-1 overflow-hidden font-sans text-xs font-medium rounded-sm flex-start bg-blue-gray-50">
                                                    <div class="flex items-center justify-center h-full text-white bg-gradient-to-tr from-green-600 to-green-400"
                                                        style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                                    Add the New Pricing Page</p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <p
                                                class="block font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                $500</p>
                                        </td>
                                        <td class="px-5 py-3 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p
                                                    class="block mb-1 font-sans text-xs antialiased font-medium text-blue-gray-600">
                                                    25%</p>
                                                <div
                                                    class="flex w-full h-1 overflow-hidden font-sans text-xs font-medium rounded-sm flex-start bg-blue-gray-50">
                                                    <div class="flex items-center justify-center h-full text-white bg-gradient-to-tr from-blue-600 to-blue-400"
                                                        style="width: 25%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="p-6 py-6 space-y-4 bg-gray-200">
                <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-purple-600 bg-purple-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">{{ count($users) }}</span>
                            <span class="block text-gray-500">Users</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-green-600 bg-green-100 rounded-full">
                            {{-- <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg> --}}
                            <svg class="fill-green-600" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                viewBox="0 0 512 512">
                                <path
                                    d="M205 34.8c11.5 5.1 19 16.6 19 29.2v64H336c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96H224v64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">6.8</span>
                            <span class="block text-gray-500">Total Responses</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-red-600 bg-red-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block text-2xl font-bold">9</span>
                            <span class="inline-block text-xl font-semibold text-gray-500">(14%)</span>
                            <span class="block text-gray-500 overflow-w">Underperforming students</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-blue-600 bg-blue-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            {{-- TODO - TRACK FINISHED QUIZ --}}
                            <span class="block text-2xl font-bold">{{ count($quizzes) }}</span>
                            <span class="block text-gray-500">Total Quizzes</span>
                        </div>
                    </div>
                </section>
                <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col">
                    <div class="flex flex-col bg-white rounded-lg shadow md:col-span-2 md:row-span-2">
                        <div class="px-6 py-5 font-semibold border-b border-gray-100">The number of quizzes done per month</div>
                        <div class="flex-grow p-4">
                            <div
                                class="flex items-center justify-center h-full px-4 py-16 text-3xl font-semibold text-gray-400 bg-gray-100 border-2 border-gray-200 border-dashed rounded-md">
                                Chart</div>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-yellow-600 bg-yellow-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path fill="#fff"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">25</span>
                            <span class="block text-gray-500">Lections left</span>
                        </div>
                    </div>
                    <div class="flex items-center p-8 bg-white rounded-lg shadow">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mr-6 text-teal-600 bg-teal-100 rounded-full">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-2xl font-bold">139</span>
                            <span class="block text-gray-500">Hours spent on lections</span>
                        </div>
                    </div>
                    <div class="col-span-3 row-span-3 bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
                            <span>My users</span>
                            {{-- <button type="button"
                                class="inline-flex justify-center px-1 -mr-1 text-sm font-medium leading-5 text-gray-500 bg-white rounded-md hover:text-gray-600"
                                id="options-menu" aria-haspopup="true" aria-expanded="true">
                                Descending
                                <svg class="w-5 h-5 ml-1 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg> --}}
                            </button>
                        </div>
                        <div class="overflow-y-auto max-h-[34rem]">
                            <ul class="p-6 space-y-6">
                                {{-- <li class="flex items-center">
                                    <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 rounded-full">
                                        <img src="https://randomuser.me/api/portraits/men/75.jpg"
                                            alt="Norman Walters profile picture">
                                    </div>
                                    <span class="text-gray-600">Norman Walters</span>
                                    <span class="ml-auto font-semibold">7.7</span>
                                </li> --}}
                                @foreach ( $users as $user)
                                <li class="flex items-center">
                                    <div
                                        class="flex items-center justify-center w-10 h-10 mr-3 text-sm font-bold text-gray-500 bg-gray-100 rounded-full">
                                        {{ substr($user->name, 0, 2) }}
                                    </div>
                                    <span class="text-gray-600">{{ $user->name }}</span>
                                    <span class="ml-auto font-semibold">9.3</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </section>
            </div>
        </x-dashboard-main-content>
        @endauth

    </div>
</x-app-layout>
