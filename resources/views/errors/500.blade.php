@extends('layouts.errors')

@section('content')
    <div class="flex items-center justify-center min-h-screen text-center">
        <div class="max-w-xl px-8 py-4 mx-auto text-gray-500 bg-white rounded-lg shadow-md">
            <div class="text-6xl font-bold text-red-500">
                500
            </div>
            <div class="mt-4 text-xl">
                Oops! Something went wrong.
            </div>
            <div class="mt-2">
                We are having trouble processing your request.
            </div>
            <div class="mt-6">
                <a href="{{ route('home') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Return Home</a>
            </div>
        </div>
    </div>
@endsection
