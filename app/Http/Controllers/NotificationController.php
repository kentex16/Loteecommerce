<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InquiryReceived;
use App\Models\Property;

class NotificationController extends Controller
{
    public function fetch(Request $request)
    {
        $user = Auth::user();
        $notifications = $user->notifications;
    
        return response()->json(['notifications' => $notifications]);
    }
    public function sendNotification(Request $request)
{
    // Validate and process the request, and send the notification
    $productId = $request->input('product_id');
    
    // Perform actions to send the notification here, e.g., to the seller
    
    return response()->json(['success' => true]);
}
}