<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sociallink extends Model
{
    use HasFactory;

    protected $fillable = ['facebook', 'twitter', 'gplus', 'linkedin','instagram','i_status', 'f_status', 't_status', 'g_status', 'l_status','fcheck','gcheck','fclient_id','fclient_secret','fredirect','gclient_id','gclient_secret','gredirect'];
    public $timestamps = false;
}
