@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('messages.admin.parts.create') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </select>
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.parts.price') }} </label>
                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.price') }}" required="">
                </div>
            
                <div class="sm:col-span-2">
                    <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('messages.admin.computers.details') }} </label>
                    <textarea name="details" id="details" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.admin.create.enterdetails') }}"></textarea>
                </div>
            </div>

            <label class="py-3 block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input"> {{ __('messages.admin.uploadfile') }} </label>
            <input name="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

                    <form method="POST" action="{{ route('admin.part.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="{{ __('messages.admin.create.entername') }}" name="name" value="{{ old('name') }}" />
                        <input type="number" class="form-control mb-2" placeholder="{{ __('messages.admin.create.enterstock') }}" name="stock" value="{{ old('stock') }}" />
                        
                        <input type="text" class="form-control mb-2" placeholder="{{ __('messages.admin.create.enterbrand') }}" name="brand" value="{{ old('brand') }}" />
                        <div class="form-group">
                        <label for="type">{{ __('messages.admin.create.entertype') }}</label>
                        @foreach($viewData['types'] as $type)
                        <div>
                            <input type="radio" name="type" value="{{ $type['name'] }}" id="{{ $type['id'] }}" {{ old('type') == $type['name'] ? 'checked' : '' }}>
                            <label for="{{ $type['id'] }}">{{ $type['name'] }}</label>
                        </div>
                        @endforeach
                        </div>

                        <input type="number" class="form-control mb-2" placeholder="{{ __('messages.admin.create.enterprice') }}" name="price" value="{{ old('pricee') }}" />
                        <input type="text" class="form-control mb-2" placeholder="{{ __('messages.admin.create.enterdetails') }}" name="details" value="{{ old('details') }}" />
                        <div class="row">
                        <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('messages.admin.create.enterphoto') }}</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                            <input class="form-control" type="file" name="photo">
                        </div>
                        </div>
                        </div>
                        <div class="col">
                        &nbsp;
                        </div>
                        </div> 
                        <input type="submit" class="btn btn-primary" value="{{ __('messages.admin.send') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection