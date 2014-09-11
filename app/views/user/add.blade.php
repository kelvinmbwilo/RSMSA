@extends('layout.master')

@section('contents')

<section class="panel panel-success">
    <header class="panel-heading">
        Add New User
        <a class="btn btn-success btn-xs pull-right" href='{{ url("user") }}'>
            back to list <i class="fa fa-list"></i>
        </a>
    </header>
    <div class="panel-body">
<form action="{{url('user/add')}}" method="post">

    <div class="entry">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

        <div class="form-group">
            <div class="col-md-6"> First Name <br> <input type="text"  name= "firstname" class="form-control"/> </div>
            <div class="col-md-6">Middle Name <br> <input type="text"  name= "middlename" class="form-control"/></div>

        </div>
        <div class="form-group">

            <div class="col-md-6">Last Name <br> <input type="text"  name= "lastname" class="form-control"/> </div>
            <div class="col-md-6">User Name <br> <input type="text"  name= "username" class="form-control"/></div>

        </div>

        <div class="form-group">
            <div class="col-md-6">Password <br> <input type="password"  name= "password" class="form-control"/> </div>
            <div class="col-md-6">Confirm Password <br> <input type="password"  id="password_confirm" name= "password_confirm" class="form-control"/> </div>

        </div>
        <div class="form-group">
            <div class="col-md-6">Email<br><input type="text"  name= "email" class="form-control"/></div>
            <div class="col-md-6">Phone Number<br> <input type="text"  name= "phonenumber" class="form-control"/></div>

        </div>
        <div class="form-group">
            <div class="col-md-6">Stakeholder<br>{{ Form::select('stakeholder',Stakeholder::orderBy('id','ASC')->get()->lists('name','id'),'',array('class'=>'form-control','required'=>'required')) }}</div>
            <div class="col-md-6">Stakeholder Branch<br>{{ Form::select('stakeholderBranch',array('0'=>'No Branch')+StakeHolderBranch::orderBy('id','ASC')->get()->lists('name','id'),'',array('class'=>'form-control','required'=>'required')) }}</div>
        </div><hr><br>
        <div class="form-group">
            <div class="col-md-6">Role<br>{{ Form::select('role',array("admin"=>"admin","report"=>"report","data"=>"data"),'',array('class'=>'form-control','required'=>'required')) }}</div>
            <div class="col-md-6"><br></div>
        </div>
        <hr>
        <div class="sep" style="height: 10px"></div>
        <div class="form-group text-center" style="margin-top: 10px;" >
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
               <a class="btn btn-danger" href="{{ url('user') }}"> Cancel</a>
        </div>
    </div>
    </div>
    </div>
    <div class="clear"></div>
</form>
    </section>

@stop