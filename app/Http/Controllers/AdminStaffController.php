<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;


class AdminStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $staffs = Admin::all();
        return view('admin.staff.index',compact('staffs'));
    }


    public function create()
    {
        return view('admin.staff.create');
    }


    public function store(UpdateValidationRequest $request)
    {
        $staff = new Admin();
        $data = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images',$name);           
            $data['photo'] = $name;
        } 
        $data['password'] = bcrypt($request['password']);
        $staff->fill($data)->save();
        return redirect()->route('admin-staff-index')->with('success','New Staff Added Successfully.');
    }


    public function show($id)
    {
        $staff = Admin::findOrFail($id);
        return view('admin.staff.show',compact('staff'));
    }


    public function destroy($id)
    {
    	if($id == 1)
    	{

        return redirect()->route('admin-staff-index')->with('unsuccess',"You don't have access to remove this admin");

    	}
        $staff = Admin::findOrFail($id);
        if($staff->photo == null){
        $staff->delete();
        return redirect()->route('admin-staff-index')->with('success','Staff Deleted Successfully.');
        }
                if (file_exists(public_path().'/assets/images/'.$staff->photo)) {
                   unlink(public_path().'/assets/images/'.$staff->photo);
               }
        $staff->delete();
        return redirect()->route('admin-staff-index')->with('success','Staff Deleted Successfully.');
    }
}
