<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';
    protected $fillable = [
        'name',
        'designation',
        'companyName',
        'contactNumber',
        'email',
        'cv_id'
    ];
}
