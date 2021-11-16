<?php

namespace App\Http\Controllers\Json;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Compare;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\FavoriteSeller;
use App\Models\Gallery;
use App\Models\Generalsetting;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Country;
use App\Models\Order;
use App\Models\Page;
use App\Models\PaymentGateway;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
use App\Models\UserNotification;
use App\Models\FrenchiseNotification;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Session;
Use App\Models\Notification;
use App\Models\User;

class JsonRequestController extends Controller
{
    public function conv_notf()
    {
        $data = Notification::where('user_id','=',Auth::guard('user')->user()->id)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function conv_notf_clear()
    {
        $data = Notification::where('user_id','=',Auth::guard('user')->user()->id);
        $data->delete();             
    }  
    public function conv_notf1()
    {
        $data = UserNotification::where('conversation_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function conv_notf_clear1()
    {
        $data = UserNotification::where('conversation_id','!=',null);
        $data->delete();               
    }  
    public function order_notf()
    {
        $data = Notification::where('order_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function order_notf1()
    {
        $data = UserNotification::where('order_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function fre_order_notf()
    {
        $data = FrenchiseNotification::where('order_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function order_notf_clear()
    {
        $data = Notification::where('order_id','!=',null);
        $data->delete();             
    }  
    public function order_notf_clear1()
    {
        $data = UserNotification::where('order_id','!=',null);
        $data->delete();             
    }  
    public function fren_order_notf_clear()
    {
        $data = FrenchiseNotification::where('order_id','!=',null);
        $data->delete();             
    }  
    public function product_notf()
    {
        $data = Notification::where('product_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function product_notf1()
    {
        $data = UserNotification::where('product_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function fren_product_notf()
    {
        $data = FrenchiseNotification::where('product_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    }
    public function product_notf_clear()
    {
        $data = Notification::where('product_id','!=',null);
        $data->delete();             
    }  
    public function product_notf_clear1()
    {
        $data = UserNotification::where('product_id','!=',null);
        $data->delete();             
    }  
    public function fren_product_notf_clear()
    {
        $data = FrenchiseNotification::where('product_id','!=',null);
        $data->delete();             
    }  
    public function user_notf()
    {
        $data = Notification::where('user_id','!=',null)->orWhere('vendor_id','!=',null)->where('is_read','=',0)->get()->count();
        return response()->json($data);            
    } 
    public function user_notf_clear()
    {
        $data = Notification::where('user_id','!=',null)->orWhere('vendor_id','!=',null);
        $data->delete();        
    } 

    public function fren_notf()
    {
        $vendor = Auth::guard('frenchise')->user()->vendors()->orderBy('id','desc')->get()->pluck('id');

        $data = FrenchiseNotification::whereIn('user_id',$vendor)->get()->count();
        return response()->json($data);            
    } 
    public function fren_notf_clear()
    {
        $data = FrenchiseNotification::where('user_id','!=',null);
        $data->delete();        
    } 
    public function pos()
    {
        $pos = $_GET['pos'];
        $pages = Page::all();
        foreach ($pages as $page) {
            $pgs[] = $page->id;
        }
        foreach(array_combine($pgs,$pos) as $page => $psn)
        {
            $pg = Page::findOrFail($page);
            $pg->pos = $psn;
            $pg->update();
        }

        return response()->json($pgs);            
    } 
    public function trans()
    {
        $id = $_GET['id'];
        $trans = $_GET['tin'];
        $order = Order::findOrFail($id);
        $order->txnid = $trans;
        $order->update();
        $data = $order->txnid;
        return response()->json($data);            
    }  
    public function transhow()
    {
        $id = $_GET['id'];
        $pay = PaymentGateway::findOrFail($id);
        return response()->json($pay->text);

       
    }  

    public function coupon()
    {
        $code = $_GET['code'];
        $total = $_GET['total'];
        $fnd = Coupon::where('code','=',$code)->get()->count();
        if($fnd < 1)
        {
        return response()->json(0);              
        }
        else{
        $coupon = Coupon::where('code','=',$code)->first();
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        if($coupon->times != null)
        {
            if($coupon->times == "0")
            {
                return response()->json(0);                
            }
        }
        $today = (int)date('d');
        $from = (int)date('d',strtotime($coupon->start_date));
        $to = (int)date('d',strtotime($coupon->end_date));
        if($from <= $today && $to >= $today)
        {
            if($coupon->status == 1)
            {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $val = Session::has('already') ? Session::get('already') : null;
                if($val == $code)
                {
                    return response()->json(2); 
                }
                $cart = new Cart($oldCart);
                if($coupon->type == 0)
                {
                    Session::put('already', $code);
                    $coupon->price = (int)$coupon->price;
                    $val = $total / 100;
                    $sub = $val * $coupon->price;
                    $total = $total - $sub;
                    $data[0] = round($total,2);
                    $data[1] = $code;      
                    $data[2] = round($sub, 2);
                    $data[3] = $coupon->id;
                    $data[4] = $coupon->price."%";
                    $data[5] = 1;
                    return response()->json($data);   
                }
                else{
                    Session::put('already', $code);
                    $total = $total - round($coupon->price * $curr->value, 2);
                    $data[0] = round($total,2);
                    $data[1] = $code;
                    $data[2] = round($coupon->price * $curr->value, 2);
                    $data[3] = $coupon->id;
                    $data[4] = $curr->sign;
                    $data[5] = 1;
                    return response()->json($data);              
                }
            }
            else{
                    return response()->json(0);   
            }              
        }
        else{
        return response()->json(0);             
        }
        }         
    }  

    public function subcats()
    {
        $id = $_GET['id'];
        $subcats = Subcategory::where('category_id','=',$id)->get();
        return response()->json($subcats);            
    }  
    public function city()
    {
        $id = $_GET['admin_name'];
        // dd($id);
        $cities = Country::where('admin_name','=',$id)->get();
        return response()->json($cities);            
    }  

    public function childcats()
    {
        $id = $_GET['id'];
        $childcats = Childcategory::where('subcategory_id','=',$id)->get();
        return response()->json($childcats);            
    }    

    public function addcart()
    {
        $id = $_GET['id'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock','type','file','link','license','license_qty','measure']);
        if($prod->license_qty != null)
        {
        $lcheck = 1;
        $details1 = explode(',', $prod->license_qty);
            foreach($details1 as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }


        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($prod, $prod->id);
        if($cart->items[$id]['stock'] < 0)
        {
            return 0;
        }
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;
        $data[1] = $cart->items;
        $data[2] = count($cart->items);        
        return response()->json($data);           
    }  


    public function quick()
    {
        $id = $_GET['id'];
        $prod = Product::findOrFail($id);
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }
        $data[0] = $prod->photo; 
        $data[1] = $prod->name;  
        $data[2] = $prod->cprice;  
        $data[3] = $prod->pprice;
        $data[4] = substr(strip_tags($prod->description),0,300);  
        $data[5] = (string)$prod->stock;
        if($prod->size != null)
        {
        $data[6] = (explode(",",$prod->size));
        }
        else
        {
        $data[6] = null;
        }
        if($prod->color != null)
        {
        $data[8] = (explode(",",$prod->color));
        }
        else
        {
        $data[8] = null;
        }
        $data[7] = $prod->id;
        $data[9] = $prod->type;
        return response()->json($data);           
    }  

    public function feature()
    {
        $id = $_GET['id'];
        $prod = Product::findOrFail($id);
        $data[0] = $prod->featured; 
        $data[1] = $prod->best;  
        $data[2] = $prod->top;  
        $data[3] = $prod->hot;
        $data[4] = $prod->latest;  
        $data[5] = $prod->deal_of_the_day;
        $data[6] = $prod->festival;
        $data[7] = $prod->id;
        $data[8] = strlen($prod->name) > 30 ? substr($prod->name, 0, 30) : $prod->name;
        return response()->json($data);           
    }  

    public function vendor_feature()
    {
        $id = $_GET['id'];
        $user = User::findOrFail($id);
        $data[0] = $user->brand; 
        $data[1] = $user->top;  
        $data[2] = $user->top_by_category;  
        $data[3] = $user->nav_shop;
        $data[4] = $user->top_rated;  
        $data[5] = $user->id;
        $data[6] = strlen($user->name) > 30 ? substr($user->name, 0, 30) : $user->name;
        $data[7] = $user->coming_shop; 
        // $data[8] = $user->wholesaler; 
        return response()->json($data);           
    } 
    public function gallery()
    {
        $data[0] = 0;
        $id = $_GET['id'];
        $prod = Product::findOrFail($id);
        if(count($prod->galleries))
        {
            $data[0] = 1;
            $data[1] = $prod->galleries;
        }
        return response()->json($data);              
    }  
    public function addgallery(Request $request)
    { 
        $data = null;
        $lastid = $request->product_id;
        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                    $val = $file->getClientOriginalExtension();
                    if($val == 'jpeg'|| $val == 'jpg'|| $val == 'png'|| $val == 'svg')
                    {
                    $gallery = new Gallery;
                    $name = time().$file->getClientOriginalName();
                    $file->move('assets/images/gallery',$name);
                    $gallery['photo'] = $name;
                    $gallery['product_id'] = $lastid;
                    $gallery->save();
                    $data[] = $gallery;                        
                    }
            }
        }
        return response()->json($data);      
    } 
    public function delgallery()
    {

        $id = $_GET['id'];
        $gal = Gallery::findOrFail($id);
                    if (file_exists(public_path().'/assets/images/gallery/'.$gal->photo)) {
                        unlink(public_path().'/assets/images/gallery/'.$gal->photo);
                    }
        $gal->delete();
            
    } 
    public function addbyone()
    {
        $id = $_GET['id'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock','type','file','link','license','license_qty','measure']);
        if($prod->license_qty != null)
        {
        $lcheck = 1;
        $details1 = explode(',', $prod->license_qty);
            foreach($details1 as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->adding($prod, $prod->id);
        if($cart->items[$id]['stock'] < 0)
        {
            return 0;
        }
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;
        $data[1] = $cart->items[$id]['qty']; 
        $data[2] = $cart->items[$id]['price'];
        $data[3] = count($cart->items);
        return response()->json($data);          
    }  

    public function reducebyone()
    {
        $id = $_GET['id'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock','type','file','link','license','license_qty','measure']);
        if($prod->license_qty != null)
        {
        $lcheck = 1;
        $details1 = explode(',', $prod->license_qty);
            foreach($details1 as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce($prod, $prod->id);
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;
        $data[1] = $cart->items[$id]['qty']; 
        $data[2] = $cart->items[$id]['price'];
        $data[3] = count($cart->items);
        return response()->json($data);           
    }  

    public function upcart()
    {
         $id = $_GET['id'];
         $size = $_GET['size'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock','type','file','link','license','license_qty','measure']);
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->updateItem($prod,$id,$size);  
         Session::put('cart',$cart);
    }  

    public function upcolor()
    {
         $id = $_GET['id'];
         $color = $_GET['color'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock','type','file','link','license','license_qty','measure']);
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->updateColor($prod,$id,$color);  
         Session::put('cart',$cart);
    } 
    public function addnumcart()
    {
        $id = $_GET['id'];
        $qty = $_GET['qty'];
        $size = $_GET['size'];
        $color = $_GET['color'];
$prod = Product::where('id','=',$id)->first(['id','user_id','name','photo','size','color','cprice','stock','type','file','link','license','license_qty','measure']);
        if($prod->license_qty != null)
        {
        $lcheck = 1;
        $details1 = explode(',', $prod->license_qty);
            foreach($details1 as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;
        $prod->cprice = round($price,2);
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addnum($prod, $prod->id, $qty, $size,$color);
        if($cart->items[$id]['stock'] < 0)
        {
            return 0;
        }
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;
        $data[1] = $cart->items;   
        $data[2] = count($cart->items);   
        return response()->json($data);        
    }  

    public function removecart()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $id = $_GET['id'];   
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
            $data[0] = $cart->totalPrice;
            $data[1] = $cart->items;   
            $data[2] = count($cart->items);
            return response()->json($data);  
        } else {
            Session::forget('cart');
            $data[0] = 0.00;
            $data[1] = null;   
            return response()->json($data); 
        }          
    } 

    public function wish()
    {
        $id = $_GET['id'];        
        $user = Auth::guard('customer')->user();
        $data = 0;
        $ck = Wishlist::where('user_id','=',$user->id)->where('product_id','=',$id)->get()->count();
        if($ck > 0)
        {
            return response()->json($data); 
        }
        $wish = new Wishlist();
        $wish->user_id = $user->id;
        $wish->product_id = $id;
        $wish->save();
        $data = 1; 
        return response()->json($data);      
    }

    public function removewish()
    {
        $id = $_GET['id'];
        $wish = Wishlist::where('product_id','=',$id)->first();
        $wish->delete();        
        $data = 1; 
        return response()->json($data);      
    }

    public function compare()
    {
        $data[0] = 0;
        $id = $_GET['id'];        
        $prod = Product::findOrFail($id);
        $oldCompare = Session::has('compare') ? Session::get('compare') : null;
        $compare = new Compare($oldCompare);
        $compare->add($prod, $prod->id);
        Session::put('compare',$compare);
        if($compare->items[$id]['ck'] == 1)
        {
            $data[0] = 1;
        }
        $data[1] = count($compare->items);      
        return response()->json($data);   
   
    }

    public function removecompare()
    {
        $data[0] = 0;
        $oldCompare = Session::has('compare') ? Session::get('compare') : null;
        $compare = new Compare($oldCompare);
        $id = $_GET['id'];   
        $compare->removeItem($id);
        $data[1] = count($compare->items);  
        if (count($compare->items) > 0) {
            Session::put('compare', $compare);
            return response()->json($data);  
        } else {
            $data[0] = 1;
            Session::forget('compare');
            return response()->json($data); 
        }     
    }
    public function clearcompare()
    {
            Session::forget('compare');
    }
    public function favorite()
    {
        $id = $_GET['id'];        
        $user = Auth::guard('customer')->user();
        $data = 0;
        $ck = FavoriteSeller::where('user_id','=',$user->id)->where('vendor_id','=',$id)->get()->count();
        if($ck > 0)
        {
            return response()->json($data); 
        }
        $wish = new FavoriteSeller();
        $wish->user_id = $user->id;
        $wish->vendor_id = $id;
        $wish->save();
        $data = 1; 
        return response()->json($data);      
    }

    public function removefavorite()
    {
        $id = $_GET['id'];
        $wish = FavoriteSeller::where('vendor_id','=',$id)->first();
        $wish->delete();        
        $data = 1; 
        return response()->json($data);      
    }
    public function suggest()
    {
        $search = $_GET['search'];     
        $data = Product::where('name', 'like', '%' . $search . '%')
                ->where('status','=',1)->orderBy('id','desc')->take(10)->get();
        foreach($data as $key => $value)
        {
            if($value->user_id != 0)
            {
                if($value->user->is_vendor != 2)
                {
                    unset($data[$key]);
                }
            }
        }
        return response()->json($data);      
    }


    public function sectionProducts()
    {
        $gs = Generalsetting::find(1);
        if (Session::has('language'))
        {
            $lang = Language::find(Session::get('language'));
        }
        else
        {
            $lang = Language::where('is_default','=',1)->first();
        }
        if (Session::has('currency'))
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }

        $section = $_GET['section'];
        $data = '';
        $products = Product::where($section, '=', 1)->where('status', '=', 1)->orderBy('id', 'desc')->take(8)->get();

        $beproducts = Product::where('best', '=', 1)->where('status', '=', 1)->orderBy('id', 'desc')->take(8)->get();
        $tproducts = Product::where('top', '=', 1)->where('status', '=', 1)->orderBy('id', 'desc')->take(8)->get();

        $lproducts = Product::where('latest', '=', 1)->where('status', '=', 1)->orderBy('id', 'desc')->take(8)->get();
        $biproducts = Product::where('big', '=', 1)->where('status', '=', 1)->orderBy('id', 'desc')->take(8)->get();
        $i = 1000;
        $j = 1000;
        $m = 0;

        foreach ($beproducts as $prod){
                        $data .= '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 '.($m >= 3 ? "hidden-xs" : "").'">';
                    $m++;
                    $name = str_replace(" ", "-", $prod->name);

                    $data .= '<a href="' . route('front.product', ['id' => $prod->id, 'slug' => $name]) . '" class="single-product-area text-center">
                                                                <div class="product-image-area">';
                    if ($prod->features != null && $prod->colors != null) {

                        $title = explode(',', $prod->features);
                        $details = explode(',', $prod->colors);

                        $data .= '<div class="featured-tag" style = "width: 100%;">';
                        foreach (array_combine($title, $details) as $ttl => $dtl){
                            $data .= '<style type = "text/css" >
                                span#d'.$j++.':after {
                                       border-left: 10px solid '.$dtl.'
                                    };                                                     
                           
                                </style >
                                <span id = "d'.$i++.'" style = "background: '.$dtl.'" >
                                    '.$ttl.'
                                </span >';
                        }
                        $data .= ' </div>';
                    }
                    $data .= '<img src="'.asset('assets/images/'.$prod->photo).'" alt="featured product">';
                if($prod->youtube != null){
                    $data .= '<div class="product-hover-top">
                                    <span class="fancybox" data-fancybox href="'.$prod->youtube.'"><i class="fa fa-play-circle"></i></span>
                                </div>';
                }

                    $data .= '<div class="gallery-overlay"></div>
                                        <div class="gallery-border"></div>
                                        <div class="product-hover-area">
                                            <input type="hidden" value="'.$prod->id.'">';
                if(Auth::guard('user')->check()) {
                    $data .= '<span class="wishlist hovertip uwish" rel - toggle = "tooltip" title = "'.$lang->wishlist_add.'" ><i class="fa fa-heart" ></i >
                                            <span class="wish-number" >'.Wishlist::where('product_id', '=', $prod->id)->get()->count().'</span >
                                          </span >';
            }else {
                    $data .= '<span class="wishlist hovertip no-wish" data - toggle = "modal" data - target = "#loginModal" rel - toggle = "tooltip" title = "'.$lang->wishlist_add.'" ><i class="fa fa-heart" ></i >
                                            <span class="wish-number" >'.Wishlist::where('product_id', '=', $prod->id)->get()->count().'</span >
                                          </span >';
            }
                    $data .= '<span class="wish-list hovertip wish-listt" data-toggle="modal" data-target="#myModal" rel-toggle="tooltip" title="'.$lang->quick_view.'"><i class="fa fa-eye"></i>
                                          </span>
                                                                        <span class="hovertip addcart" rel-toggle="tooltip" title="'.$lang->hcs.'"><i class="fa fa-cart-plus"></i>
                                          </span>
                                                                        <span class="hovertip compare" rel-toggle="tooltip" title="'.$lang->compare.'"><i class="fa fa-exchange"></i>
                                          </span>
                                                                    </div>
            
            
            
                                                                </div>
                                                                <div class="product-description text-center">
                                                                    <div class="product-name">'.strlen($prod->name) > 65 ? substr($prod->name,0,65)."..." : $prod->name.'</div>
                                                                    <div class="product-review">
                                                                        <div class="ratings">
                                                                            <div class="empty-stars"></div>
                                                                            <div class="full-stars" style="width:'.Review::ratings($prod->id).'%"></div>
                                                                        </div>
                                                                    </div>';
            if($gs->sign == 0){
                $data .= '<div class="product-price">'.$curr->sign;
                                                                            if($prod->user_id != 0){

                                                                                    $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice/100) * $gs->percentage_commission ;

                                                                                $data .= round($price * $curr->value,2);
                                                                            }else{
                                                                                $data .= round($prod->cprice * $curr->value,2);
                                                                            }
                $data .= '<del class="offer-price">'.$curr->sign.round($prod->pprice * $curr->value,2).'</del>
            
                                                                        </div>';
            }else{
                                                                        $data .= '<div class="product-price">';
            if($prod->user_id != 0) {

                $price = $prod->cprice + $gs->fixed_commission + ($prod->cprice / 100) * $gs->percentage_commission;

                $data .= round($price * $curr->value, 2);
            }else {
                $data .= round($prod->cprice * $curr->value, 2);
            }
                $data .= '<del class="offer-price">'.$curr->sign.round($prod->pprice * $curr->value,2).'</del>
                                                                            '.$curr->sign.'
                                                                        </div>';
            }
                    $data .= ' </div>
                                                            </a>
                                                        </div>';
        }

        return $data;
    }


}