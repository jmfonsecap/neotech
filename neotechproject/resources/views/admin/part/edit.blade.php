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
        <form method="POST" action="{{ route('admin.part.update', ['id'=> $viewData["part"]->getId()]) }}" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.parts.name') }} </label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.entername') }}" value="{{ $viewData["part"]->getName() }}" required="">
                </div>
                <div class="w-full">
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.stock') }} </label>
                    <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterstock') }}" value="{{ $viewData["part"]->getStock() }}" required="">
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.brand') }} </label>
                    <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterbrand') }}" value="{{ $viewData["part"]->getBrand() }}" required="">
                </div>
                <div class="w-full">
                    <label for="types" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.types') }} </label>
                    <select id="types" name="types" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach($viewData["types"] as $type)
                            <option value="{{ $type->getId() }}" @if(old('types', $viewData["part"]->getTypeId()) == $type->getId()) selected @endif> {{ $type->getName() }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.parts.price') }} </label>
                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.price') }}" value="{{ $viewData["part"]->getPrice() }}" required="">
                </div>

                <div class="sm:col-span-2">
                    <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.details') }} </label>
                    <textarea name="details" id="details" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterdetails') }}">{{ $viewData["part"]->getDetails() }}</textarea>
                </div>
            </div>

            <label class="py-3 block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input"> {{ __('messages.admin.uploadfile') }} </label>
            <input name="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-600">
                {{ __('messages.admin.send') }}
            </button>

        </form>
    </div>
</section>

@endsection