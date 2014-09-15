<?php

class MappingController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mapping = DataReferenceMapping::all();

        return View::make('mapping.index',compact('mapping'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

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
        $mapping = DataReferenceMapping::find($id);
        $referenceDetails = ReferenceDetails::all();
        return View::make('mapping.edit',compact('mapping','referenceDetails'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $referenceDetails = ReferenceDetails::all();
        $mapping = DataReferenceMapping::find($id);
        $mapping->dataId = Input::get('location_name');
        $mapping->optionId = Input::get('option_name');
        $mapping->referenceId = Input::get('reference_name');
        $mapping->save();
        $msg = "Data Reference Mapping Updated Successful";
        return View::make('mapping.edit',compact('msg','mapping','referenceDetails'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $mapping = DataReferenceMapping::find($id);
        $mapping->delete();
    }




}
