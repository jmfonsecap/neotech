@extends('layouts.app')  
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $part->getName() }}
        </h5>
        <p class="card-text"> In stock: {{ $part->getStock() }}
        </p>
        <p class="card-text"> Brand: {{ $part->getBrand() }}
        </p>
        <p class="card-text"> Type: {{ $part->getType() }}
        </p>
        <p class="card-text"> Price: {{ $part->getPrice() }}
        </p>
        <p class="card-text"> Details: {{ $part->getDetails() }}
        </p>
        <p class="card-text"> Creation date: {{ $part->getCreated_at() }}
        </p>
        <p class="card-text"> Last update: {{ $part->getUpdated_at() }}
        </p>
        <form action="{{ route('part.delete', $part->getId()) }}" method="POST"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <p class="card-text">
        <form method="POST" action="{{ route('cart.add', ['id'=> $part->getId(), 'type'=>"part"]) }}">
        <div class="row">
        @csrf
        <div class="col-auto">
        <div class="input-group col-auto">
        <div class="input-group-text">Quantity</div>
        <input type="number" min="1" max="10" class="form-control quantity-input"
        name="quantity" value="1">
        </div>
        </div>
        <div class="col-auto">
        <button class="btn bg-primary text-white" type="submit">Add to cart</button>
        </div>
        </div>
        </form>
        </p> 
      </div>
    </div>
  </div> 
</div> @endsection