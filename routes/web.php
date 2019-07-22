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
Route::group(['prefix' => '/cvForm'], function () {
    Route::get('/', 'frontendController@cvForm');
    Route::post('/', 'frontendController@cvFormAction')->name('page1');
    Route::get('/personalProfile', 'frontendController@personalProfile')->name('page2');
    Route::post('/personalProfile', 'frontendController@personalProfileAction');
    Route::get('/personalProfile/skill/{id}', 'frontendController@skill');
    Route::post('/personalProfile/skill/{id}', 'frontendController@skillAction');

    Route::get('/personalProfile/skill/{id}/education', 'frontendController@education');
    Route::post('/personalProfile/skill/{id}/education', 'frontendController@educationAction');
    Route::get('/personalProfile/skill/{id}/education/experience', 'frontendController@experience');
    Route::post('/personalProfile/skill/{id}/education/experience', 'frontendController@experienceAction');
    Route::get('/personalProfile/skill/{id}/education/experience/reference', 'frontendController@reference');
    Route::post('/personalProfile/skill/{id}/education/experience/reference', 'frontendController@referenceAction');

//    update
    Route::get('/personalProfile/skill/{id}/education/experience/referenceUpdate','frontendController@referenceUpdate')->name('updateReference','{id}');

//    Template
    Route::get('/personalProfile/skill/{id}/education/experience/reference/template', 'frontendController@template');
    Route::get('/personalProfile/skill/{id}/education/experience/reference/template/template1', 'frontendController@template1');
    Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template1', 'frontendController@template1Action');

    Route::get('/personalProfile/skill/{id}/education/experience/reference/template/template2', 'frontendController@template2');
    Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template2', 'frontendController@template2Action');

    Route::get('/personalProfile/skill/{id}/education/experience/reference/template/template3', 'frontendController@template3');
    Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template3', 'frontendController@template3Action');

//    end of template

//    download
    Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template1/download', 'pdfController@download');
    Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template2/download', 'pdfController@download');
    Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template3/download', 'pdfController@download');
//    test

});
Route::get('/test', 'pdfController@templateItem1');