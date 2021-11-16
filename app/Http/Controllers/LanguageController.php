<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Illuminate\Support\Facades\Session;
class LanguageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
    {
        $datas = Language::orderBy('id','asc')->get(['id','language','is_default']);
        return view('admin.language.index',compact('datas'));
    }


    public function create()
    {
        return view('admin.language.create');
    }


    public function store(Request $request)
    {
        $lang = new Language();
        $data = $request->all();
        $lang->fill($data)->save();
        return redirect()->route('admin-lang-index')->with('success','Language Stored Successfully.');
    }

    public function edit($id)
    {
        $data = Language::findOrFail($id);
        return view('admin.language.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $lang = Language::findOrFail($id);
        $data = $request->all();
        $lang->update($data);
        return redirect()->route('admin-lang-index')->with('success','Language Updated Successfully.');
    }
      public function status($id1,$id2)
        {
            $faq = Language::findOrFail($id1);
            $faq->is_default = $id2;
            $faq->update();
            $faq = Language::where('id','!=',$id1)->update(['is_default' => 0]);
            return redirect()->route('admin-lang-index')->with('success','Successfully Updated The Status.');
        }

    public function destroy($id)
    {
        $data = Language::findOrFail($id);
        if($data->id == 1)
        {
    return redirect()->route('admin-lang-index')->with('unsuccess','You can not delete the primary language.');
        }
        $data->delete();
    return redirect()->route('admin-lang-index')->with('success','Language Deleted Successfully.');
    }
}
