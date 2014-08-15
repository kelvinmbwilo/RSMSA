<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('dashboard');
});

Route::get('user', function()
{
	return View::make('users.index');
});

Route::get('dashboard', function()
{
    return View::make('dashboard');
});

Route::get('login', function()
{
    return View::make('users.login');
});




Route::resource('dashboard' , 'DashboardController');

Route::resource('stakeholder' , 'StakeholderController');

Route::resource('login' , 'LoginController');

Route::resource('user' , 'usercontroller');

///////////////////////////////////////////////////////
/////////////References //////////////////////////////
/////////////////////////////////////////////////////
Route::get('reference', array('uses'=>'ReferenceController@index')); //display list of references
Route::get('reference/add', array('uses'=>'ReferenceController@create')); //display form to add new reference
Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form


///////////////////////////////////////////////////////
/////////////user //////////////////////////////
/////////////////////////////////////////////////////
Route::get('user', array('uses'=>'UserController@index')); //display list of users



///////////////////////////////////////////////////////
/////////////login //////////////////////////////
/////////////////////////////////////////////////////
Route::get('users/login', array('uses'=>' logincontroller@index')); //display login form
Route::post('users/login', array('uses'=>' logincontroller@store')); //process login form


