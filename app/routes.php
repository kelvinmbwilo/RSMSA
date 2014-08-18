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

/***************************************************************/
//************************References ***************************/
/***************************************************************/

//********************************************************/
//*********************StakeHolder************************/
//********************************************************/
Route::get('stakeholder', array('uses' => 'StakeholderController@index'));
Route::get('stakeholder/{id}', array('uses' => 'StakeholderController@listBranch'));
Route::get('stakeholder/add', array('uses' => 'StakeholderController@newStakeholderForm'));
Route::post('stakeholder/add', array('uses' => 'StakeholderController@store'));
Route::post('stakeholder/delete/{id}', array('uses' => 'StakeholderController@destroy'));
Route::get('stakeholder/edit/{id}', array('uses' => 'StakeholderController@edit'));
Route::post('stakeholder/edit/{id}', array('uses'=>'StakeholderController@update'));
Route::get('stakeholderBranch', array('uses' => 'StakeholderBranchController@index'));
Route::get('stakeholderBranch/edit/{id}', array('uses' => 'StakeholderBranchController@edit'));



///////////////////////////////////////////////////////
/////////////References //////////////////////////////
/////////////////////////////////////////////////////
Route::get('reference', array('uses'=>'ReferenceController@index')); //display list of references
Route::get('reference/add', array('uses'=>'ReferenceController@create')); //display form to add new reference
Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form
Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form
Route::get('reference/edit/{id}', array('uses'=>'ReferenceController@edit')); //display form to edit a reference of a certain id
Route::post('reference/edit/{id}', array('uses'=>'ReferenceController@update')); //display form to edit a reference of a certain id
Route::get('reference/delete/{id}', array('uses'=>'ReferenceController@destroy')); //processing deletion of a reference of a certain id
Route::get('reference/viewColumn/{id}', array('uses'=>'ReferenceController@viewColumn')); //displaying a list of the reference details
Route::get('dynamic_tablel', array('uses'=>'ReferenceController@viewreference')); //displaying available references
Route::get('dynamic_tablel/referenceform', array('uses'=>'ReferenceController@createreferenceform')); //displaying form to add reference




//********************************************************/
//*********************User************************/
//********************************************************/
Route::get('user', array('uses'=>'UserController@index')); //display list of users
Route::get('user/add', array('uses'=>'UserController@create')); //add users
Route::post('user/add', array('uses'=>'UserController@store')); //processing added users
Route::get('user/delete/{id}', array('uses'=>'UserController@destroy')); //add users
Route::get('user/edit/{id}', array('uses'=>'UserController@update')); //edit users
Route::post('user/edit/{id}', array('uses'=>'UserController@edit')); //process edited users
Route::get('userindex', array('uses'=>'UserController@index'));//displaying messages




//********************************************************/
//*********************Login************************/
//********************************************************/
Route::get('login', array('uses'=>'LoginController@index')); //display login form
Route::post('login', array('uses'=>'LoginController@login')); //process login form
Route::get('logout', array('uses'=>'LoginController@logout')); //process logout functionality




//********************************************************/
//*********************Data type************************/
//********************************************************/
Route::get('datatype', array('uses'=>'DatatypeController@index')); //display list of datatypes
Route::get('datatype/add', array('uses'=>'DatatypeController@create')); //add datatypes
Route::post('datatype/add', array('uses'=>'DatatypeController@store')); //processing added datatypes
Route::get('datatype/delete/{id}', array('uses'=>'DatatypeController@destroy')); //delete specific datatype
Route::get('datatype/edit/{id}', array('uses'=>'DatatypeController@update')); //edit specific datatype
Route::post('datatype/edit/{id}', array('uses'=>'DatatypeController@edit')); //process edited datatype
Route::get('index', array('uses'=>'DatatypeController@index'));//displaying messages