<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    protected $table = 'personal_profiles';
    protected $fillable = [
        'lookingFor',
        'availableFor',
        'expectedSalary',
        'careerObjective',
        'careerSummary',
        'cv_id'
    ];
}
