<?php

namespace App\Http\Controllers;

use App\Model\AcademicQualification;
use App\Model\achievement;
use App\Model\Experience;
use App\Model\PersonalDetail;
use App\Model\PersonalProfile;
use App\Model\Reference;
use App\Model\Skill;
use App\Model\training;
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
        $hide='0';
        return view('Frontend.pages.dashboard',compact('hide'));
    }

    public function createNew()
    {
        $this->flushSession();
        return redirect(route('page1'));
    }


    public function cvForm()
    {
        $hide='1';
        $detail_active='active';
        $this->checkSession();
        return view('Frontend.pages.cvForm', $this->_data,compact('detail_active','hide'));
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
        $data['countryCode']=$request->countryCode;
        $data['mobileNo'] =$request->mobileNo;
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
        $hide='1';

        $profile_active='active';

        $this->checkSession();
        return view('Frontend.pages.personalProfile', $this->_data,compact('profile_active','hide'));
    }

    public function personalProfileAction(Request $request)
    {
        $checkSession = session('cv_user_id', false);

        $this->validate($request, [
            'lookingFor' => 'required',
            'availableFor' => 'required',
            'jobCategory' => 'required',
            'expectedSalary' => 'required',
            'careerObjective' => 'required',
            'preferredLocation'=>'required',
            'jobCategoryTitle'=>'required'
        ]);

        $data['lookingFor'] = $request->lookingFor;
        $data['availableFor'] = $request->availableFor;
        $data['jobCategory'] = $request->jobCategory;
        $data['expectedSalary'] = $request->expectedSalary;
        $data['careerObjective'] = $request->careerObjective;
        $data['preferredLocation'] = $request->preferredLocation;
        $data['jobCategoryTitle'] = $request->jobCategoryTitle;
        $data['license']=$request->license;
        $data['vehicle']=$request->vehicle;
        $data['interestedInJob'] = $request->interestedInJob;

        $data['cv_id'] = $checkSession;
//        return $data;

        if (PersonalProfile::where('cv_id', $data['cv_id'])->first()) {
            PersonalProfile::where('cv_id', $data['cv_id'])->first()->update($data);
        } else {
            PersonalProfile::create($data);

        }
        return redirect(route('page4'));


    }

    public function skill()
    {
        $hide='1';

        $skill_active='active';

        $this->checkSession();
        return view('Frontend.pages.skill', $this->_data,compact('skill_active','hide'));
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

        return redirect(route('page9'));


    }


//    achievement

    public function achievement()
    {
                $hide='1';

        $achievement_active='active';

        $this->checkSession();
        return view('Frontend.pages.achievement', $this->_data,compact('achievement_active','hide'));
    }


    public function achievementAction(Request $request)
    {

        $id = session('cv_user_id', false);

        $this->validate($request, [
            'header' => 'required',
            'header.*' => 'required',
            'about' => 'required',
            'about.*' => 'required'
        ]);
        $achieve = $request->header;
        if (achievement::where('cv_id', $id)->first()) {
            achievement::where('cv_id', $id)->delete();
            foreach ($achieve as $key => $value) {
                $data['header'] = $request->header[$key];
                $data['about'] = $request->about[$key];
                $data['cv_id'] = $id;
                achievement::create($data);
            }
        } else {
            foreach ($achieve as $key => $value) {
                $data['header'] = $request->header[$key];
                $data['about'] = $request->about[$key];
                $data['cv_id'] = $id;
                achievement::create($data);
            }
        }


        return redirect(route('page6'));

    }


    public function education()
    {
                $hide='1';

        $education_active='active';

        $this->checkSession();


        return view('Frontend.pages.education', $this->_data,compact('education_active','hide'));
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
                $data['subjectTitle'] = $request->subjectTitle[$i];
                $data['attending'] = $request->attending[$i];
                $data['description'] = $request->description[$i];
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
                $data['subjectTitle'] = $request->subjectTitle[$i];
                $data['attending'] = $request->attending[$i];
                $data['description'] = $request->description[$i];

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


    public function training()
    {
                $hide='1';

        $training_active='active';

        $this->checkSession();

        return view('Frontend.pages.training', $this->_data,compact('training_active','hide'));
    }

    public function trainingAction(Request $request)
    {
        $id = session('cv_user_id', false);

        $this->validate($request, [
            'trainingName' => 'required',
            'trainingName.*' => 'required',
            'trainingCenter' => 'required',
            'trainingCenter.*' => 'required',
            'location' => 'required',
            'location.*' => 'required',
            'startTime' => 'required',
            'startTime.*' => 'required',
            'endTime' => 'required',
            'endTime.*' => 'required'
        ]);
        $train = $request->trainingCenter;

        if (training::where('cv_id', $id)->first()) {
            training::where('cv_id', $id)->delete();
            foreach ($train as $key => $value) {
                $data['trainingName'] = $request->trainingName[$key];
                $data['trainingCenter'] = $request->trainingCenter[$key];
                $data['location'] = $request->location[$key];
                $data['startTime'] = $request->startTime[$key];
                $data['endTime'] = $request->endTime[$key];
                $data['description'] = $request->description[$key];
                $data['cv_id'] = $id;
                training::create($data);
            }
        } else {
            foreach ($train as $key => $value) {
                $data['trainingName'] = $request->trainingName[$key];
                $data['trainingCenter'] = $request->trainingCenter[$key];
                $data['location'] = $request->location[$key];
                $data['startTime'] = $request->startTime[$key];
                $data['endTime'] = $request->endTime[$key];
                $data['description'] = $request->description[$key];
                $data['cv_id'] = $id;
                training::create($data);
            }
        }
        return redirect(route('page3'));


    }


    public function experience()
    {
                $hide='1';

        $experience_active='active';

        $this->checkSession();

        return view('/Frontend/pages/experience', $this->_data,compact('experience_active','hide'));
    }

    public function experienceAction(Request $request)
    {
//        return $request->all();
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
                $data['salary'] = $request->salary[$i];
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
                $data['salary'] = $request->salary[$i];
                $data['current'] = $request->current[$i];
                $data['cv_id'] = $id;
                Experience::create($data);
            }

        }
        return redirect(route('page8'));
    }


    public function reference()
    {
                $hide='1';

        $reference_active='active';

        $this->checkSession();
        return view('/Frontend/pages/reference', $this->_data,compact('reference_active','hide'));
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
                $hide='1';

        $template_active='active';

        return view('/Frontend/pages/template',compact('template_active','hide'));
    }

    public
    function template1()
    {
                $hide='1';


        return view('Frontend.pages.templateList.template1',compact('hide') );
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
        $hide='1';

        return view('Frontend.pages.templateList.template2',compact('hide') );
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
    {        $hide='1';

        return view('Frontend.pages.templateList.template3' ,compact('hide'));
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


    public function  Tac(){
        return view('TermsAndCondition.TaC');
    }

}