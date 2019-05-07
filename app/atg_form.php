<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atg_form extends Model
{
    protected $table = 'atg_form';
    protected $fillable = ['name','email','pincode'];
    
}
