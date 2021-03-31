<?php

use Illuminate\Contracts\Cache\Store;
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
    return view('auth.login');
});

Route::view('/homepage','Page.homepage')->name('Homepage');
Route::view('/homepage/Setting','Setting.setting')->name('Setting');
Route::resource('/homepage/Setting/Devices','devices');
Route::view('/homepage/Setting/TechBot','Setting.tech_bot')->name('TechBot');
Route::resource('/homepage/Setting/ChangeColor', 'ChangeColor');
Route::resource('/homepage/Setting/Privacy','PrivacyController');
Route::resource('/homepage/Setting/Privacy/Resetpassword','ResetPasswordController');
Route::view('/homepage/Setting/About','Setting.about')->name('About');
Route::resource('/homepage/Setting/About/report','ReportController');
Route::view('/homepage/Setting/About/contact','Setting.contact')->name('contact');
Route::resource('/homepage/CCTV','device\cctv');
Route::resource('/homepage/Door','device\door');
Route::resource('/homepage/Aircondition','device\air');
Route::resource('/homepage/Light','device\light');
Route::view('/homepage/Dashboard','Page.Dashboard')->name('Dashboard');
Route::view('/test','test')->name('test');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('firebase','FirebaseController@index');

Route::get('firebase-test', 'FirebaseController@getData');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
