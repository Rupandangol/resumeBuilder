<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';
    protected $fillable = [
        'jobTitle',
        'companyName',
        'location',
        'startTime',
        'endTime',
        'jobSummary',
        'salary',
        'current',
        'cv_id'
    ];
}
