<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('admin.welcome');
})->name('admin.welcome');
Route::post('/auth/login','AuthController@authenticate')->name('admin.login');

Route::middleware(['auth'])->group(function () {
    Route::get('/auth/logout','AuthController@logout')->name('admin.logout');
    Route::get('/dashboard', function() {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');
    Route::resource('course', 'CourseController');
    Route::get('coursepartisipan', 'CourseController@createpartisipan')->name('course.create.partisipan');
    Route::post('coursepartisipan', 'CourseController@storepartisipan')->name('course.store.partisipan');
    Route::get('coursepartisipan/{id}', 'CourseController@showpartisipan')->name('course.show.partisipan');
    Route::delete('coursepartisipan/{cid}/{uid}', 'CourseController@deletepartisipan')->name('course.show.partisipan');
    Route::resource('subcourse', 'SubcourseController')->names([
        'index' => 'subcourse.index'
    ]);

    Route::resource('schedule', 'ScheduleController');
    Route::resource('minicourse', 'MinicourseController')->names([
        'index' => 'minicourse.index'
    ]);
    Route::resource('membership', 'MembershipController');
    Route::get('usermembership/preorder', 'UserMembershipController@preorder')->name('membership.preorder');
    Route::resource('webinar', 'WebinarController')->names([
        'index' => 'admin.webinar',
        'create' => 'admin.webinar.create',
        'store' => 'admin.webinar.store',
        'edit' => 'admin.webinar.edit',
        'destroy' => 'admin.webinar.delete',
        'update' => 'admin.webinar.update'
    ]);
    Route::resource('articles', 'ArticleController')->names([
        'index' => 'admin.articles',
        'create' => 'admin.articles.create',
        'store' => 'admin.articles.store'
    ]);
    Route::resource('user', 'UserController')->names([
        'index' => 'admin.user'
    ]);
    Route::put('webinarparticipant/{id}', 'WebinarParticipantController@updateApprovalStatus')->name('changeapproval');
});
