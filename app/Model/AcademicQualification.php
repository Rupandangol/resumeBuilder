<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AcademicQualification extends Model
{
    protected $table = 'academic_qualifications';
    protected $fillable = [
        'institute',
        'location',
        'startTime',
        'endTime',
        'cv_id'
    ];
}
