<?php
namespace App\Http\Controllers\Auth;
use Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Session;
class UserLoginController extends Controller

{
    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
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
           $result = User::where(['email' => $request->email])->first();
           if($result){
            if($result->frenchise_id != 0 && $result->is_vendor != 1 ){
      
                if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
                   if(isset($request->wish))
                    {
                        return redirect()->back();
                    }
                    else if(isset($request->package))
                    {
                        return redirect()->intended(route('user-package'));
                    }
                    else
                    {
                        return redirect()->intended(route('user-dashboard'));
                    }
                }
        
                Session::flash('message',"f");
        
                return redirect()->back()->withInput($request->only('email'));
                }
                else
                {
                    return redirect()->route('message.return')->with('success','Vendor Account Activated Successfully, Please Wait unitill admin approved');
                }

           }else{
            return redirect()->back();
           }


    }


    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }    

}