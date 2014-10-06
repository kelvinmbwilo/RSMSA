<?php

class FormController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $form=Formm::all();
        return View::make('form.index',compact('form'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('form.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){

        $fom = Formm::create(array(
            'name' => Input::get('form_name')
        ));

        foreach(Input::get('form_data') as $dat){
            if($dat != 0){
                FormData::create(array(
                    "formId"  => $fom->id,
                    "dataId" => $dat,
                ));
            }}

            $msg = "Form Added Successful";
            return View::make('form.add',compact('msg','fom'));

        }


    /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function show()
    {
        $fom = Formm::all();
        $ref = Reference::all();
        $location= Location::all();
        $stakeholder= StakeholderBranch::all();
        return View::make('form.createForm',compact('fom','location','stakeholder','ref'));
    }

        /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function showDetails()
    {
        $formD=Formm::find(Input::get('select'));
        $formData = FormData::where("formId",Input::get('select'))->get();
        return View::make('form.formDetails',compact('formData','formD'));
    }
    /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function databaseCredentials()
    {
        return View::make('form.databaseCredentials');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return Response
     */
    public function storeDatabaseCredentials()
    {
       $credentials=DatabaseCredentials::create(array(
            'databaseType' => Input::get('type'),
            'databaseName' =>Input::get('name'),
            'host' =>Input::get('host'),
            'username' =>Input::get('username'),
            'password' =>Input::get('password'),
            'charset' => Input::get('charset'),
            'prefix' => Input::get('prefix'),
            'schema' => Input::get('schema'),
            'port' => Input::get('port'),
            'formId' => Input::get('formName'),
        ));
        $tag = $credentials->databaseType;
        $form= $credentials->formId;
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

                    return View::make('form.databaseTables',compact('tableNames','response','form'));

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
        $form=Formm::find($id);
        $credentials=DatabaseCredentials::where("formId",$id)->first();
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
                Import::create(array(
                    'databaseName' =>$credentials->databaseName,
                    'tableName' =>$tableName,
                    'databaseColumn' =>$ColumnName,
                    'optionsId' =>Input::get($ColumnName.'_columns'),
                    'dataId' =>Input::get($ColumnName.'_columns'),
                    'formId' => $form->id
                ));
                }else{

                }


            }
          }
        }else{
            echo "no tables";
        }
        $mapping=Import::all();

       return View::make('form.list_mapping',compact('mapping'));
    }


    /**
     * list the
     * @param $id
     */
    public function ListDatabaseDetails($id)
    {
        $credentials=DatabaseCredentials::where("formId",$id)->first();
        $tag = $credentials->databaseType;
        $selectedTables=Input::get('list');
        $formName=Formm::find($id);
        $formData=FormData::where("formId",$id)->get();

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
                   return View::make('form.importation_mapping', compact('response','tableNames','formData','formName'));

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
     * performs the data importation
     *
     */
    public function DataImportation()
    {
        $credentials=DatabaseCredentials::where("formId",Input::get('formName'))->first();
        $tag = $credentials->databaseType;
        $map=Import::where("formId",Input::get('formName'))->get();
        $mapTable=Import::where("formId",Input::get('formName'))->first();


        $location=Input::get('location');
        $branch=Input::get('stakeholder');
        $formData=FormData::where("formId",Input::get('formName'))->get();

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
                         $columns=Import::where("tableName",$tableName)->get();
                      $list=array();
                        foreach($columns as $col){
                            if($col->formId == Input::get('formName') ){
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
                    $form_name = Formm::find(Input::get('formName'));
                    $dataTag = DataTag::where("tableId",$form_name->id)->get();
                    $form_details = Records::where("formDataId",$form_name->id)->get();
                    $form_head1 =Import::where("formId",$form_name->id)->get();
                    $symbol="0";




                    return View::make('data.specific_table', compact('msg','form_name','form_details','dataTag','form_head1','symbol'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $fom = Formm::find($id);
        return View::make('form.edit',compact('fom'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $fom = Formm::find($id);
        $fom->name = Input::get('form_name');
        $fom->save();

        foreach($fom->formData as $cats){
            $cats->delete();}

        foreach(Input::get('form_data') as $dataform){
            if($dataform != 0){
                FormData::create(array(
                    "formId"  => $fom->id,
                    "dataId" => $dataform,
                ));
            }}
        $msg = "Form Updated Successful";
        return View::make('form.edit',compact('msg','fom'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $fom = Formm::find($id);
        foreach($fom->formData as $cats){
            $cats->delete();}
        $fom->delete();
    }






}
