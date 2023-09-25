<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
{
   
}
public function view_profile ()
{
    $user = auth()->user(); 
    
    
    return view('home.profile', compact('user'));
}
public function showProfile()
{
    // Your code to display the user's profile page goes here
    return view('profile');
}

public function uploadProfilePhoto(Request $request)
{
    // Validate the request
    $request->validate([
        'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
    ]);

    
    if ($request->hasFile('profile_photo')) {
        $imagePath = $request->file('profile_photo')->store('profile_photos', 'public'); // Store the uploaded file
        
        // Update the user's profile_photo_url in the database
        Auth::user()->update(['profile_photo_url' => $imagePath]);
    
        // Optionally, you can resize, crop, or manipulate the image as needed
    
        return redirect()->back()->with('success', 'Profile photo uploaded successfully!');
    }

    return redirect()->back()->with('error', 'Error uploading profile photo.');
}

}
