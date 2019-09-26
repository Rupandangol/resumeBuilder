<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {


        //for gender visualization
        $genderCount = array(DB::table('personal_details')->whereIn('gender', ['Male'])->count(), DB::table('personal_details')->whereIn('gender', ['Female'])->count(),DB::table('personal_details')->whereIn('gender', ['Others'])->count());
        $gender = array('Male', 'Female','Others');


        //for age visualization
        $test['item'] = DB::table('personal_details')->pluck('dateOfBirth');
        $gg = $test['item'];
        foreach ($gg as $date) {
            $temp[] = Carbon::parse($date)->age;
        }
        $ageCount = array('0-17' => 0, '18-22' => 0, '23-27' => 0, '28-31' => 0, '32-36' => 0, '37-41' => 0, '42-46' => 0, '47+' => 0);//initializing the array of age-group
        foreach ($temp as $val) {
            if ($val >= 0 && $val <= 17) {
                $ageCount['0-17'] = $ageCount['0-17'] + 1;
            } elseif ($val >= 18 && $val <= 22) {
                $ageCount['18-22'] = $ageCount['18-22'] + 1;
            } elseif ($val >= 23 && $val <= 27) {
                $ageCount['23-27'] = $ageCount['23-27'] + 1;
            } elseif ($val >= 28 && $val <= 31) {
                $ageCount['28-31'] = $ageCount['28-31'] + 1;
            } elseif ($val >= 32 && $val <= 36) {
                $ageCount['32-36'] = $ageCount['32-36'] + 1;
            } elseif ($val >= 37 && $val <= 41) {
                $ageCount['37-41'] = $ageCount['37-41'] + 1;
            } elseif ($val >= 42 && $val <= 46) {
                $ageCount['42-46'] = $ageCount['42-46'] + 1;
            } elseif ($val >= 47) {
                $ageCount['47+'] = $ageCount['47+'] + 1;
            }

        }

        $ageCountArray = array();
        $ageCountData = array();
        foreach ($ageCount as $key => $value) {
            if (!empty($value)) {
                array_push($ageCountArray, $key);
                array_push($ageCountData, $value);

            }

        }

        //max no for the x-axis in visualization

        $maxNo = max($ageCountData);


        //for industry data visualization

        $count = DB::table('personal_profiles')
            ->select('jobCategoryTitle', DB::raw('COUNT(*) as count'))
            ->groupBy('jobCategoryTitle')
            ->orderBy('count')
            ->get();

        if (!empty($count)) {
            foreach ($count as $count_no) {

                $jobCat = $count_no->jobCategoryTitle;
                $jobCount = $count_no->count;
                $jobIndustry[$jobCat] = $jobCount;
            }
        }

        $jobCatData = array();
        $jobCatCount = array();
        foreach ($jobIndustry as $key => $value) {
            array_push($jobCatData, $key);
            array_push($jobCatCount, $value);
        }


        //for calculating percentage to display in the label
        $total = array_sum($jobCatCount);
        $percentageArray = array();
        foreach ($jobCatCount as $key => $value) {
            $percentage = $value / $total * 100;
            array_push($percentageArray, $percentage);
        }

        //to visualize the candidates who are looking for job

        $interestedCandidateCount = array(DB::table('personal_profiles')->whereIn('interestedInJob', ['yes'])->count(), DB::table('personal_profiles')->whereIn('interestedInJob', ['no'])->count());
        $LookingFor = array('Interested', 'Not Interested');


        //to visualize level of JOB looking for

        $jobLevelCount = array(DB::table('personal_profiles')->whereIn('LookingFor', ['Senior Level'])->count(), DB::table('personal_profiles')->whereIn('LookingFor', ['Mid Level'])->count(),
            DB::table('personal_profiles')->whereIn('lookingFor', ['Entry Level'])->count());
        $jobLevel = array('Senior Level', 'Mid Level', 'Entry level');


        //to count the downloads no
//        $downloads=DownloadNumber::where('cv_id')->count();
        $downloads = DB::table('download_numbers')->count();


        //to count the interested people for job

        $jobSearchCount = DB::table('personal_profiles')->whereIn('interestedInJob', ['yes'])->count();


        //to count highest job category

        $highestJobCatCount = DB::table('personal_profiles')
            ->select('preferredLocation', DB::raw('COUNT(*) as count1'))
//        ->select('preferredLocation')
            ->groupBy('preferredLocation')
            ->orderBy('count1')
            ->get();


        foreach ($highestJobCatCount as $count_no1) {
            $Count = $count_no1->count1;
            $Cat = $count_no1->preferredLocation;
            $Industry[$Cat] = $Count;

        }


        $location = 0;
        $locationCount = 0;

        foreach ($Industry as $key => $value) {

            if ($value >= $location)
                $location = $key;
            $locationCount = $value;


        }
        //to count the full time count
        $fullTimeCount = DB::table('personal_profiles')->whereIN('availableFor', ['Full Time'])->count();
        $dash_active='active';

        return view('Backend.pages.dashboard', ['Gender' => $gender, 'GenderCount' => $genderCount, 'Age' => $temp, 'IndustryCount' => $count,
            'jobCat' => $jobCatData, 'jobCatCount' => $jobCatCount, 'percentage' => $percentageArray, 'AgeArray' => $ageCountArray, 'AgeData' => $ageCountData, 'MaxCount' => $maxNo,
            'InterestedCandidateCount' => $interestedCandidateCount, 'LookingFor' => $LookingFor, 'JobLevelCount' => $jobLevelCount, 'JobLevel' => $jobLevel, 'Downloads' => $downloads, 'JobSearchCount' => $jobSearchCount
            , 'Location' => $location, 'LocationCount' => $locationCount, 'FullTimeCount' => $fullTimeCount],compact('dash_active'));


    }
}
