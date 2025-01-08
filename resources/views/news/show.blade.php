@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $newsItem->title }}</h1>
        <p><strong>Gepubliceerd op:</strong> {{ $newsItem->created_at->format('d-m-Y') }}</p>
        <div>
            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid">
        </div>
        <div>
            <p>{{ $newsItem->content }}</p>
        </div>
    </div>
@endsection