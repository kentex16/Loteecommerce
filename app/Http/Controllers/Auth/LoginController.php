<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        // Call the updateOnlineStatus method from HomeController
        app('App\Http\Controllers\HomeController')->updateOnlineStatus($request);

        return redirect()->intended($this->redirectPath());
    }
 
   
}
