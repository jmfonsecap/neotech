@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<section class="bg-white dark:bg-gray-900">
  <div class="py-6 px-4 mx-auto max-w-4xl lg:py-10 flex">
    <div class="w-3/5">
      <div class="part-image">
        <img src="{{ asset('/storage/'.$viewData['part']->getPhoto()) }}" alt="Part Image" class="w-full">
      </div>
    </div>
    <div class="w-2/5">
      <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">{{ $viewData['part']->getBrand() }} {{ $viewData['part']->getName() }}</h2>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.price') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['part']->getPrice() }}</span></p>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.parts.type') }} {{ $viewData['type_name'] }}</p>
      <p class="mb-2 font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.parts.details') }}</p>
      <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['part']->getDetails() }}</p>
    </div>
  </div>
</section>
@endsection
