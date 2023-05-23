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
                    </ul>
                    @endif

                    @if (session('status') == 'created')
                    <div class="alert alert-success">
                        {{ __('messages.admin.parts.created') }}
                    </div>
                    @endif

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
</div>
</div>

@endsection