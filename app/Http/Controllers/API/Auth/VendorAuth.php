<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use Auth;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserSendCode;
use Carbon\Carbon;

class VendorAuth extends Controller
{
    //
public function userlogin(Request $request)
{
    // dd($password = Hash::make($request->input('password')));
  try {
    $request->validate([
      'email' => 'email|required',
      'password' => 'required'
    ]);
    $credentials = request(['email', 'password']);
   
   // return Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password]);
    if (!Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
      return response()->json([
        'status_code' => 500,
        'status' => 0,
        'message' => 'Unauthorized'
      ]);
    }
    $user = User::where('email', $request->email)->first();

    if ( ! Hash::check($request->password, $user->password, [])) {
     // if(!Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){
       throw new \Exception('Error in Login');
    }
  
    $tokenResult = $user->createToken('authToken')->plainTextToken;
    return response()->json([
      'status_code' => 200,
      'status' => 1,
      'access_token' => $tokenResult,
      'token_type' => 'Bearer',
      'user' => $user,
    ]);
  } catch (Exception $error) {
    return response()->json([
        'status_code' => 500,
        'status' => 0,
        'message'=>'Invalid Username or Password',
      ]);
  }
}

public function register(Request $request) 
{ 

    $validator=  $request->validate([
        'name' => 'required', 
        'email' => 'required|email|unique:customers', 
        'password' => 'required', 
        'c_password' => 'required|same:password',
      ]);
    // $validator = Validator::make($request->all(), [ 
        
    // ]);
$input = $request->all(); 
    $input['password'] = bcrypt($input['password']); 
    $user =User::create($input); 
    //$user= User::create($request->getAttributes())->sendEmailVerificationNotification();
    if (!$user) {
        return response()->json([
            'status_code' => 500,
            'status' => 0,
            'user' => $user,
          ]);
     }
     $tokenResult = $user->createToken('authToken')->plainTextToken;
     return response()->json([
       'status_code' => 200,
       'status' => 1,
       'access_token' => $tokenResult,
       'token_type' => 'Bearer',
       'user' => $user,
     ]);
}
/** 
 * details api 
 * 
 * @return \Illuminate\Http\Response 
 */ 
public function details() 
{ 
    $user = Auth::user();
    if (!$user) {
        return response()->json([
            'status_code' => 500,
            'status' => 0,
            'user' => $user,
          ]);
     }
    return response()->json([
        'status_code' => 200,
        'status' => 1,
        'user' => $user,
      ]); 
   
}
public function userchangepassword(Request $request)
{
  $user = Auth::user();
  try {
    $data=$request->validate([
      'password' => 'required',
      'new_password' => 'required', 
      'c_new_password' => 'required|same:new_password',
    ]);
    if (!Hash::check($data['password'], $user->password)) {
      return response()->json([
        'status_code' => 500,
        'status' => 0,
        'message' => 'WrongPassword'
      ]);
    }
    $input['password'] = bcrypt($data['new_password']); 
    $user =User::where('id',$user->id)->update($input); 
    return response()->json([
      'status_code' => 200,
      'status' => 1,
      'message' => 'password has been changed'

    ]);
  } catch (Exception $error) {
    return response()->json([
        'status_code' => 500,
        'status' => 0,
        'user' => $user,
      ]);
  }
}

public function userforgetpassword(Request $request)
{
  try {
    $validator=  $request->validate([
      'email' => 'required|email', 
    ]);
    $user=User::where('email',$request->input('email'))->first();
   
    if (!$user) {
      return response()->json([
        'status_code' => 500,
        'status' => 0,
        'message' => 'WrongEmail'
      ]);
    }
   
        $expire = Carbon::now()->addMinute(5);    
       $check=$user;
       while($check)
       {
        $code=mt_rand(1000, 9999);
        $check=User::where('forgetpasswordcode',$code)->first();
       }
      $user->forgetpasswordcode = $code;
      $user->codeexpireat = $expire;
      $user->save();

    Mail::to($user->email)->send(new UserSendCode($code)); 
    return response()->json([
      'status_code' => 200,
      'status' => 1,
      'message' => 'code has been sent to your email',

    ]);
  } catch (Exception $error) {
    return response()->json([
        'status_code' => 500,
        'status' => 0,
        'user' => $user,
      ]);
  }

}

public function userentercode(Request $request)
{
  try {
    $validator=  $request->validate([
      'email' => 'required|email', 
      'code' => 'required', 
    ]);
    $user=User::where('email',$request->input('email'))->where('forgetpasswordcode',$request->input('code'))->first();
    if (!$user) {
      return response()->json([
        'status_code' => 500,
        'status' => 0,
        'message' => 'WrongCode'
      ]);
    }
   
        $now = Carbon::now();
        if($now>$user->codeexpireat)  
        {
         
          return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'Your Code has been expire please click on resend button to receive a fresh code',
          ]);
        } 
  
    return response()->json([
      'status_code' => 200,
      'status' => 1,
      'message' => 'verified your code please inter new password',

    ]);
  } catch (Exception $error) {
    return response()->json([
        'status_code' => 500,
        'status' => 0,
        'user' => $user,
      ]);
  }

}

public function userchangeaddress(Request $request)
{
  $user = Auth::user();
  $validator=  $request->validate([
    'address' => 'required', 
  ]);
    if (!$user) {
        return response()->json([
            'status_code' => 500,
            'status' => 0,
            'user' => $user,
          ]);
     }
     $user->address = $request->input('address');
     $user->save();
     
    return response()->json([
        'status_code' => 200,
        'status' => 1,
        'user' => $user,
      ]); 
   
}



// public function verify($user_id, Request $request) {
//   if (!$request->hasValidSignature()) {
//       return response()->json(["msg" => "Invalid/Expired url provided."], 401);
//   }
//   $user = User::findOrFail($user_id);
//   if (!$user->hasVerifiedEmail()) {
//       $user->markEmailAsVerified();
//   }
//   return redirect()->to('/');
// }

// public function resend() {
//   if (auth()->user()->hasVerifiedEmail()) {
//       return response()->json(["msg" => "Email already verified."], 400);
//   }

//   auth()->user()->sendEmailVerificationNotification();

//   return response()->json(["msg" => "Email verification link sent on your email id"]);
// }




}
