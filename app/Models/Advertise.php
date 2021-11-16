<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;
    
    protected $fillable = ['type','script','photo','url','size','clicks','status'];
    public $timestamps = false;
}
