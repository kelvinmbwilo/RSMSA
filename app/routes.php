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
    return View::make('login');
});
Route::resource('dashboard' , 'DashboardController');

Route::resource('stakeholder' , 'StakeholderController');

///////////////////////////////////////////////////////
/////////////References //////////////////////////////
/////////////////////////////////////////////////////
Route::get('reference', array('uses'=>'ReferenceController@index')); //display list of references
Route::get('reference/add', array('uses'=>'ReferenceController@create')); //display form to add new reference
Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form
