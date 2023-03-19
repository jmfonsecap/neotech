@extends('layouts.app')

@section('title', 'Home Page - Online Store')

@section('content')

<div class="btn bg-primary text-white">
    <a href="{{ route('flight.create') }}">Register a flight</a>
</div>

<div class="btn bg-primary text-white">
    <a href="{{ route('flight.index') }}">Flight list</a>
</div>

<div class="btn bg-primary text-white">
    <a href="{{ route('flight.show') }}">Flight statistics</a>
</div>
@endsection
