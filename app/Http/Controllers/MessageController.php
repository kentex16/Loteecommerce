<?php

namespace App\Http\Controllers;
use App\Events\MessageEvent;
use Illuminate\Http\Request;
use App\Notifications\InquiryReceived;
use App\Models\Property;


class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Get the property ID from the request
        $propertyId = $request->input('property_id'); // Adjust the input field name as needed
    
        // Assuming you have the message content and property details
        $messageContent = 'I am interested in your property.';
        $property = Property::find($propertyId); // You need to fetch the property using the property ID
    
        // Broadcast the message event to the seller
        event(new MessageEvent([
            'message' => $messageContent,
            'property' => $property,
        ]));
    
        // You can add any additional logic here
    
        return redirect()->back()->with('success', 'Message sent successfully.');
        
    }
    
}
