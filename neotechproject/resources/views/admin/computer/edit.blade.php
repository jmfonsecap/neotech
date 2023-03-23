@extends('layouts.admin')
@section('content')

<div class="container">
    <div>
        <a class="btn btn-success" href="{{ route('part.index') }}">Volver</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.admin.create')}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.computer.edit', ['id'=> $computer->getId()]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-center">
                            <img src="{{ asset($viewData["part"]["img"]) }}" id="image-edit-part">
                        </div>
                        <label for="type" class="form-label">{{__('messages.part.form.field.type.placeholder')}}</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="type">
                            @foreach($viewData["type_options"] as $option)
                            @if($viewData["part"]["type"] == $option)
                            <option value="{{$option}}" selected>{{__('messages.part.form.field.type.option.'.$option)}}
                            </option>
                            @else
                            <option value="{{$option}}">{{__('messages.part.form.field.type.option.'.$option)}}</option>
                            @endif
                            @endforeach
                        </select>
                        <input type="text" class="form-control mb-3" placeholder="{{__('messages.part.form.field.name.placeholder')}}" name="name" value="{{ $viewData["part"]["name"] }}" />
                        <input type="number" class="form-control mb-3" placeholder="{{__('messages.part.form.field.stock.placeholder')}}" name="stock" value="{{ $viewData["part"]["stock"] }}" />
                        <input type="number" class="form-control mb-3" placeholder="{{__('messages.part.form.field.price.placeholder')}}" name="price" value="{{ $viewData["part"]["price"] }}" />
                        <input type="text" class="form-control mb-3" placeholder="{{__('messages.part.form.field.brand.placeholder')}}" name="brand" value="{{ $viewData["part"]["brand"] }}" />
                        <div class="mb-3">
                            <label for="file" class="form-label">{{__('messages.part.form.field.file.label.title')}}</label>
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