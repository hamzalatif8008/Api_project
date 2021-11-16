<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Models\Advertise;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Childcategory;
use App\Classes\GeniusMailer;
use App\Models\Compare;
use App\Models\Conversation;
use App\Models\Counter;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Faq;
use Exception;
use App\Models\Generalsetting;
use App\Models\Image;
use App\Models\Language;
use App\Models\Message;
use App\Models\VendorSubscription;
use App\Models\Notification;
use App\Models\FrenchiseNotification;
use App\Models\Order;
use App\Models\Page;
use App\Models\Pagesetting;
use App\Models\PaymentGateway;
use App\Models\Pickup;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\ProductClick;
use App\Models\Review;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserSubscription;
use App\Models\UserNotification;
use App\Models\Vendororder;
use Auth;
use App\Models\Customer;
use stdClass;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;


use DB;

use Validator;

class CustomerOrderController extends Controller
{
   public function cashondelivery(Request $request)
    {
      
       try {
        $customer=Auth::user();
        if(!$customer)
        {
            return response()->json(['status'=>0,'message'=>"unauthorized"]);
        }
            $validator = Validator::make($request->all(), [ 
            'cart' => 'required', 
            'email' => 'required|email'  
        ]);
        if ($validator->fails()) { 
            return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
        }
             $input = $request->input();

              $cart1   = array();
              $appcart = $input['cart'];  
              $appg    = json_decode($appcart);
                
             $i=0;
             foreach ($appg as $key) {
                 
                  $cart1[$i]['qty'] = $key->qty; 
                  $cart1[$i]['user_id'] = $key->user_id; 
                  $cart1[$i]['color'] = null;//$key->color; 
                  $cart1[$i]['price'] = $key->cprice; 
                  $cart1[$i]['photo'] = $key->photo; 
                  $cart1[$i]['measure'] = null;//$key->measure; 
                  $cart1[$i]['size']  = null;//$key->size; 
                  $cart1[$i]['stock'] = $key->stock; 
                  $cart1[$i]['item']  = $key->id; 
                  $i++;
             }
               // print_r($cart1); exit;
             $grandtotal=0;
             $grandqty=0;
             foreach ($cart1 as $key => $value ) {
                  $grandtotal+=$value['price'];
                  $grandqty+=$value['qty'];
                  $cart1[$key]['item']=Product::where('id','=',$value['item'])->first();
                 
              } 
        $oldCart = new stdClass();
        $oldCart->items = $cart1;
               
        $oldCart->totalQty = $grandqty;
        $oldCart->totalPrice = $grandtotal; 
        $cart=new Cart($oldCart); 
     
        if(!$cart)
        {
            return response()->json(['status'=>0,'result'=>'cart is empty']);
        }
       
        $gs = Generalsetting::findOrFail(1);
        $order = new Order;
        $item_name = $gs->title." Order";
        $item_number = str::random(4).time();
        $order['user_id'] = $customer->id;
        $order['cart'] = utf8_encode(gzcompress(serialize($cart), 9));
     
        $order['totalQty'] = $oldCart->totalQty;

        $order['pay_amount'] = round($oldCart->totalPrice, 2); 
        $order['method'] = null; 
        $order['customer_email'] = $input['email'];
        $order['customer_name'] = $input['name'];
        $order['shipping_cost'] = 0;
        
        $order['tax'] = 0;
        $order['order_note'] = $request->order_notes;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = str::random(4).time();
        $order['customer_address'] = $input['address'];//$request->address;
        $order['customer_country'] = $input['country'];//$request->country;
        $order['customer_city'] = $input['city'];//$request->city;
        $order['customer_zip'] = $input['zip'];//$request->zip;

        $order['dp'] = 1;
        $order['payment_status'] = "Pending";

        $order['currency_value'] = 1; 
        $order->save(); 
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();

        foreach($cart->items as $prod)
        { 

            if($prod['item']['user_id'] != 0)
            {
                $vorder =  new Vendororder;
                $vorder->order_id = $order->id;
                $vorder->user_id  = $prod['item']['user_id']; 
                $vorder->qty   = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->order_number = $order->order_number;             
                $vorder->save(); 
            }

        } 
        if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $input['email'],
            'type' => "new_order",
            'cname' => $input['name'],
            'oamount' =>  $oldCart->totalPrice,
            'aname' => "",
            'aemail' => "",
            'wtitle' => "",
        ];

        $mailer = new GeniusMailer();


        $mailsent=$mailer->sendAutoMail($data); 
                   
        }
        else
        {
           $to = $input['email'];
           $subject = "Your Order Placed!!";
           $msg = "Hello ".$input['name']."!\nYou have placed a new order. Please wait for your delivery. \nThank you.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
           mail($to,$subject,$msg,$headers);            
        }
        //Sending Email To Admin
        if($gs->is_smtp == 1)
        {
            $data = [
                'to' => $gs->email,
                'subject' => "New Order Recieved!!",
                'body' => "Hello Admin!<br>Your store has received a new order. Please login to your panel to check. <br>Thank you.",
            ];

            $mailer = new GeniusMailer();
            $ml=$mailer->sendCustomMail($data);            
        }
        else
        {
           $to = $gs->email;
           $subject = "New Order Recieved!!";
           $msg = "Hello Admin!\nYour store has recieved a new order. Please login to your panel to check. \nThank you.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
          $ml= mail($to,$subject,$msg,$headers);
        }

        if($ml)
        {
            $response['status_code']=200;
            $response['status']=1;
            $response['data']=$ml;
            $response['order']=$order;
            return response()->json($response);
        }
        else
        {
            $response['result']=0;
            $response['data']=$ml;
   
            return response()->json($response);
        }
    } catch (Exception $error) {
        return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message'=>'Exception',
          ]);
      }
}

 public function cashondelivery2(Request $request)
    {
      
       try {
        $customer=Auth::user();
        if(!$customer)
        {
            return response()->json(['status'=>0,'message'=>"unauthorized"]);
        }
            $validator = Validator::make($request->all(), [ 
            'cart' => 'required', 
            'email' => 'required|email'  
        ]);
        if ($validator->fails()) { 
            return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
        }
             $input = $request->input();

              $cart1   = array();
              $appcart = $input['cart'];  
              $appg    = json_decode($appcart);
                
             $i=0;
             foreach ($appg as $key) {
                 
                  $cart1[$i]['qty'] = $key->qty; 
                  $cart1[$i]['user_id'] = $key->user_id; 
                  $cart1[$i]['color'] =  $key->color; 
                  $cart1[$i]['price'] = $key->cprice; 
                  $cart1[$i]['photo'] = $key->photo; 
                  $cart1[$i]['measure'] =  $key->measure; 
                  $cart1[$i]['size']  =  $key->size; 
                  $cart1[$i]['stock'] = $key->stock; 
                  $cart1[$i]['item']  = $key->id; 
                  $i++;
             }
               // print_r($cart1); exit;
             $grandtotal=0;
             $grandqty=0;
             foreach ($cart1 as $key => $value ) {
                  $grandtotal+=$value['price'];
                  $grandqty+=$value['qty'];
                  $cart1[$key]['item']=Product::where('id','=',$value['item'])->first();
                 
              } 
        $oldCart = new stdClass();
        $oldCart->items = $cart1;
               
        $oldCart->totalQty = $grandqty;
        $oldCart->totalPrice = $grandtotal; 
        $cart=new Cart($oldCart); 
     
        if(!$cart)
        {
            return response()->json(['status'=>0,'result'=>'cart is empty']);
        }
       
        $gs = Generalsetting::findOrFail(1);
        $order = new Order;
        $item_name = $gs->title." Order";
        $item_number = str::random(4).time();
        $order['user_id'] = $customer->id;
        $order['cart'] = utf8_encode(gzcompress(serialize($cart), 9));
     
        $order['totalQty'] = $oldCart->totalQty;

        $order['pay_amount'] = round($oldCart->totalPrice, 2); 
        $order['method'] = null; 
        $order['customer_email'] = $input['email'];
        $order['customer_name'] = $input['name'];
        $order['shipping_cost'] = 0;
        
        $order['tax'] = 0;
        $order['order_note'] = $request->order_notes;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = str::random(4).time();
        $order['customer_address'] = $input['address'];//$request->address;
        $order['customer_country'] = $input['country'];//$request->country;
        $order['customer_city'] = $input['city'];//$request->city;
        $order['customer_zip'] = $input['zip'];//$request->zip;

        $order['dp'] = 1;
        $order['payment_status'] = "Pending";

        $order['currency_value'] = 1; 
        $order->save(); 
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();

        foreach($cart->items as $prod)
        { 

            if($prod['item']['user_id'] != 0)
            {
                $vorder =  new Vendororder;
                $vorder->order_id = $order->id;
                $vorder->user_id  = $prod['item']['user_id']; 
                $vorder->qty   = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->order_number = $order->order_number;             
                $vorder->save(); 
            }

        } 
        if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $input['email'],
            'type' => "new_order",
            'cname' => $input['name'],
            'oamount' =>  $oldCart->totalPrice,
            'aname' => "",
            'aemail' => "",
            'wtitle' => "",
        ];

        $mailer = new GeniusMailer();


        $mailsent=$mailer->sendAutoMail($data); 
                   
        }
        else
        {
           $to = $input['email'];
           $subject = "Your Order Placed!!";
           $msg = "Hello ".$input['name']."!\nYou have placed a new order. Please wait for your delivery. \nThank you.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
           mail($to,$subject,$msg,$headers);            
        }
        //Sending Email To Admin
        if($gs->is_smtp == 1)
        {
            $data = [
                'to' => $gs->email,
                'subject' => "New Order Recieved!!",
                'body' => "Hello Admin!<br>Your store has received a new order. Please login to your panel to check. <br>Thank you.",
            ];

            $mailer = new GeniusMailer();
            $ml=$mailer->sendCustomMail($data);            
        }
        else
        {
           $to = $gs->email;
           $subject = "New Order Recieved!!";
           $msg = "Hello Admin!\nYour store has recieved a new order. Please login to your panel to check. \nThank you.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
          $ml= mail($to,$subject,$msg,$headers);
        }

        if($ml)
        {
            $response['status_code']=200;
            $response['status']=1;
            $response['data']=$ml;
            $response['order']=$order;
            return response()->json($response);
        }
        else
        {
            $response['result']=0;
            $response['data']=$ml;
   
            return response()->json($response);
        }
    } catch (Exception $error) {
        return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message'=>'Exception',
          ]);
      }
}


    public function orderbycash($id)
    {
         $order =  Order::where('id',$id)->update(['method'=>'Cash On Delivery']);
          if($order)
          {
            return response()->json(['status'=>1,'result'=>'congratulations ']); 
        }else{
            return response()->json(['status'=>0,'result'=>'some thing went wrong']); 
        }
           
           
    }


    public function cashondeliveryoldd(Request $request)
    {
        $customer=Auth::user();
        if(!$customer)
        {
            return response()->json(['status'=>0,'message'=>"unauthorized"]);
        }
            $validator = Validator::make($request->all(), [ 
            'cart' => 'required', 
            'email' => 'required|email'  
        ]);
        if ($validator->fails()) { 
            return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
        }
             $input = $request->input();

             $cart1 = $input['cart'];
	         $grandtotal=0;
	         $grandqty=0;
	         foreach ($cart1 as $key => $value ) {
	         $grandtotal+=$cart1[$key]['total'];
	         $grandqty+=$cart1[$key]['qty'];
             $cart1[$key]['item']=Product::where('id','=',$value['item'])->first();
        }
        
        $object = new stdClass();
        $object->items = $cart1;
        $object->totalQty = $grandqty;
        $object->totalPrice = $grandtotal;
  
     
        $cart=new Cart($object);
     
        if(!$cart)
        {
            return response()->json(['status'=>0,'result'=>'cart is empty']);
        }
       
        $gs = Generalsetting::findOrFail(1);
        $order = new Order;
        $item_name = $gs->title." Order";
        $item_number = str_random(4).time();
        $order['user_id'] = $customer->id;
        $order['cart'] = utf8_encode(bzcompress(serialize($cart), 9)); 

        $order['totalQty'] = $object->totalQty;

        $order['pay_amount'] = round($object->totalPrice, 2);
       //print_r($order['pay_amount']); exit;
        $order['method'] = "Cash On Delivery";
        // $order['shipping'] = $request->shipping;
        // $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['shipping_cost'] = 200;
        
        $order['tax'] = 0;
        $order['order_note'] = $request->order_notes;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = str_random(4).time();
        $order['customer_address'] = $request->address;
        $order['customer_country'] = $request->country;
        $order['customer_city'] = $request->city;
        $order['customer_zip'] = $request->zip;

        $order['dp'] = 1;
        $order['payment_status'] = "Pending";

        $order['currency_value'] = 1;

        $order->save();
        
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();

        foreach($cart['items'] as $prod)
        {
            if($prod['item']['user_id'] != 0)
            {
                $vorder =  new Vendororder;
                $vorder->order_id = $order->id;
                $vorder->user_id = $prod['item']['user_id'];
                $vorder->qty = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->order_number = $order->order_number;             
                $vorder->save();
            }

        }

        if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $request->email,
            'type' => "new_order",
            'cname' => $request->name,
            'oamount' =>  $object->totalPrice,
            'aname' => "",
            'aemail' => "",
            'wtitle' => "",
        ];

        $mailer = new GeniusMailer();


        $mailsent=$mailer->sendAutoMail($data); 
                   
        }
        else
        {
           $to = $request->email;
           $subject = "Your Order Placed!!";
           $msg = "Hello ".$request->name."!\nYou have placed a new order. Please wait for your delivery. \nThank you.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
           mail($to,$subject,$msg,$headers);            
        }
        //Sending Email To Admin
        if($gs->is_smtp == 1)
        {
            $data = [
                'to' => $gs->email,
                'subject' => "New Order Recieved!!",
                'body' => "Hello Admin!<br>Your store has received a new order. Please login to your panel to check. <br>Thank you.",
            ];

            $mailer = new GeniusMailer();
            $ml=$mailer->sendCustomMail($data);            
        }
        else
        {
           $to = $gs->email;
           $subject = "New Order Recieved!!";
           $msg = "Hello Admin!\nYour store has recieved a new order. Please login to your panel to check. \nThank you.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
          $ml= mail($to,$subject,$msg,$headers);
        }

        if($ml)
        {
        	$response['result']=1;
            $response['data']=$ml;
            $response['order']=$order;
        	return response()->json($response);
        }
        else
        {
        	$response['result']=0;
            $response['data']=$ml;
   
        	return response()->json($response);
        }
    }

    public function phone_edit(Request $request)
    {
        $validator =$request->validate([
             'phone'=>'required',
        ]);
     
        $userId=Auth::user()->id;
        if(!$userId)
        {
                
        return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message'=>'Not login',
          ]);   
        }
        $customer=Customer::where('id',$userId)->first();
        $customer->phone=$request->phone;
        $customer->save();
           
        return response()->json([
            'status_code' => 200,
            'status' => 1,
            'message'=>'name is updated',
            'customer'=>$customer,
          ]);  
    }
    


public function userdata($id)
{

    $userId=$id;
    $user=User::find($userId);
    $user->image_path= asset('assets/images/').'/'.$user->photo;
    if($user)
    {

        $result['status']=1;
        $result['result']=$user;
        return response()->json($result); 
    }
    else{
        $result['status']=0;
        $result['result']=$user;
        return response()->json($result);
    }
}
public function gender_edit(Request $request)
{
    $validator = Validator::make($request->all(), [ 
        'gender' => 'required', 
        'user_id' => 'required'  
    ]);
    if ($validator->fails()) { 
       
        return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
    }
    $data1 = $request->input();
    if($data1['gender']==1)
    {
        $data1['gender']='Male';
    }
    elseif($data1['gender']==2){
        $data1['gender']='Female';
    }
    else{
        $result['status']=1;
        $result['result']='invalid gender selection';
        return response()->json($result);
    }
    $data= array(
                'gender'=>$data1['gender']
    );
    $userId=$data1['user_id'];
    $flg=User::where('id',$userId)->update($data);
    $user=User::find($userId);
    //$user->image_path= asset('images').'/user/'.$user->u_image;
    if($flg)
    {

        $result['status']=1;
        $result['result']=$user;
        return response()->json($result); 
    }
    else{
        $result['status']=0;
        $result['result']=$user;
        return response()->json($result);
    }
}

public function dob_edit(Request $request)
{
    $validator = Validator::make($request->all(), [ 
        'dob' => 'required', 
        'user_id' => 'required'  
    ]);
    if ($validator->fails()) { 
       
        return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
    }
    $data1 = $request->input();
    $data= array(
                'dob'=>$data1['dob']
    );
    $userId=$data1['user_id'];
    $flg=User::where('id',$userId)->update($data);
    $user=User::find($userId);
    //$user->image_path= asset('images').'/user/'.$user->u_image;
    if($flg)
    {

        $result['status']=1;
        $result['result']=$user;
        return response()->json($result); 
    }
    else{
        $result['status']=0;
        $result['result']=$user;
        return response()->json($result);
    }
}

public function photo_edit(Request $request)
{

    $data = $request->validate([ 
        'photo' => 'required|image', 
        
    ]);
  
    if ($file = $request->file('photo')) 
        {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
        }
    else
    {
    
        return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message'=>'please select the photo'
          ]);  
    }  


    $userId=Auth::user()->id;
    $customer=Customer::where('id',$userId)->first();
    $customer->photo=$name;
    $customer->save();

    $customer->image_path= asset('assets/images/').'/'.$customer->photo;
       
    return response()->json([
        'status_code' => 200,
        'status' => 1,
        'message'=>'photo is updated successfully',
        'customer'=>$customer,
      ]);  
   
}

public function name_edit(Request $request)
{
    $validator =$request->validate([
         'name'=>'required',
    ]);
 
    $userId=Auth::user()->id;
    if(!$userId)
    {
            
    return response()->json([
        'status_code' => 500,
        'status' => 0,
        'message'=>'Not login',
      ]);   
    }
    $customer=Customer::where('id',$userId)->first();
    $customer->name=$request->name;
    $customer->save();
       
    return response()->json([
        'status_code' => 200,
        'status' => 1,
        'message'=>'name is updated',
        'customer'=>$customer,
      ]);  
}

public function password_edit(Request $request)
{
    $validator = Validator::make($request->all(), [ 
        'password' => 'required', 
        'user_id' => 'required'  
    ]);
    if ($validator->fails()) { 
       
        return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
    }
    $data1 = $request->input();
    $data= array(
                'password_api'=>md5($data1['password']),
                'password'=>bcrypt($data1['password'])
    );
    $userId=$data1['user_id'];
    $flg=User::where('id',$userId)->update($data);
    $user=User::find($userId);
    //$user->image_path= asset('images').'/user/'.$user->u_image;
    if($flg)
    {

        $result['status']=1;
        $result['result']=$user;
        return response()->json($result); 
    }
    else{
        $result['status']=0;
        $result['result']=$user;
        return response()->json($result);
    } 
}

public function address_edit(Request $request)
{
    $validator = Validator::make($request->all(), [ 
        'address' => 'required', 
        'user_id' => 'required'  
    ]);
    if ($validator->fails()) { 
       
        return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
    }
    $data1 = $request->input();
    $data= array(
                'address'=>$data1['address']
                
    );
    $userId=$data1['user_id'];
    $flg=User::where('id',$userId)->update($data);
    $user=User::find($userId);
    //$user->image_path= asset('images').'/user/'.$user->u_image;
    if($flg)
    {

        $result['status']=1;
        $result['result']=$user;
        return response()->json($result); 
    }
    else{
        $result['status']=0;
        $result['result']=$user;
        return response()->json($result);
    } 

}
 public function profile_update(Request $request)
    {
        try {
            $request->validate([
              'full_name' => 'required',
              'phone' => 'required|min:11|numeric',
            ]);
            $customer=Customer::find(Auth::user()->id);
           
            if (!$customer) {
              return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'Unauthorized'
              ]);
            }
          
          $customer->phone=$request->phone;
          $customer->name=$request->full_name;
          $customer->save();

            return response()->json([
              'status_code' => 200,
              'status' => 1,
              'message' => 'Profile is updated',
              'customer' => $customer,
            ]);
          } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message'=>'Exception',
              ]);
          }
        
    }

public function check_password(Request $request)
{
    $data = $request->input();
    //print_r($data); exit;
    $flg=User::where('id',$data['user_id'])->first();
    //print_r($flg->password); exit;
    if(Hash::check($flg->password, $data['password']))
    {
        // The passwords match..
        print_r('password matched'); 
    }
    else{
        print_r('not matched');
    }
}

public function searchs(Request $request)
{
   $sort = "";
   $validator = Validator::make($request->all(), [ 
    'search' => 'required',   
    ]);
    if ($validator->fails()) { 
    
        return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
    }
   $search=$request->search;
   $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')
            ->paginate(9);
    if (!empty($request->min) || !empty($request->max)) {
       (int)$min =$request->min/160.5;
        (int)$max =$request->max/160.1;
        $sproducts = Product::where('status', '=', 1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min,$max])->orderBy('cprice', 'asc')->paginate(9);
    }
    if(count($sproducts)!=0)
    {
        foreach($sproducts as $pro)
        {
            $pro->image_url=asset('assets/images/').'/'.$pro->photo;
        }
    }

    

    if(count($sproducts)!=0)
    {

        $result['status']=1;
        $result['result']=$sproducts;
        return response()->json($result); 
    }
    else{
        $result['status']=0;
        $result['result']=$sproducts;
        return response()->json($result);
    } 
   
}

public function faq()
{
    $ps = Pagesetting::findOrFail(1);
		if($ps->f_status == 0){
			return redirect()->route('front.index');
		}
        $fq = Faq::orderBy('id','desc')->first();
        $id1 = $fq->id;
        $faqs = Faq::where('id','<',$id1)->orderBy('id','desc')->get();
        if($fq)
        {
    
            $result['status']=1;
            $result['fq']=$fq;
            $result['faqs']=$faqs;
            return response()->json($result); 
        }
        else{
            $result['status']=0;
            $result['fq']=$fq;
            $result['faqs']=$faqs;
            return response()->json($result);
        } 

}


public function user_pending_orders($id)
{
   
        $pending = Order::where('user_id','=',$id)->where('status','=','pending')->orderBy('id','desc')->get();
        $tobeshipped = Order::where('user_id','=',$id)->where('status','=','processing')->orderBy('id','desc')->get();
        $shipped = Order::where('user_id','=',$id)->where('status','=','completed')->orderBy('id','desc')->get();
        $disputed = Order::where('user_id','=',$id)->where('status','=','declined')->orderBy('id','desc')->get();
        if($pending)
        {
    
            $result['status']=1;
            $result['pending']=$pending;
            $result['tobeshipped']=$tobeshipped;
            $result['shipped']=$shipped;
            $result['disputed']=$disputed;
            return response()->json($result); 
        }
        else{
            $result['status']=0;
            $result['result']=$pending;
            return response()->json($result);
        }
    
}

 public function order($oid,$uid)
    {
        if(!empty($oid) && !empty($uid))
        {
          $user = User::findOrfail($uid); 
          $order = Order::findOrfail($oid);
          $cart = unserialize(bzdecompress(utf8_decode($order->cart)));
          
        if($user && $order)
        {
            
            $result['status']=1;
            $result['user']=$user;
            $result['order']=$order;
            $zz = unserialize(bzdecompress(utf8_decode($order->cart)));
            
            $i=0;
          foreach($cart->items as $product)
          {
              
              $cart1[$i]['id']=$product['item']['id'];
              $cart1[$i]['name']=$product['item']['name'];
              $cart1[$i]['price']=$product['price'];
              $cart1[$i]['qty']=$product['qty'];
              $cart1[$i]['ptotal']=$product['total'];
              $cart1[$i]['color']=$product['color'];
              $cart1[$i]['size']=$product['size'];
              $i++;

          }

        }
        if($cart1)
        {
             $result['status']=1;
            $result['user']=$user;
            $result['order']=$order;
            $result['cart']=$cart1;
            return response()->json($result);
        }
        else{
            $result['status']=0;
            $result['user']=$user;
            $result['order']=$order;
   
            return response()->json($result);
        }
        }
        else
        {
           $result['status']=0;
           $result['msg']='please login first';
            return response()->json($result); 
        }
        
        
 
    }

    public function user_orders()
{
    $id=Auth::user()->id;
    if(!$id)
    {
        return response()->json([
              'status_code' => 500,
              'status' => 0,
              'message' => 'Unauthorized',
            ]); 
    }
   
          $orders = Order::where('user_id','=',$id)->orderBy('id','desc')->get(); 
          foreach ($orders as $order) {
                     $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
                     $i=0;
                      foreach($cart->items as $product)
                      {
                          
                          $cart1[$i]['id']=$product['item']['id'];
                          $cart1[$i]['name']=$product['item']['name'];
                          $cart1[$i]['price']=$product['price'];
                          $cart1[$i]['qty']=$product['qty'];
                          // $cart1[$i]['photo']=$product['photo'];
                          // $cart1[$i]['measure']=$product['measure'];
                          $cart1[$i]['ptotal']=$product['qty']*$product['price'];
                          $cart1[$i]['color']=$product['color'];
                          $cart1[$i]['size']=$product['size'];
                          $i++; 
                      }
                      $order->cart = $cart1;
          }
        if (!count($orders)) {
            return response()->json([
              'status_code' => 500,
              'status' => 0,
              'message' => 'NO Data Found'
            ]);
          }
          return response()->json([
            'status_code' => 200,
            'status' => 1,
            'message' => 'User Orders',
            'orders' => $orders,
          ]);
    
}

public function order_details(Request $request)
    {
        $id=$request->order_id;
         $order = Order::findOrFail($id);
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));


        // return $cart;
          // try {
            $request->validate([
              'order_id' => 'required',
            ]);
            $oid=$request->order_id;
          $user = Customer::find(Auth::user()->id); 
          $order = Order::find($oid);

          if (!$user||!$order) {
            return response()->json([
              'status_code' => 500,
              'status' => 0,
              'message' => 'Unauthorized or Invalid Order Id',
            ]);
          }
          $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
         $i=0;
          foreach($cart->items as $product)
          {
              
              $cart1[$i]['id']=$product['item']['id'];
              $cart1[$i]['name']=$product['item']['name'];
              $cart1[$i]['price']=$product['price'];
              $cart1[$i]['qty']=$product['qty'];
              $cart1[$i]['ptotal']=$product['qty']*$product['price'];
              $cart1[$i]['color']=$product['color'];
              $cart1[$i]['size']=$product['size'];
              $cart1[$i]['photo']=isset($product['photo'])?$product['photo']:null;
              $i++;

          }

        if($cart1)
        {
            return response()->json([
                'status_code' => 200,
                'status' => 1,
                'message' => 'User Order Details',
                'customer' => $user,
                'order' => $order,
                'orderProducts' => $cart1,
              ]);

        }
        else{
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'no Product found',
              ]);
        }
    // } catch (Exception $error) {
    //     return response()->json([
    //         'status_code' => 500,
    //         'status' => 0,
    //         'message'=>'Exception',
    //       ]);
    //   }
       
   }

}
