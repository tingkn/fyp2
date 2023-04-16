<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        return view('users.settings.index');
    }

    public function changeProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);


        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|same:password_confirmation',
        ]);

        // Check current password
        if (Hash::check($request->current_password, auth()->user()->password)) {

            auth()->user()->update([
                'password' => bcrypt($request->password)
            ]);

            return redirect()->back()->with('success', 'Password changed successfully.');

            // dd(1);
        } else {
            // dd(2);
            return redirect()->back()->withErrors(['current_password' => 'Wrong old password.']);
        }
    }

    public function deleteProfile()
    {
        // Delete user avatar if it exists
        if (auth()->user()->avatar) {
            Storage::delete('public/' . auth()->user()->avatar);
        }

        // Delete user record from the database
        auth()->user()->delete();

        // Logout the user
        auth()->logout();

        // Redirect to the home page with a success message
        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}
