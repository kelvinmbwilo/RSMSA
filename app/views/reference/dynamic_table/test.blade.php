@extends('layout.master')
@section('contents')
<section class="panel">
    <div class="panel-body">

        <form action="{{ url('dynamic_table/test')}}/{{$reference->id}}" method="post">
            @foreach($mycol as $referencedetails)
            <?php
            $datatype = $referencedetails->dataType->name;
            if($datatype == 'string'){
                ?>
                <div class="form-group">
                    <label >{{ $referencedetails->name }}</label>
                    <input type="text" class="form-control" name="name{{$referencedetails->id}}" placeholder="Enter name">
                </div>
            <?php
            }else{
                ?>
                <div class="form-group">
                    <label >{{ $referencedetails->name }}</label>
                    <input type="number" class="form-control" name="name{{$referencedetails->id}}" placeholder="Enter number">
                </div>
            <?php } ?>
            @endforeach

            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </form>

    </div>
</section>

@stop