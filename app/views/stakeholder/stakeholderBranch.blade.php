<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 11:05 AM
 */ ?>

@extends('layout.master')

@section('contents')

    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-success">
                <header class="panel-heading">
                    Stakeholders Branches
                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table id="dynamic-table" class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch Name</th>
                                <th>Stakeholder</th>
                                <th>phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($stakeHolderBranch as $stakeHolderBranch)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$stakeHolderBranch->name}}</td>
                                <td>@if($stakeHolderBranch->stakeholder){{$stakeHolderBranch->stakeholder->name}}@endif</td>
                                <td>{{$stakeHolderBranch->phoneNumber}}</td>
                                <td>{{$stakeHolderBranch->email}}</td>
                                <td>{{$stakeHolderBranch->address}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>

    </div>

<!--script for this page-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>




@stop