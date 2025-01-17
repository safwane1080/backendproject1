<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Ingelogde gebruiker ophalen
        
        // Ophalen van categorieën uit de database
        $categories = Category::with('faqs')->get(); // Zorg ervoor dat het model 'Category' bestaat

        // Data doorgeven aan de view
        return view('dashboard.index', compact('categories'));
    }
}
