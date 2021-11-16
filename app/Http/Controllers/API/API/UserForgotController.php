<?php
namespace App\Http\Controllers\API;
use App\Classes\GeniusMailer;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Generalsetting;

class UserForgotController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
    }

    public function showforgotform()
    {
    	return view('user.forgot');
    }

    public function forgot(Request $request)
    {
     
        $gs = Generalsetting::findOrFail(1);
    	$input =  $request->all();
        if (User::where('email', '=', $request->email)->count() > 0) {
            // user found
            $user = User::where('email', '=', $request->email)->firstOrFail();
            $autopass = str_random(8);
            $input['password'] = bcrypt($autopass);

            $user->update($input);
            $subject = "Reset Password Request";
            $msg = "Your New Password is : ".$autopass;
        if($gs->is_smtp == 1)
        {
            $data = [
                    'to' => $request->email,
                    'subject' => $subject,
                    'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);                
        }
        else
        {
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            mail($request->email,$subject,$msg,$headers);            
        }

            $success['status'] = 1;
         $success['result'] =  'Your Password Reseted Successfully. Please Check your email for new Password.'; 
        return response()->json($success);  
   

        }
        else{
            // user not found
              $success['status'] = 0;
         $success['result'] =  'No Account Found With This Email.'; 
        return response()->json($success); 
         
        }



    }
}
