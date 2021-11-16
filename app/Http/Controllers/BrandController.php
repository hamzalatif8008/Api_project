<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class BrandController extends Controller
{
public function __construct()
    {
        $this->middleware('auth:admin');
    }

  	public function index()
    {
        $ads = Brand::orderBy('id','desc')->get();
        return view('admin.brands.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.brands.create');
    }


    public function store(StoreValidationRequest $request)
    {
		$this->validate($request, [
		       'photo' => 'required',
		   ]);
        $ad = new Brand();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $ad->fill($data)->save();
        return redirect()->route('admin-img-index')->with('success','New Image Added Successfully.');
    }


    public function edit($id)
    {
        $ad = Brand::findOrFail($id);
        return view('admin.brands.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = Brand::findOrFail($id);
        $data = $request->all();

            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->photo)) {
                        unlink(public_path().'/assets/images/'.$ad->photo);
                    }
                }            
            $data['photo'] = $name;
            } 
            else
            {
            	$data['photo'] = $ad->photo;
            }
        $ad->update($data);
        return redirect()->route('admin-img-index')->with('success','Image Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = Brand::findOrFail($id);
                    if (file_exists(public_path().'/assets/images/'.$ad->photo)) {
                        unlink(public_path().'/assets/images/'.$ad->photo);
                    }
        $ad->delete();
        return redirect()->route('admin-img-index')->with('success','Image Deleted Successfully.');
    }
}
