@extends('layout.master')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-success">
                <header class="panel-heading">
                  Lists of Excel
                    <a class="btn btn-success pull-right btn-xs" href="{{ url('excel/add') }}">
                    New Excel<i class="fa fa-plus"></i>
                    </a>
                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table id="dynamic-table"  class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Stakeholder</th>
                                <th>Mapped Form</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $j = 0; ?>
                            @foreach($excel as $exc)
                            <tr>
                                @if($excel)

                                <td>{{ ++$j }}</td>
                                <td>{{ $exc->filename }}</td>
                                <td>{{ $exc->stakeholder->name}}</td>
                                <td>{{ $exc->form->name}}</td>
                                <td class="table-condensed col-xs-pull-2" id="">

                                    <div class="btn-group btn-group-xs" >
                                        <a class="btn btn-primary" title="edit option" href='{{ url("") }}'>
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger deletelevel" title="delete option" href='#delete'>
                                        <i class="fa fa-trash-o"></i>
                                        </a>

                                    </div>
                                </td>

                                @endif
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
                            $.post("<?php echo url('excel/delete') ?>/"+id1,function(data){
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