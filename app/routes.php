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
Route::controller('password', 'RemindersController');

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
//***************** Locations Levels ***************************/
/***************************************************************/
Route::get('location/levels', array('uses' => 'LocationLevelController@index')); //display a list of locations
Route::get('location/levels/add', array('uses' => 'LocationLevelController@create')); //display a form to create new location level
Route::post('location/levels/add', array('uses' => 'LocationLevelController@store')); //process a form to create new location level
Route::get('location/levels/edit/{id}', array('uses' => 'LocationLevelController@edit')); //display a form to update a level of location
Route::post('location/levels/edit/{id}', array('uses' => 'LocationLevelController@update')); //process a form to update a level of location
Route::post('location/levels/delete/{id}', array('uses' => 'LocationLevelController@destroy')); //delete a level of location

/***************************************************************/
//************************Locations  ***************************/
/***************************************************************/
Route::get('location', array('uses' => 'LocationController@index')); //display a list of locations
Route::get('location/add', array('uses' => 'LocationController@create')); //display a form to create new location level
Route::post('location/add', array('uses' => 'LocationController@store')); //process a form to create new location level
Route::post('location/listchild/{id}', array('uses' => 'LocationController@listchild')); //return a list of location of same level
Route::get('location/edit/{id}', array('uses' => 'LocationController@edit')); //display a form to update a level of location
Route::post('location/edit/{id}', array('uses' => 'LocationController@update')); //process a form to update a level of location
Route::post('location/delete/{id}', array('uses' => 'LocationController@destroy')); //delete a level of location
Route::get('location/child/{$id}', array('uses' => 'LocationController@childindex')); //display a list of locations

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



/***************************************************************/
//************************References ***************************/
/***************************************************************/
Route::get('reference', array('uses'=>'ReferenceController@index')); //display list of references
Route::get('reference/add', array('uses'=>'ReferenceController@create')); //display form to add new reference

Route::post('reference/add', array('uses'=>'ReferenceController@store')); //processing addition form
Route::get('reference/edit/{id}', array('uses'=>'ReferenceController@edit')); //display form to edit a reference of a certain id
Route::post('reference/edit/{id}', array('uses'=>'ReferenceController@update')); //display form to edit a reference of a certain id
Route::get('reference/delete/{id}', array('uses'=>'ReferenceController@destroy')); //processing deletion of a reference of a certain id
Route::get('reference/viewColumn/{id}', array('uses'=>'ReferenceController@viewColumn')); //displaying a list of the reference details
Route::get('reference/createTable/{id}', array('uses'=>'ReferenceController@createTable')); //creating at reference table in the database
Route::get('reference/editTable/{id}', array('uses'=>'ReferenceController@editTable')); //displaying a list of the reference details
Route::get('reference/deleteTable/{id}', array('uses'=>'ReferenceController@deleteTable')); //displaying a list of the reference details
Route::get('reference/deleteColumn/{id}', array('uses'=>'ReferenceController@deleteColumn')); //displaying a list of the reference details
Route::get('dynamic_table', array('uses'=>'ReferenceController@dynamicTable')); //displaying list of references
Route::post('dynamic_table/getColumn', array('uses' => 'ReferenceController@returnReferences'));//return form for specific reference
Route::post('dynamic_table/test/{id}', array('uses'=>'ReferenceController@storeDynamicTable')); //processing added users



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
Route::post('user/listStakeholderBranch/{id}', array('uses' => 'UserController@listStakeholderBranch')); //return a list of stakeholderbranch of same level




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



/***************************************************************/
//***************** Category ***************************/
/***************************************************************/
Route::get('category', array('uses' => 'CategoryController@index')); //display a list of locations
Route::get('category/add', array('uses' => 'CategoryController@create')); //display a form to create new location level
Route::post('category/add', array('uses' => 'CategoryController@store')); //process a form to create new location level
Route::get('category/edit/{id}', array('uses' => 'CategoryController@edit')); //display a form to update a level of location
Route::post('category/edit/{id}', array('uses' => 'CategoryController@update')); //process a form to update a level of location
Route::post('category/delete/{id}', array('uses' => 'CategoryController@destroy')); //delete a level of location


/***************************************************************/
//***************** Options ***************************/
/***************************************************************/
Route::get('option', array('uses' => 'OptionsController@index')); //display a list of locations
Route::get('option/add', array('uses' => 'OptionsController@create')); //display a form to create new location level
Route::post('option/add', array('uses' => 'OptionsController@store')); //process a form to create new location level
Route::get('option/edit/{id}', array('uses' => 'OptionsController@edit')); //display a form to update a level of location
Route::post('option/edit/{id}', array('uses' => 'OptionsController@update')); //process a form to update a level of location
Route::post('option/delete/{id}', array('uses' => 'OptionsController@destroy')); //delete a level of location



/***************************************************************/
//*****************Data_table  ***************************/
/***************************************************************/
Route::get('dataTable', array('uses' => 'DataTableController@index')); //display a list of data tables
Route::get('reference_mapping/{id}', array('uses' => 'DataTableController@mapping')); //display a list of data tables
Route::post('reference_mapping/{id}', array('uses' => 'DataTableController@Store_mapping')); //display a list of data tables
Route::get('data_table/add', array('uses' => 'DataTableController@create')); //display a form to create new data table
Route::post('data_table/add', array('uses' => 'DataTableController@store')); //process a form to create new data table
Route::get('data_table/edit/{id}', array('uses' => 'DataTableController@edit')); //display a form to update a data table
Route::post('data_table/edit/{id}', array('uses' => 'DataTableController@update')); //process a form to update a data table
Route::post('data_table/delete/{id}', array('uses' => 'DataTableController@destroy')); //delete a data table



/***************************************************************/
//***************** form ****************************************/
/***************************************************************/
Route::get('form', array('uses' => 'FormController@index')); //display a list of form
Route::get('form_creation', array('uses' => 'FormController@show')); //display a list of form to input data
Route::get('form_viewing/{id}', array('uses' => 'DataController@viewtable')); //display a list of form to input data
Route::post('form_creation', array('uses' => 'FormController@showDetails')); //display a list of form to input data
Route::post('form_processing', array('uses' => 'DataController@store')); //display a list of form to input data
Route::get('form/add', array('uses' => 'FormController@create')); //display a form to create new form
Route::post('form/add', array('uses' => 'FormController@store')); //process a form to create new form
Route::get('form/edit/{id}', array('uses' => 'FormController@edit')); //display a form to update a form
Route::post('form/edit/{id}', array('uses' => 'FormController@update')); //process a form to update a form
Route::post('form/delete/{id}', array('uses' => 'FormController@destroy')); //delete a form



/***************************************************************/
//***************** data reference mapping ****************************************/
/***************************************************************/
Route::get('mapping', array('uses' => 'MappingController@index')); //display a list of data reference mapping
Route::get('mapping/edit/{id}', array('uses' => 'MappingController@edit')); //display a form to update a data reference mapping
Route::post('mapping/edit/{id}', array('uses' => 'MappingController@update')); //process a form to update a data reference mapping
Route::post('mapping/delete/{id}', array('uses' => 'MappingController@destroy')); //delete a data reference mapping