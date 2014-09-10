@extends('layout.master')

@section('contents')
<link href="{{ asset('css/tooltipster.css') }}" rel="stylesheet" />
<!--@if(isset($name))-->
<!--<h3 class="text-success"> {{ $name }}</h3>-->
<!--@endif-->

        <!-- page start-->
        <section class="panel panel-success">
            <header class="panel-heading panel-success">
        List of References
          <a  class="btn btn-success btn-xs pull-right" href="{{url('reference/add')}}">
                    New Reference <i class="fa fa-plus"></i>
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
                        @foreach(Reference::all() as $ref)
                        <tr>
                            <td>{{ $ref->id }}</td>
                            <td>{{ $ref->name }}</td>

                            <td class="btn-group">
                                <a class="btn btn-info btn-xs"  href="{{ url("reference/edit/{$ref->id}")}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-xs" href="{{ url("reference/delete/{$ref->id}")}}"> <i class="fa fa-trash-o"></i></a>
                                <a class="viewColumn btn btn-warning btn-xs" id="{{$ref->id}}"><i class="fa fa-arrow-left"></i>ViewColumn</a>
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