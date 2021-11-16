<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagesetting extends Model
{
    use HasFactory;

    protected $fillable = ['contact_success', 'contact_email', 'contact_title', 'contact_text', 'about', 'faq', 'c_status', 'a_status', 'f_status','bn','bnimg','is_currency'];

    public $timestamps = false;
}
