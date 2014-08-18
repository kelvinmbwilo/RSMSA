@extends('layout.master')

@section('contents')
<link href="{{ asset('css/tooltipster.css') }}" rel="stylesheet" />
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

        </header>
        <div class="panel-body">
            <div class="adv-table dynamic-table ">
                <div class="clearfix" >
                    <div class="btn-group pull-right" >
                        <a id="editable-sample_new" class="btn btn-success" href="{{ url("table_name/add_column/{$table->id}")}}">
                            Add NewColumn <i class="fa fa-plus"></i>
                        </a>
                    </div>

                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="dynamic-table">
                    <thead>
                    <tr>
                        <th>#no</th>
                        <th>Column name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($table->column as $coll)
                    <tr>
                        <td>  </td>
                        <td>{{$coll->columnName}}</td>
<!--                        <td> @foreach($coll->options as $op)-->
<!--                            {{$op->optionName  }}-->
<!--                            @endforeach-->
<!--                        </td>-->
                        <td class="btn-group">
                            <a class="btn btn-success btn-xs"  href="{{ url("table_name/editColumn/{$coll->id}")}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-success btn-xs"  href="{{ url("table_name/add_optionColumn/{$coll->id}")}}"><i class="fa fa-plus"> addOption</i></a>
                            <a class="btn btn-danger btn-xs"  href="{{ url("table_name/deleteColumn/{$coll->id}")}}"><i class="fa fa-trash-o"></i></a>
                            <a class="viewColumn btn btn-warning btn-xs"  id="{{$coll->id}}">viewOptions<i class="fa fa-arrow-right"></i></a>
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
<script src="{{ asset('js/jquery.tooltipster.js') }}"></script>
<script>
    jQuery(document).ready(function() {


        $('.viewColumn').tooltipster({
            content: 'Loading...',
            contentAsHTML:true,
            thead:'tooltipster-shadow.css',
            position:'right',
            functionBefore: function(origin, continueTooltip) {

                // we'll make this function asynchronous and allow the tooltip to go ahead and show the loading notification while fetching our data
                continueTooltip();

                // next, we want to check if our data has already been cached
                if (origin.data('ajax') !== 'cached') {
                    $.ajax({
                        type: 'GET',
                        url: '{{url('table_name/viewColumnOptions/3')}}',
                        success: function(data) {
                        // update our tooltip content with our returned data and cache it
                        origin.tooltipster('content', data).data('ajax', 'cached');
                    }
                });
            }
        }
    });
    });
</script>

@stop