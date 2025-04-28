<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile photo.
     */
    public function updatePhoto(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = $request->user();

        // Store the new photo
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($user->photo) {
                Storage::delete($user->photo);
            }

            // Store the new photo and save the path
            $path = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $path;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'photo-updated');
    }

    /**
     * Update the user's address.
     */
    public function updateAddress(Request $request): RedirectResponse
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $user = $request->user();
        $user->address = $request->input('address');
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'address-updated');
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

    public function addAddress(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);
    
        $user = auth()->user();
        $user->addresses()->create([
            'address' => $request->address,
            'is_primary' => false, // Default to false if you want to set a primary address later
        ]);
    
        return redirect()->back()->with('success', 'Address added successfully.');
    }
}