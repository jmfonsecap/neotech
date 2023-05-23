@extends('layouts.admin')
@section('content')

<div class="container">
    <div>
        <a class="btn btn-success" href="{{ route('admin.review.index') }}"> {{ __('messages.admin.back') }} </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.admin.reviews.edit')}}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.review.edit', ['id'=> $viewData["review"]->getId()]) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="number" class="form-control mb-3" placeholder="{{__('messages.admin.create.enterrating')}}" name="rating" value="{{ $viewData["review"]->getRating() }}" />
                        <input type="text" class="form-control mb-3" placeholder="{{__('messages.admin.create.enterdetails')}}" name="description" value="{{ $viewData["review"]->getDescription() }}" />
                        <div class="mb-3">
                            <label for="file" class="form-label"> File </label>
                            <input class="form-control" type="file" name="file" id="file">
                        </div>
                        <input type="submit" class="btn btn-primary mt-2" value="{{ __('messages.admin.update') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection