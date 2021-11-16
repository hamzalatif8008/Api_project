<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendororder;
use App\Models\BankAlfa; 
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

 public function store(Request $request){
     if (!Session::has('cart')) {
        return redirect()->route('front.cart')->with('success',"You don't have any product to checkout.");
     }
     $oldCart = Session::get('cart');
     print_r($oldCart); exit;
     $cart = new Cart($oldCart);
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        foreach($cart->items as $key => $prod)
        {
        if($prod['item']['license']!=null && $prod['item']['license_qty']!=null)
        {
            $details1 = explode(',', $prod['item']['license_qty']);
                foreach($details1 as $ttl => $dtl)
                {
                    if($dtl != 0)
                    {
                        $dtl--;
                        $produc = Product::findOrFail($prod['item']['id']);
                        $temp = explode(',', $produc->license_qty);
                        $temp[$ttl] = $dtl;
                        $final = implode(',', $temp);
                        $produc->license_qty = $final;
                        $produc->update();
                        $temp = explode(',,', $produc->license);
                        $license = $temp[$ttl];
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->updateLicense($prod['item']['id'],$license);  
         Session::put('cart',$cart);
                        break;
                    }                    
                }
        }
        }
     $settings = Generalsetting::findOrFail(1);
     $order = new Order;
     $paypal_email = $settings->pb;
     $return_url = action('PaymentController@payreturn');
     $cancel_url = action('PaymentController@paycancle');
     $notify_url = action('PaymentController@notify');

     $item_name = $settings->title." Order";
     $item_number = str_random(4).time();
     $item_amount = $request->total;

     $querystring = '';

     // Firstly Append paypal account to querystring
     $querystring .= "?business=".urlencode($paypal_email)."&";

     // Append amount& currency (£) to quersytring so it cannot be edited in html

     //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
     $querystring .= "item_name=".urlencode($item_name)."&";
     $querystring .= "amount=".urlencode($item_amount)."&";
     $querystring .= "item_number=".urlencode($item_number)."&";

    $querystring .= "cmd=".urlencode(stripslashes($request->cmd))."&";
    $querystring .= "bn=".urlencode(stripslashes($request->bn))."&";
    $querystring .= "lc=".urlencode(stripslashes($request->lc))."&";
    $querystring .= "currency_code=".urlencode(stripslashes($request->currency_code))."&";

     // Append paypal return addresses
     $querystring .= "return=".urlencode(stripslashes($return_url))."&";
     $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
     $querystring .= "notify_url=".urlencode($notify_url)."&";

     $querystring .= "custom=".$request->user_id;
    // Redirect to paypal IPN

                    $order['user_id'] = $request->user_id;
                    $order['cart'] = utf8_encode(gzcompress(serialize($cart), 9));
                    $order['totalQty'] = $request->totalQty;
                    $order['pay_amount'] = round($item_amount / $curr->value, 2);
                    $order['method'] = "Paypal";
                    $order['customer_email'] = $request->email;
                    $order['customer_name'] = $request->name;
                    $order['customer_phone'] = $request->phone;
                    $order['order_number'] = $item_number;
                    $order['shipping'] = $request->shipping;
                    $order['pickup_location'] = $request->pickup_location;
                    $order['customer_address'] = $request->address;
                    $order['customer_country'] = $request->customer_country;
                    $order['customer_city'] = $request->city;
                    $order['customer_zip'] = $request->zip;
                    $order['shipping_email'] = $request->shipping_email;
                    $order['shipping_name'] = $request->shipping_name;
                    $order['shipping_phone'] = $request->shipping_phone;
                    $order['shipping_address'] = $request->shipping_address;
                    $order['shipping_country'] = $request->shipping_country;
                    $order['shipping_city'] = $request->shipping_city;
                    $order['shipping_zip'] = $request->shipping_zip;
                    $order['order_note'] = $request->order_note;
                    $order['coupon_code'] = $request->coupon_code;
                    $order['coupon_discount'] = $request->coupon_discount;
                    $order['payment_status'] = "Pending";
                    $order['currency_sign'] = $curr->sign;
                    $order['currency_value'] = $curr->value;
                    $order['shipping_cost'] = $request->shipping_cost;
                    $order['tax'] = $request->tax;
                    $order['dp'] = $request->dp;
            if (Session::has('affilate')) 
            {
                $val = $request->total / 100;
                $sub = $val * $settings->affilate_charge;
                $user = User::findOrFail(Session::get('affilate'));
                $user->affilate_income = $sub;
                $user->update();
                $order['affilate_user'] = $user->name;
                $order['affilate_charge'] = $sub;
            }
                    $order->save();
                    if($request->coupon_id != "")
                    {
                       $coupon = Coupon::findOrFail($request->coupon_id);
                       $coupon->used++;
                       if($coupon->times != null)
                       {
                            $i = (int)$coupon->times;
                            $i--;
                            $coupon->times = (string)$i;
                       }
                       $coupon->update();

                    }
                    foreach($cart->items as $prod)
                    {
		        $x = (string)$prod['stock'];
		        if($x != null)
		        {
                            $product = Product::findOrFail($prod['item']['id']);
                            $product->stock =  $prod['stock'];
                            $product->update();                
                        }
                    }
                foreach($cart->items as $prod)
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
     Session::forget('cart');

     return redirect('https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
     //header('location:https://www.paypal.com/cgi-bin/webscr'.$querystring);

 }


     public function paycancle(){
         return redirect()->back()->with('unsuccess','Payment Cancelled.');
     }

     public function payreturn(){ 
        if($_GET['RC']==='01'){
            return redirect()->route('paymentpage', $_GET['O'])->with('message', 'State saved correctly!!!');
         
        }
        if($_GET['RC']==='00'){
            $data = ['order_id' =>$_GET['O'],'response' =>"request"];
            $res = BankAlfa::find($_GET['O']);
            if(!$res){
                   BankAlfa::create($data);  
                   Order::where('id',$_GET['O'])->updata(['payment_status'=>'Completed']);
            } 
        }
        return view('payreturn');
     }


public function notify(Request $request){

    $raw_post_data = file_get_contents('php://input');
    $raw_post_array = explode('&', $raw_post_data);
    $myPost = array();
    foreach ($raw_post_array as $keyval) {
        $keyval = explode ('=', $keyval);
        if (count($keyval) == 2)
            $myPost[$keyval[0]] = urldecode($keyval[1]);
    }
    //return $myPost;


    // Read the post from PayPal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    if(function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exists = true;
    }
    foreach ($myPost as $key => $value) {
        if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
            $value = urlencode(stripslashes($value));
        } else {
            $value = urlencode($value);
        }
        $req .= "&$key=$value";
    }

    /*
     * Post IPN data back to PayPal to validate the IPN data is genuine
     * Without this step anyone can fake IPN data
     */
    $paypalURL = "https://www.paypal.com/cgi-bin/webscr";
    $ch = curl_init($paypalURL);
    if ($ch == FALSE) {
        return FALSE;
    }
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

// Set TCP timeout to 30 seconds
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
    $res = curl_exec($ch);

    /*
     * Inspect IPN validation result and act accordingly
     * Split response headers and payload, a better way for strcmp
     */
    $tokens = explode("\r\n\r\n", trim($res));
    $res = trim(end($tokens));
    if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {

        $order = Order::where('user_id',$_POST['custom'])
            ->where('order_number',$_POST['item_number'])->first();
        $data['txnid'] = $_POST['txn_id'];
        $data['payment_status'] = $_POST['payment_status'];
        if($order->dp == 1)
        {
            $data['status'] = 'completed';
        }
        $order->update($data);
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
        Session::forget('cart');
    }else{
        $payment = Order::where('user_id',$_POST['custom'])
            ->where('order_number',$_POST['item_number'])->first();
        $payment->delete();
        Session::forget('cart');

    }

}

public function bankAlfa(Request $request)
{
    $data = ['order_id' =>'5555','response' =>"response"];
  $res = BankAlfa::create($data);
}

public function showBankAlfa(){
    return view('front.alfa'); 
}
public function payment($id){ 
    $order = Order::find($id);
    return view('front.alfa',compact('order')); 
}
public function setCashOnDevlivery($id)
{
    Order::where('id',$id)->update(['method'=>"cash on delivery"]);
    return view('payreturn');
}

}
