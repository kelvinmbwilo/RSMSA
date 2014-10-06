@extends('layout.master')

@section('contents')
<section class="panel panel-success">
    <header class="panel-heading">
        Update Section {{ $mapping->data->name }} mapping
        <a class="btn btn-success btn-xs pull-right" href='{{ url("mapping") }}'>
            back to list <i class="fa fa-list"></i>
        </a>

    </header>
    <div class="panel-body">
<div class="col-sm-12">
    @if(isset($msg))
    <div class="alert alert-success fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
        <strong>SUCCESS!</strong> Section  mapping of{{ $mapping->data->name }} Updated Successful.
    </div>
    @endif
<!--    <h3>Update Location Level Information<a href="{{ url('location/levels') }}" class="btn btn-xs btn-info pull-right">Back to List</a></h3>-->
    <form class="form-horizontal" id="default" method="post" action='{{ url("mapping/edit/{$mapping->id}") }}'>

        <?php $i=1; $j=1; ?>

        <div class="form-group>
                            <label class="col-sm-2 control-label" id="DataCat">{{ $mapping->options->name }}</label>


        <input type="hidden" class="form-control" value="{{$mapping->options->id}}" name="option_name">
        <input type="hidden" class="form-control" value="{{$mapping->data->id}}" name="data_name">
        <select name="reference_name" class="form-control">
            <option value="{{$mapping->referenceData->id}}" id="option">{{$mapping->referenceData->name}}</option>
            @foreach($referenceDetails as $ref)
            <option value="{{$ref->id}}" id="option">{{$ref->name}}</option>
            @endforeach
        </select>


        <div class="form-group">
            <div class="col-md-6 text-center">
                <input type="submit" value="Update" class="btn btn-info">
            </div>
        </div>
    </form>

</div>
    </div>
</section>
@stop