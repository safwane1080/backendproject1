<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
       $user = Auth::user();
       if ($user->birthday) {
        $user->birthday = Carbon::parse($user->birthday);
    }
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    $user = auth()->user(); 
    $validated = $request->validate([
        'username' => 'nullable|string|max:255',
        'birthday' => 'nullable|date',
        'about' => 'nullable|string',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
    ]);

    $user->username = $validated['username'] ?? $user->username;
    $user->birthday = $validated['birthday'] ?? $user->birthday;
    $user->about = $validated['about'] ?? $user->about;

    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        $user->profile_image = $imagePath;
    }

    $user->save();

    return redirect()->route('profile.edit')->with('success', 'Profiel succesvol bijgewerkt!');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show(User $user): View
{
    $profile = $user->profile; 
    return view('profile.show', compact('user'));
}
public function showProfile()
{
    $user = auth()->user(); 
    return view('profile.show', compact('user'));
}
}
