<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        return View::make('user.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('user.add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $user=array(

            'firstName' => Input::get('firstname'),
            'middleName' => Input::get('middlename'),
            'lastName' => Input::get('lastname'),
            'username' => Input::get('username'),
            'password' =>Input::get('password'),
            'password_confirm'=>Input::get('password_confirm'),
            'email' => Input::get('email'),
            'phoneNumber' => Input::get('phonenumber'),
            'role' => Input::get('role'),
            'stakeholder' => Input::get('stakeholder'),
            'stakeholderBranchId' => Input::get('stakeholderbranch')
        );
        // create the validation rules ------------------------
        $rules = array(
            'firstName'        => 'required', 						   // just a normal required validation
            'lastName'         => 'required', 						   // just a normal required validation
            'username'         => 'required', 						   // just a normal required validation
            'email'            => 'required|email|unique:rsmsa_users', 	// required and must be unique
            'password'         => 'required',                           // just a normal required validation
            'password_confirm' => 'required|same:password' 			    // required and has to match the password field
        );
        // validate against the inputs from our form
        $validator = Validator::make($user,$rules);
        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // redirect our user back to the form with the errors from the validator
            return Redirect::to('user/add')
                ->withErrors($validator);
        }else{
            $user = User::create(array(
                'firstName' => Input::get('firstname'),
                'middleName' => Input::get('middlename'),
                'lastName' => Input::get('lastname'),
                'username' => Input::get('username'),
                'password' =>Hash::make(Input::get('password')),
                'email' => Input::get('email'),
                'phoneNumber' => Input::get('phonenumber'),
                'role' => Input::get('role'),
                'stakeholderBranchId' => Input::get('stakeholder')
            ));
            return Redirect::to("userindex")->With("alert-success","New user added successful!");
        }

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

		$user = User::find($id);
        $user->firstName=Input::get('firstname');
        $user->middleName=Input::get('middlename');
        $user->lastName=Input::get('lastname');
        $user->username=Input::get('username');
        $user->email=Input::get('email');
        $user->phoneNumber=Input::get('phonenumber');
        $user->role=Input::get('role');
        $user->stakeholderBranchId=Input::get('stakeholder');
        $user->save();

        return Redirect::to("userindex")->With("alert-success","User edited successful!");




	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = User::find($id);
        return View::make('user.edit', compact('user'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
      $user = User::find($id);
      $user->delete();
      return Redirect::to("userindex")->With("alert-success","User Deleted successful!");

	}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function listStakeholderBranch($id)
    {
        $options = '';
        if($id == 0){
            $options .="<option value='0'>No Branch</option>";
        }else{
            foreach(Stakeholder::find($id)->branches as $branches){
                $options .="<option value='{$branches->id}'>{$branches->name}</option>";
            }
        }
        return $options;
    }

}
