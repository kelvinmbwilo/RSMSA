<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 11:05 AM
 */ ?>
@extends('layout.master')
@section('contents')



<section class="wrapper">

    <div class="row">

        <div class="col-lg-12">
            <header class="panel-heading ">
               {{ $form_name->name }} Form
            </header>
            <section id="unseen">

                <table class="table table-bordered table-striped table-condensed " id="dynamic-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        @foreach($form_head as $col)
                        <th>@if($col->data){{ $col->data->name}}_{{$col->option->name  }}@endif</th>
                        @endforeach

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                    @foreach($dataTag as $tag)
                    <tr>
                        <th>{{$i++}}</th>
                        @foreach($form_details as $col)
                        @if($col->datTag == $tag->datatagId)
                        <th>{{ $col->value  }}</th>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </section>
        </div>
    </div>
</section>

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>

@stop