<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Pagesetting;
use Illuminate\Http\Request;

class AdminCurrencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $faqs = Currency::all();
        $pagedata = Pagesetting::find(1); 
        return view('admin.currency.index',compact('faqs','pagedata'));
    }


    public function create()
    {
        return view('admin.currency.create');
    }


    public function store(Request $request)
    {
        $faq = new Currency();
        $data = $request->all();
        $faq->fill($data)->save();
        return redirect()->route('admin-currency-index')->with('success','New Currency Added Successfully.');
    }

      public function status($id1,$id2)
        {
            $faq = Currency::findOrFail($id1);
            $faq->is_default = $id2;
            $faq->update();
            $faq = Currency::all()->except($id1);
            foreach($faq as $fq)
            {
                $fq->is_default = 0;
                $fq->update();
            }
            return redirect()->route('admin-currency-index')->with('success','Successfully Updated The Status.');
        }
    public function edit($id)
    {
        $faq = Currency::findOrFail($id);
        return view('admin.currency.edit',compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Currency::findOrFail($id);
        $data = $request->all();
        $faq->update($data);
        return redirect()->route('admin-currency-index')->with('success','Currency Updated Successfully.');
    }


    public function destroy($id)
    {
        $faq = Currency::findOrFail($id);
        if($faq->id == 1)
        {
    return redirect()->route('admin-currency-index')->with('unsuccess','You can not delete the primary currency.');
        }
        $faq->delete();
        return redirect()->route('admin-currency-index')->with('success','Currency Deleted Successfully.');
    }
}
