<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    protected $table = 'trainings';
    protected $fillable = [
        'trainingName',
        'trainingCenter',
        'location',
        'startTime',
        'endTime',
        'description',
        'cv_id'
    ];
}
