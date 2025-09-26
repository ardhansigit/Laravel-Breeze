<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoProfileController extends Controller
{
    public function edit()
    {
        return view('infoprofile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'nullable|string|unique:users,username,' . Auth::id(),
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
