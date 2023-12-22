<x-app-layout>
    <div class="h-[100%-12]">
        <div x-data="{ currentSlide: 0, totalSlides: {{ count($questions) }} }">
            <div class="flex flex-col items-center justify-center bg-gray-100 min-h-">
                <!-- Slider -->
                <div class="flex items-center justify-around w-full my-4">
                    <template x-for="index in totalSlides">
                        <button @click="currentSlide = index - 1"
                            :class="{ 'bg-blue-500 text-white': currentSlide === index - 1, 'bg-gray-300': currentSlide !== index - 1 }"
                            class="flex items-center justify-center w-10 h-10 mx-1 rounded-full focus:outline-none">
                            <span class="" x-text="index"></span>
                        </button>
                    </template>
                </div>

                <!-- Question Container -->
                <div class="flex-grow w-full max-w-md p-6 bg-gray-200 rounded-lg shadow">
                    @foreach ($questions as $key => $options)
                    <div x-show="currentSlide === {{ $loop->index }}" class="transition-opacity duration-500" x-cloak>
                        <h2 class="mb-4 text-2xl font-semibold">{{ $key }}</h2>

                        {{-- Options --}}
                        <div class="space-y-2">
                            @foreach ($options as $option)
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="option_{{ $loop->parent->index }}" value="{{ $option }}">
                                <span>{{ $option }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between w-full max-w-md mt-4">
                    <button @click="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides"
                        :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === 0 }"
                        class="px-4 py-2 text-white bg-indigo-500 rounded focus:outline-none disabled:opacity-50"
                        :disabled="currentSlide === 0">Previous</button>
                    <button @click="currentSlide = (currentSlide + 1) % totalSlides"
                        :class="{ 'bg-gray-500 text-gray-300 cursor-not-allowed': currentSlide === totalSlides - 1 }"
                        class="px-4 py-2 text-white bg-indigo-500 rounded focus:outline-none disabled:opacity-50"
                        :disabled="currentSlide === totalSlides - 1">Next</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
