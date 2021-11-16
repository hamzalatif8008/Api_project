<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() 
    {
        $cats = Category::orderBy('id','desc')->get();
        return view('admin.category.index',compact('cats'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function status($id1,$id2)
    {
        $cat = Category::findOrFail($id1);
        $cat->status = $id2;
        $cat->update();
        Session::flash('success', 'Successfully Updated The Status.');
        return redirect()->route('admin-cat-index');
    }

    public function set_type($id1,$id2)/////zee  set type 
    {
        $cat = Category::findOrFail($id1);
        $cat->type = $id2;
        $cat->update();
        Session::flash('success', 'Successfully Updated The Type.');

        $cat1 = DB::table('type_banner')->where('tb_ct_id',$id1)->first();

          if($cat1)
          {

          return view('admin.category.type_edit',['cat'=>$cat1]); 
          }
          else
          {
            
        
             return view('admin.category.type_edit_em',['cat'=>$id1]); 
          }
    }

    public function store(StoreValidationRequest $request)
    {
        // $this->validate($request, [
        //        'photo' => 'required',
        //    ]);
        $cat = new Category;
        $input = $request->all();
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
            $input['photo'] = $name;
            } 
        $cat->fill($input)->save();
        Session::flash('success', 'New Category added successfully.');
        return redirect()->route('admin-cat-index');
    }

    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.category.edit',compact('cat'));
    }

  public function type_edit()
    {
        
          $cat['cat'] = DB::table('type_banner')->where('tb_ct_id',$id)->first();

            // print_r($cat);
            // exit;
        return view('admin.category.type_edit',$cat);
    }


    public function type_update(UpdateValidationRequest $request, $id)
    {
        $cat = DB::table('type_banner')->where('tb_ct_id',$id)->first();
        // print_r($cat);
        // exit;
        $input = array() ; //$request->all();
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
               if($cat)
               {
 
                if($cat->tb_image != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$cat->tb_image)) {
                        unlink(public_path().'/assets/images/'.$cat->tb_image);
                    }
                } 
              }           
            $input['tb_image'] = $name;
            } 

         if ($file = $request->file('photo1')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($cat)
               {
                if($cat->tb_image1 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$cat->tb_image1)) {
                        unlink(public_path().'/assets/images/'.$cat->tb_image1);
                    }
                }
                }            
            $input['tb_image1'] = $name;
            } 

         if ($file = $request->file('photo2')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($cat)
               {
                if($cat->tb_image != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$cat->tb_image2)) {
                        unlink(public_path().'/assets/images/'.$cat->tb_image2);
                    }
                }
                }            
            $input['tb_image2'] = $name;
            $input['tb_ct_id'] = $id;
            $input['tb_created'] = date('Y-m-d H:m:i');
            } 
            if($cat)
            {
                DB::table('type_banner')->where('tb_id',$cat->tb_id)->update($input);
            }
            $cat = DB::table('type_banner')->insert($input);

        Session::flash('success', 'Category updated successfully.');
        return redirect()->route('admin-cat-index');
    }
    public function update(UpdateValidationRequest $request, $id)
    {
        $cat = Category::findOrFail($id);
        $input = $request->all();
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($cat->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$cat->photo)) {
                        unlink(public_path().'/assets/images/'.$cat->photo);
                    }
                }            
            $input['photo'] = $name;
            } 
        $cat->update($input);
        Session::flash('success', 'Category updated successfully.');
        return redirect()->route('admin-cat-index');
    }

    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        if($cat->subs->count()>0)
        {
            Session::flash('unsuccess', 'Remove the subcategories first !!!!');
            return redirect()->route('admin-cat-index');
        }
        if($cat->products->count()>0)
        {
            Session::flash('unsuccess', 'Remove the products first !!!!');
            return redirect()->route('admin-cat-index');
        }
        if($cat->photo == null){
         $cat->delete();
        Session::flash('success', 'Category deleted successfully.');
        return redirect()->route('admin-cat-index');
        }
                    if (file_exists(public_path().'/assets/images/'.$cat->photo)) {
                        unlink(public_path().'/assets/images/'.$cat->photo);
                    }
        $cat->delete();
        Session::flash('success', 'Category deleted successfully.');
        return redirect()->route('admin-cat-index');
    }
}
