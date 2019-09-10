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
        'website',
        'image',
        'address',
        'dateOfBirth',
        'gender'
    ];

    public function getProfile(){
        return $this->hasOne(
          'App\Model\PersonalProfile',
          'cv_id',
          'id'
        );
    }
    public function getExp(){
        return $this->hasMany(
            'App\Model\Experience',
            'cv_id',
            'id'
        );
    }
    public function getSkill(){
        return $this->hasMany(
          'App\Model\Skill',
          'cv_id',
          'id'
        );
    }
    public function getEdu(){
        return $this->hasMany(
            'App\Model\AcademicQualification',
            'cv_id',
            'id'
        );
    }
}