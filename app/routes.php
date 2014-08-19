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
//************************References ***************************/
/***************************************************************/

//********************************************************/
//*********************StakeHolder************************/
//********************************************************/
Route::get('stakeholder', array('uses' => 'StakeholderController@index'));
Route::get('stakeholder/add', array('uses' => 'StakeholderController@newStakeholderForm'));
Route::post('stakeholder/add', array('uses' => 'StakeholderController@store'));
Route::post('stakeholder/delete/{id}', array('uses' => 'StakeholderController@destroy'));
Route::get('stakeholder/edit/{id}', array('uses' => 'StakeholderController@edit'));
Route::post('stakeholder/edit/{id}', array('uses'=>'StakeholderController@update'));
Route::get('stakeholderBranch', array('uses' => 'StakeholderBranchController@index'));
Route::get('stakeholderBranch/edit/{id}', array('uses' => 'StakeholderBranchController@edit'));
Route::post('stakeholderBranch/edit/{id}', array('uses' => 'StakeholderBranchController@update'));
Route::post('stakeholderBranch/delete/{id}', array('uses' => 'StakeholderBranchController@destroy'));
Route::get('stakeholderBranch/add/{id}', array('uses' => 'StakeholderBranchController@newBranchForm'));
Route::post('stakeholderBranch/add/{id}', array('uses' => 'StakeholderBranchController@store'));
Route::get('stakeholder/viewbranch/{id}', array('uses' => 'StakeholderController@listBranch'));



//******************************************************************************//
//******************************* DATA *****************************************//
//******************************************************************************//
Route::post('data/add/getcolumn', array('uses' => 'DataController@returncolumns'));
Route::get('data/add', array('uses' => 'DataController@create'));
Route::post('data/add/{count}', array('uses' => 'DataController@store'));
Route::get('data/home', array('uses' => 'DataController@index'));
Route::get('data/view/{id}', array('uses' => 'DataController@viewtable'));
//Route:get('data/getcol/{tablename}', array('uses' => 'DaraController@returncolumns'));


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
