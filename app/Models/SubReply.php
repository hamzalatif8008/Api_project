<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubReply extends Model
{
    use HasFactory;

    protected $fillable = ['reply_id', 'user_id','text'];
    
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function reply()
    {
    	return $this->belongsTo('App\Models\Reply');
    }
}
