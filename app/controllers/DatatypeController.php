<?php

class DatatypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('datatype.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('datatype.add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'name' => 'unique:rsmsa_datatypedetails', // make sure the data type is unique
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('create')
                ->withErrors($validator);
        }else{
            $datatype = DataTypeDetails::create(array(
                'name' => Input::get('name')
            ));
            return Redirect::to("index")->With("alert-success","Data Type Created successful!");
        }

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
        $type = DataTypeDetails::find($id);
        $type->name=Input::get('name');

        $type->save();
        return Redirect::to("index")->With("alert-success","Data type edited successful!");


    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $type = DataTypeDetails::find($id);
        return View::make('datatype.edit', compact('type'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $type =DataTypeDetails::find($id);
        $type->delete();
        return Redirect::to("index")->With("alert-success","Data Type Deleted successful!");
    }


}
