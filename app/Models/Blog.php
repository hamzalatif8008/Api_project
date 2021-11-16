<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'details', 'photo', 'source', 'views', 'created_at', 'updated_at', 'status','meta_tag','meta_description'];
}
