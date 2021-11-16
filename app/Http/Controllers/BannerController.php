<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class BannerController extends Controller
{
public function __construct()
    {
        $this->middleware('auth:admin');
    }



    public function top()
    {
        $ad = Banner::findOrFail(1);
        $m_banners = Banner::whereNotNull('top4')->whereNotNull('top4l')->select('id','top4','top4l')->get();
        $m_banners1 = Banner::whereNotNull('top5')->whereNotNull('top5l')->select('id','top5','top5l')->get();
        return view('admin.banners.top',compact('ad','m_banners','m_banners1'));
    }

    public function shop($slug)
    {
        $m_banners = Banner::select('top4','top4l')->get();
        $m_banners1 = Banner::select('top5','top5l')->get();
        return view('admin.banners.shop',compact('m_banners','m_banners1','slug'));
    }

    
    public function topup(StoreValidationRequest $request)
    {
        $this->validate($request, [
               'top1' => 'mimes:jpeg,jpg,png',
               'top2' => 'mimes:jpeg,jpg,png',
               'top3' => 'mimes:jpeg,jpg,png',
               'top4' => 'mimes:jpeg,jpg,png',
               'top5' => 'mimes:jpeg,jpg,png',
           ],[ 
               'top1.mimes' => 'The Image type is invalid.',
               'top2.mimes' => 'The Image type is invalid.',
               'top3.mimes' => 'The Image type is invalid.',
               'top4.mimes' => 'The Image type is invalid.',
               'top5.mimes' => 'The Image type is invalid.',
            ]);
        $ad = Banner::findOrFail(1);
        $data = $request->all();

            if ($file = $request->file('top1')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top1 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top1)) {
                        unlink(public_path().'/assets/images/'.$ad->top1);
                    }

                }            
            $data['top1'] = $name;
            } 
            if ($file = $request->file('top2')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top2 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top2)) {
                        unlink(public_path().'/assets/images/'.$ad->top2);
                    }
                }            
            $data['top2'] = $name;
            } 
            if ($file = $request->file('top3')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top3 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top3)) {
                        unlink(public_path().'/assets/images/'.$ad->top3);
                    }
                }            
            $data['top3'] = $name;
            } 
            if ($file = $request->file('top4')) 
            {          
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top4 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top4)) {
                        unlink(public_path().'/assets/images/'.$ad->top4);
                    }
                }            
            $data['top4'] = $name;
            } 
            if ($file = $request->file('top5')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top5 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top5)) {
                        unlink(public_path().'/assets/images/'.$ad->top5);
                    }
                }            
            $data['top5'] = $name;
            } 
        $ad->update($data);
        return redirect()->route('admin-banner-top')->with('success','Data Updated Successfully.');
    }

    public function topup1(StoreValidationRequest $request)
    {
        $this->validate($request, [
               'top4' => 'mimes:jpeg,jpg,png',
               'top5' => 'mimes:jpeg,jpg,png',
           ],[ 
               'top4.mimes' => 'The Image type is invalid.',
               'top5.mimes' => 'The Image type is invalid.',
            ]);
        $ad = Banner::findOrFail(1);
        $data = $request->all();

        if ($file = $request->file('top4')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top4 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top4)) {
                        unlink(public_path().'/assets/images/'.$ad->top4);
                    }
                }            
            $data['top4'] = $name;
            } 
            if ($file = $request->file('top5')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top5 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top5)) {
                        unlink(public_path().'/assets/images/'.$ad->top5);
                    }
                }            
            $data['top5'] = $name;
            } 
             
            Banner::create($data);
        return redirect()->route('admin-banner-top')->with('success','Data Updated Successfully.');
    }

    public function update(StoreValidationRequest $request, $id)
    {
        $this->validate($request, [
               'top4' => 'mimes:jpeg,jpg,png',
               'top5' => 'mimes:jpeg,jpg,png',
           ],[ 
               'top5.mimes' => 'The Image type is invalid.',
            ]);
        $ad = Banner::findOrFail($id);
        $data = $request->all();

        if ($file = $request->file('top4')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top4 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top4)) {
                        unlink(public_path().'/assets/images/'.$ad->top4);
                    }
                }            
            $data['top4'] = $name;
            } 
            if ($file = $request->file('top5')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);
                if($ad->top5 != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$ad->top5)) {
                        unlink(public_path().'/assets/images/'.$ad->top5);
                    }
                }            
            $data['top5'] = $name;
            } 
             
            $ad->update($data);
        return redirect()->route('admin-banner-top')->with('success','Data Updated Successfully.');
    }

    public function bottom()
    {
        $ad = Banner::findOrFail(1);
        return view('admin.banners.bottom',compact('ad'));
    }

    public function bottomup(StoreValidationRequest $request)
    {
        $this->validate($request, [
               'bottom1' => 'mimes:jpeg,jpg,png',
               'bottom2' => 'mimes:jpeg,jpg,png'
           ],[ 
               'bottom1.mimes' => 'The Image type is invalid.',
               'bottom2.mimes' => 'The Image type is invalid.'
            ]);
        $ad = Banner::findOrFail(1);
        $data = $request->all();

        if ($file = $request->file('bottom1'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);
            if($ad->bottom1 != null)
            {
                    if (file_exists(public_path().'/assets/images/'.$ad->bottom1)) {
                        unlink(public_path().'/assets/images/'.$ad->bottom1);
                    }
            }
            $data['bottom1'] = $name;
        }
        if ($file1 = $request->file('bottom2'))
        {
            $name = time().$file1->getClientOriginalName();
            $file1->move('assets/images',$name);
            if($ad->bottom2 != null)
            {
                    if (file_exists(public_path().'/assets/images/'.$ad->bottom2)) {
                        unlink(public_path().'/assets/images/'.$ad->bottom2);
                    }
            }
            $data['bottom2'] = $name;
        }
        $ad->update($data);
        return redirect()->route('admin-banner-bottom')->with('success','Data Updated Successfully.');
    }

    public function edit($id,$slug)
    {
        $ad = Banner::findOrFail($id);
        return view('admin.banners.shopedit', compact('ad','slug'));
    }

    public function destroy($id)
    {
        $ad = Banner::findOrFail($id);
        $ad->delete();
        return redirect()->route('admin-banner-top')->with('success','Data Deleted Successfully.');
    }

}
