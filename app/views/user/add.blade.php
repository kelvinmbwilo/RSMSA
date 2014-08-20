@extends('layout.master')

@section('contents')


<fieldset><legend>Add new user</legend>
<form action="{{url('user/add')}}" method="post">

    <div class="entry">
        <div class="row">
            <div class="col-lg-2"><p>First Name</p></div>
            <div class="col-lg-2"> <input type="text"  name= "firstname" class="form-control"/> </div>

        </div>
        <div class="entry">
            <div class="row">
                <div class="col-lg-2"><p>Middle Name</p></div>
                <div class="col-lg-2"> <input type="text"  name= "middlename" class="form-control"/> </div>

            </div>
            <div class="entry">
                <div class="row">
                    <div class="col-lg-2"><p>Last Name</p></div>
                    <div class="col-lg-2"> <input type="text"  name= "lastname" class="form-control"/> </div>

                </div>
                <div class="entry">
                    <div class="row">
                        <div class="col-lg-2"><p>User Name</p></div>
                        <div class="col-lg-2"> <input type="text"  name= "username" class="form-control"/> </div>

                    </div>
                    <div class="entry">
                        <div class="row">
                            <div class="col-lg-2"><p>Password</p></div>
                            <div class="col-lg-2"> <input type="password"  name= "password" class="form-control"/> </div>

                        </div>
                        <div class="entry">
                            <div class="row">
                                <div class="col-lg-2"><p>Email</p></div>
                                <div class="col-lg-2"> <input type="text"  name= "email" class="form-control"/> </div>

                            </div>
                            <div class="entry">
                                <div class="row">
                                    <div class="col-lg-2"><p>Phone Number</p></div>
                                    <div class="col-lg-2"> <input type="text"  name= "phonenumber" class="form-control"/> </div>

                                </div>
                                <div class="entry">
                                    <div class="row">
                                        <div class="col-lg-2"><p>Role</p></div>
                                        <div class="col-lg-2"> <input type="text"  name= "role" class="form-control"/> </div>

                                    </div>
                                    <div class="entry">
                                        <div class="row">
                                            <div class="col-lg-2"><p>Stakeholder branchid</p></div>
                                            <div class="col-lg-2"> <input type="text"  name= "branchid" class="form-control"/> </div>

                                        </div>
        <hr>
        <div class="sep"></div>

        <button type="submit" name="submit" class="btn btn-primary">Add</button>
               <a class="btn btn-danger" href="{{ url('user') }}"> Cancel</a>
    </div>
    </div>
    </div>
    <div class="clear"></div>
</form>
</fieldset>
@stop