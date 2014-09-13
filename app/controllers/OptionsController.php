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
    public function store()
    {  print_r((Input::get('category_option[]')));
//        $opt = CategoryOptions::create(array(
//            'name' => Input::get('option_name'),
//            'categoryId' => Input::get('category_option')
//        ));
//        $msg = "Option Added Successful";
//        print_r(Input::get('category_option'));
//        return View::make('options.add',compact('msg','opt'));
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
        return View::make('location.location_level.edit',compact('opt'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $opt = Options::find($id);
        $opt->name = Input::get('option_name');
        $opt->categoryId = Input::get('category_option');
        $opt->save();
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
        $level =Options::find($id);
        $child = Options::where("categoryId",$level->id)->get();
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
