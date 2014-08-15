<?php

class StakeholderController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $stakeHolder = Stakeholder::all();
        $stakeHolder->toarray();
        return View::make('stakeholder.stakeholders' , compact('stakeHolder'));
	}


    /**
     * Display the list of branches for a specific stakeholder
     *
     * @param  int  $id
     * @return Response
     */
    public function listBranch($id){


        $stakeholder = Stakeholder::find($id);
        return View::make('stakeholder.specificStakeholderBranch', compact('stakeholder'));

    }

    /**
     *
     */
    public function newStakeholderForm(){

        return View::make('stakeholder.addStakeholder');
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

        $rules = array(
            'name'       => 'required'
        );

        $input = Input::all();
        $validation = Validator::make($input, $rules);

        if ($validation->passes())
        {
            Stakeholder::create($input);
            $stakeHolder = Stakeholder::all();
            $stakeHolder->toarray();
            return View::make('stakeholder.stakeholders', compact('stakeHolder'));
        }

        return Redirect::route('stakeholder.addStakeholder')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
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
        $stakeholder = Stakeholder::find($id);
        $stakeholder->toarray();
        return View::make('stakeholder.editStakeholder' , compact('stakeholder'));
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
        $stakeholder=Stakeholder::find($id);
        $stakeholder->name=Input::get('name');
        $stakeholder->save();


        $stakeHolder = Stakeholder::all();
        $stakeHolder->toarray();
        return View::make('stakeholder.stakeholders', compact('stakeHolder'));
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
        Stakeholder::find($id)->delete();
        $stakeHolder = Stakeholder::all();
        $stakeHolder->toarray();
        return View::make('stakeholder.stakeholders' , compact('stakeHolder'));
	}


}
