<?php

class DataExportationController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return View::make('dashboard');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
     * a function to export data to excel
     */
    public function excelDownload(){
        /** Include PHPExcel */
        require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
        $title = "";$pat = false;
        $row = array();
        $column = array();
        $columntype = $this->generateArray(Input::get("show"));

        if(Input::get("horizontal") == "Year"){
            $row = array("01"=>"jan","02"=>"feb","03"=>"mar","04"=>"apr","05"=>"may","06"=>"jun","07"=>"jul","08"=>"aug","09"=>"sep","10"=>"oct","11"=>"nov","12"=>"dec");

            foreach($row as $key => $value){
                $from = Input::get('year')."-".$key."-01";
                $to = Input::get('year')."-".$key."-31";
                if(isset($columntype)){
                    foreach($columntype as $key1=>$value1){
                        $offencequery = DB::table('psms_data');
                        $query = $this->processQuery($offencequery);
                        $que = $this->checkCondition($query,$pat,$key1)->whereBetween('created_at',array($from,$to));
                        $column[$value1][] = $que->count();
                    }
                    $title = Input::get('vertical')." ". $query[1]." ".Input::get('year');;
                }
            }
        }
        elseif(Input::get("horizontal") == "Years"){
            $row = range(Input::get('start'),Input::get('end'));

            foreach($row as $value){
                $from = $value."-01-01";
                $to = $value."-12-31";
                if(isset($columntype)){
                    foreach($columntype as $key1=>$value1){
                        $offencequery = DB::table('psms_data');
                        $query = $this->processQuery($offencequery);
                        $que = $this->checkCondition($query,$pat,$key1)->whereBetween('created_at',array($from,$to));
                        $column[$value1][] = $que->count();
                    }
                    $title = Input::get('vertical')." ". $query[1]." ".Input::get('start')." - ".Input::get('end');
                }
            }
        }
        elseif(Input::get("horizontal") == "Age Range"){
            //setting the limits
            if((parent::maxAge()%Input::get('age')) == 0){
                $limit = parent::maxAge();
            } else{
                $limit = (parent::maxAge()-(parent::maxAge()%Input::get('age')))+Input::get('age');
            }
            //making a loop for values
            //year iterator
            $k = 0;
            //getting age
            $range = Input::get('age');
            $yeardate = date("Y")+1;
            $yaerdate1 = $yeardate."-01-01";

            //creating title
            $data = array();
            for($i=$range;$i<=$limit;$i+=$range){
                $row[] = $k ." - ". $i;
                //start year
                $time = $k*365*24*3600;
                $today = date("Y-m-d");
                $timerange = strtotime($today) - $time;
                $start  = (date("Y",$timerange)+1)."-01-01";
                //end year
                $time1 = $i*365*24*3600;
                $timerange1 = strtotime($today) - $time1;
                $end = date("Y",$timerange1)."-01-01";
                if(isset($columntype)){
                    foreach($columntype as $key1=>$value1){
                        $offencequery = DB::table('psms_data');
                        $query = $this->processQuery($offencequery);
                        $que = $this->checkCondition($query,$pat,$key1)->whereIn('license', Licence::whereBetween('dob',array($end,$start))->get()->lists('licenceNo')+array('0'));
                        $column[$value1][] = $que->count();
                    }
                    $title = Input::get('vertical')." Age Range ". $query[1];
                }
                $k=$i;
            }
        }





        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle( $title )
            ->setSubject($title)
            ->setDescription($title)
            ->setKeywords("office 2007 openxml php")
            ->setCategory($title);

        ?>
        <?php

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', Input::get('show'));

        $k=0;
        $latter = array("B","C","D","E","F","G","H","I","J","K","L","M");
        foreach($row as $header){
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($latter[$k]."1", $header);
            $k++;
        }
        ?>
        <?php
        $j=2;

        foreach($column as $keys => $cols){ ?>
            <tr>
                <td><?php
                    if(Input::get('show') == 'Regions'){
                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$j, Region::find($keys)->region);
                    }elseif(Input::get('show') == 'Districts' ){
                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$j, District::find($keys)->district);
                    }else{
                        $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A'.$j, $keys);
                    }
                    ?></td>
                <?php
                $m=0;
                foreach($cols as $colsval){
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue($latter[$m].$j, $colsval);
                    $k++;
                }
                ?>
            </tr>
            <?php
            $j++;} ?>

        <?php

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle($title);


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simple.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

}
