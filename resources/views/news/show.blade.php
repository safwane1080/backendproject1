<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsItem->title }} - Luxury Watches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center mb-4">{{ $newsItem->title }}</h2>
        <img src="{{ asset('storage/' . $newsItem->image) }}" class="img-fluid mb-4" alt="{{ $newsItem->title }}">
        <p>{{ $newsItem->content }}</p>
        <a href="/news" class="btn btn-dark">Terug naar overzicht</a>
    </div>
    <div class="container">
    <h1>{{ $news->title }}</h1>
    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid mb-4">
    <p>{{ $news->content }}</p>
    <p><small>Gepubliceerd op: {{ $news->created_at->format('d-m-Y') }}</small></p>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
