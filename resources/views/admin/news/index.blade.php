@extends('layouts.app')

@section('content')
    <style>
        .container {
            margin-top: 30px;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-primary {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #f9f9f9;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e9ecef;
        }

        table h2 {
            margin: 0;
            color: #007bff;
        }

        table p {
            margin: 5px 0;
            color: #555;
        }
    </style>

    <div class="container">
        <h1>Beheer Nieuwsitems</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Nieuw Nieuwsitem Toevoegen</a>

        @if ($news->isEmpty())
            <p>Er zijn momenteel geen nieuwsitems om te beheren.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Titel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                        <tr>
                            <td>
                                <h2>{{ $item->title }}</h2>
                                <p>{{ $item->content }}</p>
                                <p>Gepubliceerd op: {{ $item->publication_date }}</p>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <td>
    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-primary">Bewerken</a>
    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?')">
            Verwijderen
        </button>
    </form>
</td>

                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
