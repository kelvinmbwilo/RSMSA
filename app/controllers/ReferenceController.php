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
//        echo Input::get('referenceName'); exit;

        $reference = Reference::create(array(
            'name' => Input::get('referenceName')
        ));
        $reference->name = Input::get('referenceName');
        $reference->save();
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if(Input::get('column'.$j)!= ''){
                ReferenceDetails::create(array(
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
                     $OldColumn1=Input::get('columnName'.$j);

                   if($dataType->name == "integer"){
                        $type="int(11)";
                        $referenceDetails->name=Input::get('column'.$j);
                        $referenceDetails->dataTypeId=Input::get('data'.$j);
                        if($OldColumn1!=$referenceDetails->name){
                           DB::statement( 'ALTER TABLE rsmsa_dynamic_'.$reference->name.' change '.$OldColumn1.' '.$referenceDetails->name.'  '.$type );
                        }else{
                            DB::statement( 'ALTER TABLE rsmsa_dynamic_'.$reference->name.' change '.$referenceDetails->name.' '.$referenceDetails->name.'  '.$type );
                        }
                       $referenceDetails->save();
                    }
                    if($dataType->name == "string"){
                        $type="varchar(255)";
                        $referenceDetails->name=Input::get('column'.$j);
                        $referenceDetails->dataTypeId=Input::get('data'.$j);
                        if($OldColumn1!=$referenceDetails->name){
                            DB::statement( 'ALTER TABLE rsmsa_dynamic_'.$reference->name.' change '.$OldColumn1.' '.$referenceDetails->name.'  '.$type );
                        }else{
                            DB::statement( 'ALTER TABLE rsmsa_dynamic_'.$reference->name.' change '.$referenceDetails->name.' '.$referenceDetails->name.'  '.$type );
                        }

                        $referenceDetails->save();
                    }

              }

            }else{
                if(Input::get('column'.$j)!= ''){
                    $col=ReferenceDetails::create(array(
                        'referenceId' => $reference->id,
                        'name' => Input::get('column'.$j),
                        'dataTypeId'=>Input::get('data'.$j)
                    ));
                    $dataType=DataTypeDetails::find(Input::get('data'.$j));

                    if($dataType->name=="integer")
                    {
                        $type="int(10)";
                        DB::statement( 'ALTER TABLE rsmsa_dynamic_'. $reference->name.' ADD '.$col->name.'  '.$type );
                    }
                    if($dataType->name=="string")
                    {
                        $type="varchar(100)";
                        DB::statement( 'ALTER TABLE rsmsa_dynamic_'. $reference->name.' ADD '.$col->name.'  '.$type );
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

            DB::statement( 'ALTER TABLE rsmsa_dynamic_'.$referenceObj->name.' drop '.$detail->name);
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

            if($column->datatype->name=="integer")
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
    /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function databaseCredentials()
    {
        return View::make('reference.reference_import.databaseCredentials');
    }
    /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function storeDatabaseCredentials()
    {
        $credentials=ReferenceDatabaseCredentials::create(array(
            'databaseType' => Input::get('type'),
            'databaseName' =>Input::get('name'),
            'host' =>Input::get('host'),
            'username' =>Input::get('username'),
            'password' =>Input::get('password'),
            'charset' => Input::get('charset'),
            'prefix' => Input::get('prefix'),
            'schema' => Input::get('schema'),
            'port' => Input::get('port'),
            'referenceId' => Input::get('referenceName'),
        ));
        $tag = $credentials->databaseType;
        $ref= $credentials->referenceId;
        if ($tag != '') {

            // response Array
            $response = array("tag" => $tag, "success" => 0, "error" => 0);
            // Get tag



            if($tag == "sqlite")
            {
                //Get details for the database
                $name = $credentials->databaseName;

                define("DB_DATABASE", $name);
                define("DB_PREFIX", "");

                //its connection details

            }else if($tag == "sqlsrv"){

                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;


                define("DB_HOST",  $host);
                define("DB_DATABASE", $DBname);
                define("DB_USER",  $user);
                define("DB_PASSWORD", $password);
                define("DB_PREFIX", "");

                //its connection details
            }
            else if($tag == "mysql"){
                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;
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

                if($ListOfTables)
                {

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

                    return View::make('reference.reference_import.databaseTables',compact('tableNames','response','ref'));

                }
                else{
                    $response["error"] = 0;
                    $response["error_msg"] = "error in getting database";
                    echo json_encode($response);
                }
            }
            else if($tag == "pgsql"){
                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;
                $charSet = "utf8";
                $schema = "public";

                define("DB_HOST",  $host);
                define("DB_DATABASE", $DBname);
                define("DB_USER",  $user);
                define("DB_PASSWORD", $password);
                define("DB_CHARSET", $charSet);
                define("DB_SCHEMA", $schema);
                define("DB_PREFIX", "");

                //its connection details
            }


        }

    }

    public function ListDatabaseDetails($id)
    {
        $credentials=ReferenceDatabaseCredentials::where("referenceId",$id)->first();
        $tag = $credentials->databaseType;
        $selectedTables=Input::get('list');
        $referenceName=Reference::find($id);
        $referenceDetail=ReferenceImport::where("referenceId",$id)->get();

        if ($tag != '') {

            // response Array
            $response = array("tag" => $tag, "success" => 0, "error" => 0);
            // Get tag



            if($tag == "sqlite")
            {
                //Get details for the database
                $name = $credentials->databaseName;

                define("DB_DATABASE", $name);
                define("DB_PREFIX", "");

                //its connection details

            }else if($tag == "sqlsrv"){

                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;


                define("DB_HOST",  $host);
                define("DB_DATABASE", $DBname);
                define("DB_USER",  $user);
                define("DB_PASSWORD", $password);
                define("DB_PREFIX", "");

                //its connection details
            }
            else if($tag == "mysql"){
                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;
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

                if($ListOfTables)
                {

                    $i=0;$j=0;
                    foreach($selectedTables as $table)
                    { $i++;

                        $ListOfColumns = mysql_query("SHOW COLUMNS FROM ".$table);
                        $tableNames["table".$i]=$table;
                        while($column = mysql_fetch_array($ListOfColumns))
                        {
                            $j++;


                            $response["table".$i]["column".$j]=$column['Field'];
                        }

                    }
                    return View::make('reference.reference_import.importation_mapping', compact('response','tableNames','referenceDetail','referenceName'));

                }
                else{
                    $response["error"] = 0;
                    $response["error_msg"] = "error in getting database";
                    echo json_encode($response);
                }
            }
            else if($tag == "pgsql"){
                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;
                $charSet = "utf8";
                $schema = "public";

                define("DB_HOST",  $host);
                define("DB_DATABASE", $DBname);
                define("DB_USER",  $user);
                define("DB_PASSWORD", $password);
                define("DB_CHARSET", $charSet);
                define("DB_SCHEMA", $schema);
                define("DB_PREFIX", "");

                //its connection details
            }


        }


    }

    /**
     * process the specified resource
     * @param $id
     */
    function processFormMapping($id)
    {
        $ref=Reference::find($id);
        $credentials=ReferenceDatabaseCredentials::where("referenceId",$id)->first();
        $Tables=Input::get('table_name');

        print_r($Tables);



        if(count($Tables)>0)
        {
            foreach($Tables as $tableName)
            {
                $Columns=Input::get($tableName.'_option_name');

                foreach($Columns as $ColumnName)
                {

                    if(Input::get($ColumnName.'_columns')>0){
                        ReferenceImport::create(array(
                            'databaseName' =>$credentials->databaseName,
                            'tableName' =>$tableName,
                            'databaseColumn' =>$ColumnName,
                            'optionsId' =>Input::get($ColumnName.'_columns'),
                            'dataId' =>Input::get($ColumnName.'_columns'),
                            'referenceId' => $ref->id
                        ));
                    }else{

                    }


                }
            }
        }else{
            echo "no tables";
        }
        $mapping=ReferenceImport::all();

        return View::make('reference.reference_import.list_mapping',compact('mapping'));
    }


    /**
     * performs the data importation
     *
     */
    public function DataImportation()
    {
        $credentials=ReferenceDatabaseCredentials::where("referenceId",Input::get('referenceName'))->first();
        $tag = $credentials->databaseType;
        $map=ReferenceImport::where("referenceId",Input::get('referenceName'))->get();
        $mapTable=ReferenceImport::where("referenceId",Input::get('referenceName'))->first();


        $location=Input::get('location');
        $branch=Input::get('stakeholder');
        $referenceDetail=ReferenceDetails::where("referenceId",Input::get('referenceName'))->get();

        $optionId=array();

        $tables=array();
        $tables[]=$mapTable->tableName;
        $m=0;
        foreach($map as $detail){

            if($tables[$m] != $detail->tableName){
                $tables[]=$detail->tableName;
                $m++;

            }

        }

        print_r($tables);
        if ($tag != '') {





            if($tag == "sqlite")
            {
                //Get details for the database
                $name = $credentials->databaseName;

                define("DB_DATABASE", $name);
                define("DB_PREFIX", "");

                //its connection details

            }else if($tag == "sqlsrv"){

                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;


                define("DB_HOST",  $host);
                define("DB_DATABASE", $DBname);
                define("DB_USER",  $user);
                define("DB_PASSWORD", $password);
                define("DB_PREFIX", "");

                //its connection details
            }
            else if($tag == "mysql"){
                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;
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

                if($ListOfTables)
                {
                    foreach($tables as $tableName){
                        $columns=ReferenceImport::where("tableName",$tableName)->get();
                        $list=array();
                        foreach($columns as $col){
                            if($col->referenceId == Input::get('referenceName') ){
                                $list[]=$col->databaseColumn;
                                $optionId[]=$col->optionsId;
                            }
                        }
                        echo "   ".(implode(",",$list));


                        $columnValue = mysql_query("select ".implode(",",$list)." FROM ".$tableName);
                        $no=sizeof($list);

                        echo "   from   ";
                        echo $tableName."   ";


                        $tag=DataTag::orderBy("datatagId","DESC")->first();
                        while($row = mysql_fetch_array($columnValue))
                        {  if($tag!=""){
                            $t=$tag->datatagId+1;
                        }
                        else{
                            $t=0;
                        }



                            for($i=0; $i<$no; $i++){
                                echo "got in";
                                Records::create(array(
                                    'formDataId' => Input::get('formName'),   //form id
                                    'dataOptionId' => "1",      //data id
                                    'categoryOptionId' => $optionId[$i],      //data id
                                    'value' => $row[$i],              //actual value
                                    'datTag' => $t,
                                    'locationId' => $location,
                                    'stakeholderId' => $branch
                                ));

                            }


                            $tag=DataTag::create(array(
                                'tableId' => Input::get('formName'),
                                'datatagId' => $t
                            ));
                            $tag->tableId= Input::get('formName');
                            $tag->datatagId= $t;
                            $tag->save();

                        }






                    }
                    $msg= "The Importation of data to the form was a success!!";
                    $reference_name = Reference::find(Input::get('referenceName'));
                    $dataTag = DataTag::where("tableId",$reference_name->id)->get();
                    $reference_details = $tableName::where("referenceId",$reference_name->id)->get();
                    $reference_head1 =ReferenceImport::where("referenceId",$reference_name->id)->get();
                    $symbol="0";




                    return View::make('data.specific_table', compact('msg','reference_name','reference_details','dataTag','reference_head1','symbol'));
                }
                else{
                    $response["error"] = 0;
                    $response["error_msg"] = "error in getting database";
                    echo json_encode($response);
                }
            }
            else if($tag == "pgsql"){
                //Get details for the database
                $host = $credentials->host;
                $DBname = $credentials->databaseName;
                $user = $credentials->username;
                $password = $credentials->password;
                $charSet = "utf8";
                $schema = "public";

                define("DB_HOST",  $host);
                define("DB_DATABASE", $DBname);
                define("DB_USER",  $user);
                define("DB_PASSWORD", $password);
                define("DB_CHARSET", $charSet);
                define("DB_SCHEMA", $schema);
                define("DB_PREFIX", "");

                //its connection details
            }



        }

    }




}
