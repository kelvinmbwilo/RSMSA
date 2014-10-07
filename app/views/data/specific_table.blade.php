<?php
/**
 * Created by PhpStorm.
 * User: Isaiah
 * Date: 8/19/14
 * Time: 11:05 AM
 */ ?>
@extends('layout.master')
@section('contents')



<section class="panel panel-success">
            <header class="panel-heading ">
               {{ $form_name->name }} Form
                <a class="btn btn-success btn-xs pull-right" href='{{ url("form") }}'>
                    back to list <i class="fa fa-list"></i>
                </a>
                @if(isset($msg))
                <div class="alert alert-success fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                    <strong>{{ $msg }}</strong>
                </div>
                @endif

            </header>
           <div class="panel-body">
               <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead>
                       <tr>
                        <th>#</th>
                        @if($symbol=="0")
                        @foreach($form_head1 as $formData)

                        <?php $option=Options::find($formData->optionsId); ?>
                        <th>{{$option->name}}</th>

                        @endforeach
                        @endif
                        @if($symbol=="1")
                        @foreach($form_head2 as $formData)

                        @if($formData->dataForm)

                        @foreach($formData->dataForm->options as $dataDetails)
                        <th>@if($dataDetails->data){{$dataDetails->data->name}}-{{$dataDetails->options->name}}@endif</th>

                        @endforeach
                        @endif
                        @endforeach
                        @endif
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