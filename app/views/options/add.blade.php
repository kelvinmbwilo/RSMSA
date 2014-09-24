@extends('layout.master')

@section('contents')
<section class="panel panel-success">
    <header class="panel-heading">
        Add New Option
        <a class="btn btn-success btn-xs pull-right" href='{{ url("option") }}'>
            back to list <i class="fa fa-list"></i>
        </a>

    </header>
    <div class="panel-body">
   <div class="col-sm-12">
       @if(isset($msg))
       <div class="alert alert-success fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
           <strong>SUCCESS!</strong>Option {{ $opt->name }} Added Successful.
       </div>
       @endif
<!--       <h3><a href="{{ url('location/levels') }}" class="btn btn-xs btn-info pull-right">Back to List</a></h3>-->
       <form class="form-horizontal" id="default" method="post" action="{{ url('option/add') }}">
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat">option Name</label>
               <div class="col-md-6">
                   <input type="text" class="form-control" placeholder="Option Name" name="option_name">
               </div>
           </div>
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat">Data Type</label>
               <div class="col-md-6">
                   {{ Form::select('data_type',DataTypeDetails::orderBy('id','ASC')->get()->lists('name','id'),'',array('class'=>'form-control','required'=>'requiered')) }}
               </div>
           </div>
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat"> Category option(s)</label>
               <div class="col-md-6">
                   {{ Form::select('category_option[]',array('0'=>'No Option')+Categories::orderBy('id','ASC')->get()->lists('name','id'),array('0'),array('url'=>'posts',"id"=>"my-select",'class'=>'form-control','required'=>'requiered', 'multiple'=>'multiple')) }}
               <script>
                   $(document).ready(function(){
                       $('#my-select').multiSelect();
                   })
               </script>
               </div>
           </div>
           <div class="form-group">
               <div class="col-md-6 text-center">
                   <input type="submit" value="Add" class="btn btn-info">
               </div>
           </div>
       </form>

   </div>
        </div>
    </section>
@stop