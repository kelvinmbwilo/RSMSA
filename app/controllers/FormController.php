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
        return View::make('form.createForm',compact('fom'));
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
        ));
        $tag = $credentials->databaseType;
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
                    // return View::make('form.importation_mapping', compact('response','tableNames','formData'));
                    return View::make('form.databaseTables',compact('tableNames','response'));

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
       echo "yeyoooooooo";

    }


    /**
     * list the
     * @param $credentials
     */
    public function ListDatabaseDetails($credentials)
    {
        $tag = $credentials->databaseType;
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
                   // return View::make('form.importation_mapping', compact('response','tableNames','formData'));
                    return View::make('form.databaseTables',compact('tableNames','response'));

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
        return View::make('form.databaseTables',compact('tableNames','response'));

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
