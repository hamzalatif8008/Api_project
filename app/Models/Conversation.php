<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public function sent()
	{
	    return $this->belongsTo('App\Models\User', 'sent_user');
	}

	public function recieved()
	{
	    return $this->belongsTo('App\Models\User', 'recieved_user');
	}

	public function messages()
	{
	    return $this->hasMany('App\Models\Message');
	}

	public function notifications()
	{
	    return $this->hasMany('App\Models\UserNotification');
	}
}
