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