<?php

namespace App\Http\Controllers;

use App\Models\Generalsetting;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\Models\User;
use App\Models\Withdraw;
use Auth;
use App\Models\Currency;
use Illuminate\Http\Request;

class VendorWithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

  	public function index()
    {
        $withdraws = Withdraw::where('user_id','=',Auth::guard('user')->user()->id)->orderBy('id','desc')->get();
        $sign = Currency::where('is_default','=',1)->first();        
        return view('user.withdraw.index',compact('withdraws','sign'));
    }


    public function create()
    {
        $sign = Currency::where('is_default','=',1)->first();
        return view('user.withdraw.withdraw' ,compact('sign'));
    }


    public function store(Request $request)
    {

        $from = User::findOrFail(Auth::guard('user')->user()->id);

        $withdrawcharge = Generalsetting::findOrFail(1);
        $charge = $withdrawcharge->withdraw_fee;

        if($request->amount > 0){

            $amount = $request->amount;

            if ($from->current_balance >= $amount){
                $fee = (($withdrawcharge->withdraw_charge / 100) * $amount) + $charge;
                $finalamount = $amount - $fee;
                $finalamount = number_format((float)$finalamount,2,'.','');

                $from->current_balance = $from->current_balance - $amount;
                $from->update();

                $newwithdraw = new Withdraw();
                $newwithdraw['user_id'] = Auth::guard('user')->user()->id;
                $newwithdraw['method'] = $request->methods;
                $newwithdraw['acc_email'] = $request->acc_email;
                $newwithdraw['iban'] = $request->iban;
                $newwithdraw['country'] = $request->acc_country;
                $newwithdraw['acc_name'] = $request->acc_name;
                $newwithdraw['address'] = $request->address;
                $newwithdraw['swift'] = $request->swift;
                $newwithdraw['reference'] = $request->reference;
                $newwithdraw['amount'] = $finalamount;
                $newwithdraw['fee'] = $fee;
                $newwithdraw['type'] = 'vendor';
                $newwithdraw->save();

                return redirect()->back()->with('success','Withdraw Request Sent Successfully.');

            }else{
                return redirect()->back()->with('unsuccess','Insufficient Balance.')->withInput();
            }
        }
            return redirect()->back()->with('unsuccess','Please enter a valid amount.')->withInput();

    }
}
