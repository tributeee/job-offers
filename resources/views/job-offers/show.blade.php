@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(session('message'))
                    <p class="alert-{{ session('class') }} p15">{{ session('message') }}</p>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="list-group-item-heading">{{ $offer->title }}</h3>
                        <p class="text-right help-block">Posted by: {{ $offer->email }}</p>
                    </div>
                    <div class="panel-body">
                        <p>{{ $offer->description }}</p>
                    </div>
                    @auth
                        <div class="panel-footer">
                            <p>Status:
                                <span class="text-{{ $offer->status == \App\JobOffer::STATUS_PUBLISHED ? 'success' : ($offer->status == \App\JobOffer::STATUS_SPAM ? 'danger' : 'warning') }}">
                                    {{ ucfirst($offer->status) }}
                                </span>
                            </p>
                            @if($offer->status == \App\JobOffer::STATUS_PENDING)
                                <a href="/{{ $offer->id }}/publish" class="btn btn-success">Publish</a>
                                <a href="/{{ $offer->id }}/mark-spam" class="btn btn-danger">Mark Spam</a>
                            @endif
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection