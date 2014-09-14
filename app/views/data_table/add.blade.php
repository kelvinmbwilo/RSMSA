@extends('layout.master')

@section('contents')
<section class="panel panel-success">
    <header class="panel-heading">
        Add New Data table
        <a class="btn btn-success btn-xs pull-right" href='{{ url("dataTable") }}'>
            back to list <i class="fa fa-list"></i>
        </a>

    </header>
    <div class="panel-body">
   <div class="col-sm-12">
       @if(isset($msg))
       <div class="alert alert-success fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
           <strong>SUCCESS!</strong> Data Table {{ $data->name }} Added Successful.
         @if($data->hasReference =="true")
           <a class="btn btn-success btn-xs " href='{{ url("reference_mapping/{$ref->id}") }}'>
               reference mapping <i class="fa fa-list"></i>
           </a>
         @endif

       </div>
       @endif
<!--       <h3><a href="{{ url('location/levels') }}" class="btn btn-xs btn-info pull-right">Back to List</a></h3>-->
       <form class="form-horizontal" id="default" method="post" action="{{ url('data_table/add') }}">
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat">Data Name</label>
               <div class="col-md-6">
                   <input type="text" class="form-control" placeholder="Data Name" name="data_name">
               </div>
           </div>
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat">Options</label>
               <div class="col-md-6">
                   {{ Form::select('parent_level',array('0'=>'No Options')+Options::orderBy('id','ASC')->get()->lists('name','id'),'',array('class'=>'form-control','required'=>'requiered', 'multiple'=>'multiple')) }}
               </div>
           </div>
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat"> reference</label>
               <div class="col-md-6">
                   {{ Form::select('reference',array('0'=>'No reference')+Reference::orderBy('id','ASC')->get()->lists('name','id'),'',array('class'=>'form-control','required'=>'requiered', 'multiple'=>'multiple')) }}
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