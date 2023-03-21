@extends('layouts.app') @section('content') <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create part</div>
        <div class="card-body"> @if($errors->any()) <ul id="errors" class="alert alert-danger list-unstyled"> @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul> @endif <form method="POST" action="{{ route('part.save') }}"> @csrf <input type="text" class="form-control mb-2" placeholder="Enter quantity in stock" name="stock" value="{{ old('stock') }}" />
            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
            <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" /> Enter the type of part: @foreach($types as $type) <div>
              <input type="radio" name="type" value="{{ $type['name'] }}" id="{{ $type['id'] }}" {{ old('type') == $type['name'] ? 'checked' : '' }}>
              <label for="{{ $type['id'] }}">{{ $type['name'] }}</label>
            </div> @endforeach <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />
            <input type="text" class="form-control mb-2" placeholder="Enter details" name="details" value="{{ old('details') }}" />
            <input type="submit" class="btn btn-primary" value="Send" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div> @endsection