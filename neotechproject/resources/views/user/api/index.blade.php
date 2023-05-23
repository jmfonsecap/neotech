@extends('layouts.app')
@section('content')
<h1>Cars</h1>

    <ul>
        @foreach ($cars as $car)
            <li>
                <img src="{{ $car['image_url'] }}" alt="{{ $car['brand'] }} {{ $car['model'] }}" width="200">
                <p><strong>Brand:</strong> {{ $car['brand'] }}</p>
                <p><strong>Model:</strong> {{ $car['model'] }}</p>
                <p><strong>Color:</strong> {{ $car['color'] }}</p>
                <p><strong>Price:</strong> {{ $car['price_cop'] }}</p>
                <p><strong>Year:</strong> {{ $car['year'] }}</p>
                <p><strong>Kilometers:</strong> {{ $car['kilometers'] }}</p>
                <p><strong>Transmission:</strong> {{ $car['transmission_type'] }}</p>
                <p><strong>Type:</strong> {{ $car['type'] }}</p>
                <p><strong>Is New:</strong> {{ $car['is_new'] ? 'Yes' : 'No' }}</p>
            </li>
        @endforeach
    </ul>
@endsection