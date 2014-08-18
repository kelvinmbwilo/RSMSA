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
            References
        </header>
        <div class="panel-body">
            <div class="adv-table editable-table ">
                <div class="clearfix">
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
                        <th>#no</th>
                        <th>Name</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(ReferenceDetails::all() as $ref)
                    <tr>
                        <td>{{ $ref->id }}</td>
                        <td>{{ $ref->name }}</td>
                        <td><a class="fa icon-file" href="{{url('dynamic_tablel/referenceform')}}">View form</a></td>
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
            position:'left',
            functionBefore: function(origin, continueTooltip) {

                // we'll make this function asynchronous and allow the tooltip to go ahead and show the loading notification while fetching our data
                continueTooltip();

                // next, we want to check if our data has already been cached
                if (origin.data('ajax') !== 'cached') {
                    $.ajax({
                        type: 'GET',
                        url: '{{url('reference/viewColumn/13')}}',
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