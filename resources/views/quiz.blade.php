<x-app-layout>
    <div class="py-12" x-data="{ currentSlide: 0, totalSlides: {{ count($questions) }} }">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Stepper -->
            <div class="flex items-center justify-around w-full mb-4">
                <template x-for="index in totalSlides">
                    <button
                        @click="currentSlide = index - 1"
                        :class="{ 'bg-blue-500 text-white': currentSlide === index - 1, 'bg-gray-300': currentSlide !== index - 1 }"
                        class="flex items-center justify-center w-6 h-6 mx-1 rounded-full focus:outline-none"
                    >
                        <span class="text-xs" x-text="index"></span>
                    </button>
                </template>
            </div>

            <!-- Question Container -->
            <div class="p-6 bg-gray-200 rounded-lg shadow">
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
            <div class="flex justify-between mt-4">
                <button @click="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides"
                    class="px-4 py-2 text-white bg-blue-500 rounded focus:outline-none">Previous</button>
                <button @click="currentSlide = (currentSlide + 1) % totalSlides"
                    class="px-4 py-2 text-white bg-blue-500 rounded focus:outline-none">Next</button>
            </div>
        </div>
    </div>
</x-app-layout>
