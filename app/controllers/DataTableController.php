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
        if(Input::get('reference')== 0){
        $data = Data::create(array(
            'name' => Input::get('data_name'),
            'hasReference' => "false"
        ));
        }else{
            $data = Data::create(array(
                'name' => Input::get('data_name'),
                'hasReference' => "true"
            ));

            $ref = DataReference::create(array(
                'dataId' => $data->id,
                'referenceId' => Input::get('reference')
            ));

        }
        DataOptions::create(array(
            'dataId' => $data->id,
            'optionsId' => Input::get('parent_level')
        ));

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
        $dataRef = DataReference::where("dataId",$id)->get();


        return View::make('data_table.edit',compact('dataRef'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {   $data=Data::find($id);
        $data_option = DataOptions::where("dataId",$data->id)->get();

        $data->name = Input::get('data_name');
           if($data_option->optons){
        foreach($data_option->optonsd as $option){

        }
    }
        $data_option->save();
        $msg = "Data Table Updated Successful";
        return View::make('data_table.edit',compact('msg','data'));
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
        if( $data_options){
              $data_options->delete();
          }
        $data->delete();
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
            $dataArray[$i]= Options::where("id",$data->optionsId)->get();
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
