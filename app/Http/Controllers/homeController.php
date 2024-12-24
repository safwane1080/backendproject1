<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

    
class homeController extends Controller
{
    public function index()
    {
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
