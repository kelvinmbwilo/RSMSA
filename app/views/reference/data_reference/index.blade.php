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
                <h4 > References </h4>
            </header>
            <div class="panel-body">

                    <div class="clearfix" >
                        <div class="btn-group pull-right" >
                            <a id="editable-sample_new" class="btn btn-success" href="{{url('reference/add')}}">
                                Add New <i class="fa fa-plus"></i>
                            </a>
                        </div>

                    </div>

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
                        @foreach(Reference::all() as $ref)
                        <tr>
                            <td>{{ $ref->id }}</td>
                            <td>{{ $ref->name }}</td>
                            <td>{{ $ref->updated_at }}</td>
                            <td class="btn-group">
                                <a class="btn btn-success btn-sm"  href="{{ url("reference/edit/{$ref->id}")}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" href="{{ url("reference/delete/{$ref->id}")}}"> <i class="fa fa-trash-o"></i></a>
                                <a class="viewColumn btn btn-warning btn-sm" id="{{$ref->id}}"><i class="fa fa-arrow-left"></i>ViewColumn</a>
                            </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>

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
            position:'left',
            functionBefore: function(origin, continueTooltip) {

                // we'll make this function asynchronous and allow the tooltip to go ahead and show the loading notification while fetching our data
                continueTooltip();

                // next, we want to check if our data has already been cached
                if (origin.data('ajax') !== 'cached') {
                    $.ajax({
                        type: 'GET',
                        url: '{{url('reference/viewColumn')}}/'+$(this).attr("id"),
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