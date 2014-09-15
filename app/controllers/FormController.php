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
    public function store()
    {
        $fom = Formm::create(array(
            'name' => Input::get('form_name')

        ));
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
        $formData = FormData::where("dataId",Input::get('select'))->first();
        $dataOpt =DataOptions::where("dataId",$formData->dataId)->first();
        $optCat =CategoryOptions::where("optionsId",$dataOpt->optionsId)->first();
        return View::make('form.formDetails',compact('fom','$dataOpt','optCat'));
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
        $fom->delete();
    }






}
