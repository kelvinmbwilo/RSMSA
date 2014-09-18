<?php

class DataTableController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Data::all();
        return View::make('data_table.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('data_table.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if(Input::get('reference') == 0){
            $data = Data::create(array(
                'name' => Input::get('data_name'),
                'hasReference' => "false"
            ));
            foreach(Input::get('option') as $option){
                DataOptions::create(array(
                    'dataId' => $data->id,
                    'optionsId' => $option
                ));
            }
        }else{
            $data = Data::create(array(
                'name' => Input::get('data_name'),
                'hasReference' => "true"
            ));

            foreach(Input::get('option') as $option){
                DataOptions::create(array(
                    'dataId' => $data->id,
                    'optionsId' => $option
                ));
            }

            /////////////////////////////////////////////
            ////////reference mapping here /////////////
            /**
             * @TODO create reference maping
             */
            $ref = DataReference::create(array(
                'dataId' => $data->id,
                'referenceId' => Input::get('reference'),
                'keyColumnId' => Input::get('referenceKeyColumn')
            ));
        }


        $msg = "Data Table Added Successful please do the mapping";
        return View::make('data_table.add',compact('msg','data','ref'));
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
        $dataRef = DataReference::where("dataId",$id)->first();
          $data = Data::find($id);

        return View::make('data_table.edit',compact('dataRef','data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {   $data=Data::find($id);
        $dataRef=DataReference::where("dataId",$data->id)->first();
       
        $dataRef->save();

        $data_option = DataOptions::where("dataId",$data->id)->get();

        $data->name = Input::get('data_name');
        $data->save();
           if($data_option->optons){
               foreach($data_option as $option){
                   $option->delete();
               }


            foreach(Input::get('option') as $option){
                DataOptions::create(array(
                    'dataId' => $data->id,
                    'optionsId' => $option
                ));
            }
    }
        $data_option->save();
        $data=Data::all();
        $msg = "Data Table Updated Successful";
        return View::make('data_table.index',compact('msg','data'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = Data::find($id);
        $data_options = DataOptions::where("dataId",$data->id)->get();
        if($data_options){
            foreach($data_options as $option){
                $option->delete();
            }
          }
        $data->delete();
    }

    /**
     * Lists the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function listReferenceDetails($id)
    {
        $options = '';
        if($id == 0){
            $options .="<option value='0'>No Reference selected</option>";
        }else{
            foreach(Reference::find($id)->referenceDetails as $reference){
                $options .="<option value='{$reference->id}'>{$reference->name}</option>";
            }
        }
        return $options;
    }



    /**
     * mapping of reference and the data resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function mapping($id)
    {   $dataArray= array();
        $dataRef = DataReference::find($id);

        $data= $dataRef->data;
        $tableId=$data->id;
        $opt= DataOptions::where("dataId",$data->id)->get();

        $i=0;
            foreach($opt as $data){
            $dataArray[$i]= Options::where("id",$data->optionsId)->first();
            $i=$i+1;
       }
        $reference= $dataRef->referenceData;
        $reference= ReferenceDetails::where("referenceId",$reference->id)->get();
//        print_r($dataArray);
//       echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
////        print_r($reference);
//
//        echo $dataArray[0];



       return View::make('data_table.mapping',compact('reference','dataArray','dataRef','tableId'));
    }


    /**
     * @param $id
     * @return mixed
     */
    public function store_mapping($id)
    {  $i=0;

        $dataID=$id;
        $option=DataOptions::where("dataId",$dataID)->get();
        $reference=DataReference::where("dataId",$dataID)->get();
        $referenceDetails = ReferenceDetails::all();

       $count=count($option);

        while($i<$count)
           {  $i=$i+1;
            DataReferenceMapping::create(array(
                'dataId' => $dataID,
                'optionsId' => Input::get('option_name'.$i),
                'referenceId' => Input::get('reference'.$i)
            ));
               $mapping=DataReferenceMapping::orderBy("id","DESC")->get();

           }

        $msg = "Data Reference Mapping Added Successful";

        return View::make('mapping.index',compact('msg','mapping','reference','referenceDetails'));
    }



}
