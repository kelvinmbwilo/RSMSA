<?php

class CategoryController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $category = Categories::all();
        return View::make('category.index',compact('category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('category.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $cat = Categories::create(array(
            'name' => Input::get('category_name')

        ));
        $msg = "Category Added Successful";
        return View::make('category.add',compact('msg','cat'));
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
        $cat = Categories::find($id);
        return View::make('category.edit',compact('cat'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $cat = Categories::find($id);
        $cat->name = Input::get('category_name');
        $cat->save();
        $msg = "Category Updated Successful";
        return View::make('category.edit',compact('msg','cat'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cat = Categories::find($id);
        $cat->delete();
    }



}
