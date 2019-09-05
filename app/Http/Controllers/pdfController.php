<?php

namespace App\Http\Controllers;

use App\Model\AcademicQualification;
use App\Model\achievement;
use App\Model\DownloadNumber;
use App\Model\Experience;
use App\Model\PersonalDetail;
use App\Model\PersonalProfile;
use App\Model\Reference;
use App\Model\Skill;
use App\Model\training;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class pdfController extends Controller
{
    public function templateItem1()
    {
        return view('Frontend.pages.templateItem.templateItem4');
    }

    public function previewCv()
    {
        $url = url()->current();
        $item = explode('/', $url);
        $itemId = explode('templatePreview', $item[3]);
        $id = session('cv_user_id', false);
        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->first();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $data['skill'] = Skill::where(['cv_id' => $id])->get();
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();
        $data['training'] = training::where(['cv_id' => $id])->get();
        $data['achievement'] = achievement::where(['cv_id' => $id])->get();


        $pdf = PDF::loadView('Frontend.pages.templateItem.templateItem' . $itemId[1], $data);

        return $pdf->stream();

    }


    public function downloadCv()
    {


        $sessionData['cv_id'] = session('cv_user_id');
        DownloadNumber::create($sessionData);

        $url = url()->current();

        $item = explode('/', $url);
        $itemId = explode('downloadCv', $item[3]);
        $id = session('cv_user_id', false);
        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->first();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $data['skill'] = Skill::where(['cv_id' => $id])->get();
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();
        $data['training'] = training::where(['cv_id' => $id])->get();
        $data['achievement'] = achievement::where(['cv_id' => $id])->get();

        $pdf = PDF::loadView('Frontend.pages.templateItem.templateItem' . $itemId[1], $data);


//        return $pdf->stream();
        return $pdf->download($data['personalDetail']->fullName . '.pdf');
    }


}

