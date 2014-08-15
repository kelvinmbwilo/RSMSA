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

//********************************************************/
//*********************StakeHolder************************/
//********************************************************/
Route::get('stakeholder', array('uses' => 'StakeholderController@index'));
Route::get('stakeholderBranch/{id}', array('uses' => 'StakeholderBranchController@listBranch'));


///////////////////////////////////////////////////////
/////////////References //////////////////////////////
/////////////////////////////////////////////////////
Route::get('reference', array('uses'=>'ReferenceController@index')); //display list of references
Route::get('reference/add', array('uses'=>'ReferenceController@create')); //display form to add new reference
Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form


//********************************************************/
//*********************User************************/
//********************************************************/
Route::get('user', array('uses'=>'UserController@index')); //display list of users
Route::get('user/add', array('uses'=>'UserController@create')); //add users
Route::post('user/add', array('uses'=>'UserController@store')); //processing added users
Route::get('user/delete/{id}', array('uses'=>'UserController@destroy')); //add users
Route::get('user/edit/{id}', array('uses'=>'UserController@update')); //edit users
Route::post('user/edit/{id}', array('uses'=>'UserController@edit')); //edit users


//********************************************************/
//*********************Login************************/
//********************************************************/
Route::get('login', array('uses'=>'LoginController@index')); //display login form
Route::post('login', array('uses'=>'LoginController@store')); //process login form



