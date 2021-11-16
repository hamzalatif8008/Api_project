<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserMessage extends Model
{
    protected $fillable = ['conversation_id','message','user_id'];
	public function conversation()
	{
	    return $this->belongsTo('App\AdminUserConversation','conversation_id');
	}
}
