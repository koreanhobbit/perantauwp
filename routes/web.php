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

//contact message
Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/contact', 'ContactController@create')->name('contact.create');

//####################//
//########AUTH########//
//####################//
Route::post('/login', 'Auth\LoginController@login')->name('login.attempt');

Route::post('/register', 'Auth\RegisterController@register')->name('register.attempt');

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//####################//
//######MANAGE########//
//####################//
Route::prefix('manage')->group(function() {

    //##user management##//
    //user
    Route::resource('user','UserController')->middleware('role:superadministrator');

    //role
    Route::resource('role', 'RoleController')->middleware('role:superadministrator');

    //permission
    Route::resource('permission', 'PermissionController')->middleware('role:superadministrator');

    //##Media Management##//
    //Image
    Route::resource('image', 'ImageController');

    //File
    Route::resource('file', 'FileController')->middleware('role:superadministrator');

    //Scanned File 
    Route::resource('scannedfile', 'ScannedfileController')->middleware('role:superadministrator');

    //##Testimony Management##//
    Route::get('testimony', 'TestimonyController@edit')->name('testimony.edit')->middleware('role:superadministrator');

    Route::get('testimony/edit', 'TestimonyController@index')->name('testimony.index')->middleware('role:superadministrator');

    //##Blog##//
    Route::resource('blog', 'BlogController')->middleware('role:superadministrator');
    Route::put('/blog/publish/{blog}', 'BlogPublishingController@index')->name('blog.publish')->middleware('role:superadministrator');

    //##Product##//
    Route::resource('product', 'ProductController')->middleware('role:superadministrator');

    //## General Settings ##//
    Route::get('/setting/{setting}/index', 'SettingController@index')->name('setting.index')->middleware('role:superadministrator');
    Route::put('/setting/{setting}', 'SettingController@update')->name('setting.update')->middleware('role:superadministrator');

    //##country##//
    Route::resource('setting/country', 'CountryController')->middleware('role:superadministrator');

    //##partner##//
    Route::resource('setting/partner', 'PartnerController')->middleware('role:superadministrator');

    //Tag
    Route::post('tag', 'TagController@store')->name('tag.store')->middleware('role:superadministrator');

    //Service
    Route::resource('service', 'ServiceController')->middleware('role:superadministrator');

    //Service form
    Route::resource('form', 'FormController')->middleware('role:superadministrator');

    //#dashboard#//
    Route::get('/', 'HomeController@index')->name('manage.index')->middleware('role:superadministrator');
});


//####################//
//##CUSTOMER BACKEND##//
//####################//

Route::prefix('customer')->middleware('role:customer')->group(function() {

    //testimony
    Route::post('{user}/testimony/{name}', 'CustomerTestimonyController@store')->name('customer.testimony.store');

    Route::get('{user}/testimony/{name}/create', 'CustomerTestimonyController@create')->name('customer.testimony.create');

    Route::get('{user}/testimony/{name}', 'CustomerTestimonyController@index')->name('customer.testimony.index');

    //#profile#//
    
    Route::get('{user}/profile/{name}', 'CustomerProfileController@index')->name('customer.profile.index');

    Route::put('{user}/profile/{name}/update', 'CustomerProfileController@update')->name('customer.profile.update');

    //#dashboard#//
    Route::get('{user}/dashboard/{name}', 'CustomerHomeController@index')->name('customer.dashboard.index');
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

