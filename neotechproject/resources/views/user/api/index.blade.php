@extends('layouts.app')

@section('content')
<main class="p-4 md:ml-30 h-auto pt-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($cars as $car)
        <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md">
            <img src="{{ $car['image_url'] }}" class="w-full h-56 object-cover" alt="{{ $car['model'] }}">
            <div class="p-2 bg-gray-800">
                <h3 class="text-lg font-medium text-white">{{ $car['model'] }}</h3>
            </div>
            <div class="p-2 bg-black">
                <a href="{{ route('user.api.show', ['id' => $car['id']]) }}" class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white bg-black">
                    {{ __('messages.user.car.about') }}
                </a>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
