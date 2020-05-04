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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('index');

Route::resource('/home','HomeController')->middleware('auth','role:user');


//Route::prefix('admin')->group(function (){
  //  Route::get('users','AdminController@users')->name('admin.users')->middleware('auth','role:admin');
//});
Route::resource('admin','AdminController')->middleware('auth','role:admin');
Route::resource('properties','AdminController@update')->middleware('auth','role:admin');
Route::get('properties_my','PropertyController@properties_my')->name('properties_my');


Route::resource('properties','PropertyController')->middleware('auth','role:admin');

Route::resource('properties','PropertyController')->middleware('auth','role:user');


//Route::resource('user','UserController')->middleware('auth','role:admin');
Route::resource('user','UserController')->middleware('auth','role:user');



//Route::put('post/{id}', function ($id) {
    //
//})->middleware('auth', 'role:admin');

Route::resources([
    'properties'=>'PropertyController',
    'publications'=>'PublicationController'
]);

