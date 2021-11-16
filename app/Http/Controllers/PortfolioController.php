<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $ads = Portfolio::orderBy('id','desc')->get();
        return view('admin.portfolio.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.portfolio.create');
    }


    public function store(StoreValidationRequest $request)
    {
        $ad = new Portfolio();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $ad->fill($data)->save();
        return redirect()->route('admin-ad-index')->with('success','New Testimonial Added Successfully.');
    }


    public function edit($id)
    {
        $ad = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = Portfolio::findOrFail($id);
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
        $ad->update($data);
        return redirect()->route('admin-ad-index')->with('success','Testimonial Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = Portfolio::findOrFail($id);
        if($ad->photo == null){
        $ad->delete();
        return redirect()->route('admin-ad-index')->with('success','Testimonial Deleted Successfully.');
        }
                    if (file_exists(public_path().'/assets/images/'.$ad->photo)) {
                        unlink(public_path().'/assets/images/'.$ad->photo);
                    }
        $ad->delete();
        return redirect()->route('admin-ad-index')->with('success','Testimonial Deleted Successfully.');
    }
}
