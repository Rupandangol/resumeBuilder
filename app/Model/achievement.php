<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class achievement extends Model
{
    protected $table='achievements';
    protected $fillable=[
        'header',
        'about',
        'cv_id'
    ];
}
