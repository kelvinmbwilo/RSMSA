<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 11:05 AM
 */ ?>

@extends('layout.master')
@section('contents')
@include('stakeholder.delete')
<!--main content start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-success">
                <header class="panel-heading">
                    Stakeholders
                    <button data-toggle="modal" data-target="#myModal" class="btn btn-success btn-xs pull-right" }}>
                    New Stakeholder <i class="fa fa-plus"></i>
                    </button>

                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table id="dynamic-table" class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Stakeholder Name</th>
                                <th class="numeric">Created</th>
                                <th class="numeric">Updated</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1; ?>
                            @foreach($stakeholder as $stakeHolder)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$stakeHolder->name}}</td>
                                <td class="numeric">{{$stakeHolder->created_at}}</td>
                                <td class="numeric">{{$stakeHolder->updated_at}}</td>
                                <td>

                                    <div class="btn-group" >
                                        <a class="btn btn-info btn-xs" href="{{ url("stakeholder/edit/{$stakeHolder->id}") }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form class="pull-right" action='{{ url("stakeholder/delete/{$stakeHolder->id}") }}' method="post">
                                            <button class="btn  btn-danger  btn-xs" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <a class="btn btn-warning btn-xs" href='{{ url("stakeholder/viewbranch/{$stakeHolder->id}") }}'>
                                        <i class="fa fa-level-down"></i>
                                        Branches
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>

    </div>

<div class="modal fade" id="myModal" style="padding-top: 10%" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                @include('stakeholder.addStakeholder')
            </div>
        </div>
    </div>
</div>

<!--script for this page-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>

<script>
    $(function(){
        $('.form').on('submit' , function(e){
            var that = $(this),
                url = that.attr('action'),
                type = that.attr('method'),
                data = {};

            that.find('[name]').each(function(index, value){
                var that = $(this),
                    name = that.attr('name'),
                    value = that.val();

                data[name] = value;

            });
            $.ajax({
                url:url,
                type:type,
                data:data,
                success:function(response){
                    if(response == 'success'){
                        $('#response').css({opacity:1});
                        $('#dynamic-table').load('stakeholder.stakeholders.blade.php');
                        window.location.reload();
                        //$('#response').delay(770).animate({opacity:0},1000);
                        //$('#update').load('update_assets.php');
                        //$('#edit_table').find('.newtr').remove();
                    }
                }
            });

        });
    });
</script>

@stop