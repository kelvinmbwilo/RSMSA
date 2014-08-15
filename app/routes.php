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
Route::resource('dashboard' , 'DashboardController');


/***************************************************************/
//************************Locations Levels ***************************/
/***************************************************************/
Route::get('location/levels', array('uses' => 'LocationLevelController@index')); //display a list of locations
Route::get('location/levels/add', array('uses' => 'LocationLevelController@create')); //display a form to create new location level
Route::post('location/levels/add', array('uses' => 'LocationLevelController@store')); //process a form to create new location level
Route::get('location/levels/edit/{id}', array('uses' => 'LocationLevelController@edit')); //display a form to update a level of location
Route::post('location/levels/edit/{id}', array('uses' => 'LocationLevelController@update')); //process a form to update a level of location
Route::get('location/levels/delete/{id}', array('uses' => 'LocationLevelController@destroy')); //delete a level of location

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
Route::get('reference/edit/{id}', array('uses'=>'ReferenceController@edit')); //display form to edit a reference of a certain id
Route::post('reference/edit/{id}', array('uses'=>'ReferenceController@update')); //display form to edit a reference of a certain id
Route::get('reference/delete/{id}', array('uses'=>'ReferenceController@destroy')); //processing deletion of a reference of a certain id
Route::get('reference/viewColumn/{id}', array('uses'=>'ReferenceController@viewColumn')); //displaying a list of the reference details
