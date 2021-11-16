<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FrenchiseLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:frenchise', ['except' => ['logout']]);
    }


 	public function showLoginForm()
    {
      return view('frenchise.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      
		$this->validate($request,[
		    'email' => 'required|email',
		    'password' => 'required',
		]);
      // Attempt to log the user in
      if (Auth::guard('frenchise')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        echo "yeee"; exit;
         return redirect()->intended(route('frenchise-dashboard'));
       }
 
      Session::flash('message',"f");
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('frenchise')->logout();
        return redirect()->route('frenchise-frenchise-login');  
    }  
    
    protected function guard()
    {
        return Auth::guard('frenchise'); 
    }
}
