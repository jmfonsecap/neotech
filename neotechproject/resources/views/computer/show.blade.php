@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src= "{{ $viewData["computer"]->getPhoto()}}" class="img-fluid rounded-start" width="500" height="500">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
        {{ $viewData["computer"]->getBrand() }} {{ $viewData["computer"]->getName() }}
        </h5>
        <p class="card-text">{{ $viewData["computer"]->getCategory() }}</p>
        @if ($viewData["computer"]->getDiscount()==1)
        <p class="card-text"> Antes: {{ $viewData["computer"]->getLastPrice() }}</p>
        <p class="card-text"> Ahora: {{ $viewData["computer"]->getCurrentPrice() }}</p>
        @endif
        @if($viewData["computer"]->getDiscount()==0)
        <p class="card-text"> Precio: {{ $viewData["computer"]->getCurrentPrice() }}</p>
        @endif
        <p class="card-text"> Details: {{ $viewData["computer"]->getDetails() }}</p>
        <a href="{{ route('review.create', ['id' => $viewData['computer_id']]) }}">Add a review</a>
        <form action="{{ route('computer.delete', $viewData["computer"]->getId()) }}" method="POST"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection