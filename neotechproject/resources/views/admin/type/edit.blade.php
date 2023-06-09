@extends('layouts.admin')
@section('content')

<section class="w-full bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        @if(session('status'))
        <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <div>
                <span class="font-medium"> {{ session('status') }} </span>
            </div>
        </div>
        @endif
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"> {{ $viewData["title"] }} </h2>
        @if($errors->any())
        <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('admin.type.update', ['id'=> $viewData["type"]->getId()]) }}" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.types.name') }} </label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.entername') }}" value="{{ $viewData['type']->getName() }}" required="">
                </div>

                <div class="py-3 flex items-center mb-4">
                    <input name="is_base" id="is_base" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($viewData["type"]->getIsBase()) checked @endif>
                    <label for="is_base" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('messages.admin.types.base') }} </label>
                </div>

                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-600">
                    {{ __('messages.admin.send') }}
                </button>
            </div>

        </form>
    </div>
</section>

@endsection