<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //
    public function updateRole(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'usertype' => 'required|in:user,admin',
        ]);
    
        $user = User::findOrFail($validated['user_id']);
        $user->usertype = $validated['usertype'];
        $user->save();
    
        return redirect()->back()->with('success', 'User role updated successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'usertype' => 'required|in:user,admin',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->usertype = $validated['usertype'];
        $user->save();

        return redirect()->back()->with('success', 'New user created successfully!');
    }
}

