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
Route::get('/dashboard', function() {
    return view('admin.dashboard.index');
})->name('admin.dashboard');

Route::resource('webinar', 'WebinarController')->names([
    'index' => 'admin.webinar',
    'create' => 'admin.webinar.create',
    'store' => 'admin.webinar.store',
]);
Route::middleware(['auth'])->group(function () {

    Route::resource('articles', 'ArticleController');

});
