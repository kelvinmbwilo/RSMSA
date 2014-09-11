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
        return View::make('reference.dynamic_table.index');
           }


    public function returnReferences(){

        $reference=Reference::find(Input::get('select'));
        $mycol=$reference->referenceDetails;

     return View::make('reference.dynamic_table.test', compact('mycol','reference'));

    }


    public function storeDynamicTable($id){

        $reference= Reference::find($id);
        $tableName = $reference->name;
        $tableName ="rsmsa_dynamic_".$tableName;



        $id = DB::table($tableName)->insertGetId(
            array('created_at'=>(new DateTime())->format('Y-m-d H:i:s'),
                'updated_at'=>(new DateTime())->format('Y-m-d H:i:s'),


            ));
        foreach ($reference->referenceDetails as $col){
            DB::table($tableName)
                ->where('id',$id)
                ->update(array($col->name => Input::get('name'.$col->id)));


        }
        return View::make('reference.dynamic_table.index');

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
                    'dataTypeId'=>Input::get('data'.$j),

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
        $oldTable=Reference::find($id);
        $name=Input::get('referenceName');
        if($oldTable->name!=Input::get('referenceName')){
        DB::statement('RENAME TABLE rsmsa_dynamic_'.$oldTable->name.' TO rsmsa_dynamic_'.$name);
        $reference->name=$name;
            $reference->save();
        }
        $reference=Reference::find($id);
        $detailCount=count($reference->referenceDetails);
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;

            if($j<=$detailCount)
            {
                if(Input::get('column'.$j)== ''){
                    $referenceDetails=ReferenceDetails::find(Input::get('columnid'.$j));
                    DB::statement( 'ALTER TABLE rsmsa_dynamic_'.$name.' DROP '.$referenceDetails->name );
                    $referenceDetails->delete();
                }else{
                     $referenceDetails=ReferenceDetails::find(Input::get('columnid'.$j));

                     $dataType=DataTypeDetails::find(Input::get('data'.$j));
                     $NewColumn1=Input::get('columnName'.$j);

                   if($dataType->name== "integer"){
                       $type="int(11)";
                        $referenceDetails->name=Input::get('column'.$j);
                        if($OldColumn1!=$referenceDetails->name)
                           DB::statement( 'ALTER TABLE rsmsa_'.$reference->name.' change '.$OldColumn1.' '.$referenceDetails->name.'  '.$type );
                        $referenceDetails->save();
                    }
                    if($dataType->name == "string"){
                        $type="varchar(255)";
                        $referenceDetails->name=Input::get('column'.$j);
                        if($OldColumn1!=$referenceDetails->name)
                            DB::statement( 'ALTER TABLE rsmsa_'.$reference->name.' change '.$OldColumn1.' '.$referenceDetails->name.'  '.$type );
                        $referenceDetails->save();
                    }

              }

            }else{
                if(Input::get('column'.$j)!= ''){
                    ReferenceDetails::create(array(
                        'referenceId' => $reference->id,
                        'name' => Input::get('column'.$j),
                        'dataTypeId'=>Input::get('data'.$j)
                    ));
                    $dataType=DataTypeDetails::find(Input::get('data'.$j));
                    $col=ReferenceDetails::find(Input::get('columnid'.$j));
                    if($dataType->name=="integer")
                    {
                        $type="int(10)";
                        DB::statement( 'ALTER TABLE '. $reference->name.' ADD '.$col->name.'  '.$type );
                    }
                    if($dataType->name=="string")
                    {
                        $type="varchar(100)";
                        DB::statement( 'ALTER TABLE '. $reference->name.' ADD '.$col->name.'  '.$type );
                    }
                }

            }




        }

        return View::make('reference.data_reference.index');
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

            DB::statement( 'ALTER TABLE rsmsa_'.$referenceObj->name.' drop '.$detail->name);
            $detail->delete();

        }
        Schema::drop("rsmsa_dynamic_".$referenceObj->name);
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
        $tableName ="rsmsa_dynamic_".$tableName;
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
            }
            if($column->dataType->name=="string")
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
        $column2=$column1->name;
        $tableName=$column1->reference;
        $tableName=$tableName->name;

    }



}
