@extends('layout.master')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-success">
                <header class="panel-heading">
                   Sections
                    <a class="btn btn-success pull-right btn-xs" href="{{ url('data_table/add') }}">
                    New Section <i class="fa fa-plus"></i>
                    </a>
                </header>

                <div class="panel-body">
                    @if(isset($msg))
                    <div class="alert alert-success fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                        <strong>SUCCESS!</strong> Section  {{ $data->name }} Updated Successful.
                    </div>
                    @endif
                    <section ">
                        <table id="dynamic-table"  class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $j = 0 ?>
                            @foreach($data as $data)
                            <tr>
                                <td>{{ ++$j }}</td>
                                <td>{{$data->name}}</td>
                                <td class="table-condensed col-xs-pull-2" id="{{ $data->id }}">

                                    <div class="btn-group btn-group-xs" >
                                        <a class="btn btn-primary" title="edit data table" href='{{ url("data_table/edit/{$data->id}") }}'>
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger deletelevel" title="delete data table" href='#delete'>
                                        <i class="fa fa-trash-o"></i>
                                        </a>



                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
            <script>
                $(document).ready(function(){
                    $(".deletelevel").click(function(){
                        var id1 = $(this).parent().parent().attr('id');
                        $(".deletelevel").show("slow").parent().parent().parent().find("span").remove();
                        var btn = $(this).parent().parent().parent();
                        $(this).hide("slow").parent().parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                        $("#no").click(function(){
                            $(this).parent().parent().find(".deletelevel").show("slow");
                            $(this).parent().parent().find("span").remove();
                        });
                        $("#yes").click(function(){
                            $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                            $.post("<?php echo url('data_table/delete') ?>/"+id1,function(data){
                                btn.hide("slow").next("hr").hide("slow");
                            });
                        });
                    });//endof deleting category
                })
            </script>
        </div>

    </div>
    <!-- page end-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>
@stop