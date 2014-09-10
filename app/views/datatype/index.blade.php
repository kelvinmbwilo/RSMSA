@extends('layout.master')

@section('contents')
<link href="{{ asset('css/tooltipster.css') }}" rel="stylesheet" />
@if(isset($name))
<h3 class="text-success"> {{ $name }}</h3>
@endif

<section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
        <header class="panel-heading">
            Data types
        </header>
        <div class="panel-body">
            @if ($alert = Session::get('alert-success'))
            <div class="alert alert-success">
                {{ $alert }}
            </div>
            @endif
            <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <a id="editable-sample_new" class="btn btn-success" href="{{url('datatype/add')}}">
                            Add New <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="editable_table.html#">Print</a></li>
                            <li><a href="editable_table.html#">Save as PDF</a></li>
                            <li><a href="editable_table.html#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Last Update</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(DataTypeDetails::all() as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->updated_at }}</td>
                        <td><a href="{{ url('datatype/edit')}}/{{$type->id}}" class="btn btn-primary" title="edit">
                                <i class="fa fa-edit"></i>
                            </a></td>
<!--                        <td><a class="delete" href="{{ url("datatype/delete/{$type->id}")}}">Delete</a></td>-->
                        <td><a data-toggle="modal" class="open-DeleteDialog btn btn-danger" data-id="{{$type->id}}" href="#deleteDialog" title="delete">
                                <i class="fa fa-trash-o"></i>
                            </a></td>

                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- page end-->
</section>



<!-- Delete modal -->

<div class="modal fade bs-example-modal-sm" id="deleteDialog" role="dialog" aria-hidden="true" style="padding-top: 20%" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-body">


            <?php
            $datatype_id = 'datatypeId';
            ?>
            @include('datatype.delete')

        </div>
    </div>
</div>


<script>
    $(document).on("click", ".open-DeleteDialog", function(){
        var myId = $(this).data('id');
        $(".modal-body #DeleteButton").attr("href","{{url('datatype/delete')}}/"+myId);
    });
</script>



<!--main content end-->
<!--script for this page only-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>
<script src="{{ asset('js/jquery.tooltipster.js') }}"></script>




@stop