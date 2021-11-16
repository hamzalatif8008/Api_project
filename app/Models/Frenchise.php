<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Frenchise extends Authenticatable
{
    use HasFactory, Notifiable;

    // use HasApiTokens, Notifiable;

   // protected $guard = 'user';

   protected $fillable = ['province','city','photo','reg_number','owner_name','father_name','cnic','frenchise_address','religion','city',
   'address','home_address','bank_account_1','bank_account_2','mobile_number','mobile_number_1','submit_amount',
   'remaining_amount','duration','partner','percentage','monthly_percentage','yearly_percentage','completion_percentage','vitnes','father_vitnes','cnic_vitnes','vitnes_address',
   'vitnes_mobile','vitnes_mobile_1','frenchise_name','frenchise_mobile_number','vendor_limit','email','password',
  'area','frenchise_message','frenchise_detail', 'f_url','g_url','t_url','i_url','l_url','f_check','g_check','t_check','i_check',
  'l_check',
  'gender','dob', 'zip','residency','phone1','shipping_cost','current_balance','affilate_code','affilate_income','date','status', 'mail_sent',

  ];

   protected $hidden = [
'password', 'remember_token',
];
  
public function vendors()
{
    return $this->hasMany('App\Models\user');
}
}
