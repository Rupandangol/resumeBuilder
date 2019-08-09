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


//dashboard
Route::get('/', 'frontendController@index')->name('dashboard');

//cv Form

Route::get('/cvForm', 'frontendController@cvForm');
Route::post('/cvForm', 'frontendController@cvFormAction')->name('page1');
Route::get('/personalProfile', 'frontendController@personalProfile')->name('page2')->middleware('checkPersonalProfile');
Route::post('/personalProfile', 'frontendController@personalProfileAction');
Route::get('/skill', 'frontendController@skill')->middleware('checkSkill');
Route::post('/skill', 'frontendController@skillAction')->name('page3');
//
Route::get('/education', 'frontendController@education')->name('page4')->middleware('checkEducation');
Route::post('/education', 'frontendController@educationAction');
Route::get('/experience', 'frontendController@experience')->name('page5')->middleware('checkExperience');
Route::post('/experience', 'frontendController@experienceAction');
Route::get('/reference', 'frontendController@reference')->name('page6')->middleware('checkReference');
Route::post('/reference', 'frontendController@referenceAction');
//
////    update
//    Route::get('/personalProfile/skill/{id}/education/experience/referenceUpdate','frontendController@referenceUpdate')->name('updateReference','{id}');
//
////    Template
Route::get('/template', 'frontendController@template')->name('page7')->middleware('checkReference');


Route::get('/template1View', 'frontendController@template1')->name('template1View')->middleware('checkReference');
Route::get('/templatePreview1', 'pdfController@previewCv')->name('preview1')->middleware('checkReference');
//
Route::get('/template2View', 'frontendController@template2')->name('template2View')->middleware('checkReference');
Route::get('/templatePreview2', 'pdfController@previewCv')->name('preview2')->middleware('checkReference');
//
Route::get('/template3View', 'frontendController@template3')->name('template3View')->middleware('checkReference');
Route::get('/templatePreview4', 'pdfController@previewCv')->name('preview3')->middleware('checkReference');




Route::get('/afterDownload','pdfController@afterDownload')->name('afterDownload');
//
//flushing session
Route::get('/flush', 'frontendController@flushSession')->name('flushSession');

////    download
Route::get('/downloadCv1', 'pdfController@downloadCv')->name('downloadCv1');
Route::get('/downloadCv2', 'pdfController@downloadCv')->name('downloadCv2');
Route::get('/downloadCv4', 'pdfController@downloadCv')->name('downloadCv4');


////    test


Route::get('/test', 'pdfController@templateItem1');