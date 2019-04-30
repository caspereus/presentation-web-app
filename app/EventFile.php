<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventFile extends Model
{
    protected $fillable = ['event_id','file_name','downloaded_count','file_password'];
}
