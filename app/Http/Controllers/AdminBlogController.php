<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateValidationRequest;
class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $blogs = Blog::orderBy('id','desc')->get();
        return view('admin.blog.index',compact('blogs'));
    }


    public function create()
    {
        return view('admin.blog.create');
    }


    public function store(UpdateValidationRequest $request)
    {
        $blog = new Blog();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        if (!empty($request->meta_tag)) 
         {
            $data['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $data['meta_tag'] = null;
            $data['meta_description'] = null;         
         } 
        $blog->fill($data)->save();
        return redirect()->route('admin-blog-index')->with('success','New Blog Added Successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $metatags ="";
        if($blog->meta_tag != null)
        {
            $metatags = explode(',', $blog->meta_tag);            
        }
        return view('admin.blog.edit',compact('blog','metatags'));
    }

    public function update(UpdateValidationRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $data = $request->all();

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($blog->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$blog->photo)) {
                        unlink(public_path().'/assets/images/'.$blog->photo);
                    }
                }            
            $data['photo'] = $name;
            } 
        if (!empty($request->meta_tag)) 
         {
            $data['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $data['meta_tag'] = null;
            $data['meta_description'] = null;         
         } 
        $blog->update($data);
        return redirect()->route('admin-blog-index')->with('success','Blog Updated Successfully.');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if($blog->photo == null){
        $blog->delete();
        return redirect()->route('admin-blog-index')->with('success','Blog Deleted Successfully.');
        }
                    if (file_exists(public_path().'/assets/images/'.$blog->photo)) {
                        unlink(public_path().'/assets/images/'.$blog->photo);
                    }
        $blog->delete();
        return redirect()->route('admin-blog-index')->with('success','Blog Deleted Successfully.');
    }
}
