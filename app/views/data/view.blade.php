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
<header class="panel-heading">
    <a class="btn btn-success pull-right" href={{ url('data/add') }}>
    <i class="fa fa-adn">
        New
    </i>
    </a>
</header>
<section class="wrapper">

    <?php
       $data = Data::all();
       $data->toarray();
    ?>


        <!-- Data Table Start -->
        <div class="col-lg-8">
            <header class="panel-heading">
                System Data
            </header>
            <section>
                <table class="table table-bordered table-striped table-condensed " id="dynamic-table">
                    <thead>
                    <tr>
                        <th> </th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Location</th>
                        <th>Provider</th>
                        <th class="numeric">Updated</th>
                        <th class="numeric">Updated</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $dt)
                    @if(!is_null($dt))
                    <tr>
                        <td>AAC</td>
                        <td></td>
                        <td>{{$dt->value}}</td>
                        <td>{{$dt->locationId}}</td>
                        <td>{{$dt->StakeHolderBranch->name}}</td>
                        <td>{{$dt->created_at}}</td>
                        <td>{{$dt->updated_at}}</td>
                        <td><a href="#">Edit</a></td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </section>

<!--state overview start-->
<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol terques">
                <i class="fa fa-user"></i>
            </div>
            <div class="value">
                <h1 class="count">
                    0
                </h1>
                <p>New Users</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol red">
                <i class="fa fa-tags"></i>
            </div>
            <div class="value">
                <h1 class=" count2">
                    0
                </h1>
                <p>Sales</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol yellow">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="value">
                <h1 class=" count3">
                    0
                </h1>
                <p>New Order</p>
            </div>
        </section>
    </div>
    <div class="col-lg-3 col-sm-6">
        <section class="panel">
            <div class="symbol blue">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="value">
                <h1 class=" count4">
                    0
                </h1>
                <p>Total Profit</p>
            </div>
        </section>
    </div>
</div>
<!--state overview end-->

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>

@stop