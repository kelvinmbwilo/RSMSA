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
                @if(isset($msg))
                <div class="alert alert-success fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                    <strong>{{ $msg }}</strong>
                </div>
                @endif
            </header>
            <section id="unseen">

                <table class="table table-bordered table-striped table-condensed " id="dynamic-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        @foreach($form_head as $formData)
                        @if($formData->dataForm)

                          @foreach($formData->dataForm->options as $dataDetails)
                          <th>@if($dataDetails->data){{$dataDetails->data->name}}-{{$dataDetails->options->name}}@endif</th>

                          @endforeach
                        @endif
                        @endforeach

                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>
                    @if($dataTag)
                    @foreach($dataTag as $tag)
                    <tr>
                        <td>{{$i++}}</td>
                        @foreach($form_details as $col)
                        @if($col->datTag == $tag->datatagId)
                        <td>{{ $col->value }}</td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>

            </section>
        </div>
    </div>
</section>

<script src="{{ asset('js/dynamic_table_init.js') }}"></script>

@stop