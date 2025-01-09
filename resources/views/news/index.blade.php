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

                    @foreach($news as $item)
    <div class="news-item mb-4">
        <h3>{{ $item->title }}</h3>
        <p>{{ $item->content }}</p>
        <p><small>Gepubliceerd op: {{ $item->created_at->format('d-m-Y') }}</small></p>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
