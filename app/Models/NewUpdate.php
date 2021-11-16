<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewUpdate extends Model
{
    use HasFactory;
    protected $fillable = ['mainslider','mainslider1','mainslider2','sidebanner','sidebanner1','sidebanner2',
    'videobanner1','video1','videobanner2','video2','videobanner3','video3','video','tag'];
    public $timestamps = false;
}
