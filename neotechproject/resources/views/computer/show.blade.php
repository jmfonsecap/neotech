@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Computer Description</title>
	<style>
		
	</style>
</head>
<body>
	<div class="container">
		<div class="computer-image">
			<img src="{{ asset('/storage/'.$viewData["computer"]->getPhoto())  }}" class="img-fluid rounded-start" width="210" height="210" alt="Computer Image">
		</div>
		<div class="computer-details">
			<h1>{{ $viewData["computer"]->getBrand() }} {{ $viewData["computer"]->getName() }}</h1>
			<h2>Specifications</h2>
        <ul>
        </ul>
      <h2>Details</h2>
			<p class="card-text"> {{ $viewData["computer"]->getDetails() }}</p>
      @if ($viewData["computer"]->getDiscount()==1)
        <p>Price:</p>
        <p class="card-text"> Before: {{ $viewData["computer"]->getLastPrice() }}</p>
        <p class="card-text"> Now: {{ $viewData["computer"]->getCurrentPrice() }}</p>
        @endif
        @if($viewData["computer"]->getDiscount()==0)
        <p class="card-text"> Price: {{ $viewData["computer"]->getCurrentPrice() }}</p>
        @endif
        <p class="card-text"> Details: {{ $viewData["computer"]->getDetails() }}</p>
        <p class="card-text">
        <form method="POST" action="{{ route('cart.add', ['id'=> $viewData["computer"]->getId()]) }}">
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
        @foreach ($viewData['reviews'] as $review)
        <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
        <p class="card-text">Rating: {{ $review->getRating() }}/5</p>
        <p class="card-text">Details: {{ $review->getDescription() }}</p>
        </div>
        </div>
        @endforeach
        <a href="{{ route('review.create', ['id' => $viewData['computer_id']]) }}">Add a review</a>
        <form action="{{ route('computer.delete', $viewData["computer"]->getId()) }}" method="POST"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
        </form>
		</div>
	</div>
</body>
</html>

@endsection