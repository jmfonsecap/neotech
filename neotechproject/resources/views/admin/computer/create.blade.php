@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('messages.admin.create.name') }} </div>
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
                        {{ __('messages.admin.create.isdiscount') }}
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