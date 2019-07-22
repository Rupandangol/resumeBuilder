<?php

namespace App\Http\Controllers;

use App\Model\AcademicQualification;
use App\Model\Experience;
use App\Model\PersonalDetail;
use App\Model\PersonalProfile;
use App\Model\Reference;
use App\Model\Skill;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class pdfController extends Controller
{
    public function templateItem1()
    {
        return view('Frontend.pages.templateItem.templateItem1');
    }

    public function download(Request $request)
    {
        $id = $request->id;
        $url = url()->current();
        $item = explode('/', $url);
        $itemFile = explode('template', $item[11]);

        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->get();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $skills = Skill::where(['cv_id' => $id])->get();
        $skillData = '';
        foreach ($skills as $skill) {
            $skillData .= "<dd><h2>" . $skill->skill . "</h2><p>" . $skill->about . "</p></dd>";
        }
        $data['skill'] =$skillData;
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();


        $pdf = PDF::loadView('Frontend.pages.templateItem.templateItem' . $itemFile[1], $data);
        return $pdf->stream();
        return $pdf->download($data['personalDetail']->fullName . '.pdf');

    }
}
