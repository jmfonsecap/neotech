@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Computer</div>
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

                    <form method="POST" action="{{ route('admin.computer.save') }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="number" class="form-control mb-2" placeholder="Enter stock" name="stock" value="{{ old('stock') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter photo url" name="photo" value="{{ old('photo') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter category" name="category" value="{{ old('category') }}" />

                        <div class="form-group">
                            <label for="keywords">Keywords:</label>
                            <input type="text" name="keywords[]" id="keywords" class="form-control" placeholder="Enter a keyword">
                        </div>
                        <div class="form-group">
                            <input type="text" name="keywords[]" class="form-control" placeholder="Enter a keyword">
                        </div>

                        <input type="number" class="form-control mb-2" placeholder="Enter current price" name="currentPrice" value="{{ old('currentPrice') }}" />
                        <input type="number" class="form-control mb-2" placeholder="Enter last price" name="lastPrice" value="{{ old('lastPrice') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter details" name="details" value="{{ old('details') }}" />
                        Is in discount?
                        <input type="checkbox" name="discount" placeholder="Is in discount?" class="switch-input" value="1" {{ old('discount') ? 'checked="checked"' : '' }} />
                        <input type="submit" class="btn btn-primary" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection