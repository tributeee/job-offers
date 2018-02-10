@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @auth
                    <ul class="nav nav-pills">
                        <li role="presentation" class="{{ !Request::get('status') ? 'active' : '' }}"><a href="/">All</a></li>
                        <li role="presentation" class="{{ Request::get('status') == 'pending' ? 'active' : '' }}"><a href="/?status=pending">Pending</a></li>
                        <li role="presentation" class="{{ Request::get('status') == 'published' ? 'active' : '' }}"><a href="/?status=published">Published</a></li>
                        <li role="presentation" class="{{ Request::get('status') == 'spam' ? 'active' : '' }}"><a href="/?status=spam">Spam</a></li>
                    </ul>
                @endauth
                <div class="list-group">
                    @if(session('message'))
                        <p class="alert-success p15">{{ session('message') }}</p>
                    @endif
                    @if(empty($offers->items()))
                        <h4 class="list-group-item">No Job Offers Yet!</h4>
                    @else
                        @foreach($offers as $offer)
                            <a href="/{{ $offer->id }}" class="list-group-item">
                                <h4 class="list-group-item-heading">{{ $offer->title }}</h4>
                                @auth
                                    <p class="text-{{ $offer->status == \App\JobOffer::STATUS_PUBLISHED ? 'success' : ($offer->status == \App\JobOffer::STATUS_SPAM ? 'danger' : 'warning') }}">
                                        {{ ucfirst($offer->status) }}
                                    </p>
                                @endauth
                                <p>{{ \Illuminate\Support\Str::limit($offer->description, 150) }}</p>
                                <p class="text-right help-block">{{ $offer->email }}</p>
                            </a>
                        @endforeach
                        {{ $offers->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
