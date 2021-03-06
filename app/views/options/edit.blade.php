@extends('layout.master')

@section('contents')
<section class="panel panel-success">
    <header class="panel-heading">
        Update {{ $opt->name }} Information
        <a class="btn btn-success btn-xs pull-right" href='{{ url("option") }}'>
            back to list <i class="fa fa-list"></i>
        </a>

    </header>
    <div class="panel-body">
<div class="col-sm-12">
    @if(isset($msg))
    <div class="alert alert-success fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
        <strong>SUCCESS!</strong> Field {{ $opt->name }} Updated Successful.
    </div>
    @endif
<!--    <h3>Update Location Level Information<a href="{{ url('location/levels') }}" class="btn btn-xs btn-info pull-right">Back to List</a></h3>-->
    <form class="form-horizontal" id="default" method="post" action='{{ url("option/edit/{$opt->id}") }}'>
        <div class="form-group">
            <label class="col-md-2 control-label" id="DataCat">Field Name</label>
            <div class="col-md-6">
                <input type="text" value="{{ $opt->name }}" class="form-control" placeholder="Option Name" name="option_name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" id="DataCat">Data Type</label>
            <div class="col-md-6">
                {{ Form::select('data_type',DataTypeDetails::orderBy('id','ASC')->get()->lists('name','id'),$opt->datatypeId,array('class'=>'form-control','required'=>'requiered')) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" id="DataCat"> Category Field</label>
            <div class="col-md-6">
                <?php
                $arr = array("0");
                if(count($opt->categoryOptions()->lists('categoryId')) != 0){
                    $arr = $opt->categoryOptions()->lists('categoryId');
                }
                ?>
                {{ Form::select('category_option[]',array('0'=>'No Option')+Categories::orderBy('id','ASC')->get()->lists('name','id'),$arr,array('class'=>'form-control',"id"=>"my-select",'required'=>'requiered', 'multiple'=>'multiple')) }}
            </div>
            <script>
                $(document).ready(function(){
                    $('#my-select').multiSelect();
                })
            </script>
        </div>
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