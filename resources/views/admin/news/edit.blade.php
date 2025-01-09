@extends('layouts.app')

@section('content')
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: grid;
            gap: 20px;
        }

        label {
            font-size: 1.1rem;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        textarea,
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #fff;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus,
        input[type="date"]:focus,
        input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        <h1>News item Edit</h1>

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required>
            </div>

            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content" required>{{ old('content', $news->content) }}</textarea>
            </div>

            <div>
                <label for="image">Image (optional)</label>
                <input type="file" name="image" id="image">
            </div>

            <div>
                <label for="publication_date">Publication date</label>
                <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date', $news->publication_date) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
