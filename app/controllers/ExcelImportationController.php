<?php

class ExcelImportationController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $excel=ExcelCredential::all();
        return View::make('excel.index',compact('excel'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('excel.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $file=Input::file('file');
        $destination="excelFiles";
        $val=array();
        $column=array();
        $dataType=array();
        $worksheetTitle=array();

        if ($file)
        {
            $file_extension=$file->getClientOriginalExtension();
            $file_name=$file->getClientOriginalName();
            $filepath=$file->move( $destination,$file_name);
            $fileSize= $filepath->getSize();
            $form=Input::get('form_name');
            $reference=Input::get('reference_name');
            $stakeholder=Input::get('stakeholder');
            if(Input::get('type')=="form"){
            $excel=ExcelCredential::create(array(
                'filename' =>$file_name,
                'type' =>"form",
                'path' =>$filepath,
                'extension'=>$file_extension,
                'size'=>$fileSize,
                'stakeholderId'=>$stakeholder,
                'formId'=>$form,
            ));
               }else{
                $excel=ExcelCredential::create(array(
                    'filename' =>$file_name,
                    'type' =>"reference",
                    'path' =>$filepath,
                    'extension'=>$file_extension,
                    'size'=>$fileSize,
                    'stakeholderId'=>$stakeholder,
                    'formId'=>$reference,
                ));

            }
            require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
            $objPHPExcel = PHPExcel_IOFactory::load($excel->path);

                $worksheet            = $objPHPExcel->getActiveSheet();
                $highestRow           = $worksheet->getHighestRow(); // e.g. 10
                $highestColumn        = $worksheet->getHighestColumn(); // e.g 'F'
                $highestColumnIndex   = PHPExcel_Cell::columnIndexFromString($highestColumn);
                $nrColumns = ord($highestColumn) - 64;
                $row=1;
                for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                    $cell = $worksheet->getCellByColumnAndRow($col, $row);
                    $val[] = $cell->getValue();
                    $columnVal[]= $cell->getColumn();;
                    $dataType[] = PHPExcel_Cell_DataType::dataTypeForValue($val[$col]);

                   }

            if(Input::get('type')=="form"){
              $formData=FormData::where("formId",$excel->formId)->get();
            }else{
                $formData=ReferenceDetails::where("referenceId",$excel->formId)->get();
            }
           return View::make('excel.mapping',compact('worksheetTitle','val','columnVal','dataType','nrColumns','formData','highestColumn','highestRow','form','excel'));

        }
        else{

        }

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

    /**
     * To import excel data
     *
     */
    public function excel_importation_form(){
        $mapping="";
        if(Input::get('type')== "form"){
            $credentials=ExcelCredential::where("formId",Input::get('formName'))->first();
            $mapping=ExcelMapping::where("formId",$credentials->formId)->get();
        }else{
            $refDet=array();
            $credentials=ExcelCredential::where("formId",Input::get('referenceName'))->first();
            $referenceName=Reference::find(Input::get('referenceName'));
            $referenceDetails=ReferenceDetails::where("referenceId",Input::get('referenceName'))->get();
            foreach($referenceDetails as $padamaz){
                $refDet[]=$padamaz->name;
            }
            $mapping=ExcelMapping::where("dataId",$credentials->formId)->get();
            echo implode(",",$refDet);
        }

        $location=Input::get('location');
        $branch=Input::get('stakeholder');



        /** Include PHPExcel */
        require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
        $objPHPExcel = PHPExcel_IOFactory::load($credentials->path);

        $worksheet=$objPHPExcel->getActiveSheet();
        $highestRow           = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn        = $worksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex   = PHPExcel_Cell::columnIndexFromString($highestColumn);

        $tag=DataTag::orderBy("datatagId","DESC")->first();

        if(Input::get('type')=="form"){
            for ($row = 2; $row <= $highestRow; ++$row) {
                if($tag!=""){
                    $t=$tag->datatagId+1;
                }
                else{
                    $t=0;
                }
                foreach($mapping as $map){
                    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                        $cell = $worksheet->getCellByColumnAndRow($col, $row);
                        $val = $cell->getValue();
                        $column= $cell->getColumn();

                        if($column == $map->excelColumn){
                            $new=Records::create(array(
                                'formDataId' => $map->formId,   //form id
                                'dataOptionId' =>  $map->dataId,      //data id
                                'categoryOptionId' => $map->optionsId,      //data id
                                'datTag' => $t,
                                'locationId' => $location,
                                'stakeholderId' => $branch,
                            ));
                            $new->value=$val;  //actual value
                            $new->save();
                        }

                    }
                }   $tag=DataTag::create(array(
                    'tableId' => Input::get('formName'),
                    'datatagId' => $t
                ));
                $tag->tableId= Input::get('formName');
                $tag->datatagId= $t;
                $tag->save();
            }
            $msg= "The Importation of data to the form was a success!!";
            $form_name = Formm::find(Input::get('formName'));
            $dataTag = DataTag::where("tableId",$form_name->id)->get();
            $form_details = Records::where("formDataId",$form_name->id)->get();
            $form_head1 =ExcelMapping::where("formId",$form_name->id)->get();
            $symbol="0";

            return View::make('data.specific_table', compact('msg','form_name','form_details','dataTag','form_head1','symbol'));

        }else{
            for ($row = 2; $row <= $highestRow; ++$row) {
                $cont=0;$uid="";
                foreach($mapping as $map){

                    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                        $cell = $worksheet->getCellByColumnAndRow($col,$row);
                        $val = $cell->getValue();
                        $column= $cell->getColumn();


                        if($column == $map->excelColumn && $cont==0 ){
                            $colu=ReferenceDetails::find($map->optionsId);
                            echo "$colu->name ";
                            echo "$val ";
                           DB::statement("INSERT INTO rsmsa_dynamic_".$referenceName->name." (".$colu->name.") VALUES ('".$val."')");
                            $uid= DB::table('rsmsa_dynamic_'.$referenceName->name)->where($colu->name, $val)->pluck('id');
                            echo $uid." ==";




                            $cont=$cont+1;
                            echo $cont;
                       }
                        else if($column == $map->excelColumn && $cont>0){

                            $colu=ReferenceDetails::find($map->optionsId);
                            DB::statement("UPDATE rsmsa_dynamic_".$referenceName->name." SET ".$colu->name."='".$val."' WHERE id=".$uid);

                          }

                }
            }

        }

     }
    }





    /**
     * procss the mapping of the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function excelMapping($id){

        $columnId=Input::get('columnId');
        $columnName=Input::get('column_name');
        $optionId=Input::get('selection');
        $type=$id;





        if(count($columnName)>0)
        {   $i=0;
            foreach($columnName as $column)
            {

                if($type=="form"){

                    if($optionId[$i]!="0"){
                        $dataId=DataOptions::where("optionsId",$optionId[$i])->first();
                        ExcelMapping::create(array(
                            'excelColumn' => $columnId[$i],
                            'optionsId' =>$optionId[$i],
                            'dataId' =>$dataId->dataId,
                            'formId' =>$id,

                        ));
                    }else{

                    }
                $i++;
            }else{

                    if($optionId[$i]!="0"){

                        $dataId=ReferenceDetails::find($optionId[$i]);

                        ExcelMapping::create(array(
                            'excelColumn' => $columnId[$i],
                            'optionsId' =>$optionId[$i],
                            'dataId' => $dataId->referenceId,
                            'formId' =>"0",

                        ));
                    }else{

                    }
                    $i++;


        }

    }

                $mapping=ExcelMapping::where("formId","0")->get();



        return View::make('excel.list_mapping_reference',compact('mapping','type'));

}
}
}
