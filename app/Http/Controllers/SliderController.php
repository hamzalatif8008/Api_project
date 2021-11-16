<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $ads = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',compact('ads'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(StoreValidationRequest $request)
    {
		$this->validate($request, [
		       'photo' => 'required',
		   ]);
        $ad = new Slider();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $ad->fill($data)->save();
        return redirect()->route('admin-sl-index')->with('success','New Slider Added Successfully.');
    }


    public function edit($id)
    {
        $ad = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = Slider::findOrFail($id);
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
        return redirect()->route('admin-sl-index')->with('success','Slider Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = Slider::findOrFail($id);
                    if (file_exists(public_path().'/assets/images/'.$ad->photo)) {
                        unlink(public_path().'/assets/images/'.$ad->photo);
                    }
        $ad->delete();
        return redirect()->route('admin-sl-index')->with('success','Slider Deleted Successfully.');
    }
}
