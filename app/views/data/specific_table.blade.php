<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 11:05 AM
 */ ?>
@extends('layout.master')
@section('contents')

<header class="panel-heading">
    <a class="btn btn-success pull-right" href={{ url('data/add') }}>
    <i class="fa fa-adn">
        New
    </i>
    </a>
</header>

<section class="wrapper">
    <?php
    $id = $table->id;
    $count = 0;
    $columns = $table->column;
    $data = $table->data;
    $data->toarray();
    ?>
    <div class="row">
        <!-- Data Table Start -->
        <div class="col-lg-12">
            <header class="panel-heading">
                {{ $table->categoryName }} Data
            </header>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed " id="dynamic-table">
                    <?php
                    $count = 0;
                    foreach ($columns as $colm) {
                    $count++;
                    }
                    ?>
                    <thead>
                    <tr>
                        <th>code</th>
                        @foreach($columns as $col)
                        <th>{{ $col->columnName }}</th>
                        @endforeach
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                           <td>AAC</td>
                        <?php foreach($columns as $col){
                            $temp = $col->id;
                                 foreach($data as $dat){
                                     if($dat->column->id == $temp){ ?>
                                               <td>{{ $dat->value }}</td>
                                      <?php }
                                 }
                        }  ?>
                           <td><a href="#">Report</a></td>
                    </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</section>


@stop