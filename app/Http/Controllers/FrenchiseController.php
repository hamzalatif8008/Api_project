<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Vendororder;
use App\Models\Product;
use App\Models\Frenchise; 
use App\Models\UserSubscription; 
use App\Models\Counter; 
use App\Models\User;
use App\Models\Withdraw;
use App\Classes\GeniusMailer;
use App\Models\Generalsetting;
use App\Models\Notification;
use App\Models\FrenchiseNotification;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\VendorSubscription;
use Carbon\Carbon;

use Auth;
use InvalidArgumentException; 

class FrenchiseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:frenchise');
    // }

    public function index()
    {
        
        $vendor = Auth::guard('frenchise')->user()->vendors()->orderBy('id','desc')->get();
        $frenchise = Auth::guard('frenchise')->user(); 
         $vendors = User::where('frenchise_id',$frenchise->id)->get()->pluck('id');
        // print_r($vendors); exit;
         $order   = Vendororder::whereIn('user_id',$vendors)->get(); 
         $count_vendor =  count($vendor);
        $products = Product::whereIn('user_id',$vendors)->get(); 
        $pending = Vendororder::whereIn('user_id',$vendors)->where('status','=','pending')->get();
        $processing = Vendororder::whereIn('user_id',$vendors)->where('status','=','processing')->get();
        $completed = Vendororder::whereIn('user_id',$vendors)->where('status','=','completed')->get();
        $declined = Vendororder::whereIn('user_id',$vendors)->where('status','=','declin')->get();
        $referrals = Counter::where('type','referral')->orderBy('total_count','desc')->take(5)->get();
        $browsers = Counter::where('type','browser')->orderBy('total_count','desc')->take(5)->get();
        $currency_sign = Currency::where('is_default','=',1)->first();
       
        $c_order = VendorOrder::whereIn('user_id',$vendor->pluck('id'))->groupBy('order_id')->get()->pluck('order_id');
        $cust = Order::whereIn('id',$c_order)->groupBy('user_id')->pluck('user_id');
        $customer = Customer::whereIn('id',$cust)->orderBy('id','desc')->get();
        // dd($customer);
    //     $w_completed = Vendororder::whereIn('user_id',$vendors)->where('status','=','completed')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
    //    $w_vendor = Auth::guard('frenchise')->user()->vendors()->orderBy('id','desc')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get()->count();
            
        $days = "";
        $sales = "";
        for($i = 0; $i < 30; $i++) {
            $days .= "'".date("d M", strtotime('-'. $i .' days'))."',";

            $sales .=  "'".Order::where('status','=','completed')->whereDate('created_at', '=', date("Y-m-d", strtotime('-'. $i .' days')))->count()."',";
        } 
        return view('frenchise.index',compact('frenchise','customer','products','currency_sign' ,'count_vendor','pending','processing','declined','completed','referrals','browsers','days','sales'));
    }

    public function account()
    {
        
        $vendor = Auth::guard('frenchise')->user()->vendors()->orderBy('id','desc')->get();
         $frenchise = Auth::guard('frenchise')->user(); 
         $vendors = User::where('frenchise_id',$frenchise->id)->get()->pluck('id');
        // print_r($vendors); exit;
         $order   = Vendororder::whereIn('user_id',$vendors)->get(); 
         $count_vendor =  count($vendor);
        $products = Product::whereIn('user_id',$vendors)->get(); 
        $pending = Vendororder::whereIn('user_id',$vendors)->where('status','=','pending')->get();
        $processing = Vendororder::whereIn('user_id',$vendors)->where('status','=','processing')->get();
        $completed = Vendororder::whereIn('user_id',$vendors)->where('status','=','completed')->get();
        $declined = Vendororder::whereIn('user_id',$vendors)->where('status','=','declin')->get();
        $referrals = Counter::where('type','referral')->orderBy('total_count','desc')->take(5)->get();
        $browsers = Counter::where('type','browser')->orderBy('total_count','desc')->take(5)->get();
        $currency_sign = Currency::where('is_default','=',1)->first();
       
        $c_order = VendorOrder::whereIn('user_id',$vendor->pluck('id'))->groupBy('order_id')->get()->pluck('order_id');
        $cust = Order::whereIn('id',$c_order)->groupBy('user_id')->pluck('user_id');
        $customer = Customer::whereIn('id',$cust)->orderBy('id','desc')->get();
        // dd($customer);
            
        $days = "";
        $sales = "";
        for($i = 0; $i < 30; $i++) {
            $days .= "'".date("d M", strtotime('-'. $i .' days'))."',";

            $sales .=  "'".Order::where('status','=','completed')->whereDate('created_at', '=', date("Y-m-d", strtotime('-'. $i .' days')))->count()."',";
        } 
        return view('frenchise.account',compact('frenchise','customer','products','currency_sign' ,'count_vendor','pending','processing','declined','completed','referrals','browsers','days','sales'));
    }

    public function vendorcustomer()
    {
        $vendor = Auth::guard('frenchise')->user()->vendors()->orderBy('id','desc')->get();
        $c_order = Vendororder::whereIn('user_id',$vendor->pluck('id'))->groupBy('order_id')->get()->pluck('order_id');
        $cust = Order::whereIn('id',$c_order)->groupBy('user_id')->pluck('user_id');
        $customer = Customer::whereIn('id',$cust)->orderBy('id','desc')->get();
        
        // dd($customer);
        return view('frenchise.customerlist',compact('customer'));
    }

    public function customershow($id)
    {
        $user = Customer::findOrFail($id);
        return view('frenchise.details',compact('user'));
    }

    public function regestershop()
    {
        return view('frenchise.vendor.register-shop');
    }

    public function shop_register(Request $request)
    {
        // Validate the form data
        
       // print_r($request->all()); exit;

        $this->validate($request, [
            'email'   => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'shop_name'   => 'unique:users,shop_name',
        ],[ 
          'shop_name.unique' => 'Shop Name "'.$request->shop_name.'" has already been taken. Please choose another name.'
      
        ]);
        $gs = Generalsetting::findOrFail(1);
       
        $user = new User;
        $input = $request->all();
        $input['password'] = bcrypt($request['password']);
        $input['affilate_code'] = $request->name.$request->email;
        $input['name'] = $request->owner_name;
        $input['affilate_code'] = md5($input['affilate_code']);
        $input['is_vendor'] = '2';
        $input['frenchise_id'] = Auth::guard('frenchise')->user()->id;
         
    
        $user->fill($input)->save();
        //Sending Email To Customer
        if($gs->is_smtp == 1)
        {
            $data = [
                'to' => $request->email,
                'type' => "new_registration",
                'cname' => $request->name,
                'oamount' => "",
                'aname' => "",
                'aemail' => "",
            ];
            $mailer = new GeniusMailer();
            $mailer->sendAutoMail($data);
        }

        else
        {
            $to = $request->email;
            $subject = 'Welcome To'.$gs->title;
            $msg = "Hello ".$request->name.","."\n You have successfully registered to ".$gs->title."."."\n We wish you will have a wonderful experience using our service.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
            mail($to,$subject,$msg.$headers);
        }

        $notification = new Notification;
        $notification->user_id = $user->id;
        $notification->save();  

        $frenchisenotification = new FrenchiseNotification;
        $frenchisenotification->user_id = $user->id;
        $frenchisenotification->save();  

        $package = $user->subscribes()->where('status',1)->orderBy('id','desc')->first();
        $subs = VendorSubscription::findOrFail(1);

        $settings = Generalsetting::findOrFail(1);
            $today = Carbon::now()->format('Y-m-d'); 
            $user->is_vendor = 1;
            $user->date = date('Y-m-d', strtotime($today.' + '.$subs->days.' days'));
            $user->mail_sent = 1;     
            $user->save();
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
            
        return redirect()->route('vendor-list')->with('success','You Have Registered Successfully. Please waiting for approval for your Subscription Plan to start selling.');
    }
    
    public function vendorlist()
    {
        $users = Auth::guard('frenchise')->user()->vendors()->orderBy('id','desc')->get();
       // $users = User::where('is_vendor','=',2)->orWhere('is_vendor','=',1)->orderBy('id','desc')->get();
        $pendings = User::where('is_vendor','=',1)->get()->count();
        // echo '<pre>';
        // print_r($pendings); exit;
        return view('frenchise.vendor.list',compact('users','pendings'));
    }

    public function status($id1,$id2) 
    { 
        $user = User::findOrFail($id1);  
        $package = $user->subscribes()->where('status',1)->orderBy('id','desc')->first();
        $subs = VendorSubscription::findOrFail(1);
        $settings = Generalsetting::findOrFail(1);
                    $today = Carbon::now()->format('Y-m-d');   
                  if($id2==1){ $user->is_vendor = 1;}else{
                    $user->is_vendor = 2;  
                  }
                    $user->date = date('Y-m-d', strtotime($today.' + '.$subs->days.' days'));
                    $user->mail_sent = 1;   
                    $user->update(); 
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
        Session::flash('success', 'Vendor Status Upated Successfully.');
        return redirect()->back();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('frenchise.vendor.details',compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('frenchise.vendor.edit',compact('user'));
    }

     
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'shop_name'   => 'unique:users,shop_name,'.$id,
           ],[ 
             'shop_name.unique' => 'Shop Name "'.$request->shop_name.'" has already been taken. Please choose another name.'
           ]);
        $user = User::findOrFail($id);
        $data = $request->all();
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
            $data['photo'] = $name;
        }
        $user->update($data);
        return redirect()->route('vendor-list')->with('success','Vendor Information Updated Successfully.');
    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->is_vendor = 0;
         $user->update();
         Session::flash('success', 'Vendor Removed Successfully');
        return redirect()->route('vendor-list');
    }

    public function withdraws()
    {
        $withdraws = Withdraw::where('type','=','vendor')->orderBy('id','desc')->get();
        $pending = Withdraw::where('status','=','pending')->get()->count();
        return view('frenchise.vendor.withdraws',compact('withdraws','pending'));
    }

    public function withdrawdetails($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        return view('frenchise.vendor.withdraw-details',compact('withdraw'));
    }

    public function accept($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $data['status'] = "completed";
        $withdraw->update($data);

        return redirect()->route('vendor-wt')->with('success','Withdraw Accepted Successfully');
    }

    public function reject($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $account = User::findOrFail($withdraw->user->id);
        $account->current_balance = $account->current_balance + $withdraw->amount + $withdraw->fee;
        $account->update();

        $data['status'] = "rejected";
        $withdraw->update($data);
        return redirect()->route('vendor-wt')->with('success','Withdraw Rejected Successfully');
    }

    public function subs()
    {

        $subs = UserSubscription::where('status','=',1)->orderBy('id','desc')->get();
       
        return view('frenchise.vendor.subscriptions',compact('subs'));
    }

    public function sub($id)
    {
        $subs = UserSubscription::findOrFail($id);
        return view('frenchise.vendor.subdetails',compact('subs'));
    }

    // public function subscription()
    // {
    //     $users = User::where('is_vendor','=',2)->orWhere('is_vendor','=',1)->orderBy('id','desc')->get();
    //     $pendings = User::where('is_vendor','=',1)->get()->count();
    //     // echo '<pre>';
    //     // print_r($pendings); exit;
    //     return view('frenchise.list',compact('users','pendings'));
    // }

   public function profile()
    {
       $frenchise = Auth::guard('frenchise')->user();
        return view('frenchise.profile',compact('frenchise'));
    }

  public function profileupdate(UpdateValidationRequest $request)
    {
        $input = $request->all();  
        $frenchise = Auth::guard('frenchise')->user();        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($frenchise->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$frenchise->photo)) {
                        unlink(public_path().'/assets/images/'.$frenchise->photo);
                    }
                }            
            $input['photo'] = $name;
            } 

        $frenchise->update($input);
        Session::flash('success', 'Successfully updated your profile');
        return redirect()->back();
    }

    public function passwordreset()
    {
        return view('frenchise.reset-password');
    }

    public function changepass(Request $request)
    {
        $frenchise = Auth::guard('frenchise')->user();
        if ($request->cpass){
            if (Hash::check($request->cpass, $frenchise->password)){
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
        $frenchise->update($input);
        Session::flash('success', 'Successfully updated your password');
        return redirect()->back();
    }

    public function accountDetail()
    {
         $frenchise = Auth::guard('frenchise')->user(); 
                                                 
         $vendors = User::where('frenchise_id',$frenchise->id)->get()->pluck('id');
        // print_r($vendors); exit;
         $order   = Order::whereIn('user_id',$vendors)->get();
         $complete=[];
         $pending=[];
         $processing=[];
         $decline=[];
   //      print_r($order); exit;
         foreach($order as $key){
             if($key->status==='completed'){
                $complete[] = $key;
             }elseif($key->status==='pending'){
                $pending[] = $key;
             }elseif($key->status==='decline'){
                $decline[] = $key;
             }else{
                $processing[] = $key;
             }
            
         }
         print_r(count($pending)); exit;
        // $process = $user->orders()->where('status','=','processing')->get()->count();
        // $wishes =$user->wishlists ;
        // $currency_sign = Currency::where('is_default','=',1)->first();
        // return view('user.dashboard',compact('user','complete','process','wishes','currency_sign'));
    }

    public function vendorDashbord($uid)
    {
         
         $vendor   = User::where('id',$uid)->first(); 
         $order    = Vendororder::where('user_id',$uid)->get();
         $products = Product::where('user_id',$uid)->get(); 
        $pending   = Vendororder::where('user_id',$uid)->where('status','=','pending')->get();
        $processing = Vendororder::where('user_id',$uid)->where('status','=','processing')->get();
        $completed  = Vendororder::where('user_id',$uid)->where('status','=','completed')->get();
        $referrals  = Counter::where('type','referral')->orderBy('total_count','desc')->take(5)->get();
        $browsers   = Counter::where('type','browser')->orderBy('total_count','desc')->take(5)->get();
        $currency_sign = Currency::where('is_default','=',1)->first();

        $days = ""; 
        $sales = "";
        for($i = 0; $i < 30; $i++) {
            $days .= "'".date("d M", strtotime('-'. $i .' days'))."',";

            $sales .=  "'".Order::where('status','=','completed')->whereDate('created_at', '=', date("Y-m-d", strtotime('-'. $i .' days')))->count()."',";
        } 
        return view('frenchise.vendor_dashboard',compact('products','currency_sign','pending','processing','completed','referrals','browsers','days','sales','vendor','uid','order'));
    }

    public function social()
    {
        $socialdata = Auth::guard('frenchise')->user();
        return view('frenchise.social',compact('socialdata'));
    }

    public function socialupdate(Request $request)
    {
        $socialdata = Auth::guard('frenchise')->user();
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
        return redirect()->route('frenchise-social-index');
    }
}
