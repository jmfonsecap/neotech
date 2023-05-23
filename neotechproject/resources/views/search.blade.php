@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><b>{{ $searchResults->count() }} results found for "{{ request('query') }}"</b></div>

    <div class="card-body">

        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
            <h2>{{ ucfirst($type) }}</h2>
            
            @foreach($modelSearchResults as $searchResult)
                <ul>
                    @if(ucfirst($type)=='Computers')
                        @foreach($viewData["computers"] as $computer)
                            @if($computer->getName() ==$searchResult->title  )
                            <img src="{{ asset('/storage/'.$computer->getPhoto())}}" class="card-img-top img-card" width="300" height="300">
                                @break
                            @endif
                        @endforeach
                    @endif
                    @if(ucfirst($type)=='Parts')
                        @foreach($viewData["parts"] as $part)
                            @if($part->getName() ==$searchResult->title  )
                            <img src="{{ asset('/storage/'.$part->getPhoto())}}" class="card-img-top img-card" width="300" height="300">
                                @break
                            @endif
                        @endforeach
                    @endif
                    
                    <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                </ul>
            @endforeach
        @endforeach

    </div>
</div>
@endsection