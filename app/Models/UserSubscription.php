<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subscription_id', 'title', 'currency', 'currency_code', 'price', 'days', 'allowed_products', 'details', 'method', 'txnid', 'charge_id', 'created_at', 'updated_at', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
