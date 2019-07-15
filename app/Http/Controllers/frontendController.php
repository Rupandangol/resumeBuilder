<?php

namespace App\Http\Controllers;

use App\Model\PersonalDetail;
use App\Model\PersonalProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontendController extends Controller
{
    public function index()
    {
        return view('Frontend.pages.dashboard');
    }

    public function cvForm()
    {
        return view('Frontend.pages.cvForm');
    }

    public function cvFormAction(Request $request)
    {
        $this->validate($request, [
            'fullName' => 'required',
            'email' => 'required',
            'mobileNo' => 'required',
            'address' => 'required'
        ]);
        $data['fullName'] = $request->fullName;
        $data['email'] = $request->email;
        $data['mobileNo'] = $request->mobileNo;
        $data['address'] = $request->address;
        if (PersonalDetail::create($data)) {
            return redirect()->intended('/cvForm/personalProfile');
        } else {
            return redirect()->back()->with('fail', 'fail');
        }
    }

    public function personalProfile()
    {
        return view('Frontend.pages.personalProfile');
    }

    public function personalProfileAction(Request $request)
    {
        $this->validate($request, [
            'lookingFor' => 'required',
            'availableFor' => 'required',
            'expectedSalary' => 'required',
            'careerObjective' => 'required',
            'careerSummary' => 'required',
        ]);
        $item = DB::table('personal_details')->latest('created_at')->first();
        $data['lookingFor'] = $request->lookingFor;
        $data['availableFor'] = $request->availableFor;
        $data['expectedSalary'] = $request->expectedSalary;
        $data['careerObjective'] = $request->careerObjective;
        $data['careerSummary'] = $request->careerSummary;
        $data['cv_id'] = $item->id;
        if (PersonalProfile::create($data)) {
            return redirect()->intended('/cvForm/personalProfile/skill');
        }
        return redirect()->back()->with('fail', 'fail');

    }

    public function skill()
    {
        return view('Frontend.pages.skill');
    }

    public function skillAction()
    {
        return redirect()->intended('/cvForm/personalProfile/skill/education');
    }


    public function education()
    {
        return view('Frontend.pages.education');
    }


    public function educationAction(Request $request)
    {
        return redirect()->intended('/cvForm/personalProfile/skill/education/experience');

    }

    public function experience()
    {
        return view('/Frontend/pages/experience');
    }

    public function experienceAction(Request $request)
    {
        return redirect()->intended('/cvForm/personalProfile/skill/education/experience/reference');
    }


    public function reference()
    {
        return view('/Frontend/pages/reference');
    }

}

