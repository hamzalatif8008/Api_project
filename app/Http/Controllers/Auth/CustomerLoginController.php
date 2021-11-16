<?php
namespace App\Http\Controllers\Auth;
use Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
class CustomerLoginController extends Controller

{
    public function __construct()
    {
      $this->middleware('guest:customer', ['except' => ['logout']]);
    }
 	public function showLoginForm()

    {

      return view('user.login');

    }



    public function login(Request $request)

    {

        $this->validate($request,[

            'email' => 'required|email',

            'password' => 'required',

        ]);



        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::guard('customer')->user();
            

            if(isset($request->wish))
             {

                return redirect()->back();

            }

            else if(isset($request->package))

            {

                return redirect()->intended(route('customer-package'));

            }

            else

            {

                return redirect()->intended(route('customer-dashboard'));

            }

        }

        Session::flash('message',"f");

        return redirect()->back()->withInput($request->only('email'));

    }



    public function logout()

    {

        Auth::guard('customer')->logout();

        return redirect('/');

    }    

}