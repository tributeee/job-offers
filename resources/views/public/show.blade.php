@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="list-group-item-heading">{{ $offer->title }}</h3>
                        <p class="text-right help-block">Posted by: {{ $offer->email }}</p>
                    </div>
                    <div class="panel-body">
                        <p>{{ $offer->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection