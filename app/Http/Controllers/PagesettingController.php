<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagesetting;
use Illuminate\Support\Facades\Session;

class PageSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function about()
    {
        $pagedata = Pagesetting::find(1);
        return view('admin.pagesetting.about',compact('pagedata'));
    }

    public function faq()
    {
        $pagedata = Pagesetting::find(1);
        return view('admin.pagesetting.faq',compact('pagedata'));
    }

    public function contact()
    {
        $pagedata = Pagesetting::find(1);   
        return view('admin.pagesetting.contact',compact('pagedata'));
    }

    //Upadte About Page Section Settings
    public function aboutupdate(Request $request)
    {
        $page = Pagesetting::findOrFail(1);
        $input = $request->all();
        $page->update($input);
        Session::flash('success', 'About Us page content updated successfully.');
        return redirect()->route('admin-ps-about');
    }

    public function currencyup($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->is_currency = $status;
        $page->update();
        Session::flash('success', 'Currency Status Upated Successfully.');
        return redirect()->back();
    }

    //Upadte About Page Section Settings


    //Upadte FAQ Page Section Settings
    public function faqupdate($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->f_status = $status;
        $page->update();
        Session::flash('success', 'FAQ Status Upated Successfully.');
        return redirect()->back();
    }

    public function contactup($status)
    {
        $page = Pagesetting::findOrFail(1);
        $page->c_status = $status;
        $page->update();
        Session::flash('success', 'Contact Status Upated Successfully.');
        return redirect()->back();
    }

    //Upadte Contact Page Section Settings
    public function contactupdate(Request $request)
    {
        $page = Pagesetting::findOrFail(1);
        $input = $request->all();
        $page->update($input);
        Session::flash('success', 'Contact page content updated successfully.');
        return redirect()->route('admin-ps-contact');;
    }
    public function banner()
    {
        $data = Pagesetting::findOrFail(1);
        return view('admin.pagesetting.banner',compact('data'));
    }

    public function bannerup(Request $request)
    {
        $data = Pagesetting::findOrFail(1);
            $input = $request->all();
                if ($file = $request->file('bnimg')) 
                {    
                    $name = time().$file->getClientOriginalName();
                    $file->move('assets/images',$name);
                    if($data->bnimg != null)
                    {
                        unlink(public_path().'/assets/images/'.$data->bnimg);
                    }            
                $input['bnimg'] = $name;
                } 
            $data->update($input);
            return redirect()->route('admin-lbanner')->with('success','Successfully Updated The Information.');

    }
}
