<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Andere methoden van de LoginController

    protected function authenticated(Request $request, $user)
    {
        // Redirect naar het dashboard na succesvolle login
        return redirect()->route('dashboard');
    }
}
