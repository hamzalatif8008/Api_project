<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['conversation_id','message','sent_user','recieved_user'];
	public function conversation()
	{
        return $this->belongsTo('App\Models\Conversation');    
    }
}
