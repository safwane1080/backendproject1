<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws - Luxury Watches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .news-item {
            background: #fff;
            border: 1px solid #eaeaea;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .news-item h3 {
            color: #343a40;
        }
        .news-item p {
            color: #6c757d;
        }
        .news-item small {
            font-size: 0.9rem;
            color: #adb5bd;
        }
        .btn-admin {
            background-color: #0d6efd;
            color: #fff;
        }
        .btn-admin:hover {
            background-color: #0046ad;
            color: #fff;
        }
        .btn-create {
            background-color: #198754;
            color: #fff;
        }
        .btn-create:hover {
            background-color: #145f42;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center mb-5">Laatste Nieuwtjes</h2>
        
        @if(auth()->user() && auth()->user()->usertype === 'admin')
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('admin.news.create') }}" class="btn btn-create">Nieuw Nieuwsitem</a>
            </div>
        @endif

        <div class="row g-4">
            @foreach($news as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="news-item p-4">
                        <h3 class="mb-3">{{ $item->title }}</h3>
                        <p class="mb-4">{{ Str::limit($item->content, 100, '...') }}</p>
                        <p><small>Gepubliceerd op: {{ $item->created_at->format('d-m-Y') }}</small></p>
                        @if(auth()->user() && auth()->user()->usertype === 'admin')
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-admin btn-sm">Bewerken</a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
