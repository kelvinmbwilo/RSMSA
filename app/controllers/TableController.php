<?php

class TableController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('table_name.index');
    }
    /**
     * Going back to the parent.
     *
     * @return Response
     */
    public function back()
    {
        //return Redirect::back();
        return View::make('table_name.index');
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

    /**
     * Show the form for creating a new table and its column.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('table_name.add');
    }

    /**
     * Show the list of option and its columns .
     * @param  int $id
     * @return response
     */
    public function view_Column($id)
    {
        $table= TableName::find($id);



        return View::make('table_name.viewColumn', compact("table"));
    }
    /**
     * Show the form for creating a new column .
     * @param  int $id
     * @return response
     */
    public function addColumn($id)
    {
        $table=TableName::find($id);



        return View::make('table_name.addColumn', compact("table"));
    }
    /**
     * Show the form for creating a new option in a particular column .
     * @param  int $id
     * @return response
     */
    public function addOptionColumn($id)
    {
        $column=Column::find($id);



        return View::make('table_name.addOptionColumn', compact("column"));
    }


    /**
     * Store a newly created table and its in column.
     *
     * @return Response
     */ 
    public function store()
    {

        $tableName = TableName::create(array(
            'categoryName' => Input::get('tableName')

        ));
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if(Input::get('column'.$j)!= ''){
                $col=Column::create(array(
                    'tableId' => $tableName->id,
                   'columnName' => Input::get('column'.$j),
                    'typeId'=>Input::get('data'.$j),
                    'referenceId'=>Input::get('name'.$j)
                ));
                if(Input::get('name'.$j)!=0){
                 $ref =Reference::find(Input::get('name'.$j));
                 $ref->columnId=$col->id;
                 $ref->save();
                }
            }
        }

        return View::make('table_name.index');

    }

    /** store a new column on a particular table
     * @param $id
     * @return resource
     */
    public function storeColumn($id)
    {

        Column::create(array(
        'tableId' => $id,
        'columnName' => Input::get('column1'),
        'typeId' => Input::get('data'),
        'referenceId'=> Input::get('reference')
    ));
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if(Input::get('option'.$j)!= ''){
                ColumnsOption::create(array(
                    'columnId' => $id,
                   'optionName' => Input::get('option'.$j)
                ));

            }
        }
       $table=TableName::find($id);
        return View::make('table_name.viewColumn', compact("table"));

    }
    /** store a new option on the database
     * @param $id
     * @return resource
     */
    public function storeOptionColumn($id)
    { ColumnsOption::create(array(
        'columnId' => $id,
        'optionName' => Input::get('option1')
    ));
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if(Input::get('option'.$j)!= ''){
                ColumnsOption::create(array(
                    'columnId' => $id,
                   'optionName' => Input::get('option'.$j)
                ));

            }
        }
       $column=Column::find($id);
        $table=$column->tableId;
        $table=TableName::find($table);
       return View::make('table_name.viewColumn', compact("table"));

    }
    /**
     * display a list of the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function viewColumnOption($id)
    {
        $column=Column::find($id);
        return View::make('table_name.viewColumnOption', compact("column"));
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
        $table =TableName::find($id);

        return View::make('table_name.edit',compact("table"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return mixed
     */
    public function editColumn($id)
    {
        $coll =Column::find($id);

        return View::make('table_name.editColumn',compact("coll"));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $table=TableName::find($id);
        $table->categoryName=Input::get('tableName');
        $table->save();
        $detailCount=count($table->column);
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if($j<=$detailCount)
            {
                if(Input::get('column'.$j)== ''){
                    $colDetails= Column::find(Input::get('columnid'.$j));
                    $colDetails->delete();
                }else{
                    $colDetails= Column::find(Input::get('columnid'.$j));
                    $colDetails->columnName=Input::get('column'.$j);
                    $colDetails->typeId=Input::get('data'.$j);
                    $colDetails->referenceId=Input::get('reference'.$j);
                    $colDetails->save();
                }

            }else{
                if(Input::get('column'.$j)!= '')
                {
                    Column::create(array(
                        'tableId' => $table->id,
                        'columnName' => Input::get('column'.$j),
                        'typeId' => Input::get('data'.$j),
                        'referenceId'=>Input::get('reference'.$j)
                    ));
                }

            }



        }
        return View::make('table_name.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function updateColumn($id)
    {
        $column=Column::find($id);
        $table=$column->tableId;
        $table=TableName::find($table);
        $column->columnName=Input::get('columnName');
        $column->save();
        $detailCount=count($column->options);
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if($j<=$detailCount)
            {
                if(Input::get('option'.$j)==''){
                    $colDetails= ColumnsOption::find(Input::get('optionid'.$j));
                    $colDetails->delete();
                }else{
                    $colDetails= ColumnsOption::find(Input::get('optionid'.$j));
                    $colDetails->optionName=Input::get('option'.$j);
                    $colDetails->save();
                }

            }else{
                if(Input::get('option'.$j)!='')
                {
                    ColumnsOption::create(array(
                        'columnId' => $column->id,
                        'optionName' => Input::get('option'.$j)
                    ));
                }

            }



        }
        return View::make('table_name.viewColumn', compact("table"));
    }



    /**
     * Remove a table resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $tableObj= TableName::find($id);

        foreach($tableObj->column as $detail){
            if($detail->options){
            foreach($detail->options as $option){
                $option->delete;
            }
            }
            $detail->delete();
        }
        $tableObj->delete();



        return View::make('table_name.index');
    } /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroyColumn($id)
    {

        $columnObj= Column::find($id);
        $column= Column::find($id);
        $table=$column->tableId;
        $table=TableName::find($table);

                if($columnObj->options){
                    foreach($columnObj->options as $option){
                        $option->delete;
                    }
                }
        $columnObj->delete();



        return View::make('table_name.viewColumn', compact("table"));

    }


}
