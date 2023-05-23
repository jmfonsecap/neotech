@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<!DOCTYPE html>
<html>
<head>
  <title>{{ __('messages.user.computer.desc') }}</title>
</head>
<section class="bg-white dark:bg-gray-900">
  <div class="py-6 px-4 mx-auto max-w-4xl lg:py-10 flex">
    <div class="w-2/3">
      <div class="computer-image">
        <img src="{{ asset('/storage/'.$viewData["computer"]->getPhoto()) }}" alt="Computer Image">
      </div>
    </div>
    <div class="w-1/3">
      <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">{{ $viewData["computer"]->getBrand() }} {{ $viewData["computer"]->getName() }}</h2>
      <br><br><br><br>
        <p class="mb-4 text-2xl font-semibold leading-none text-gray-900 md:text-xl dark:text-white">{{ __('messages.user.price') }}</p>
      @if ($viewData["computer"]->getDiscount()==1)
        <p class="mb-4 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.computer.before') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData["computer"]->getLastPrice() }}</span></p>
        <p class="mb-4 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.computer.now') }} <span class="text-sm font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData["computer"]->getCurrentPrice() }}</span></p>
      @endif
      @if($viewData["computer"]->getDiscount()==0)
        <p class="mb-4 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ $viewData["computer"]->getCurrentPrice() }}</p>
      @endif
    </div>
  </div>
  <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
    <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">{{ __('messages.user.computer.details') }}</h2>
    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $viewData["computer"]->getDetails() }}</p>

    <h2 class="mb-2 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">{{ __('messages.user.computer.reviews') }}</h2>
    <div class="flex">
      <p class="mb-4 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white">{{ __('messages.user.computer.ratings') }}</p>
      <p class="mb-4 text-lg font-semibold leading-none text-gray-900 md:text-base dark:text-white ml-8">{{ __('messages.user.computer.comments') }}</p>
    </div>
    @foreach ($viewData['reviews'] as $review)
      <div class="flex">
        <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $review->getRating() }}/5</p>
        <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400 ml-16">{{ $review->getDescription() }}</p>
      </div>
    @endforeach  

    <div class="container mt-8" style="max-width: 100%; margin-left: -20px;">
    <div class="card-header">{{ __('messages.user.review.create') }}</div>
    <div class="card-body p-4" style="box-shadow: 0 0 10px 0 #ddd; width: 50%;">
        @if($errors->any())
        <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <div class="row">
            <div class="col">
                <form autocomplete="off" method="POST" action="{{ route('review.save', ['id' => $viewData['computer_id']]) }}">
                    @csrf
                    <label class="font-weight-bold">{{ __('messages.user.computer.ratings') }}</label>
                    <br>
                    <div class="rate">
                      <input type="radio" id="star5" class="rate" name="rating" value="5" />
                      <label for="star5" title="text">5</label>
                      <input type="radio" id="star4" class="rate" name="rating" value="4" checked />
                      <label for="star4" title="text">4</label>
                      <input type="radio" id="star3" class="rate" name="rating" value="3" />
                      <label for="star3" title="text">3</label>
                      <input type="radio" id="star2" class="rate" name="rating" value="2" />
                      <label for="star2" title="text">2</label>
                      <input type="radio" id="star1" class="rate" name="rating" value="1" />
                      <label for="star1" title="text">1</label>
                    </div>
                    <div class="form-group mt-4">
                    <br> <br>
                      <label class="font-weight-bold">{{ __('messages.user.computer.comments') }}</label>
                      <br>
                      <textarea name="description" maxlength="200" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterdetails') }}">{{ old('description') }}</textarea>
                    </div>
                    <div class="mt-3 text-right">
                        <button class="btn btn-sm py-2 px-3 btn-info">{{ __('messages.user.send') }}</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection