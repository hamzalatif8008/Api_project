<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorSlider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use Carbon\Carbon;
use Auth;

class VendorSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function logo()
    {
        $data = Auth::guard('user')->user();

        return view('user.slider.logo',compact('data'));
    }

    public function logoup(StoreValidationRequest $request)
    {
        $input = $request->all(); 
        $logo = Auth::guard('user')->user();        
            if ($file = $request->file('logo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($logo->logo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$logo->logo)) {
                        unlink(public_path().'/assets/images/'.$logo->logo);
                    }
                }            
            $input['logo'] = $name;
            }         
        $logo->update($input);
        
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('user-gs-logo');
    }

    public function gif()
    {
        $data = Auth::guard('user')->user();

        return view('user.slider.gif',compact('data'));
    }

    public function gifup(StoreValidationRequest $request)
    {
        $input = $request->all(); 
        $gif = Auth::guard('user')->user();        
            if ($file = $request->file('gif')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($gif->gif != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$gif->gif)) {
                        unlink(public_path().'/assets/images/'.$gif->gif);
                    }
                }            
            $input['gif'] = $name;
            }         
        $gif->update($input);
        $gif1 = Auth::guard('user')->user();        
            if ($file = $request->file('gif1')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($gif1->gif1 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$gif1->gif1)) {
                        unlink(public_path().'/assets/images/'.$gif1->gif1);
                    }
                }            
            $input['gif1'] = $name;
            }         
        $gif1->update($input);

        $gif2 = Auth::guard('user')->user();        
            if ($file = $request->file('gif2')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($gif2->gif2 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$gif2->gif2)) {
                        unlink(public_path().'/assets/images/'.$gif2->gif2);
                    }
                }            
            $input['gif2'] = $name;
            }         
        $gif2->update($input);
        
        Session::flash('success', 'Data Updated Successfully.');
        return redirect()->route('user-gs-gif');
    }

  	public function index()
    {
        $ads = VendorSlider::where('user_id','=',Auth::guard('user')->user()->id)->orderBy('id','desc')->get();
        return view('user.slider.index',compact('ads'));
    }


    public function create()
    {
        return view('user.slider.create');
    }


    public function store(StoreValidationRequest $request)
    {
		$this->validate($request, [
		       'photo' => 'required',
		   ]);
        $ad = new VendorSlider();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $data['user_id'] = Auth::guard('user')->user()->id;
        $ad->fill($data)->save();
        return redirect()->route('user-sl-index')->with('success','New Slider Added Successfully.');
    }


    public function edit($id)
    {
        $ad = VendorSlider::findOrFail($id);
        if($ad->user_id != Auth::guard('user')->user()->id)
        {
            return redirect()->back();
        }
        return view('user.slider.edit',compact('ad'));
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $ad = VendorSlider::findOrFail($id);
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
        return redirect()->route('user-sl-index')->with('success','Slider Updated Successfully.');
    }


    public function destroy($id)
    {
        $ad = VendorSlider::findOrFail($id);
        if($ad->user_id != Auth::guard('user')->user()->id)
        {
            return redirect()->back();
        }
                    if (file_exists(public_path().'/assets/images/'.$ad->photo)) {
                        unlink(public_path().'/assets/images/'.$ad->photo);
                    }
        $ad->delete();
        return redirect()->route('user-sl-index')->with('success','Slider Deleted Successfully.');
    }
    
}
