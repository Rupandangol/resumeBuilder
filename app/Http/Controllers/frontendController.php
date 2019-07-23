<?php

namespace App\Http\Controllers;

use App\Model\AcademicQualification;
use App\Model\Experience;
use App\Model\PersonalDetail;
use App\Model\PersonalProfile;
use App\Model\Reference;
use App\Model\Skill;
use App\Traits\CvHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class frontendController extends Controller
{
    use CvHelper;
    private $_data = [];

    public function index()
    {
        return view('Frontend.pages.dashboard');
    }

    public function cvForm()
    {
        $this->checkSession();
        return view('Frontend.pages.cvForm', $this->_data);
    }


    public function cvFormAction(Request $request)
    {
        $checkSession = session('cv_user_id', false);


        $this->validate($request, [
            'fullName' => 'required',
            'email' => 'required',
            'mobileNo' => 'required',
//        'image' => 'required',
            'address' => 'required'
        ]);
        $data['fullName'] = $request->fullName;
        $data['email'] = $request->email;
        $data['mobileNo'] = $request->mobileNo;
        $data['address'] = $request->address;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = strtolower(($file->extension()));
            $newName = $request->fullName . time() . '_.' . $extension;
            Image::make($file)->resize(300, null, function ($ar) {
                $ar->aspectRatio();
            })->crop(200, 200)->save(public_path('/Uploads/userImage/' . $newName));
            $data['image'] = $newName;
        }
        if (!$checkSession) {

            if ($created = PersonalDetail::create($data)) {
                session()->put('cv_user_id', $created->id);

            } else {
                return redirect()->back()->with('fail', 'fail');
            }

        } else {
            PersonalDetail::find($checkSession)->update($data);

        }
        return redirect(route('page2'));

    }

    public function personalProfile()
    {
        $this->checkSession();
        return view('Frontend.pages.personalProfile', $this->_data);
    }

    public function personalProfileAction(Request $request)
    {
        $checkSession = session('cv_user_id', false);

        $this->validate($request, [
            'lookingFor' => 'required',
            'availableFor' => 'required',
            'expectedSalary' => 'required',
            'careerObjective' => 'required',
            'careerSummary' => 'required',
        ]);

        $data['lookingFor'] = $request->lookingFor;
        $data['availableFor'] = $request->availableFor;
        $data['expectedSalary'] = $request->expectedSalary;
        $data['careerObjective'] = $request->careerObjective;
        $data['careerSummary'] = $request->careerSummary;
        $data['cv_id'] = $checkSession;

        if (PersonalProfile::where('cv_id', $data['cv_id'])->first()) {
            PersonalProfile::where('cv_id', $data['cv_id'])->first()->update($data);
        } else {
            PersonalProfile::create($data);

        }
        return redirect(route('page3'));


    }

    public function skill()
    {
        return view('Frontend.pages.skill');
    }

    public function skillAction(Request $request)
    {


        $this->validate($request, [
            'skill' => 'required',
            'skillLevel' => 'required',
            'about' => 'required'
        ]);
        $skills = $request->skill;
        $count = 0;

        if (Skill::where('cv_id', session('cv_user_id'))->first()) {

            foreach ($skills as $skil) {
                $count++;
            }
            Skill::where('cv_id', session('cv_user_id'))->delete();
            for ($i = 0; $i < $count; $i++) {
                $data['skill'] = $request->skill[$i];
                $data['skillLevel'] = $request->skillLevel[$i];
                $data['about'] = $request->about[$i];
                $data['cv_id'] = session('cv_user_id', false);
                Skill::create($data);
            }


        } else {
            foreach ($skills as $skil) {
                $count++;
            }
            for ($i = 0; $i < $count; $i++) {
                $data['skill'] = $request->skill[$i];
                $data['skillLevel'] = $request->skillLevel[$i];
                $data['about'] = $request->about[$i];
                $data['cv_id'] = session('cv_user_id', false);
                Skill::create($data);
            }
        }

        return redirect(route('page4'));


    }


    public function education()
    {

        return view('Frontend.pages.education');
    }


    public function educationAction(Request $request)
    {
        $check = $request->checkMe;

        $this->validate($request, [
            'institute' => 'required',
            'location' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);
        $education = $request->institute;
        $count = 0;


        if (AcademicQualification::where('cv_id', session('cv_user_id'))->first()) {
            foreach ($education as $value) {
                $count++;
            }
            AcademicQualification::where('cv_id', session('cv_user_id'))->delete();

            for ($i = 0; $i < $count; $i++) {
                $data['institute'] = $request->institute[$i];
                $data['location'] = $request->location[$i];
                $data['startTime'] = $request->startTime[$i];
                if (!$check) {
                    $data['endTime'] = 'Still Attending';
                } else {
                    $data['endTime'] = $request->endTime[$i];
                }
                $data['cv_id'] = session('cv_user_id', false);
                AcademicQualification::create($data);
            }
        } else {
            foreach ($education as $value) {
                $count++;
            }
            for ($i = 0; $i < $count; $i++) {
                $data['institute'] = $request->institute[$i];
                $data['location'] = $request->location[$i];
                $data['startTime'] = $request->startTime[$i];
                if (!$check) {
                    $data['endTime'] = 'Still Attending';
                } else {
                    $data['endTime'] = $request->endTime[$i];
                }
                $data['cv_id'] = session('cv_user_id', false);
                AcademicQualification::create($data);
            }
        }
        return redirect(route('page5'));
    }

    public function experience()
    {
        return view('/Frontend/pages/experience');
    }

    public function experienceAction(Request $request)
    {
//        $this->validate($request, [
//            'jobTitle' => 'required',
//            'companyName' => 'required',
//            'location' => 'required',
//            'startTime' => 'required',
//            'endTime' => 'required',
//            'jobSummary' => 'required'
//        ]);
//
//        $experience = $request->jobTitle;
//        $count = 0;
//        foreach ($experience as $value) {
//            $count++;
//        }
//        for ($i = 0; $i < $count; $i++) {
//            $data['jobTitle'] = $request->jobTitle[$i];
//            $data['companyName'] = $request->companyName[$i];
//            $data['location'] = $request->location[$i];
//            $data['startTime'] = $request->startTime[$i];
//            $data['endTime'] = $request->endTime[$i];
//            $data['jobSummary'] = $request->jobSummary[$i];
//            $data['cv_id'] = $request->id;
//            Experience::create($data);
//        }
//
//
//        return redirect()->intended('/cvForm/personalProfile/skill/' . $data['cv_id'] . '/education/experience/reference');
    }


    public function reference()
    {

        return view('/Frontend/pages/reference');
    }

    public function referenceAction(Request $request)
    {
//        $this->validate($request, [
//            'referee' => 'required',
//            'refereeContact' => 'required'
//        ]);
//        $reference = $request->referee;
//        $count = 0;
//        foreach ($reference as $value) {
//            $count++;
//        }
//        for ($i = 0; $i < $count; $i++) {
//            $data['referee'] = $request->referee[$i];
//            $data['refereeContact'] = $request->refereeContact[$i];
//            $data['cv_id'] = $request->id;
//            Reference::create($data);
//        }
//
//
//        return redirect()->intended('/cvForm/personalProfile/skill/' . $data['cv_id'] . '/education/experience/reference/template');
    }

    public function template($id)
    {
        $itemTemplate['id'] = $id;
        return view('/Frontend/pages/template', $itemTemplate);
    }

    public function template1($id)
    {
        $itemTemplate1['id'] = $id;
        return view('Frontend.pages.templateList.template1', $itemTemplate1);
    }

    public function template1Action(Request $request)
    {
        $id = $request->id;

        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->get();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $data['skill'] = Skill::where(['cv_id' => $id])->get();
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();
        return view('Frontend.pages.templateItem.templateItem1', $data);
    }

    public function template2($id)
    {
        $itemTemplate['id'] = $id;
        return view('Frontend.pages.templateList.template2', $itemTemplate);
    }

    public function template2Action(Request $request)
    {
        $id = $request->id;

        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->get();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $data['skill'] = Skill::where(['cv_id' => $id])->get();
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();

        return view('Frontend.pages.templateItem.templateItem2', $data);
    }

    public function template3($id)
    {
        $itemTemplate['id'] = $id;
        return view('Frontend.pages.templateList.template3', $itemTemplate);
    }

    public function template3Action(Request $request)
    {
        $id = $request->id;

        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->get();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $data['skill'] = Skill::where(['cv_id' => $id])->get();
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();
        return view('Frontend.pages.templateItem.templateItem3', $data);
    }

    public function referenceUpdate(Request $request)
    {

        return $request->id;
    }


}