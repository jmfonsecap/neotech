@extends('layouts.admin')
@section('content')

<section class="bg-white dark:bg-gray-900">
  @if(session('status'))
        <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium"> {{ session('status') }} </span>
            </div>    
        </div>
    @endif
  <div class="pt-3">
    <h2 class="mb-4 text-2xl text-center tracking-tight font-bold text-gray-900 dark:text-gray-400"> {{ $viewData["title"] }} </h2>
    <hr class="border-1 border-gray-500">
  </div>
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <img src="{{ asset('/storage/'.$viewData["computer"]->getPhoto()) }}" alt="" class="h-[350px] w-full object-cover sm:h-[350px] pb-3" />
    <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white"> {{ $viewData['computer']->getName() }} </h2>
    <p class="mb-4 text-xl font-extrabold leading-none text-gray-900 md:text-2xl dark:text-white"> $ {{ $viewData['computer']->getCurrentPrice() }} </p>
    <dl>
      <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white"> {{ __('messages.admin.computers.details') }} </dt>
      <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"> {{ $viewData['computer']->getDetails() }} </dd>
    </dl>
    <dl class="flex items-center space-x-6">
      <div>
        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white"> {{ __('messages.admin.computers.category') }} </dt>
        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"> {{ $viewData['computer']->getCategory() }} </dd>
      </div>
      <div>
        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white"> {{ __('messages.admin.computers.brand') }} </dt>
        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"> {{ $viewData['computer']->getBrand() }} </dd>
      </div>
    </dl>
    <dl class="flex items-center space-x-6">
      <div>
        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white"> {{ __('messages.admin.computers.stock') }} </dt>
        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"> {{ $viewData['computer']->getStock() }} </dd>
      </div>
      @if($viewData['computer']->getDiscount()==1)
      <div>
        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white"> {{ __('messages.admin.computers.lastprice') }} </dt>
        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"> $ {{ $viewData['computer']->getLastPrice() }} </dd>
      </div>
      @endif
    </dl>
    <dl class="flex items-center space-x-6">
      <div>
        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white"> {{ __('messages.admin.computers.discount') }} </dt>
        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"> 
          @if($viewData['computer']->getDiscount()==1)
            {{ __('messages.admin.yes') }}
          @else
            {{ __('messages.admin.no') }}  
          @endif
        </dd>
      </div>
    </dl>
    <div class="pb-3">
      @foreach($viewData['keywords'] as $key)
      <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"> {{ $key }} </span>
      @endforeach
    </div>
    <div class="flex items-center space-x-4">
      <button type="button" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
          <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
        </svg>
        <a href="{{ route('admin.computer.edit', ['id' => $viewData['computer']->getId()]) }}">
          {{__('messages.admin.edit') }}
        </a>
      </button>
      <button type="button" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
        <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>
        <a href="{{ route('admin.computer.delete', ['id' => $viewData['computer']->getId()]) }}">
          {{__('messages.admin.delete') }}
        </a>
      </button>
    </div>
  </div>
</section>

@endsection