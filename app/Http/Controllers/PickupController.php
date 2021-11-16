<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pickup;

class PickupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $picks = Pickup::orderBy('id','desc')->get();
        return view('admin.pickup.index',compact('picks'));
    }


    public function create()
    {
        return view('admin.pickup.create');
    }


    public function store(Request $request)
    {
        $pick = new Pickup();
        $data = $request->all();
        $pick->fill($data)->save();
        return redirect()->route('admin-pick-index')->with('success','Information Stored Successfully.');
    }

    public function edit($id)
    {
        $pick = Pickup::findOrFail($id);
        return view('admin.pickup.edit',compact('pick'));
    }

    public function update(Request $request, $id)
    {
        $pick = Pickup::findOrFail($id);
        $data = $request->all();
        $pick->update($data);
        return redirect()->route('admin-pick-index')->with('success','Information Updated Successfully.');
    }


    public function destroy($id)
    {
        $pick = Pickup::findOrFail($id);
        $pick->delete();
        return redirect()->route('admin-pick-index')->with('success','Information Deleted Successfully.');
    }
}
