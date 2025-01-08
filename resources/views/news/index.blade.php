@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Laatste nieuws</h1>
        
        @if ($news->isEmpty())
            <p>Er is momenteel geen nieuws beschikbaar.</p>
        @else
            <ul>
                @foreach ($news as $item)
                    <li>
                        <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a> 
                        <span>{{ $item->created_at->format('d-m-Y') }}</span>
                    </li>
                @endforeach
            </ul>
            <ul>
    @foreach ($newsItems as $news)
        <li>{{ $news->title }} - {{ $news->publication_date }}</li>
    @endforeach
</ul>
        @endif
    </div>
@endsection