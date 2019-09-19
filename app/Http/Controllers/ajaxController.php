<?php

namespace App\Http\Controllers;

use App\Model\PersonalProfile;
use Illuminate\Http\Request;

class ajaxController extends Controller
{
    public function looking(Request $request){
        $id=$request->admin_id;
        $item=PersonalProfile::where('cv_id',$id)->first();
        if($item->interestedInJob==='yes'){
            $item->interestedInJob='no';
        }else{
            $item->interestedInJob='yes';
        }
        $item->save();
        return $item->interestedInJob;
    }
}
