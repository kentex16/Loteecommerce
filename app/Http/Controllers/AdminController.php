<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Inquire;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();

        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
            $data= new category;
            $data->category_name=$request->category;
            
            $data->save();

            return redirect()->back()->with('message','Successfully Added');
    }
    public function delete_category($id)
    {

        $data=category::find($id);
        $data->delete();

        return redirect()->back()->with('message','Successfully Deleted');
    }
    public function view_product()
    {
        $category=category::all();
        return view ('admin.product',compact ('category'));
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
    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }
    public function delete_product($id)
    {

        $product=product::find($id);
        $product->delete();

        return redirect()->back()->with('message','Successfully Deleted');
    }
    public function update_product($id)
    {
        $product=product::find($id);
        $category=category::all();
        return view('admin.update_product',compact('product','category'));
    }
    public function update_product_confirm (Request $request,$id)
    {
        $product=product::find($id);

        $product->title=$request->title;
       
        $product->description=$request->description;
        $product->price=$request->price;
        $product->location=$request->location;
        $product->category=$request->category;
        $product->property_type=$request->property_type;
        $product->lot_area=$request->lot_area;
        $image=$request->image;
        if($image)
        {
            $imagename = time (). '.' .$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        }
       
        $product->save();
        
        return redirect()->back()->with('message','Successfully Updated');
    }
    
}
