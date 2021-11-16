<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    use HasFactory;

    public function order()
    {
    	return $this->belongsTo('App\Models\Order');
    }


    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function conversation()
    {
        return $this->belongsTo('App\Models\Conversation');
    }
    public function conv1()
    {
        return $this->belongsTo('App\Models\AdminUserConversation','conversation1_id');
    }
}
