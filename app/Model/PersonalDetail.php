<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    protected $table = 'personal_details';
    protected $fillable = [
        'fullName',
        'email',
        'mobileNo',
        'image',
        'address'
    ];
}