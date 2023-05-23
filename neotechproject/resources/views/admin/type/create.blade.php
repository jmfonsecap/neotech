@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('messages.admin.types.create') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    @if (session('status') == 'created')
                    <div class="alert alert-success">
                        {{ __('messages.admin.types.created') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.type.save') }}">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="{{ __('messages.admin.create.entername') }}" name="name" value="{{ old('name') }}" />
                        
                        <input type="submit" class="btn btn-primary" value="{{ __('messages.admin.send') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection