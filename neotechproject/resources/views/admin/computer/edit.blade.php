@extends('layouts.admin')
@section('content')

<div class="container">
    <div>
        <a class="btn btn-success" href="{{ route('admin.computer.index') }}"> {{ __('messages.admin.back') }} </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.admin.computers.edit')}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.computer.update', ['id'=> $viewData["computer"]->getId()]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-center">
                            <img src="{{ asset('/storage/'.$viewData["computer"]->getPhoto()) }}" id="image-edit-computer">
                        </div>

                        <label for="name" class="text-gray-500 dark:text-gray-300"> {{ __('messages.admin.create.entername') }} </label>
                        <input type="text" class="form-control mb-3 text-gray-700" placeholder="" name="name" value="{{ $viewData["computer"]->getName() }}" />
                        
                        <label for="stock" class="text-gray-500 dark:text-gray-300"> {{ __('messages.admin.create.enterstock') }} </label>
                        <input type="number" class="form-control mb-3 text-gray-700" placeholder="" name="stock" value="{{ $viewData["computer"]->getStock() }}" />
                        
                        <label for="brand" class="text-gray-500 dark:text-gray-300"> {{ __('messages.admin.create.enterbrand') }} </label>
                        <input type="text" class="form-control mb-3 text-gray-700" placeholder="" name="brand" value="{{ $viewData["computer"]->getBrand() }}" />
                        
                        <label for="name" class="text-gray-500 dark:text-gray-300"> {{ __('messages.admin.create.entercategory') }} </label>
                        <input type="text" class="form-control mb-3 text-gray-700" placeholder="" name="category" value="{{ $viewData["computer"]->getCategory() }}" />
                        
                        <label for="currentPrice" class="text-gray-500 dark:text-gray-300"> {{ __('messages.admin.create.entercurrprice') }} </label>
                        <input type="number" class="form-control mb-3 text-gray-700" placeholder="" name="currentPrice" value="{{ $viewData["computer"]->getCurrentPrice() }}" />
                        
                        <label for="currentPrice" class="text-gray-500 dark:text-gray-300"> {{ __('messages.admin.create.enterlastprice') }} </label>
                        <input type="number" class="form-control mb-3 text-gray-700" placeholder="" name="lastPrice" value="{{ $viewData["computer"]->getLastPrice() }}" />

                        <label for="details" class="text-gray-500 dark:text-gray-300"> {{ __('messages.admin.create.enterdetails') }} </label>
                        <input type="text" class="form-control mb-3 text-gray-700" placeholder="" name="details" value="{{ $viewData["computer"]->getDetails() }}" />                      
                        
                        <label for="keywords" class="text-gray-500 dark:text-gray-300"> {{ __('messages.admin.create.enterkey') }} </label>
                        <input type="text" class="form-control mb-3 text-gray-700" placeholder="" name="keywords" value="{{ $viewData["computer"]->getKeywords() }}" />


                        <div class="mb-3">
                            <label for="file" class="form-label">{{ __('messages.admin.create.file') }} </label>
                            <input class="form-control" type="file" name="photo" id="file">
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" value="{{ __('messages.admin.update') }}" />
                    </form>
                </div>
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
        <form method="POST" action="{{ route('admin.computer.update', ['id'=> $viewData["computer"]->getId()]) }}" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.name') }} </label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.entername') }}" required="" value="{{ $viewData["computer"]->getName() }}">
                </div>
                <div class="w-full">
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.stock') }} </label>
                    <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterstock') }}" required="" value="{{ $viewData["computer"]->getStock() }}">
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.brand') }} </label>
                    <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterbrand') }}" required="" value="{{ $viewData["computer"]->getBrand() }}">
                </div>
                <!--
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Select category</option>
                        <option value="TV">TV/Monitors</option>
                        <option value="PC">PC</option>
                        <option value="GA">Gaming/Console</option>
                        <option value="PH">Phones</option>
                    </select>
                </div>
                -->
                <div class="sm:col-span-2">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.category') }} </label>
                    <input type="text" name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.entercategory') }}" required="" value="{{ $viewData["computer"]->getCategory() }}">
                </div>

                <div class="sm:col-span-2">
                    <label for="keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.create.keywords') }} </label>
                    <input type="text" name="keywords" id="keywords" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterkey') }}" required="" value="{{ $viewData["computer"]->getKeywords() }}">
                </div>

                <div class="w-full">
                    <label for="currentPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.currentprice') }} </label>
                    <input type="number" name="currentPrice" id="currentPrice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.entercurrprice') }}" required="" value="{{ $viewData["computer"]->getCurrentPrice() }}">
                </div>
                <div class="w-full">
                    <label for="lastPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.lastprice') }} </label>
                    <input type="number" name="lastPrice" id="lastPrice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterlastprice') }}" required="" value="{{ $viewData["computer"]->getLastPrice() }}">
                </div>

                <div class="sm:col-span-2">
                    <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.details') }} </label>
                    <textarea name="details" id="details" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterdetails') }}">{{ $viewData["computer"]->getDetails() }}</textarea>
                </div>
            </div>

            <div class="py-3 flex items-center mb-4">
                <input name="discount" id="discount" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($viewData["computer"]->getDiscount()) checked @endif>
                <label for="discount" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> {{ __('messages.admin.computers.discount') }} </label>
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