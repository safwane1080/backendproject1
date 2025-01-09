<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;


    
class homeController extends Controller
{
    public function index()
    {
        $categories = Category::with('faqs')->get();

        // Stuur de data naar de view
        return view('home.index', compact('categories'));
        return view('admin.index');
    }


    public function home()
    {
        return view('home.index');
    }

    public function adminDashboard()
    { $users = User::all(); 
        
        return view('admin.index', compact('users'));}
}
