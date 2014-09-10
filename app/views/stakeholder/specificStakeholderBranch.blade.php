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
                    {{ $stakeholder->name }} Branches
                    <a class="btn btn-warning btn-xs pull-right" href='{{ url("stakeholder") }}'>
                        back to list <i class="fa fa-list"></i>
                    </a>
                    <a class="btn btn-success btn-xs pull-right" href='{{ url("stakeholderBranch/add/{$stakeholder->id}") }}'>
                        New Branch <i class="fa fa-plus"></i>
                    </a>


                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table id="dynamic-table" class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch Name</th>
                                <th>Location</th>
                                <th class="numeric">Phone Number</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 ?>
                            @foreach($stakeholder->branches as $stakeHolderBranch)
                            @if(!is_null($stakeHolderBranch))
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$stakeHolderBranch->name}}</td>
                                <td>@if($stakeHolderBranch->location){{$stakeHolderBranch->location->name}}@endif</td>
                                <td>{{$stakeHolderBranch->phoneNumber}}</td>
                                <td>{{$stakeHolderBranch->address}}</td>
                                <td>{{$stakeHolderBranch->email}}</td>
                                <td class="table-condensed col-xs-pull-2">
                                    <div class="btn-group" >
                                        <a  class="btn btn-info btn-xs"  href="{{ url("stakeholderBranch/edit/{$stakeHolderBranch->id}") }}">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <form class="form pull-right" action='{{ url("stakeholderBranch/delete/{$stakeHolderBranch->id}") }}' method="post">
                                            <button class="btn  btn-danger btn-xs" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="Are you sure you want to delete this user ?">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach

                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>

    </div>
    <!-- page end-->
<script src="{{ asset('js/dynamic_table_init.js') }}"></script>
<script src="{{ asset('js/jquery.stepy.js') }}"></script>
@stop