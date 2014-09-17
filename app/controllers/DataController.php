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

        $form_name = Formm::find($id);
        $dataTag = DataTag::where("tableId",$form_name->id)->get();
        $form_details = Records::where("formDataId",$form_name->id)->get();
        $form_head = Records::where("formDataId",$form_name->id)->first();


       return View::make('data.specific_table', compact('form_name','form_details','dataTag','form_head'));

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
	public function store()
	{

		$tag=DataTag::orderBy("datatagId","DESC")->first();
        if($tag!=""){
           $t=$tag->datatagId+1;
        }else{
            $t=0;
        }

        $form = Formm::find(Input::get('formId'));
        $formData = $form->formData;
        foreach($formData as $formDatas){
            foreach($formDatas->dataForm->options as $options){
                Records::create(array(
                    'formDataId' => Input::get('formId'),   //form id
                    'dataOptionId' => $formDatas->dataForm->id,      //data id
                    'categoryOptionId' =>$options->options->id ,      // option id
                    'value' => Input::get( $formDatas->dataForm->id.'_option_'.$options->options->id),              //actual value
                    'datTag' => $t,
                    'locationId' => Auth::user()->stakeholder->location->id,
                    'stakeholderId' => Auth::user()->stakeholder->id
                ));
            }
        }

         DataTag::create(array(
           'tableId' => Input::get('formId'),
            'datatagId' => $t
        ));

        $form=Formm::all();
        return View::make('form.index',compact('form'));


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
