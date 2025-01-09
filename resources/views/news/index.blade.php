<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws - Luxury Watches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center mb-4">Laatste Nieuwtjes</h2>
        <div class="row">
            @foreach($news as $item)
                <div class="news-item mb-4">
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->content }}</p>
                    <p><small>Gepubliceerd op: {{ $item->created_at->format('d-m-Y') }}</small></p>
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid mb-3" style="max-height: 200px; object-fit: cover;">

                    @foreach($news as $item)
    <div class="news-item mb-4">
        <h3>{{ $item->title }}</h3>
        <p>{{ $item->content }}</p>
        <p><small>Gepubliceerd op: {{ $item->created_at->format('d-m-Y') }}</small></p>
        <div class="row">
    @foreach($news as $item)
        <div class="col-md-4">
            <div class="news-item mb-4">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="img-fluid mb-3" style="max-height: 200px; object-fit: cover;">
                <h3>{{ $item->title }}</h3>
                <p>{{ Str::limit($item->content, 100, '...') }}</p>
                <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary">Lees meer</a>
            </div>
        </div>
    @endforeach
</div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
