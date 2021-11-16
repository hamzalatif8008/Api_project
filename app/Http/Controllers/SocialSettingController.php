<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sociallink;
use Illuminate\Support\Facades\Session;

class SocialSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$socialdata = Sociallink::findOrFail(1);
        return view('admin.socialsetting.socialsetting',compact('socialdata'));
    }

    public function update(Request $request)
    {
        $socialdata = SocialLink::findOrFail(1);
        $input = $request->all();
        if ($request->f_status == ""){
            $input['f_status'] = 0;
        }
        if ($request->t_status == ""){
            $input['t_status'] = 0;
        }

        if ($request->g_status == ""){
            $input['g_status'] = 0;
        }

        if ($request->l_status == ""){
            $input['l_status'] = 0;
        }
        if ($request->i_status == ""){
            $input['i_status'] = 0;
        }

        $socialdata->update($input);
        Session::flash('success', 'Social links updated successfully.');
        return redirect()->route('admin-social-index');
    }
    public function facebook()
    {
        $socialdata = Sociallink::findOrFail(1);
        return view('admin.socialsetting.facebook',compact('socialdata'));
    }
    public function facebookupdate(Request $request)
    {
        $socialdata = SocialLink::findOrFail(1);
        $input = $request->all();
        $socialdata->update($input);
        Session::flash('success', 'Data updated successfully.');
        return redirect()->route('admin-social-facebook');
    }
    public function google()
    {
        $socialdata = Sociallink::findOrFail(1);
        return view('admin.socialsetting.google',compact('socialdata'));
    }
    public function googleupdate(Request $request)
    {
        $socialdata = SocialLink::findOrFail(1);
        $input = $request->all();
        $socialdata->update($input);
        Session::flash('success', 'Data updated successfully.');
        return redirect()->route('admin-social-google');
    }
    public function facebookup($status)
    {
        $page = SocialLink::findOrFail(1);
        $page->fcheck = $status;
        $page->update();
        Session::flash('success', 'Facebook Status Updated Successfully.');
        return redirect()->back();
    }
    public function googleup($status)
    {
        $page = SocialLink::findOrFail(1);
        $page->gcheck = $status;
        $page->update();
        Session::flash('success', 'Google Status Updated Successfully.');
        return redirect()->back();
    }
}
