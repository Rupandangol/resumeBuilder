<?php

namespace App\Traits;

use App\Model\AcademicQualification;
use App\Model\achievement;
use App\Model\Experience;
use App\Model\PersonalDetail;
use App\Model\PersonalProfile;
use App\Model\Reference;
use App\Model\Skill;
use App\Model\training;

trait CvHelper
{

    protected function checkSession()
    {
        $checkSession = session('cv_user_id', false);
        if (!$checkSession) {

            $this->_data['detail'] = [];
            $this->_data['profile'] = [];
            $this->_data['skill'] = [];
            $this->_data['education'] = [];
            $this->_data['experience'] = [];
            $this->_data['references'] = [];
            $this->_data['achievement'] = [];
            $this->_data['training'] = [];
        } else {

            $this->_data['detail'] = PersonalDetail::find($checkSession);
            $this->_data['profile'] = PersonalProfile::where('cv_id', $checkSession)->first();
            $this->_data['skill'] = Skill::where('cv_id', $checkSession)->get();
            $this->_data['education'] = AcademicQualification::where('cv_id', $checkSession)->get();
            $this->_data['experience'] = Experience::where('cv_id', $checkSession)->get();
            $this->_data['references'] = Reference::where('cv_id', $checkSession)->get();
            $this->_data['achievement'] = achievement::where('cv_id', $checkSession)->get();
            $this->_data['training'] = training::where('cv_id', $checkSession)->get();
        }
    }

    protected function resetSession()
    {
        session()->flush();
        session()->regenerate();
    }

}