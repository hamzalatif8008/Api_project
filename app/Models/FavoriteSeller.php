<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteSeller extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
