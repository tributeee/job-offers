@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="list-group">
                    @if(session('message'))
                        <div class="alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @foreach($offers as $offer)
                        <a href="/{{ $offer->id }}" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $offer->title }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($offer->description, 150) }}</p>
                            <p class="text-right help-block">{{ $offer->email }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
