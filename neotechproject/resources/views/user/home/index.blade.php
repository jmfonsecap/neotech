@extends('layouts.app')
@section('content')

<main class="p-4 md:ml-30 h-auto pt-10">
  <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-4 mb-4">

    <!-- Carousel wrapper -->
    <div id="default-carousel" class="relative w-full py-5" data-carousel="slide">
      <div class="mb-4" style="height: 500px;">
        <div class="relative h-150 overflow-hidden rounded-lg md:h-96" style="height: 100%;">

          @if ($viewData["computersAreInDiscount"])
            @foreach($viewData["computersInDiscount"] as $computer)
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('/storage/'.$computer->getPhoto())}}" class="absolute block w-full h-full object-cover top-0 left-0" alt="...">
              </div>
            @endforeach
          @endif
        </div>

        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-8 left-1/2">
          @if($viewData["computersAreInDiscount"])
            @for($i = 0; $i < $viewData['sizeOfComputerArray']; $i++)
              <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{$i}}" data-carousel-slide-to=$i></button>
            @endfor
          @endif
          @if(!$viewData["computersAreInDiscount"])
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
          @endif
        </div>

        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="sr-only">{{ __('user.previous') }}</span>
          </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
          <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="sr-only">{{ __('user.next') }}</span>
          </span>
        </button>
      </div>
      
      
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div class="h-48 md:h-72">
      <a href="{{ route('user.api.index') }}">
        <div class="relative h-full overflow-hidden rounded-lg">
        <img src="https://resize.indiatvnews.com/en/resize/newbucket/1200_-/2019/08/bigdiscountcars-1566222131.jpg" class="absolute block w-full h-full object-cover" alt="...">
        </div>
      </a>
      </div>
      <div class="h-48 md:h-72">
      <a href="{{ route('user.custom.create') }}">
    <div class="relative h-full overflow-hidden rounded-lg">
        <img src="https://www.ant-pc.com/assets/2022-theme/images/Banner-6.webp" class="absolute block w-full h-full object-cover" alt="...">
    </div>
</a>
      </div>
    </div>

    <div class="grid grid-cols-4 gap-4">
      <div class="col-span-4 text-center mb-4">
        <h2 class="text-2xl font-bold">{{ __('messages.user.topcomputers') }}</h2>
      </div>

      @for($i = 0; $i < 4; $i++)
        <div class="bg-gray-200 rounded-lg overflow-hidden shadow-md">
          <img src="{{ asset('/storage/'.$viewData["computers"][$i]->getPhoto()) }}" class="w-full h-56 object-cover" alt="{{ $viewData["computers"][$i]->getName() }}">
          <div class="p-2 bg-gray-800">
            <h3 class="text-lg font-medium text-white">{{ $viewData["computers"][$i]->getName() }}</h3>
          </div>
          <div class="p-2 bg-black">
            <a href="{{ route('user.computer.show', ['id' => $viewData["computers"][$i]->getId()]) }}" class="inline-block px-4 py-2 text-sm font-medium leading-5 text-white bg-black rounded-lg">
              {{ __('messages.user.computer.viewDetails') }}
            </a>
          </div>
        </div>
      @endfor
    </div>
  </div>
</main>
@endsection
