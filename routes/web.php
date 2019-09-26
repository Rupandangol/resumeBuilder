<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

//frontend

//dashboard
Route::get('/', 'frontendController@index')->name('dashboard');
Route::get('/createNew', 'frontendController@createNew')->name('createNew');

//cv Form
Route::get('/cvForm', 'frontendController@cvForm');
Route::post('/cvForm', 'frontendController@cvFormAction')->name('page1');

//personalProfile
Route::get('/personalProfile', 'frontendController@personalProfile')->name('page2')->middleware('checkPersonalProfile');
Route::post('/personalProfile', 'frontendController@personalProfileAction');

//education
Route::get('/education', 'frontendController@education')->name('page4')->middleware('checkEducation');
Route::post('/education', 'frontendController@educationAction');

//experience
Route::get('/experience', 'frontendController@experience')->name('page5')->middleware('checkExperience');
Route::post('/experience', 'frontendController@experienceAction');
Route::get('/experienceSkip', 'skipController@skipExp')->name('skipExp')->middleware('checkExperience');

//Training
Route::get('/training', 'frontendController@training')->name('page8')->middleware('checkExperience');
Route::post('/training', 'frontendController@trainingAction');
Route::get('/trainingSkip', 'skipController@skipTrain')->name('skipTrain')->middleware('checkExperience');

//skill
Route::get('/skill', 'frontendController@skill')->middleware('checkSkill')->middleware('checkExperience');
Route::post('/skill', 'frontendController@skillAction')->name('page3');
Route::get('/skillSkip', 'skipController@skipSkill')->name('skipSkill');

//achievement
Route::get('/achievement', 'frontendController@achievement')->name('page9')->middleware('checkExperience');
Route::post('/achievement', 'frontendController@achievementAction');
Route::get('/achievementSkip', 'skipController@skipAchieve')->name('skipAchieve')->middleware('checkExperience');

//reference
Route::get('/reference', 'frontendController@reference')->name('page6')->middleware('checkExperience');
Route::post('/reference', 'frontendController@referenceAction');
Route::get('/referenceSkip', 'skipController@skipRef')->name('skipRef')->middleware('checkExperience');
//

////    Template
Route::get('/template', 'frontendController@template')->name('page7')->middleware('checkExperience');


Route::get('/template1View', 'frontendController@template1')->name('template1View')->middleware('checkExperience');
Route::get('/templatePreview1', 'pdfController@previewCv')->name('preview1')->middleware('checkExperience');
//
Route::get('/template2View', 'frontendController@template2')->name('template2View')->middleware('checkExperience');
Route::get('/templatePreview2', 'pdfController@previewCv')->name('preview2')->middleware('checkExperience');
//
Route::get('/template3View', 'frontendController@template3')->name('template3View')->middleware('checkExperience');
Route::get('/templatePreview4', 'pdfController@previewCv')->name('preview3')->middleware('checkExperience');

//TAC
Route::get('/TermsAndCondition', 'frontendController@Tac')->name('Tac');

Route::get('/afterDownload', 'pdfController@afterDownload')->name('afterDownload');
//
//flushing session
Route::get('/flush', 'frontendController@flushSession')->name('flushSession');

////    download
Route::get('/downloadCv1', 'pdfController@downloadCv')->name('downloadCv1');
Route::get('/downloadCv2', 'pdfController@downloadCv')->name('downloadCv2');
Route::get('/downloadCv4', 'pdfController@downloadCv')->name('downloadCv4');


////    test


Route::get('/test', 'pdfController@templateItem1');


//backend
Route::group(['prefix' => '@admin@', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'dashboardController@dashboard')->name('admin-dashboard');


//admin
    Route::get('/addAdmin', 'backendController@addAdmin')->name('addAdmin');
    Route::post('/addAdmin', 'backendController@addAdminAction');


    Route::get('/manageAdmin', 'backendController@manageAdmin')->name('manageAdmin');
    Route::get('/manageAdmin/delete/{id}', 'backendController@deleteAdmin')->name('deleteAdmin');
    Route::get('/manageAdmin/update/{id}', 'backendController@updateAdmin')->name('updateAdmin');
    Route::post('/manageAdmin/update/{id}', 'backendController@updateAdminAction');

//view info Updater
    Route::get('/viewInfo', 'backendController@viewInfo')->name('viewInfo');

    //full data
    Route::get('/fullData','backendController@fullData')->name('fullData');


//looking for job
    Route::get('/viewInfo/looking', 'ajaxController@looking');

//Details Info
    Route::get('/viewInfo/details/{id}', 'backendController@details')->name('detailInfo');
    Route::get('/viewInfo/details/deleteProfile/{id}','backendController@profileDelete')->name('profileDelete');

//Status
    Route::get('/manageAdmin/status', 'statusController@statusAction')->name('statusAction');


//    cv Backend Download
    Route::get('/viewInfo/details/cvDownload/{id}','pdfController@cvBackendDownload')->name('cvBackendDownload');
    Route::get('/viewInfo/details/cvPreview/{id}','pdfController@cvBackendPreview')->name('cvBackendPreview');


    Route::get('/excel/download', 'backendController@excelD')->name('excelDownload');
});

//login
Route::get('/loginAdmin', 'loginController@login')->name('loginAdmin');
Route::post('/loginAdmin', 'loginController@loginAction');
Route::get('/logoutAdmin', 'loginController@logOutAdmin')->name('logoutAdmin');

//Forgot password
Route::get('/resetLink','loginController@resetlink')->name('resetLink');
Route::post('/resetLink','loginController@resetlinkPost');
Route::get('/reset/{token?}','loginController@reset')->name('reset');
Route::post('/reset/{token?}','loginController@resetPost');




//AUth
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
