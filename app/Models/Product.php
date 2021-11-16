<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'subcategory_id', 'childcategory_id', 'name', 'photo', 'size', 'color', 
    'description','cprice','pprice','stock','policy','featured','status', 'shop_status','views','tags','best','top',
    'hot','latest','big','deal_of_the_day','festival','features','colors','user_id','product_condition','ship',
    'meta_tag','meta_title','meta_keyword','meta_description','youtube','type','file','license','license_qty','link','platform','region',
    'licence_type','measure'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    public function subcategory()
    {
    	return $this->belongsTo('App\Models\Subcategory');
    }
 
    public function childcategory()
    {
    	return $this->belongsTo('App\Models\Childcategory');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function clicks()
    {
        return $this->hasMany('App\Models\ProductClick');
    }
}
