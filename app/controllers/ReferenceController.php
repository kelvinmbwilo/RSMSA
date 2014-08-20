<?php

class ReferenceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('reference.data_reference.index');
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function dynamicTable()
    {
        $reference = Reference::all();
        $reference->toarray();
        return View::make('reference.dynamic_table.index', compact('reference'));

    }


    public function returnReferences(){
        $reference = Reference::find(Input::get('select'));
        $mycol = $reference->ReferenceDetails;

        return View::make('reference.data_reference.test', compact('mycol'));

    }



    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('reference.data_reference.add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{



        $reference = Reference::create(array(
            'name' => Input::get('referenceName')

        ));
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if(Input::get('column'.$j)!= ''){
                DataReference::create(array(
                    'referenceId' => $reference->id,
                    'name' => Input::get('column'.$j),
                    'dataTypeId'=>Input::get('data'.$j)
                ));

            }
        }

        $this->createTable($reference->id);
        return View::make('reference.data_reference.index');

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
        $reference =Reference::find($id);

        return View::make('reference.data_reference.edit',compact("reference"));
    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $reference=Reference::find($id);
        $reference->name=Input::get('referenceName');
        $reference->save();
        $detailCount=count($reference->referenceDetails);
        for($i =0 ;$i < Input::get('col_count'); $i++ )
        {
            $j = $i+1;
            if($j<=$detailCount)
            {
                if(Input::get('column'.$j)== ''){
                    $referenceDetails= ReferenceDetails::find(Input::get('columnid'.$j));
                    $referenceDetails->delete();
                }else{
                    $referenceDetails= ReferenceDetails::find(Input::get('columnid'.$j));
                    $referenceDetails->name=Input::get('column'.$j);
                    $referenceDetails->save();
                }

            }else{
                if(Input::get('column'.$j)!= '')
                {
                    DataReference::create(array(
                        'referenceId' => $reference->id,
                        'name' => Input::get('column'.$j)
                    ));
                }

            }



        }

	}


    /**
     * display a list of the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function viewColumn($id)
    {
         $reference=Reference::find($id);
        return View::make('reference.data_reference.viewColumn', compact("reference"));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $referenceObj= Reference::find($id);

        foreach($referenceObj->referenceDetails as $detail){

            $this->deleteColumn($detail->id);
            $detail->delete();

        }
        $this->deleteTable($id);
        $referenceObj->delete();

        return View::make('reference.data_reference.index');
	}




    /**
     * create the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function createTable($id)
    {
       $tableName1= Reference::find($id);

        $tableName = $tableName1->name;
        $tableName ="rsmsa_".$tableName;
        Schema::create($tableName, function($table)
        {
            $table->increments('id');
            $table->timestamps();
        });
        $type="";
        foreach($tableName1->referenceDetails as $column){
            if($column->dataType->name=="integer")
            {
                $type="int(10)";
                DB::statement( 'ALTER TABLE '.$tableName.' ADD '.$column->name.'  '.$type );
            } if($column->dataType->name=="string")
            {
                $type="varchar(100)";
                 DB::statement( 'ALTER TABLE '.$tableName.' ADD '.$column->name.'  '.$type );
            }
        }
        return View::make('reference.data_reference.index');
    }
    /**
     * edit the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function editTable($id)
    {
        $reference=Reference::find($id);
        $reference->name=Input::get('referenceName');
        $reference->save();
        $detailCount=count($reference->referenceDetails);
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if($j<=$detailCount)
            {
                if(Input::get('column'.$j)== ''){
                    $referenceDetails= ReferenceDetails::find(Input::get('columnid'.$j));
                    $referenceDetails->delete();
                }else{
                    $referenceDetails= ReferenceDetails::find(Input::get('columnid'.$j));
                    $referenceDetails->name=Input::get('column'.$j);
                    $referenceDetails->save();
                }

            }else{
                if(Input::get('column'.$j)!= '')
                {
                    DataReference::create(array(
                        'referenceId' => $reference->id,
                        'name' => Input::get('column'.$j)
                    ));
                }

            }



        }

    }
    /**
     * delete the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteTable($id)
    {
        $table=Reference::find($id);
        Schema::drop($table->name);
    }
    /**
     * delete the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteColumn($id)
    {
        $column1=ReferenceDetails::find($id);
        $column=$column1->name;
        $tableName=$column1->reference;
        $tableName=$tableName->name;
        Schema::table($tableName, function($table)
        {
            $table->dropColumn($column);
        });
    }



}
