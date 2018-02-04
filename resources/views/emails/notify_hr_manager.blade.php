@extends('emails.layout.layout')

@section('content')
    <div>
        <p>Your job offer <b>{{ $title }}</b> {{ $status }}!</p>
    </div>
@endsection