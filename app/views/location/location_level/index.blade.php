@extends('layout.master')

@section('contents')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Location Levels
                    <a class="btn btn-success pull-right" href="{{ url('location/levels/add') }}">
                    New Location Level
                    </a>
                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $j = 0 ?>
                            @foreach($levels as $level)
                            <tr>
                                <td>{{ ++$j }}</td>
                                <td>{{$level->name}}</td>
                                <td>@if($level->parentId != 0){{LocationLevel::find($level->parentId)->name }}
                                    @else
                                    Top Level
                                    @endif
                                </td>
                                <td class="table-condensed col-xs-pull-2" id="{{ $level->id }}">
                                    <div class="btn-group" >
                                        <a class="btn btn-info" href='{{ url("location/level/{$level->id}/units") }}'>
                                            <i class="fa fa-level-down"></i>
                                            Units
                                        </a>
                                        <a class="btn btn-primary" title="edit location level" href='{{ url("location/levels/edit/{$level->id}") }}'>
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger deletelevel" title="delete location level" href='#delete'>
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
                            $.post("<?php echo url('location/levels/delete') ?>/"+id1,function(data){
                                btn.hide("slow").next("hr").hide("slow");
                            });
                        });
                    });//endof deleting category
                })
            </script>
        </div>

    </div>
    <!-- page end-->
</section>
<!--script for this page-->
@stop