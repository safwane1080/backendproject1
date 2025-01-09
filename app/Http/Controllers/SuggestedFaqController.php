<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuggestedFaq;

class SuggestedFaqController extends Controller
{
    public function index()
{
    $questions = SuggestedFaq::all();
    return view('admin.suggested-questions', compact('questions'));
}
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:approved,rejected',
    ]);

    $question = SuggestedFaq::findOrFail($id);
    $question->status = $request->status;
    $question->save();

    return redirect()->route('admin.suggested-questions.index')->with('success', 'Question status updated successfully.');
}

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        SuggestedFaq::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'question' => $request->input('question'),
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your question has been submitted and is under review by an admin.');
    }
}
