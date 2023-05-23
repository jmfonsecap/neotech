@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<main class="p-4 md:ml-30 h-auto pt-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($viewData["computers"] as $computer)
        <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md">
            <img src="{{ asset('/storage/'.$computer->getPhoto()) }}" class="w-full h-56 object-cover" alt="{{ $computer->getName() }}">
            <div class="p-2 bg-gray-800">
                <h3 class="text-lg font-medium text-white">{{ $computer->getName() }}</h3>
            </div>
            <div class="p-2 bg-black"> <!-- Replaced the bg-primary class with bg-black -->
                <a href="{{ route('computer.show', ['id' => $computer->getId()]) }}" class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white bg-black rounded-lg"> <!-- Replaced the bg-primary class with bg-black -->
                {{ __('messages.user.computer.viewDetails') }}
                </a>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
