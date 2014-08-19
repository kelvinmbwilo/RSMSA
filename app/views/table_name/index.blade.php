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

            <div class="btn-group ">
                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right ">
                    <li><a href="editable_table.html#">Print</a></li>
                    <li><a href="editable_table.html#">Save as PDF</a></li>
                    <li><a href="editable_table.html#">Export to Excel</a></li>
                </ul>
            </div>
            <h4 > Table Name </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">
                <div class="clearfix" >
                    <div class="btn-group pull-right" >
                        <a id="editable-sample_new" class="btn btn-success" href="{{url('table_name/add')}}">
                            Add New <i class="fa fa-plus"></i>
                        </a>
                    </div>

                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="dynamic-table">
                    <thead>
                    <tr>
                        <th>#no</th>
                        <th>Name</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(TableName::all() as $tbName)
                    <tr>
                        <td>{{ $tbName->id }}</td>
                        <td>{{ $tbName->categoryName }}</td>
                        <td>{{ $tbName->updated_at }}</td>
                        <td class="btn-group">
                            <a class="btn btn-success btn-xs"  href="{{ url("table_name/edit/{$tbName->id}")}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-xs" href="{{ url("table_name/delete/{$tbName->id}")}}"> <i class="fa fa-trash-o"></i></a>
                            <a class=" btn btn-info btn-xs"  href="{{ url("table_name/view_column/{$tbName->id}")}}">viewColumn<i class="fa fa-plus"></i></a>

                        </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- page end-->
</section>

<!--main content end-->
<!--script for this page only-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>



@stop