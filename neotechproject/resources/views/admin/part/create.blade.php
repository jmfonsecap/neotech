@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Part</div>
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

                    <form method="POST" action="{{ route('admin.part.save') }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="number" class="form-control mb-2" placeholder="Enter stock" name="stock" value="{{ old('stock') }}" />
                        
                        <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" />
                        <div class="form-group">
                        <label for="type">Enter the type of part:</label>
                        @foreach($viewData['types'] as $type)
                        <div>
                            <input type="radio" name="type" value="{{ $type['name'] }}" id="{{ $type['id'] }}" {{ old('type') == $type['name'] ? 'checked' : '' }}>
                            <label for="{{ $type['id'] }}">{{ $type['name'] }}</label>
                        </div>
                        @endforeach
                        </div>

                        <input type="number" class="form-control mb-2" placeholder="Enter the price" name="price" value="{{ old('pricee') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter details" name="details" value="{{ old('details') }}" />
                        <input type="submit" class="btn btn-primary" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection