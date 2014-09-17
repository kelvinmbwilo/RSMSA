<?php

class OptionsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $option = Options::all();
        return View::make('options.index',compact('option'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('options.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(){
        if(Input::get('category_option')== 0){
        $opt = Options::create(array(
            'name' => Input::get('option_name'),
            'datatypeId' => Input::get('data_type'),
            'hasCategories'=>"false"
        ));
        }
        else{
            $opt = Options::create(array(
                'name' => Input::get('option_name'),
                'datatypeId' => Input::get('data_type'),
                'hasCategories'=>"true"
        ));
        }

        foreach(Input::get('category_option') as $category){
            if($category != 0){
                CategoryOptions::create(array(
                    "optionsId"  => $opt->id,
                    "categoryId" => $category,
                ));
            }}
        $msg = "Option Added Successful";
        return View::make('options.add',compact('msg','opt'));

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
        $opt = Options::find($id);
        return View::make('options.edit',compact('opt'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if(Input::get('category_option')== 0){
        $opt = Options::find($id);
        $opt->name = Input::get('option_name');
        $opt->datatypeId = Input::get('data_type');
        $opt->hasCategories = "false";
        $opt->save();
        }else{
            $opt = Options::find($id);
            $opt->name = Input::get('option_name');
            $opt->datatypeId = Input::get('data_type');
            $opt->hasCategories = "true";
            $opt->save();
        }
        foreach($opt->categoryOptions as $cats){
            $cats->delete();
        }
        foreach(Input::get('category_option') as $category){
            if($category != 0){
                CategoryOptions::create(array(
                    "optionsId"  => $opt->id,
                    "categoryId" => $category,
                ));
            }
        }
        $msg = "Option Updated Successful";
        return View::make('options.edit',compact('msg','opt'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $opt = Options::find($id);
        foreach($opt->categoryOptions as $cats){
            $cats->delete();
        }
        $opt->delete();
    }


}
