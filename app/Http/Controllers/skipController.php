<?php

namespace App\Http\Controllers;

use App\Model\achievement;
use App\Model\Experience;
use App\Model\Reference;
use App\Model\training;
use Illuminate\Http\Request;

class skipController extends Controller
{
    public function skipExp()
    {
        $id = session('cv_user_id', false);
        if (Experience::where('cv_id', $id)->get()) {

            Experience::where('cv_id', $id)->delete();
        }
        return redirect(route('page8'));
    }

    public function skipRef()
    {

        $id = session('cv_user_id', false);
        if (Reference::where('cv_id', $id)->get()) {

            Reference::where('cv_id', $id)->delete();
        }
        return redirect(route('page7'));

    }

    public function skipTrain()
    {
        $id = session('cv_user_id', false);
        if (training::where('cv_id', $id)->get()) {
            training::where('cv_id', $id)->delete();
        }
        return redirect(route('page3'));
    }
    public function skipAchieve(){
        $id=session('cv_user_id',false);
        if (achievement::where('cv_id',$id)->get()){
            achievement::where('cv_id',$id)->delete();
        }
        return redirect(route('page6'));
    }
}
