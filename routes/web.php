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
Route::get('/', 'frontendController@index');

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
Route::get('/template', 'frontendController@template')->name('page7')->middleware('checkTemplate');


Route::get('/template1View', 'frontendController@template1')->name('template1View')->middleware('checkTemplate');
Route::get('/template1Preview', 'frontendController@template1Action')->name('preview1')->middleware('checkTemplate');
//
Route::get('/template2View', 'frontendController@template2')->name('template2View')->middleware('checkTemplate');
Route::get('/template2Preview', 'frontendController@template2Action')->name('preview2')->middleware('checkTemplate');
//
Route::get('/template3View', 'frontendController@template3')->name('template3View')->middleware('checkTemplate');
Route::get('/templatePreview4', 'pdfController@previewCv')->name('preview3')->middleware('checkTemplate');

//
//flushing session
Route::get('/flush', 'frontendController@flushSession')->name('flushSession');

////    download
//Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template1/download', 'pdfController@download');
//Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template2/download', 'pdfController@download');
//Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template3/download', 'pdfController@download');
////    test


Route::get('/test', 'pdfController@templateItem1');