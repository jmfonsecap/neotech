@extends('layouts.admin')
@section('content')

<div class="container">
@if(session('status'))
        <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium"> {{ session('status') }} </span>
            </div>    
        </div>
    @endif
    <div>
        <a class="btn btn-success" href="{{ route('admin.computer.index') }}"> {{ __('messages.admin.back') }} </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $viewData["title"] }}</div>
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
                            <label for="file" class="form-label"> File </label>
                            <input class="form-control" type="file" name="photo" id="file">
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" value="Update" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection