<?php

namespace  App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdminUserConversation;
use App\Models\AdminUserMessage;
use App\Models\Category;
use App\Classes\GeniusMailer;
use App\Models\Conversation;
use App\Models\Review;
use App\Models\Currency;
use App\Models\FavoriteSeller;
use App\Models\Generalsetting;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\Models\Language;
use App\Models\Message;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\VendorSubscription;
use App\Models\User;
use App\Models\UserNotification;
use App\Models\UserSubscription;
use App\Models\Vendororder;
use App\Models\Wishlist;
use Auth;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
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
  

    public function index()
    {
        $user = Auth:: user();
        $orders = Order::where('user_id',$user->id)->orderBy('id','desc')->get();
        $complete = $user->orders()->where('status','=','completed')->get()->count();
        $process = $user->orders()->where('status','=','processing')->get()->count();
        $wishes =$user->wishlists ;
        $currency_sign = Currency::where('is_default','=',1)->first();
        return view('customer.dashboard',compact('user','orders','complete','process','wishes','currency_sign'));
    }

    public function profile()
    {
    	$user = Auth:: user();
        return view('customer.profile',compact('user'));
    }
    public function orders()
    {
        $user = Auth:: user();
        $orders = Order::where('user_id','=',$user->id)->orderBy('id','desc')->get();
        return view('customer.orders',compact('user','orders'));
    }

    public function messages()
    {
        $user = Auth:: user();

            $convs = Conversation::where('sent_user','=',$user->id)->orWhere('recieved_user','=',$user->id)->get();
            return view('customer.messages',compact('user','convs'));            
    }

    public function message($id)
    {
            $user = Auth:: user();
            $conv = Conversation::findOrfail($id);
            return view('customer.message',compact('user','conv'));                 
    }
    public function messagedelete($id)
    {
            $conv = Conversation::findOrfail($id);
            if($conv->messages->count() > 0)
            {
                foreach ($conv->messages as $key) {
                    $key->delete();
                }
            }
            if($conv->notifications->count() > 0)
            {
                foreach ($conv->notifications as $key) {
                    $key->delete();
                }
            }
            $conv->delete();
            return redirect()->back()->with('success','Message Deleted Successfully');                 
    }

    public function postmessage(Request $request)
    {
        $msg = new Message();
        $input = $request->all();  
        $msg->fill($input)->save();
        $notification = new UserNotification;
        $notification->user_id= $request->reciever;
        $notification->conversation_id = $request->conversation_id;
        $notification->save();
        Session::flash('success', 'Message Sent!');
        return redirect()->back();
    }

    public function emailsub(Request $request)
    {
        $user = Auth:: user();
        $gs = Generalsetting::findOrFail(1);
        if($gs->is_smtp == 1)
        {
            $data = [
                    'to' => $request->to,
                    'subject' => $request->subject,
                    'body' => $request->message,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);                
        }
        else
        {
            $data = 0;
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            $mail = mail($request->to,$request->subject,$request->message,$headers);
            if($mail) {   
                $data = 1;
            }
        }

        return response()->json($data);
    }
    public function order($id)
    {
        $user = Auth::guard('user')->user();
        $order = Order::findOrfail($id);
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        
        return view('user.order',compact('user','order','cart'));
    }

    public function orderdownload($slug,$id)
    {
        $user = Auth::guard('user')->user();
        $order = Order::where('order_number','=',$slug)->first();
        $prod = Product::findOrFail($id);
        if(!isset($order) || $prod->type == 0 || $order->user_id != $user->id)
        {
            return redirect()->back();
        }
        return response()->download(public_path('assets/files/'.$prod->file));
    }

    public function orderprint($id)
    {
        $user = Auth::guard('user')->user();
        $order = Order::findOrfail($id);
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        return view('user.print',compact('user','order','cart'));
    }
    public function vendororders()
    {
        $user = Auth::guard('user')->user();
        $orders = Vendororder::where('user_id','=',$user->id)->orderBy('id','desc')->get()->groupBy('order_number');

        return view('user.order.index',compact('user','orders'));
    }

    public function vendorordersstatus($status)
    {
        $user = Auth::guard('user')->user();
        $orders = Vendororder::where('user_id','=',$user->id)->where('status','=',$status)->orderBy('id','desc')->get()->groupBy('order_number');

        return view('user.order.index',compact('user','orders'));
    }

    public function vendorlicense(Request $request, $slug)
    {
        $order = Order::where('order_number','=',$slug)->first();
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        $cart->items[$request->license_key]['license'] = $request->license;
        $order->cart = utf8_encode(bzcompress(serialize($cart), 9));
        $order->update();         
        return redirect()->route('vendor-order-show',$order->order_number)->with('success','Successfully Changed The License Key.');
    }
    public function vendororder($slug)
    {
        $user = Auth::guard('user')->user();
        $order = Order::where('order_number','=',$slug)->first();
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        return view('user.order.details',compact('user','order','cart'));
    }
    public function invoice($slug)
    {
        $user = Auth::guard('user')->user();
        $order = Order::where('order_number','=',$slug)->first();
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        return view('user.order.invoice',compact('user','order','cart'));
    }
    public function printpage($slug)
    {
        $user = Auth::guard('user')->user();
        $order = Order::where('order_number','=',$slug)->first();
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        return view('user.order.print',compact('user','order','cart'));
    }
    public function status($slug,$status)
    {
        $mainorder = Vendororder::where('order_number','=',$slug)->first();
        if ($mainorder->status == "completed"){
            return redirect()->back()->with('success','This Order is Already Completed');
        }else{

        $user = Auth::guard('user')->user();
        $order = Vendororder::where('order_number','=',$slug)->where('user_id','=',$user->id)->update(['status' => $status]);
        return redirect()->route('vendor-order-index')->with('success','Order Status Updated Successfully');
    }
    }
    public function resetform()
    {
        $user = Auth:: user();
        return view('customer.reset',compact('user'));
    }

    public function shop()
    {
        $user = Auth::guard('user')->user();
        return view('user.shop-description',compact('user'));
    }

    public function shopup(Request $request)
    {
        $input = $request->all();  
        $user = Auth::guard('user')->user();
        $user->update($input);
        Session::flash('success', 'Successfully updated the data');
        return redirect()->back();
    }


    public function ship()
    {
        $user = Auth::guard('user')->user();
        return view('user.ship',compact('user'));
    }

    public function affilate_code()
    {
        $user = Auth::guard('user')->user();
        return view('user.affilate_code',compact('user'));
    }
    public function shipup(Request $request)
    {
        $input = $request->all();  
        $user = Auth::guard('user')->user();
        $user->update($input);
        Session::flash('success', 'Successfully updated the data');
        return redirect()->back();
    }

    public function reset(Request $request)
    {
        $input = $request->all();  
        $user = Auth:: user();
         if($user->is_provider == 1)
         {
            return redirect()->back();
         }
        if ($request->cpass){
            if (Hash::check($request->cpass, $user->password)){
                if ($request->newpass == $request->renewpass){
                    $input['password'] = Hash::make($request->newpass);
                }else{
                    Session::flash('unsuccess', 'Confirm password does not match.');
                    return redirect()->back();
                }
            }else{
                Session::flash('unsuccess', 'Current password Does not match.');
                return redirect()->back();
            }
        }
        $user->update($input);
        Session::flash('success', 'Successfully updated your password');
        return redirect()->back();
    }


    public function package()
    {
        $user = Auth::guard('user')->user();
        $subs = VendorSubscription::all();
        $package = $user->subscribes()->where('status',1)->orderBy('id','desc')->first();
        return view('user.package',compact('user','subs','package'));
    }


    public function vendorrequest($id)
    {
       // echo 'ddddddddddd'; exit;
        $subs = VendorSubscription::findOrFail($id);
        $gs = Generalsetting::findOrfail(1);
        $user = Auth:: user();
        $package = $user->subscribes()->where('status',1)->orderBy('id','desc')->first();
    
        if($gs->reg_vendor != 1)
        {
            return redirect()->back();
        }
        
        return view('user.vendor-request',compact('user','subs','package'));
    }

    public function vendorrequestsub(StoreValidationRequest $request)
    {
        $this->validate($request, [
            'shop_name'   => 'unique:users',
           ],[ 
               'shop_name.unique' => 'This shop name has already been taken.'
            ]);
        $user = Auth::guard('user')->user();
        $package = $user->subscribes()->where('status',1)->orderBy('id','desc')->first();
        $subs = VendorSubscription::findOrFail($request->subs_id);
        $settings = Generalsetting::findOrFail(1);
                    $today = Carbon::now()->format('Y-m-d');
                    $input = $request->all();  
                    $user->is_vendor = 2;
                    $user->date = date('Y-m-d', strtotime($today.' + '.$subs->days.' days'));
                    $user->mail_sent = 1;     
                    $user->update($input);
                    $sub = new UserSubscription;
                    $sub->user_id = $user->id;
                    $sub->subscription_id = $subs->id;
                    $sub->title = $subs->title;
                    $sub->currency = $subs->currency;
                    $sub->currency_code = $subs->currency_code;
                    $sub->price = $subs->price;
                    $sub->days = $subs->days;
                    $sub->allowed_products = $subs->allowed_products;
                    $sub->details = $subs->details;
                    $sub->method = 'Free';
                    $sub->status = 1;
                    $sub->save();
                    if($settings->is_smtp == 1)
                    {
                    $data = [
                        'to' => $user->email,
                        'type' => "vendor_accept",
                        'cname' => $user->name,
                        'oamount' => "",
                        'aname' => "",
                        'aemail' => "",
                    ];    
                    $mailer = new GeniusMailer();
                    $mailer->sendAutoMail($data);        
                    }
                    else
                    {
                    $headers = "From: ".$settings->from_name."<".$settings->from_email.">";
                    mail($user->email,'Your Vendor Account Activated','Your Vendor Account Activated Successfully. Please Login to your account and build your own shop.',$headers);
                    }

                    return redirect()->route('user-dashboard')->with('success','Vendor Account Activated Successfully');

    }
    public function profileupdate(UpdateValidationRequest $request)
    { 
        $input = $request->all();
        $user = Auth:: user();
        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);
            if($user->photo != null)
            {
                    if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                        unlink(public_path().'/assets/images/'.$user->photo);
                    }
            }
            $input['photo'] = $name;
        }
        $user->update($input);
        $language = Language::find(1);
        Session::flash('success', $language->success);
        return redirect()->route('customer-profile');
    }

    public function wishlists()
    {
        $user = Auth::user();
        $wishes = Wishlist::where('user_id','=',$user->id)->get();
      
        if(count($wishes)==0)  
        {
         
          return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'No product Found',
            'user' => $user,
            
            
          ]);
        }
        foreach($wishes as $wish)
        {
            $wish->product=Product::find($wish->product_id);
        }
    
        return response()->json([
            'status_code' => 200,
            'status' => 1,
            'wishlist'=>$wishes,
            'user' => $user,
          
      
          ]);
        
    }

    public function wishlist_add(Request $request)
    {
        $validator=  $request->validate([
            'product_id' => 'required', 
          ]);
        $user = Auth::user();
        
        $wishes = Wishlist::where('user_id','=',$user->id)->where('product_id',$request->product_id)->first();
       
        if($wishes)  
        {
            Wishlist::where('id',$wishes->id)->delete();
         
          return response()->json([
            'status_code' => 500,
            'status' => 2,
            'message' => 'Product is Removed From Wishlist',
            'user' => $user,
            
            
          ]);
        }

     $wish=new Wishlist;
     $wish->user_id=$user->id;
     $wish->product_id=$request->product_id;  
     $wish->save();

    
        return response()->json([
            'status_code' => 200,
            'status' => 1,
            'message' => 'Product is Added into  Wishlist',
            'wishlist'=>$wish,
            'product'=>Product::find($wish->product_id),
            'user' => $user,
          
      
          ]);
        
    }

    public function favorites()
    {
        $user = Auth:: user();
        $favorites = FavoriteSeller::where('user_id','=',$user->id)->get();
        if(count($favorites)==0)  
        {
         
         
          return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'No seller is favorite',
         
            
            
          ]);
        }
        foreach($favorites as $fav)
        {
            $fav->seller=User::find($fav->vendor_id);
        }

    
        return response()->json([
            'status_code' => 200,
            'status' => 1,
            'message' => 'Favorite Sellers',
            'favorite'=>$favorites,
          
          
      
          ]);
    }

    public function delete($id)
    {
        $gs = Generalsetting::findOrfail(1);
        $wish = Wishlist::findOrFail($id);
        $wish->delete();
        return redirect()->route('customer-wishlist')->with('success',$gs->wish_remove);
    }

    public function favdelete($id)
    {
        $gs = Generalsetting::findOrfail(1);
        $wish = FavoriteSeller::findOrFail($id);
        $wish->delete();
        return redirect()->route('customer-favorites')->with('success','Successfully Removed The Seller.');
    }
    public function rating(Request $request)
    {
        $validator=  $request->validate([
            'rating' => 'required|lte:5', 
            'product_id' => 'required', 
           
          ]);
          $user = Auth::user();
        
          $review = Review::where('user_id','=',$user->id)->where('product_id',$request->product_id)->first();
         
          if($review)  
          {
           
            $review->review=$request->review;
            $review->rating=$request->rating;  
            $review->save();
            $product=Product::find($review->product_id);
         
            $total = Review::where('product_id',$request->product_id)->count();
            $totalrate=Review::where('product_id',$request->product_id)->sum('rating');
            return $total;
            if($total>0)
            {
                $product->total_rating=round($totalrate/$total,2);
                $product->total_reviews=$total;
            }
           
            return response()->json([
              'status_code' => 200,
              'status' => 2,
              'message' => 'Review is updated',
              'review' => $review,
              'product'=>$product,
              
              
            ]);
          }
  
       $wish=new Review;
       $wish->user_id=$user->id;
       $wish->product_id=$request->product_id;
       $wish->review=$request->review;
       $wish->rating=$request->rating;  

       $wish->save();
       $product=Product::find( $wish->product_id);
       $total = Review::where('product_id',$request->product_id)->count();
       $totalrate=Review::where('product_id',$request->product_id)->sum('rating');
       if($total>0)
       {
           $product->total_rating=round($totalrate/$total,2);
           $product->total_reviews=$total;
       }
  
      
          return response()->json([
              'status_code' => 200,
              'status' => 1,
              'message' => 'Product Review is Added',
              'review'=>$wish,
              'product'=> $product,
            ]);
    }

    public function wishlist(Request $request)
    {
        $sort = '';
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
        $user = Auth:: user();
        $wishes = Wishlist::where('user_id','=',$user->id)->pluck('product_id');
        $wproducts = Product::whereIn('id',$wishes)->whereBetween('cprice', [$min, $max])->orderBy('id','desc')->paginate(9);
        return view('customer.wishlist',compact('user','wishes','wproducts','sort','min','max'));
        }
        $user = Auth:: user();
        $wishes = Wishlist::where('user_id','=',$user->id)->get();//->pluck('product_id');
       // $wproducts = Product::whereIn('id',$wishes)->orderBy('id','desc')->paginate(9);
       
        return view('customer.wishlist',compact('user','wishes','sort'));
    }

    public function wishlistsort($sorted)
    {
        $sort = $sorted;
        $user = Auth:: user();
        $wishes = Wishlist::where('user_id','=',$user->id)->pluck('product_id');
        if($sort == "new")
        {
        $wproducts = Product::whereIn('id',$wishes)->orderBy('id','desc')->paginate(9);
        }
        else if($sort == "old")
        {
        $wproducts = Product::whereIn('id',$wishes)->paginate(9);
        }
        else if($sort == "low")
        {
        $wproducts = Product::whereIn('id',$wishes)->orderBy('cprice','asc')->paginate(9);
        }
        else if($sort == "high")
        {
        $wproducts = Product::whereIn('id',$wishes)->orderBy('cprice','desc')->paginate(9);
        }
        return view('front.wishlist',compact('user','wproducts','sort'));
    }

    public function social()
    {
        $socialdata = Auth::guard('user')->user();
        return view('user.social',compact('socialdata'));
    }

     public function favoriteSeller_add(Request $request)
    {
        $validator=  $request->validate([
            'seller_id' => 'required', 
          ]);
        $user = Auth::user();
        $favorites = FavoriteSeller::where('user_id','=',$user->id)->where('vendor_id',$request->seller_id)->first();
       
        if($favorites)  
        {
            FavoriteSeller::where('id',$favorites->id)->delete();
         
          return response()->json([
            'status_code' => 200,
            'status' => 2,
            'message' => 'Seller is Removed From Favorites',
            'user' => $user,
            
            
          ]);
        }

     $fav=new FavoriteSeller;
     $fav->user_id=$user->id;
     $fav->vendor_id=$request->seller_id;  
     $fav->save();

    
        return response()->json([
            'status_code' => 200,
            'status' => 1,
            'message' => 'Seller is Added into  Favorite list',
            'favorite'=>$fav,
            'seller'=>User::find($fav->vendor_id),
            'user' => $user,
          
      
          ]);
        
    }


    public function socialupdate(Request $request)
    {
        $socialdata = Auth::guard('user')->user();
        $input = $request->all();
        if ($request->f_check == ""){
            $input['f_check'] = 0;
        }
        if ($request->t_check == ""){
            $input['t_check'] = 0;
        }

        if ($request->g_check == ""){
            $input['g_check'] = 0;
        }

        if ($request->l_check == ""){
            $input['l_check'] = 0;
        }

        $socialdata->update($input);
        Session::flash('success', 'Social links updated successfully.');
        return redirect()->route('user-social-index');
    }
    //Send email to user
    public function usercontact(Request $request)
    {
        $data = 1;
        $user = User::findOrFail($request->user_id);
        $vendor = User::where('email','=',$request->email)->first();
        if(empty($vendor))
        {
            $data = 0;
            return response()->json($data);   
            
        }

        $subject = $request->subject;
        $to = $vendor->email;
        $name = $request->name;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nMessage: ".$request->message;
        $gs = Generalsetting::findOrfail(1);
        if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $vendor->email,
            'subject' => $request->subject,
            'body' => $msg,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);
        }
        else
        {
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
        mail($to,$subject,$msg,$headers);
        }

        $conv = Conversation::where('sent_user','=',$user->id)->where('subject','=',$subject)->first();
        if(isset($conv)){
            $msg = new Message();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->sent_user = $user->id;
            $msg->save();
            return response()->json($data);   
        }
        else{
            $message = new Conversation();
            $message->subject = $subject;
            $message->sent_user= $request->user_id;
            $message->recieved_user = $vendor->id;
            $message->message = $request->message;
            $message->save();
        $notification = new UserNotification;
        $notification->user_id= $vendor->id;
        $notification->conversation_id = $message->id;
        $notification->save();
            $msg = new Message();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->sent_user = $request->user_id;;
            $msg->save();
            return response()->json($data);   
        }
    }
    public function adminmessages()
    {
            $user = Auth:: user();
            $convs = AdminUserConversation::where('user_id','=',$user->id)->get();
            return view('customer.message.index',compact('convs'));            
    }

    public function adminmessage($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            return view('customer.message.create',compact('conv'));                 
    }   
    public function adminmessagedelete($id)
    {
            $conv = AdminUserConversation::findOrfail($id);
            if($conv->messages->count() > 0)
            {
                foreach ($conv->messages as $key) {
                    $key->delete();
                }
            }
            if($conv->notifications->count() > 0)
            {
                foreach ($conv->notifications as $key) {
                    $key->delete();
                }
            }
            $conv->delete();
            return redirect()->back()->with('success','Message Deleted Successfully');                 
    }
    public function adminpostmessage(Request $request)
    {
        $msg = new AdminUserMessage();
        $input = $request->all();  
        $msg->fill($input)->save();
        $notification = new Notification;
        $notification->conversation_id = $msg->conversation->id;
        $notification->save();
        Session::flash('success', 'Message Sent!');
        return redirect()->back();
    }

    public function adminusercontact(Request $request)
    {
        $data = 1;
        $user = Auth::guard('user')->user();        
        $gs = Generalsetting::findOrFail(1);
        $subject = $request->subject;
        $to = $gs->email;
        $from = $user->email;
        $msg = "Email: ".$from."\nMessage: ".$request->message;
        if($gs->is_smtp == 1)
        {
            $data = [
            'to' => $to,
            'subject' => $subject,
            'body' => $msg,
        ];

        $mailer = new GeniusMailer();
        $mailer->sendCustomMail($data);
        }
        else
        {
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
        mail($to,$subject,$msg,$headers);
        }

    $conv = AdminUserConversation::where('user_id','=',$user->id)->where('subject','=',$subject)->first();
        if(isset($conv)){
            $msg = new AdminUserMessage();
            $msg->conversation_id = $conv->id;
            $msg->message = $request->message;
            $msg->user_id = $user->id;
            $msg->save();
            return response()->json($data);   
        }
        else{
            $message = new AdminUserConversation();
            $message->subject = $subject;
            $message->user_id= $user->id;
            $message->message = $request->message;
            $message->save();
        $notification = new Notification;
        $notification->conversation_id = $message->id;
        $notification->save();
            $msg = new AdminUserMessage();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->user_id = $user->id;
            $msg->save();
            return response()->json($data);   

        }
}
}

