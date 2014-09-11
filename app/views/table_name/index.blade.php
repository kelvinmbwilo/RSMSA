@extends('layout.master')

@section('contents')
<link href="{{ asset('css/tooltipster.css') }}" rel="stylesheet" />
@if(isset($name))
<h3 class="text-success"> {{ $name }}</h3>
@endif

    <section class="panel panel-success">
        <header class="panel-heading">
        List of table name
        <a class="btn btn-success btn-xs pull-right" href="{{url('table_name/add')}}">
                    New table <i class="fa fa-plus"></i>
                </a>

        </header>
        <div class="panel-body">



                <table class="table table-striped table-hover table-bordered" id="dynamic-table">
                    <thead>
                    <tr>
                        <th>#no</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach(TableName::all() as $tbName)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $tbName->categoryName }}</td>
                        <td >
                            <div class="btn-group">
                            <a class="btn btn-info btn-xs"  href="{{ url("table_name/edit/{$tbName->id}")}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-xs" href="{{ url("table_name/delete/{$tbName->id}")}}"> <i class="fa fa-trash-o"></i></a>
                            <a class=" btn btn-warning btn-xs"  href="{{ url("table_name/view_column/{$tbName->id}")}}">viewColumn<i class="fa fa-plus"></i></a>
                            </div>

                        </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>

        </div>
    </section>


<!--main content end-->
<!--script for this page only-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>



@stop