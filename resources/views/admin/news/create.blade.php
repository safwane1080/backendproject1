@extends('layouts.app')

@section('content')
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container input[type="file"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container textarea {
            resize: none;
            height: 150px;
        }

        .form-container .error {
            color: red;
            font-size: 0.9rem;
        }

        .form-container button {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="form-container">
        <h1>Nieuw Nieuwsitem Toevoegen</h1>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="title">Titel</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="content">Inhoud</label>
                <textarea name="content" id="content" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="image">Afbeelding</label>
                <input type="file" name="image" id="image" required>
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="publication_date">Publicatiedatum</label>
                <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date') }}" required>
                @error('publication_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Opslaan</button>
        </form>
    </div>
@endsection
