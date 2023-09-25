<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->input('email'),
        ]);

        // Increment the subscriber count or perform any other actions as needed

        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}
