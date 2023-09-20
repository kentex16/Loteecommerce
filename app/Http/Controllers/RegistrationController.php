<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'usertype' => ['nullable', 'in:0,1'], // Make sure this field is in your registration form
        ]);

        // Determine the usertype based on the selected option
        $usertype = $request->input('usertype');

        // Handle user registration and set the usertype in the database
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'usertype' => $usertype, // Set the usertype based on the selected option
        ]);

        // Redirect or perform any other actions as needed

        // For example, redirect to a success page
        return redirect()->route('registration.success');
    }
    
}

