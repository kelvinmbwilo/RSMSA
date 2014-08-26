<?php

class LocationLevelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $levels = LocationLevel::all();
		return View::make('location.location_level.index',compact('levels'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('location.location_level.add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$level = LocationLevel::create(array(
           'name' => Input::get('location_name'),
           'parentId' => Input::get('parent_level')
        ));
        $msg = "Location Level Added Successful";
        return View::make('location.location_level.add',compact('msg','level'));
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
        $level->delete();
	}


}
