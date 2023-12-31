<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Property;
use App\Models\Place;
use App\Notifications\ProductAddedNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\ProductAddedEvent;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate(3);
        $place =  Place::all();
        return view('home.userpage',compact('product','place'));
    }

    public function redirect()
    {
        $user = Auth::user();
        $usertype = $user->usertype;
        $place =  Place::all();
    
        if ($usertype == '1') {
            return view('admin.home');
        } elseif ($user->role === 'buyer') {
            $product = Product::paginate(3);
            return view('home.userpage', compact('product','place'));
        } elseif ($user->role === 'seller') {
            return view('home.seller');
        }
    }
    

    public function product_details ($id)
    {
        $product=product::find($id);
        $user=user::all();
        return view ('home.product_details',compact('product','user'));
    }
    public function redirectToRole(Request $request)
    {
        $role = $request->input('role'); // 'buyer' or 'seller'

        if ($role === 'seller') {
            return view('home.seller');
        } elseif ($role === 'buyer') {
            $product = Product::paginate(3);
            return view('home.userpage', compact('product'));
        }

        // Handle invalid role selection here, e.g., redirect back with an error message
        return back()->with('error', 'Invalid role selection');
    }
    public function view_seller()
    {
        $product=product::all();
        $category=category::all();;
        $places = Place::all();
        return view ('home.view_seller',compact('product','category','places'));
    }
    public function add_product(Request $request)
    {
            $product= new product;
            $product->user_id = $request->input('user_id');
            $product->title=$request->title;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->location=$request->location;
            $product->category=$request->category;
            $product->property_type=$request->property_type;
            $product->lot_area=$request->lot_area;
            $image =$request->image;

            $imagename = time (). '.' .$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);
            $product->image=$imagename;
            
            $product->save();

            

            return redirect()->back()->with('message','Successfully Added');
    }
    public function showProduct($productId)
{
    $product = Product::with('seller')->find($productId);

    if (!$product) {
        // Handle the case where the product doesn't exist
    }

    return view('product.show', compact('product'));
}
public function showProductDetails($productId,Request $request)
{
    // Load the product by ID (assuming you have code for this)
    $product = Product::findOrFail($productId);

    // Get the authenticated user (seller)
    $sellerName = Auth::user()->name;
    $propertyId = $request->input('property_id');
    $property = Property::find($propertyId);
    $inquire = $product->inquire;
     

    return view('product-details', compact('product', 'sellerName','property','inquire'));
}
public function showUserItems()
{
    // Get the authenticated user (assuming you are using the 'auth' middleware)
    $user = Auth::user();

    // Load the user's listed products
    $listedProducts = Product::where('user_id', $user->id)->paginate(10);

    // Load the user's notifications
    $notifications = $user->notifications;

    // Load the user's views (assuming you have a 'views' relationship on the User model)
    $views = $user->views;

    return view('user-items', compact('listedProducts', 'notifications', 'views'));
}
public function view_products ()
{
    $product = Product::paginate(6);
    $place =  Place::all();
    return view('home.view_products', compact('product','place'));
}

public function updateUserRole(Request $request)
{
    $role = $request->input('role'); // 'buyer' or 'seller'
    $user = auth()->user();
    $place =  Place::all();

    // Update the user's role based on the selected role
    if ($role === 'buyer' || $role === 'seller') {
        $user->role = $role;
        $user->save();
    } else {
        // Handle invalid role selection here, e.g., redirect back with an error message
        return back()->with('error', 'Invalid role selection');
    }

    // Redirect the user based on their role
    if ($user->role === 'seller') {
        return view('home.seller');
        
    } else {
        $product = Product::paginate(3);
        return view('home.userpage', compact('product','place'));
    }
}
public function updateOnlineStatus(Request $request)
{
    // Get the currently authenticated user
    $user = Auth::user();

    // Check if the user is authenticated
    if ($user) {
        // Update the "is_online" field to true
        $user->update(['is_online' => true]);
    }
}
public function gotoseller()
{
    $product=product::all();
    $category=category::all();;
    return view ('home.seller',compact('product','category'));
}
public function filter_products(Request $request)
{
    $product = Product::query();

    // Check if a location filter is selected
    if ($request->has('locationFilter')) {
        $locationFilter = $request->input('locationFilter');

        if (!empty($locationFilter)) {
            // Filter products by location
            $product->where('location', $locationFilter);
        }
    }

    
    $allProducts = $product->get();

    // Paginate the filtered products (or all products if no filter is applied)
    $product = $product->paginate(6);

    // Get all locations for the dropdown
    $place = Place::all();

    return view('home.view_products', compact('product', 'place', 'allProducts'));
}


}


