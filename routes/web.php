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
    Route::post('/', 'frontendController@cvFormAction');
    Route::get('/personalProfile', 'frontendController@personalProfile');
    Route::post('/personalProfile', 'frontendController@personalProfileAction');
    Route::get('/personalProfile/skill/{id}', 'frontendController@skill');
    Route::post('/personalProfile/skill/{id}', 'frontendController@skillAction');

    Route::get('/personalProfile/skill/{id}/education', 'frontendController@education');
    Route::post('/personalProfile/skill/{id}/education', 'frontendController@educationAction');
    Route::get('/personalProfile/skill/{id}/education/experience', 'frontendController@experience');
    Route::post('/personalProfile/skill/{id}/education/experience', 'frontendController@experienceAction');
    Route::get('/personalProfile/skill/{id}/education/experience/reference', 'frontendController@reference');
    Route::post('/personalProfile/skill/{id}/education/experience/reference', 'frontendController@referenceAction');


//    Template
    Route::get('/personalProfile/skill/{id}/education/experience/reference/template', 'frontendController@template');
    Route::get('/personalProfile/skill/{id}/education/experience/reference/template/template1', 'frontendController@template1');
    Route::post('/personalProfile/skill/{id}/education/experience/reference/template/template1', 'frontendController@template1Action');
//    end of template


//    test

});
Route::get('/test','pdfController@templateItem1');