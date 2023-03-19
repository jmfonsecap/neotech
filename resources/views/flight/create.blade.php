@extends('layouts.app') @section('content') <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create flight</div>
        <div class="card-body"> @if($errors->any()) <ul id="errors" class="alert alert-danger list-unstyled"> @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul> @endif <form method="POST" action="{{ route('flight.save') }}"> @csrf <input type="text" class="form-control mb-2" placeholder="Enter the flight name" name="name" value="{{ old('name') }}" />
        <input type="text" class="form-control mb-2" placeholder="Enter the take off time" name="take_off_time" value="{{ old('take_off_time') }}" />
            <input type="text" class="form-control mb-2" placeholder="Enter the arriving time" name="arriving_time" value="{{ old('arriving_time') }}" />
            <input type="text" class="form-control mb-2" placeholder="Enter the take off place" name="take_off_place" value="{{ old('take_off_place') }}" /> 
            <input type="text" class="form-control mb-2" placeholder="Enter the arriving time" name="destination" value="{{ old('destination') }}" />
            Enter the type of flight: @foreach($types as $type) <div>
              <input type="radio" name="flight_type" value="{{ $type['name'] }}" id="{{ $type['id'] }}" {{ old('type') == $type['name'] ? 'checked' : '' }}>
              <label for="{{ $type['id'] }}">{{ $type['name'] }}</label>
            </div> @endforeach 
            <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />
            <input type="submit" class="btn btn-primary" value="Send" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div> @endsection