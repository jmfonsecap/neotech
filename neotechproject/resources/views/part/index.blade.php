@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"]) 
@section('content') <div class="row"> 
    @foreach ($viewData["parts"] as $part) 
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
        <img src="{{ asset('/storage/'.$part->getPhoto()) }}" class="card-img-top img-card">
        <h5 class="card-title">
            {{ $part->getName() }}
        </h5>
      <div class="card-body text-center">
        <a href="{{ route('part.show', ['id'=> $part->getId()]) }}" class="btn bg-primary text-white">About this component</a>
      </div>
    </div>
  </div> @endforeach </div> @endsection