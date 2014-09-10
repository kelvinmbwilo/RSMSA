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

    <div class="row">
        <!-- Data Table Start -->
        <div class="col-lg-8">
            <header class="panel-heading">
                Road Offence Data
            </header>
            <section id="unseen">
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

                        <td>@if($dt->table){{$dt->table->categoryName}} @endif</td>
                        <td>@if($dt->value){{$dt->value}} @endif</td>
                        <td>@if($dt->location){{$dt->location->name}} @endif</td>
                        <td>@if($dt->StakeHolderBranch){{$dt->StakeHolderBranch->name}} @endif</td>
                        <td>@if($dt->created_at){{$dt->created_at}} @endif</td>
                        <td>@if($dt->updated_at){{$dt->updated_at}} @endif</td>
                        <td><a href="#">Edit</a></td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
        <!-- Datatable ends -->
        <div class="col-lg-4">
            <!--new earning start-->
            <div class="panel terques-chart">
                <div class="panel-body chart-texture">
                    <div class="chart">
                        <div class="heading">
                            <span>Friday</span>
                            <strong>$ 57,00 | 15%</strong>
                        </div>
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                    </div>
                </div>
                <div class="chart-tittle">
                    <span class="title">New Earning</span>
                              <span class="value">
                                  <a href="index.html#" class="active">Market</a>
                                  |
                                  <a href="index.html#">Referal</a>
                                  |
                                  <a href="index.html#">Online</a>
                              </span>
                </div>
            </div>
            <!--new earning end-->

            <!--total earning start-->
            <div class="panel green-chart">
                <div class="panel-body">
                    <div class="chart">
                        <div class="heading">
                            <span>June</span>
                            <strong>23 Days | 65%</strong>
                        </div>
                        <div id="barchart"></div>
                    </div>
                </div>
                <div class="chart-tittle">
                    <span class="title">Total Earning</span>
                    <span class="value">$, 76,54,678</span>
                </div>
            </div>
            <!--total earning end-->
        </div>
    </div>



    </section>

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>

@stop