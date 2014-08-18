<?php

class stakeholderBranchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public static function index()
	{
        $stakeHolderBranch = StakeHolderBranch::all();
        $stakeHolderBranch->toarray();
        return View::make('stakeholder.stakeholderBranch' , compact('stakeHolderBranch'));
	}

    /**
     * @param $id
     * @return mixed
     */
    public function newBranchForm($id){
        $stakeholder = Stakeholder::find($id);
        $stakeholder -> toarray();
        return View::make('stakeholder.addBranchStakeholder' , compact('stakeholder'));
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
     * @param $id
     * @return mixed
     */
    public function store($id)
	{
        $newBranch = StakeHolderBranch::create(array(
            'name' => Input::get('name'),
            'PhoneNumber' => Input::get('PhoneNumber'),
            'address' => Input::get('address'),
            'email' => Input::get('email'),
            'locationId' => '',
            'stakeholderId' => $id
        ));

        $stakeholder = Stakeholder::find($id);
        return View::make('stakeholder.specificStakeholderBranch', compact('stakeholder'));

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
        $stakeHolderBranch = StakeHolderBranch::find($id);
        $stakeHolderBranch->toarray();
        return View::make('stakeholder.editBranchStakeholder' , compact('stakeHolderBranch'));
	}


	/**
	 * Update the specified resource in storage.
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $stakeholderBranch=StakeHolderBranch::find($id);
        $stakeholderBranch->name=Input::get('name');
        $stakeholderBranch->PhoneNumber=Input::get('PhoneNumber');
        $stakeholderBranch->address=Input::get('address');
        $stakeholderBranch->email=Input::get('email');
        $stakeholderBranch->save();


        $stakeholderBranch = StakeHolderBranch::find($id);
        $result = $stakeholderBranch->stakeholder->id;
        $stakeholder = Stakeholder::find($result);
        $stakeholder->toarray();
        return View::make('stakeholder.specificStakeholderBranch', compact('stakeholder'));
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
        //
        StakeHolderBranch::find($id)->delete();
        return Redirect::back()->with('message', 'Deleted!!');
        //$stakeholder = $result->stakeholder;
        //echo $stakeholder;


        //return View::make('stakeholder.specificStakeholderBranch', compact('stakeholder'));
	}


}
