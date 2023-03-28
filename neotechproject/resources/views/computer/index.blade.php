@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["computers"] as $computer)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$computer->getImage())}}" class="card-img-top img-card" width="300" height="300">
      <div class="card-body text-center">
        <a href="{{ route('computer.show', ['id'=> $computer->getId()]) }}"
          class="btn bg-primary text-white">{{ $computer->getName() }}</a>
          <form action="{{ route('computer.create', $computer->getId()) }}" method="POST"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
