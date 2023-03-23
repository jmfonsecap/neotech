@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="computer-image">
			<img src="{{ $viewData["computer"]->getPhoto()}}" class="img-fluid rounded-start" width="210" height="210" alt="Computer Image">
		</div>
		<div class="computer-details">
			<h1>{{ $viewData["computer"]->getBrand() }} {{ $viewData["computer"]->getName() }}</h1>
			<h2>Specifications</h2>
        <ul>
          @foreach($viewData["computer"]->getParts() as $part)
            <li>{{ $part->getName() }}</li>
          @endforeach
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
        <a href="{{ route('admin.computer.delete', ['id' => $viewData["computer"]->getId()]) }}">
            {{__('messages.admin.delete') }}
        </a>
        <form action="{{ route('admin.computer.update', $viewData["computer"]->getId()) }}" method="POST"> @csrf @method('POST') <button type="submit" class="btn btn-danger">Update</button>
        </form>
		</div>
	</div>

@endsection