<?php

namespace App\Http\Controllers;

use App\Classes\GeniusMailer;
use App\Models\Order;
use App\Models\Vendororder;
use App\Models\User;
use App\Models\Generalsetting;
use Illuminate\Http\Request;
use Auth;

class FrenchiseVendorOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:frenchise');
    }

    public function index($uid)
    { 
         
        $orders = Vendororder::where('user_id',$uid)->orderBy('id','desc')->get();
        return view('frenchise.vendororder.index',compact('orders','uid'));
    }
    // public function pending()
    // {
    //     $orders = Order::where('status','=','pending')->get();
    //     return view('admin.order.pending',compact('orders'));
    // }
    // public function processing()
    // {
    //     $orders = Order::where('status','=','processing')->get();
    //     return view('admin.order.processing',compact('orders'));
    // }
    // public function completed()
    // {
    //     $orders = Order::where('status','=','completed')->get();
    //     return view('admin.order.completed',compact('orders'));
    // }
    // public function declined()
    // {
    //     $orders = Order::where('status','=','declined')->get();
    //     return view('admin.order.declined',compact('orders'));
    // }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        return view('frenchise.order.details',compact('order','cart'));
    }

    public function shows($id)
    {
        $user = User::findOrFail($id);
        return view('frenchise.order.detail',compact('user'));
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        return view('frenchise.order.invoice',compact('order','cart'));
    }

    public function emailsub(Request $request)
    {
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

    public function printpage($id)
    {
        $order = Order::findOrFail($id);
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        return view('frenchise.order.print',compact('order','cart'));
    }
    
    public function license(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
        $cart->items[$request->license_key]['license'] = $request->license;
        $order->cart = utf8_encode(gzcompress(serialize($cart), 9));
        $order->update();         
        return redirect()->route('frenchise-order-show',$order->id)->with('success','Successfully Changed The License Key.');
    }

    public function status($id,$status)
    {
        $mainorder = Order::findOrFail($id);
        if ($mainorder->status == "completed"){
            return redirect()->back()->with('success','This Order is Already Completed');
        }else{
        if ($status == "completed"){
            foreach($mainorder->vendororders as $vorder)
            {
                $uprice = User::findOrFail($vorder->user_id);
                $uprice->current_balance = $uprice->current_balance + $vorder->price;
                $uprice->update();
            }
            $gs = Generalsetting::findOrFail(1);
            if($gs->is_smtp == 1)
            {
                $data = [
                    'to' => $mainorder->customer_email,
                    'subject' => 'Your order '.$mainorder->order_number.' is Confirmed!',
                    'body' => "Hello ".$mainorder->customer_name.","."\n Thank you for shopping with us. We are looking forward to your next visit.",
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);                
            }
            else
            {
               $to = $mainorder->customer_email;
               $subject = 'Your order '.$mainorder->order_number.' is Confirmed!';
               $msg = "Hello ".$mainorder->customer_name.","."\n Thank you for shopping with us. We are looking forward to your next visit.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
               mail($to,$subject,$msg,$headers);                
            }
        }
        if ($status == "declined"){
            $gs = Generalsetting::findOrFail(1);
            if($gs->is_smtp == 1)
            {
                $data = [
                    'to' => $mainorder->customer_email,
                    'subject' => 'Your order '.$mainorder->order_number.' is Declined!',
                    'body' => "Hello ".$mainorder->customer_name.","."\n We are sorry for the inconvenience caused. We are looking forward to your next visit.",
                ];
            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);
            }
            else
            {
               $to = $mainorder->customer_email;
               $subject = 'Your order '.$mainorder->order_number.' is Declined!';
               $msg = "Hello ".$mainorder->customer_name.","."\n We are sorry for the inconvenience caused. We are looking forward to your next visit.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
               mail($to,$subject,$msg,$headers);
            }

        }
        $stat['status'] = $status;
        $stat['payment_status'] = ucfirst($status);
        $order = Vendororder::where('order_id','=',$id)->update(['status' => $status]);
        $mainorder->update($stat);
        return redirect()->back()->with('success','Order Status Updated Successfully');
        }
    }

    public function ordersstatus($uid,$status)
    {
         
        $orders = Vendororder::where('user_id','=',$uid)->where('status','=',$status)->orderBy('id','desc')->get();
        
        return view('frenchise.vendororder.index',compact('uid','orders'));
    }

}
