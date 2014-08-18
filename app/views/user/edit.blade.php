@extends('layout.master')

@section('contents')

<fieldset><legend>Edit user</legend>

    <form action="{{ url('user/edit')}}/{{$user->id}}" method="post">
        <div class="entry">
            <div class="row">
                <div class="col-lg-2"><p>First Name</p></div>
                <div class="col-lg-2"> <input type="text"  name= "firstname" class="form-control" value="{{$user->firstName}}"/> </div>

            </div>
            <div class="entry">
                <div class="row">
                    <div class="col-lg-2"><p>Middle Name</p></div>
                    <div class="col-lg-2"> <input type="text"  name= "middlename" class="form-control" value="{{$user->middleName}}" /> </div>

                </div>
                <div class="entry">
                    <div class="row">
                        <div class="col-lg-2"><p>Last Name</p></div>
                        <div class="col-lg-2"> <input type="text"  name= "lastname" class="form-control" value="{{$user->lastName}}" /> </div>

                    </div>
                    <div class="entry">
                        <div class="row">
                            <div class="col-lg-2"><p>User Name</p></div>
                            <div class="col-lg-2"> <input type="text"  name= "username" class="form-control" value="{{$user->username}}" /> </div>

                        </div>
                        <div class="entry">
                            <div class="row">
                                <div class="col-lg-2"><p>Password</p></div>
                                <div class="col-lg-2"> <input type="text"  name= "password" class="form-control" value="{{$user->password}}"/> </div>

                            </div>
                            <div class="entry">
                                <div class="row">
                                    <div class="col-lg-2"><p>Email</p></div>
                                    <div class="col-lg-2"> <input type="text"  name= "email" class="form-control"  value="{{$user->email}}"/> </div>

                                </div>
                                <div class="entry">
                                    <div class="row">
                                        <div class="col-lg-2"><p>Phone Number</p></div>
                                        <div class="col-lg-2"> <input type="text"  name= "phonenumber" class="form-control" value="{{$user->phoneNumber}}"/> </div>

                                    </div>
                                    <div class="entry">
                                        <div class="row">
                                            <div class="col-lg-2"><p>Role</p></div>
                                            <div class="col-lg-2"> <input type="text"  name= "role" class="form-control" value="{{$user->role}}"/> </div>

                                        </div>
                                        <div class="entry">
                                            <div class="row">
                                                <div class="col-lg-2"><p>Stakeholder branchid</p></div>
                                                <div class="col-lg-2"> <input type="text"  name= "branchid" class="form-control" value="{{$user->stakeholderBranchId}}"/> </div>

                                            </div>
                                            <hr>
                                            <div class="sep"></div>

                                            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                                            <a class="btn btn-danger" href="{{ url('user') }}"> Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
    </form>
</fieldset>
@stop

















