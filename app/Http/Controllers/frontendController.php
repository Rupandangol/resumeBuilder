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
//            'website' => 'required',
//        'image' => 'required',
            'dateOfBirth' => 'required',
            'address' => 'required'
        ], [
            'required' => 'Do not leave empty box',
        ]);
        $data['fullName'] = $request->fullName;
        $data['email'] = $request->email;
        $data['mobileNo'] = $request->mobileNo;
        $data['website'] = $request->website;
        $data['address'] = $request->address;
        $data['dateOfBirth'] = $request->dateOfBirth;
        $data['gender'] = $request->gender;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = strtolower(($file->extension()));
            $newName = $request->fullName . time() . '_.' . $extension;
            Image::make($file)->save(public_path('/Uploads/userImage/' . $newName));
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
            'jobCategory' => 'required',
            'expectedSalary' => 'required',
            'careerObjective' => 'required'
        ]);

        $data['lookingFor'] = $request->lookingFor;
        $data['availableFor'] = $request->availableFor;
        $data['jobCategory'] = $request->jobCategory;
        $data['expectedSalary'] = $request->expectedSalary;
        $data['careerObjective'] = $request->careerObjective;
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
        $this->checkSession();
        return view('Frontend.pages.skill', $this->_data);
    }

    public function skillAction(Request $request)
    {
        $this->validate($request, [
            'skill' => 'required',
            'skill.*' => 'required',
            'skillLevel' => 'required',
            'skillLevel.*' => 'required',
            'about' => 'required',
            'about.*' => 'required'
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
        $this->checkSession();


        return view('Frontend.pages.education', $this->_data);
    }


    public function educationAction(Request $request)
    {


        $id = session('cv_user_id', false);
        $check = $request->checkMe;

        $this->validate($request, [
            'institute' => 'required',
            'institute.*' => 'required',
            'location' => 'required',
            'location.*' => 'required',
            'startTime' => 'required',
            'startTime.*' => 'required',
            'subject' => 'required',
            'subject.*' => 'required',
        ]);


        if (AcademicQualification::where('cv_id', $id)->first()) {

            $education = $request->institute;
            $count = 0;
            foreach ($education as $value) {
                $count++;
            }
            AcademicQualification::where('cv_id', $id)->delete();

            for ($i = 0; $i < $count; $i++) {
                $data['institute'] = $request->institute[$i];
                $data['location'] = $request->location[$i];
                $data['subject'] = $request->subject[$i];
                $data['attending'] = $request->attending[$i];
                $data['startTime'] = $request->startTime[$i];
                if ($data['attending'] === "true") {
                    $data['grade'] = 'attending';
                    $data['endTime'] = 'attending';
                } else {
                    $data['grade'] = $request->grade[$i];
                    $data['endTime'] = $request->endTime[$i];
                }

                $data['cv_id'] = $id;
                AcademicQualification::create($data);
            }
        } else {
            $education = $request->institute;
            $count = 0;
            foreach ($education as $value) {
                $count++;
            }
            for ($i = 0; $i < $count; $i++) {
                $data['institute'] = $request->institute[$i];
                $data['location'] = $request->location[$i];
                $data['subject'] = $request->subject[$i];
                $data['attending'] = $request->attending[$i];

                $data['startTime'] = $request->startTime[$i];
                if ($data['attending'] === 'true') {
                    $data['grade'] = 'attending';
                    $data['endTime'] = 'attending';
                } else {
                    $data['grade'] = $request->grade[$i];
                    $data['endTime'] = $request->endTime[$i];
                }

                $data['cv_id'] = $id;
                AcademicQualification::create($data);
            }
        }
        return redirect(route('page5'));
    }

    public function experience()
    {
        $this->checkSession();

        return view('/Frontend/pages/experience', $this->_data);
    }

    public function experienceAction(Request $request)
    {
        $id = session('cv_user_id', false);
        $this->validate($request, [
            'jobTitle' => 'required',
            'jobTitle.*' => 'required',
            'companyName' => 'required',
            'companyName.*' => 'required',
            'location' => 'required',
            'location.*' => 'required',
            'startTime' => 'required',
            'startTime.*' => 'required',
            'jobSummary' => 'required',
            'jobSummary.*' => 'required'
        ]);

        $experience = $request->jobTitle;
        $count = 0;

        if (Experience::where('cv_id', $id)->first()) {
            foreach ($experience as $value) {
                $count++;
            }
            Experience::where('cv_id', $id)->delete();
            for ($i = 0; $i < $count; $i++) {
                $data['jobTitle'] = $request->jobTitle[$i];
                $data['companyName'] = $request->companyName[$i];
                $data['location'] = $request->location[$i];
                $data['startTime'] = $request->startTime[$i];
                if ($request->current[$i] === 'true') {
                    $data['endTime'] = 'Current';

                } else {
                    $data['endTime'] = $request->endTime[$i];
                }

                $data['jobSummary'] = $request->jobSummary[$i];
                $data['current'] = $request->current[$i];
                $data['cv_id'] = $id;
                Experience::create($data);
            }
        } else {

            foreach ($experience as $value) {
                $count++;
            }
            for ($i = 0; $i < $count; $i++) {
                $data['jobTitle'] = $request->jobTitle[$i];
                $data['companyName'] = $request->companyName[$i];
                $data['location'] = $request->location[$i];
                $data['startTime'] = $request->startTime[$i];
                if ($request->current[$i] === 'true') {
                    $data['endTime'] = 'Current';
                } else {
                    $data['endTime'] = $request->endTime[$i];
                }
                $data['jobSummary'] = $request->jobSummary[$i];
                $data['current'] = $request->current[$i];
                $data['cv_id'] = $id;
                Experience::create($data);
            }

        }
        return redirect(route('page6'));
    }


    public function reference()
    {
        $this->checkSession();
        return view('/Frontend/pages/reference', $this->_data);
    }

    public function referenceAction(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'name.*' => 'required',
            'designation' => 'required',
            'designation.*' => 'required',
            'companyName' => 'required',
            'companyName.*' => 'required',
            'contactNumber' => 'required',
            'contactNumber.*' => 'required',
            'email' => 'required',
            'email.*' => 'required'
        ]);

        $reference = $request->name;
        $count = 0;
        if (Reference::where('cv_id', session('cv_user_id', false))->first()) {
            Reference::where('cv_id', session('cv_user_id', false))->delete();
            foreach ($reference as $value) {
                $count++;
            }
            for ($i = 0; $i < $count; $i++) {
                $data['name'] = $request->name[$i];
                $data['designation'] = $request->designation[$i];
                $data['companyName'] = $request->companyName[$i];
                $data['contactNumber'] = $request->contactNumber[$i];
                $data['email'] = $request->email[$i];
                $data['cv_id'] = session('cv_user_id', false);
                Reference::create($data);
            }
        } else {
            foreach ($reference as $value) {
                $count++;
            }
            for ($i = 0; $i < $count; $i++) {
                $data['name'] = $request->name[$i];
                $data['designation'] = $request->designation[$i];
                $data['companyName'] = $request->companyName[$i];
                $data['contactNumber'] = $request->contactNumber[$i];
                $data['email'] = $request->email[$i];
                $data['cv_id'] = session('cv_user_id', false);
                Reference::create($data);
            }
        }
        return redirect(route('page7'));
    }

    public
    function template()
    {

        return view('/Frontend/pages/template');
    }

    public
    function template1()
    {

        return view('Frontend.pages.templateList.template1');
    }

    public
    function template1Action()
    {
        $id = session('cv_user_id', false);

        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->get();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $data['skill'] = Skill::where(['cv_id' => $id])->get();
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();
        return view('Frontend.pages.templateItem.templateItem1', $data);
    }

    public function template2()
    {

        return view('Frontend.pages.templateList.template2');
    }

    public function template2Action()
    {
        $id = session('cv_user_id', false);

        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->get();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $data['skill'] = Skill::where(['cv_id' => $id])->get();
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();

        return view('Frontend.pages.templateItem.templateItem2', $data);
    }

    public function template3()
    {
        return view('Frontend.pages.templateList.template3');
    }

    public function template3Action()
    {
        $id = session('cv_user_id', false);

        $data['personalDetail'] = PersonalDetail::find($id);
        $data['personalProfile'] = PersonalProfile::where(['cv_id' => $id])->get();
        $data['education'] = AcademicQualification::where(['cv_id' => $id])->get();
        $data['skill'] = Skill::where(['cv_id' => $id])->get();
        $data['experience'] = Experience::where(['cv_id' => $id])->get();
        $data['reference'] = Reference::where(['cv_id' => $id])->get();
        return view('Frontend.pages.templateItem.templateItem4', $data);
    }

    public function flushSession()
    {
        $this->resetSession();
        return redirect(route('page1'));
    }


}