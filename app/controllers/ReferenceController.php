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
		$success =  "Reference Created Successful";
        $reference = Reference::create(array(
            'name' => Input::get('referenceName')

        ));
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if(Input::get('column'.$j)!= ''){
                DataReference::create(array(
                    'referenceId' => $reference->id,
                    'name' => Input::get('column'.$j)
                ));

            }
        }

        return View::make('reference.data_reference.index',compact('success'));

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
        $reference->name=Input::get('referenceName');
        $reference->save();
        $detailCount=count($reference->referenceDetails);
        for($i =0 ;$i < Input::get('col_count'); $i++ ){
            $j = $i+1;
            if($j<=$detailCount)
            {
                if(Input::get('column'.$j)== ''){
                    $referenceDetails= ReferenceDetails::find(Input::get('columnid'.$j));
                    $referenceDetails->delete();
                }else{
                    $referenceDetails= ReferenceDetails::find(Input::get('columnid'.$j));
                    $referenceDetails->name=Input::get('column'.$j);
                    $referenceDetails->save();
                }

            }else{
                if(Input::get('column'.$j)!= '')
                {
                    DataReference::create(array(
                        'referenceId' => $reference->id,
                        'name' => Input::get('column'.$j)
                    ));
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

            $detail->delete();
        }
        $referenceObj->delete();

        return View::make('reference.data_reference.index');
	}


}
