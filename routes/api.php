<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('v2')->group(function() {
	Route::post('/register','AuthController@register');
	//Route::post('/password/reset-request', 'RequestPasswordController@sendResetLinkEmail');
	Route::post('/login','AuthController@login');
	Route::post('/email/verify', ['as' => 'email.verify', 'uses' => 'AuthController@emailVerify']);
	Route::post('/logout','AuthController@logout');

	Route::post('/email/request-verification', ['as' => 'email.request.verification', 'uses' => 'AuthController@emailRequestVerification']);
	//Route::post('/password/reset', [ 'as' => 'password.reset', 'uses' => 'ResetPasswordController@reset' ]);

	Route::post('/course/title/create','CourseController@createTitles');
	Route::post('/course/main/create','CourseController@createCourse');
	Route::get('/course/{title}','CourseController@getCourseByTitle');
	Route::post('/subcourse/create','SubcourseController@createSubcourse');
	Route::get('/subcourse/{course}','SubcourseController@getSubcourseByCourse');
	Route::post('/minicourse','MinicourseController@store');
	Route::get('/minicourse/{courseid}','MinicourseController@showByCourse');
	Route::get('/minicourse/id/{id}','MinicourseController@showById');
	Route::get('/webinar','WebinarController@getAll');
	Route::post('/webinar','WebinarController@store');
	Route::post('/webinar/register','WebinarController@registerWebinar');
	Route::post('/membership','MembershipController@store');
	Route::get('/membership','MembershipController@index');
	Route::get('/membership/{courseid}','MembershipController@getMembership');
	Route::post('/usermembership','UserMembershipController@store');
	Route::get('/storage/{filename}','StorageController@index');
});