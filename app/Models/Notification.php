<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function order()
    {
    	return $this->belongsTo('App\Models\Order');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\User','vendor_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }

    public function conversation()
    {
        return $this->belongsTo('App\Models\Conversation');
    }

}
