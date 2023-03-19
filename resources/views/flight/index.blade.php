@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"]) 
@section('content') <div class="row"> 
    @foreach ($viewData["flights"] as $flight) 
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
        <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
        <h5 class="card-title">
        @if (($flight->getType())=="International")
          <b>{{ $flight->getName() }}</b>
        @endif
        </h5>
      <div class="card-body text-center">
        <p class="card-text"> ID: {{ $flight->getId() }}
        </p>
        <p class="card-text"> Take off time: {{ $flight->getTakeOffTime() }}
        </p>
        <p class="card-text"> Arriving time: {{ $flight->getArrivingTime() }}
        </p>
        <p class="card-text"> Take off place: {{ $flight->getTakeOffPlace() }}
        </p>
        <p class="card-text"> destination: {{ $flight->getDestination() }}
        </p>
        <p class="card-text"> Type of flight: {{ $flight->getType() }}
        </p>
        @if (($flight->getType())=="National")
        <p class="card-text" style="color:blue"> Ticket price: {{ $flight->getPrice() }}
        </p>
        @endif
        <p class="card-text"> Creation date: {{ $flight->getCreated_at() }}
        </p>
        <p class="card-text"> Last update: {{ $flight->getUpdated_at() }}
        </p>
        <form action="{{ route('flight.delete', $flight->getId()) }}" method="POST"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div> @endforeach </div> @endsection