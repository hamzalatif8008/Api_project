<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    // use HasApiTokens, Notifiable;

   // protected $guard = 'user';

   protected $fillable = ['name','photo', 'zip', 'residency', 'city','password_api', 'address', 'phone', 'fax',
    'email','password','f_url','g_url','t_url','l_url','f_check','g_check','t_check','l_check',];

   protected $hidden = [
'password', 'remember_token',
];  

    //protected $remember_token = false;  


    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }
    public function vendororders()
    {
        return $this->hasMany('App\Models\Vendororder');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }
    public function subreplies()
    {
        return $this->hasMany('App\Models\SubReply');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist', 'user_id');
    }
    public function favorites()
    {
        return $this->hasMany('App\Models\FavoriteSeller', 'user_id');
    }
    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function sliders()
    {
        return $this->hasMany('App\Models\VendorSlider');
    }
    public function IsVendor(){
        if ($this->is_vendor == 2) {
           return true;
        }
        return false;
    }

    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }
    public function senders()
    {
        return $this->hasMany('App\Models\Conversation','sent_user');
    }
    public function recievers()
    {
        return $this->hasMany('App\Models\Conversation','recieved_user');
    }
    public function conversations()
    {
        return $this->hasMany('App\Models\AdminUserConversation');
    }
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }
    public function notivications()
    {
        return $this->hasMany('App\Models\Notification','vendor_id');
    }
    public function subscribes()
    {
        return $this->hasMany('App\Models\UserSubscription');
    }

    public function frenchise()
{
    return $this->belongsTo('App\Models\User','frenchise_id'); 
}
}
