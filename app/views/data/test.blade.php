<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 11:05 AM
 */
?>

@extends('layout.master')
@section('contents')
<section class="panel">
<div class="panel-body">
    <?php
    $val = 1;
    $col_count = 0;
    foreach($mycol as $cols){
        $col_count++;
    }
    ?>
    <form id="myform" class="form" action='{{ url("data/add/{$col_count}") }}' method="post">

                <input type="hidden" class="form-control" name="table" value="{{ $table->id }}">

        @foreach($mycol as $columns)

                <input type="hidden" class="form-control" name="{{ $val.'_column' }}" value="{{ $columns->id }}">

        <?php
                $datatype = $columns->datatype->name;
                if($datatype == 'string'){
         ?>

                <div class="form-group">
                    <label >{{ $columns->columnName }}</label>
                    <input type="text" class="form-control" name="{{ $val.'_value' }}" placeholder="Enter {{ $columns->columnName }}">
                </div>

        <?php
                $val++;
        }else{
        ?>
        <div class="form-group">
            <label >{{ $columns->columnName }}</label>
            <input type="number" class="form-control" name="{{ $val.'_value' }}" id="name" placeholder="Enter name">
        </div>
        <?php
            $val++;
            } ?>
        @endforeach

        <button type="submit" class="btn btn-info pull-right">Submit</button>
    </form>

</div>
</section>
<script>
    var i = 1;
         /*=================
    Creating Text Box in the Form Fields.
          =================*/
    function textBoxCreate(){
        var y = document.createElement("INPUT");
        y.setAttribute("type", "text");
        y.setAttribute("name", "value_"+i)
        y.setAttribute("Placeholder", "$columns->columnName");
        y.setAttribute("Name", "Name_" + i);
        document.getElementById("myform").appendChild(y);
        i++;
    }
</script>
@stop