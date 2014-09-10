<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 11:05 AM
 */ ?>

@extends('layout.master')

@section('contents')

<!--main content start-->
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                </header>

                <div class="panel-body">
                    <section id="unseen">
                        <table id="dynamic-table" class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Branch Name</th>
                                <th>Stakeholder</th>
                                <th class="numeric">Created</th>
                                <th class="numeric">Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stakeHolderBranch as $stakeHolderBranch)
                            <tr>
                                <td>AAC</td>
                                <td>{{$stakeHolderBranch->name}}</td>
                                <td>{{$stakeHolderBranch->stakeholder->name}}</td>
                                <td class="numeric">{{$stakeHolderBranch->created_at}}</td>
                                <td class="numeric">{{$stakeHolderBranch->updated_at}}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>

    </div>
    <!-- page end-->
</section>

<!--script for this page-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>




@stop