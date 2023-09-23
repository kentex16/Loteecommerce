<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquire;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewInquiryNotification;// Assuming you have an Inquiry model

class InquiryController extends Controller
{
    // Show the inquiry form
    public function inquiry_page(){
            $inquire=Inquire::all();  
            $product = Product::all();  
            
            return view('home.inquiry_page',compact('inquire','product'));
        
    }
    public function add_inquiry(Request $request)
    {
        $inquiry = new Inquire;
        
        // Retrieve the product ID from the form
        $productId = $request->input('product_id');
        // Other fields from the form
        $inquiry->id = $request->input('id');
        $inquiry->user_id = $request->user()->id;
        $inquiry->product_id = $productId;
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->purpose = $request->purpose;
        $inquiry->budget = $request->budget;
        $inquiry->contactmethod = $request->contactmethod;
        $agreeToTerms = $request->has('agree_to_terms') ? true : false;
        $inquiry->terms = $agreeToTerms;
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('pdfs', $fileName); 
            $inquiry->file = $fileName;
        }
    
        $inquiry->save();

        $product = Product::find($productId);
        $seller = $product->user; 

        
        $seller->notify(new NewInquiryNotification());
    
        return redirect()->back()->with('message', 'Successfully Added');
    }
    
    public function showInquiries()
    {
        $user = Auth::user();
    

        $products = $user->products;
    
        $inquire = Inquire::all();
    
        return view('home.buyers', compact('products', 'inquire'));
    }
    public function gotoinquiries()
{
    
    $user = Auth::user();

    
    $products = $user->products;

   
    $inquire = Inquire::whereIn('product_id', $products->pluck('id'))->get();

    return view('home.product_inquire', compact('inquire'));
}
public function notifInquire()
{
    
    $user = Auth::user();

    
    $products = $user->products;

   
    $inquire = Inquire::whereIn('product_id', $products->pluck('id'))->get();

    return view('home.product_inquire', compact('inquire'));
}

}
