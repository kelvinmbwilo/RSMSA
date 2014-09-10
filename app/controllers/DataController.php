<?php

class DataController extends \BaseController {

    public $tag_count = 1;

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
     * @param $id
     *
     * @returns the specific table view of a type
     * of data..
     */
    public function viewtable($id){

        $table = TableName::find($id);

        return View::make('data.specific_table', compact('table'));

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

        return View::make('data.test', compact('mycol', 'table'));

    }


	/**
	 * Store a newly created resource in storage.
	 * @param id
	 * @return Response
	 */
	public function store($id)
	{

		$tag=DataTag::orderBy("datatagId","DESC")->first();
        if($tag!=""){
           $t=$tag->datatagId+1;
        }else{
            $t=0;
        }

        $count = $id;
         for($i=1; $i<=$count; $i++){
            Data::create(array(
                'tableColumnId' => Input::get('table'),
                'columnId' => Input::get($i.'_column'),
                'value' => Input::get($i.'_value'),
                'datTag' => $t,
                'locationId' => '',
                'stakeholderId' => '1'
            ));
        }

         DataTag::create(array(
           'tableId' => Input::get('table'),
            'datatagId' => $t
        ));


        return View::make('data.view');


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
