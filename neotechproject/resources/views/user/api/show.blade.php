@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<section class="bg-white dark:bg-gray-900">
  <div class="py-6 px-4 mx-auto max-w-4xl lg:py-10 flex">
    <div class="w-3/5">
      <div class="part-image bg-white">
        <img src="{{ $viewData['car']['image_url'] }}" alt="Car Image" class="w-full h-56 object-cover">
      </div>
    </div>
    <div class="w-2/5">
      <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">{{ $viewData['car']['model'] }}</h2>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.price') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['car']['price_cop'] }}</span></p>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.car.brand') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['car']['brand'] }}</span></p>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.car.color') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['car']['color'] }}</span></p>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.car.year') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['car']['year'] }}</span></p>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.car.kilometers') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['car']['kilometers'] }}</span></p>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.car.transtype') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['car']['transmission_type'] }}</span></p>
      <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.car.type') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData['car']['type'] }}</span></p>
      @if($viewData['car']['is_new'] == 1)
        <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.car.new') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ __('messages.admin.yes') }}</span></p>
      @else
        <p class="mb-2 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.car.new') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ __('messages.admin.no') }}</span></p>
      @endif
    </div>
  </div>
</section>
@endsection
