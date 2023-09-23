<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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


}
