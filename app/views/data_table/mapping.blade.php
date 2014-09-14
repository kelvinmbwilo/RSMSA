@extends('layout.master')

@section('contents')

        <section class="panel panel-success">
            <header class="panel-heading">
               Mapping data {{$dataRef->data->name}} with {{$dataRef->referenceData->name}} Reference
            </header>

            <div class="panel-body">
                @if(isset($msg))
                <div class="alert alert-success fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                    <strong>SUCCESS!</strong> Data Reference Mapping Was Successful.


                </div>
                @endif
                <section >
                    <form class="form-horizontal" id="default" method="post" action="{{ url('reference_mapping/{$dataRef->data->id}') }}">

                            <?php $i=1; $j=1; ?>

                            @foreach($dataArray[] as $opt)

                            <label class="col-sm-2 control-label" id="DataCat">{{ $opt->name }}</label>


                                <input type="hidden" class="form-control" value="{{$opt->id}}" name="option_name{{$i++}}">


                            <div class="col-sm-6">
                            <select name="reference{{$j++}}" class="form-control">
                                <option value="0" id="option">No mapping</option>
                                @foreach($reference as $ref)
                                <option value="{{$ref->id}}" id="option">{{$ref->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            @endforeach

                        <div class="form-group">
                            <div class="col-md-6 text-center">
                                <input type="submit" value="done" class="btn btn-info">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </section>


@stop