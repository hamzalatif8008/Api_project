<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;
    
    protected $fillable = ['subcategory_id','child_name','child_slug','featured'];
    public $timestamps = false;

    public function subcategory()
    {
    	return $this->belongsTo('App\Models\Subcategory');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}

