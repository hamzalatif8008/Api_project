<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['cat_name', 'cat_slug','featured','photo'];
    public $timestamps = false;


    public function subs()
    {
    	return $this->hasMany('App\Models\Subcategory');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
