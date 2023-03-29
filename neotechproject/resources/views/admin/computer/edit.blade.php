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
                    <form method="POST" action="{{ route('admin.computer.edit', ['id'=> $viewData["computer"]->getId()]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-center">
                            <img src="{{ asset('/storage/'.$viewData["computer"]->getPhoto()) }}" id="image-edit-computer">
                        </div>
                        <input type="text" class="form-control mb-3" placeholder="{{__('messages.admin.create.entername')}}" name="name" value="{{ $viewData["computer"]->getName() }}" />
                        <input type="number" class="form-control mb-3" placeholder="{{__('messages.admin.create.enterstock')}}" name="stock" value="{{ $viewData["computer"]->getStock() }}" />
                        <input type="number" class="form-control mb-3" placeholder="{{__('messages.admin.create.enterbrand')}}" name="brand" value="{{ $viewData["computer"]->getBrand() }}" />
                        <input type="text" class="form-control mb-3" placeholder="{{__('messages.admin.create.entercategory')}}" name="category" value="{{ $viewData["computer"]->getCategory() }}" />
                        <div class="mb-3">
                            <label for="file" class="form-label"> File </label>
                            <input class="form-control" type="file" name="file" id="file">
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" value="Update" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection