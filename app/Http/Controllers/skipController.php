<?php

namespace App\Http\Controllers;

use App\Model\Experience;
use App\Model\Reference;
use Illuminate\Http\Request;

class skipController extends Controller
{
    public function skipExp()
    {
        $id = session('cv_user_id', false);
        if (Experience::where('cv_id', $id)->get()) {

            Experience::where('cv_id', $id)->delete();
        }
        return redirect(route('page6'));
    }

    public function skipRef()
    {

        $id = session('cv_user_id', false);
        if (Reference::where('cv_id', $id)->get()) {

            Reference::where('cv_id', $id)->delete();
        }
        return redirect(route('page7'));

    }
}
