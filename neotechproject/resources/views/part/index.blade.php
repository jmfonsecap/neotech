@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<main class="p-4 md:ml-30 h-auto pt-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($viewData["parts"] as $part)
        <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md">
            <img src="{{ asset('/storage/'.$part->getPhoto()) }}" class="w-full h-56 object-cover" alt="{{ $part->getName() }}">
            <div class="p-2 bg-gray-800">
                <h3 class="text-lg font-medium text-white">{{ $part->getName() }}</h3>
            </div>
            <div class="p-2 bg-black">
                <a href="{{ route('part.show', ['id' => $part->getId()]) }}" class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white bg-black">
                    {{ __('messages.user.part.about') }}
                </a>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
