<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Forms</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
        }

        .contact-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .contact-card h5 {
            margin-bottom: 15px;
            color: #333;
        }

        .contact-card p {
            margin: 0 0 10px;
            font-size: 0.95rem;
            color: #555;
        }

        .contact-card .actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-card textarea {
            resize: none;
        }

        .btn-success {
            background-color: #6cbf74;
            border-color: #5aae63;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-success:hover {
            background-color: #5aae63;
            border-color: #499a53;
        }

        .pagination {
            justify-content: center;
            margin-top: 30px;
        }

        .pagination .page-item.active .page-link {
            background-color: #6cbf74;
            border-color: #6cbf74;
        }

        .pagination .page-link {
            color: #6cbf74;
        }

        .pagination .page-link:hover {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    @extends('admin.layout')

    @section('content')
    <div class="container">
        <h1 class="my-4 text-center">Contact Forms</h1>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-success mb-3">Back to Dashboard</a>

        @foreach($contacts as $contact)
        <div class="contact-card">
            <h5>Message from: {{ $contact->name }}</h5>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Submitted on:</strong> {{ $contact->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Message:</strong> {{ $contact->message }}</p>
            <div class="actions">
                <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST" style="width: 100%;">
                    @csrf
                    <textarea name="reply" rows="3" class="form-control mb-2" placeholder="Enter your reply...">{{ old('reply', $contact->reply) }}</textarea>
                    <button type="submit" class="btn btn-success btn-sm w-100">Send Reply</button>
                </form>
            </div>
        </div>
        @endforeach

        {{ $contacts->links() }}
    </div>
    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
