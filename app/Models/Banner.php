<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    
    protected $fillable = ['top1','top2','top3','top4','top5','bottom1','bottom2','top1l','top2l','top3l','top4l','top5l','bottom1l','bottom2l'];
    public $timestamps = false;
}
