@extends('layouts.app') 
@section('title', $title) 
@section('subtitle', $subtitle) 
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
      </div>
    </div>
  </div> 
</div> @endsection