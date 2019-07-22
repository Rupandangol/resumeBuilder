<?php

namespace App\Traits;
use App\Model\PersonalDetail;
use App\Model\PersonalProfile;

trait CvHelper
{

    protected function checkSession(){
        $checkSession = session('cv_user_id',false);
        if (!$checkSession) {

            $this->_data['detail'] = [];
            $this->_data['profile'] = [];
        }else {

            $this->_data['detail'] = PersonalDetail::find($checkSession);
            $this->_data['profile'] = PersonalProfile::where('cv_id',$checkSession)->first();
        }
    }

    protected function resetSession(){
        session()->flush();
        session()->regenerate();
    }

}