@extends('layout.master')

@section('contents')

<section class="panel panel-success" >
    <header class="panel-heading ">
        Add Database Credentials
    </header>
    <div class="panel-body">
        <form action="{{url('refDatabaseCredentials')}}" method="post">

            <div class="entry">
                    <div class="form-group">
                    <div class="col-md-6">Database Type<br>{{ Form::select('type',array("mysql"=>"mysql","sqlite"=>"sqlite","pgsql"=>"pgsql","sqlsrv"=>"sqlsrv","redis"=>"redis"),'',array('class'=>'form-control','required'=>'required')) }}</div>
                    <div class="col-md-6">Database Name<br> <input type="text"  name= "name" class="form-control"/></div>

                </div>
                <div class="form-group">

                    <div class="col-md-6">Host <br> <input type="text"  name= "host" class="form-control"/> </div>
                    <div class="col-md-6">Username <br> <input type="text"  name= "username" class="form-control"/></div>

                </div>

                <div class="form-group">
                    <div class="col-md-6">Password <br> <input type="password"  name= "password" class="form-control"/> </div>
                    <div class="col-md-6">Charset<br> <input type="text" name="charset" class="form-control"/> </div>

                </div>
                <div class="form-group">
                    <div class="col-md-6">Prefix<br><input type="text"  name= "prefix" class="form-control"/></div>
                   <div class="col-md-6">Schema<br><input type="text"  name= "schema" class="form-control"/></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">Port<br><input type="text"  name= "port" class="form-control"/></div>
                    <div class="col-md-6"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">Reference Name<select name="referenceName" class="form-control col-md-5">
                       <?php $referenceDetails=Reference::all(); ?>
                        @foreach($referenceDetails as $ref )
                        <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                        @endforeach
                    </select></div>
                    <div class="col-md-6"><br></div>
                </div>
<!---->
<!--                <div class="sep" style="height: 5px"></div>-->
                <div class="form-group text-center" style="margin-top: 10px;" >
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    <button type="submit" name="cancel" class="btn btn-dander">Cancel</button>
<!--                    <a class="btn btn-danger" href=""> Cancel</a>-->
                </div>
            </div>
    </div>

    </form>

</section>

@stop