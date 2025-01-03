<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* Algemeen */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f8fa;
        margin: 0;
        padding: 0;
    }

    .container {
        margin-top: 50px;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        font-size: 1.5rem;
        font-weight: bold;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    /* Tabel */
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th, .table td {
        padding: 15px;
        text-align: left;
    }

    .table th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .table td {
        background-color: #f9f9f9;
        color: #333;
        border-bottom: 1px solid #ddd;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }

    .table td a {
        text-decoration: none;
        color: #fff;
    }

    .table td a:hover {
        background-color: #0056b3;
    }

    /* Knoppen */
    .btn-primary {
        background-color: #007bff;
        border: 1px solid #007bff;
        padding: 8px 16px;
        border-radius: 5px;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    /* Paginatie */
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }

    .page-link {
        color: #007bff;
        border-radius: 5px;
        padding: 10px 15px;
    }

    .page-link:hover {
        color: #0056b3;
        border-color: #0056b3;
        background-color: #e9ecef;
    }

    .page-item {
        margin: 0 5px;
    }

    /* Alerts */
    .alert {
        border-radius: 5px;
        margin-top: 20px;
        padding: 15px;
        font-size: 1.1rem;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
    }

    .alert-danger {
        background-color: #dc3545;
        color: white;
    }

    .alert-info {
        background-color: #17a2b8;
        color: white;
    }

    /* Tooltip */
    .tooltip-inner {
        background-color: #007bff;
        color: white;
        font-size: 0.875rem;
        padding: 8px 12px;
        border-radius: 5px;
    }
</style>

</head>
<body>
@extends('admin.layout') {{-- Verwijs naar je admin-template --}}

@section('content')
<div class="container">
    <h1 class="my-4">Contactformulieren</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Bericht</th>
                <th>Ingediend op</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
    @foreach($contacts as $contact)
    <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
        <td>
            <!-- Antwoordformulier -->
            <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST">
                @csrf
                <textarea name="reply" rows="3" class="form-control" placeholder="Voer je antwoord in...">{{ old('reply', $contact->reply) }}</textarea>
                <button type="submit" class="btn btn-success btn-sm mt-2">Antwoord verzenden</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>

    {{-- Paginatie --}}
    {{ $contacts->links() }}
</div>
@endsection

</body>
</html>