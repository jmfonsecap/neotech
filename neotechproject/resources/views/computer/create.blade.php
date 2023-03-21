@extends('layouts.app')
@section("title", $viewData["title"])
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

            <form method="POST" action="{{ route('computer.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter stock" name="stock" value="{{ old('stock') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter photo url" name="photo" value="{{ old('photo') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter category" name="category" value="{{ old('category') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter keywords" name="keywords" value="{{ old('keywords') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter current price" name="currentPrice" value="{{ old('currentPrice') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter last price" name="lastPrice" value="{{ old('lastPrice') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter details" name="details" value="{{ old('details') }}" />
              Is in discount?
              <input type="checkbox" name="discount" placeholder= "Is in discount?" class="switch-input" value="1" {{ old('discount') ? 'checked="checked"' : '' }}/>
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
