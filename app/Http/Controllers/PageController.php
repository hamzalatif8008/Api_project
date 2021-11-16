<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
 public function index()
    {
        $pages = Page::orderBy('pos','asc')->get();
        return view('admin.page.index',compact('pages'));
    }


    public function create()
    {
        return view('admin.page.create');
    }


    public function store(Request $request)
    {
      
        $slug = $request->slug;
        $main = array('home','faq','contact','blog','cart','checkout');
        if (in_array($slug, $main)) {
        return redirect()->back()->with('unsuccess','This slug has already been taken.');            
        }
        $this->validate($request, [
               'slug' => 'unique:pages'
           ],[ 
               'slug.unique' => 'This slug has already been taken.'
            ]);
        $page = new Page();
        $data = $request->all();
        if (!empty($request->meta_tag)) 
         {
            $data['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $data['meta_tag'] = null;
            $data['meta_description'] = null;         
         } 
        $page->fill($data)->save();
        return redirect()->route('admin-page-index')->with('success','New Page Added Successfully.');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $metatags = null;            

        if($page->meta_tag != null)
        {
            $metatags = explode(',', $page->meta_tag);            
        }
        return view('admin.page.edit',compact('page','metatags'));
    }

    public function update(Request $request, $id)
    {
        $slug = $request->slug;
        $main = array('home','faq','contact','blog','cart','checkout');
        if (in_array($slug, $main)) {
        return redirect()->back()->with('unsuccess','This slug has already been taken.');            
        }
        $pages = Page::all()->except($id);
        foreach($pages as $pg)
        {
            if($slug == $pg->slug)
            {
                return redirect()->back()->with('unsuccess','This slug has already been taken.');               
            }
        }
        $page = Page::findOrFail($id);
        $data = $request->all();
        if (!empty($request->meta_tag)) 
         {
            $data['meta_tag'] = implode(',', $request->meta_tag);       
         }  
        if ($request->secheck == "") 
         {
            $data['meta_tag'] = null;
            $data['meta_description'] = null;         
         } 
        $page->update($data);
        return redirect()->route('admin-page-index')->with('success','Page Updated Successfully.');
    }


    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('admin-page-index')->with('success','Page Deleted Successfully.');
    }
}
