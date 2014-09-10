<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$location = Location::all();
        return View::make('location.index',compact('location'));
	}

    /**
	 * Display a listing of the resource.
	 * @param int $id
	 * @return Response
	 */
	public function childindex($id)
	{
        exit;
		$location = Location::where('parentId',$id)->get();
        return View::make('location.index',compact('location'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('location.add');
	}

    /**
	 * return the list of children of a specific level
	 *
	 * @return Response
     * @param id
	 */
	public function listchild($id)
	{
        $options = '';
        if($id == 0){
            $options .="<option value='0'>No Parent</option>";
        }else{
        foreach(LocationLevel::find(LocationLevel::find($id)->parentId)->locations as $location){
            $options .="<option value='{$location->id}'>{$location->name}</option>";
        }
        }
        //$locations = json_encode(LocationLevel::find($id)->locations);
		return $options;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$location = Location::create(array(
           'name' => Input::get('location_name'),
           'level' => Input::get('parent_level'),
           'latitude' => Input::get('latitude'),
           'longitude' => Input::get('longitude'),
           'parentId' => Input::has('Parent')?Input::get('Parent'):'0',
           'locationLevelId' => Input::get('parent_level'),
        ));
        $msg = "Location added successful";
        return View::make('location.add',compact('msg','location'));
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
		$location = Location::find($id);
        return View::make('location.edit',compact('location'));
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

	}


}
