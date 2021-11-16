<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Slider;
use App\Http\Controllers\Controller; 
use App\User; 
use App\Category;
use App\Brand;
use App\Banner;
use App\Service;
use App\Product;
use App\Order;
use App\Image;
use App\Portfolio;
use App\ProductClick;
use Carbon\Carbon;
use App\Subcategory;
use App\Childcategory;
use App\VendorSlider;
use App\Comment;
use App\Generalsetting;
use App\Classes\GeniusMailer;
use App\Notification;
use App\VendorOrder;
use App\Pagesetting;
use App\Faq;
use DB;
use App\Cart;
use App\Wishlist;
use App\Blog;
use Hash;
use Illuminate\Support\Facades\Auth; 
use Validator;
class auth_api extends Controller
{

       public function login(Request $request){
            // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            //     $user = Auth::user();
            //     $success['status']=1;
            //     $success['user']=$user;
            //     $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            //     return response()->json(['result' => $success]); 
            // }
       	$validator = Validator::make($request->all(), [ 
            'password' => 'required', 
            'email' => 'required|email'  
        ]);
        if ($validator->fails()) { 
           
            return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
        }
        $input = $request->all();
       // print_r($input);  exit;
        $password=md5(request('password'));
        // print_r($input); exit;
         $user=User::where('email','=',request('email'))->where('password_api','=',$password)->first();
            if($user)
            {
                $user->image_url=asset('assets/images/').'/'.$user->photo;
                $success['status']=1;
                $success['user']=$user;
                return response()->json($success);

            } 
            else{ 
                $unsuccess['status']=0;
                $unsuccess['user']=$user;
                return response()->json($unsuccess); 
            } 
        }

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
       if ($validator->fails()) { 
           
            return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
        }
        // $gs = Generalsetting::findOrFail(1);

        $input = $request->all();
        $input['password_api']=md5($request['password']);
        $input['password'] = bcrypt($request['password']);
        $input['affilate_code'] = $request->name.$request->email;

        $input['affilate_code'] = md5($input['affilate_code']); 
        $user = User::where('email', $input['email'])->first();
        if(!$user)
        {
         //$user->fill($input)->save();
         $user1 = User::create($input);
         $success['status'] = 1;
         $success['user'] =  $user1; 
        return response()->json($success);  
        }
       else
       {
             $success['status'] = 0;
             $success['msg'] =  'User with this mail already in Database so it cannot be added again';
             return response()->json($success); 
       }


        // if($gs->is_smtp == 1)
        // {
        // $data = [
        //     'to' => $request->email,
        //     'type' => "new_registration",
        //     'cname' => $request->name,
        //     'oamount' => "",
        //     'aname' => "",
        //     'aemail' => "",
        // ];    
        // $mailer = new GeniusMailer();
        // $mailer->sendAutoMail($data);        
        // }

        // else
        //     {
        //    $to = $request->email;
        //    $subject = 'Welcome To'.$gs->title;
        //    $msg = "Hello ".$request->name.","."\n You have successfully registered to ".$gs->title."."."\n We wish you will have a wonderful experience using our service.";
        //     $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
        //    mail($to,$subject,$msg.$headers);
            

        //     $notification = new Notification;
        //     $notification->user_id = $user->id;
        //     $notification->save();
        //     }
    }

    public function getAllCategories()
    {
    	$cats = Category::orderBy('id','desc')->get();
    	if($cats)
    	{
    		foreach ($cats as $key) {
    			# code...
    			$key->icone_url=asset('assets/images/').'/'.$key->photo;
    		}
    	}
    	// $check = Category::wh->first();

    	 if($cats)
        {
         //$user->fill($input)->save();
         $success['status'] = 1;
         $success['result'] =  $cats; 
        return response()->json($success);  
        }
       else
       {
             $unsuccess['status'] = 0;
             $unsuccess['result'] =  'No Cateogry found';
             return response()->json($unsuccess); 
       } 
    }

    public function frontpage()
    {
    	$ads = Portfolio::all();
        $sls = Slider::first();
        $id1 = $sls->id;
        //$sliders = Slider::where('id','>',$id1)->get();
        $sliders = Slider::all();
    	$data['brand'] = Brand::all();
        $data['banner'] = Banner::findOrFail(1);
        $data['service'] = Service::all();
        $data['featured_pros'] = Product::where('featured','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $data['best_saling_pros'] = Product::where('best','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $data['top_rated_pros'] = Product::where('top','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $data['hot_pros'] = Product::where('hot','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $data['latest_pros'] = Product::where('latest','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $data['big_pros'] = Product::where('big','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        //$data['images']= Image::all();
        $data['images'] = $sliders;

        return response()->json($data);
    }

    public function featuredPros()
    {
    	$featured = Product::where('featured','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
    	if($featured)
    	{
    		foreach ($featured as $key) {
    			# code...

    			if($key->color != null)
		        {
		            $colors = explode(',', $key->color); 
		            $key->colors=$colors;           
		        } 
		        	
    			$key->image_url=asset('assets/images/').'/'.$key->photo;
    		}
    	}
    	if($featured)
    	{
    	 $success['status'] = 1;
         $success['result'] =  $featured; 
        return response()->json($success);  
        }
       else
       {
             $unsuccess['status'] = 0;
             $unsuccess['result'] =  'No Featured product found';
             return response()->json($unsuccess); 
       }

    }

    public function bestSalingPros()
    {
    	$bestSalings = Product::where('best','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
    	if($bestSalings)
    	{
    		foreach ($bestSalings as $key) {
    			# code...
    			if($key->color != null)
		        {
		            $colors = explode(',', $key->color);
		            $key->colors=$colors;            
		        } 
		        	
    			$key->image_url=asset('assets/images/').'/'.$key->photo;
    		}
    	}
    	if($bestSalings)
    	{
    	 $success['status'] = 1;
         $success['result'] =  $bestSalings; 
        return response()->json($success);  
        }
       else
       {
             $unsuccess['status'] = 0;
             $unsuccess['result'] =  'No product found';
             return response()->json($unsuccess); 
       }

    }

    public function topRatedPros()
    {
    	$topRated = Product::where('top','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
    	if($topRated)
    	{
    		foreach ($topRated as $key) {
    			# code...
    			if($key->color != null)
		        {
		            $colors = explode(',', $key->color); 
		            $key->colors=$colors;           
		        } 
		        	
    			$key->image_url=asset('assets/images/').'/'.$key->photo;
    		}
    	}
    	if($topRated)
    	{
    	 $success['status'] = 1;
         $success['result'] =  $topRated; 
        return response()->json($success);  
        }
       else
       {
             $unsuccess['status'] = 0;
             $unsuccess['result'] =  'No product found';
             return response()->json($unsuccess); 
       }

    }

  public function productDetails($id,$uid)
    {
    	$pro = Product::findOrFail($id);
        $user=$uid;
        $ck = Wishlist::where('user_id','=',$user)->where('product_id','=',$id)->get()->count();
        if($ck > 0)
        {
           $pro->wishstatus=true;
        }
        else
        {
           $pro->wishstatus=false; 
        }

        if($pro->size != null)
        {
            $size = explode(',', $pro->size);
            $i=0; 
            foreach($size as $s)
            {
               $ss[$i++]=$s;
            }
        $pro->size=$ss; 
        } 
               
        if($pro->color != null)
        {
            $color = explode(',', $pro->color); 
            $pro->colors=$color;            
        }
            
        $pro->views=$pro->views+1;
        $pro->image_url=asset('assets/images/').'/'.$pro->photo;
        
        //$pro->update()
        $product_click =  new ProductClick;
        $product_click->product_id = $pro->id;
        $product_click->date = Carbon::now()->format('Y-m-d');
        $product_click->save();        
        $pmeta = $pro->tags; 
        $vendor = User::where('id','=',$pro->user_id)->first();
        $gallery=DB::table('galleries')->where('product_id','=',$pro->id)->first();
        if(!empty($gallery))
        {
            $gallery=DB::table('galleries')->where('product_id','=',$pro->id)->get();
            foreach($gallery as $key)
            {
                $key->image_url='http://127.0.0.1:8000/assets/images/gallery/'.$key->photo;
            }
            $pro->gallery=$gallery;
        }
        else
        {
           // $aa = array();
         $aa['image_url']=asset('assets/images/').'/'.$pro->photo;
         $pro->gallery =array($aa);
         
        }
        
        $data['product']=$pro;
        if(!empty($vendor))
        {
         $data['vendor']=$vendor;
         $success['status'] = 1;
         $success['result'] =  $data; 
        return response()->json($success);           
        }
    	else
    	{
         $success['status'] = 2;
         $data['vendor']=$vendor;
         $success['result'] =  $data; 
         return response()->json($success);  
        }
    }

    public function frontPageImages()
    {
    	$data= Image::all();
    	$data=Slider::all();
    	foreach ($data as $key) {
    			$key->image_url=asset('assets/images/').'/'.$key->photo;
    		}

    	if($data)
    	{
    	 $success['status'] = 1;
         $success['result'] =  $data; 
        return response()->json($success);  
        }
       else
       {
             $unsuccess['status'] = 0;
             $unsuccess['result'] =  'No product found';
             return response()->json($unsuccess); 
       }
    }

    public function category(Request $request,$id)
    {
    	//print_r($id); exit;
        $sort = "";
        $cat = Category::where('id','=',$id)->first();
        $subcats=Subcategory::where('category_id','=',$id)->get();
        $cat->image_url=asset('assets/images/').'/'.$cat->photo;

        $cats = $cat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        // echo '<pre>';
        // print_r($cats); exit;
        foreach ($cats as $key) {

        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
        $cats = $cat->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->orderBy('cprice','asc')->paginate(9);
        foreach ($cats as $key) {

        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
        $success['status'] = 1;
        $success['category'] =  $cat;
        $success['subcategories'] =  $subcats; 
        $success['products'] =  $cats; 

        return response()->json($success);
        }
        else
    	{
    	 $success['status'] = 2;
         $success['category'] =  $cat;
         $success['subcategories'] =  $subcats; 
         $success['products'] =  $cats; 
        return response()->json($success);
        }
   
    }

    public function subcategory(Request $request,$id)
    {
        $sort = "";
        $subcat = Subcategory::where('id','=',$id)->first();
        $childsubcat = Childcategory::where('subcategory_id','=',$id)->get();

        foreach($childsubcat as $key1) {
   
        	# code...
        	
        	$key1->sub_name=$key1->child_name;
        }
       
        $subcats = $subcat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        foreach ($subcats as $key) {
   
        	# code...
        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
        if(!empty($request->min) || !empty($request->max))
        {
         $min = $request->min;
         $max = $request->max;
         $subcats = $subcat->products()->where('status','=',1)->whereBetween('cprice', [$min,$max])->orderBy('cprice','asc')->paginate(9);
         foreach ($subcats as $key) {
   
        	# code...
        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
         $success['status'] = 2;
         $success['subcategory'] =  $subcat;
         $success['childcategory']=$childsubcat; 
         $success['products'] =  $subcats; 
        return response()->json($success);
        }
        else
        {
         $success['status'] = 1;
         $success['subcategory'] =  $subcat;
         $success['childcategory']=$childsubcat; 
         $success['products'] =  $subcats; 
        return response()->json($success);
        }

    }

    public function childcategory(Request $request,$id)
    {
        $sort = "";
        $childcat = Childcategory::where('id','=',$id)->first();
        $childcats = $childcat->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        foreach ($childcats as $key) {

        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }

        if(!empty($request->min) || !empty($request->max))
        {
            $min = $request->min;
            $max = $request->max;
            $childcats = $childcat->products()->where('status','=',1)->whereBetween('cprice', [$min,$max])->orderBy('cprice','asc')->paginate(9);
             foreach ($childcats as $key) {

        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
         $success['status'] = 2;
         $success['childcategory']=$childcat; 
         $success['products'] =  $childcats; 
         return response()->json($success);
           
        }
        else
        {
         $success['status'] = 1;
         $success['childcategory']=$childcat; 
         $success['products'] =  $childcats; 
         return response()->json($success);
        }

    }

     public function venAllProducts(Request $request,$id)
    {
        $sort = '';
       //  print_r($id); exit;
        //$string = str_replace('-', ' ', $slug);
        $vendor = User::where('id','=',$id)->first();
        $venimage=VendorSlider::where('user_id','=',$id)->get();
        foreach ($venimage as $img) {
        	# code...
        	$img->vender_imgs=asset('assets/images/').'/'.$img->photo;
        }
        $vendor->image_url=asset('assets/images/').'/'.$vendor->photo;
        $vendorBestsaling = $vendor->products()->where('status','=',1)->where('best','=',1)->orderBy('id','desc')->take(8)->get();
        $vendorTopRate = $vendor->products()->where('status','=',1)->where('latest','=',1)->orderBy('id','desc')->take(8)->get();
        
        foreach($vendorBestsaling as $top)
        {
        	$top->image_url=asset('assets/images/').'/'.$top->photo;
        }
         foreach($vendorTopRate as $rate)
        {
        	$rate->image_url=asset('assets/images/').'/'.$rate->photo;
        }

        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
         $vendorBestsaling = $vendor->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->where('best','=',1)->orderBy('id','desc')->take(8)->get();
        $vendorTopRate = $vendor->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->where('latest','=',1)->orderBy('id','desc')->take(8)->get();
       
        foreach($vendorBestsaling as $top)
        {
        	$top->image_url=asset('assets/images/').'/'.$top->photo;
        }
         foreach($vendorTopRate as $rate)
        {
        	$rate->image_url=asset('assets/images/').'/'.$rate->photo;
        }
         $success['status'] = 2;
         $success['latest']=$vendorTopRate;
         $success['bestsaling']=$vendorBestsaling;
         $success['vendor']=$vendor; 
         $success['vendorImages']=$venimage;

         return response()->json($success);
        }
        else
        {
         $success['status'] = 1;
         $success['vendor']=$vendor;
         $success['vendorImages']=$venimage;
         $success['latest']=$vendorTopRate;
         $success['bestsaling']=$vendorBestsaling; 
         return response()->json($success);
        }
  
    }

    public function vendor(Request $request,$id)
    {
        $sort = '';
        //$string = str_replace('-', ' ', $slug);
        $vendor = User::where('id','=',$id)->first();
        $venimage=VendorSlider::where('user_id','=',$id)->get();
        foreach ($venimage as $img) {
        	# code...
        	$img->vender_imgs=asset('assets/images/').'/'.$img->photo;
        }
        $vendor->image_url=asset('assets/images/').'/'.$vendor->photo;
        $vprods = $vendor->products()->where('status','=',1)->orderBy('id','desc')->paginate(9);
        $vendorBestsaling = $vendor->products()->where('status','=',1)->where('best','=',1)->orderBy('id','desc')->take(8)->get();
        $vendorTopRate = $vendor->products()->where('status','=',1)->where('top','=',1)->orderBy('id','desc')->take(8)->get();
        foreach ($vprods as $key) {
        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
        foreach($vendorBestsaling as $top)
        {
        	$top->image_url=asset('assets/images/').'/'.$top->photo;
        }
         foreach($vendorTopRate as $rate)
        {
        	$rate->image_url=asset('assets/images/').'/'.$rate->photo;
        }

        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
        $vprods = $vendor->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->orderBy('cprice','asc')->paginate(9);
         $vendorBestsaling = $vendor->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->where('best','=',1)->orderBy('id','desc')->take(8)->get();
        $vendorTopRate = $vendor->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->where('top','=',1)->orderBy('id','desc')->take(8)->get();
        foreach ($vprods as $key) {
        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
        foreach($vendorBestsaling as $top)
        {
        	$top->image_url=asset('assets/images/').'/'.$top->photo;
        }
         foreach($vendorTopRate as $rate)
        {
        	$rate->image_url=asset('assets/images/').'/'.$rate->photo;
        }
         $success['status'] = 2;
         $success['top']=$vendorTopRate;
         $success['best']=$vendorBestsaling;
         $success['vendor']=$vendor; 
         $success['vendorImages']=$venimage;
         $success['products'] =  $vprods; 
         return response()->json($success);
        }
        else
        {
         $success['status'] = 1;
         $success['vendor']=$vendor;
         $success['vendorImages']=$venimage;
         $success['top']=$vendorTopRate;
         $success['best']=$vendorBestsaling; 
         $success['products'] =  $vprods; 
         return response()->json($success);
        }
  
    }

    public function vendorpro(Request $request,$id)
    {
        $sort = '';
        //$string = str_replace('-', ' ', $slug);
        $vendor = User::where('id','=',$id)->first();
        $venimage=VendorSlider::where('user_id','=',$id)->get();
        foreach ($venimage as $img) {
        	# code...
        	$img->vender_imgs=asset('assets/images/').'/'.$img->photo;
        }
        $vendor->image_url=asset('assets/images/').'/'.$vendor->photo;
        $vprods = $vendor->products()->where('status','=',1)->orderBy('id','desc')->paginate(4);
        foreach ($vprods as $key) {
        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
        

        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
        $vprods = $vendor->products()->where('status','=',1)->whereBetween('cprice', [$min, $max])->orderBy('cprice','asc')->paginate(9);
       
        foreach ($vprods as $key) {
        	$key->image_url=asset('assets/images/').'/'.$key->photo;
        }
       
         $success['status'] = 2;
         $success['vendor']=$vendor; 
         $success['vendorImages']=$venimage;
         $success['products'] =  $vprods; 
         return response()->json($success);
        }
        else
        {
         $success['status'] = 1;
         $success['vendor']=$vendor;
         $success['vendorImages']=$venimage;
         $success['products'] =  $vprods; 
         return response()->json($success);
        }
  
    }

    public function venCategories($id)
    {
    	$categories = DB::table('products')->where('status','=',1)->where('user_id','=',$id)
                  // ->join('categories', 'categories.id', '=', 'products.user_id')
                   ->get();
                  return response()->json($categories);

    }
///Open Blogs for users
    public function blogs()
	{
		$blogs = Blog::orderBy('created_at','desc')->paginate(6);
		if($blogs)
		{
			foreach ($blogs as $key) {
				# code...
				$key->image_url=asset('assets/images/').'/'.$key->photo;
			}
		}
		if($blogs)
		{
		 $success['status']=1;
         $success['Blogs']=$blogs; 
         return response()->json($success);
        }
        else
        {
         $success['status']=0;
         $success['Blogs']=$blogs; 
         return response()->json($success);
        }
		
	}

    public function blogshow($id)
    {
        $this->code_image();
        $blog = Blog::findOrFail($id);
        $old = $blog->views;
        $new = $old + 1;
        $blog->views = $new;
        $blog->update();
        $blog->image_url=asset('assets/images/').'/'.$blog->photo;
        $lblogs = Blog::orderBy('created_at', 'desc')->limit(4)->get();
        if($lblogs)
        {
            foreach ($lblogs as $key) {
                # code...
             $key->image_url=asset('assets/images/').'/'.$key->photo;
            }
        }
        $blog->details = preg_replace('/\s+/', ' ', $blog->details);
        if($blog)
        {
         $success['status']=1;
         $success['blog']=$blog; 
         $success['latestblogs']=$lblogs;
         return response()->json($success);
        }
        else
        {
         $success['status']=0;
         $success['blog']=$blog; 
         $success['latestblogs']=$lblogs; 
         return response()->json($success);
        }
    }

     private function  code_image()
    {
        $actual_path = str_replace('project','',base_path());
        $actual_path = $actual_path.'/';
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path."assets/images/capcha_code.png");
    }


    /////
      public function wishlist(Request $request,$id)
    {
        $sort = '';
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
        //$user = Auth::guard('user')->user();
        $wishes = Wishlist::where('user_id','=',$id)->pluck('product_id');
        $wproducts = Product::whereIn('id',$wishes)->whereBetween('cprice', [$min, $max])->orderBy('id','desc')->paginate(9);
        
        $success['status']=1;
        $success['user']=$wishes; 
        $success['whishlist']=$wproducts; 
        return response()->json($success);
        }
        else
        {
         $wishes = Wishlist::where('user_id','=',$id)->pluck('product_id');
         $wproducts = Product::whereIn('id',$wishes)->orderBy('id','desc')->paginate(9);
         if(count($wproducts)!=0)
         {
             foreach($wproducts as $pro)
             {
                 $pro->image_url=asset('assets/images').'/'.'/'.$pro->photo;
             }
         }
         $success['status']=1;
         $success['user']=$wishes; 
         $success['whishlist']=$wproducts; 
         return response()->json($success);
        }

    }

    public function wishpro_vendor(Request $request,$id)
    {
        $sort = '';
        if(!empty($request->min) || !empty($request->max))
        {
        $min = $request->min;
        $max = $request->max;
        //$user = Auth::guard('user')->user();
        $wishes = Wishlist::where('user_id','=',$id)->pluck('product_id');
        $wproducts = Product::whereIn('id',$wishes)->whereBetween('cprice', [$min, $max])->orderBy('id','desc')->paginate(9);

        
        $success['status']=1;
        $success['user']=$wishes; 
        $success['whishlist']=$wproducts; 
        return response()->json($success);
        }
        else
        {
         $wishes = Wishlist::where('user_id','=',$id)->pluck('product_id');
         $ven = DB::table('products')->where('user_id','!=',0)->pluck('user_id');
        if(count($wishes) != 0)
        {
            if(count($ven) != 0)
            {
                 foreach($ven as $v)
                 {
                 $vendor[$v] = User::where('id','=',$v)->first();
                 $vendor[$v]->images=VendorSlider::where('user_id','=',$v)->get();
                 foreach ($vendor[$v]->images as $img) {
                     # code...
                     $img->vender_imgs=asset('assets/images/').'/'.$img->photo;
                 }
                 $vendor[$v]->image_url=asset('assets/images/').'/'.$vendor[$v]->photo;
                 $vendor[$v]->products = $vendor[$v]->products()->where('status','=',1)->orderBy('id','desc')->take(8)->get();
                 
                 
                 foreach($vendor[$v]->products as $top)
                 {
                     $top->image_url=asset('assets/images/').'/'.$top->photo;
                 }
                 $vendors=$vendor[$v];
                }
                //$vendor = $vendor->toArray();
                
                 $success['status']=1;
                 $success['vendors']=array($vendors); 
                 return response()->json($success);
            }
            else
            {
                $success['status']=0;
                 $success['vendors']=array($ven); 
                 return response()->json($success);
            }
        }
        else
        {
                 $success['status']=0;
                 $success['vendors']=array($ven); 
                 return response()->json($success);
        }
            
    }

        

    }

    public function wish($id,$uid)
    {
        //$id = $_GET['id'];        
        //$user = Auth::guard('user')->user();
        $user=$uid;
        $data = 0;
        $ck = Wishlist::where('user_id','=',$user)->where('product_id','=',$id)->get()->count();
        if($ck > 0)
        {
            $wishlist=Wishlist::where('user_id','=',$user)->where('product_id','=',$id)->delete();
            $success['status']=0;
            $success['wishlist']=0; 
            return response()->json($success);
        }
        $wish = new Wishlist();
        $wish->user_id = $user;
        $wish->product_id = $id;
        $wishlist=$wish->save();
        $success['status']=1;
        $success['wishlist']=1; 
        return response()->json($success);      
    }

    public function comment()
    {
        $comment = new Comment;
        $comment->user_id = $_POST['uid'];
        $comment->product_id = $_POST['pid'];
        $comment->text = $_POST['comment'];
        $comment->save();
        $comments = Comment::where('product_id','=',$_POST['pid'])->get()->count();
        $data['commentBy'] = $comment->user->name;
        $data['timeperiod'] = $comment->created_at->diffForHumans();
        $data['text'] = $comment->text;
        $data['commentId'] = $comment->id;
        $data['userId'] = $comment->user->id;
        $data['productComments'] = $comments;
        if($data)
        {
         $data['status']=1;
         return response()->json($data);
        }
        else
        {
         $success['status']=0;
         return response()->json($success);
        }
    }

    public function comments($id)
    {
        $comments = Comment::where('product_id','=',$id)->get()->count();
        $commentdata = Comment::where('product_id','=',$id)
                                ->join('users','users.id','=','comments.user_id')->get();
        foreach($commentdata as $com)
        {
            $com->timeperiod=$com->created_at->diffForHumans();
        }
        // $data['commentBy'] = $comment->user->name;
        // $data['timeperiod'] = $comment->created_at->diffForHumans();
        // $data['text'] = $comment->text;
        // $data['commentId'] = $comment->id;
        // $data['userId'] = $comment->user->id;
           $data['counts'] = $comments;
           $data['productComments'] = $commentdata;
           if($data)
           {
            $data['status']=1;
            return response()->json($data);
           }
           else {
               # code...
             $data['status']=0;
             return response()->json($data);

           }
    }

    public function commentedit()
    {
        $id = $_POST['cid'];
        $txt = $_POST['text'];
        $comment =Comment::findOrFail($id);
        $comment->text = $txt;
        $comment->update();
        return response()->json($comment->text);
    } 

    public function commentdelete()
    {
    $id = $_GET['id'];
    $comment =Comment::findOrFail($id);
    if($comment->replies->count() > 0)
    {
        foreach ($comment->replies as $reply) {
            if($reply->subreplies->count() > 0)
            {
                foreach ($reply->subreplies as $subreply) {
                    $subreply->delete();
                }
            }
            $reply->delete();
        }
    }
    $comment->delete();
    }

    public function users()
    {
        $users=User::where('is_vendor','=',0)->get();
        return response()->json($users);
    }



    ////Cart submit

    public function cashondelivery(Request $request)
    {
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
    //  print_r($cart1); exit;
      
        $zee['items'] = $cart1;
        $zee['totalQty'] = $grandqty;
        $zee['totalPrice'] = $grandtotal;
       // print_r($zee['totalPrice']); 
        $cart=new Cart($zee);

        if(!$cart)
        {
            return response()->json(['status'=>0,'result'=>'cart is empty']);
        }
        // $oldCart[]=0;
        // $oldCart->items=$cart1;
        // print_r($oldCart); exit;
        // $oldCart->totalQty=$gradqty;
        // $oldCart->totalPrice=$gradtotal;
        // print_r($old); exit;
        // if (!Session::has('cart')) {
        //     return redirect()->route('front.cart')->with('success',"You don't have any product to checkout.");
        // }
        //     if (Session::has('currency')) 
        //     {
        //       $curr = Currency::find(Session::get('currency'));
        //     }
        //     else
        //     {
        //         $curr = Currency::where('is_default','=',1)->first();
        //     }
        $gs = Generalsetting::findOrFail(1);

        // $oldCart = $cart1;
        // $cart = new Cart($oldCart);
        // exit;
        // foreach($cart->items as $key => $prod)
        // {
        // if($prod['item']['license']!=null && $prod['item']['license_qty']!=null)
        // {
        //     $details1 = explode(',', $prod['item']['license_qty']);
        //         foreach($details1 as $ttl => $dtl)
        //         {
        //             if($dtl != 0)
        //             {
        //                 $dtl--;
        //                 $produc = Product::findOrFail($prod['item']['id']);
        //                 $temp = explode(',', $produc->license_qty);
        //                 $temp[$ttl] = $dtl;
        //                 $final = implode(',', $temp);
        //                 $produc->license_qty = $final;
        //                 $produc->update();
        //                 $temp = explode(',,', $produc->license);
        //                 $license = $temp[$ttl];
        //  $oldCart = Session::has('cart') ? Session::get('cart') : null;
        //  $cart = new Cart($oldCart);
        //  $cart->updateLicense($prod['item']['id'],$license);  
        //  Session::put('cart',$cart);
        //                 break;
        //             }                    
        //         }
        // }
        // }
        
        $order = new Order;

        $success_url = action('PaymentController@payreturn');
        $item_name = $gs->title." Order";
        $item_number = str_random(4).time();
        

        $order['user_id'] = $request->user_id;
        $order['cart'] = utf8_encode(bzcompress(serialize($cart), 9)); 

        $order['totalQty'] = $zee['totalQty'];

        $order['pay_amount'] = round($zee['totalPrice'], 2);
       //print_r($order['pay_amount']); exit;
        $order['method'] = "Cash On Delivery";
        // $order['shipping'] = $request->shipping;
        // $order['pickup_location'] = $request->pickup_location;
        $order['customer_email'] = $request->email;
        $order['customer_name'] = $request->name;
        $order['shipping_cost'] = 200;
        
        $order['tax'] = $zee['totalPrice']/10;
        $order['order_note'] = $request->order_notes;
        $order['customer_phone'] = $request->phone;
        $order['order_number'] = str_random(4).time();
        $order['customer_address'] = $request->address;
        $order['customer_country'] = $request->customer_country;
        $order['customer_city'] = $request->city;
        $order['customer_zip'] = $request->zip;
        // $order['shipping_email'] = $request->shipping_email;
        // $order['shipping_name'] = $request->shipping_name;
        // $order['shipping_phone'] = $request->shipping_phone;
        // $order['shipping_address'] = $request->shipping_address;
        // $order['shipping_country'] = $request->shipping_country;
        // $order['shipping_city'] = $request->shipping_city;
        // $order['shipping_zip'] = $request->shipping_zip;
        
        // $order['coupon_code'] = $request->coupon_code;
        // $order['coupon_discount'] = $request->coupon_discount;
        $order['dp'] = 1;
        $order['payment_status'] = "Pending";
      
        // echo '<pre>';
        // print_r($order); exit;
        // $order['currency_sign'] = $curr->sign;
        $order['currency_value'] = 1;

            // if (Session::has('affilate')) 
            // {
            //     $val = $request->total / 100;
            //     $sub = $val * $gs->affilate_charge;
            //     $user = User::findOrFail(Session::get('affilate'));
            //     $user->affilate_income = $sub;
            //     $user->update();
            //     $order['affilate_user'] = $user->name;
            //     $order['affilate_charge'] = $sub;
            // }

        $order->save();
        
        $notification = new Notification;
        $notification->order_id = $order->id;
        $notification->save();
        //print_r($notification); exit;
                    // if($request->coupon_id != "")
                    // {
                    //    $coupon = Coupon::findOrFail($request->coupon_id);
                    //    $coupon->used++;
                    //    if($coupon->times != null)
                    //    {
                    //         $i = (int)$coupon->times;
                    //         $i--;
                    //         $coupon->times = (string)$i;
                    //    }
                    //     $coupon->update();

                    // }
        // foreach($cart->items as $prod)
        // {
        //     $x = (string)$prod['stock'];
        //     if($x != null)
        //     {

        //         $product = Product::findOrFail($prod['item']['id']);
        //         $product->stock =  $prod['stock'];
        //         $product->update();  
        //         if($product->stock <= 5)
        //         {
        //             $notification = new Notification;
        //             $notification->product_id = $product->id;
        //             $notification->save();                    
        //         }              
        //     }
        // }
        foreach($cart['items'] as $prod)
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

        //Session::forget('cart');
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

public function name_edit(Request $request)
{
    	$validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'user_id' => 'required'  
        ]);
        if ($validator->fails()) { 
           
            return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
        }
    $data1 = $request->input();
    $data= array(
                'name'=>$data1['name']
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

public function phone_edit(Request $request)
{
    $validator = Validator::make($request->all(), [ 
        'phone' => 'required', 
        'user_id' => 'required'  
    ]);
    if ($validator->fails()) { 
       
        return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
    }
    $data1 = $request->input();
    $data= array(
                'phone'=>$data1['phone']
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
    $validator = Validator::make($request->all(), [ 
        'photo' => 'required|image', 
        'user_id' => 'required'  
    ]);
    if ($validator->fails()) { 
       
        return response()->json(['status'=>0,'error'=>$validator->errors()], 401);            
    }

    $data1=$request->input('user_id');

    if ($file = $request->file('photo')) 
        {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
        }
    else
    {
        $result['status']=0;
        $result['result']='plese select photo';
        return response()->json($result); 
    }  

    $data= array(
                'photo'=>$name
    );
    $userId=$data1;
    $flg=User::where('id',$userId)->update($data);
    $user=User::find($userId);
    $user->image_path= asset('assets/images/').'/'.$user->photo;
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



//     public function checkout()
//     {
//         if (!Session::has('cart')) 
//         {
//             return redirect()->route('front.cart')->with('success',"You don't have any product to checkout.");
//         }
//         if (Session::has('already')) 
//         {
//             Session::forget('already');
//         }
//         $gs = Generalsetting::findOrFail(1);
//         $dp = 1;

// // If a user is Authenticated then there is no problm user can go for checkout

//         if(Auth::guard('user')->check())
//         {
//             $gateways =  PaymentGateway::where('status','=',1)->get();
//             $pickups = Pickup::all();
//             $oldCart = Session::get('cart');
//             $cart = new Cart($oldCart);
//             $products = $cart->items;
//             if($gs->multiple_ship == 1)
//             {
//                 $user = null;
//                 foreach ($cart->items as $prod) {
//                         $user[] = $prod['item']['user_id'];
//                 }
//                 $ship  = 0;
//                 $users = array_unique($user);
//                 if(!empty($users))
//                 {
//                    foreach ($users as $user) {
//                     if($user != 0){
//                           $nship = User::findOrFail($user);
//                              $ship += $nship->shipping_cost;
//                     }
//                     else {
//                          $ship  += $gs->ship;
//                     }

//                    }
//                 }

//             }
//             else{
//             $ship  = $gs->ship;
//             }

//             foreach ($products as $prod) {
//                 if($prod['item']['type'] == 0)
//                 {
//                     $dp = 0;
//                     break;
//                 }
//             }
//             if($dp == 1)
//             {
//             $ship  = 0;                    
//             }
//             $total = $cart->totalPrice + $ship;
//             if($gs->tax != 0)
//             {
//                 $tax = ($total / 100) * $gs->tax;
//                 $total = $total + $tax;
//             }
//         return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'digital' => $dp]);             
//         }

//        else
//         {
// // If guest checkout is activated then user can go for checkout
//             if($gs->guest_checkout == 1)
//             {
// 	            $gateways =  PaymentGateway::where('status','=',1)->get();
// 	            $pickups = Pickup::all();
// 	            $oldCart = Session::get('cart');
// 	            $cart = new Cart($oldCart);
// 	            $products = $cart->items;
// 	            if($gs->multiple_ship == 1)
// 	            {
// 	                $user = null;
// 	                foreach ($cart->items as $prod) {
// 	                        $user[] = $prod['item']['user_id'];
// 	                }
// 	                $ship  = 0;
// 	                $users = array_unique($user);
// 	                if(!empty($users))
// 	                {
// 	                   foreach ($users as $user) {
// 	                    if($user != 0){
// 	                          $nship = User::findOrFail($user);
// 	                             $ship += $nship->shipping_cost;
// 	                    }
// 	                    else {
// 	                         $ship  += $gs->ship;
// 	                    }

// 	                   }
// 	                }

// 	            }
// 	            else
// 	            {
// 	            $ship  = $gs->ship;
// 	            }

// 	            foreach ($products as $prod) 
// 	            {
// 	                if($prod['item']['type'] == 0)
// 	                {
// 	                    $dp = 0;
// 	                    break;
// 	                }
// 	            }
// 	            if($dp == 1)
// 	            {
// 	            $ship  = 0;                    
// 	            }
// 	            $total = $cart->totalPrice + $ship;
// 	            if($gs->tax != 0)
// 	            {
// 	                $tax = ($total / 100) * $gs->tax;
// 	                $total = $total + $tax;
// 	            }
// 	            foreach ($products as $prod) 
// 	            {
// 	                if($prod['item']['type'] != 0)
// 	                {
// 	                    if(!Auth::guard('user')->check())
// 	                    {
// 				            $ck = 1;
// 					        return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'checked' => $ck, 'digital' => $dp]);  
// 		                }
// 		            }
// 		        }
// 		        return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'digital' => $dp]);                 
//             }

// // If guest checkout is Deactivated then display pop up form with proper error message
//             else
//             {
//                 $gateways =  PaymentGateway::where('status','=',1)->get();
//                 $pickups = Pickup::all();
//                 $oldCart = Session::get('cart');
//                 $cart = new Cart($oldCart);
//                 $products = $cart->items;
//                 if($gs->multiple_ship == 1)
//                 {
//                     $user = null;
//                     foreach ($cart->items as $prod) {
//                             $user[] = $prod['item']['user_id'];
//                     }
//                     $ship  = 0;
//                     $users = array_unique($user);
//                     if(!empty($users))
//                     {
//                        foreach ($users as $user) {
//                         if($user != 0){
//                               $nship = User::findOrFail($user);
//                                  $ship += $nship->shipping_cost;
//                         }
//                         else {
//                              $ship  += $gs->ship;
//                         }

//                        }
//                     }

//                 }
//                 else{
//                 $ship  = $gs->ship;
//                 }

//                 $total = $cart->totalPrice + $ship;
//                 if($gs->tax != 0)
//                 {
//                     $tax = ($total / 100) * $gs->tax;
//                     $total = $total + $tax;
//                 }
//                 $ck = 1;
// 		        return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'checked' => $ck, 'digital' => $dp]);                 
//         }
//     }
// }
    




// public function checkout($uid)
// {
//     if (!Session::has('cart')) {
//         return response()->json('result'=>0,'msg'=>'please add few product into cart to order');
//     }

//     if (Session::has('already')) {
//         Session::forget('already');
//     }

//     $gs = Generalsetting::findOrFail(1);
//     $dp = 1;
//     // If a user is Authenticated then there is no problm user can go for checkout
//     if($uid)
//     {
//         $gateways =  PaymentGateway::where('status','=',1)->get();
//         $pickups = Pickup::all();
//         $oldCart = Session::get('cart');
//         $cart = new Cart($oldCart);
//         $products = $cart->items;
//         if($gs->multiple_ship == 1)
//         {
//             $user = null;
//             foreach ($cart->items as $prod) {
//                     $user[] = $prod['item']['user_id'];
//             }
//             $ship  = 0;
//             $users = array_unique($user);
//             if(!empty($users))
//             {
//                foreach ($users as $user) {
//                 if($user != 0){
//                       $nship = User::findOrFail($user);
//                          $ship += $nship->shipping_cost;
//                 }
//                 else {
//                      $ship  += $gs->ship;
//                 }

//                }
//             }

//         }
//         else{
//         $ship  = $gs->ship;
//         }

//         foreach ($products as $prod) {
//             if($prod['item']['type'] == 0)
//             {
//                 $dp = 0;
//                 break;
//             }
//         }
//         if($dp == 1)
//         {
//         $ship  = 0;                    
//         }
//         $total = $cart->totalPrice + $ship;
//         if($gs->tax != 0)
//         {
//             $tax = ($total / 100) * $gs->tax;
//             $total = $total + $tax;
//         }
//         return response()->json(['status'=>0,'products'=>$cart->items,'totalPrice'=>$total,'pickups'=>$pickups,'totalQty'=>$cart->totalQty,'gateway'=>$gateways,'shiping_cost'=>$ship,'digital'=>$dp]);            
//     }
//     else
//     {
// // If guest checkout is activated then user can go for checkout
//         if($gs->guest_checkout == 1)
//         {
//         $gateways =  PaymentGateway::where('status','=',1)->get();
//         $pickups = Pickup::all();
//         $oldCart = Session::get('cart');
//         $cart = new Cart($oldCart);
//         $products = $cart->items;
//         if($gs->multiple_ship == 1)
//         {
//             $user = null;
//             foreach ($cart->items as $prod) {
//                     $user[] = $prod['item']['user_id'];
//             }
//             $ship  = 0;
//             $users = array_unique($user);
//             if(!empty($users))
//             {
//                foreach ($users as $user) {
//                 if($user != 0){
//                       $nship = User::findOrFail($user);
//                          $ship += $nship->shipping_cost;
//                 }
//                 else {
//                      $ship  += $gs->ship;
//                 }

//                }
//             }

//         }
//         else{
//         $ship  = $gs->ship;
//         }
//         foreach ($products as $prod) {
//             if($prod['item']['type'] == 0)
//             {
//                 $dp = 0;
//                 break;
//             }
//         }
//         if($dp == 1)
//         {
//         $ship  = 0;                    
//         }
//         $total = $cart->totalPrice + $ship;
//         if($gs->tax != 0)
//         {
//             $tax = ($total / 100) * $gs->tax;
//             $total = $total + $tax;
//         }
//         foreach ($products as $prod) {
//             if($prod['item']['type'] != 0)
//             {
//                 if(!Auth::guard('user')->check())
//                 {
//         $ck = 1;

//     }
//     return response()->json(['status'=>1,'products'=>$cart->items,'totalPrice'=>$total,'pickups'=>$pickups,'totalQty'=>$cart->totalQty,'gateway'=>$gateways,'shiping_cost'=>$ship,'digital'=>$dp,'cheked'=>$ck]); 
//     // return view('front.checkout', ['products' => $cart->items, 'totalPrice' => $total, 'pickups' => $pickups, 'totalQty' => $cart->totalQty, 'gateways' => $gateways, 'shipping_cost' => $ship, 'checked' => $ck, 'digital' => $dp]);  
// 	    }
// 	}
// 	}

//     return response()->json(['status'=>2,'products'=>$cart->items,'totalPrice'=>$total,'pickups'=>$pickups,'totalQty'=>$cart->totalQty,'gateway'=>$gateways,'shiping_cost'=>$ship,'digital'=>$dp]);                 
//     }

// // If guest checkout is Deactivated then display pop up form with proper error message

//     else{
//         $gateways =  PaymentGateway::where('status','=',1)->get();
//         $pickups = Pickup::all();
//         $oldCart = Session::get('cart');
//         $cart = new Cart($oldCart);
//         $products = $cart->items;
//         if($gs->multiple_ship == 1)
//         {
//             $user = null;
//             foreach ($cart->items as $prod) {
//                     $user[] = $prod['item']['user_id'];
//             }
//             $ship  = 0;
//             $users = array_unique($user);
//             if(!empty($users))
//             {
//                foreach ($users as $user) {
//                 if($user != 0){
//                       $nship = User::findOrFail($user);
//                          $ship += $nship->shipping_cost;
//                 }
//                 else {
//                      $ship  += $gs->ship;
//                 }

//                }
//             }

//         }
//         else{
//         $ship  = $gs->ship;
//         }

//         $total = $cart->totalPrice + $ship;
//         if($gs->tax != 0)
//         {
//             $tax = ($total / 100) * $gs->tax;
//             $total = $total + $tax;
//         }
//         $ck = 1;

// 		return response()->json(['status'=>3,'products'=>$cart->items,'totalPrice'=>$total,'pickups'=>$pickups,'totalQty'=>$cart->totalQty,'gateway'=>$gateways,'shiping_cost'=>$ship,'digital'=>$dp,'cheked'=>$ck]);                 
//         }
                    


//         }


//     }





}
