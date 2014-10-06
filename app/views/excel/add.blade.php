@extends('layout.master')

@section('contents')
<section class="panel panel-success">
    <header class="panel-heading">
        Add New Excel File
        <a class="btn btn-success btn-xs pull-right" href='{{ url("excel") }}'>
            back to list <i class="fa fa-list"></i>
        </a>

    </header>
    <div class="panel-body">
   <div class="col-sm-12">
       @if(isset($msg))
       <div class="alert alert-success fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
           <strong>SUCCESS!</strong>Excel {{ $excel->filename }} Uploaded Successful.
       </div>
       @endif
           <form class="form-horizontal" id="default" action="{{ url('excel/add') }}" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label class="col-md-3 control-label">Select excel file to upload:</label>
                   <div class="col-md-6">
                  <input type="file" name="file" id="file"><br>
                   </div>
                </div>
                <div class="form-group">
                   <label class="col-md-2 control-label" id="DataCat">Form Name</label>
                    <div class="col-md-6">
                       {{ Form::select('form_name',array('0'=>'select a form')+Formm::orderBy('id','ASC')->get()->lists('name','id'),'',array('url'=>'posts',"id"=>"my-select",'class'=>'form-control','required'=>'requiered')) }}
                   </div>
              </div>
               <div class="form-group">
                   <label class="col-md-2 control-label" id="DataCat">Reference Name</label>
                   <div class="col-md-6">
                       {{ Form::select('reference_name',array('0'=>'select a reference')+Reference::orderBy('id','ASC')->get()->lists('name','id'),'',array('url'=>'posts',"id"=>"my-select",'class'=>'form-control','required'=>'requiered')) }}
                   </div>
               </div>
                  <div class="form-group">
                   <label class="col-md-2 control-label" id="DataCat"> Stakeholder</label>
                   <div class="col-md-6">
                       {{ Form::select('stakeholder',array('0'=>'select stakeholder Branch')+StakeHolderBranch::orderBy('id','ASC')->get()->lists('name','id'),'',array('url'=>'posts',"id"=>"my-select",'class'=>'form-control','required'=>'requiered')) }}

                   </div>
               </div>
               <div class="form-group">
                   <label class="col-md-2 control-label" id="DataCat"> Type: </label>
                   <div class="col-md-6">
                    <select name="type">
                    <option value="reference">Reference</option>
                    <option value="form">Form</option>
                    </select>
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