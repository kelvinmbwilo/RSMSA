<?php

class stakeholderBranchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public static function index()
	{
		//
        $stakeholder = new stakeholder();
        $stakeholder->toarray();
        $stakeHolderBranch = StakeHolderBranch::all();
        $stakeHolderBranch->toarray();
        return View::make('stakeholder.stakeholderBranch' , compact('stakeHolderBranch'), compact('stakeholder'));
	}

    /**
     * Display the list of branches for a specific stakeholder
     *
     * @param  int  $id
     * @return Response
     */
    public function listBranch($id){

        $stakeholder = Stakeholder::find($id);
        return View::make('stakeholder.stakeholderBranch', compact('stakeholder'));

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


}
