<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';
    protected $fillable = [
        'referee',
        'refereeContact',
        'cv_id'
    ];
}
