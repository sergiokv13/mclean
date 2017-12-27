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

Route::get('/', 'main@index');
Auth::routes();

Route::get('/home', 'main@index')->name('home');

Route::get('/no_authorization', 'HomeController@no_authorization')->name('no_authorization');

Route::post('/contact_mail', 'HomeController@contact_mail')->name('contact_mail');

Route::group(['middleware'=> 'web'],function(){
});

Route::group(['middleware'=> 'web'],function(){
});

Route::group(['middleware'=> 'web'],function(){
});
Route::group(['middleware'=> 'web'],function(){
});
Route::group(['middleware'=> 'web'],function(){
});
Route::group(['middleware'=> 'web'],function(){
});
//website_information Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('website_information','\App\Http\Controllers\Website_informationController');
  Route::post('website_information/{id}/update','\App\Http\Controllers\Website_informationController@update');
  Route::get('website_information/{id}/delete','\App\Http\Controllers\Website_informationController@destroy');
  Route::get('website_information/{id}/deleteMsg','\App\Http\Controllers\Website_informationController@DeleteMsg');
});

//partner Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('partner','\App\Http\Controllers\PartnerController');
  Route::post('partner/{id}/update','\App\Http\Controllers\PartnerController@update');
  Route::get('partner/{id}/delete','\App\Http\Controllers\PartnerController@destroy');
  Route::get('partner/{id}/deleteMsg','\App\Http\Controllers\PartnerController@DeleteMsg');
});

Route::group(['middleware'=> 'web'],function(){
});

Route::group(['middleware'=> 'web'],function(){
});
//project Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('project','\App\Http\Controllers\ProjectController');
  Route::get('project_show/{id}','\App\Http\Controllers\ProjectController@public_show');
  Route::post('project/{id}/update','\App\Http\Controllers\ProjectController@update');
  Route::get('project/{id}/delete','\App\Http\Controllers\ProjectController@destroy');
  Route::get('project/{id}/deleteMsg','\App\Http\Controllers\ProjectController@DeleteMsg');
  Route::get('project/{id}/documents','\App\Http\Controllers\ProjectController@documents');
  Route::get('project/{id}/documents/new','\App\Http\Controllers\ProjectController@newDocument');
  Route::get('project/{project_id}/documents/{document_id}/delete','\App\Http\Controllers\ProjectController@deleteDocument');
  Route::get('project/{project_id}/documents/{document_id}/edit','\App\Http\Controllers\ProjectController@editDocument');
  Route::post('project/{project_id}/documents/{document_id}/update','\App\Http\Controllers\ProjectController@updateDocument');
  Route::post('project/{project_id}/documents/addDocument','\App\Http\Controllers\ProjectController@addNewDocument');
});

//category Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('category','\App\Http\Controllers\CategoryController');
  Route::post('category/{id}/update','\App\Http\Controllers\CategoryController@update');
  Route::get('category/{id}/delete','\App\Http\Controllers\CategoryController@destroy');
  Route::get('category/{id}/deleteMsg','\App\Http\Controllers\CategoryController@DeleteMsg');
});
//team_member Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('team_member','\App\Http\Controllers\Team_memberController');
  Route::post('team_member/{id}/update','\App\Http\Controllers\Team_memberController@update');
  Route::get('team_member/{id}/delete','\App\Http\Controllers\Team_memberController@destroy');
  Route::get('team_member/{id}/deleteMsg','\App\Http\Controllers\Team_memberController@DeleteMsg');
});
