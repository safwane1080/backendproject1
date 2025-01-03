<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Category;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
{
    $categories = Category::with('faqs')->get(); // Haal alle categorieën met hun FAQ's op
    return view('faq.index', compact('categories')); // Stuur de categorieën naar de view
}

    // Show the form for creating a new FAQ
    public function create()
    {
        $categories = Category::all();
        return view('admin.faq.create', compact('categories'));
    }

    // Store a newly created FAQ in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        FAQ::create($request->only(['question', 'answer', 'category_id']));

        return redirect()->route('admin.faq.index')->with('success', 'FAQ created successfully.');
    }

    // Show the form for editing the specified FAQ
    public function edit($id)
    {
        $faq = FAQ::findOrFail($id); // Ophalen van de specifieke FAQ
        $categories = Category::all(); // Ophalen van categorieën
        return view('admin.faq.edit', compact('faq', 'categories')); // Correcte pad naar de view
    }
    // Update the specified FAQ in storage
    // public function update(Request $request, FAQ $faq)
    // {
    //     $request->validate([
    //         'question' => 'required|string|max:255',
    //         'answer' => 'required|string',
    //         'category_id' => 'required|exists:categories,id',
    //     ]);

    //     $faq->update($request->all());

    //     return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully.');
    // }
    public function update(Request $request, $id)
{
    $faq = FAQ::findOrFail($id); // Ophalen van de FAQ
    $faq->update($request->all()); // Updaten van de data
    return redirect()->route('faq.index')->with('success', 'FAQ succesvol bijgewerkt!');
}


    // Remove the specified FAQ from storage
    // public function destroy(FAQ $faq)
    // {
    //     $faq->delete();

    //     return redirect()->route('admin.faq.index')->with('success', 'FAQ deleted successfully.');
    // }
    public function destroy($id)
{
    $faq = FAQ::findOrFail($id); // Ophalen van de FAQ
    $faq->delete(); // Verwijderen uit de database
    return redirect()->route('faq.index')->with('success', 'FAQ succesvol verwijderd!');
}

}
