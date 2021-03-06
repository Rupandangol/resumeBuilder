<?php

namespace App\Model\Backend;

//use Illuminate\Database\Eloquent\Model as Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class   Admin extends Authenticatable
    {
    protected $table = 'admins';
    protected $fillable = [
        'username',
        'password',
        'email',
        'privileges',
        'status',
        'remember_me'
    ];

}
