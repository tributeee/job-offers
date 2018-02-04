@extends('emails.layout.layout')

@section('content')
    <div>
        <p>Your job offer {{ $title }} {{ $status }}!</p>
    </div>
@endsection