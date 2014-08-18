@extends('layout.master')
@section('contents')
<section class="panel">
    <div class="panel-body">
        <form class="form" action='' method="post">
            @foreach($mycol as $ReferenceDetails)
            <?php
            $datatype = $ReferenceDetails->reference->referenceId;
            if($datatype == 'String'){
                ?>
                <div class="form-group">
                    <label >{{ $ReferenceDetails->ReferenceDetailsName }}</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter {{ $ReferenceDetails->ReferenceDetailsName }}">
                </div>
            <?php
            }else{
                ?>
                <div class="form-group">
                    <label >{{ $ReferenceDetails->ReferenceDetailsName }}</label>
                    <input type="number" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
            <?php } ?>
            @endforeach

            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </form>

    </div>
</section>

@stop