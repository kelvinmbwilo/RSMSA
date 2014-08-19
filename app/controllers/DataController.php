<?php

class DataController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return View::make('data.view');
	}


	/**
	 * Show the form for creating a new data.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        $table = TableName::all();
        $table->toarray();
        return View::make('data.addNewData', compact('table'));
	}

    public function returncolumns(){
        $table = TableName::find(Input::get('select'));
        $mycol = $table->column;

        return View::make('data.test', compact('mycol'));

    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
