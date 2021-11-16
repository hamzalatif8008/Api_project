<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Markury\MarkuryPost;

class Admin extends Authenticatable
{
    use HasFactory;
    
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role', 'photo', 'created_at', 'updated_at', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function IsAdmin(){
        if ($this->role == 'Administrator') {
           return true;
        }
        return false;
    }
    public function conversations()
    {
        return $this->hasMany('App\Models\AdminUserConversation');
     }
 
}