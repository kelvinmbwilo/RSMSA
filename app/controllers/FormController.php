<?php

class FormController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $form = Form::all();
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
        $form = Form::create(array(
            'name' => Input::get('form_name'),

        ));
        FormData::create(array(
            'formId' =>$form->id,
            'dataId' => Input::get('data')
        ));
        $msg = "Form Added Successful";
        return View::make('form.add',compact('msg','form'));
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
        $level = LocationLevel::find($id);
        return View::make('location.location_level.edit',compact('level'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $level = LocationLevel::find($id);
        $level->name = Input::get('location_name');
        $level->parentId = Input::get('parent_level');
        $level->save();
        $msg = "Location Level Updated Successful";
        return View::make('location.location_level.edit',compact('msg','level'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $level = LocationLevel::find($id);
        $child = LocationLevel::where("parentId",$level->id)->get();
        if($child){
            foreach($child as $childlevel){
                $this->deletelocation($childlevel);
            }
        }
        $level->delete();
    }

    /**
     * Delete a specific Location.
     *
     * @param  Locationlevel  $location
     * @return Response
     */
    public function deletelocation($location){
        $child = LocationLevel::where("parentId",$location->id)->get();
        if($child){
            foreach($child as $childlevel){
                $this->deletelocation($childlevel);
            }
        }
        $location->delete();
    }


}
