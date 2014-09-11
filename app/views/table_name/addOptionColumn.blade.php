@extends('layout.master')

@section('contents')



<section class="panel panel-success">
    <header class="panel-heading">
        Add New Option to column {{$column->columnName}}

    </header>
    <div class="panel-body">
        <form class="form_default" method="post" action="{{ url("table_name/add_optionColumn/{$column->id}")}}" >
           <div>


           </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Option Name </label>
                <input type="text" class="form-control" id="Sumatra" placeholder="Enter name" name="option1">
            </div>

            <button type="submit" class="btn btn-primary">submit</button>
        </form>

    </div>
</section>


@stop