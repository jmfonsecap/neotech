@extends('layouts.app')
@section('content')

<div class="bg-gray p-2 text-center">
    <h2 class="text-white text-4xl font-bold">{{ $viewData['title'] }}</h2>
    <!-- Other content goes here -->
</div>

<div class="px-4 py-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
    @foreach ($viewData['customs'] as $custom)
        <div class="p-4 bg-gray-700 rounded shadow">
            <!-- Card content goes here -->
            <h2 class="text-xl font-semibold">{{ $custom->getName() }}</h2>
            <p class="mt-2 text-white"><strong>{{ __('messages.user.price') }}</strong> {{ $custom->getPrice() }}</p>
            <p class="mt-2 text-white"><strong>{{ __('messages.admin.parts') }}</strong></p>
            @foreach ($custom->getParts() as $part)
                <p class="mt-2 text-sm text-white">{{ $part->getName() }}</p>
            @endforeach
        </div>
    @endforeach
</div>

@endsection