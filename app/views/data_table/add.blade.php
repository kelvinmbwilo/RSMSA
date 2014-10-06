@extends('layout.master')

@section('contents')
<section class="panel panel-success">
    <header class="panel-heading">
        Add New Section
        <a class="btn btn-success btn-xs pull-right" href='{{ url("dataTable") }}'>
            back to list <i class="fa fa-list"></i>
        </a>

    </header>
  <div class="panel-body">
    <div class="col-sm-12">
       @if(isset($msg))
       <div class="alert alert-success fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
           <strong>SUCCESS!</strong> New Section {{ $data->name }} Added Successful.
           <br>
           <br>
         @if($data->hasReference =="true")
        {{ Redirect::to("reference_mapping/{$ref->id}"); }}


         @endif

       </div>
       @endif
       <form class="form-horizontal" id="default" method="post" action="{{ url('data_table/add') }}">
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat">Data Name</label>
               <div class="col-md-6">
                   <input type="text" class="form-control" placeholder="Data Name" name="data_name" required="required">
               </div>
           </div>
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat">Fields</label>
               <div class="col-md-6">
                   {{ Form::select('option[]',Options::orderBy('id','ASC')->get()->lists('name','id'),'',array('class'=>'my-select form-control','required'=>'requiered', 'multiple'=>'multiple')) }}
               </div>
           </div>
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat"> reference</label>
               <div class="col-md-6">
                   {{ Form::select('reference',array('0'=>'No reference')+Reference::orderBy('id','ASC')->get()->lists('name','id'),'',array('class'=>'form-control')) }}
               </div>
           </div>
           <div class="form-group">
               <label class="col-md-2 control-label" id="DataCat"> Key Column</label>
               <div class="col-md-6">
                   {{ Form::select('referenceKeyColumn',array('0'=>'No reference selected')+ReferenceDetails::orderBy('id','ASC')->get()->lists('name','id'),'',array('class'=>'form-control')) }}
               </div>
           </div>
           <script>
               $(document).ready(function(){
                   $('.my-select').multiSelect();
               })

           </script>
           <div class="form-group">
               <div class="col-md-6 text-center">
                   <input type="submit" value="Add" class="btn btn-info">
               </div>
           </div>
       </form>

     </div>
  </div>
    <script>
        $(document).ready(function(){
            $('select[name=reference]').change(function(){

                $.post('<?php echo url("dataTable/listReferenceDetails") ?>/'+$(this).val(),function(data){
                    $('select[name=referenceKeyColumn]').html(data)
                });
            })
        })
    </script>
 </section>
@stop