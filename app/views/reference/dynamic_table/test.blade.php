@extends('layout.master')
@section('contents')
<section class="panel">
    <div class="panel-body">
        <form class="form" action='' method="post">
            @foreach($mycol as $ReferenceDetails)
            <?php
            $datatype = $reference->datatype->name;
            if($datatype == 'String'){
                ?>
                <div class="form-group">
                    <label >{{ $reference->name }}</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter {{ $reference->name }}">
                </div>
            <?php
            }else{
                ?>
                <div class="form-group">
                    <label >{{ $reference->Referencename }}</label>
                    <input type="number" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
            <?php } ?>
            @endforeach

            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </form>

    </div>
</section>

@stop