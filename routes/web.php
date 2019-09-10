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

//achievement
Route::get('/achievement', 'frontendController@achievement')->name('page9')->middleware('checkAchievement');
Route::post('/achievement', 'frontendController@achievementAction');
Route::get('/achievementSkip', 'skipController@skipAchieve')->name('skipAchieve')->middleware('checkAchievement');

//reference
Route::get('/reference', 'frontendController@reference')->name('page6')->middleware('checkAchievement');
Route::post('/reference', 'frontendController@referenceAction');
Route::get('/referenceSkip', 'skipController@skipRef')->name('skipRef')->middleware('checkAchievement');
//

////    Template
Route::get('/template', 'frontendController@template')->name('page7')->middleware('checkAchievement');


Route::get('/template1View', 'frontendController@template1')->name('template1View')->middleware('checkAchievement');
Route::get('/templatePreview1', 'pdfController@previewCv')->name('preview1')->middleware('checkAchievement');
//
Route::get('/template2View', 'frontendController@template2')->name('template2View')->middleware('checkAchievement');
Route::get('/templatePreview2', 'pdfController@previewCv')->name('preview2')->middleware('checkAchievement');
//
Route::get('/template3View', 'frontendController@template3')->name('template3View')->middleware('checkAchievement');
Route::get('/templatePreview4', 'pdfController@previewCv')->name('preview3')->middleware('checkAchievement');

//TAC
Route::get('/TermsAndCondition','frontendController@Tac')->name('Tac');

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

Route::get('/@admin@', 'backendController@dashboard');


//admin
Route::get('/@admin@/addAdmin', 'backendController@addAdmin')->name('addAdmin');
Route::post('/@admin@/addAdmin','backendController@addAdminAction');

Route::get('/@admin@/manageAdmin', 'backendController@manageAdmin')->name('manageAdmin');


//view info
Route::get('/@admin@/viewInfo','backendController@viewInfo')->name('viewInfo');

//Details Info
Route::get('/@admin@/viewInfo/details/{id}','backendController@details')->name('detailInfo');
