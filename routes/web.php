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

//####################//
//######MAINPAGE######//
//####################//

Route::get('/', 'MainPageController@index')->name('mainpage.index');

Auth::routes();

Route::prefix('manage')->middleware('auth')->group(function() {

    //##user management##//
    //user
    Route::resource('user','UserController');

    //role
    Route::resource('role', 'RoleController');

    //##Media Management##//
    //Image
    Route::resource('image', 'ImageController');

    //File
    Route::resource('file', 'FileController');

    //Scanned File 
    Route::resource('scannedfile', 'ScannedfileController');

    //##Blog##//
    Route::resource('blog', 'BlogController');
    Route::put('/blog/publish/{blog}', 'BlogPublishingController@index')->name('blog.publish');

    //##Product##//
    Route::resource('product', 'ProductController');

    //## General Settings ##//
    Route::get('/setting/{setting}/index', 'SettingController@index')->name('setting.index');
    Route::put('/setting/{setting}', 'SettingController@update')->name('setting.update');

    //##country##//
    Route::resource('setting/country', 'CountryController');

    //##partner##//
    Route::resource('setting/partner', 'PartnerController');

    //Tag
    Route::post('tag', 'TagController@store')->name('tag.store');

    //Service
    Route::resource('service', 'ServiceController');

    //Service form
    Route::resource('form', 'FormController');

    //#dashboard#//
    Route::get('/', 'HomeController@index')->name('manage.index');
});
































Route::get('/charts', function () {
    return View::make('admin.charts');
});

Route::get('/tables', function () {
    return View::make('admin.table');
});

Route::get('/forms', function () {
    return View::make('admin.form');
});

Route::get('/grid', function () {
    return View::make('admin.grid');
});

Route::get('/buttons', function () {
    return View::make('admin.buttons');
});

Route::get('/icons', function () {
    return View::make('admin.icons');
});

Route::get('/panels', function () {
    return View::make('admin.panel');
});

Route::get('/typography', function () {
    return View::make('admin.typography');
});

Route::get('/notifications', function () {
    return View::make('admin.notifications');
});

Route::get('/blank', function () {
    return View::make('admin.blank');
});

Route::get('/documentation', function () {
    return View::make('admin.documentation');
});

Route::get('/stats', function() {
   return View::make('admin.stats');
});

Route::get('/progressbars', function() {
    return View::make('admin.progressbars');
});

Route::get('/collapse', function() {
    return View::make('admin.collapse');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
