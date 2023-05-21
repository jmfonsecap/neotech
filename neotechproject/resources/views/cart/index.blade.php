@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
 <div class="card-header">
 Items in Cart
 </div>
 <div class="card-body">
 <table class="table table-bordered table-striped text-center">
 <thead>
 <tr>
 <th scope="col">ID</th>
 <th scope="col">Name</th>
 <th scope="col">Price</th>
 <th scope="col">Quantity</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($viewData["items"] as $item)
 <tr>
 <td>{{ $item->getId() }}</td>
 <td>{{ $item->getName() }}</td>
 <td>${{ $item->getPrice() }}</td>
 <td>{{ session('items')[$item->getId()] }}</td>
 </tr>
 @endforeach
 </tbody>
 </table>
 <div class="row">
 <div class="text-end">
 <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
 <a class="btn bg-primary text-white mb-2">Purchase</a>
 <a href="{{ route('cart.delete') }}">
 <button class="btn btn-danger mb-2">
 Remove all items from Cart
 </button>
 </a>
 </div>
 </div>
 </div>
</div>
@endsection