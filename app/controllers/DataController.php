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


        $formData=FormData::where("formId",$id)->get();;
        //Get details for the database
        $host = "localhost";
        $DBname = "psms";
        $user = "root";
        $password = "";
        $charSet = "utf8";
        $collation = "utf8_unicode_ci";

        define("DB_HOST",  $host);
        define("DB_DATABASE", $DBname);
        define("DB_USER",  $user);
        define("DB_PASSWORD", $password);
        define("DB_CHARSET", $charSet);
        define("DB_COLLATION", $collation);
        define("DB_PREFIX", "");

        //its connection to mysql

        $con =mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        // Check connection
        if (!$con) {
            die('Failed to connect to MySQL: ' . mysql_error());
        }
        // selecting database
        mysql_select_db(DB_DATABASE);
        $ListOfTables = mysql_query("show tables from ".DB_DATABASE); // run the query and assign the result to $result

        //geting the tables


       // $response["success"] = 1;
        $i=0;$j=0;
        while($table = mysql_fetch_array($ListOfTables))
        { $i++;

            $ListOfColumns = mysql_query("SHOW COLUMNS FROM ".$table[0]);
            $tableNames["table".$i]=$table[0];
            while($column = mysql_fetch_array($ListOfColumns))
            {
                $j++;


                $response["table".$i]["column".$j]=$column['Field'];
            }

        }


        return View::make('form.importation_mapping', compact('response','tableNames','formData'));

//        $form_name = Formm::find($id);
//        $dataTag = DataTag::where("tableId",$form_name->id)->get();
//        $form_details = Records::where("formDataId",$form_name->id)->get();
//        $form_head =FormData::where("formId",$form_name->id)->get();
//
//
//
//      return View::make('data.specific_table', compact('form_name','form_details','dataTag','form_head'));

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
                echo "am in";
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

         $tag=DataTag::create(array(
           'tableId' =>Input::get('formId'),
            'datatagId' => $t
        ));
        $tag->tableId=Input::get('formId');
        $tag->datatagId= $t;
        $tag->save();

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
