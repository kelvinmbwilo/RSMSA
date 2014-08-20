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
Route::get('data/home', array('uses' => 'DataController@index'));
//Route:get('data/getcol/{tablename}', array('uses' => 'DaraController@returncolumns'));



/***************************************************************/
//************************References ***************************/
/***************************************************************/
Route::get('reference', array('uses'=>'ReferenceController@index')); //display list of references
Route::get('reference/add', array('uses'=>'ReferenceController@create')); //display form to add new reference
Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form
Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form
Route::get('reference/edit/{id}', array('uses'=>'ReferenceController@edit')); //display form to edit a reference of a certain id
Route::post('reference/edit/{id}', array('uses'=>'ReferenceController@update')); //display form to edit a reference of a certain id
Route::get('reference/delete/{id}', array('uses'=>'ReferenceController@destroy')); //processing deletion of a reference of a certain id
Route::get('reference/viewColumn/{id}', array('uses'=>'ReferenceController@viewColumn')); //displaying a list of the reference details
Route::get('reference/createTable/{id}', array('uses'=>'ReferenceController@createTable')); //displaying a list of the reference details
Route::get('reference/editTable/{id}', array('uses'=>'ReferenceController@editTable')); //displaying a list of the reference details
Route::get('reference/deleteTable/{id}', array('uses'=>'ReferenceController@deleteTable')); //displaying a list of the reference details
Route::get('reference/deleteColumn/{id}', array('uses'=>'ReferenceController@deleteColumn')); //displaying a list of the reference details
Route::get('dynamic_table', array('uses'=>'ReferenceController@dynamicTable')); //displaying list of references
Route::get('dynamic_table/referenceform', array('uses'=>'ReferenceController@createreferenceform')); //displaying form to add reference
Route::post('dynamic_table/getColumn', array('uses' => 'ReferenceController@returnReferences'));



/***************************************************************/
//************************Table Name****************************/
/***************************************************************/
Route::get('table_name', array('uses'=>'TableController@index')); //display list of table names
Route::get('table_name/back', array('uses'=>'TableController@back')); //display list of table names
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
Route::post('table_name/add_optionColumn/{id}', array('uses'=>'TableController@storeOptionColumn')); //displaying a list of the tableName detailsRoute::get('reference/viewColumn/{id}', array('uses'=>'ReferenceController@viewColumn')); //displaying a list of the reference details





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
