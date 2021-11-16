<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertise;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Childcategory;
use App\Classes\GeniusMailer;
use App\Models\Compare;
use App\Models\Conversation;
use App\Models\Counter;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Faq;
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

class ProductController extends Controller
{
    //
    public function categorypros($id)
    {
  
        $cat = Category::where('id','=',$id)->first();
        $subcats=Subcategory::where('category_id','=',$id)->get();
        $cat->image_url=asset('assets/images/').'/'.$cat->photo;

        $cats = $cat->products()->where('status','=',1)->orderBy('id','desc')->get();
        if(count($cats)==0)  
        {
         
          return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'No product Found',
            'products' => null,
            'category' => $cat,
            'subcats' => $subcats,
            
          ]);
        }
        
        foreach ($cats as $key) {

        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
  
    return response()->json([
      'status_code' => 200,
      'status' => 1,
      'products'=>$cats,
      'category'=>$cat,
      'subcats'=>$subcats,

    ]);
       
    }

    public function subcategorypros($id)
    {
        $subcat = Subcategory::where('id','=',$id)->first();
        $childsubcat = Childcategory::where('subcategory_id','=',$id)->get();

        foreach($childsubcat as $key1) {
   
        	# code...
        	
        	$key1->sub_name=$key1->child_name;
        }
       
        $subcats = $subcat->products()->where('status','=',1)->orderBy('id','desc')->get();
       
        if(count($subcats)==0)  
        {
         
          return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'No product Found',
            'products' => null,
            'subcat' => $subcat,
            'childcats' => $childsubcat,
            
          ]);
        }
        foreach ($subcats as $key) {
   
        	# code...
        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
        return response()->json([
            'status_code' => 200,
            'status' => 1,
            'products'=>$subcats,
            'subcat' => $subcat,
            'childcats' => $childsubcat,
      
          ]);

    }

    public function childcategorypros($id)
    {
        $childcat = Childcategory::where('id','=',$id)->first();
        $childcats = $childcat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
      

        if(count($childcats)==0)  
        {
         
          return response()->json([
            'status_code' => 500,
            'status' => 0,
            'message' => 'No product Found',
            'products' => null,
            'childcat' => $childcat,
            
          ]);
        }
        foreach ($childcats as $key) {

        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
        return response()->json([
            'status_code' => 200,
            'status' => 1,
            'products'=>$childcats,

            'childcat' => $childcat,
      
          ]);

    }

}
