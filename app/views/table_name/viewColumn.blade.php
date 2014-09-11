@extends('layout.master')

@section('contents')
<link href="{{ asset('css/tooltipster.css') }}" rel="stylesheet" />

     <section class="panel panel-success">
        <header class="panel-heading">
            Viewing {{$table->categoryName}} column's
            <a class="btn btn-key pull-right btn-xs"  href="{{ url("table_name/back")}}" >Back to list <i class="fa fa-list"></i>
            </a>
            <a  class="btn btn-success btn-xs pull-right" href="{{ url("table_name/add_column/{$table->id}")}}">
            New Column <i class="fa fa-plus"></i>
            </a>

        </header>
        <div class="panel-body">
            <div class="adv-table dynamic-table ">



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
                    <?php $i=1; ?>
                    @foreach($table->column as $coll)
                    <tr>
                        <td>{{ $i++ }}  </td>
                        <td>{{$coll->columnName}}</td>
<!--                        <td> @foreach($coll->options as $op)-->
<!--                            {{$op->optionName  }}-->
<!--                            @endforeach-->
<!--                        </td>-->
                        <td >
                            <div class="btn-group">
                            <a class="btn btn-info btn-xs"  href="{{ url("table_name/editColumn/{$coll->id}")}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-danger btn-xs"  href="{{ url("table_name/deleteColumn/{$coll->id}")}}"><i class="fa fa-trash-o"></i></a>
                            <a class="btn btn-success btn-xs"  href="{{ url("table_name/add_optionColumn/{$coll->id}")}}"><i class="fa fa-plus"> addOption</i></a>
                             <a class="viewColumn btn btn-warning btn-xs"  id="{{$coll->id}}">viewOptions<i class="fa fa-arrow-right"></i></a>
                            </div>
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
                        url: '{{url('table_name/viewColumnOptions')}}/'+$(this).attr("id"),
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