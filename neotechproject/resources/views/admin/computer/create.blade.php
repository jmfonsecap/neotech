@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('status'))
        <div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium"> {{ session('status') }} </span>
            </div>    
        </div>
    @endif
            <div class="card">
                <div class="card-header"> {{ $viewData["title"] }} </div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    @if (session('status') == 'created')
                    <div class="alert alert-success">
                        {{ __('messages.admin.computers.created') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.computer.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="{{ __('messages.admin.create.entername') }}" name="name" value="{{ old('name') }}" />
                        <input type="number" class="form-control mb-2" placeholder="{{ __('messages.admin.create.enterstock') }}" name="stock" value="{{ old('stock') }}" />
                        <input type="text" class="form-control mb-2" placeholder="{{ __('messages.admin.create.enterbrand') }}" name="brand" value="{{ old('brand') }}" />
                        <input type="text" class="form-control mb-2" placeholder="{{ __('messages.admin.create.entercategory') }}" name="category" value="{{ old('category') }}" />

                        <div class="form-group">
                            <label for="keywords"> {{ __('messages.admin.create.keywords') }} </label>
                            <input type="text" name="keywords[]" id="keywords" class="form-control" placeholder=" {{ __('messages.admin.create.enterkey') }} ">
                        </div>
                        <div class="form-group">
                            <input type="text" name="keywords[]" class="form-control" placeholder=" {{ __('messages.admin.create.enterkey') }} ">
                        </div>

                        <input type="number" class="form-control mb-2" placeholder="{{ __('messages.admin.create.entercurrprice') }}" name="currentPrice" value="{{ old('currentPrice') }}" />
                        <input type="number" class="form-control mb-2" placeholder="{{ __('messages.admin.create.enterlastprice') }}" name="lastPrice" value="{{ old('lastPrice') }}" />
                        <input type="text" class="form-control mb-2" placeholder="{{ __('messages.admin.create.enterdetails') }}" name="details" value="{{ old('details') }}" />
                        Is in discount?
                        <input type="checkbox" name="discount" placeholder="{{ __('messages.admin.create.isdiscount') }}" class="switch-input" value="1" {{ old('discount') ? 'checked="checked"' : '' }} />
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
</div>
</div>

@endsection