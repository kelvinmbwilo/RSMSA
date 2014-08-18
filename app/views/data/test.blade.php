@extends('layout.master')
@section('contents')
<section class="panel">
<div class="panel-body">
    <form class="form" action='' method="post">
        @foreach($mycol as $columns)
        <?php
        $datatype = $columns->datatype->name;
            if($datatype == 'String'){
         ?>
            <div class="form-group">
                <label >{{ $columns->columnName }}</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter {{ $columns->columnName }}">
            </div>
        <?php
        }else{
        ?>
        <div class="form-group">
            <label >{{ $columns->columnName }}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
        </div>
        <?php } ?>
        @endforeach

        <button type="submit" class="btn btn-info pull-right">Submit</button>
    </form>

</div>
</section>

@stop