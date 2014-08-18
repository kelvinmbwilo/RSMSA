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

Route::resource('stakeholder' , 'StakeholderController');


//********************************************************/
//*********************StakeHolder************************/
//********************************************************/
Route::get('stakeholder', array('uses' => 'StakeholderController@index'));
Route::get('stakeholderBranch/{id}', array('uses' => 'StakeholderBranchController@listBranch'));


/***************************************************************/
//************************References ***************************/
/***************************************************************/
Route::get('reference', array('uses'=>'ReferenceController@index')); //display list of references
Route::get('dynamic_table', array('uses'=>'ReferenceController@dynamicTable')); //display list of references
Route::get('reference/add', array('uses'=>'ReferenceController@create')); //display form to add new reference
Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form
Route::get('reference/edit/{id}', array('uses'=>'ReferenceController@edit')); //display form to edit a reference of a certain id
Route::post('reference/edit/{id}', array('uses'=>'ReferenceController@update')); //display form to edit a reference of a certain id
Route::get('reference/delete/{id}', array('uses'=>'ReferenceController@destroy')); //processing deletion of a reference of a certain id
Route::get('reference/viewColumn/{id}', array('uses'=>'ReferenceController@viewColumn')); //displaying a list of the reference details
Route::get('reference/createTable/{id}', array('uses'=>'ReferenceController@createTable')); //displaying a list of the reference details
Route::get('reference/editTable/{id}', array('uses'=>'ReferenceController@editTable')); //displaying a list of the reference details
Route::get('reference/deleteTable/{id}', array('uses'=>'ReferenceController@deleteTable')); //displaying a list of the reference details
Route::get('reference/deleteColumn/{id}', array('uses'=>'ReferenceController@deleteColumn')); //displaying a list of the reference details



/***************************************************************/
//************************Table Name****************************/
/***************************************************************/
Route::get('table_name', array('uses'=>'TableController@index')); //display list of table names
Route::get('dynamic_table', array('uses'=>'TableController@dynamicTable')); //display list of table name
Route::get('table_name/add', array('uses'=>'TableController@create')); //display form to add new table name
Route::post('table_name/add', array('uses'=>'TableController@store')); //processing addition form
Route::get('table_name/edit/{id}', array('uses'=>'TableController@edit')); //display form to edit a tableName of a certain id
Route::get('table_name/editColumn/{id}', array('uses'=>'TableController@editColumn')); //display form to edit a tableName of a certain id
Route::post('table_name/edit/{id}', array('uses'=>'TableController@update')); //display form to edit a tableName of a certain id
Route::post('table_name/editColumn/{id}', array('uses'=>'TableController@updateColumn')); //display form to edit a tableName of a certain id
Route::get('table_name/delete/{id}', array('uses'=>'TableController@destroy')); //processing deletion of a tableName of a certain id
Route::get('table_name/deleteColumn/{id}', array('uses'=>'TableController@destroyColumn')); //processing deletion of a column and its options of a certain id
Route::get('table_name/view_column/{id}', array('uses'=>'TableController@view_Column')); //display form to add new column option
Route::get('table_name/viewColumnOptions/{id}', array('uses'=>'TableController@viewColumnOption')); //display form to add new column option
Route::get('table_name/add_column/{id}', array('uses'=>'TableController@addColumn')); //displaying a list of the tableName details
Route::post('table_name/add_column/{id}', array('uses'=>'TableController@storeColumn')); //displaying a list of the tableName details
Route::get('table_name/add_optionColumn/{id}', array('uses'=>'TableController@addOptionColumn')); //displaying a list of the tableName details
Route::post('table_name/add_optionColumn/{id}', array('uses'=>'TableController@storeOptionColumn')); //displaying a list of the tableName details