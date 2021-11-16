<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorSlider extends Model
{
    use HasFactory;

    protected $fillable = ['photo','user_id'];
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
