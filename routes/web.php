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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::prefix('admin')->group(function(){

    Route::get('/all', 'AdminController@All')->name('admin.all');
    Route::post('/store', 'AdminController@Store');
    Route::get('/edit/{id}', 'AdminController@Edit');
    Route::post('/update', 'AdminController@Update');
    Route::get('/delete/{id}', 'AdminController@Delete');


});

//Role
Route::prefix('role')->group(function(){

    Route::get('/all', 'RoleController@All')->name('role.all');
    Route::post('/store', 'RoleController@Store');
    Route::get('/edit/{id}', 'RoleController@Edit');
    Route::post('/update', 'RoleController@Update');
    Route::get('/delete/{id}', 'RoleController@Delete');

});


//Hosting
Route::prefix('hosting')->group(function(){

    Route::get('/all', 'HostingController@All')->name('hosting.all');
    Route::post('/store', 'HostingController@Store');
    Route::get('/edit/{id}', 'HostingController@Edit');
    Route::post('/update', 'HostingController@Update');
    Route::get('/delete/{id}', 'HostingController@Delete');
    Route::get('/status', 'HostingController@Status');

});


//Demo
Route::prefix('demo')->group(function(){

    Route::get('/all', 'DemoController@All')->name('demo.all');
    Route::post('/store', 'DemoController@Store');
    Route::get('/edit/{id}', 'DemoController@Edit');
    Route::post('/update', 'DemoController@Update');
    Route::get('/delete/{id}', 'DemoController@Delete');
    Route::get('/status', 'DemoController@Status');
    //Deleted
    Route::get('/deleted', 'DemoController@Deleted')->name('demo.deleted');
    Route::get('/delete-permanent/{id}', 'DemoController@DeletePermanent');
    Route::get('/restore/{id}', 'DemoController@Restore');


});



Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

