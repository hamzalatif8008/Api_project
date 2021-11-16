<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\User;
use App\Models\Frenchise;
use App\Models\Currency;
use App\Models\Vendororder;
use Illuminate\Http\Request;
use Auth;

class AdminFrenchiseProductController extends Controller
{
   
    public function frenchiseProductIndex($fid)
    {
        $fids = Frenchise::findOrfail($fid);
        $uid =  $fids->vendors()->orderBy('id','desc')->get()->pluck('id');
        $cats = Category::all();
        $prods = Product::whereIn('user_id',$uid)->orderBy('id','desc')->get();
        $sign = Currency::where('is_default','=',1)->first();
        return view('admin.product.index',compact('prods','cats','sign','uid')); 
    }

    public function vendorProductIndex($id)
    {

        $cats = Category::all();
        $prods = Product::where('user_id',$id)->orderBy('id','desc')->get();
        $sign = Currency::where('is_default','=',1)->first();
        return view('admin.product.index',compact('prods','cats','sign')); 
    }

    public function vendorProductDeactive($id)
    {
         
        $prods = Product::where('user_id',$id)->where('status','=',0)->get();
        $sign = Currency::where('is_default','=',1)->first();
        return view('admin.product.deactive',compact('prods','sign'));
    }

    public function frenchiseordersstatus($status, $fid)
    {
        
        // $fids = Frenchise::findOrfail($fid);
        // $uid =  $fids->vendors()->orderBy('id','desc')->get()->pluck('id');
         $orders = Order::where('id',$fid)->where('status','=',$status)->orderBy('id','desc')->get();
         
        return view('admin.frenchise.vendororder.index',compact('orders'));
    }

    public function vendorlist($fid)
    {
        $fids = Frenchise::findOrfail($fid);
        $users =  $fids->vendors()->orderBy('id','desc')->get();
        $pendings = User::where('is_vendor','=',1)->get()->count();
        // $users = Auth::guard('admin')->user()->vendors()->orderBy('id','desc')->get();
        // $users = User::where('is_vendor','=',2)->orWhere('id',$uid)->orderBy('id','desc')->get();
        return view('admin.frenchise.vendor-list',compact('users','pendings'));
    }
}
