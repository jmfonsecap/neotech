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
                @foreach ($viewData["computers"] as $computerId => $computerArray)
                @foreach ($computerArray as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>${{ $item['currentPrice'] }}</td>
                    <td>{{ $viewData["computers"][$computerId][0]['quantity'] }}</td>
                </tr>
                @endforeach
                @endforeach
                @foreach ($viewData["parts"] as $partId => $partArray)
                @foreach ($partArray as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>${{ $item['price'] }}</td>
                    <td>{{ $viewData["parts"][$partId][0]['quantity'] }}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
                @if ((count($viewData["computers"]) + count($viewData["parts"])) > 0)
                <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a>
                <a href="{{ route('cart.delete') }}">
                    <button class="btn btn-danger mb-2">
                        Remove all products from Cart
                    </button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
