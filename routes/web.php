<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SysadminController;
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
    return view('welcome');
});
Route::resource('students','StudentController');
Route::resource('Admin','AdminController');
Route::resource('Auth','authController');
Route::resource('Category','categoryController');
Route::resource('Feedback','FeedbackController');

Route::resource('Reply','replyController');
Route::resource('Report','reportController');
Route::view('/contact','Admin.email')->name('email');
Route::view('/admins','admins')->name('admins');
Route::view('/homes','home')->name('homes');

//Route::group(['middleware'=>'customAuth'],function(){
    Route::view('/Dean','Dean.registration')->name('registration');
    Route::view('/Dean/login','Dean.logins')->name('logins');
    Route::view('/Dean/Hpage','Dean.Hpage')->name('Hpage');
    Route::post('/send',[ContactController::class,'send'])->name('send.email');
    Route::post('registerUser','RestoController@registerUser');
    Route::post('logUser','RestoController@logUser');
    Route::view('/sign','Sysadmin.sign')->name('sign');
    Route::post('sys','RestoController@sys');
    Route::post('sysUser','RestoController@sysUser');
    Route::post('Dean/loginUser','RestoController@loginUser');
    Route::get('/downloadfile','RestoController@downloadfile');

//});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Sysadmin','SysadminController');
 Route::get('/index','SysadminController@index');
