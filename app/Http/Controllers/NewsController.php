<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NewsController;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all(); 
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.news.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'publication_date' => 'required|date',
        ]);
    
        $path = $request->file('image')->store('images', 'public');
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->image = $path;
        $news->publication_date = now();
        $news->save();
        

        return redirect()->route('news.index');

    

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('public/news_images');
        //     $newsItem->image = basename($imagePath);
        // }
        // $newsItem->save();

        
        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem succesvol aangemaakt!');
        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
{
    return view('admin.news.edit', ['news' => $news]);
}

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'publication_date' => 'required|date',
    ]);

    // Update velden
    $news->title = $validatedData['title'];
    $news->content = $validatedData['content'];
    $news->publication_date = $validatedData['publication_date'];

    // Optionele afbeelding uploaden
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('news_images', 'public');
        $news->image = $path;
    }

    $news->save();

    return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem succesvol bijgewerkt!');
}

    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->delete();
    
        return redirect()->route('admin.news.index')->with('success', 'Nieuwsitem succesvol verwijderd.');
    }
    
public function showNewsList()
{
    $news = News::orderBy('publication_date', 'desc')->get();
    return view('news.index', compact('news'));
}
public function showNewsDetail(News $news)
{
    return view('news.show', compact('news'));
}
public function adminIndex()
{
    $news = News::all();
    return view('admin.news.index', compact('news'));
}


}
