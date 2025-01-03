<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h3 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .faq-item {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .faq-item h5 {
            margin: 0 0 10px;
            color: #555;
        }

        .faq-item p {
            margin: 0 0 10px;
            color: #666;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .mb-3 {
            margin-bottom: 16px;
        }

        .mt-4 {
            margin-top: 24px;
        }

        form {
            display: inline-block;
            margin: 0;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .btn {
                width: 100%;
                margin-bottom: 8px;
            }

            form {
                display: block;
            }
        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Frequently Asked Questions</h1>

        <!-- Add FAQ Button -->
        <a href="{{ route('admin.faq.create') }}" class="btn btn-primary mb-3">Add FAQ</a>

        @foreach($categories as $category)
            <div class="mt-4">
                <h3>{{ $category->name }}</h3>
                @foreach($category->faqs as $faq)
                    <div class="faq-item">
                        <h5>{{ $faq->question }}</h5>
                        <p>{{ $faq->answer }}</p>

                        <!-- Edit FAQ Button -->
                        <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete FAQ Button -->
                        <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
</body>
</html>
