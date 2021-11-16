<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateValidationRequest;
use App\Models\VendorSubscription;
use App\Models\UserSubscription;
use Illuminate\Http\Request;

class VendorSubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $subs = VendorSubscription::orderBy('id','desc')->get();
        return view('admin.subscription.index',compact('subs'));
    }


    public function create()
    {
        return view('admin.subscription.create');
    }


    public function store(UpdateValidationRequest $request)
    {
        $subs = new VendorSubscription();
        $data = $request->all();
        if($data['limit'] == 0)
         {
        	$data['allowed_products'] = 0;
         }
        $subs->fill($data)->save();
        return redirect()->route('admin-subscription-index')->with('success','New Subscription Added Successfully.');
    }

    public function edit($id)
    {
        $subs = VendorSubscription::findOrFail($id);
        return view('admin.subscription.edit',compact('subs'));
    }

    public function update(UpdateValidationRequest $request, $id)
    {
        $subs = VendorSubscription::findOrFail($id);
        $data = $request->all();
        if($data['limit'] == 0)
        {
        	$data['allowed_products'] = 0;
        } 
        $subs->update($data);
        UserSubscription::where('subscription_id','=',$subs->id)->update(['allowed_products' => $subs->allowed_products]);
        return redirect()->route('admin-subscription-index')->with('success','Subscription Updated Successfully.');
    }


    public function destroy($id)
    {
        $subs = VendorSubscription::findOrFail($id);
        if($subs->photo == null){
        $subs->delete();
        return redirect()->route('admin-subscription-index')->with('success','Subscription Deleted Successfully.');
        }
                    if (file_exists(public_path().'/assets/images/'.$subs->photo)) {
                        unlink(public_path().'/assets/images/'.$subs->photo);
                    }
        $subs->delete();
        return redirect()->route('admin-subscriptio-index')->with('success','Subscription Deleted Successfully.');
    }
}
