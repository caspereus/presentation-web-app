<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentator extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'phone',
    	'company',
    	'position',
    	'address',
    	'facebook',
    	'instagram',
    	'photo',
        'website',
        'about',
        'tweeter',
        'google',
    ];
}
