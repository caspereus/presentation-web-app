<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'full_content',
    	'cover_image',
    	'category_id',
    	'views'
    ];
}
