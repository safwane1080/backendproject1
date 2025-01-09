@extends('layouts.admin')

@section('content')<div class="mt-4">
    <a href="{{ url('/admin/dashboard') }}" class="btn btn-secondary">Comeback to dashboard</a>
</div>
    <div class="container mt-5">
        <h2>Suggested Questions</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->question }}</td>
                        <td>{{ ucfirst($question->status) }}</td>
                        <td>
                            @if($question->status == 'pending')
                                <form action="{{ route('admin.suggested-questions.update-status', $question->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('admin.suggested-questions.update-status', $question->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>Action Disabled</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection