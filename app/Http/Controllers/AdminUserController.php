<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Classes\GeniusMailer;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;

class AdminUserController extends Controller 
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = Customer::orderBy('id','desc')->get();
        return view('admin.user.index',compact('users'));
    }

  public function status($id1,$id2)
    {
        $user = User::findOrFail($id1);
        $user->active = $id2;
        $user->featured = $id2;
        $user->update();
        if($id2 == 1)
        Session::flash('success', 'Successfully Activated The HandyMan.');
            else
        Session::flash('success', 'Successfully Deactivated The HandyMan.');

        return redirect()->route('admin-user-index');
    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.user.create',compact('cats'));
    }

    public function show($id)
    {
        $user = Customer::findOrFail($id);
       
        return view('admin.user.details',compact('user'));
    }
    public function edit($id)
    {
        $user = Customer::findOrFail($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Customer::findOrFail($id);
        $data = $request->all();
        if ($file = $request->file('photo'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);
            if($user->photo != null)
            {
                    if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                        unlink(public_path().'/assets/images/'.$user->photo);
                    }
            }
            $data['photo'] = $name;
        }
        $user->update($data);
        return redirect()->route('admin-user-index')->with('success','Customer Information Updated Successfully.');
    }

    public function store(StoreValidationRequest $request)
    {
        $user = new User;
        $input = $request->all();        
            if ($file = $request->file('photo')) 
            {              
                $name = time().$file->getClientOriginalName();
                $file->move('assets/images',$name);           
            $input['photo'] = $name;
            } 

            if($request->featured == "")
            {
                $input['featured'] = 0;
            }

            if(in_array(null, $request->title) || in_array(null, $request->details))
            {
                $input['title'] = null;  
                $input['details'] = null;
            }
            else 
            {             
                $input['title'] = implode(',', $request->title);  
                $input['details'] = implode(',', $request->details);                 
            }
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();
        Session::flash('success', 'New HandyMan added successfully.');
        return redirect()->route('admin-user-index');
    }


    public function destroy($id)
    {

        $user = Customer::findOrFail($id);


        if($user->reviews->count() > 0)
        {
            foreach ($user->reviews as $gal) {
                $gal->delete();
            }
        }

        if($user->notifications->count() > 0)
        {
            foreach ($user->notifications as $gal) {
                $gal->delete();
            }
        }

        if($user->notivications->count() > 0)
        {
            foreach ($user->notivications as $gal) {
                $gal->delete();
            }
        }

        if($user->wishlists->count() > 0)
        {
            foreach ($user->wishlists as $gal) {
                $gal->delete();
            }
        }


        if($user->favorites->count() > 0)
        {
            foreach ($user->favorites as $gal) {
                $gal->delete();
            }
        }


        if($user->subscribes->count() > 0)
        {
            foreach ($user->subscribes as $gal) {
                $gal->delete();
            }
        }

        if($user->sliders->count() > 0)
        {
            foreach ($user->sliders as $gal) {
                if (file_exists(public_path().'/assets/images/'.$gal->photo)) {
                    unlink(public_path().'/assets/images/'.$gal->photo);
                }
                $gal->delete();
            }
        }


        if($user->withdraws->count() > 0)
        {
            foreach ($user->withdraws as $gal) {
                $gal->delete();
            }
        }


        if($user->products->count() > 0)
        {
            foreach ($user->products as $prod) {
                if($prod->galleries->count() > 0)
                {
                    foreach ($prod->galleries as $gal) {
                            if (file_exists(public_path().'/assets/images/'.$gal->photo)) {
                                unlink(public_path().'/assets/images/'.$gal->photo);
                            }
                        $gal->delete();
                    }

                }
                if($prod->reviews->count() > 0)
                {
                    foreach ($prod->reviews as $gal) {
                        $gal->delete();
                    }
                }
                if($prod->wishlists->count() > 0)
                {
                    foreach ($prod->wishlists as $gal) {
                        $gal->delete();
                    }
                }
                if($prod->comments->count() > 0)
                {
                    foreach ($prod->comments as $gal) {
                    if($gal->replies->count() > 0)
                    {
                        foreach ($gal->replies as $key) {
                            if($key->subreplies->count() > 0)
                            {
                                foreach ($key->subreplies as $key1) {
                                    $key1->delete();
                                }
                            }
                            $key->delete();
                        }
                    }
                        $gal->delete();
                    }
                }
                if (file_exists(public_path().'/assets/images/'.$prod->photo)) {
                        unlink(public_path().'/assets/images/'.$prod->photo);
                }
                $prod->delete();
            }
        }


        if($user->socialProviders->count() > 0)
        {
            foreach ($user->socialProviders as $gal) {
                $gal->delete();
            }
        }

        if($user->senders->count() > 0)
        {
            foreach ($user->senders as $gal) {
            if($gal->messages->count() > 0)
            {
                foreach ($gal->messages as $key) {
                    $key->delete();
                }
            }
            if($gal->notifications->count() > 0)
            {
                foreach ($gal->notifications as $key) {
                    $key->delete();
                }
            }
                $gal->delete();
            }
        }


        if($user->recievers->count() > 0)
        {
            foreach ($user->recievers as $gal) {
            if($gal->messages->count() > 0)
            {
                foreach ($gal->messages as $key) {
                    $key->delete();
                }
            }
            if($gal->notifications->count() > 0)
            {
                foreach ($gal->notifications as $key) {
                    $key->delete();
                }
            }
                $gal->delete();
            }
        }


        if($user->conversations->count() > 0)
        {
            foreach ($user->conversations as $gal) {
            if($gal->messages->count() > 0)
            {
                foreach ($gal->messages as $key) {
                    $key->delete();
                }
            }
            if($gal->notifications->count() > 0)
            {
                foreach ($gal->notifications as $key) {
                    $key->delete();
                }
            }
                $gal->delete();
            }
        }
        if($user->comments->count() > 0)
        {
            foreach ($user->comments as $gal) {
            if($gal->replies->count() > 0)
            {
                foreach ($gal->replies as $key) {
                    if($key->subreplies->count() > 0)
                    {
                        foreach ($key->subreplies as $key1) {
                            $key1->delete();
                        }
                    }
                    $key->delete();
                }
            }
                $gal->delete();
            }
        }

            if($user->replies->count() > 0)
            {
                foreach ($user->replies as $gal) {
                    if($gal->subreplies->count() > 0)
                    {
                        foreach ($gal->subreplies as $key) {
                            $key->delete();
                        }
                    }
                    $key->delete();
                }
            }

            if($user->subreplies->count() > 0)
                {
                    foreach ($user->subreplies as $key) {
                        $key->delete();
                    }
                }

        if($user->photo == null){
         $user->delete();
        Session::flash('success', 'Data Deleted Successfully');
        return redirect()->route('admin-user-index');
        }

                    if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                        unlink(public_path().'/assets/images/'.$user->photo);
                    }
        $user->delete();
        Session::flash('success', 'Data Deleted Successfully');
        return redirect()->route('admin-user-index');
    }
}