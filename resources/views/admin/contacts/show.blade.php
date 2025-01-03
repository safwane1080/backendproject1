<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('admin.layout')

@section('content')
    <div class="container">
        <h1 class="my-4">Contactformulier Details</h1>

        <p><strong>Naam:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Bericht:</strong> {{ $contact->message }}</p>
        <p><strong>Ingediend op:</strong> {{ $contact->created_at->format('d-m-Y H:i') }}</p>

        <!-- Formulier voor het beantwoorden van het contactformulier -->
        <h3>Beantwoord het formulier</h3>
        <form action="{{ route('admin.contactforms.reply', $contact->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="reply">Je antwoord</label>
                <textarea name="reply" id="reply" rows="5" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-3">Verzend antwoord</button>
        </form>
    </div>
@endsection

</body>
</html>