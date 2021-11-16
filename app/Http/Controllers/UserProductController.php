<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Currency;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use Auth;

class UserProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:user');
    }
    public function index()
    {
        $user = Auth::guard('user')->user();
        $cats = Category::all();
        $package = $user->subscribes()->orderBy('id','desc')->first();
        $prods = $user->products()->orderBy('id','desc')->get();
        $sign = Currency::where('is_default','=',1)->first();
        return view('user.product.index',compact('prods','cats','sign')); 
    }

    public function create()
    {
        $cats = Category::all();
        $sign = Currency::where('is_default','=',1)->first();
        return view('user.product.create',compact('cats','sign'));
    }

      public function status($id1,$id2)
        {
            $prod = Product::findOrFail($id1);
            $prod->status = $id2;
            $prod->update();
            Session::flash('success', 'Successfully Updated The Status.');
            return redirect()->route('user-prod-index');
        }
        public function high($id1,$id2)
        {
            $prod = Product::findOrFail($id1);
            $prod->shop_status = $id2;
            $prod->update();
            Session::flash('success', 'Successfully Updated The Status.');
            return redirect()->route('user-prod-index');
        }      
    public function store(StoreValidationRequest $request)
    {
        $user = Auth::guard('user')->user();
        $package = $user->subscribes()->orderBy('id','desc')->first();
        $prods = $user->products()->orderBy('id','desc')->get()->count();
        if($prods < $package->allowed_products)
        {

        $this->validate($request, [
               'photo' => 'required|max:2048',
           ]);
        $prod = new Product;
        $sign = Currency::where('is_default','=',1)->first();
        $input = $request->all();

            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;  
                $input['colors'] = null;
            }
            else 
            {             
                $input['features'] = implode(',', $request->features);  
                $input['colors'] = implode(',', $request->colors);                 
            }

            if(empty($request->scheck ))
            {
                $input['size'] = null;
            }
            else{
            $input['size'] = implode(',', $request->size); 
            }


            if(empty($request->colcheck ))
            {
                $input['color'] = null;
            }
            else{
            $input['color'] = implode(',', $request->color); 
            }

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
            $input['photo'] = $name;
            }       
         
        if (!empty($request->tags)) 
         {
            $input['tags'] = implode(',', $request->tags);       
         }  

        if ($request->pccheck == ""){
            $input['product_condition'] = 0;
        }
        if ($request->shcheck == ""){
            $input['ship'] = null;
        }  
        if (!empty($request->meta_tag)) 
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;         
         } 
        if ($request->mescheck == "") 
         {
            $input['measure'] = null;    
         } 
         $input['cprice'] = ($input['cprice'] / $sign->value);
         $input['pprice'] = ($input['pprice'] / $sign->value); 
         $input['user_id'] = $user->id;            
        $prod->fill($input)->save();
        $lastid = $prod->id;

        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                if(in_array($key, $request->galval))
                {
                $gallery = new Gallery;
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/gallery',$name);
                $gallery['photo'] = $name;
                $gallery['product_id'] = $lastid;
                $gallery->save();
            }
            }
        }
        Session::flash('success', 'New Product added successfully.');
        return redirect()->route('user-prod-index');            
        }

        else
        {
        return redirect()->route('user-prod-index')->with('unsuccess', 'You Can\'t Add More Product.');       
        }

    }
 public function store1(StoreValidationRequest $request)
    {
        $user = Auth::guard('user')->user();
        $package = $user->subscribes()->orderBy('id','desc')->first();
        $prods = $user->products()->orderBy('id','desc')->get()->count();
        if($prods < $package->allowed_products)
        {
        $prod = new Product;
        $sign = Currency::where('is_default','=',1)->first();
        $input = $request->all();
        if($request->type_check == 1)
        {
            $this->validate($request, [
                   'photo' => 'required',
                   'file' => 'required|mimes:zip',
               ],[
                'photo.required' => 'Image Field Is Required.',
                'file.required' => 'File Field Is Required.',       
                'file.mimes' => 'File Must Be In a Zip Format.',            
            ]);   
            $input['link'] = null;         
        }
        else
        {
            $this->validate($request, [
                   'photo' => 'required',
                   'link' => 'required',
               ]);              
        }

            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;  
                $input['colors'] = null;
            }
            else 
            {             
                $input['features'] = implode(',', $request->features);  
                $input['colors'] = implode(',', $request->colors);                 
            }

            if ($file = $request->file('file')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/files',$name);           
                $input['file'] = $name;
            } 

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
                $input['photo'] = $name;
            }       
         
        if (!empty($request->tags)) 
         {
            $input['tags'] = implode(',', $request->tags);       
         }  

        if ($request->pccheck == ""){
            $input['product_condition'] = 0;
        }
        if (!empty($request->meta_tag)) 
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;         
         } 
         $input['cprice'] = ($input['cprice'] / $sign->value);
         $input['pprice'] = ($input['pprice'] / $sign->value); 
         $input['user_id'] = $user->id;            
        $prod->fill($input)->save();
        $lastid = $prod->id;

        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                if(in_array($key, $request->galval))
                {
                $gallery = new Gallery;
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/gallery',$name);
                $gallery['photo'] = $name;
                $gallery['product_id'] = $lastid;
                $gallery->save();
            }
            }
        }
        Session::flash('success', 'New Product added successfully.');
        return redirect()->route('user-prod-index');
    }
    else
    {
        return redirect()->route('user-prod-index')->with('unsuccess', 'You Can\'t Add More Product.');  
    }
    }

    public function store2(StoreValidationRequest $request)
    {
        $user = Auth::guard('user')->user();
        $package = $user->subscribes()->orderBy('id','desc')->first();
        $prods = $user->products()->orderBy('id','desc')->get()->count();
        if($prods < $package->allowed_products)
        {
        $user = Auth::guard('user')->user();
        $prod = new Product;
        $sign = Currency::where('is_default','=',1)->first();
        $input = $request->all();
        if($request->type_check1 == 1)
        {
            $this->validate($request, [
                   'photo' => 'required',
                   'file' => 'required|mimes:zip',
               ],[
                'photo.required' => 'Image Field Is Required.',
                'file.required' => 'File Field Is Required.',       
                'file.mimes' => 'File Must Be In a Zip Format.',            
            ]);   
            $input['link'] = null;         
        }
        else
        {
            $this->validate($request, [
                   'photo' => 'required',
                   'link' => 'required',
               ]);              
        }
            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;  
                $input['colors'] = null;
            }
            else 
            {             
                $input['features'] = implode(',', $request->features);  
                $input['colors'] = implode(',', $request->colors);                 
            }

            if(in_array(null, $request->license) || in_array(null, $request->license_qty))
            {
                $input['license'] = null;  
                $input['license_qty'] = null;
            }
            else 
            {             
                $input['license'] = implode(',,', $request->license);  
                $input['license_qty'] = implode(',', $request->license_qty);                 
            }

            if ($file = $request->file('file')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/files',$name);           
                $input['file'] = $name;
                    if($request->type_check == 2)
                    {
                        $input['file'] = null;      
                    }
            } 

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
                $input['photo'] = $name;
            }       
         
        if (!empty($request->tags)) 
         {
            $input['tags'] = implode(',', $request->tags);       
         }  

        if ($request->pccheck == ""){
            $input['product_condition'] = 0;
        }
        if (!empty($request->meta_tag)) 
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;         
         } 
         $input['cprice'] = ($input['cprice'] / $sign->value);
         $input['pprice'] = ($input['pprice'] / $sign->value);   
         $input['user_id'] = $user->id;          
        $prod->fill($input)->save();
        $lastid = $prod->id;

        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                if(in_array($key, $request->galval))
                {
                $gallery = new Gallery;
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images/gallery',$name);
                $gallery['photo'] = $name;
                $gallery['product_id'] = $lastid;
                $gallery->save();
            }
            }
        }
        Session::flash('success', 'New Product added successfully.');
        return redirect()->route('user-prod-index');
    }
    else
    {
        return redirect()->route('user-prod-index')->with('unsuccess', 'You Can\'t Add More Product.');  
    }
    }

    public function edit($id)
    {
        $cats = Category::all();
        $prod = Product::findOrFail($id);
        $sign = Currency::where('is_default','=',1)->first();
        if($prod->size != null)
        {
            $size = explode(',', $prod->size);            
        }
        if($prod->size == null)
        {
            $size = explode(',', $prod->size);            
        }
        if($prod->color != null)
        {
            $colrs = explode(',', $prod->color);            
        }
        if($prod->color == null)
        {
            $colrs = explode(',', $prod->color);            
        }
        if($prod->tags != null)
        {
            $tags = explode(',', $prod->tags);            
        }
        if($prod->tags == null)
        {
            $tags = explode(',', $prod->tags);            
        }
        if($prod->meta_tag != null)
        {
            $metatags = explode(',', $prod->meta_tag);            
        }
        if($prod->meta_tag == null)
        {
            $metatags = explode(',', $prod->meta_tag);            
        }
        if($prod->features!=null && $prod->colors!=null)
        {
            $title = explode(',', $prod->features);
            $details = explode(',', $prod->colors);
        }
        if($prod->features==null && $prod->colors==null)
        {
            $title = explode(',', $prod->features);
            $details = explode(',', $prod->colors);
        }
        if($prod->license!=null && $prod->license_qty!=null)
        {
            $title1 = explode(',,', $prod->license);
            $details1 = explode(',', $prod->license_qty);
        }
        if($prod->license==null && $prod->license_qty==null)
        {
            $title1 = explode(',,', $prod->license);
            $details1 = explode(',', $prod->license_qty);
        }
        $mescheck  = 1;
        if($prod->measure == 'Litre')
        {
        $mescheck  = 0;
        }
        if($prod->measure == 'Pound')
        {
        $mescheck  = 0;
        }
        if($prod->measure == 'Gram')
        {
        $mescheck  = 0;
        }
        if($prod->measure == 'Kilogram')
        {
        $mescheck  = 0;
        }
        if($prod->type == 1)
            return view('user.product.digital_edit',compact('cats','prod','size','colrs','tags','metatags','title','details','sign','title1','details1'));
        elseif($prod->type == 2)
            return view('user.product.license_edit',compact('cats','prod','size','colrs','tags','metatags','title','details','sign','title1','details1'));
        else
            return view('user.product.edit',compact('cats','prod','size','colrs','tags','metatags','title','details','sign','title1','details1','mescheck'));
    }

    public function update(UpdateValidationRequest $request, $id)
    {
        $user = Auth::guard('user')->user();
        $prod = Product::findOrFail($id);
        $sign = Currency::where('is_default','=',1)->first();
        $input = $request->all();
        if ($request->galdel == 1){
            $gals = Gallery::where('product_id',$id)->get();
            foreach ($gals as $gal) {
                    if (file_exists(public_path().'/assets/images/gallery'.$gal->photo)) {
                        unlink(public_path().'/assets/images/gallery/'.$gal->photo);
                    }
                $gal->delete();
            }
            
        }
        if(!in_array(null, $request->features) && !in_array(null, $request->colors))
        {             
            $input['features'] = implode(',', $request->features);  
            $input['colors'] = implode(',', $request->colors);                 
        }
        else
        {
            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;  
                $input['colors'] = null;
            }
            else
            {
                $features = explode(',', $prod->features);
                $colors = explode(',', $prod->colors);
                $input['features'] = implode(',', $features);  
                $input['colors'] = implode(',', $colors);
            }
        }  

            if(empty($request->scheck ))
            {
                $input['size'] = null;
            }
            else{
                if (!empty($request->size)) 
                 {
                    $input['size'] = implode(',', $request->size);       
                 }  
                if (empty($request->size)) 
                 {
                    $input['size'] = null;       
                 }  
            }

            if(empty($request->colcheck ))
            {
                $input['color'] = null;
            }
            else{
                if (!empty($request->color)) 
                 {
                    $input['color'] = implode(',', $request->color);       
                 }  
                if (empty($request->color)) 
                 {
                    $input['color'] = null;       
                 }  
            }

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);   
                if($prod->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$prod->photo)) {
                        unlink(public_path().'/assets/images/'.$prod->photo);
                    }
                }          
                $input['photo'] = $name;
            }       
         
        if (!empty($request->tags)) 
         {
            $input['tags'] = implode(',', $request->tags);       
         }  
        if (empty($request->tags)) 
         {
            $input['tags'] = null;       
         }
        if ($request->pccheck == ""){
            $input['product_condition'] = 0;
        }
        if ($request->shcheck == ""){
            $input['ship'] = null;
        }  
        if (!empty($request->meta_tag)) 
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;         
         }   
        if ($request->mescheck == "") 
         {
            $input['measure'] = null;    
         } 
         $input['cprice'] = $input['cprice'] / $sign->value;
         $input['pprice'] = $input['pprice'] / $sign->value; 
         $input['user_id'] = $user->id;
        $prod->update($input);
        Session::flash('success', 'Product updated successfully.');
        return redirect()->route('user-prod-index');
    }

    public function update1(UpdateValidationRequest $request, $id)
    {
        $user = Auth::guard('user')->user();
        $input = $request->all();
        $prod = Product::findOrFail($id);
        $sign = Currency::where('is_default','=',1)->first();
        if($request->type_check1 == 1)
        {
            if($prod->file==null){
            $this->validate($request, [
                   'file' => 'required|mimes:zip',
               ],[
                'file.required' => 'File Field Is Required.',       
                'file.mimes' => 'File Must Be In a Zip Format.',            
            ]);                 
            }
            $input['link'] = null;          
        }
        else
        {
            $this->validate($request, [
                   'link' => 'required',
               ]);
            if($prod->file!=null){
                    if (file_exists(public_path().'/assets/files/'.$prod->file)) {
                    unlink(public_path().'/assets/files/'.$prod->file);
                }
            }
                    $input['file'] = null;            
        }
        if ($request->galdel == 1){
            $gals = Gallery::where('product_id',$id)->get();
            foreach ($gals as $gal) {
                    if (file_exists(public_path().'/assets/images/gallery/'.$gal->photo)) {
                        unlink(public_path().'/assets/images/gallery/'.$gal->photo);
                    }
                $gal->delete();
            }
            
        }
        if(!in_array(null, $request->features) && !in_array(null, $request->colors))
        {             
            $input['features'] = implode(',', $request->features);  
            $input['colors'] = implode(',', $request->colors);                 
        }
        else
        {
            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;  
                $input['colors'] = null;
            }
            else
            {
                $features = explode(',', $prod->features);
                $colors = explode(',', $prod->colors);
                $input['features'] = implode(',', $features);  
                $input['colors'] = implode(',', $colors);
            }
        }  


            if ($file = $request->file('file')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/files',$name);  
                if($prod->file != null)
                {
                    if (file_exists(public_path().'/assets/files/'.$prod->file)) {
                        unlink(public_path().'/assets/files/'.$prod->file);
                    }
                }           
                $input['file'] = $name;
                if($request->type_check == 2)
                {
                    unlink(public_path().'/assets/files/'.$input['file']);
                    $input['file'] = null;
                }
            }    


            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);   
                if($prod->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$prod->photo)) {
                        unlink(public_path().'/assets/images/'.$prod->photo);
                    }
                }          
                $input['photo'] = $name;
            }       
         
        if (!empty($request->tags)) 
         {
            $input['tags'] = implode(',', $request->tags);       
         }  
        if (empty($request->tags)) 
         {
            $input['tags'] = null;       
         }
        if ($request->pccheck == ""){
            $input['product_condition'] = 0;
        }
        if ($request->shcheck == ""){
            $input['ship'] = null;
        }  
        if (!empty($request->meta_tag)) 
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;         
         }   
         $input['cprice'] = $input['cprice'] / $sign->value;
         $input['pprice'] = $input['pprice'] / $sign->value; 
         $input['user_id'] = $user->id;      
        $prod->update($input);
        Session::flash('success', 'Product updated successfully.');
        return redirect()->route('user-prod-index');
    }

    public function update2(UpdateValidationRequest $request, $id)
    {
        $user = Auth::guard('user')->user();
        $input = $request->all();
        $prod = Product::findOrFail($id);
        $sign = Currency::where('is_default','=',1)->first();
        if($request->type_check1 == 1)
        {
            if($prod->file==null){
            $this->validate($request, [
                   'file' => 'required|mimes:zip',
               ],[
                'file.required' => 'File Field Is Required.',       
                'file.mimes' => 'File Must Be In a Zip Format.',            
            ]);                 
            }
            $input['link'] = null;         
        }
        else
        {
            $this->validate($request, [
                   'link' => 'required',
               ]); 
                    if (file_exists(public_path().'/assets/files/'.$prod->file)) {
                    unlink(public_path().'/assets/files/'.$prod->file);
                }
                    $input['file'] = null;            
        }
        if ($request->galdel == 1){
            $gals = Gallery::where('product_id',$id)->get();
            foreach ($gals as $gal) {
                    if (file_exists(public_path().'/assets/images/gallery/'.$gal->photo)) {
                        unlink(public_path().'/assets/images/gallery/'.$gal->photo);
                    }
                $gal->delete();
            }
            
        }
        if(!in_array(null, $request->features) && !in_array(null, $request->colors))
        {             
            $input['features'] = implode(',', $request->features);  
            $input['colors'] = implode(',', $request->colors);                 
        }
        else
        {
            if(in_array(null, $request->features) || in_array(null, $request->colors))
            {
                $input['features'] = null;  
                $input['colors'] = null;
            }
            else
            {
                $features = explode(',', $prod->features);
                $colors = explode(',', $prod->colors);
                $input['features'] = implode(',', $features);  
                $input['colors'] = implode(',', $colors);
            }
        }  
        if(!in_array(null, $request->license) && !in_array(null, $request->license_qty))
        {             
            $input['license'] = implode(',,', $request->license);  
            $input['license_qty'] = implode(',', $request->license_qty);                 
        }
        else
        {
            if(in_array(null, $request->license) || in_array(null, $request->license_qty))
            {
                $input['license'] = null;  
                $input['license_qty'] = null;
            }
            else
            {
                $license = explode(',,', $prod->license);
                $license_qty = explode(',', $prod->license_qty);
                $input['license'] = implode(',,', $license);  
                $input['license_qty'] = implode(',', $license_qty);
            }
        }  

            if ($file = $request->file('file')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/files',$name);  
                if($prod->file != null)
                {
                    if (file_exists(public_path().'/assets/files/'.$prod->file)) {
                        unlink(public_path().'/assets/files/'.$prod->file);
                    }
                }           
                $input['file'] = $name;
                if($request->type_check1 == 2)
                {
                    unlink(public_path().'/assets/files/'.$input['file']);
                    $input['file'] = null;
                }
            }    


            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);   
                if($prod->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$prod->photo)) {
                        unlink(public_path().'/assets/images/'.$prod->photo);
                    }
                }          
                $input['photo'] = $name;
            }       
         
        if (!empty($request->tags)) 
         {
            $input['tags'] = implode(',', $request->tags);       
         }  
        if (empty($request->tags)) 
         {
            $input['tags'] = null;       
         }
        if ($request->pccheck == ""){
            $input['product_condition'] = 0;
        }
        if ($request->shcheck == ""){
            $input['ship'] = null;
        }  
        if (!empty($request->meta_tag)) 
         {
            $input['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;         
         }   
         $input['cprice'] = $input['cprice'] / $sign->value;
         $input['pprice'] = $input['pprice'] / $sign->value; 
         $input['user_id'] = $user->id;
        $prod->update($input);

        Session::flash('success', 'Product updated successfully.');
        return redirect()->route('user-prod-index');
    }

    public function destroy($id)
    {
        $prod = Product::findOrFail($id);
        if($prod->user_id != Auth::guard('user')->user()->id)
        {
            return redirect()->back();
        }
        if($prod->galleries->count() > 0)
        {
            foreach ($prod->galleries as $gal) {
                    if (file_exists(public_path().'/assets/images/gallery/'.$gal->photo)) {
                        unlink(public_path().'/assets/images/gallery/'.$gal->photo);
                    }
                $gal->delete();
            }

        }
        if($prod->reviews->count() > 0)
        {
            foreach ($prod->reviews as $gal) {
                $gal->delete();
            }
        }
        if($prod->wishlists->count() > 0)
        {
            foreach ($prod->wishlists as $gal) {
                $gal->delete();
            }
        }
        if($prod->clicks->count() > 0)
        {
            foreach ($prod->clicks as $gal) {
                $gal->delete();
            }
        }
        if($prod->comments->count() > 0)
        {
            foreach ($prod->comments as $gal) {
            if($gal->replies->count() > 0)
            {
                foreach ($gal->replies as $key) {
                    if($key->subreplies->count() > 0)
                    {
                        foreach ($key->subreplies as $key1) {
                            $key1->delete();
                        }
                    }
                    $key->delete();
                }
            }
                $gal->delete();
            }
        }
                    if (file_exists(public_path().'/assets/images/'.$prod->photo)) {
                        unlink(public_path().'/assets/images/'.$prod->photo);
                    }
                if($prod->file != null){
                    if (file_exists(public_path().'/assets/files/'.$prod->file)) {
                        unlink(public_path().'/assets/files/'.$prod->file);
                    }
                }
        $prod->delete();
        Session::flash('success', 'Product deleted successfully.');
        return redirect()->route('user-prod-index');
    }

}
