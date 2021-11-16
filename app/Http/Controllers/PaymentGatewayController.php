<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentGateway;
class PaymentGatewayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
 public function index()
    {

        $payments = PaymentGateway::orderBy('id','desc')->get();
        return view('admin.payment.index',compact('payments'));
    }


    public function create()
    {
        return view('admin.payment.create');
    }

  public function status($id1,$id2)
    {
        $payment = PaymentGateway::findOrFail($id1);
        $payment->status = $id2;
        $payment->update();
        return redirect()->route('admin-payment-index')->with('success','Status Updated Successfully.');
    }

    public function store(Request $request)
    {

        $payment = new PaymentGateway();
        $data = $request->all();
        $payment->fill($data)->save();
        return redirect()->route('admin-payment-index')->with('success','New Data Added Successfully.');
    }

    public function edit($id)
    {
        $payment = PaymentGateway::findOrFail($id);
        return view('admin.payment.edit',compact('payment'));
    }

    public function update(Request $request, $id)
    {

        $payment = PaymentGateway::findOrFail($id);
        $data = $request->all();
        $payment->update($data);
        return redirect()->route('admin-payment-index')->with('success','Data Updated Successfully.');
    }


    public function destroy($id)
    {
        $payment = PaymentGateway::findOrFail($id);
        $payment->delete();
        return redirect()->route('admin-payment-index')->with('success','Data Deleted Successfully.');
    }
}
