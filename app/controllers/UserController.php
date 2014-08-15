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
        $user = User::create(array(

            'firstName' => Input::get('firstname'),
            'middleName' => Input::get('middlename'),
            'lastName' => Input::get('lastname'),
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'email' => Input::get('email'),
            'phoneNumber' => Input::get('phonenumber'),
            'role' => Input::get('role'),
            'stakeholderBranchId' => Input::get('branchid')


        ));

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
        $user->password=Input::get('password');
        $user->email=Input::get('email');
        $user->phoneNumber=Input::get('phonenumber');
        $user->role=Input::get('role');
        $user->stakeholderBranchId=Input::get('branchid');
        $user->save();





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

	}


}
