@extends('layout.master')

@section('contents')


<fieldset><legend>Edit data type</legend>
    <form action="{{ url('datatype/edit')}}/{{$type->id}}" method="post">
        @if ($alert = Session::get('alert-success'))
        <div class="alert alert-success">
            {{ $alert }}
        </div>
        @endif
        <div class="entry">
            <div class="row">
                <div class="col-lg-2"><p>Name</p></div>
                <div class="col-lg-2"> <input type="text"  name= "name" class="form-control" value="{{$type->name}}"/> </div>

            </div>

            <hr>
            <div class="sep"></div>

            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
            <a class="btn btn-danger" href="{{ url('datatype') }}"> Cancel</a>
        </div>
        </div>
        </div>
        <div class="clear"></div>
    </form>
</fieldset>
@stop